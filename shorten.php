<?php
if(isset($_POST["url"])){
    function codegen(){
        $bitcode=random_bytes(6);
        $code=bin2hex($bitcode);
        return $code;
    }

    function fileread(){
        $file="data.json";
        $filehandel=fopen($file,"r");
        $filejson=fread($filehandel,filesize($file));
        fclose($filehandel);
        return $filejson;
}

    function filewrite($data){
        $file="data.json";
        $filehandel=fopen($file,"w");
        fwrite($filehandel,$data);
        fclose($filehandel);
}
 
$webcode=codegen();
echo $webcode;

$baseurl="http://localhost/link/";
$finalshorturl= $baseurl.$webcode;
echo $finalshorturl;

$orilink=$_POST["url"];





}

?>