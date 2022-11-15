<?php 
include 'header.php';
$error =null;
if (isset($_SESSION['my_login'])) {
    $email = $_SESSION['my_login'];
} else {
    header('location: login.php');
}
?>

<div class="container py-5">

    <div class="jumbotron">
        <div class="container">
            <h1>Hello, <?= $email;?>!</h1>
            <p>Contents ...</p>
            <p>
                <a class="btn btn-primary btn-lg" href="logout.php">Logout</a>
            </p>
        </div>
    </div>

</div>

<?php include 'footer.php';?>