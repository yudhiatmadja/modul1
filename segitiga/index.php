<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Codelab 3 - Segitiga</title>
  
  <link href="../styles/style.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .result {
      font-family: monospace;
      white-space: pre-wrap;
    }
  </style>
</head>
<body class="bg-gray-100">
  <div class="max-w-lg mx-auto mt-12 p-6">
    <h1 class="text-3xl text-center text-blue-500 font-bold">Segitiga</h1>
    <div class="bg-white shadow-lg rounded-lg p-6 mt-6">
      <form action="" method="post">
        <div class="flex items-center">
          <input type="number" name="tinggi_piramida" class="w-full px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none" placeholder="Isi tinggi segitiga" min="1" required>
          <button type="submit" name="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r-lg">Submit</button>
        </div>
      </form>

      <?php
        if (isset($_POST['submit'])) {
          $tinggi_piramida = $_POST['tinggi_piramida'];
          
          echo "<div class='result mt-6 text-center'>";
          echo "<h2 class='text-blue-500 text-2xl font-semibold'>Hasil</h2>";
          echo "<p>(Tinggi piramida: $tinggi_piramida)</p>";
          echo "<pre class='text-gray-700 text-lg mt-4'>";
          
          for($i = 1; $i <= $tinggi_piramida; $i++) {
            echo str_repeat(" ", $tinggi_piramida - $i) . str_repeat(" *", $i) . "<br>";
          }

          echo "<br>";

          for($i = $tinggi_piramida - 1; $i >= 1; $i--) {
            echo str_repeat(" ", $tinggi_piramida - $i) . str_repeat(" *", $i) . "<br>";
          }

          echo "</pre>";
          echo "</div>";
        }
      ?>
    </div>
  </div>
</body>
</html>
