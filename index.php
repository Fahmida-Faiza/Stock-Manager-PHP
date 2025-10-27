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

// ====== DELETE LOGIC ======
// MUST BE BEFORE HTML OUTPUT
if(isset($_GET['delete'])){
  $sno= $_GET['delete'];
  $sql= "DELETE FROM `stock` WHERE `sno`= $sno";
  $result = mysqli_query($conn, $sql);
  // Redirect without alert
  header("Location: index.php");
  exit();
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

</head>
<body class="p-5 bg-white">

  <!-- Navbar -->
  <div class="navbar   flex flex-wrap bg-gradient-to-r from-indigo-500 to-purple-500 shadow-xl rounded-2xl mb-6 px-4 py-3">

    <!-- Left: Logo + Title -->
    <div class="flex-1 text-white">
      <a href="index.php" class="btn btn-ghost normal-case text-xl flex items-center gap-2">
        📱 <span>Stock Manager</span>
      </a>
    </div>

    <!-- Right: Buttons + Search -->
    <div class="flex-none flex items-center gap-4">
      <button onclick="location.href='add_product.php'" class="btn btn-success text-white">+ Add Product</button>
      <button onclick="location.href='blog.php'" class="btn btn-secondary text-white">Blogs</button>

     

      <button onclick="location.href='login.php'" class="btn btn-warning">Login</button>
    </div>
  </div>

  <!-- Responsive Product Table -->
  <div class="mt-6">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/2.3.4/js/dataTables.min.js"></script>

    <div class="hidden md:block overflow-x-auto shadow-lg rounded-lg border">
      <table  id="myTable"  class="table table-compact w-full">
        <thead class="bg-blue-100 text-black">
          <tr>
            <th>SNo</th>
            <th>Date</th>
            <th>Source</th>
            <th>Model</th>
            <th>RAM/ROM</th>
            <th>IMEI</th>
            <th>Buying Price</th>
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
    <td>
      <button class='btn btn-primary'><a class='edit' href='edit.php?id=".$row['sno']."'>Edit</a></button>
      <button class='btn btn-error delete' id='d".$row['sno']."'>Delete</button>
    </td>
  </tr>";
}
?>

        </tbody>
      </table>

      <script>
  let table = new DataTable('#myTable');
</script>

<script>
  // Edit buttons (existing)
  let edits = document.getElementsByClassName('edit');
  Array.from(edits).forEach((element) => {
    element.addEventListener("click", (e) => {
      console.log("Edit ");
      let tr = e.target.parentNode.parentNode;
      let date = tr.getElementsByTagName("td")[0].innerText;
      let source = tr.getElementsByTagName("td")[1].innerText;
      let model = tr.getElementsByTagName("td")[2].innerText;
      let ram = tr.getElementsByTagName("td")[3].innerText;
      let ime = tr.getElementsByTagName("td")[4].innerText;
      let buying = tr.getElementsByTagName("td")[5].innerText;
      console.log(date, source, model, ram, ime, buying);

      dateEdit.value = date;
      sourceEdit.value = source;
      modelEdit.value = model;
      ramEdit.value = ram;
      imeEdit.value = ime;
      buyingEdit.value = buying;
      snoEdit.value = e.target.id;
      console.log(e.target.id);
    });
  });

  // ===== DELETE BUTTON FIX =====
  document.addEventListener('click', function(e){
      if(e.target && e.target.classList.contains('delete')){
          let sno = e.target.id.slice(1); // remove 'd' prefix
          if(confirm("Are you sure you want to delete this?")){
              window.location = `/Stock%20Manager%20PHP/index.php?delete=${sno}`;
          }
      }
  });
</script>

    </div>
  </div>
</body>
</html>
