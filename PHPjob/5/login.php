<link rel="stylesheet" href="style.css">
<?php
require_once('db_connect.php');

session_start();

if(!empty($_POST)){
    if(empty($_POST["name"])){
        echo "ユーザー名が未入力です";
    }else if(empty($_POST["password"])){
        echo "パスワードが未入力です";
    }
    if(!empty($_POST["name"])&&(!empty($_POST["password"]))){
        $name = htmlspecialchars($_POST['name'],ENT_QUOTES);
        $password = htmlspecialchars($_POST['password'],ENT_QUOTES);

        $pdo = db_connect();

        try{
            $sql = "SELECT * FROM users WHERE name = :name";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name',$name);
            $stmt->execute();
        }catch(PDOException $e){
            echo 'Error;'.$e->getMessage();
            die();
        }
    }
    if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        if(password_verify($password,$row["password"])){
            $_SESSION["user_id"] = $row['id'];
            $_SESSION["user_name"] = $row['name'];

            header("Location:main.php");
            exit;
        }else{
            echo "パスワードに誤りがあります。";
        }
    }else{
        echo "ユーザー名かパスワードに誤りがあります";
    }
    }
   // http://localhost:8888/LetsEngineer/curriculum/PHPjob/5/login.php
?>

<!doctype html>
<html lang = "ja">
    <head>
        <meta http-equiv = "Content-Type" content = "text/html; charset=UTF-8">
        <title>ログインページ</title>
    </head>
    <body>
    <div class = "login1">
        <div class = "login2">
                <h1 class = "login3">ログイン画面 <button onclick = "location.href ='Sign.php'" class = "user_sign">新規ユーザー登録</button><h1>
                <form = method = "post" action "">
                <input type = "text" name ="name"  class = "name2" placeholder = "ユーザー名"><br>
                <input type = "password" name = password   class = "password2" placeholder = "パスワード"><br>
                <input type = "submit" value = "ログイン" name = "submit" class = "submit2"><br>
        </div>
    </div>
    </body>
</html>



        