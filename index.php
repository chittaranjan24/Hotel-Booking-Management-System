<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('component/links.php'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <title><?php echo $settings_r['site_title'] ?> - HOME</title>

    <!-- add icon link -->
    <link rel = "icon" href = "data:image/png;base64,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" type = "image/x-icon">

    <style>
        .availability-form {
            margin-top: -50px;
            z-index: 2;
            position: relative;
        }

        @media screen and (max-width: 575px) {
            .availability-form {
                margin-top: 25px;
                padding: 0 35px;
            }
        }
    </style>
</head>

<body class="bg-light">

    <?php require('component/header.php'); ?>

    <!-- Start Carousel Swiper -->
    <div class="container-fluid px-lg-4 mt-4">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                <?php
                $res = selectAll('carousel');
                while($row = mysqli_fetch_assoc($res))
                {
                    $path = CAROUSEL_IMG_PATH;
                    echo <<< data
                    <div class="swiper-slide">
                        <img src="$path$row[image]" class="w-100 d-block">
                    </div>
                    data;
                }
                ?> 
            </div>
        </div>
    </div>
    <!-- End Carousel Swiper -->

    <!-- Start Check Availability form -->
    <div class="container availability-form">
        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <h5 class="mb-4">Check Bookink Availability</h5>
                <form>
                    <div class="row align-items-end">
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Check-in</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Check-out</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Adult</label>
                            <select class="form-select">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-lg-2 mb-3">
                            <label class="form-label" style="font-weight: 500;">Children</label>
                            <select class="form-select">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-lg-1 mb-lg-3 mt-2">
                            <button class="btn text-white shadow-none custom-bg" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Check Availability form -->

    <!-- start Our Rooms -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR ROOMS</h2>

    <div class="container">
        <dic class="row">
            <?php

                $room_res = select("SELECT * FROM `rooms` WHERE `status`=? AND `removed`=? ORDER BY `id` DESC LIMIT 3",[1,0],'ii');

                while($room_data = mysqli_fetch_assoc($room_res))
                {
                    // get features of room

                    $fea_q = mysqli_query($con,"SELECT f.name FROM `features` f INNER JOIN `room_features` rfea ON f.id = rfea.features_id WHERE rfea.room_id = '$room_data[id]'");

                    $features_data = "";
                    while($fea_row = mysqli_fetch_assoc($fea_q)){
                        $features_data .="
                        <span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>
                            $fea_row[name]
                        </span>
                        ";
                    }

                    // get facilities of room

                    $fac_q = mysqli_query($con,"SELECT f.name FROM `facilities` f INNER JOIN `room_facilities` rfac ON f.id = rfac.facilities_id WHERE rfac.room_id = '$room_data[id]'");

                    $facilities_data = "";
                    while($fac_row = mysqli_fetch_assoc($fac_q)){
                        $facilities_data .="
                        <span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>
                            $fac_row[name]
                        </span>
                        ";
                    }

                    // get thumbnail of image

                    $room_thumb = ROOMS_IMG_PATH."thumbnail.jpg";
                    $thumb_q = mysqli_query($con,"SELECT * FROM `room_images` WHERE `room_id`='$room_data[id]' AND `thumb`='1'");

                    if(mysqli_num_rows($thumb_q)>0){
                        $thumb_res = mysqli_fetch_assoc($thumb_q);
                        $room_thumb = ROOMS_IMG_PATH.$thumb_res['image'];
                    }

                    $book_btn = "";

                    if(!$settings_r['shutdown']){
                        $login = 0;
                        if(isset($_SESSION['login']) && $_SESSION['login']==true){
                            $login = 1;
                        }

                        $book_btn = "<button onclick='checkLoginToBook($login,$room_data[id])' class='btn btn-sm text-white custom-bg shadow-none'>Book Now</button>";
                    }

                    $rating_q = "SELECT AVG(rating) AS `avg_rating` FROM `rating_review`
                        WHERE `room_id`='$room_data[id]' ORDER BY `sr_no` DESC LIMIT 20";

                    $rating_res = mysqli_query($con, $rating_q);
                    $rating_fetch = mysqli_fetch_assoc($rating_res);

                    $rating_data = "";

                    if($rating_fetch['avg_rating'] != NULL){
                        $rating_data = "
                            <div class='rating mb-4'>
                                <h6 class='mb-1'>Ratings</h6>
                                <span class='badge rounded-pill bg-light'>
                        ";

                        for($i = 0; $i < $rating_fetch['avg_rating']; $i++){
                            $rating_data .= "<i class='bi bi-star-fill text-warning'></i> ";
                        }

                        $rating_data .= "</span>
                            </div>
                        ";
                    }

                    // print room card

                    echo <<< data

                        <div class="col-lg-4 col-md-6 my-3">
                            <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                                <img src="$room_thumb" class="card-img-top">
                                <div class="card-body">
                                    <h5>$room_data[name]</h5>
                                    <h6 class="mb-4">₹$room_data[price] per night</h6>
                                    <div class="features mb-4">
                                        <h6 class="mb-1">Features</h6>
                                        $features_data
                                    </div>
                                    <div class="facilities mb-4">
                                        <h6 class="mb-1">Facilities</h6>
                                        $facilities_data
                                    </div>
                                    <div class="guests mb-4">
                                        <h6 class="mb-1">Guests</h6>
                                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                                            $room_data[adult] Adults
                                        </span>
                                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                                            $room_data[children] Children
                                        </span>
                                    </div>
                                    $rating_data
                                    <div class="d-flex justify-content-evenly mb-2">
                                        $book_btn
                                        <a href="room_details.php?id=$room_data[id]" class="btn btn-sm btn-outline-dark shadow-none">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    data;
                }

            ?>
            
            <div class="col-lg-12 text-center mt-5">
                <a href="rooms.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Rooms</a>
            </div>
        </dic>
    </div>
    <!-- End Our Rooms -->

    <!-- start Our Facilities -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR FACILITIES</h2>

    <div class="container">
        <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
        <?php
                $res = mysqli_query($con,"SELECT * FROM `facilities` ORDER BY `id` DESC LIMIT 5");
                $path = FACILITIES_IMG_PATH;

                while($row = mysqli_fetch_assoc($res)){
                    echo <<< data
                    <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                        <img src="$path$row[icon]" width="60px">
                        <h5 class="mt-3">$row[name]</h5>
                    </div>
                    data;
                }            
            ?>
            <div class="cil-lg-12 text-center mt-5">
                <a href="facilities.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Facilities</a>
            </div>
        </div>
    </div>
    <!-- End Our Facilities -->

    <!-- start Testimonials -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">TESTIMONIALS</h2>

    <!-- Start Testimonials Swiper -->
    <div class="container mt-5">
        <div class="swiper swiper-testimonials">
            <div class="swiper-wrapper mb-5">

                <?php
                
                    $review_q = "SELECT rr.*, uc.name AS uname, uc.profile, r.name AS rname FROM `rating_review` rr
                        INNER JOIN `user_cred` uc ON rr.user_id = uc.id
                        INNER JOIN `rooms` r ON rr.room_id = r.id
                        ORDER BY `sr_no` DESC LIMIT 6";
                    
                    $review_res = mysqli_query($con, $review_q);
                    $img_path = USERS_IMG_PATH;

                    if(mysqli_num_rows($review_res) == 0){
                        echo 'No reviews yet!';
                    }
                    else{
                        while($row = mysqli_fetch_assoc($review_res)){

                            $stars = "<i class='bi bi-star-fill text-warning'></i> ";
                            for($i = 1; $i < $row['rating']; $i++){
                                $stars .= " <i class='bi bi-star-fill text-warning'></i>";
                            }

                            echo <<< slides
                                <div class="swiper-slide bg-white p-4">
                                    <div class="profile d-flex align-items-center mb-3">
                                        <img src="$img_path$row[profile]" loading="lazy" class="rounded-circle" border="1px" width="30px">
                                        <h6 class="m-0 ms-2">$row[uname]</h6>
                                    </div>
                                    <p>$row[review]</p>
                                    <div class="rating">
                                        $stars
                                    </div>
                                </div>
                            slides;

                        }
                    }
                
                ?>
                <!-- <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center mb-3">
                        <img src="images/facilities/IMG_49949.svg" width="30px">
                        <h6 class="m-0 ms-2">Random user1</h6>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime magni doloribus optio ad molestias eveniet quod aperiam ab deleniti nam!
                    </p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div> -->

            </div>
            <div class="swiper-pagination"></div>

        </div>
        <div class="cil-lg-12 text-center mt-5">
            <a href="about.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Know More</a>
        </div>
    </div>
    <!-- End Testimonials Swiper -->
    <!-- End Testimonials -->

    <!-- start Reach us -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">REACH US</h2>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
                <iframe class="w-100 rounded" height="320px" src="<?php echo $contact_r['iframe'] ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Call us</h5>
                    <a href="tel: +<?php echo $contact_r['pn1'] ?>" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i> +<?php echo $contact_r['pn1'] ?>
                    </a><br>
                    <?php 
                    if($contact_r['pn2']!=''){
                        echo <<< data
                            <a href="tel: +$contact_r[pn2]" class="d-inline-block text-decoration-none text-dark">
                                <i class="bi bi-telephone-fill"></i> +$contact_r[pn2]
                            </a>
                        data;
                    }
                    ?>                    
                </div>

                <div class="bg-white p-4 rounded mb-4">
                    <h5>Follow us</h5>

                    <?php 
                    if($contact_r['tw']!=''){
                        echo <<< data
                            <a href="$contact_r[tw]" class="d-inline-block mb-3" target="_blank">
                                <span class="badge bg-light text-dark fs-6 p-2">
                                    <i class="bi bi-twitter me-1"></i> Twitter
                                </span>
                            </a><br>
                        data;
                    }
                    ?>
                    
                    <a href="<?php echo $contact_r['fb'] ?>" class="d-inline-block mb-3" target="_blank">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-facebook me-1"></i> Facebook
                        </span>
                    </a><br>
                    <a href="<?php echo $contact_r['insta'] ?>" class="d-inline-block" target="_blank">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-instagram me-1"></i> Instagram
                        </span>
                    </a>

                </div>
            </div>
        </div>
    </div>
    <!-- End Reach us -->

    <!-- Start Password reset modal and code -->
    <div class="modal fade" id="recoveryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="recovery-form">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center">
                            <i class="bi bi-shield-lock fs-3 me-2"></i> Set Your New Password
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-4">
                            <label class="form-label">New Password</label>
                            <input type="password" name="pass" required class="form-control shadow-none">
                            <input type="hidden" name="email">
                            <input type="hidden" name="token">
                        </div>
                        
                        <div class="mb-2 text-end">
                            <button type="button" class="btn shadow-none me-2" data-bs-dismiss="modal">CANCEL</button>
                            <button class="btn btn-dark shadow-none" type="submit">SUBMIT</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Password reset modal and code -->

    <?php require('component/footer.php'); ?>

    <?php
    
        if(isset($_GET['account_recovery']))
        {
            $data = filteration($_GET);

            $t_date = date("Y-m-d");

            $query = select("SELECT * FROM `user_cred` WHERE `email`=? AND `token`=? AND `t_expire`=? LIMIT 1",[$data['email'],$data['token'],$t_date],'sss');

            if(mysqli_num_rows($query)==1)
            {
                echo <<< showModal
                    <script>
                        var myModal = document.getElementById('recoveryModal');

                        myModal.querySelector("input[name='email']").value = '$data[email]';
                        myModal.querySelector("input[name='token']").value = '$data[token]';

                        var modal = bootstrap.Modal.getOrCreateInstance(myModal);
                        modal.show();
                    </script>
                showModal;
            }
            else{
                alert("error","Invalid or Expired Link !");
            }
        }

    ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".swiper-container", {
            spaceBetween: 30,
            effect: "fade",
            loop: true,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },
        });

        var swiper = new Swiper(".swiper-testimonials", {
            effect: "coverflow",
            loop: true,
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            slidesPerView: "3",
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: false,
            },
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            }
        });

        // recover account

        let recovery_form = document.getElementById('recovery-form');

        recovery_form.addEventListener('submit', (e)=>{
        e.preventDefault();

        let data = new FormData();

        data.append('email',recovery_form.elements['email'].value);
        data.append('token',recovery_form.elements['token'].value);
        data.append('pass',recovery_form.elements['pass'].value);
        data.append('recover_user','');

        var myModal = document.getElementById('recoveryModal');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'ajax/login_register.php', true);

        xhr.onload = function() {
            if(this.responseText == 'failed'){
                alert('error',"Account reset failed!");
            }
            else{
                alert('success',"Account Reset Successful!");
                recovery_form.reset();
            }
        };

        xhr.send(data);
    })

    </script>

</body>

</html>