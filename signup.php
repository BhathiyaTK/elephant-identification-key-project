<?php 

include 'db.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){

	if(isset($_POST["signup_btn"])){
		$reg_name = $_POST["reg_name"];
		$reg_birthday = $_POST["reg_birthday"];
		$reg_tel = $_POST["reg_tel"];
		$reg_nic = $_POST["reg_nic"];
		$reg_gender = $_POST["reg_gender"];
		$reg_email = $_POST["reg_email"];
		$reg_profession = $_POST["reg_profession"];
		$reg_purpose = $_POST["reg_purpose"];

       	if (($reg_name != "")&&($reg_birthday != "")&&($reg_tel != "")&&($reg_nic != "")&&($reg_gender != "")&&($reg_email != "")&&($reg_profession != "")&&($reg_purpose != "")) {

            $registration_message = '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fas fa-check-circle fa-lg"></i>
			<b>Registration request has been sent successfully. Your request is now on pending state.</b></div>';

            $headers = "From: $reg_email \r\n";
            $headers .= "Reply-To: $reg_email \r\n";
            $headers .= "To: example@gmail.com \r\n";
            $headers .= "X-Mailer: PHP/" . PHP_VERSION;

            $to = "example@gmail.com";
            $subject = "Registration request for access Elephant Identification Key system";
            $body =  "$reg_name!\n $reg_birthday\n $reg_tel\n $reg_nic\n $reg_gender\n $reg_email\n $reg_profession\n $reg_purpose";

            mail($to, $subject, $body, $headers);

        }else{
            $registration_message = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fas fa-exclamation-circle fa-lg"></i><b>Sign up process failed! Please check whether all the fields has been filled and your internet connection has been stablished.</b></div>';
        }
    }
}

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
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<link rel="icon" href="images/elephant.ico">
	<title>Sign Up | EIKSL</title>
	<script type="text/javascript">
		$(window).on("load", function() {
			$(".se-pre-con").fadeOut("slow", function(){
				$(this).remove();
			});
		});
	</script>
</head>
<body id="signup-body">
	<nav class="navbar navbar-expand-lg navbar-dark" style="box-shadow: none;">
		<a class="navbar-brand" href="index.php"><img src="images/eik-logo.png"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" >
		    <span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto" id="nav-links">
		      	<li class="nav-item">
		        	<a class="nav-link" href="index.php">Home</a>
		      	</li>
		      	<li class="nav-item">
		        	<a class="nav-link" href="guide.php">Guide</a>
		      	</li>
		      	<?php if(isset($_SESSION["email"])){ ?>
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
				    <?php 
				    if(isset($_SESSION["type"])){ 
				    	if($_SESSION["type"] == "admin"){
				    ?>
					      	<li class="nav-item">
					        	<a class="nav-link" href="admin.php">Admin Panel</a>
					      	</li>
			    <?php
			      		} 
			      	}
			    } ?>
			</ul>
			<ul class="navbar-nav ml-auto" id="nav-links">
	      		<?php if(isset($_SESSION["email"])){ ?>
		      		<li class="nav-item" id="user-name"><?php echo "Hello, ".$_SESSION["first_name"]." !"; ?></li>
		      		<li class="nav-item">
		      			<a class="btn btn-danger btn-sm" id="sign_out_btn" href="signout.php"><i class="fas fa-sign-out-alt"></i><span>|</span>SIGN OUT</a>
		      		</li>
		      	<?php
		      	}else{ ?>
		      		<li class="nav-item dropdown">
				        <a class="dropdown-toggle btn btn-success btn-sm" href="#" id="sign_in_btn" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				          <i class="fas fa-sign-in-alt"></i><span>|</span>SIGN IN
				        </a>
				        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sign_in_btn">
				        	<form action="index.php" method="POST" class="px-4 py-3" id="sign_in_form">
							    <div class="form-group">
							      <label for="email"><i class="fas fa-at"></i> <b>Email address</b></label>
							      <input type="email" class="form-control form-control-sm" id="email" name="email" placeholder="email@example.com">
							    </div>
							    <div class="form-group">
							      <label for="password"><i class="fas fa-key"></i> <b>Password</b></label>
							      <input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="Password">
							    </div>
							    <input type="submit" name="signin" value="Sign in" class="btn btn-primary btn-sm" id="sign_in_btn">
							</form>
				        </div>
				    </li>
		      	<?php
		      	}
		      	?>
		    </ul>
		</div>
	</nav>

	<section class="sign-up-back">
		<div class="container">
			<div class="reference-title">
				<h2>Sign Up</h2>
			</div>
			<div class="signup-msg">
			<?php if(isset($registration_message)){
					echo $registration_message; ?>
			<?php } ?>
			</div>
			<div class="signup-form-div">
				<form method="POST" action="signup.php">
				  <div class="form-row">
				    <div class="form-group col-md-8">
				      <label for="inputEmail4"><i class="fas fa-user-alt fa-lg"></i>Full Name</label>
				      <input type="text" class="form-control form-control-sm" id="reg_name" name="reg_name" placeholder="First name & Last name">
				    </div>
				    <div class="form-group col-md-4">
				      <label for="inputBirth4"><i class="fas fa-calendar-alt fa-lg"></i>Date of Birth</label>
				      <input type="text" class="form-control form-control-sm" id="reg_birthday" name="reg_birthday" placeholder="DD/MM/YYYY">
				    </div>
				  </div>
				  <div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="inputCity"><i class="fas fa-phone fa-lg"></i>Tel No.</label>
				      <input type="text" class="form-control form-control-sm" id="reg_tel" name="reg_tel" placeholder="(+94) 71 234 5678">
				    </div>
				    <div class="form-group col-md-3">
				      <label for="nic"><i class="fas fa-id-card fa-lg"></i>NIC No.</label>
				      <input type="text" class="form-control form-control-sm" id="reg_nic" name="reg_nic" placeholder="XXXXXXXXXv">
				    </div>
				    <div class="form-group col-md-3">
				      <label for="gender"><i class="fas fa-venus-mars fa-lg"></i>Gender</label>
				      <select id="reg_gender" name="reg_gender" class="form-control form-control-sm">
				        <option value="" selected>Choose...</option>
				        <option value="male">Male</option>
				        <option value="female">Female</option>
				      </select>
				    </div>
				  </div>
				  <div class="form-row">
				    <div class="form-group col-md-7">
					    <label for="email"><i class="fas fa-at fa-lg"></i>Email Address</label>
	    				<input class="form-control form-control-sm" id="reg_email" name="reg_email" placeholder="example@gmail.com">
					</div>
				    <div class="form-group col-md-5">
				      <label for="profession"><i class="fas fa-briefcase fa-lg"></i>Profession</label>
				      <input type="text" class="form-control form-control-sm" id="reg_profession" name="reg_profession" placeholder="Current status">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="purpose"><i class="fas fa-crosshairs fa-lg"></i>Purpose of registration</label>
    				<textarea class="form-control form-control-sm" id="reg_purpose" name="reg_purpose" rows="3" placeholder="Describe reason(s) for register..."></textarea>
				  </div>
				  <hr>
				  <button type="submit" name="signup_btn" id="signup_btn" class="btn btn-primary"><i class="fas fa-paper-plane" style="padding-right: 12px;"></i>Sign Up</button>
				</form>
				
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