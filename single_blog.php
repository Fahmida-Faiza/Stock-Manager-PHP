<?php
$id = isset($_GET['id']) ? intval($_GET['id']) : 1;
$url = "https://jsonplaceholder.typicode.com/posts/$id";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$post = json_decode($response, true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($post['title']) ?></title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-base-200 min-h-screen">



<div class="container mx-auto p-6">
  <div class="card bg-base-100 shadow-xl p-6">
    <h1 class="text-3xl font-bold text-primary mb-4"><?= htmlspecialchars($post['title']) ?></h1>
    <p class="text-gray-600 leading-relaxed"><?= nl2br(htmlspecialchars($post['body'])) ?></p>
  </div>
</div>

</body>
</html>
