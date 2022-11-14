<?php 
include 'header.php';
// phan trang
$limit = 3;
$page = !empty($_GET['page']) ? $_GET['page'] : 1;
$start = ($page-1) * $limit;
$sql_cate = "SELECT * FROM category";
$keyword = '';
$status = '';
if (!empty($_GET['keyword']) && empty($_GET['status'])) {
    $keyword = $_GET['keyword'];
    $sql_cate = "SELECT * FROM category WHERE name LIKE '%$keyword%'";
} elseif (empty($_GET['keyword']) && !empty($_GET['status'])) {
    $status = $_GET['status'];
    $sql_cate = "SELECT * FROM category WHERE status = '$status' ";
} else if (!empty($_GET['keyword']) && !empty($_GET['status'])) {
    $keyword = $_GET['keyword'];
    $status = $_GET['status'];
    $sql_cate = "SELECT * FROM category WHERE name LIKE '%$keyword%' AND status = '$status'";
}


// truy vấn lấy ra tổng số dòng;
$queryRow =  mysqli_query($conn, $sql_cate);
$count = mysqli_num_rows($queryRow);

$totalPage = ceil($count/$limit);
$sql_cate .= " ORDER BY name ASC LIMIT $start, $limit";
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

                <form action="" method="GET" class="form-inline" role="form">

                    <div class="form-group">
                        <label class="sr-only" for="">label</label>
                        <input type="" class="form-control" name="keyword" placeholder="Tìm kiếm...">
                    </div>
                    <div class="form-group">
                       
                       <select name="status" id="input" class="form-control">
                        <option value="">Trạng thái</option>
                        <option value="0">Tạm ẩn</option>
                        <option value="1">Hiển thị</option>
                       </select>
                       
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    <a href="category-create.php" class="btn btn-warning"><i class="fa fa-plus"></i> Thêm mới</a>
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
                                <a href="category-edit.php?id=<?= $cat['id'];?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                <a href="" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                <a href="category-delete.php?id=<?= $cat['id'];?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>

            </div>
            <div class="pagi">
                
                <ul class="pagination">
                    <li><a href="#">&laquo;</a></li>
                    <?php for($i=1; $i<= $totalPage; $i++) : ?>
                    <li <?= $i==$page ? 'class="active"':'';?>><a href="?page=<?= $i;?>&status=<?=$status;?>&keyword=<?=$keyword;?>"><?= $i;?></a></li>
                    <?php endfor;?>

                    <li><a href="#">&raquo;</a></li>
                </ul>
                
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include 'footer.php';?>