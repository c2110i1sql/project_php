<?php 
include 'header.php';
$error = '';
$id = $_GET['id'];
$sql = "DELETE FROM category WHERE id = $id";
$qurry_del = mysqli_query($conn, $sql);

if ($qurry_del) {
    header('location: category.php');
} else {
    $error = mysqli_error($conn);
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
            Xóa danh mcuj
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">

            <div class="box-body">
                <h1><?php echo $error;?></h1>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include 'footer.php';?>