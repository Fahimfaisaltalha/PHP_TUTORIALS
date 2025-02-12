<?php

// $a= readfile('myfile.txt');
// echo $a;
// readfile('files.html');

$fptr= fopen("myfile.txt", "r");
// $connect= fread($fptr,filesize("myfile.txt"));
// echo $connect;
// fclose($fptr);
// echo "</br>";
// echo fgets($fptr);
// echo fgets($fptr);

//......Reading a file Line by Line....//
// while($a=fgets($fptr)){
//     echo $a;
// }

// .....Reading a file character by character....//

// while($a=fgetc($fptr)){
//     echo $a;
//     break;
// }

//....write a program which read content of a file until . Has been encounter
while($a=fgetc($fptr)){
    echo $a;
    if($a=="."){
        break;
    }
}
fclose($fptr);

$fptr= fopen("myfile2.txt", "w");
fwrite($fptr,"Hello Brother this is good,right.");
fwrite($fptr,"Hello Brother this will rewrite by this text\n");

$fptr= fopen("myfile2.txt", "a");
fwrite($fptr,"Hello Brother this is good,right.");
fclose($fptr);