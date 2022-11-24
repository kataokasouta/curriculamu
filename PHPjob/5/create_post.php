<?php
require_once('db_connect.php');

require_once('function.php');

session_start();

if(empty($_SESSION['user_name'])){
    header("Location:login.php");
}

if(isset($_POST["post"])){

    if(empty($_POST['title'])){
        echo 'タイトルが未入力です。';
    }else if(empty($_POST['content'])){
        echo 'コンテンツが未入力です。';
    }
    if(!empty($_POST['title'])&&!empty($_POST['content'])){
        $title =$_POST['title'];
        $content =$_POST['content']; 
        $pdo = db_connect();
        try{
            $sql="INSERT INTO  posts(title,content) VALUE(:title,:content)";
            $stmt=$pdo->prepare($sql);
            $stmt->bindValue(':title',$title);
            $stmt->bindValue(':content',$content);
            $stmt->execute();
            header("location:main.php");
            exit();
        }catch(PDOException $e){
            echo 'Error: ' . $e->getMessage();
            die();
        }
    }    
 } 

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
    <h1>記事登録</h1>
    <form method="POST" action="">
        title:<br>
        <input type="text" name="title" id="title" style="width:200px;height:50px;">
        <br>
        content:<br>
        <input type="text" name="content" id="content" style="width:200px;height:100px;"><br>
        <input type="submit" value="submit" id="post" name="post">
    </form>
</body>
</html>