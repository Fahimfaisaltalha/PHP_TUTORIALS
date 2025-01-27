<?php
echo "My First Tutorial Page";
$a=["talha","Fahim"];
echo $a[0]."<br>";
function myfunction(){
    $a=10;
    $b=24;
    $c= $a+$b;
    echo $c."<br>";
    return $c;
}
myfunction();

$name ="My Name is Talha ";
echo strlen($name)."<br>";
echo "My name"."is"."Fahim Faisal"."<br>";
echo str_word_count($name)."<br>";
echo strrev($name)."<br>";
echo strpos($name,"is")."<br>";
echo str_replace("Talha","Don",$name)."<br>";
echo str_repeat($name,10)

?>