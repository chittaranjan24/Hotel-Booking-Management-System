<?php

    require('admin/component/db_config.php');
    require('admin/component/essentials.php');

    require("component/Razorpay/razorpay-php/Razorpay.php");
    // require("component/Razorpay/razorpay_config.php");

    date_default_timezone_set("Asia/Kolkata");

    session_start();

    if(!(isset($_SESSION['login']) && $_SESSION['login']==true)){
        redirect('index.php');
    }

    if(isset($_POST['pay_now']))
    {
        include("component/Razorpay/razorpay_config.php");
        //Razorpay//
        use Razorpay\Api\Api;
        
        $api = new Api($keyId, $keySecret);


        $ORDER_ID = 'ORD_'.$_SESSION['uId'].random_int(11111,9999999);
        $CUST_ID = $_SESSION['uId'];
        $TXN_AMOUNT = $_SESSION['room']['payment'];
        // $_SESSION['TXN_AMOUNT'] = $TXN_AMOUNT;


        // $firstname = $_SESSION['fname']; 
        // $lastname = $_SESSION['lname'];
        // $email = $_SESSION['email'];
        // $mobile = $_SESSION['mobile'];
        // $address = $_SESSION['address'];
        // $note = $_SESSION['note'];
        // $sql = "SELECT * from products WHERE pid=:pid"; 
        // $stmt = $db->prepare($sql);
        // $stmt->bindParam(':pid',$pid,PDO::PARAM_INT);
        // $stmt->execute();
        // $row = $stmt->fetch();
        $price = $row['price'];
        $_SESSION['price'] = $price;
        $title = $row['title'];  
        $webtitle = 'CS_WEBDEV'; // Change web title
        $displayCurrency = 'INR';
        $imageurl = 'https://technosmarter.com/assets/images/Avatar.png'; //change logo from here

        $orderData = [
            'receipt'         => "3456",
            'amount'          => $TXN_AMOUNT * 100, // 2000 rupees in paise
            'currency'        => 'INR',
            'payment_capture' => 1 // auto capture
        ];

        
        $razorpayOrder = $api->order->create($orderData);
                    
        $razorpayOrderId = $razorpayOrder['id'];
        
        $_SESSION['razorpay_order_id'] = $razorpayOrderId;
        
        $displayAmount = $amount = $orderData['amount'];
        
        if ($displayCurrency !== 'INR')
        {
            $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
            $exchange = json_decode(file_get_contents($url), true);
        
            $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
        }
        
        $data = [
            "key"               => $keyId,
            "amount"            => $amount,
            "name"              => $webtitle,
            "description"       => $title,
            "image"             => $imageurl,
            "prefill"           => [
            "name"              => $firstname.' '.$lastname,
            "email"             => $email,
            "contact"           => $mobile,
            ],
            "notes"             => [
            "address"           => $address,
            "merchant_order_id" => "ORDER_ID",
            ],
            "theme"             => [
            "color"             => "#F37254"
            ],
            "order_id"          => $razorpayOrderId,
        ];
        
        if ($displayCurrency !== 'INR')
        {
            $data['display_currency']  = $displayCurrency;
            $data['display_amount']    = $displayAmount;
        }
        
        $json = json_encode($data);
    ?>

    
            <center>
                <form action="verify.php" method="POST">
                    <script
                        src="https://checkout.razorpay.com/v1/checkout.js"
                        data-key="<?php echo $data['key']?>"
                        data-amount="<?php echo $data['amount']?>"
                        data-currency="INR"
                        data-name="<?php echo $data['name']?>"
                        data-image="<?php echo $data['image']?>"
                        data-description="<?php echo $data['description']?>"
                        data-prefill.name="<?php echo $data['prefill']['name']?>"
                        data-prefill.email="<?php echo $data['prefill']['email']?>"
                        data-prefill.contact="<?php echo $data['prefill']['contact']?>"
                        data-notes.shopping_order_id="<?php echo $pid;?>"
                        data-order_id="<?php echo $data['order_id']?>"
                        <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $data['display_amount']?>" <?php } ?>
                        <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $data['display_currency']?>" <?php } ?>
                    >
                    </script>
                    <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
                    <input type="hidden" name="shopping_order_id" value="<?php echo $pid;?>">
                </form>
            </center>












        header("Pragma: no-cache");
        header("Cache-Control: no-caches");
        header("Expires: 0");

        $checkSum = "";

        $ORDER_ID = 'ORD_'.$_SESSION['uId'].random_int(11111,9999999);
        $CUST_ID = $_SESSION['uId'];
        $TXN_AMOUNT = $_SESSION['room']['payment'] * 100;

        $paramlist = array();
        $paramlist['ORDER_ID'] = $ORDER_ID;
        $paramlist['CUST_ID'] = $CUST_ID;
        $paramlist['TXN_AMOUNT'] = $TXN_AMOUNT;
        $paramlist["CALLBACK_URL"] = CALLBACK_URL;

        $checkSum = getChecksumFromArray($paramlist,PAYTM_MERCHANT_KEY);

       
        // Insert payment data into database

        $frm_data = filteration($_POST);

        $query1 = "INSERT INTO `booking_order`(`user_id`, `room_id`, `check_in`, `check_out`, `order_id`) VALUES (?,?,?,?,?)";

        insert($query1,[$CUST_ID,$_SESSION['room']['id'],$frm_data['checkin'],$frm_data['checkout'],$ORDER_ID],'issss');

        $booking_id = mysqli_insert_id($con);

        $query2 = "INSERT INTO `booking_details`(`booking_id`, `room_name`, `price`, `total_pay`, 
            `user_name`, `phonenum`, `address`) VALUES (?,?,?,?,?,?,?)";

        insert($query2,[$booking_id,$_SESSION['room']['name'],$_SESSION['room']['price'],$TXN_AMOUNT,$frm_data['name'],$frm_data['phonenum'],$frm_data['address']],'issssss');

        
    }

?>

<html>
<head>
<title>Processing</title>
</head>
<body>
	<center><h1>Please do not refresh this page...</h1></center>
		<form method="post" action="<?php echo PAYTM_TXN_URL ?>" name="f1">
		<table border="1">
			<tbody>
			<?php
			foreach($paramList as $name => $value) {
				echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
			}
			?>
			<input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
			</tbody>
		</table>
		<script type="text/javascript">
			document.f1.submit();
		</script>
	</form>
</body>
</html>



