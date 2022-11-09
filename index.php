<?php 
include 'header.php';
$banners = mysqli_query($conn,"SELECT * FROM banner WHERE status = 1 ORDER BY id desc");
?>

    <div id="carouselId" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
        `<?php foreach($banners as $key => $banner) : ?>
            <li data-target="#carouselId" data-slide-to="<?= $key;?>" class="<?= $key == 0 ? 'active' :'';?>"></li>
            <?php endforeach;?>
        </ol>
        <div class="carousel-inner" role="listbox">
            <?php foreach($banners as $key => $banner) : ?>
            <div class="carousel-item <?= $key == 0 ? 'active' :'';?>">
                <img src="<?= $banner['image'];?>" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h3><?= $banner['name'];?></h3>
                    <p><?= $banner['desc'];?></p>
                </div>
            </div>
            <?php endforeach;?>
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
    
   <div class="top-product my-5">
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