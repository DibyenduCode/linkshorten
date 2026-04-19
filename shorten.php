<?php
// $originalurl=$_POST["url"];
$url="https://google.com";
$baseurl="http://localhost/link/";
$bitcode=random_bytes(6);
$code=bin2hex($bitcode);
$finalshorturl= $baseurl.$code;

    

function createnewdata($url,$code){
$newdata=[$code=>$url];
return $newdata;
}

function fileread(){
        $file="data.json";
        $filehandel=fopen($file,"r");
        $filejson=fread($filehandel,filesize($file));
        fclose($filehandel);
        $jsontoarray=json_decode($filejson,true);
        return $jsontoarray;
}

function filewrite($jsontoarray,){
        $file="data.json";
        $filehandel=fopen($file,"w");
        fwrite($filehandel,$data);
        fclose($filehandel);
}
 
$dd=(createnewdata($url,$code));
echo $dd[$code];
?>