<?php
require_once('db_connect.php');
// セッション開始
require_once('function.php');

session_start();

if(empty($_SESSION["user_name"])){
    header("Location:login.php");

    $pdo = db_connect();
    try{
        $sql ="SELECT * FROM posts ORDER BY id ASC";
        $stmt = $pdo -> prepare($sql);
        $stmt -> execute();
    }catch(PDOException $e){
        echo 'Error: ' . $e->getMessage();
        die();
    }
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <title>メイン</title>
</head>
<body>
    <h1>メインページ</h1>
    <p>ようこそ<?php echo $_SESSION["user_name"]; ?>さん</p>
    <a href="logout.php">ログアウト</a><br />
    <a href="create_post.php">記事投稿！</a><br />
    <table>
        <tr>
            <td>記事ID</td>
            <td>タイトル</td>
            <td>本文</td>
            <td>投稿日</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <?php $sql ="SELECT * FROM posts ORDER BY id ASC";?>
        <?php $pdo = db_connect();?>
        <?php $stmt = $pdo -> prepare($sql);?>
        <?php $stmt -> execute();?>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['content']; ?></td>
                <td><?php echo $row['time']; ?></td>
                <td><a href="detail_post.php?id=<?php echo $row['id']; ?>">詳細</a></td>
                <td><a href = "edit_post.php?id=<?php echo $row['id'];?>">編集</a></td>
                <td><a href="delete_post.php?id=<?php echo $row['id']; ?>">削除</a></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
LetsEngineer/curriculum/PHPjob/5/main.php
