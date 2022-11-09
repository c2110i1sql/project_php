<?php 
include 'header.php';
$error = '';
if (isset($_POST['name'])) {

    $name = $_POST['name'];
    $status = $_POST['status'];

    $sql = "INSERT INTO category(name, status) VALUES ('$name','$status')";

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
                <input type="text" class="form-control" name="name" placeholder="Input field">
            </div>
          
            <div class="form-group">
            <div class="radio">
                <label>
                    <input type="radio" name="status"  value="1" checked>
                   Hiển thị
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="status"  value="0">
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