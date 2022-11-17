<link rel="stylesheet" href="css/style.css">
<?php 
$answer1 =$_POST["answer1"];
$answer2 =$_POST["answer2"];
$answer3 =$_POST["answer3"];
$name =$_POST["name1"];
$number =$_POST["number"];
$language =$_POST["language"];
$command =$_POST["command"];

function judge($answer,$user_answer){
    if($answer==$user_answer){
        echo "正解です";
    }else {
        echo "残念";
    }
}

judge($answer1,$number);
?>
<p><?php echo $name;?> さんの結果は・・・？</p>
<p>①の答え</p>
<?php judge($answer1,$number);?>
<p>②の答え</p>
<?php judge($answer2,$language);?>

<p>③の答え</p>
<?php judge($answer3,$command);?>

