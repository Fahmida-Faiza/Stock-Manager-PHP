
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit page</title>
</head>
<body>
    



    <form method="POST" action="/Stock%20Manager%20PHP/add_product.php" class="grid grid-cols-1 md:grid-cols-2 gap-4">
<input type="hidden"   name="snoEdit"  id="snoEdit" >

<!-- Date -->
      <div>
        <label class="label"><span class="label-text">Date</span></label>
        <input type="date" name="dateEdit" id="dateEdit" class="input input-bordered bg-white w-full" required>
      </div>

      <!-- Source -->
      <div>
        <label class="label"><span class="label-text">Source</span></label>
        <input type="text" name="sourceEdit" id="sourceEdit" class="input input-bordered bg-white w-full" placeholder="Source">
      </div>

      <!-- Model -->
      <div>
        <label class="label"><span class="label-text">Model</span></label>
        <input type="text" name="modelEdit" id="modelEdit" class="input input-bordered bg-white w-full" placeholder="Model">
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




</body>
</html>