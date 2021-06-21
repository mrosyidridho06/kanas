<?php include_once('config.php');
if(isset($_SESSION['user'])){
    echo "<script>window.location='".base_url()."';</scirpt>";
} else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
<div id="wrapper">
    <div class="container">
    <?php
    if(isset($_POST['login'])){
        $user = trim(mysqli_real_escape_string($conn, $_POST['user']));
        $pass = sha1(trim(mysqli_real_escape_string($conn, $_POST['pass'])));
        $sql_login = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$user' AND password = '$pass'") or die(mysqli_error($conn));
        if(mysqli_num_rows($sql_login) > 0){
            $_SESSION['user'] = $user;
            header('location: bahan/bahan.php');
        }else { ?>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="alert alert-danger alert-dissmisable" role="alert">Username atau Password Salah!!!
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">
                </div>
            </div>
        </div>
        <?php
        }
    }
    ?>
        <div style="margin-top: 100px;">
            <div class="form-signin rounded shadow">
            <div align="center">
                    <a href="index.php"><img class="mb-4" src="assets/img/pesanlokal-com-kanaskitchen-logo-aLgOa7-removebg-preview.png" alt="" width="72" height="72"></a>
            </div>
                <form action="" method="POST">
                    <h3 class="h4 mb-3 font-weight-small text-center">User Login</h3>
                    <label for="disabledTextInput">Username</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                        <!-- <div class="input-group-text">@</div> -->
                        </div>
                        <input type="text" name="user" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Username" required>
                    </div>
                    <div class="form-floating mb-3">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="pass" placeholder="Password" required />
                    </div>
                    <input class="w-100 btn btn-lg btn-block btn-primary" type="submit" name="login" value="Masuk"></input>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<style>
.form-signin{
    width: 100%;
    max-width: 330px;
    padding: 15px;
    margin: auto;
    background: ;
}
form{
    display: block;
}
</style>
</html>
<?php
}
?>