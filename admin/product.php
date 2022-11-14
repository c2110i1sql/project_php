<?php include 'header.php';
$sql = "SELECT * FROM product";

if (!empty($_GET['order'])) {
    $orderArr = explode('-',$_GET['order']);
    $field = isset($orderArr[0]) ? $orderArr[0] : 'id';
    $orderType = isset($orderArr[1]) ? $orderArr[1] : 'DESC';
}
$sql .=" Order By $field $orderType";

$products = mysqli_query($conn, $sql);
?>
<!-- =============================================== -->
<?php include 'aside.php';?>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Danh sách sản phẩm</h1>

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
                <form action="" method="GET" class="form-inline" role="form">

                    <div class="form-group">
                        <input type="email" class="form-control" id="" placeholder="Input field">
                    </div>
                    <div class="form-group">
                       
                       <select name="order" class="form-control">
                            <option value="">Sắp xếp</option>
                            <option value="id-ASC">Id a - z</option>
                            <option value="id-DESC">Id z - a</option>
                            <option value="name-ASC">Name a - z</option>
                            <option value="name-DESC">Name z - a</option>
                            <option value="price-ASC">Price a - z</option>
                            <option value="price-DESC">Price z - a</option>
                       </select>
                       
                    </div>
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                    <a href="product-create.php" class="btn btn-success ml-1">Thêm mới</a>
                </form>
                <hr>

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Id</th>
                            <th>Name</th>
                            <th>Price/ Sale</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Image</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($products as $pro) : ?>
                        <tr>
                            <td class="text-center"><?=$pro['id'];?></td>
                            <td>
                                <a href="#" data-toggle="tooltip" data-placement="top"
                                    title="Edit this item"><?=$pro['name'];?></a>
                                <br>
                                <b>Category: </b> <?=$pro['category_id'];?>
                            </td>
                            <td>
                                <?= number_format($pro['price']);?> / <span
                                    class="badge badge-success"><?=$pro['sale'];?>%</span>
                            </td>
                            <td><span>Ản</span></td>
                            <td><?=$pro['created_at'];?></td>
                            <td>
                                <img width="60" src="../uploads/<?=$pro['image'];?>" alt="">
                            </td>
                            <td class="text-right">
                                <a href="" class="btn btn-sm btn-primary">Edit</a>
                                <a href="" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>

            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include 'footer.php';?>
<?php if (isset($_GET['success']) && $_GET['success'] == true) : ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
// Set the options that I want
// toastr.options = {
//   "closeButton": true,
//   "newestOnTop": false,
//   "progressBar": true,
//   "positionClass": "toast-bottom-center",
//   "preventDuplicates": false,
//   "onclick": null,
//   "showDuration": "300",
//   "hideDuration": "1000",
//   "timeOut": "5000",
//   "extendedTimeOut": "1000",
//   "showEasing": "swing",
//   "hideEasing": "linear",
//   "showMethod": "fadeIn",
//   "hideMethod": "fadeOut"
// }


toastr.options = {
    "positionClass": 'toast-top-center',
    "timeOut": 5000,
    "closeButton": true,
    "progressBar": true,
}
// toastr.success('Success messages');

// for errors - red box
// toastr.error('errors messages');

// for warning - orange box
// toastr.warning('warning messages');

// for info - blue box
toastr.success('Thêm mới thành công', 'Thông báo');
</script>
<?php endif;?>