<?php 
include 'header.php';
$error =null;
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($email == 'admin@gmail.com' && $password == '123456') {
        $_SESSION['my_login'] = $email;
        header('location: profile.php');
    } else {
        $error = 'Tài khoản không chính xác';
    }
}
?>

<div class="container py-5">
<form action="" method="POST" role="form">
        <?php if ($error) : ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo $error;?>
        </div>
        <?php endif;?>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Input email">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Input password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

    
<?php include 'footer.php';?>