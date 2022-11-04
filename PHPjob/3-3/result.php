<?php
$number = $_POST['number'];
$split_number =str_split($number);
$rand_key = array_rand($split_number,1);
$rand_number =$split_number[$rand_key];

if($rand_number==0){
    $luck =  "凶";
}else if($rand_number<=3 && $rand_number>=1){
    $luck =  "小吉";
}else if($rand_number<=6 && $rand_number>=4){
    $luck =   "中吉";
}else if($rand_number=7||$rand_number=8){
    $luck =  "吉";
}else{
    $luck =  "大吉";
}
?>
<?php
echo date("Y/m/d/", time())."の運勢は";
?>

<p>選ばれた数字は <?php  echo $rand_number;?></p>
<p><?php echo $luck;?></p>

//http://localhost/LetsEngineer/curriculum/PHPjob/3-3/index.php