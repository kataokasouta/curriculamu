<link rel="stylesheet" href="style.css">
<?php
require_once('db_connect.php');

if(isset($_POST["signUp"])){
    if(empty($_POST["name"])){
        echo 'ユーザー名が未入力です';
    }else if(empty($_POST["password"])){
        echo 'パスワードが未入力です';
    }
    if(!empty($_POST["name"])&&!empty($_POST["password"])){
        $name = $_POST["name"];
        $password = $_POST["password"];
$pdo = db_connect();
 try{
    $sql = "INSERT INTO users(name,password)VALUE(:name,:password)";
    $stmt =  $pdo->prepare($sql);
    $password_hash = password_hash($password,PASSWORD_DEFAULT);
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
//http://localhost/LetsEngineer/curriculum/PHPjob/5/signUP.php
?>
<html>
<head>
    <title></title>
    <meta http-equiv ="Content-Type content ="text/html;charset=UTF-8">
<head>
<body>
        <h1>ユーザー登録画面<h1>
        <form method = "POST" action ="">
                <input type ="text" class = "name1"name = "name" id = "name" placeholder = "ユーザー名">
                <br>
                <input type ="password"   class = "password1"name = "password" id = "password" placeholder = "パスワード"><br>
                <input type ="submit" class = "submit1" value = "新規登録" id = "signUp" name = "signUp" >
        </form>
</body>
</html>

