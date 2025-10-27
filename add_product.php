<?php
$servername= "localhost";
$username="root";
$password="";
$database="stock";
// connect a connection
$conn= mysqli_connect($servername, $username, $password,$database);
if (!$conn){
  die("Connection failed: " . mysqli_connect_error());
}

// Check if edit mode
$editMode = false;
if(isset($_GET['id'])){
    $sno = $_GET['id'];
    $sql = "SELECT * FROM stock WHERE sno = $sno";
    $result = mysqli_query($conn, $sql);
    if($row = mysqli_fetch_assoc($result)){
        $editMode = true;
        $dateValue = date('Y-m-d', strtotime($row['date']));
        $sourceValue = $row['source'];
        $modelValue = $row['model'];
        $ramValue = $row['ram'];
        $imeValue = $row['ime'];
        $buyingValue = $row['buying'];
    }
}

// Handle POST requests
if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['snoEdit'])){
        // Update existing record
        $sno= $_POST["snoEdit"];
        $date= $_POST["dateEdit"];
        $source= $_POST["sourceEdit"];
        $model= $_POST["modelEdit"];
        $ram= $_POST["ramEdit"];
        $ime= $_POST["imeEdit"];
        $buying= $_POST["buyingEdit"];

        $sql ="UPDATE `stock` SET `date` = '$date', `source` = '$source', `model` = '$model', `ram`= '$ram', `ime` = '$ime', `buying`= '$buying' WHERE `stock`.`sno` = $sno";
        $result = mysqli_query($conn, $sql);

        if($result){
            $message = "Record updated successfully!";
        } else{
            $message = "Could not update: " . mysqli_error($conn);
        }
    } else {
        // Insert new record
        $date= $_POST["date"];
        $source= $_POST["source"];
        $model= $_POST["model"];
        $ram= $_POST["ram"];
        $ime= $_POST["ime"];
        $buying= $_POST["buying"];

        $sql ="INSERT INTO `stock` (`date`,`source`, `model`,`ram`, `ime`,`buying`) VALUES ('$date', '$source', '$model', '$ram', '$ime', '$buying')";
        $result = mysqli_query($conn, $sql);

        if($result){
            $message = "Record inserted successfully!";
        } else{
            $message = "Problem: ". mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $editMode ? "Edit Product" : "Add Product"; ?></title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 min-h-screen p-5">

<!-- Navbar -->
<div class="navbar bg-gradient-to-r from-indigo-500 to-purple-500 shadow-xl rounded-2xl mb-6 px-4 py-3">
  <div class="flex-1">
    <a href="index.php" class="btn btn-ghost normal-case text-xl text-white flex items-center gap-2">
      📱 <span>Stock Manager</span>
    </a>
  </div>
  <div class="flex-none gap-2 flex items-center">
    <button onclick="location.href='index.php'" class="btn btn-outline btn-white rounded-full hover:bg-white hover:text-indigo-600 transition">🏠 Home</button>
    <button onclick="location.href='login.php'" class="btn btn-outline btn-white rounded-full hover:bg-white hover:text-indigo-600 transition">Login</button>
  </div>
</div>

<!-- Form Card -->
<div class="max-w-4xl mx-auto bg-white shadow-2xl rounded-3xl p-6 md:p-10">
  <h2 class="text-2xl md:text-3xl font-bold mb-6 text-indigo-600 text-center">
    <?php echo $editMode ? "Edit Product" : "Add Product"; ?>
  </h2>

  <?php if(isset($message)): ?>
    <div class="alert alert-success mb-6">
      <?php echo $message; ?>
    </div>
  <?php endif; ?>

  <form method="POST" action="" class="grid grid-cols-1 md:grid-cols-2 gap-6">
    
    <?php if($editMode): ?>
      <input type="hidden" name="snoEdit" value="<?php echo $sno; ?>">
    <?php endif; ?>

    <!-- Date -->
    <div class="form-control w-full">
      <label class="label"><span class="label-text font-semibold">Date</span></label>
      <input type="date" name="<?php echo $editMode ? 'dateEdit' : 'date'; ?>" 
             value="<?php echo $editMode ? $dateValue : ''; ?>" 
             class="input input-bordered w-full bg-white" required>
    </div>

    <!-- Source -->
    <div class="form-control w-full">
      <label class="label"><span class="label-text font-semibold">Source</span></label>
      <input type="text" name="<?php echo $editMode ? 'sourceEdit' : 'source'; ?>" 
             value="<?php echo $editMode ? $sourceValue : ''; ?>" 
             placeholder="Source" class="input input-bordered w-full bg-white">
    </div>

    <!-- Model -->
    <div class="form-control w-full">
      <label class="label"><span class="label-text font-semibold">Model</span></label>
      <input type="text" name="<?php echo $editMode ? 'modelEdit' : 'model'; ?>" 
             value="<?php echo $editMode ? $modelValue : ''; ?>" 
             placeholder="Model" class="input input-bordered w-full bg-white">
    </div>

    <!-- RAM/ROM -->
    <div class="form-control w-full">
      <label class="label"><span class="label-text font-semibold">RAM/ROM</span></label>
      <input type="text" name="<?php echo $editMode ? 'ramEdit' : 'ram'; ?>" 
             value="<?php echo $editMode ? $ramValue : ''; ?>" 
             placeholder="e.g. 8/128GB" class="input input-bordered w-full bg-white">
    </div>

    <!-- IMEI -->
    <div class="form-control w-full">
      <label class="label"><span class="label-text font-semibold">IMEI</span></label>
      <input type="text" name="<?php echo $editMode ? 'imeEdit' : 'ime'; ?>" 
             value="<?php echo $editMode ? $imeValue : ''; ?>" 
             placeholder="IMEI Number" class="input input-bordered w-full bg-white">
    </div>

    <!-- Buying Price -->
    <div class="form-control w-full">
      <label class="label"><span class="label-text font-semibold">Buying Price</span></label>
      <input type="number" name="<?php echo $editMode ? 'buyingEdit' : 'buying'; ?>" 
             value="<?php echo $editMode ? $buyingValue : ''; ?>" 
             placeholder="Buying Price" class="input input-bordered w-full bg-white">
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
