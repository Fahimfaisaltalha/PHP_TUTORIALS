
<?php
// function myfunction($a,$b){
    
//     $c= $a+$b;
//     echo $c."<br>";
//     return $c;
// }
// $x=readline("Enter x :");
// $y=readline("Enter y :");
// myfunction($x,$y);

// $a= 2;
// switch($a){
//     case 2:
//         echo "No you are 2<br>";
//     break;
//     case 5:
//         echo "Yes You can<br>";
//     break;
//     default:
//         echo "Hahahaha<br>";
//     }

// $i=1;
// while($i<=20){
//     echo "$i";
//     echo "\n";
//     $i++;

// }
// for($i=10;$i<=50;$i=$i+2){
//     echo "$i";
//     echo "\n";

// }

// $i=30;
// do{
//     echo "$i\n";
//     $i--;
// }while($i>0);


// $arr=["a","b","c"];
// for($i=0;$i<count($arr);$i++){
//     echo $arr[$i];
// }
// foreach($arr as $x){
//     echo "$x";
// }
// $d=date("d l Y");
// echo "Date is $d";
$a=[
    ["talha"=>'This is good',"age"=>25],
    ["talha"=>'This is Bad',"age"=>35],
];
// echo $a["talha"]."\n";


foreach($a as $key => $value){
    echo ($key+1) ."is". $value['talha']."\n";
}

// foreach ($questions as $index => $question) {
//     echo ($index + 1) . ". " . $question['question'] . "\n";
// }


//Local And Global Scope
//  $a=20;
// function myfunction(){
//     global $a; 
//     echo "$a";


// }
// myfunction();

?>