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

?>

<!doctype html>
<html lang = "ja">
    <head>
        <meta http-equiv = "Content-Type" content = "text/html; charset=UTF-8">
        <title>ログインページ</title>
    </head>
    <body>
        <h1>ログイン画面</h1>  
        <a href ="SignUp.php">新規ユーザー登録</a>
        <form = method = "post" action "">
            <input type = "text" name ="name" placeholder = "ユーザー名"><br>
            <input type = "password" name = password placeholder = "パスワード"><br>
            <input type = "submit" value = "ログイン" name = "submit"><br>
    </body>
</html>


        http://localhost/LetsEngineer/curriculum/PHPjob/5/login.php