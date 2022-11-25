<?php 
include 'test-email.php'; 

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];

    $send = mailContact($email, $name, $subject, $body);

    var_dump($send);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    
</head>
<body>
    
    <div class="container">
        <h2>Form liên hệ</h2>
        <hr>
        
        <form action="" method="POST" role="form">
        
            <div class="form-group">
                <label for="">Họ và tên</label>
                <input type="text" class="form-control" name="name" placeholder="Input field">
            </div>
        
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Input email">
            </div>
            <div class="form-group">
                <label for="">Số điện thoại</label>
                <input type="text" class="form-control" name="phone" placeholder="Input phone">
            </div>
        
            <div class="form-group">
                <label for="">Tiêu đề email</label>
                <input type="text" class="form-control" name="subject" placeholder="Input subject">
            </div>
            <div class="form-group">
                <label for="">Nội dung email</label>
                
                <textarea name="body" class="form-control" ></textarea>
                
            </div>
            <button type="submit" class="btn btn-primary">Gửi email</button>
        </form>
        
    </div>
    
    
</body>
</html>