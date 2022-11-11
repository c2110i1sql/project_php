<?php include 'header.php';
$cats = mysqli_query($conn, "SELECT id, name FROM category Order By name ASC");
$errors = [];
$type_allows = ['image/jpg','image/jpeg','image/png'];
$image = '';

if (isset($_FILES['image']['name'])) {
    $file = $_FILES['image'];
    $image = $file['name'];
    if (empty($image)) {
        $errors['image'] = 'Vui lòng chọn một file ảnh';
    } else {
        $tmp_name = $file['tmp_name'];
   
        $type = $file['type'];
        if (in_array($type, $type_allows)) {
            move_uploaded_file($tmp_name, '../uploads/'.$image);
        } else {
            $errors['image'] = 'Định dạng file ảnh hợp lệ là: jpg, png';
        }
    }
}

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $sale = $_POST['sale'];
    $status = $_POST['status'];
    $content = $_POST['content'];
    $category_id = $_POST['category_id'];

    if (empty($name)) {
        $errors['name'] = 'Tên sản phẩm không được để trống';
    }

    if (empty($price)) {
        $errors['price'] = 'Giá sản phẩm không được để trống';
    }

    if (!is_numeric($price)) {
        $errors['price'] = 'Giá phải là giá trị số > 0';
    }

    $sale = empty($sale) ? 0 : $sale;

    if (!is_numeric($sale)) {
        $errors['sale'] = 'Sale phải là giá trị số >= 0';
    }
    
    if ($sale < 0 || $sale > 100) {
        $errors['sale'] = 'Sale phải là giá trị >= 0 & <= 100';
    }


    if (!$errors) {
        // lệnh insert into
        $sql = "INSERT INTO product SET name='$name', price='$price', status='$status', category_id='$category_id',image = '$image', content='$content', sale='$sale'";

        if (mysqli_query($conn, $sql)) {
            header('location: product.php?success=true');
        } else {
            // header('location: product.php?success=false');
            $errors['error'] = 'Thêm mới không thành công, vui lòng thử lại';
        }
    }
    
    // echo '<pre>';
    // print_r($errors);
    // echo '</pre>';
}
?>
<!-- =============================================== -->
<?php include 'aside.php';?>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Thêm mới sản phẩm</h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Title</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <?php if ($errors) : ?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?php foreach($errors as $er) :?>
                        <li><?= $er;?></li>
                        <?php endforeach;?>
                    </div>
                    <?php endif;?>
                    <div class="row">
                        <div class="col-md-8">

                            <div class="card text-left">
                                <div class="card-body">
                                    <div
                                        class="form-group <?= isset($errors['name']) ? 'has-error has-feedback' : '';?>">
                                        <label for="">Tên sản phẩm</label>
                                        <input type="text" class="form-control" name="name" placeholder="Tên sản phẩm">
                                        <?php if (isset($errors['name'])) : ?>
                                        <i class="fa fa-exclamation-circle form-control-feedback"
                                            aria-hidden="true"></i>
                                        <div class="text-danger">
                                            <?php echo $errors['name'];?>
                                        </div>
                                        <?php endif;?>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Mô tả</label>
                                        <textarea name="content" class="form-control" rows="10"
                                            placeholder="Mô tả nội dung chi tiết..."></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Lưu vào</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-left">
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="">Danh mục</label>
                                        <select name="category_id" class="form-control" required="required">
                                            <option value="">Chọn danh mục</option>
                                            <?php foreach($cats as $cat)  : ?>
                                            <option value="<?=$cat['id'];?>"><?=$cat['name'];?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>

                                    <div
                                        class="form-group <?= isset($errors['price']) ? 'has-error has-feedback' : '';?>">
                                        <label for="">Giá sản phẩm</label>
                                        <input type="text" class="form-control" name="price" placeholder="VD: 10000000">
                                        <?php if (isset($errors['price'])) : ?>
                                        <i class="fa fa-exclamation-circle form-control-feedback"></i>
                                        <div class="text-danger">
                                            <?php echo $errors['price'];?>
                                        </div>
                                        <?php endif;?>
                                    </div>

                                    <div
                                        class="form-group  <?= isset($errors['sale']) ? 'has-error has-feedback' : '';?>">
                                        <label for="">Giảm giá</label>
                                        <input type="text" class="form-control" name="sale" placeholder="VD: 10">
                                        <?php if (isset($errors['sale'])) : ?>
                                        <i class="fa fa-exclamation-circle form-control-feedback"></i>
                                        <div class="text-danger">
                                            <?php echo $errors['sale'];?>
                                        </div>
                                        <?php endif;?>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Trạng thái</label>

                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="status" value="1" checked>
                                                Hiển thị
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="status" value="0">
                                                Tạm ẩn
                                            </label>
                                        </div>
                                    </div>

                                    <div
                                        class="form-group <?= isset($errors['image']) ? 'has-error has-feedback' : '';?>">
                                        <label for="">Ảnh đại diện</label>
                                        <input type="file" class="form-control" name="image"
                                            onchange="select_img(this)">
                                        <?php if (isset($errors['image'])) : ?>
                                        <i class="fa fa-exclamation-circle form-control-feedback"
                                            aria-hidden="true"></i>
                                        <div class="text-danger">
                                            <?php echo $errors['image'];?>
                                        </div>
                                        <?php endif;?>
                                        <hr>
                                        <img src="" id="show_img" alt="" style="width: 100%">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                </form>
            </div>

        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include 'footer.php';?>
<script>
function select_img(input) {
    var file = input.files[0];
    console.log(file);
    var reader = new FileReader();

    reader.onload = function(e) {
        // console.log(e.target.result);
        // var show_img = document.getElementById('show_img');
        show_img.src = e.target.result;
    }

    reader.readAsDataURL(file);

}
</script>