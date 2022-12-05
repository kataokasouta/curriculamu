<link rel="stylesheet" href="style.css">
<?php
require_once('db_connect.php');

require_once('function.php');

check_user_logged_in();

if(isset($_POST['post'])){

    if(!empty($_POST['title'])&&!empty($_POST['data'])&&!empty($_POST['stock'])){
        $title = $_POST['title'];
        $data = $_POST['data'];
        $format_data = date('Y-m-d',strtotime($data));
        $stock = $_POST['stock'];
        $pdo = db_connect();
        try{
            $sql = "INSERT INTO books(title,data,stock) VALUES (:title,:data,:stock)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':title',$title);
            $stmt->bindValue(':data',$format_data);
            $stmt->bindValue(':stock',$stock);
            $stmt->execute();
            header("Location:main.php");
        }catch(PODException $e){
            echo 'Error:'.$e->getMessage();
            die();
        }
    }else{
        echo '違うわぼけ,やり直しじゃあ！！！';
    }
}
       

?>





<!DOCTYPE html>
<html>
<head>
    <title> 本登録画面</title>
    <meta http-equiv = "Content-Type" content = "text/html; charset = UTF-8">
</head>
<body>
    <div class = "create1">
        <div class = "create2">
            <h1>本 登録画面</h1>
            <form method = "POST" action = "">
            <input type = "text" name = "title"  class = "title1" placeholder = "タイトル";><br>
            <input type = "text" name = "data"  class = "data1" placeholder = "発売日";><br>
            在庫数<br>
            <input type = "text" name = "stock"  list = "stock" class = "stock1" placeholder = "選択してください">
            <datalist id = "stock" >
                <?php for($i = 1;$i<=100;$i++){?>
                    <option value = "<?php echo $i;?>">
                        <?php echo $i;?>
                    </option>
                <?php } ?>
            </datalist><br>
            <input type = "submit" value = "登録"  class = "submit3"name = "post" >
            </from>
        </div>
    </div>
</body>
</html>