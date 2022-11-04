<?php
$fruits =["りんご"=>"150","みかん"=>"150","もも"=>"1000"];
$quantity =[2,1,3];
$i=0;

function getPrice ($price,$number){
    $totalcost = $price * $number;
    return $totalcost;
}
foreach ($fruits as $key=>$value){
    $total = getPrice($value,$quantity[$i]);

    echo "$key は $total 円です";
    echo '<br>';
    $i++;
}

?>

//http://localhost/LetsEngineer/curriculum/PHPjob/3-2/index.php