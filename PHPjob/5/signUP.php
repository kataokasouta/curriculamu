<?php
require_once('db_connect.php');



if(isset($_POST["signUp"])){
     if(empty($_POST["name"])){
        echo 'ユーザーnameが未入力です';
    }else if(empty($_POST["password"])){
        echo 'パスワードが未入力です';
    }
    if(!empty($_POST["name"])&&!empty($_POST["password"])){
        $name = $_POST["name"];
        $password =$_POST["password"];

 $pdo =db_connect();
   try{
        $sql = "INSERT INTO users(name,password)VALUES(:name,:password)";
        $stmt = $pdo->prepare($sql);
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt->bindValue(':password',$password_hash);
            $stmt->bindValue(':name',$name);

        $stmt->execute();
        echo '登録が完了しました。';

 }catch(PDOException $e){
    echo 'データベースエラー';
    die();
 }
}
}
?>

<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
    <h1>新規登録</h1>
    <form method="POST" action="">
        user:<br>
        <input type="text" name="name" id="name">
        <br>
        password:<br>
        <input type="password" name="password" id="password"><br>
        <input type="submit" value="submit" id="signUp" name="signUp">
    </form>
</body>
</html>

//localhost/LetsEngineer/curriculum/PHPjob/5/signUP.php
