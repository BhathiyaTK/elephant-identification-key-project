<?php

include 'db.php';

?>
<script type="text/javascript">
	$(".selector").selectator();
</script>
<label for="inputState">Area</label>
	<?php
		$districtVal = $_POST["districtVal"];
		$sql2 = "SELECT * FROM cities WHERE m_code='$districtVal'";
		$sql2_rslts = mysqli_query($conn,$sql2);
	?>
<select class="form-control form-control-sm selector" name="city" id="city">
	<?php
		echo '<option value="" selected>Choose...</option>';
		while ($row = mysqli_fetch_array($sql2_rslts)) {
			echo '<option value="'.$row["name"].'">'.$row["name"].'</option>';
		}
	?>
</select>