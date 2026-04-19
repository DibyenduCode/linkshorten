<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>URL Shortener</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

  <!-- Container -->
  <div class="min-h-screen flex items-center justify-center px-4">
    
    <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-xl">
      
      <!-- Title -->
      <h1 class="text-2xl font-bold text-center mb-6">
        🔗 URL Shortener
      </h1>

      <!-- Form -->
      <form action="shorten.php" method="post" class="space-y-4">
        
        <input 
          type="url" 
          name="url" 
          placeholder="Enter your long URL..." 
          required
          class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
        >

        <button 
          type="submit"
          class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition"
        >
          Shorten URL
        </button>

      </form>

      <!-- Result Box (PHP দিয়ে show করবে) -->
      <div class="mt-6 p-4 bg-gray-50 rounded-lg hidden" id="resultBox">
        
        <p class="text-sm text-gray-600 mb-2">Your short link:</p>
        
        <div class="flex items-center gap-2">
          <input 
            type="text" 
            id="shortUrl"
            class="flex-1 px-3 py-2 border rounded-lg text-sm"
            value="http://yourdomain.com/abc123"
            readonly
          >

          <button 
            onclick="copyLink()" 
            class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700"
          >
            Copy
          </button>
        </div>

      </div>

    </div>

  </div>

  <!-- Copy Script -->
  <script>
    function copyLink() {
      const input = document.getElementById("shortUrl");
      input.select();
      input.setSelectionRange(0, 99999);
      document.execCommand("copy");
      alert("Copied!");
    }
  </script>

</body>
</html>