
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Shortened URL</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  

  <!-- 🔥 TOP CENTER TOAST -->
  <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-md text-center">
    
    <h2 class="text-2xl font-semibold mb-4">✅ URL Shortened</h2>
    
<?php
if(isset($_POST["url"])){
$originalurl=$_POST["url"];
$baseurl="http://localhost/link/";
$bitcode=random_bytes(6);
$code=bin2hex($bitcode);
$finalshorturl= $baseurl.$code;
echo "<input 
      id='shortUrl'
      type='text'
      value='$finalshorturl' 
      class='w-full border rounded-lg px-4 py-3 mb-4 text-center text-lg'
      readonly
    >";


 $newarraydata=createnewdata($originalurl,$code);
 $olddata=fileread();
filewrite($olddata,$newarraydata);

}

function createnewdata($url,$code){
$newdata=[$code=>$url];
return $newdata;
}

function fileread(){
        $file="data.json";
        $filehandel=fopen($file,"r");
        $filejson=fread($filehandel,filesize($file));
        fclose($filehandel);
        $oldjsontoarray=json_decode($filejson,true);
        return $oldjsontoarray;
}

function filewrite($oldjsontoarray,$newdata){
        $newmargedata=array_merge($oldjsontoarray,$newdata);
        $finaljson=json_encode($newmargedata,JSON_UNESCAPED_SLASHES);
        $file="data.json";
        $filehandel=fopen($file,"w");
        fwrite($filehandel,$finaljson);
        fclose($filehandel);
}
 

?>
<button onclick="copyURL()" class="bg-blue-600 text-white px-4 py-3 rounded-lg w-full mb-3 text-lg">
      Copy URL
    </button>
    <a href="index.html">
<button class="bg-blue-600 text-white px-4 py-3 rounded-lg w-full mb-3 text-lg">
      Create Anather Short link
    </button>
</a>
  </div>
<div id="toast" 
       class="fixed top-6 left-1/2 -translate-x-1/2 
              bg-green-600 text-white px-6 py-4 
              rounded-xl shadow-xl text-lg font-medium
              opacity-0 transition-all duration-300 transform -translate-y-5">
    ✅ Copied to clipboard!
  </div>

  <script>
    function copyURL() {
      const input = document.getElementById("shortUrl");
      input.select();
      input.setSelectionRange(0, 99999);
      document.execCommand("copy");

      showToast();
    }

    function showToast() {
      const toast = document.getElementById("toast");

      toast.classList.remove("opacity-0", "-translate-y-5");
      toast.classList.add("opacity-100", "translate-y-0");

      setTimeout(() => {
        toast.classList.remove("opacity-100", "translate-y-0");
        toast.classList.add("opacity-0", "-translate-y-5");
      }, 2500);
    }
  </script>

</body>
</html>