<?php
	include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" type="text/css" href="css/index_style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

	<link href="https://fonts.googleapis.com/css?family=Baloo+Chettan" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Viga" rel="stylesheet">	

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<link rel="stylesheet" href="css/fm.selectator.jquery.css">
	<script src="js/fm.selectator.jquery.js"></script>

	<script src="js/chosen.jquery.js" type="text/javascript"></script>
	<script src="js/ImageSelect.jquery.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="css/chosen.css">
	<link rel="stylesheet" type="text/css" href="css/ImageSelect.css">

	<link rel="icon" href="images/elephant2.png">
	<title>Elephant Identification Key | Admin Panel</title>
	<script type="text/javascript">
		$(window).on("load", function() {
			$(".se-pre-con").fadeOut("slow", function(){
				$(this).remove();
			});
		});
	</script>
</head>
<body>
	<script type="text/javascript">
		$(document).ready(function(){
			
		});

		//add user fuction
		$(function(){
			$("#user_add_form").on('submit', function(e4){
				e4.preventDefault();

				var type = $("#type").val();
				var first_name = $("#first_name").val();
				var last_name = $("#last_name").val();
				var birthday = $("#birthday").val();
				var tel = $("#tel").val();
				var nic = $("#nic").val();
				var gender = $("#gender").val();
				var email = $("#email").val();
				var profession = $("#profession").val();
				var password = $("#password").val();
				var confirm_pass = $("#confirm_pass").val();
				$.ajax({
					type: 'POST',
					url: 'add_user.php',
					data: {type:type, first_name:first_name, last_name:last_name, birthday:birthday, tel:tel, nic:nic, gender:gender, email:email, profession:profession, password:password, confirm_pass:confirm_pass},
					success: function(data4){
						$("#users-tbl-show-div").hide();
						$("#user-reg-alert").html(data4).show();
						$("#user_add_form")[0].reset();
					}
				});
			});
		});
		//user detail show fuction
		$(function(){
			$("#show_user_button").click(function(){
				var show_tbl_val = $(this).val();
				$("#users-tbl-show-div").toggle(100, function(){
					$.ajax({
						type : "POST",
						url : "user_detail.php",
						data : {show_tbl_val:show_tbl_val},
						success : function(show){
							$("#users-tbl-show-div").html(show);
						}
					});
				});
			});
		});
	</script>

	<nav class="navbar navbar-expand-lg navbar-dark navbar-fixed-top">
		<a class="navbar-brand" href="index.php"><img src="images/eik-logo.png"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" >
		    <span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto" id="nav-links">
		      	<li class="nav-item">
		        	<a class="nav-link" href="index.php">Home</a>
		      	</li>
		      	<li class="nav-item">
		        	<a class="nav-link" href="guide.php">Guide</a>
		      	</li>
		      	<li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          Elephants
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown1" id="dropdown-menu1">
			          	<a class="dropdown-item" href="find.php"><i class="fas fa-search"></i> Find Elephants</a>
			          	<div class="dropdown-divider"></div>
			          	<a class="dropdown-item" href="add.php"><i class="fas fa-plus"></i> Add Elephants</a>
			        </div>
			    </li>
		      	<li class="nav-item">
		        	<a class="nav-link active" href="admin.php">Admin Panel</a>
		      	</li>
		      	<li class="nav-item">
			        <a class="btn btn-danger btn-sm" id="sign_out_btn" href="signout.php"><i class="fas fa-sign-out-alt"></i><span>|</span>SIGN OUT</a>
			    </li>
			    <li class="nav-item" id="user-name"><?php echo "Hello, ".$_SESSION["first_name"]." !"; ?></li>
		    </ul>
		</div>
	</nav>

	<section>
		<div class="container">
			<div class="reference-title">
				<h2>Add users</h2>
			</div>
			<div class="admin-form-div">
				<form id="user_add_form">
					<div class="form-row">
						<div class="form-group col-md-3">
							<div class="input-group mb-2 mr-sm-2">
							    <div class="input-group-prepend">
							      	<div class="input-group-text">User Type</div>
							    </div>
							    <select id="type" class="form-control" name="type">
							        <option value="" selected>Choose...</option>
							        <option value="admin">Admin</option>
							        <option value="guest">Guest</option>
						      	</select>
							</div>
					    </div>
					</div>
				  <div class="form-row">
				    <div class="form-group col-md-4">
				      <label for="inputEmail4">First Name</label>
				      <input type="text" class="form-control form-control-sm" id="first_name" name="first_name" placeholder="First name here...">
				    </div>
				    <div class="form-group col-md-4">
				      <label for="inputEmail4">Last Name</label>
				      <input type="text" class="form-control form-control-sm" id="last_name" name="last_name" placeholder="Last name here...">
				    </div>
				    <div class="form-group col-md-4">
				      <label for="inputBirth4">Date of Birth</label>
				      <input type="text" class="form-control form-control-sm" id="birthday" name="birthday" placeholder="DD/MM/YYYY">
				    </div>
				  </div>
				  <div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="inputCity">Tel No.</label>
				      <input type="text" class="form-control form-control-sm" id="tel" name="tel" placeholder="(+94) 71 234 5678">
				    </div>
				    <div class="form-group col-md-3">
				      <label for="nic">NIC No.</label>
				      <input type="text" class="form-control form-control-sm" id="nic" name="nic" placeholder="XXXXXXXXXv">
				    </div>
				    <div class="form-group col-md-3">
				      <label for="gender">Gender</label>
				      <select id="gender" name="gender" class="form-control form-control-sm">
				        <option value="" selected>Choose...</option>
				        <option value="male">Male</option>
				        <option value="female">Female</option>
				      </select>
				    </div>
				  </div>
				  <div class="form-row">
				    <div class="form-group col-md-7">
					    <label for="email">Email Address</label>
	    				<input class="form-control form-control-sm" id="email" name="email" placeholder="example@gmail.com">
					</div>
				    <div class="form-group col-md-5">
				      <label for="profession">Profession</label>
				      <input type="text" class="form-control form-control-sm" id="profession" name="profession" placeholder="Current status">
				    </div>
				  </div>
				  <div class="form-row">
				    <div class="form-group col-md-4">
				      <label for="password">Password</label>
				      <input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="Password here">
				    </div>
				    <div class="form-group col-md-4">
				      <label for="password">Confirm Password</label>
				      <input type="password" class="form-control form-control-sm" id="confirm_pass" name="confirm_pass" placeholder="Re-enter password">
				    </div>
				  </div>
				  <div id="user-reg-alert"></div>
				  <hr>
				  <button type="submit" class="btn btn-primary" id="user_add_btn"><i class="fas fa-plus" style="padding-right: 12px;"></i>Add User</button>
				</form>
			</div>
		</div>
	</section>
	<br>
	<section class="user-table-section">
		<div class="container">
			<div class="reference-title">
				<h2>Manage users</h2>
			</div>
			<div class="user_details">
				<button type="submit" class="btn btn-warning btn-sm form-button" id="show_user_button">Show/Hide Users</button>
				<div id="users-tbl-show-div" class="table-responsive-sm table-responsive-md"></div>
			</div>
		</div>
	</section>

	<div class="grass-div">
		<img src="images/grass3-1.png">
	</div>

	<section class="footer_sec">
		<div class="container" id="footer-container">
			<div class="row">
				<div class="col-md-5 col-sm-12" id="img-col">
					<img src="images/logo.png">
				</div>
				<div class="col-md-3 col-sm-12">
					<div class="quik-links-title">
						Quik Links
					</div>
					<div class="small-div-part"></div>
					<div class="quik-links">
						<ul>
							<li><a href="index.php"><i class="fas fa-chevron-right quik-links-icons"></i>Home</a></li>
							<li><a href="guide.php"><i class="fas fa-chevron-right quik-links-icons"></i>Guide</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-4 col-sm-12">
					<div class="contact-links-title">
						Contact Us
					</div>
					<div class="small-div-part"></div>
					<div class="contact-links">
						<ul>
							<li><i class="fas fa-map-marker-alt contact-links-icons"></i>Address</li>
							<p>
								001/A, R de Mel Mawatha, Colombo, Sri Lanka.
							</p>
							<li><i class="fas fa-phone contact-links-icons"></i>Phone</li>
							<p>
								<a href="tel:">(+94) 11-1234578</a>
							</p>
							<li><i class="fas fa-envelope contact-links-icons"></i>E-mail</li>
							<p>
								<a href="mailto:">example@gmail.com</a>
							</p>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="copyright-div">
			&copy; Copyright <strong>Elephant Identification Key Research</strong><br>All Rights Reserved
		</div>
	</section>
</body>
<div class="se-pre-con"></div>
</html>