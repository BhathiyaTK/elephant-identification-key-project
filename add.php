<?php

include 'db.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(isset($_POST["add_el"])){

		$sex = $_POST["sex"];
		$age = $_POST["age"];
		$es_fold = $_POST["es_fold"];
		$et_fold = $_POST["et_fold"];
		$e_angle = $_POST["e_angle"];
		$el_shape = $_POST["el_shape"];
		$el_length = $_POST["el_length"];
		$e_length = $_POST["e_length"];
		$e_nick_tear = $_POST["e_nick_tear"];
		$e_holes = $_POST["e_holes"];
		$e_depig = $_POST["e_depig"];
		$h_depig = $_POST["h_depig"];
		$j_depig = $_POST["j_depig"];
		$t_depig = $_POST["t_depig"];
		$j_shape = $_POST["j_shape"];
		$h_shape = $_POST["h_shape"];
		$tusks = $_POST["tusks"];
		$tushes = $_POST["tushes"];
		$t_length = $_POST["t_length"];
		$t_brush = $_POST["t_brush"];
		$th_spread = $_POST["th_spread"];
		$th_nature = $_POST["th_nature"];
		$t_kink = $_POST["t_kink"];
		$wwl = $_POST["wwl"];
		$b_shape = $_POST["b_shape"];
		$s_height = $_POST["s_height"];
		$p_body = $_POST["p_body"];
		$area = $_POST["city"];
		$longitude = $_POST["longitude"];
		$latitude = $_POST["latitude"];
		$file_front = $_FILES['img_front']['name'];
		$file_back = $_FILES['img_back']['name'];
		$file_left = $_FILES['img_left']['name'];
		$file_right = $_FILES['img_right']['name'];

	    if (($sex!=='')&&($age!=='')&&($es_fold!=='')&&($et_fold!=='')&&($e_angle!=='')&&($el_shape!=='')&&($el_length!=='')&&($e_length!=='')&&($e_nick_tear!=='')&&($e_holes!=='')&&($e_depig!=='')&&($h_depig!=='')&&($j_depig!=='')&&($t_depig!=='')&&($j_shape!=='')&&($h_shape!=='')&&($tusks!=='')&&($tushes!=='')&&($t_length!=='')&&($t_brush!=='')&&($th_spread!=='')&&($th_nature!=='')&&($t_kink!=='')&&($wwl!=='')&&($b_shape!=='')&&($s_height!=='')&&($p_body!=='')&&($area!=='')&&($file_front!=='')&&($file_back!=='')&&($file_left!=='')&&($file_right!=='')) {

	    	if(($longitude=='')&&($latitude=='')){
	    		require_once('geoplugin.class.php');
				$geoplugin = new geoPlugin();
				 
				$geoplugin->locate();

				$latitude = $geoplugin->latitude;
				$longitude = $geoplugin->longitude;

				$sql_el_details = "INSERT INTO elephants(sex,age,es_fold,et_fold,e_angle,el_shape,el_length,e_length,e_nick_tear,e_holes,e_depig,h_depig,j_depig,t_depig,j_shape,h_shape,tusks,tushes,t_length,t_brush,th_spread,th_nature,t_kink,wwl,b_shape,s_height,p_body,area,longitude,latitude,image_front,image_back,image_left,image_right) VALUES('$sex','$age','$es_fold','$et_fold','$e_angle','$el_shape','$el_length','$e_length','$e_nick_tear','$e_holes','$e_depig','$h_depig','$j_depig','$t_depig','$j_shape','$h_shape','$tusks','$tushes','$t_length','$t_brush','$th_spread','$th_nature','$t_kink','$wwl','$b_shape','$s_height','$p_body','$area','$longitude','$latitude','$file_front','$file_back','$file_left','$file_right')";
	        
		        if ($conn->query($sql_el_details)) {

		        	$folder = $_SESSION['first_name'];

		        	if ((!is_dir('uploads/'.$folder))&&(!file_exists('uploads/'.$folder))) {
		        		mkdir('uploads/'.$folder,0777);

		        		move_uploaded_file($_FILES['img_front']['tmp_name'], 'uploads/'.$folder.'/'.$file_front);
			        	move_uploaded_file($_FILES['img_back']['tmp_name'], 'uploads/'.$folder.'/'.$file_back);
			        	move_uploaded_file($_FILES['img_left']['tmp_name'], 'uploads/'.$folder.'/'.$file_left);
			        	move_uploaded_file($_FILES['img_right']['tmp_name'], 'uploads/'.$folder.'/'.$file_right);
			            $add_msg = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><b><i class="fas fa-check-circle fa-lg"></i> Elephant added successfully!</b></div>';
		        	}else{
			        	move_uploaded_file($_FILES['img_front']['tmp_name'], 'uploads/'.$folder.'/'.$file_front);
			        	move_uploaded_file($_FILES['img_back']['tmp_name'], 'uploads/'.$folder.'/'.$file_back);
			        	move_uploaded_file($_FILES['img_left']['tmp_name'], 'uploads/'.$folder.'/'.$file_left);
			        	move_uploaded_file($_FILES['img_right']['tmp_name'], 'uploads/'.$folder.'/'.$file_right);
			            $add_msg = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><b><i class="fas fa-check-circle fa-lg"></i> Elephant added successfully!</b></div>';
		        	}
		        }else{
		            $add_msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><b><i class="fas fa-exclamation-triangle fa-lg"></i> Process Failed! Check your network connection & try again</b></div>';
		        }
	    	}elseif (($longitude!=='')&&($latitude!=='')) {
	    		$sql_el_details = "INSERT INTO elephants(sex,age,es_fold,et_fold,e_angle,el_shape,el_length,e_length,e_nick_tear,e_holes,e_depig,h_depig,j_depig,t_depig,j_shape,h_shape,tusks,tushes,t_length,t_brush,th_spread,th_nature,t_kink,wwl,b_shape,s_height,p_body,area,longitude,latitude,image_front,image_back,image_left,image_right) VALUES('$sex','$age','$es_fold','$et_fold','$e_angle','$el_shape','$el_length','$e_length','$e_nick_tear','$e_holes','$e_depig','$h_depig','$j_depig','$t_depig','$j_shape','$h_shape','$tusks','$tushes','$t_length','$t_brush','$th_spread','$th_nature','$t_kink','$wwl','$b_shape','$s_height','$p_body','$area','$longitude','$latitude','$file_front','$file_back','$file_left','$file_right')";
	        
		        if ($conn->query($sql_el_details)) {

		        	$folder = $_SESSION['first_name'];
		        	mkdir('uploads/'.$folder,0777);

		        	move_uploaded_file($_FILES['img_front']['tmp_name'], 'uploads/'.$folder.'/'.$file_front);
		        	move_uploaded_file($_FILES['img_back']['tmp_name'], 'uploads/'.$folder.'/'.$file_back);
		        	move_uploaded_file($_FILES['img_left']['tmp_name'], 'uploads/'.$folder.'/'.$file_left);
		        	move_uploaded_file($_FILES['img_right']['tmp_name'], 'uploads/'.$folder.'/'.$file_right);
		            $add_msg = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><b><i class="fas fa-check-circle fa-lg"></i> Elephant added successfully!<b></div>';
		        }else{
		            $add_msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><b><i class="fas fa-exclamation-triangle fa-lg"></i> Process Failed! Check your network connection & try again</b></div>';
		        }
	    	}  
	    }else{
	        $add_msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><b><i class="fas fa-exclamation-triangle fa-lg"></i> Please fill all the <span>(*)</span> marked sections!</b></div>';
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

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<script src="js/jQuery.Form.js"></script>

	<link rel="stylesheet" href="css/fm.selectator.jquery.css">
	<script src="js/fm.selectator.jquery.js"></script>

	<script src="js/chosen.jquery.js" type="text/javascript"></script>
	<script src="js/ImageSelect.jquery.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="css/chosen.css">
	<link rel="stylesheet" type="text/css" href="css/ImageSelect.css">

	<link rel="icon" href="images/elephant2.png">
	<title>Elephant Identification Key | Add Elephant</title>
	<script type="text/javascript">
		$(window).on("load", function() {
			$(".se-pre-con").fadeOut("slow", function(){
				$(this).remove();
			});
		});
		$(document).ready(function(){
			$('.selector').selectator({
				useSearch: false
			});
			$('.selector_spec').selectator({
				useSearch: true
			});
		});
	</script>
	<style>
		p span{
			color: red;
		}
		.alert{
			font-size: 17px;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark">
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
			        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
		    </ul>
		</div>
	</nav>

	<section>
		<div class="container">
			<div class="reference-title">
				<h2>Add the Elephant's details</h2>
			</div>
			<div class="add-el-form">
				<?php
				if (isset($add_msg)) {
					echo $add_msg;
				}
				?>
				<form id="form2" action="add.php" method="POST" enctype="multipart/form-data">
					<div style="color: red; text-align: right;"><b>(*) Required Fields</b></div>
					<p><b>Elephant's biological informations <span><b>*</b></span></b></p>
					<div class="row">
					    <div class="form-group col-md-3">
					      	<label for="inputState">Sex</label>
					      	<select class="form-control form-control-sm selector" name="sex" id="sex">
					        	<option value="" selected>Choose...</option>
					        	<option value="T1S1" data-left="images/examples/131.png">Male</option>
					        	<option value="T1S2" data-left="images/examples/132.png">Female</option>
					      	</select>
					    </div>
					     <div class="form-group col-md-3">
					      	<label for="inputState">Age Class</label>
					      	<select class="form-control form-control-sm selector" name="age" id="age">
					        	<option value="" selected>Choose...</option>
					        	<option value="T2S1" data-left="images/examples/133.png">Calf</option>
					        	<option value="T2S2" data-left="images/examples/134.png">Juvenile</option>
					        	<option value="T2S3" data-left="images/examples/135.png">Sub-adult</option>
					      	</select>
					    </div>
					</div>
					<div class="row">
					    <div class="form-group col-md-4">
					      	<label for="inputState">Ear Side Fold</label>
					      	<select class="form-control form-control-sm selector" name="es_fold" id="es_fold">
					        	<option value="" selected>Choose...</option>
					        	<option value="T3S1" data-left="images/examples/7.png">Not folded</option>
					        	<option value="T3S2" data-left="images/examples/8.png">Folded backward & forward</option>
					        	<option value="T3S3" data-left="images/examples/9.png">Double folded</option>
					        	<option value="T3S4" data-left="images/examples/10.png">Wavy folded</option>
					        	<option value="T3S5" data-left="images/examples/11.png">Folded forward slighly</option>
					        	<option value="T3S6" data-left="images/examples/12.png">Folded forward</option>
					        	<option value="T3S7" data-left="images/examples/13.png">Folded backward</option>
					      	</select>
					    </div>
					     <div class="form-group col-md-4">
					      	<label for="inputState">Ear Top Fold</label>
					      	<select class="form-control form-control-sm selector" name="et_fold" id="et_fold">
					        	<option value="" selected>Choose...</option>
					        	<option value="T4S1" data-left="images/examples/1.png">Not folded</option>
					        	<option value="T4S2" data-left="images/examples/2.png">Facing forward</option>
					        	<option value="T4S3" data-left="images/examples/3.png">Folded forward</option>
					      	</select>
					    </div>
					    <div class="form-group col-md-4">
					      	<label for="inputState">Ear Angle</label>
					      	<select class="form-control form-control-sm selector" name="e_angle" id="e_angle">
					        	<option value="" selected>Choose...</option>
					        	<option value="T5S1" data-left="images/examples/21.png">Angle away from the head</option>
					        	<option value="T5S2" data-left="images/examples/22.png">Not angled away</option>
					      	</select>
					    </div>
					</div>
					<div class="row">
					    <div class="form-group col-md-4">
					      	<label for="inputState">Ear Lobe Inner Edge Shape</label>
					      	<select class="form-control form-control-sm selector" name="el_shape" id="el_shape">
					        	<option value="" selected>Choose...</option>
					        	<option value="T6S1" data-left="images/examples/25.png">Straight ears</option>
					        	<option value="T6S2" data-left="images/examples/26.png">Partially straight ears</option>
					        	<option value="T6S3" data-left="images/examples/27.png">Curved ears</option>
					      	</select>
					    </div>
					    <div class="form-group col-md-4">
					      	<label for="inputState">Ear Lobe Length</label>
					      	<select class="form-control form-control-sm selector" name="el_length" id="el_length">
					        	<option value="" selected>Choose...</option>
					        	<option value="T7S1" data-left="images/examples/31.png">Pointed</option>
					        	<option value="T7S2" data-left="images/examples/32.png">Average</option>
					        	<option value="T7S3" data-left="images/examples/33.png">Blunt</option>
					      	</select>
					    </div>
					     <div class="form-group col-md-4">
					      	<label for="inputState">Ear Length</label>
					      	<select class="form-control form-control-sm selector" name="e_length" id="e_length">
					        	<option value="" selected>Choose...</option>
					        	<option value="T8S1" data-left="images/examples/37.png">Long</option>
					        	<option value="T8S2" data-left="images/examples/38.png">Medium</option>
					        	<option value="T8S3" data-left="images/examples/39.png">Short</option>
					      	</select>
					    </div>
					</div>
					<div class="row">
						<div class="form-group col-md-4">
					      	<label for="inputState">Ear Nicks & Tears</label>
					      	<select class="form-control form-control-sm selector" name="e_nick_tear" id="e_nick_tear">
					        	<option value="" selected>Choose...</option>
					        	<option value="T9S1" data-left="images/examples/47.png">Before the side fold</option>
					        	<option value="T9S2" data-left="images/examples/48.png">At the side fold</option>
					        	<option value="T9S3" data-left="images/examples/49.png">After the side fold</option>
					        	<option value="T9S4" data-left="images/examples/50.png">On the top fold</option>
					        	<option value="T9S5" data-left="images/examples/51.png">None</option>
					      	</select>
					    </div>
					     <div class="form-group col-md-4">
					      	<label for="inputState">Ear Holes</label>
					      	<select class="form-control form-control-sm selector" name="e_holes" id="e_holes">
					        	<option value="" selected>Choose...</option>
					        	<option value="T10S1">Large, Before the side fold</option>
					        	<option value="T10S2">Large, At the side fold</option>
					        	<option value="T10S3">Large, After the side fold</option>
					        	<option value="T10S4">Small, Before the side fold</option>
					        	<option value="T10S5" data-left="images/examples/63.png">Small, At the side fold</option>
					        	<option value="T10S6" data-left="images/examples/64.png">Small, After the side fold</option>
					        	<option value="T10S7" data-left="images/examples/65.png">None</option>
					      	</select>
					    </div>
					    <div class="form-group col-md-4">
					      	<label for="inputState">Ear Depigmentation</label>
					      	<select class="form-control form-control-sm selector" name="e_depig" id="e_depig">
					        	<option value="" selected>Choose...</option>
					        	<option value="T11S1" data-left="images/examples/43.png">Present</option>
					        	<option value="T11S2" data-left="images/examples/44.png">None</option>
					      	</select>
					    </div>
					</div>
					<div class="row">
					    <div class="form-group col-md-4">
					      	<label for="inputState">Head Depigmentation</label>
					      	<select class="form-control form-control-sm selector" name="h_depig" id="h_depig">
					        	<option value="" selected>Choose...</option>
					        	<option value="T12S1" data-left="images/examples/123.png">Absent</option>
					        	<option value="T12S2" data-left="images/examples/124.png">Present</option>
					      	</select>
					    </div>
					    <div class="form-group col-md-4">
					      	<label for="inputState">Jaw Depigmentation</label>
					      	<select class="form-control form-control-sm selector" name="j_depig" id="j_depig">
					        	<option value="" selected>Choose...</option>
					        	<option value="T13S1" data-left="images/examples/127.png">Absent</option>
					        	<option value="T13S2" data-left="images/examples/128.png">Present</option>
					      	</select>
					    </div>
					    <div class="form-group col-md-4">
					      	<label for="inputState">Trunk Depigmentation</label>
					      	<select class="form-control form-control-sm selector" name="t_depig" id="t_depig">
					        	<option value="" selected>Choose...</option>
					        	<option value="T14S1" data-left="images/examples/127.png">Absent</option>
					        	<option value="T14S2" data-left="images/examples/128.png">Present</option>
					      	</select>
					    </div>
					</div>
					<div class="row">
					    <div class="form-group col-md-4">
					      	<label for="inputState">Jaw Shape</label>
					      	<select class="form-control form-control-sm selector" name="j_shape" id="j_shape">
					        	<option value="" selected>Choose...</option>
					        	<option value="T15S1" data-left="images/examples/115.png">Straight</option>
					        	<option value="T15S2" data-left="images/examples/116.png">Average</option>
					        	<option value="T15S3" data-left="images/examples/117.png">Curved</option>
					      	</select>
					    </div>
					    <div class="form-group col-md-4">
					      	<label for="inputState">Head Shape</label>
					      	<select class="form-control form-control-sm selector" name="h_shape" id="h_shape">
					        	<option value="" selected>Choose...</option>
					        	<option value="T16S1" data-left="images/examples/118.png">Round</option>
					        	<option value="T16S2" data-left="images/examples/119.png">Oval</option>
					        	<option value="T16S3" data-left="images/examples/120.png">Quandangular</option>
					        	<option value="T16S4" data-left="images/examples/121.png">Triangular</option>
					        	<option value="T16S5" data-left="images/examples/122.png">Heart</option>
					      	</select>
					    </div>
					    <div class="form-group col-md-4">
					      	<label for="inputState">Tusks</label>
					      	<select class="form-control form-control-sm selector" name="tusks" id="tusks">
					        	<option value="" selected>Choose...</option>
					        	<option value="T17S1" data-left="images/examples/68.png">Visible</option>
					        	<option value="T17S2" data-left="images/examples/69.png">Invisible</option>
					      	</select>
					    </div>
					</div>
					<div class="row">
					    <div class="form-group col-md-4">
					      	<label for="inputState">Tushes</label>
					      	<select class="form-control form-control-sm selector" name="tushes" id="tushes">
					        	<option value="" selected>Choose...</option>
					        	<option value="T18S1" data-left="images/examples/72.png">Absent</option>
					        	<option value="T18S2" data-left="images/examples/73.png">Present inside</option>
					        	<option value="T18S3" data-left="images/examples/74.png">Visible</option>
					        	<option value="T18S4" data-left="images/examples/75.png">Prominent</option>
					      	</select>
					    </div>
					    <div class="form-group col-md-4">
					      	<label for="inputState">Tail Length</label>
					      	<select class="form-control form-control-sm selector" name="t_length" id="t_length">
					        	<option value="" selected>Choose...</option>
					        	<option value="T18S1" data-left="images/examples/80.png">Very Long</option>
					        	<option value="T18S2" data-left="images/examples/81.png">Long</option>
					        	<option value="T18S3" data-left="images/examples/82.png">Medium</option>
					        	<option value="T18S4" data-left="images/examples/83.png">Short</option>
					        	<option value="T18S5" data-left="images/examples/84.png">Stumpy</option>
					      	</select>
					    </div>
					     <div class="form-group col-md-4">
					      	<label for="inputState">Tail Brush</label>
					      	<select class="form-control form-control-sm selector" name="t_brush" id="t_brush">
					        	<option value="" selected>Choose...</option>
					        	<option value="T20S1" data-left="images/examples/85.png">Short anterior short posterior</option>
					        	<option value="T20S2" data-left="images/examples/86.png">Normal anterior short posterior</option>
					        	<option value="T20S3" data-left="images/examples/87.png">Short anterior normal posterior</option>
					        	<option value="T20S4" data-left="images/examples/88.png">Normal</option>
					      	</select>
					    </div>
					</div>
					<div class="row">
						<div class="form-group col-md-4">
					      	<label for="inputState">Tail Hair Spreading</label>
					      	<select class="form-control form-control-sm selector" name="th_spread" id="th_spread">
					        	<option value="" selected>Choose...</option>
					        	<option value="T21S1" data-left="images/examples/89.png">Limited</option>
					        	<option value="T21S2" data-left="images/examples/90.png">Average</option>
					        	<option value="T21S3" data-left="images/examples/91.png">Prominent</option>
					      	</select>
					    </div>
					    <div class="form-group col-md-4">
					      	<label for="inputState">Tail Hair Nature</label>
					      	<select class="form-control form-control-sm selector" name="th_nature" id="th_nature">
					        	<option value="" selected>Choose...</option>
					        	<option value="T22S1" data-left="images/examples/92.png">Curved</option>
					        	<option value="T22S2" data-left="images/examples/93.png">Straight</option>
					        	<option value="T22S3" data-left="images/examples/94.png">Both</option>
					      	</select>
					    </div>
					    <div class="form-group col-md-4">
					      	<label for="inputState">Tail Kink</label>
					      	<select class="form-control form-control-sm selector" name="t_kink" id="t_kink">
					        	<option value="" selected>Choose...</option>
					        	<option value="T23S1" data-left="images/examples/95.png">Kinked</option>
					        	<option value="T23S2" data-left="images/examples/96.png">Curved</option>
					        	<option value="T23S3" data-left="images/examples/97.png">Twisted</option>
					        	<option value="T23S4" data-left="images/examples/98.png">None</option>
					      	</select>
					    </div>
					</div>
					<div class="row">
					    <div class="form-group col-md-4">
					      	<label for="inputState">Warts/Wounds/Lumps</label>
					      	<select class="form-control form-control-sm selector" name="wwl" id="wwl">
					        	<option value="" selected>Choose...</option>
					        	<option value="T24S1" data-left="images/examples/99.png">None</option>
					        	<option value="T24S2" data-left="images/examples/100.png">Right body</option>
					        	<option value="T24S3" data-left="images/examples/101.png">Left body</option>
					        	<option value="T24S4" data-left="images/examples/102.png">Right foreleg</option>
					        	<option value="T24S5" data-left="images/examples/103.png">Left foreleg</option>
					        	<option value="T24S6" data-left="images/examples/104.png">Right hindleg</option>
					        	<option value="T24S7" data-left="images/examples/105.png">Left of tail</option>
					        	<option value="T24S8" data-left="images/examples/106.png">Right side of head</option>
					        	<option value="T24S9" data-left="images/examples/107.png">Left side of head</option>
					        	<option value="T24S10" data-left="images/examples/108.png">Trunk</option>
					      	</select>
					    </div>
					    <div class="form-group col-md-4">
					      	<label for="inputState">Back Shape</label>
					      	<select class="form-control form-control-sm selector" name="b_shape" id="b_shape">
					        	<option value="" selected>Choose...</option>
					        	<option value="T25S1" data-left="images/examples/109.png">Flat & broken</option>
					        	<option value="T25S2" data-left="images/examples/110.png">Wavy & sloping</option>
					        	<option value="T25S3" data-left="images/examples/111.png">Humped & sloping</option>
					      	</select>
					    </div>
					    <div class="form-group col-md-4">
					      	<label for="inputState">Shoulder Height</label>
					      	<select class="form-control form-control-sm selector" name="s_height" id="s_height">
					        	<option value="" selected>Choose...</option>
					        	<option value="T26S1" data-left="images/examples/112.png"><= 100cm</option>
					        	<option value="T26S2" data-left="images/examples/113.png">100cm <= 150cm</option>
					        	<option value="T26S3" data-left="images/examples/114.png">150cm <= 200cm</option>
					      	</select>
					    </div>
					</div>
					<div class="row">
					    <div class="form-group col-md-4">
					      	<label for="inputState">Physical body condition</label>
					      	<select class="form-control form-control-sm selector" name="p_body" id="p_body">
					        	<option value="" selected>Choose...</option>
					        	<option value="T27S1" data-left="images/examples/136.png">Handicapped</option>
					        	<option value="T27S1" data-left="images/examples/137.png">None</option>
					      	</select>
					    </div>
					</div>
				    <hr>
					<p><b>Upload elephant's photos <span><b>*</b></span></b></p>
					<div class="row">
						<div class="form-group col-md-3">
							<label for="inputState">Front-side View</label>
							<input type="file" name="img_front"/>
						</div>
						<div class="form-group col-md-3">
							<label for="inputState">Back-side View</label>
							<input type="file" name="img_back"/>
						</div>
						<div class="form-group col-md-3">
							<label for="inputState">Left-side View</label>
							<input type="file" name="img_left"/>
						</div>
						<div class="form-group col-md-3">
							<label for="inputState">Right-side View</label>
							<input type="file" name="img_right"/>
						</div>
					</div>
					<hr>
					<p><b>Elephant's geograpical location informations</b></p>
					<div class="row">
						<div class="form-group col-md-4">
					      	<label for="inputState">Area</label>
					      	<select class="form-control form-control-sm selector_spec" name="city" id="city">
					        	<option value="" selected>Choose...</option>
					        	<?php
					        	$sql2 = "SELECT * FROM cities";
					        	$sql2_rslts = mysqli_query($conn,$sql2);

					        	while ($row = mysqli_fetch_array($sql2_rslts)) {
					        		echo '<option value="'.$row["name"].'">'.$row["name"].'</option>';
					        	}
					        	?>
					      	</select>
					    </div>
					    <div class="form-group col-md-4">
					      	<label for="inputState">Longitude <i>(Optional)</i></label>
					      	<input type="text" class="form-control form-control-sm" name="longitude" id="longitude" placeholder="Enter longitude value here...">
					    </div>
					    <div class="form-group col-md-4">
					      	<label for="inputState">Latitude <i>(Optional)</i></label>
					      	<input type="text" class="form-control form-control-sm" name="latitude" id="latitude" placeholder="Enter latitude value here...">
					    </div>
					</div>
					<hr>
					<div class="button-div" id="check-button-div">
				    	<button type="submit" class="btn btn-success form-button" id="add_el" name="add_el"><i class="fas fa-plus"></i> Add Elephant</button>
				    </div>
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