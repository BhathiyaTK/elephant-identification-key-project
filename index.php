<?php 

include 'db.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){

	if(isset($_POST["signin"])){
		$email = $_POST["email"];
      	$password = md5($_POST["password"]);

       	$query="SELECT * FROM users WHERE email='$email' AND password='$password'";
		$r=$conn->query($query);
		if($r->num_rows>0){
		    while($row=$r->fetch_assoc()){
		    	$_SESSION['id']=$row['id'];
		        $_SESSION['type']=$row['type'];
		        $_SESSION['email']=$row['email'];
		        $_SESSION['first_name']=$row['first_name'];

		        header("location: index.php");
		    }
		}else{
			echo "alert('User not found! Please input correct email and password.')";
			//$login_message = '<i class="fas fa-exclamation-triangle fa-lg"></i>User not found. Please input correct details.';
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

	<script src="js/function.js"></script>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<link rel="icon" href="images/elephant2.png">
	<title>Elephant Identification Key | Home</title>
	<script type="text/javascript">
		$(window).on("load", function() {
			$(".se-pre-con").fadeOut("slow", function(){
				$(this).remove();
			});
		});
	</script>
</head>

<body style="background-color: #c9c9c9;">

	<nav class="navbar navbar-expand-lg navbar-dark">
		<a class="navbar-brand" href="index.php"><img src="images/eik-logo.png"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" >
		    <span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto" id="nav-links">
		      	<li class="nav-item">
		        	<a class="nav-link active" href="index.php">Home</a>
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
			      	} ?>
		      		<li class="nav-item">
		      			<a class="btn btn-danger btn-sm" id="sign_out_btn" href="signout.php"><i class="fas fa-sign-out-alt"></i><span>|</span>SIGN OUT</a>
		      		</li>
		      		<li class="nav-item" id="user-name"><?php echo "Hello, ".$_SESSION["first_name"]." !"; ?></li>
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
				          	<div class="dropdown-divider"></div>
				          	<h6 class="dropdown-header">New around here?</h6>
				          	<a class="dropdown-item btn-sm" id="sign-up-btn" href="signup.php"><i class="fas fa-user-plus"></i><span>|</span>Sign Up</a>
				        </div>
				    </li>
		      	<?php
		      	}
		      	?>
		    </ul>
		</div>
	</nav>

	<section id="slider">
		<div id="slider-content">
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			  	<div class="carousel-inner">
			    	<div class="carousel-item active">
			      		<img src="images/elephant5.png" class="d-block w-100" alt="...">
			    	</div>
			    	<div class="carousel-item">
			      		<img src="images/elephant6.jpg" class="d-block w-100" alt="...">
			    	</div>
			    	<div class="carousel-item">
			      		<img src="images/elephant7.png" class="d-block w-100" alt="...">
			    	</div>
			  	</div>
			  	<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
			    	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    	<span class="sr-only">Previous</span>
			  	</a>
			  	<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
			    	<span class="carousel-control-next-icon" aria-hidden="true"></span>
			    	<span class="sr-only">Next</span>
			  	</a>
			</div>
		</div>
	</section>
	
	<section id="scroll-btn-section">
		<div class="scroll-horizontal-line"></div>
		<div class="curved-divs">
			<div class="curved-div-front"></div>
			<div class="curved-div-middle">
				<div class="mouse_scroll">
					<a href="#about" class="scrollto">
			          	<div>
			            	<span class="m_scroll_arrows unu"></span>
			            	<span class="m_scroll_arrows doi"></span>
			            	<span class="m_scroll_arrows trei"></span>
			          	</div>
			        </a>
				</div>	
			</div>
			<div class="curved-div-back"></div>
		</div>
	</section>

	<section id="about">
		<div class="about-container">
			<div class="row about-div-content">
				<div class="col-sm-12 col-md-3">
					<img id="elephant-img1" src="images/elephant1.png">
				</div>
				<div class="col-sm-12 col-md-9" id="about-div-text">
					<p id="about-title">
						<h2 class="titles">About</h2>
					</p>
					<div class="small-div-part"></div>
					<p class="title-description" style="padding-right: 60px;">
						This is a pictorial web guide to Sri Lankan young elephants at Elephant Transite Home, Udawalawe. It contains the photographs of 49 young elephants rearing at Elephant Transite Home, Udawalawe. Up to date (27th of November,2017), this guide includes the photographs of 41 traits and 137 trait states of Sri Lankan young elephants which are used to individual identification. Altogether, this website contains photographs and description of each young elephant (less than 8 years old) at Elephant Transit Home, Udawalawe and their distribution map. 
					</p>
				</div>
			</div>
		</div>
	</section>

	<section class="history-section">
		<div class="dark-background">
			<div class="history-container">
				<div class="row history-div-content">
					<div class="col-sm-12 col-md-9" id="history-div-text">
						<p id="history-title">
							<h2 class="titles">History</h2>
						</p>
						<div class="small-div-part"></div>
						<p class="title-description" style="padding-right: 60px;">
							All the information in this website has been organized according to the final year research project entitled <b>“An assessment of physical characteristics of young elephants for individual identification at Elephant Transit Home, Udawalawe”</b> which was conducted by <span>Ms. E.P.A Perera</span> in 2017.  <span>Ms. E.P.A Perera</span> was an undergraduate student under the supervision of a senior lecturer <span>Dr. E.P Kudavidanage</span> at Department of Natural Resources, Faculty of Applied Sciences, Sabaragamuwa University of Sri Lanka and <span>Dr. Vijitha Perera</span> who is a deputy director of Department of Wildlife Conservation, Sri Lanka.
						</p>
						<p class="title-description" style="padding-right: 60px;">
							The website was designated by an undergraduate student <span>Mr. Bhathiya Kariyawasam</span> under the supervision of <span>Mr. G.A.C.A Herath</span> who is a lecturer of Department of Computing and Information Systems, Faculty of Applied Sciences, Sabaragamuwa University of Sri Lanka. 
						</p>
					</div>
					<div class="col-sm-12 col-md-3">
						<img id="elephant-img2" src="images/elephant9.png">
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="concept-section">
		<div class="concept-container">
			<div class="row concept-div-content">
				<div class="col-sm-12 col-md-2">
					<img id="elephant-img3" src="images/elephant11.png">
				</div>
				<div class="col-sm-12 col-md-10" id="concept-div-text">
					<p id="concept-title">
						<h2 class="titles">Concept</h2>
					</p>
					<div class="small-div-part"></div>
					<p class="title-description" style="padding-right: 60px;">
						Asian elephants are super keystone species, but they have become endangered due to human elephant conflict. Therefore, extreme conservation measures are needed. To do that, the species management is the best conservation method for such kind of endangered animals. The individual identification is the first step for it. Specially, this is important in special conservation attentions such as tuskers, captive elephants, wounded elephants, conflict causing and translocate elephants.    
					</p>
					<p class="title-description" style="padding-right: 60px;">
						A key is a systematic method for individual identification of animals in addition to simple observation. However, there was no key for young elephant identification and adult context is also not applicable for them although Sri Lankan young elephant identification key has been developed using their natural physical characteristics. The key will be important to carry out the conservation and management activities for both wild and captive young elephants by individual identification.     
					</p>
					<p class="title-description guide-link-para" style="padding-right: 60px;">
						<a class="guide-link" href="guide.php">Read more <i class="fas fa-angle-double-right"></i></a>
					</p>
				</div>
			</div>
		</div>
	</section>

	<section class="data-section">
		<div class="dark-background">
			<div class="data-container">
				<div class="row data-div-content">
					<div class="col-sm-12 col-md-9" id="data-div-text">
						<p id="data-title">
							<h2 class="titles">Data Collection & Outcome</h2>
						</p>
						<div class="small-div-part"></div>
						<p class="title-description" style="padding-right: 60px;">
							Through the website following information are collected.
						</p>
						<p class="title-description" style="padding-right: 60px;">
							<ul>
								<li>Date/ Time of observation</li>
								<li>Location: City/ Village, District, lat, lon</li>
								<li>Sex</li>
								<li>Age</li>
								<li>Four clear photographs of each young elephant(Left, Right, Front & Tail)</li>
							</ul>
						</p>
					</div>
					<div class="col-sm-12 col-md-3">
						<img id="elephant-img4" src="images/elephant10.png">
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="map-section">
		<div class="mapouter">
			<div class="gmap_canvas">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31717.969401753737!2d80.79893937855834!3d6.42664788711458!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae4075c0f3ce00b%3A0x853f2e9cf8fb14dd!2sElephant+Transit+Home!5e0!3m2!1sen!2slk!4v1553446383072" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
				<a href="https://www.emojilib.com"></a>
			</div>
			<style>
				.mapouter{position:relative;text-align:left;height:auto;width:100%;}
				.gmap_canvas {overflow:hidden;background:none!important;height:auto;width:100%;}
			</style>
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