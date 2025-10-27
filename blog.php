<?php
$url = 'https://jsonplaceholder.typicode.com/posts';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$data = json_decode($response, true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>JSON Posts</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-base-200 min-h-screen">

<div class="navbar bg-base-100 shadow-md">
  <div class="flex-1">
    <a class="btn btn-ghost text-xl font-bold">My JSON Posts</a>
  </div>
</div>

<div class="container mx-auto p-6">
  <h1 class="text-3xl font-bold mb-6 text-center">Fetched Posts</h1>

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php foreach ($data as $post): ?>
      <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition">
        <div class="card-body">
          <h2 class="card-title text-primary">
            <?= htmlspecialchars($post['title']) ?>
          </h2>
          <p class="text-gray-500">
            <?= htmlspecialchars(substr($post['body'], 0, 100)) ?>...
          </p>
          <div class="card-actions justify-end">
            <a href="single_blog.php?id=<?= $post['id'] ?>" class="btn btn-sm btn-outline btn-primary">Read More</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

</body>
</html>
