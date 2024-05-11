<?php 

	include"koneksi.php";

	$id_pelamar = $_GET['id_pelamar'];


	$query = "SELECT * FROM pelamar where id_pelamar=$id_pelamar";
	$sql = mysqli_query($connect, $query);
?>

<h1>Edit Contract</h1>

<form action="update_contract.php" method="post">
  <input type="hidden" name="id" value="<?php echo $contract['id'];?>">
  <label for="name">Name:</label>
  <input type="text" name="name" id="name" value="<?php echo $contract['name'];?>">
  <br>
  <label for="description">Description:</label>
  <textarea name="description" id="description"><?php echo $contract['description'];?></textarea>
  <br>
  <label for="start_date">Start Date:</label>
  <input type="date" name="start_date" id="start_date" value="<?php echo $contract['start_date'];?>">
  <br>
  <label for="end_date">End Date:</label>
  <input type="date" name="end_date" id="end_date" value="<?php echo $contract['end_date'];?>">
  <br>
  <button type="submit">Update Contract</button>
</form>