<link rel="stylesheet" href="css/style.css">
<?php
$name = $_POST['name'];
$number = ["80","22","20","21"];
$language= ["PHP","Python","JAVA","HTML"];
$command = ["join","select","insert","update"];


//② ①で作成した、配列から正解の選択肢の変数を作成してください

?>
<p>お疲れ様です<?php echo $name;?> さん</p>
<form action ="answer.php" method = "post">
<h2>①ネットワークのポート番号は何番？</h2>
<?php foreach($number as $value){?>
<input type ="radio" name ="number" value = <?php echo $value;?>>
<?php echo $value;
}
?>
<h2>②Webページを作成するための言語は？</h2>
<?php foreach($language as $value){?>
<input type ="radio" name ="language"value = <?php echo $value;?>>
<?php echo $value;
}
?>
<h2>③MySQLで情報を取得するためのコマンドは？</h2>
<?php foreach($command as $value){?>
<input type ="radio" name ="command"value = <?php echo $value;?>>
<?php echo $value;
}
?>

<br>
<input type ="hidden" name ="answer1" value ="80">
<input type ="hidden" name ="answer2" value ="HTML">
<input type ="hidden" name ="answer3" value ="select">

<input type ="hidden" name ="name1" value = <?php echo $name;?> >
<input type = "submit" value ="回答する">


<!--問題の正解の変数と名前の変数を[answer.php]に送る-->