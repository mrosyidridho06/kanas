<?php
require_once("configlogin.php");
if(isset($_POST['login'])){
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM tb_users WHERE username=:username";
    $stmt = $db->prepare($sql);
    
    // bind parameter ke query
    $params = array(
        ":username" => $username,
        ":email" => $username
    );

    $stmt->execute($params);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // jika user terdaftar
    if($user){
        // verifikasi password
        if(password_verify($password, $user["password"])){
            // buat Session
            session_start();
            $_SESSION["user"] = $user;
            // login sukses, alihkan ke halaman timeline
            header("Location: ./bahan/bahan.php");
        }
    }
}

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
    <!-- -->
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
                        <input type="text" name="username" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Username" required>
                    </div>
                    <div class="form-floating mb-3">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Password" required />
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
