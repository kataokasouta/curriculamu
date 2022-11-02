<?php
$num = 0;
while($num <=100) {
echo $num;
$num++;
echo'<br>';
if($num % 3 === 0 && $num % 5 === 0){
echo "FizzBuzz!";
}else if($num % 3 === 0){
echo "Fizz!";
}else if($num % 5 === 0){
echo "Buzz!";
}
}
?>