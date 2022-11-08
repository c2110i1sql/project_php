<?php 
include 'header.php';
$sql_cate = "SELECT * FROM category ORDER BY name ASC";
$categories = mysqli_query($conn, $sql_cate);
?>
  <!-- =============================================== -->
  <?php include 'aside.php';?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản lý danh mục
        <small>it all starts here</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-body">
          
          <form action="" method="POST" class="form-inline" role="form">
          
            <div class="form-group">
              <label class="sr-only" for="">label</label>
              <input type="email" class="form-control" id="" placeholder="Input field">
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
            <a href="" class="btn btn-warning"><i class="fa fa-plus"></i> Thêm mới</a>
            <a href="" class="btn btn-success"><i class="fa fa-cogs"></i></a>
            <a href="" class="btn btn-success"><i class="fa fa-users"></i></a>
            <a href="" class="btn btn-success"><i class="fa fa-refresh"></i></a>
            <a href="" class="btn btn-success"><i class="fa fa-arrow-left"></i></a>
            <a href="" class="btn btn-success"><i class="fa fa-arrow-right"></i></a>
            <a href="" class="btn btn-success"><i class="fa fa-plus"></i></a>
            <a href="" class="btn btn-success"><i class="fa fa-save"></i></a>
          </form>
          <hr>
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($categories as $cat) : ?>                       
              <tr>
                <td><?= $cat['id'];?></td>
                <td><?= $cat['name'];?></td>
                <td><?= $cat['status'] == 0? 'Tạm ẩn' : 'Hiển thị';?></td>
                <td class="text-right">
                  <a href="" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                  <a href="" class="btn btn-success"><i class="fa fa-eye"></i></a>
                  <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
            <?php endforeach;?>
            </tbody>
          </table>
          
        </div>

      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include 'footer.php';?>