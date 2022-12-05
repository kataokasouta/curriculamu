<link rel="stylesheet" href="style.css">
<?php
include_once("getData.php");

$getData = new getData();
$user_data =$getData->getUserData();
$post_data = $getData->getPostData();




//getpostdata

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <div class ="main">
    <div class="main1">
     <img src="img/Y&I_logo.png" class="image">
        <div class="main2">        
            <p class="box1"><?php echo "ようこそ".$user_data['last_name']."さん";?></p>
            <p class="box2"><?php echo "最終ログイン日:".$user_data['last_login']?></p>
        </div>
    </div>
  </div>
<div class="table1">
    <table border="1">
    <tr>
        <th>記事ID</th>
        <th>タイトル</th>
        <th>カテゴリ</th>
        <th>本文</th>
        <th>投稿日</th>
    </tr>
    <?php foreach($post_data as $value){ ?>
    <tr>
        <td><?php echo $value['id'];?></td>
        <td><?php echo $value['title'];?></td>
        <td><?php 
                if($value['category_no']==1){
                    echo "食事";
                }else if($value['category_no']==2){
                    echo "旅行";
                }else{
                    echo "その他";
                }
        ?></td>
        <td><?php echo $value['comment'];?></td>
        <td><?php echo $value['created'];?></td>
    </tr>
    <?php } ?>

    </table>
</div>
<div class=footer>Y&I group.inc</I></div>
</body>
</html>

http://localhost:8888/LetsEngineer/curriculum/PHPjob/4-2/index.php

