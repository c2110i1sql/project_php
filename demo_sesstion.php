<?php 
session_start();
// session_destroy();
if (isset($_SESSION['email'])) {
    echo $_SESSION['email'];
} else {
   echo 'Nguyễn Tuấn Anh';
}


echo '<pre>';
print_r($_SESSION);
