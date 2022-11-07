<?php include 'header.php';
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

?>

<div class="container">

<form action="" method="POST" enctype="multipart/form-data">
    <legend>Form Upload file</legend>

    <div class="form-group">
        <label for="">Chọn file</label>
        <input type="file" class="form-control" 
            name="upload" >
    </div>
    <img src="uploads/<?=$name;?>" alt="" width="240">
    <button type="submit" 
        class="btn btn-primary">Submit</button>
</form>

</div>


    <div id="carouselId" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselId" data-slide-to="0" class="active"></li>
            <li data-target="#carouselId" data-slide-to="1"></li>
            <li data-target="#carouselId" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img src="https://i.pinimg.com/originals/4e/21/21/4e21214e901ffbf8495936f700d4ccaa.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Title</h3>
                    <p>Description</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://i.pinimg.com/originals/db/55/fa/db55fa20cca495f5efc3b06c08cdaef9.jpg" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Title</h3>
                    <p>Description</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQgz3_eROFz6vw8Y_QXI1vy5OShIaPfCXBc5iNnTRxmczkAvOZpp8zbk9k-cciLouacNZ0&usqp=CAU" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Title</h3>
                    <p>Description</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    
    <div class="container">
        <h2>Sản phẩm nổi bật</h2>
        <hr>
        <div class="row">

        <?php foreach($products as $pro) : ?>
            <div class="col-lg-3">
                <div class="card text-left">
                <img class="card-img-top" src="uploads/<?= $pro['image'];?>" alt="">
                <div class="card-body text-center">
                    <h4 class="card-title"><?= $pro['name'];?></h4>
                    <p class="card-text">
                        <p>
                            <b>Price: <?= number_format($pro['price']);?> đ</b>
                        </p>
                        <a href="" class="btn btn-sm btn-primary">Xem tiếp</a>
                    </p>
                </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
    <div class="benner">
         <img src="https://img.lovepik.com/background/20211022/medium/lovepik-hand-drawn-flower-background-promotion-banner-image_605007232.jpg" alt="">
    </div>
    <hr>
    <div class="container">
        <h2>Sản phẩm khuyến mãi</h2>
        <hr>
        <div class="row">
        <?php foreach($products as $key => $pro) : 
            if ($key > 3) break; ?>
            <div class="col-lg-3">
                <div class="card text-left">
                <img class="card-img-top" src="uploads/<?= $pro['image'];?>" alt="">
                <div class="card-body text-center">
                    <h4 class="card-title"><?= $pro['name'];?></h4>
                    <p class="card-text">
                        <p>
                            <b>Price: <?= number_format($pro['price']);?> đ</b>
                        </p>
                        <a href="" class="btn btn-sm btn-primary">Xem tiếp</a>
                    </p>
                </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
<?php include 'footer.php';?>