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
			echo "<script>alert('User not found! Please input correct email and password.')</script>";
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
	<link href="https://fonts.googleapis.com/css?family=Roboto:700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Viga" rel="stylesheet">	

	<script src="js/function.js"></script>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<link rel="icon" href="images/elephant.ico">
	<title>Home | EIKSL</title>
	<script type="text/javascript">
		$(window).on("load", function() {
			$(".se-pre-con").fadeOut("slow", function(){
				$(this).remove();
			});
		});
		$(document).ready(function(){
			$("#scroll_btn").on('click', function(event) {
		      	event.preventDefault();
		      		$('html, body').animate({
			        	scrollTop: $('#about').offset().top="657px"
			      	}, 1000);
		    });	

		    if (navigator.appVersion.indexOf("Chrome/") != -1) {
				$(".divider-box").css("top","41.2%");
			}    
		});
		function initMapHome() {
	        var map = new google.maps.Map(document.getElementById('index_map'), {
	          center: new google.maps.LatLng(7.873695, 80.652169),
	          zoom: 7
	        });
	        var infoWindow = new google.maps.InfoWindow;

	          // Change this depending on the name of your PHP or XML file
	          downloadUrl('map_xml.php', function(data) {
	            var xml = data.responseXML;
	            var markers = xml.documentElement.getElementsByTagName('marker');
	            Array.prototype.forEach.call(markers, function(markerElem) {
	              var id = markerElem.getAttribute('id');
	              var name = markerElem.getAttribute('name');
                  var area = markerElem.getAttribute('area');
	              var point = new google.maps.LatLng(
	                  parseFloat(markerElem.getAttribute('lat')),
	                  parseFloat(markerElem.getAttribute('lng')));

	              var infowincontent = document.createElement('div');
	              var strong = document.createElement('strong');
	              strong.textContent = name+", "+area
	              infowincontent.appendChild(strong);
	              infowincontent.appendChild(document.createElement('br'));

	              var text = document.createElement('text');
	              text.textContent = point
	              infowincontent.appendChild(text);

	              var marker = new google.maps.Marker({
	                map: map,
	                position: point
	              });
	              marker.addListener('click', function() {
	                infoWindow.setContent(infowincontent);
	                infoWindow.open(map, marker);
	              });
	            });
	        });
	    }

	    function downloadUrl(url, callback) {
	        var request = window.ActiveXObject ?
	            new ActiveXObject('Microsoft.XMLHTTP') :
	            new XMLHttpRequest;

	        request.onreadystatechange = function() {
	          if (request.readyState == 4) {
	            request.onreadystatechange = doNothing;
	            callback(request, request.status);
	          }
	        };

	        request.open('GET', url, true);
	        request.send(null);
	    }

	      // function showLocations(){
	      //   var i;
	      //   for (i = 0; i < markers_on_map.length; i++) {
	      //     if (markers_on_map[i]) {
	      //         markers_on_map[i].setMap(null);
	      //         markers_on_map[i] = null;
	      //     }
	      //   }
	      // }

	    function doNothing() {}	
	</script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCV4UEXFCrxhJY1VYMJ9YRgq_9jCn95or0&callback=initMapHome"></script>
</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-dark">
		<!-- <div class="nav_container"> -->
			<a class="navbar-brand" href="index.php"><img src="images/eik-logo.png"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" >
			    <span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto" id="nav-links">
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
		<!-- </div> -->
	</nav>

	<section id="slider">
		<div id="slider-content">
			<div class="header-cols" id="title-col">
				<div id="scroll-btn-section">
					<div class="header-text">
						<h1>Young Elephants</h1>
						<h2>Identification Key</h2>
						<div class="header-title-divider"></div>
						<div class="divider-box"></div>
						<h4>sri lanka</h4>
					</div>
					<div class="mouse_scroll">
				        <div class="scroll_spans">
				          	<a href="#about" class="scrollto" id="scroll_btn">
				            	<span class="m_scroll_arrows unu"></span>
				            	<span class="m_scroll_arrows doi"></span>
				            	<span class="m_scroll_arrows trei"></span>
				        	</a>
				        </div>
					</div>
				</div>
			</div>
			<div class="header-cols">
				<div id="carouselExampleControls" class="carousel slide carousel-fade" data-ride="carousel">
					<ol class="carousel-indicators">
					    <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
					    <li data-target="#carouselExampleControls" data-slide-to="1"></li>
					    <li data-target="#carouselExampleControls" data-slide-to="2"></li>
					    <li data-target="#carouselExampleControls" data-slide-to="3"></li>
					</ol>
				  	<div class="carousel-inner">
				    	<div class="carousel-item active">
				      		<img src="images/header/header-img1-1.jpg" class="d-block w-100" alt="...">
				    	</div>
				    	<div class="carousel-item">
				      		<img src="images/header/header-img2-1.jpg" class="d-block w-100" alt="...">
				    	</div>
				    	<div class="carousel-item">
				      		<img src="images/header/header-img3-1.jpg" class="d-block w-100" alt="...">
				    	</div>
				    	<div class="carousel-item">
				      		<img src="images/header/header-img4-1.jpg" class="d-block w-100" alt="...">
				    	</div>
				  	</div>
				</div>
			</div>
		</div>
	</section>

	<div id="about-with-scroll-btn">
		<section id="about">
			<div class="div-content" id="about-div-content">
				<div class="img-div">
					<img id="elephant-img1" src="images/elephant11.png">
					<div class="about-green-square"></div>
				</div>
				<div class="div-text">
					<p id="title">
						<h2 class="titles">About</h2>
					</p>
					<div class="small-div-part"></div>
					<p class="title-description">
						This is a pictorial web guide to Sri Lankan young elephants at Elephant Transite Home, Udawalawe. It contains the photographs of 49 young elephants rearing at Elephant Transite Home, Udawalawe. Up to date (27<sup>th</sup> of November, 2017), this guide includes the photographs of 41 traits and 137 trait states of Sri Lankan young elephants which are used to individual identification. Altogether, this website contains photographs and description of each young elephant (less than 8 years old) at Elephant Transit Home, Udawalawe and their distribution map. 
					</p>
				</div>
			</div>
		</section>
	</div>

	<section class="history-section">
		<div class="history-sec-img">
			<div class="div-content">
				<div class="div-text" id="history-div-text">
					<p id="title">
						<h2 class="titles">History</h2>
					</p>
					<div class="small-div-part"></div>
					<p class="title-description">
						All the information in this website has been organized according to the final year research project entitled <b style="font-weight: 700; letter-spacing: 1px;">“An assessment of physical characteristics of young elephants for individual identification at Elephant Transit Home, Udawalawe”</b> which was conducted by <a href="https://www.linkedin.com/in/piyumi-perera-b30975124/" target="_blank"><span>Ms. E.P.A Perera</span></a> in 2017. Ms. E.P.A Perera was an undergraduate student under the supervision of a senior lecturer <a href="https://www.linkedin.com/in/enoka-kudavidanage-44bb8619/" target="_blank"><span>Dr. E.P Kudavidanage</span></a> at Department of Natural Resources, Faculty of Applied Sciences, Sabaragamuwa University of Sri Lanka and <span style="color: #c9cc81;">Dr. Vijitha Perera</span> who is a deputy director of Department of Wildlife Conservation, Sri Lanka.
					</p>
					<p class="title-description">
						The website was designated & developed by an undergraduate student <a href="https://www.linkedin.com/in/bhathiya-kariyawasam-a77235142/" target="_blank"><span>Mr. Bhathiya Kariyawasam</span></a> under the supervision of <a href="https://www.linkedin.com/in/anuradhaherath/" target="_blank"><span>Mr. G.A.C.A Herath</span></a> who is a lecturer of Department of Computing and Information Systems, Faculty of Applied Sciences, Sabaragamuwa University of Sri Lanka. 
					</p>
				</div>
				<div class="img-div" id="history-img-div">
					<div class="history-green-square"></div>
					<img id="elephant-img2" src="images/elephant9-1.png">
				</div>
			</div>
		</div>
	</section>

	<section class="concept-section">
		<div class="concept-sec-img">
			<div class="div-content">
				<div class="img-div">
					<img id="elephant-img3" src="images/elephant1.png">
					<div class="about-green-square"></div>
				</div>
				<div class="div-text" id="concept-div-text">
					<p id="title">
						<h2 class="titles">Concept</h2>
					</p>
					<div class="small-div-part"></div>
					<p class="title-description">
						Asian elephants are super keystone species, but they have become endangered due to human elephant conflict. Therefore, extreme conservation measures are needed. To do that, the species management is the best conservation method for such kind of endangered animals. The individual identification is the first step for it. Specially, this is important in special conservation attentions such as tuskers, captive elephants, wounded elephants, conflict causing and translocate elephants.    
					</p>
					<p class="title-description">
						A key is a systematic method for individual identification of animals in addition to simple observation. However, there was no key for young elephant identification and adult context is also not applicable for them although Sri Lankan young elephant identification key has been developed using their natural physical characteristics. The key will be important to carry out the conservation and management activities for both wild and captive young elephants by individual identification.     
					</p>
					<p class="title-description guide-link-para">
						<a class="guide-link" href="guide.php">Read more <i class="fas fa-angle-double-right"></i></a>
					</p>
				</div>
			</div>
		</div>
	</section>

	<section class="data-section">
		<div class="data-sec-img">
			<div class="div-content">
				<div class="div-text" id="data-div-text">
					<p id="title">
						<h2 class="titles">Data Collection & Outcome</h2>
					</p>
					<div class="small-div-part"></div>
					<p class="title-description">
							Through the website following information are collected.
						</p>
						<p class="title-description">
							<ul style="padding-left: 15px; font-family: Roboto; font-weight: 300;">
								<li style="font-family: Roboto;">Date/ Time of observation</li>
								<li style="font-family: Roboto;">Location: City/ Village, District, lat, lon</li>
								<li style="font-family: Roboto;">Sex</li>
								<li style="font-family: Roboto;">Age</li>
								<li style="font-family: Roboto;">Four clear photographs of each young elephant(Left, Right, Front & Tail)</li>
							</ul>
						</p>
				</div>
				<div class="img-div" id="history-img-div">
					<div class="history-green-square"></div>
					<img id="elephant-img4" src="images/elephant10.png">
				</div>
			</div>
		</div>
		<!-- <div class="grass-div">
			<img src="images/grass3-1.png">
		</div> -->
	</section>

	<section class="map-section">
		<div class="mapouter">
			<div class="gmap_canvas" id="index_map">
				<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31717.969401753737!2d80.79893937855834!3d6.42664788711458!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae4075c0f3ce00b%3A0x853f2e9cf8fb14dd!2sElephant+Transit+Home!5e0!3m2!1sen!2slk!4v1553446383072" frameborder="0" allowfullscreen></iframe>
				<a href="https://www.emojilib.com"></a> -->
			</div>
			<style>
				.mapouter{position:relative;text-align:left;height:auto;width:100%;}
				.gmap_canvas {overflow:hidden;background:none!important;height:auto;width:100%;}
				#index_map{
					width: 100%;
    				height: 500px;
				}
			</style>
		</div>
	</section>

	<section class="footer_sec">
		<div class="container" id="footer-container">
			<div class="row">
				<div class="col-md-5 col-sm-12 col-lg-5" id="img-col">
					<img src="images/logo.png">
				</div>
				<div class="col-md-3 col-sm-12 col-lg-3">
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
				<div class="col-md-4 col-sm-12 col-lg-4">
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