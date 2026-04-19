<?php
$code= substr($_SERVER["REDIRECT_URL"],6);

$file="data.json";
$filehandel=fopen($file,"r");
$filejson=fread($filehandel,filesize($file));
fclose($filehandel);
$oldjsontoarray=json_decode($filejson,true);

$originalurl= $oldjsontoarray["$code"];
http_response_code(301);
header("location: ".$originalurl);
exit();
        
?>