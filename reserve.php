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
  <div class="navbar bg-white shadow-md rounded-xl flex flex-wrap">

    <!-- Left: Logo + Title -->
    <div class="flex-1">
      <a href="index.php" class="btn btn-ghost normal-case text-xl flex items-center gap-2">
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
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/2.3.4/js/dataTables.min.js"></script>

    <div class="hidden md:block overflow-x-auto shadow-lg rounded-lg border">
      <table  id="myTable"  class="table table-compact w-full">
        <thead class="bg-gray-200">
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
<!-- index.php end -->


<!-- edit -->
 
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
    <title>Edit page</title>
</head>
<body>
    



    <form method="POST" action="/Stock%20Manager%20PHP/add_product.php?" class="grid grid-cols-1 md:grid-cols-2 gap-4">
<input type="hidden"   name="snoEdit"  id="snoEdit"   value="<?php echo $sno; ?>" >

<input type="hidden" name="snoEdit" value="<?php echo $row['sno']; ?>">
<!-- Date -->
      <div>
        <label class="label"><span class="label-text">Date</span></label>
       
          <input 
    type="date" 
    name="dateEdit" 
    id="dateEdit" 
    class="input input-bordered bg-white w-full" 
    value="<?php echo $dateValue; ?>" 
    required
  >

      </div>

      <!-- Source -->
      <div>
        <label class="label"><span class="label-text">Source</span></label>
        <input type="text" name="sourceEdit" id="sourceEdit"      value="<?php echo $row['source']; ?>"       class="input input-bordered bg-white w-full" placeholder="Source">
      </div>

      <!-- Model -->
      <div>
        <label class="label"><span class="label-text">Model</span></label>
        <input type="text" name="modelEdit" id="modelEdit" class="input input-bordered bg-white w-full"    value="<?php echo $row['model']; ?>"  placeholder="Model">
      </div>

      <!-- RAM/ROM -->
      <div>
        <label class="label"><span class="label-text">RAM/ROM</span></label>
        <input type="text" name="ramEdit" id="ramEdit" class="input input-bordered bg-white w-full"      value="<?php echo $row['ram']; ?>"      placeholder="e.g. 8/128GB">
      </div>

      <!-- IMEI -->
      <div>
        <label class="label"><span class="label-text">IMEI</span></label>
        <input type="text" name="imeEdit" id="imeEdit"   class="input input-bordered bg-white w-full"   value="<?php echo $row['ime']; ?>"  placeholder="IMEI Number">
      </div>

      <!-- Buying Price -->
      <div>
        <label class="label"><span class="label-text">Buying Price</span></label>
        <input type="number" name="buyingEdit" id="buyingEdit" class="input input-bordered bg-white w-full"   value="<?php echo $row['buying']; ?>"   placeholder="Buying Price">
      </div>

      

      <!-- Action -->
      <div class="md:col-span-2 flex gap-2 justify-end mt-2">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="reset" class="btn">Clear</button>
      </div>


      <div >

      </div>

    </form>




</body>
</html>

<!-- add product -->
 
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




// 



if($_SERVER['REQUEST_METHOD']=="POST"){
// exit();
if(isset ( $_POST['snoEdit'])){
  // update the record
$sno= $_POST["snoEdit"];
$date= $_POST["dateEdit"];
$source= $_POST["sourceEdit"];
$model= $_POST["modelEdit"];
$ram= $_POST["ramEdit"];
$ime= $_POST["imeEdit"];
$buying= $_POST["buyingEdit"];



$sql ="UPDATE `stock` SET   `date` = '$date'  ,  `source` = '$source', `model` = '$model', `ram`= '$ram' , `ime` = '$ime' , `buying`= '$buying'      WHERE `stock`.`sno` = $sno";
$result = mysqli_query($conn, $sql);


  if($result){
    echo "update record sucessfully";
  }
  else{
    echo "couldnot update ";
  }
}

// 

else{






$date= $_POST["date"];
$source= $_POST["source"];
$model= $_POST["model"];
$ram= $_POST["ram"];
$ime= $_POST["ime"];
$buying= $_POST["buying"];



$sql ="INSERT INTO `stock` (`date`,`source`, `model`,`ram`, `ime`,`buying`) VALUES ('$date', '$source', '$model', '$ram', '$ime', '$buying')";
$result = mysqli_query($conn, $sql);


if($result){
  echo"sucessfull inserted";
}
else{
  echo"problem ". mysqli_error($conn);
}
}


}




?>
































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
      <a href="index.php" class="btn btn-ghost normal-case text-xl flex items-center gap-2">
        📱 <span>Stock Manager</span>
      </a>
    </div>
    <div class="flex-none gap-2 flex items-center">
      <button onclick="location.href='index.php'" class="btn">🏠 Home</button>
      <button onclick="location.href='login.php'" class="btn">Login</button>
    </div>
  </div>

  <!-- Product Form -->
  <div class="max-w-3xl mx-auto bg-white shadow-md rounded-xl p-6">
    <h2 class="text-2xl font-bold mb-4">Add Product</h2>

    <form method="POST" action="/Stock%20Manager%20PHP/add_product.php" class="grid grid-cols-1 md:grid-cols-2 gap-4">

      <!-- Date -->
      <div>
        <label class="label"><span class="label-text">Date</span></label>
        <input type="date" name="date" id="date" class="input input-bordered  w-full" required>
      </div>

      <!-- Source -->
      <div>
        <label class="label"><span class="label-text">Source</span></label>
        <input type="text" name="source" id="source" class="input input-bordered bg-white w-full" placeholder="Source">
      </div>

      <!-- Model -->
      <div>
        <label class="label"><span class="label-text">Model</span></label>
        <input type="text" name="model" id="model" class="input input-bordered bg-white w-full" placeholder="Model">
      </div>

      <!-- RAM/ROM -->
      <div>
        <label class="label"><span class="label-text">RAM/ROM</span></label>
        <input type="text" name="ram" id="ram" class="input input-bordered bg-white w-full" placeholder="e.g. 8/128GB">
      </div>

      <!-- IMEI -->
      <div>
        <label class="label"><span class="label-text">IMEI</span></label>
        <input type="text" name="ime" id="ime"   class="input input-bordered bg-white w-full" placeholder="IMEI Number">
      </div>

      <!-- Buying Price -->
      <div>
        <label class="label"><span class="label-text">Buying Price</span></label>
        <input type="number" name="buying" id="buying" class="input input-bordered bg-white w-full" placeholder="Buying Price">
      </div>

      

      <!-- Action -->
      <div class="md:col-span-2 flex gap-2 justify-end mt-2">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="reset" class="btn">Clear</button>
      </div>


      <div >

      </div>

    </form>
  </div>

</body>
</html>
