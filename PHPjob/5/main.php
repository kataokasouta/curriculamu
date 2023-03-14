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
    //http://localhost:8888/LetsEngineer/curriculum/PHPjob/5/main.php
?>

<html>
<head>
    <meta charset = "UTF-8">
    <title>メイン</title>
</head>
<body>
    <div class = "main1">
        <div class = "main2">
            <h1>在庫一覧</h1>
            <button onclick = "location.href = 'create_post.php'" class = "create_post">新規登録</button>
            <button onclick  = "location.href = 'login.php'" class = "login_php">ログアウト</button>
            <table border = 2>
                <tr>
                    <td>タイトル</td>
                    <td>発売日</td>
                    <td>在庫数</td>
                    <td></td>
                </tr>
                <?php while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <td><?php echo $row['title'];?></td>
                        <td><?php echo $row['date'];?></td>
                        <td><?php echo $row['stock'];?></td>
                        <td class = "td4"><button class ="delete1" onclick= "location.href = 'delete_post.php?id=<?php echo $row['id'];?>'">削除</button></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>
