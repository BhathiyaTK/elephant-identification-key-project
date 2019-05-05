<?php

include 'db.php';

$user_type = $_POST["type"];
$user_first_name = $_POST["first_name"];
$user_last_name = $_POST["last_name"];
$user_birthday = $_POST["birthday"];
$user_tel = $_POST["tel"];
$user_nic = $_POST["nic"];
$user_gender = $_POST["gender"];
$user_email = $_POST["email"];
$user_profession = $_POST["profession"];
$user_password = md5($_POST["password"]);
$user_confirm_pass = md5($_POST["confirm_pass"]);

if (($user_type != "")&&($user_first_name != "")&&($user_last_name != "")&&($user_birthday != "")&&($user_tel != "")&&($user_nic != "")&&($user_gender != "")&&($user_email != "")&&($user_profession != "")&&($user_password != "")&&($user_confirm_pass != "")) {

	if ($user_password == $user_confirm_pass) {
		$query_user = "INSERT INTO users(type,first_name,second_name,birthday,tel,nic,gender,email,profession,password,confirm_pass) VALUES('$user_type','$user_first_name','$user_last_name','$user_birthday','$user_tel','$user_nic','$user_gender','$user_email','$user_profession','$user_password','$user_confirm_pass')";

		if ($conn->query($query_user)) {
			echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fas fa-check-circle fa-lg"></i>
			<b>User added successfully.</b></div>';
		}else{
			echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><b>User adding failed! Check your internet connection.</b></div>';
		}
	}else{
		echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><b>Entered passwords are different! Please re-enter.</b></div>';
	}
}else{
	echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><b>All fields are required!</b></div>';
}

?>