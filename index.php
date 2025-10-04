

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


?>






























<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Stock Manager</title>
  <!-- Tailwind + DaisyUI CDN -->
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-5 bg-white">

  <!-- Navbar -->
  <div class="navbar bg-white shadow-md rounded-xl flex flex-wrap">

    <!-- Left: Logo + Title -->
    <div class="flex-1">
      <a href="#" class="btn btn-ghost normal-case text-xl flex items-center gap-2">
        📱 <span>Stock Manager</span>
      </a>
    </div>

    <!-- Right: Buttons + Search -->
    <div class="flex-none flex items-center gap-4">
      <button onclick="location.href='add_product.php'" class="btn btn-success">+ Add Product</button>

      <!-- Desktop Search -->
      <div class="hidden md:flex">
        <div class="form-control">
          <div class="input-group">
            <input type="text" placeholder="Search…" class="input input-bordered w-48 md:w-64 bg-white" />
            <button class="btn btn-square btn-info">🔍</button>
          </div>
        </div>
      </div>

      <!-- Mobile Search -->
      <div class="dropdown md:hidden">
        <div tabindex="0" role="button" class="btn btn-ghost">🔍</div>
        <div class="dropdown-content mt-3 z-[1] p-2 shadow bg-white rounded-box w-52">
          <input type="text" placeholder="Search…" class="input input-bordered w-full mb-2 bg-white" />
          <button class="btn btn-primary w-full">Search</button>
        </div>
      </div>

      <button onclick="location.href='login.php'" class="btn btn-ghost">Login</button>
    </div>
  </div>

  <!-- Responsive Product Table -->
  <div class="mt-6">
    <!-- Desktop Table -->
    <div class="hidden md:block overflow-x-auto shadow-lg rounded-lg border">
      <table class="table table-compact w-full">
        <thead class="bg-gray-200">
          <tr>
            <th>#</th>
            <th>Date</th>
            <th>Source</th>
            <th>Model</th>
            <th>RAM/ROM</th>
            <th>IMEI</th>
            <th>Buying Price</th>
            <th>Selling Price</th>
            <th>Profit</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>


      <?php

$sql = "SELECT * FROM `stock`";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
  echo "<tr>
    <th scope='row'>" . $row['sno'] ."</th>
    
    <td>" .  $row['date']. "</td>    
    <td>" .  $row['source']; "</td>
    <td>" .  $row['model']; "</td>
    <td>" .  $row['ram']; "</td>
    <td>" .  $row['ime']; "</td>
    <td>" .  $row['buying']; "</td>
    
    <td>Action</td>
  </tr>";
}

?>




          <!-- <tr class="hover:bg-gray-50 transition-all duration-150">
            <td>1</td>
            <td>2025-10-03</td>
            <td>Local Shop</td>
            <td>iPhone 15</td>
            <td>8/128GB</td>
            <td>123456789012345</td>
            <td>$800</td>
            <td>$1000</td>
            <td>$200</td>
            <td><span class="badge badge-success">Available</span></td>
            <td class="flex gap-2">
              <button class="btn btn-sm btn-info">Edit</button>
              <button class="btn btn-sm btn-error">Delete</button>
            </td>
          </tr> -->
       
        </tbody>
      </table>
    </div>

 

</body>
</html>
