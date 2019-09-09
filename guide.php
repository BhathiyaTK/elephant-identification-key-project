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
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

	<script src="js/function.js"></script>	

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<link rel="icon" href="images/elephant.ico">
	<title>Reference | EIKSL</title>
	<script type="text/javascript">
		$(window).on("load", function() {
			$(".se-pre-con").fadeOut("slow", function(){
				$(this).remove();
			});
		});
	</script>
</head>
<body style="background: #eee;">
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
		        	<a class="nav-link active" href="guide.php">Guide</a>
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
	</nav>

	<section class="container">
		<div class="reference-title">
			<h2>Elephant Physical Character Guide</h2>
		</div>
		<div class="reference-table table-responsive-sm">
			<table class="table table-bordered">
			  <thead>
			    <tr>
			      <th colspan="3" scope="col">Trait</th>
			      <th scope="col">Status</th>
			      <th class="def-col" scope="col">Definition</th>
			      <th class="eg-col" scope="col">Example</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <td rowspan="40"><b>Ear Traits</b></td>
			      <td rowspan="3">Ear Top Fold</td>
			      <td rowspan="3">Right/Left</td>
			      <td>Not folded</td>
			      <td>Top of the right/left ear is not folded</td>
			      <td class="center-cols"><img src="images/examples/1.PNG">&nbsp<img src="images/examples/4.PNG"></td>
			    </tr>
			    <tr>
			      <td>Facing forward</td>
			      <td>Top of the right/left ear is facing forward</td>
			      <td class="center-cols"><img src="images/examples/2.PNG">&nbsp<img src="images/examples/5.PNG"></td>
			    </tr>
			    <tr>
			      <td>Folded forward</td>
			      <td>Top of the right/left ear is folded forward</td>
			      <td class="center-cols"><img src="images/examples/3.PNG">&nbsp<img src="images/examples/6.PNG"></td>
			    </tr>
			    <tr>
			      <td rowspan="7">Ear Side Fold</td>
			      <td rowspan="7">Right/Left</td>
			      <td>Not folded</td>
			      <td>Side of the right/left ear is not folded</td>
			      <td class="center-cols"><img src="images/examples/7.PNG">&nbsp<img src="images/examples/14.PNG"></td>
			    </tr>
			    <tr>
			      <td>Folded backward & forward</td>
			      <td>Side of the right/left ear is folded backward & forward</td>
			      <td class="center-cols"><img src="images/examples/8.PNG">&nbsp<img src="images/examples/15.PNG"></td>
			    </tr>
			    <tr>
			      <td>Double folded</td>
			      <td>Side of the right/left ear is double folded</td>
			      <td class="center-cols"><img src="images/examples/9.PNG">&nbsp<img src="images/examples/16.PNG"></td>
			    </tr>
			    <tr>
			      <td>Wavy folded</td>
			      <td>Side of the right/left ear is wavy folded</td>
			      <td class="center-cols"><img src="images/examples/10.PNG">&nbsp<img src="images/examples/17.PNG"></td>
			    </tr>
			    <tr>
			      <td>Folded forward slighly</td>
			      <td>Side of the right/left ear is folded forward slighly</td>
			      <td class="center-cols"><img src="images/examples/11.PNG">&nbsp<img src="images/examples/18.PNG"></td>
			    </tr>
			    <tr>
			      <td>Folded forward</td>
			      <td>Side of the right/left ear is folded forward</td>
			      <td class="center-cols"><img src="images/examples/12.PNG">&nbsp<img src="images/examples/19.PNG"></td>
			    </tr>
			    <tr>
			      <td>Folded backward</td>
			      <td>Side of the right/left ear is folded backward</td>
			      <td class="center-cols"><img src="images/examples/13.PNG">&nbsp<img src="images/examples/20.PNG"></td>
			    </tr>
			    <tr>
			      <td rowspan="2">Ear Angle</td>
			      <td rowspan="2">Right/Left</td>
			      <td>Angled away from the head</td>
			      <td>The right/left ear is angled away from the head</td>
			      <td class="center-cols"><img src="images/examples/21.PNG">&nbsp<img src="images/examples/23.PNG"></td>
			    </tr>
			    <tr>
			      <td>Not angled away</td>
			      <td>The right/left ear is not angled away from the head</td>
			      <td class="center-cols"><img src="images/examples/22.PNG">&nbsp<img src="images/examples/24.PNG"></td>
			    </tr>
			    <tr>
			    	<td rowspan="3">Ear lobe inner edge shape</td>
			    	<td rowspan="3">Right/Left</td>
			    	<td>Straight ears</td>
			    	<td>The inner edge of the right/left ear lobe is straight</td>
			    	<td class="center-cols"><img src="images/examples/25.PNG">&nbsp<img src="images/examples/28.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Partially straight ears</td>
			    	<td>The inner edge of the right/left ear is straight & curved</td>
			    	<td class="center-cols"><img src="images/examples/26.PNG">&nbsp<img src="images/examples/29.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Curved ears</td>
			    	<td>The inner edge of right ear is curved</td>
			    	<td class="center-cols"><img src="images/examples/27.PNG">&nbsp<img src="images/examples/30.PNG"></td>
			    </tr>
			    <tr>
			      <td rowspan="3">Ear Lobe Length</td>
			      <td rowspan="3">Right/Left</td>
			      <td>Pointed</td>
			      <td>If the distance between the lowest tip of the right/left ear and the lower margin of the right/left ear is more than one-fourth the distance between the lowest tip of the ear and the upper parallel line</td>
			      <td class="center-cols"><img src="images/examples/31.PNG">&nbsp<img src="images/examples/34.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Average</td>
			    	<td>If the tip extends below the line through the lower margin of the right/left ear, but the distance between the tip of the right/left ear and the lower margin of the right/left ear is less than one-fourth the distance between the tip of the right/left ear and the upper parallel line</td>
			    	<td class="center-cols"><img src="images/examples/32.PNG">&nbsp<img src="images/examples/35.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Blunt</td>
			    	<td>If the tip of the right/left ear not extends below the line through the lower margin of the right/left ear </td>
			    	<td class="center-cols"><img src="images/examples/33.PNG">&nbsp<img src="images/examples/36.PNG"></td>
			    </tr>
			    <tr>
			      <td rowspan="3">Ear Length</td>
			      <td rowspan="3">Right/Left</td>
			      <td>Long</td>
			      <td>If the tip of the ear is below the jaw line</td>
			      <td class="center-cols"><img src="images/examples/37.PNG">&nbsp<img src="images/examples/40.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Medium</td>
			    	<td>Ear length is in between Long and Short</td>
			    	<td class="center-cols"><img src="images/examples/38.PNG">&nbsp<img src="images/examples/41.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Short</td>
			    	<td>If the tip of the ear is above the jaw line and the distance between the tip of the ear and the jaw line is more than onefourth the distance between the jaw line and the top of the skull</td>
			    	<td class="center-cols"><img src="images/examples/39.PNG">&nbsp<img src="images/examples/42.PNG"></td>
			    </tr>
			    <tr>
			      <td rowspan="2">Ear Depigmentation</td>
			      <td rowspan="2">Right/Left</td>
			      <td>Present</td>
			      <td>Depigmentation is present in the right ear</td>
			      <td class="center-cols"><img src="images/examples/43.PNG">&nbsp<img src="images/examples/45.PNG"></td>
			    </tr>
			    <tr>
			    	<td>None</td>
			    	<td>Depigmentation is absent in the right ear</td>
			    	<td class="center-cols"><img src="images/examples/44.PNG">&nbsp<img src="images/examples/46.PNG"></td>
			    </tr>
			    <tr>
			      <td rowspan="5">Ear Nick</td>
			      <td rowspan="5">Right/Left</td>
			      <td>Before the side fold</td>
			      <td>Depigmentation is present in the right/left ear</td>
			      <td class="center-cols"><img src="images/examples/47.PNG">&nbsp<img src="images/examples/52.PNG"></td>
			    </tr>
			    <tr>
			    	<td>At the side fold</td>
			    	<td>Depigmentation is absent in the right/left ear</td>
			    	<td class="center-cols"><img src="images/examples/48.PNG">&nbsp<img src="images/examples/53.PNG"></td>
			    </tr>
			    <tr>
			    	<td>After the side fold</td>
			    	<td>Nick is present after the side fold of the right/left ear</td>
			    	<td class="center-cols"><img src="images/examples/49.PNG">&nbsp<img src="images/examples/54.PNG"></td>
			    </tr>
			    <tr>
			    	<td>On the top fold</td>
			    	<td>Nick is present on the top fold of the right ear</td>
			    	<td class="center-cols"><img src="images/examples/50.PNG">&nbsp</td>
			    </tr>
			    <tr>
			    	<td>None</td>
			    	<td>Nicks are absent in the right/left ear</td>
			    	<td class="center-cols"><img src="images/examples/51.PNG">&nbsp<img src="images/examples/55.PNG"></td>
			    </tr>
			    <tr>
			      <td rowspan="5">Ear Tear</td>
			      <td rowspan="5">Right/Left</td>
			      <td>Before the side fold</td>
			      <td>Ear tear/s is/are present before the side fold of the right/left ear </td>
			      <td class="center-cols"><img src="images/examples/56.PNG">&nbsp<img src="images/examples/59.PNG"></td>
			    </tr>
			    <tr>
			    	<td>At the side fold</td>
			    	<td>Ear tear/s is/are present at the side fold of the right/left ear</td>
			    	<td class="center-cols"><img src="images/examples/57.PNG">&nbsp<img src="images/examples/60.PNG"></td>
			    </tr>
			    <tr>
			    	<td>After the side fold</td>
			    	<td>Ear tear/s is/are present after the side fold of the right/left ear</td>
			    	<td class="center-cols"><img src="images/examples/61.PNG">&nbsp</td>
			    </tr>
			    <tr>
			    	<td>On the top fold</td>
			    	<td>Ear tear/s is/are present on the top fold of the right/left ear </td>
			    	<td class="center-cols"><img src="images/examples/62.PNG">&nbsp</td>
			    </tr>
			    <tr>
			    	<td>None</td>
			    	<td>Ear tears are absent in the right/left ear </td>
			    	<td class="center-cols"><img src="images/examples/58.PNG">&nbsp</td>
			    </tr>
			    <tr>
			      <td rowspan="7">Ear Holes</td>
			      <td rowspan="7">Right/Left</td>
			      <td>Large, Before the side fold</td>
			      <td>Large ear hole presents before the side fold of the right/left ear </td>
			      <td class="center-cols"></td>
			    </tr>
			    <tr>
			    	<td>Large, At the side fold</td>
			      	<td>Large ear hole presents at the side fold of the right/left ear </td>
			      	<td class="center-cols"></td>
			    </tr>
			    <tr>
			    	<td>Large, After the side fold</td>
			    	<td>Large ear hole presents after the side fold of the right/left ear</td>
			    	<td class="center-cols"></td>
			    </tr>
			    <tr>
			    	<td>Small, Before the side fold</td>
			      	<td>Small ear hole presents before the side fold of the right/left ear </td>
			      	<td class="center-cols"></td>
			    </tr>
			    <tr>
			    	<td>Small, At the side fold</td>
			    	<td>Ear hole/s which is/are between half and one-tenth the size of the iris of the eye (typically one-fifth to one-sixth the size of the iris)  is/are present at the side fold of the right/left ear </td>
			    	<td class="center-cols"><img src="images/examples/63.PNG">&nbsp</td>
			    </tr>
			    <tr>
			    	<td>Small, After the side fold</td>
			    	<td>Ear hole/s which is/are between half and one-tenth the size of the iris of the eye (typically one-fifth to one-sixth the size of the iris)  is/are present before the side fold of the right/left ear </td>
			    	<td class="center-cols"><img src="images/examples/64.PNG">&nbsp</td>
			    </tr>
			    <tr>
			    	<td>None</td>
			    	<td>Ear holes are absent in the right/left ear</td>
			    	<td class="center-cols"><img src="images/examples/65.PNG">&nbsp</td>
			    </tr>
			    <tr>
			      <td rowspan="6"><b>Tusk Traits</b></td>
			      <td rowspan="2">Tusks</td>
			      <td rowspan="2">Right/Left</td>
			      <td>Visible</td>
			      <td>Tusk of the right/left side is present</td>
			      <td class="center-cols"><img src="images/examples/68.PNG">&nbsp<img src="images/examples/70.PNG"></td>
			    </tr>
			    <tr>
			      <td>Invisible</td>
			      <td>Tusk of the right/left side is absent or not visible although those are present</td>
			      <td class="center-cols"><img src="images/examples/69.PNG">&nbsp<img src="images/examples/71.PNG"></td>
			    </tr>
			    <tr>
			    	<td rowspan="4">Tushes</td>
			      	<td rowspan="4">Right/Left</td>
			      	<td>Absent</td>
			      	<td>Tush of the right/left side is absent </td>
			      	<td class="center-cols"><img src="images/examples/72.PNG">&nbsp<img src="images/examples/76.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Present inside</td>
			      	<td>Tush of the right/left side is present inside but not visible to outside</td>
			      	<td class="center-cols"><img src="images/examples/73.PNG">&nbsp<img src="images/examples/77.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Visible</td>
			      	<td>Tush of the right/left side is visible to the outside and shorter than the diameter of the iris </td>
			      	<td class="center-cols"><img src="images/examples/74.PNG">&nbsp<img src="images/examples/78.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Prominent</td>
			      	<td>Tush of the right/left side is longer than the diameter of the iris </td>
			      	<td class="center-cols"><img src="images/examples/75.PNG">&nbsp<img src="images/examples/79.PNG"></td>
			    </tr>
			    <tr>
			      <td rowspan="19"><b>Tusk Traits</b></td>
			      <td colspan="2" rowspan="5">Tail Length</td>
			      <td>Very Long</td>
			      <td>The tail extends till or below the ankle</td>
			      <td class="center-cols"><img src="images/examples/80.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Long</td>
			      	<td>The tail reaches below the knee but above the ankle</td>
			      	<td class="center-cols"><img src="images/examples/81.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Medium</td>
			      	<td>The tail reaches till the knee</td>
			      	<td class="center-cols"><img src="images/examples/82.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Short</td>
			      	<td>The tail reaches above the knee but below the abdomen</td>
			      	<td class="center-cols"><img src="images/examples/83.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Stumpy</td>
			      	<td>The tail is above the abdomen</td>
			      	<td class="center-cols"><img src="images/examples/84.PNG"></td>
			    </tr>
			    <tr>
			      <td colspan="2" rowspan="4">Tail Brush</td>
			      <td>Normal</td>
			      <td>The tail has hair with the length of twice the width of tail(normal) on both sides of the tail </td>
			      <td class="center-cols"><img src="images/examples/85.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Short anterior short posterior</td>
			      	<td>The tail has short hair on both sides </td>
			      	<td class="center-cols"><img src="images/examples/86.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Normal anterior short posterior</td>
			      	<td>The tail has hair with the normal length on the anterior side but short hair on the posterior side </td>
			      	<td class="center-cols"><img src="images/examples/87.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Short anterior normal posterior</td>
			      	<td>The tail has hair with the normal length on the posterior and short hair on the anterior side </td>
			      	<td class="center-cols"><img src="images/examples/88.PNG"></td>
			    </tr>
			    <tr>
			      <td colspan="2" rowspan="3">Tail Hair Spreading</td>
			      <td>Limited</td>
			      <td>Hair spreading of the tail is lower than the length of the longest hair of the tail </td>
			      <td class="center-cols"><img src="images/examples/89.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Average</td>
			      	<td>Hair spreading of the tail is similar to the length of the longest hair of the tail </td>
			      	<td class="center-cols"><img src="images/examples/90.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Prominent</td>
			      	<td>Hair spreading of the tail is higher than the length of the longest hair of the tail </td>
			      	<td class="center-cols"><img src="images/examples/91.PNG"></td>
			    </tr>
			    <tr>
			      <td colspan="2" rowspan="3">Tail Hair Nature</td>
			      <td>Curved</td>
			      <td>The tail hair is curved </td>
			      <td class="center-cols"><img src="images/examples/92.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Straight</td>
			      	<td>The tail hair is straight </td>
			      	<td class="center-cols"><img src="images/examples/93.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Both</td>
			      	<td>The tail hair is both type </td>
			      	<td class="center-cols"><img src="images/examples/94.PNG"></td>
			    </tr>
			    <tr>
			      <td colspan="2" rowspan="4">Tail Kink</td>
			      <td>Kinked</td>
			      <td>There is any bend in the tail excluding the tail brush</td>
			      <td class="center-cols"><img src="images/examples/95.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Curved</td>
			      	<td>The tail is bent away at the tail brush </td>
			      	<td class="center-cols"><img src="images/examples/96.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Twisted</td>
			      	<td>The tail was twisted about the vertical </td>
			      	<td class="center-cols"><img src="images/examples/97.PNG"></td>
			    </tr>
			    <tr>
			    	<td>None</td>
			      	<td>The tail is straight </td>
			      	<td class="center-cols"><img src="images/examples/98.PNG"></td>
			    </tr>
			    <tr>
			      <td rowspan="37"><b>Body Traits</b></td>
			      <td colspan="2" rowspan="10">Warts/Wounds/Lumps</td>
			      <td>None</td>
			      <td>There are no warts/wounds/lumps </td>
			      <td class="center-cols"><img src="images/examples/99.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Right body</td>
			      	<td>There are warts/wounds/lumps in right side of the body</td>
			      	<td class="center-cols"><img src="images/examples/100.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Left body</td>
			      	<td>There are warts/wounds/lumps in left side of the body</td>
			      	<td class="center-cols"><img src="images/examples/101.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Right foreleg</td>
			      	<td>There are warts/wound/lumps in right foreleg </td>
			      	<td class="center-cols"><img src="images/examples/102.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Left foreleg</td>
			      	<td>There are warts/wound/lumps in left foreleg </td>
			      	<td class="center-cols"><img src="images/examples/103.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Right hind leg</td>
			      	<td>There are warts/wound/lumps in right hind leg  </td>
			      	<td class="center-cols"><img src="images/examples/104.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Left of tail</td>
			      	<td>There are warts/wound/lumps in left of the tail </td>
			      	<td class="center-cols"><img src="images/examples/105.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Right side of head</td>
			      	<td>There are warts/wound/lumps in right side of the head </td>
			      	<td class="center-cols"><img src="images/examples/106.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Left side of head</td>
			      	<td>There are warts/wound/lumps in left side of the head </td>
			      	<td class="center-cols"><img src="images/examples/107.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Trunk</td>
			      	<td>There are warts/wound/lumps in the trunk </td>
			      	<td class="center-cols"><img src="images/examples/108.PNG"></td>
			    </tr>
			    <tr>
			      <td colspan="2" rowspan="3">Back shape</td>
			      <td>Flat & Broken</td>
			      <td>A flat back half the way from the pectoral girdle dropping down to a lower surface and remaining at that level till the pelvic girdle(girdles to be at almost the same height) </td>
			      <td class="center-cols"><img src="images/examples/109.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Wavy & sloping</td>
			      	<td>A back with two roughly equally high raised points( second raised point is more than three-fourths the size of the first) </td>
			      	<td class="center-cols"><img src="images/examples/110.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Humped & sloping</td>
			      	<td>A back that is Humped has a pelvic girdle, whose height is 95% or lower than the height of the pectoral girdle </td>
			      	<td class="center-cols"><img src="images/examples/111.PNG"></td>
			    </tr>
			    <tr>
			      <td colspan="2" rowspan="3">Shoulder height</td>
			      <td><= 100cm</td>
			      <td>The shoulder height is equal or less than 100cm</td>
			      <td class="center-cols"><img src="images/examples/112.PNG"></td>
			    </tr>
			    <tr>
			    	<td>100cm <= 150cm</td>
			      	<td>The shoulder height is between 100cm and 150cm</td>
			      	<td class="center-cols"><img src="images/examples/113.PNG"></td>
			    </tr>
			    <tr>
			    	<td>150cm <= 200cm</td>
			      	<td>The shoulder height is equal 150cm or between 150cm and 200cm </td>
			      	<td class="center-cols"><img src="images/examples/114.PNG"></td>
			    </tr>
			    <tr>
			      <td colspan="2" rowspan="3">Jaw shape</td>
			      <td>Straight</td>
			      <td>The jaw shape is approximately straight </td>
			      <td class="center-cols"><img src="images/examples/115.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Average</td>
			      	<td>The curvedness of the jaw with less  than the curvedness of the head </td>
			      	<td class="center-cols"><img src="images/examples/116.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Curved</td>
			      	<td>The jaw  with similar or higher curviness than the curviness of the head </td>
			      	<td class="center-cols"><img src="images/examples/117.PNG"></td>
			    </tr>
			    <tr>
			      <td colspan="2" rowspan="5">Head shape</td>
			      <td>Round</td>
			      <td>The front view of the head is rounded shape (excluding the trunk) </td>
			      <td class="center-cols"><img src="images/examples/118.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Oval</td>
			      	<td>The front view of the head is oval shape (excluding the trunk) </td>
			      	<td class="center-cols"><img src="images/examples/119.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Quardrangular</td>
			      	<td>The front view of the head is quadrangular shape (excluding the trunk) </td>
			      	<td class="center-cols"><img src="images/examples/120.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Triangular</td>
			      	<td>The front view of the head is triangular shape (excluding the trunk)</td>
			      	<td class="center-cols"><img src="images/examples/121.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Heart</td>
			      	<td>The front view of the head is heart shape (excluding the trunk) </td>
			      	<td class="center-cols"><img src="images/examples/122.PNG"></td>
			    </tr>
			    <tr>
			      <td rowspan="2">Head depigmentation</td>
			      <td rowspan="2">Right/Left</td>
			      <td>Absent</td>
			      <td>Head depigmentation is absent in right/left side of the head </td>
			      <td class="center-cols"><img src="images/examples/123.PNG">&nbsp<img src="images/examples/125.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Present</td>
			      	<td>Head depigmentation is present in right/left side of the head </td>
			      	<td class="center-cols"><img src="images/examples/124.PNG">&nbsp<img src="images/examples/126.PNG"></td>
			    </tr>
			    <tr>
			      <td colspan="2" rowspan="2">Jaw depigmentation</td>
			      <td>Absent</td>
			      <td>Jaw depigmentation is absent </td>
			      <td class="center-cols"><img src="images/examples/127.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Present</td>
			      	<td>Jaw depigmentation is present </td>
			      	<td class="center-cols"><img src="images/examples/128.PNG"></td>
			    </tr>
			    <tr>
			      <td colspan="2" rowspan="2">Trunk depigmentation</td>
			      <td>Absent</td>
			      <td>Trunk depigmentation is absent </td>
			      <td class="center-cols"><img src="images/examples/129.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Present</td>
			      	<td>Trunk depigmentation is present </td>
			      	<td class="center-cols"><img src="images/examples/130.PNG"></td>
			    </tr>
			    <tr>
			      <td colspan="2" rowspan="2">Sex</td>
			      <td>Male</td>
			      <td>Young elephants with male genital organs</td>
			      <td class="center-cols"><img src="images/examples/131.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Female</td>
			      	<td>Young elephants with female genital organs</td>
			      	<td class="center-cols"><img src="images/examples/132.PNG"></td>
			    </tr>
			    <tr>
			      <td colspan="2" rowspan="3">Age class</td>
			      <td>Calf</td>
			      <td>Age is less than 1 year </td>
			      <td class="center-cols"><img src="images/examples/133.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Juvenile</td>
			      	<td>Age is equal or between 1 and 5 years </td>
			      	<td class="center-cols"><img src="images/examples/134.PNG"></td>
			    </tr>
			    <tr>
			    	<td>Sub-Adult</td>
			      	<td>Age is equal or more than 5 years </td>
			      	<td class="center-cols"><img src="images/examples/135.PNG"></td>
			    </tr>
			    <tr>
			      <td colspan="2" rowspan="2">Physical body condition</td>
			      <td>Handicapped</td>
			      <td>Young elephants with any physical disorder such as blindness, body parts with abnormalities </td>
			      <td class="center-cols"><img src="images/examples/136.PNG"></td>
			    </tr>
			    <tr>
			    	<td>None</td>
			      	<td>Elephants without physical disorder such as blindness, body parts with abnormalities </td>
			      	<td class="center-cols"><img src="images/examples/137.PNG"></td>
			    </tr>
			  </tbody>
			</table>
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