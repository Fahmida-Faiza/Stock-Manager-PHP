<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Product</title>
  <!-- Tailwind + DaisyUI CDN -->
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-5 bg-white"> <!-- full white background -->

  <!-- Navbar -->
  <div class="navbar bg-white shadow-md rounded-xl flex flex-wrap mb-6">
    <div class="flex-1">
      <a href="index.html" class="btn btn-ghost normal-case text-xl flex items-center gap-2">
        📱 <span>Stock Manager</span>
      </a>
    </div>
    <div class="flex-none gap-2 flex items-center">
      <button onclick="location.href='index.html'" class="btn">🏠 Home</button>
      <button onclick="location.href='login.php'" class="btn">Login</button>
    </div>
  </div>

  <!-- Product Form -->
  <div class="max-w-3xl mx-auto bg-white shadow-md rounded-xl p-6">
    <h2 class="text-2xl font-bold mb-4">Add Product</h2>

    <form method="POST" action="save_product.php" class="grid grid-cols-1 md:grid-cols-2 gap-4">

      <!-- Date -->
      <div>
        <label class="label"><span class="label-text">Date</span></label>
        <input type="date" name="date" class="input input-bordered bg-white w-full" required>
      </div>

      <!-- Source -->
      <div>
        <label class="label"><span class="label-text">Source</span></label>
        <input type="text" name="source" class="input input-bordered bg-white w-full" placeholder="Source">
      </div>

      <!-- Model -->
      <div>
        <label class="label"><span class="label-text">Model</span></label>
        <input type="text" name="model" class="input input-bordered bg-white w-full" placeholder="Model">
      </div>

      <!-- RAM/ROM -->
      <div>
        <label class="label"><span class="label-text">RAM/ROM</span></label>
        <input type="text" name="ram_rom" class="input input-bordered bg-white w-full" placeholder="e.g. 8/128GB">
      </div>

      <!-- IMEI -->
      <div>
        <label class="label"><span class="label-text">IMEI</span></label>
        <input type="text" name="imei" class="input input-bordered bg-white w-full" placeholder="IMEI Number">
      </div>

      <!-- Buying Price -->
      <div>
        <label class="label"><span class="label-text">Buying Price</span></label>
        <input type="number" name="buying_price" class="input input-bordered bg-white w-full" placeholder="Buying Price">
      </div>

      <!-- Selling Price -->
      <div>
        <label class="label"><span class="label-text">Selling Price</span></label>
        <input type="number" name="selling_price" class="input input-bordered bg-white w-full" placeholder="Selling Price">
      </div>

      <!-- Profit -->
      <div>
        <label class="label"><span class="label-text">Profit</span></label>
        <input type="number" name="profit" class="input input-bordered bg-white w-full" placeholder="Profit">
      </div>

      <!-- Status -->
      <div>
        <label class="label"><span class="label-text">Status</span></label>
        <select name="status" class="select select-bordered bg-white w-full">
          <option value="available">Available</option>
          <option value="sold">Sold</option>
        </select>
      </div>

      <!-- Action -->
      <div class="md:col-span-2 flex gap-2 justify-end mt-2">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="reset" class="btn">Clear</button>
      </div>

    </form>
  </div>

</body>
</html>
