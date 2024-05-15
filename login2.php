<?php
session_start();

if(isset($_SESSION['admin'])) {
    header("Location: admin/");
    exit;
}

if(isset($_SESSION['pelamar'])) {
    header("Location: pelamar/");
    exit;
}

if(isset($_SESSION['head_office'])) {
    header("Location: head_office/");
    exit;
}

include "koneksi.php";

if(isset($_POST['login'])) {
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    $level    = mysqli_real_escape_string($connect, $_POST['level']);

    // Informasi tabel dan pengalihan
    $user_types = array(
        'admin' => array('table' => 'admin', 'redirect' => 'admin/index.php'),
        'pelamar' => array('table' => 'pelamar', 'redirect' => 'pelamar/index.php'),
		'head_office' => array('table' => 'head_office', 'redirect' => 'head_office/index.php')
    );

    if(array_key_exists($level, $user_types)) {
        $table = $user_types[$level]['table'];
        $redirect = $user_types[$level]['redirect'];

        $query = "SELECT * FROM $table WHERE username='$username' AND password='$password'";
        $result = mysqli_query($connect, $query);
        $data = mysqli_fetch_array($result);
        $num_rows = mysqli_num_rows($result);

        if($num_rows > 0) {
            $_SESSION[$level] = $data[0];
            header("Location: $redirect");
            exit;
        } else {
            echo "<script>alert('Login gagal, silahkan coba lagi')</script>";
        }
    } else {
        echo "<script>alert('Pilih hak akses yang valid')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Recruitment SiRekTa</title>
    <link rel="stylesheet" href="bootstrap4/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap4/css/login.css">
    <link rel="stylesheet" href="bootstrap4/css/custom.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body style="background-image: url(bootstrap4/img/bg.png);">
<?php include "navbarb4.php"; ?>
<div class="container">
    <div class="login-container">
        <div id="output"></div>
        <div class="avatar">
            <img src="bootstrap4/img/admin.png" alt="">
        </div>
        <div class="form-box">
            <form action="" method="POST">
                <input name="username" type="text" placeholder="Email">
                <input name="password" type="Password" placeholder="Password">
                <br><br>
                <div class="form-group">
                    <select name="level" class="form-control" required>
                        <option value="">Pilih Hak Akses</option>
                        <option value="admin">HRD</option>
                        <option value="pelamar">Pelamar</option>
						<option value="head_office">Head Office</option>
                    </select>
                </div>
                <input class="btn btn-primary btn-block login" id="login" name="login" type="submit" value="Log In"/>
            </form>
        </div>
        <a href="daftar_pelamar.php">Registrasi</a>
    </div>
</div>
<?php include "footerb4.php"; ?>
<script src="bootstrap4/js/login.js"></script>
<script src="bootstrap4/js/bootstrap.min.js"></script>
</body>
</html>
