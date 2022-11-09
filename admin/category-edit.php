<?php 
include 'header.php';
$id = $_GET['id'];
$sql = "SELECT * FROM category WHERE id = $id";
$qurry_cat = mysqli_query($conn, $sql);
$cat = mysqli_fetch_assoc($qurry_cat);


$error = '';
if (isset($_POST['name'])) {

    $name = $_POST['name'];
    $status = $_POST['status'];

    $sql = "UPDATE category SET name ='$name',status = '$status' WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header('location: category.php');
    } else {
        $error = mysqli_error($conn);
    }
}
?>
  <!-- =============================================== -->
  <?php include 'aside.php';?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Thêm mới danh mục
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        
        <div class="box-body">
        <p>
            <?php echo $error; ?>
        </p>
          <form action="" method="POST" role="form">
          
            <div class="form-group">
                <label for="">Tên danh mục</label>
                <input type="text" class="form-control" name="name" value="<?=$cat['name'];?>" placeholder="Input field">
            </div>
          
            <div class="form-group">
            <div class="radio">
                <label>
                    <input type="radio" name="status"  value="1" <?=$cat['status'] == 1 ? 'checked' : '';?> >
                   Hiển thị
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="status"  value="0" <?=$cat['status'] == 0 ? 'checked' : '';?>>
                 Tạm ẩn
                </label>
            </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          
        </div>
       
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include 'footer.php';?>