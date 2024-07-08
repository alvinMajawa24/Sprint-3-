<h1> Loops </h1>

<h2> while loop </h2>

<?php
// while loop
$min = 0;
while($min <1000){
    print $min. "<br>";
    $min++;
}
?>
<h2> do-while loop</h2>
<?php
//do-while loop
$x =1;
do{
    print $x. "<br>";
    $x++;

}while($x <7);

?>
<h2> for loop </h2>
<?php
// for loop
for($r=3; $r<12;$r++){
    print $r . <"br>";
}

?>

<?php
// for loop
for($e=14; $e<24;$e++){
    if($e%2==0){

    print $e . <"br>";
}
}

?>

<?php
    //for each
$months = ["Jan","Feb","Mar","April","May","June","July","Aug","Sep","Oct","Nov","Dec"];

foreach($months AS $month){
    ?>
<select name ="" id="">
    
    print $month . "<br>";
<?php
}
?>