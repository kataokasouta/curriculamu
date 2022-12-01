<link rel="stylesheet" href="style.css">
<?php
require_once('db_connect.php');

require_once('function.php');

check_user_logged_in();

if(empty($_SESSION["user_name"])){
    header("Location:login.php");
}
    $pdo = db_connect();
    try{
        $sql = "SELECT * FROM books ORDER BY id ASC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }catch(PDOException $e){
        echo 'Error:'.$e->getMessage();
        die();
    }
?>

<html>
<head>
    <meta charset = "UTF-8">
    <title>メイン</title>
</head>
<body class = "main1">
    <h1>在庫一覧画面</h1>
    <a href = "create_post.php">新規登録</a>
    <a href = "login.php">ログアウト</a>
    <table border ="2" width = "80%" >
        <tr>
            <td>タイトル</td>
            <td>発売日</td>
            <td>在庫数</td>
            <td></td>
        </tr>
        <?php while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $row['title'];?></td>
                <td><?php echo $row['data'];?></td>
                <td><?php echo $row['stock'];?></td>
                <td><a href = "delete_post.php?id=<?php echo $row["id"];?>">削除</a></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
http://localhost/LetsEngineer/curriculum/PHPjob/5/main.php