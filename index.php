

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

<!-- datatable -->
<link rel="stylesheet" href="//cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css.css">
<script src="//cdn.datatables.net/2.3.4/js/dataTables.min.js"></script>





<!--  -->


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


    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/2.3.4/js/dataTables.min.js"></script>

    <div class="hidden md:block overflow-x-auto shadow-lg rounded-lg border">
      <table  id="myTable"  class="table table-compact w-full   ">
        <thead class="bg-gray-200">
          <tr>
            <th>SNo</th>
            <th>Date</th>
            <th>Source</th>
            <th>Model</th>
            <th>RAM/ROM</th>
            <th>IMEI</th>
            <th>Buying Price</th>
            <!-- <th>Selling Price</th>
            <th>Profit</th>
            <th>Status</th> -->
            <th>Action</th>
          </tr>
        </thead>
        <tbody>


      <?php

$sql = "SELECT * FROM `stock`";
$result = mysqli_query($conn, $sql);
$sno = 0;
while($row = mysqli_fetch_assoc($result)){
  $sno= $sno + 1;
  echo "<tr>
    <th scope='row'>" .$sno ."</th>
    <td>" . $row['date'] . "</td>    
    <td>" . $row['source'] . "</td>
    <td>" . $row['model'] . "</td>
    <td>" . $row['ram'] . "</td>
    <td>" . $row['ime'] . "</td>
    <td>" . $row['buying'] . "</td>
 
    <td> <a  class='edit' id=" .$row['sno']."   href = 'edit.php'>Edit </a> <a  href='/del'>Delete</a></td>
  </tr>";
}



?>




       
       
        </tbody>
      </table>


      <script>
  let table = new DataTable('#myTable');

</script>

<!-- edit -->








 <script>

 
  let edits = document.getElementsByClassName('edit');

  Array.from(edits).forEach((element) => {
    element.addEventListener("click", (e) => {
      console.log("Edit clicked");

      let tr = e.target.parentNode.parentNode;
      let date = tr.getElementsByTagName("td")[0].innerText;
      let source = tr.getElementsByTagName("td")[1].innerText;
      let model = tr.getElementsByTagName("td")[2].innerText;

      console.log(date, source, model);

        dateEdit.value= date;
        sourceEdit.value= source;
        modelEdit.value=model;
        snoEdit.value= e.target.id;
        console.log(e.target.id);


    });
  });
</script>


</script>
<!-- edit end -->




    </div>




</body>
</html>
