<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Stock Manager</title>
  <!-- Tailwind + DaisyUI CDN -->
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-5 bg-white"> <!-- FULL white background -->

   <!-- Responsive Navbar -->
  <div class="navbar bg-white shadow-md rounded-xl flex flex-wrap">

    <!-- Left: Logo + Title -->
    <div class="flex-1">
      <a href="#" class="btn btn-ghost normal-case text-xl flex items-center gap-2">
        📱 <span>Stock Manager</span>
      </a>
    </div>

    <!-- Right: Buttons + Search -->
    <div class="flex-none flex items-center gap-4">
      <!-- Add Product button first -->
      <button onclick="location.href='add_product.php'" class="btn btn-success">+ Add Product</button>

      <!-- Search (hidden on mobile, visible on md+) -->
      <div class="hidden md:flex">
        <div class="form-control">
          <div class="input-group">
            <input type="text" placeholder="Search…" class="input input-bordered w-48 md:w-64 bg-white" />
            <button class="btn btn-square btn-info">🔍</button>
          </div>
        </div>
      </div>

      <!-- Search dropdown on mobile -->
      <div class="dropdown md:hidden">
        <div tabindex="0" role="button" class="btn btn-ghost">🔍</div>
        <div class="dropdown-content mt-3 z-[1] p-2 shadow bg-white rounded-box w-52">
          <input type="text" placeholder="Search…" class="input input-bordered w-full mb-2 bg-white" />
          <button class="btn btn-primary w-full">Search</button>
        </div>
      </div>

      <!-- Login button -->
      <button onclick="location.href='login.php'" class="btn btn-ghost">Login</button>
    </div>
  </div>

</body>
</html>
