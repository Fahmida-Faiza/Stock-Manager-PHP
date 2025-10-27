<?php
$servername= "localhost";
$username="root";
$password="";
$database="stock";
// connect a connection
$conn= mysqli_connect($servername, $username, $password,$database);
if (!$conn){
  die("sorry" . mysqli_connect_error());
}

$sno = $_GET['id'];
$sql = "SELECT * FROM stock WHERE sno = $sno";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Convert full datetime to YYYY-MM-DD for the date input
$dateValue = date('Y-m-d', strtotime($row['date']));
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Product</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.2.0/dist/full.css" rel="stylesheet">
</head>
<body class="bg-gray-50 min-h-screen p-4 md:p-8">

  <!-- Navbar -->
  <div class="navbar bg-gradient-to-r from-indigo-500 to-purple-500 shadow-xl rounded-2xl flex flex-wrap justify-between px-4 py-3 mb-6">
    <div class="flex-1">
      <a href="index.php" class="btn btn-ghost normal-case text-xl text-white flex items-center gap-2">
        📱 <span>Stock Manager</span>
      </a>
    </div>
    <div class="flex-none flex flex-col md:flex-row items-end md:items-center gap-3 md:gap-4">
      <button onclick="location.href='index.php'" class="btn btn-outline btn-white btn-sm md:btn-md rounded-full hover:bg-white hover:text-indigo-600 transition">Back</button>
    </div>
  </div>

  <!-- Edit Form Card -->
  <div class="bg-white shadow-2xl rounded-3xl p-6 md:p-10 w-full max-w-4xl mx-auto">
    <h1 class="text-2xl md:text-3xl font-bold text-indigo-600 mb-6 text-center">Edit Product</h1>

    <form method="POST" action="/Stock%20Manager%20PHP/add_product.php?" class="grid grid-cols-1 md:grid-cols-2 gap-6">

      <input type="hidden" name="snoEdit" id="snoEdit" value="<?php echo $sno; ?>">

      <!-- Date -->
      <div class="form-control w-full">
        <label class="label"><span class="label-text font-semibold">Date</span></label>
        <input type="date" name="dateEdit" id="dateEdit" value="<?php echo $dateValue; ?>" class="input input-bordered w-full bg-white" required>
      </div>

      <!-- Source -->
      <div class="form-control w-full">
        <label class="label"><span class="label-text font-semibold">Source</span></label>
        <input type="text" name="sourceEdit" id="sourceEdit" value="<?php echo $row['source']; ?>" placeholder="Source" class="input input-bordered w-full bg-white">
      </div>

      <!-- Model -->
      <div class="form-control w-full">
        <label class="label"><span class="label-text font-semibold">Model</span></label>
        <input type="text" name="modelEdit" id="modelEdit" value="<?php echo $row['model']; ?>" placeholder="Model" class="input input-bordered w-full bg-white">
      </div>

      <!-- RAM/ROM -->
      <div class="form-control w-full">
        <label class="label"><span class="label-text font-semibold">RAM/ROM</span></label>
        <input type="text" name="ramEdit" id="ramEdit" value="<?php echo $row['ram']; ?>" placeholder="e.g. 8/128GB" class="input input-bordered w-full bg-white">
      </div>

      <!-- IMEI -->
      <div class="form-control w-full">
        <label class="label"><span class="label-text font-semibold">IMEI</span></label>
        <input type="text" name="imeEdit" id="imeEdit" value="<?php echo $row['ime']; ?>" placeholder="IMEI Number" class="input input-bordered w-full bg-white">
      </div>

      <!-- Buying Price -->
      <div class="form-control w-full">
        <label class="label"><span class="label-text font-semibold">Buying Price</span></label>
        <input type="number" name="buyingEdit" id="buyingEdit" value="<?php echo $row['buying']; ?>" placeholder="Buying Price" class="input input-bordered w-full bg-white">
      </div>

      <!-- Action Buttons -->
      <div class="md:col-span-2 flex justify-end gap-4 mt-4">
        <button type="submit" class="btn btn-primary rounded-full px-6 py-2">Save</button>
        <button type="reset" class="btn btn-outline rounded-full px-6 py-2">Clear</button>
      </div>

    </form>
  </div>

</body>
</html>
