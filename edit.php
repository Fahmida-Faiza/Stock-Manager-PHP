
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