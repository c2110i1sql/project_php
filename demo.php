<?php 
$allow_types = ['image/jpeg','image/jpg','image/png','image/gif'];

// if ( isset($_POST['name']) ) {
//     $name = $_POST['name'];
//     $status = $_POST['status'];
//     $sql = "INSERT INTO category (name, status) VALUES('$name','$status')";
//     echo $sql;
// }
$name = '';
if (!empty($_FILES['upload']['tmp_name'])) {
    $file = $_FILES['upload'];
    $type = $file['type'];
    if (in_array($type, $allow_types)) {
        $tmp_name = $file['tmp_name'];
        $name = $file['name'];
        move_uploaded_file($tmp_name, 'uploads/'.$name);
    } else {
        echo 'Định dạng file hợp lệ là: jpg, png, gif';
    }
   
}
echo '<pre>';
    print_r($_FILES);
echo '</pre>';
