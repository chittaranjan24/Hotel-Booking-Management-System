<?php

require('component/essentials.php');

session_start();
session_destroy();
redirect('index.php');

?>