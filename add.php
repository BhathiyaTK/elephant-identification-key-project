<?php

include 'db.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(isset($_POST["add_el"])){

		$user = $_SESSION["first_name"];


		$category = $_POST["category"];
		$sel_location = $_POST["sel_location"];
		$location = $_POST["location"];
		$name = $_POST["name"];
		$e_age = $_POST["e_age"];
		$e_number = $_POST["e_number"];
		$e_date = $_POST["e_date"];
		$sex = $_POST["sex"];
		$age = $_POST["age"];
		$es_fold_l = $_POST["es_fold_l"];
		$es_fold_r = $_POST["es_fold_r"];
		$et_fold_l = $_POST["et_fold_l"];
		$et_fold_r = $_POST["et_fold_r"];
		$e_angle_l = $_POST["e_angle_l"];
		$e_angle_r = $_POST["e_angle_r"];
		$el_shape_l = $_POST["el_shape_l"];
		$el_shape_r = $_POST["el_shape_r"];
		$el_length_l = $_POST["el_length_l"];
		$el_length_r = $_POST["el_length_r"];
		$e_length_l = $_POST["e_length_l"];
		$e_length_r = $_POST["e_length_r"];
		$e_nick_l = $_POST["e_nick_l"];
		$e_nick_r = $_POST["e_nick_r"];
		$e_tear_l = $_POST["e_tear_l"];
		$e_tear_r = $_POST["e_tear_r"];
		$e_holes_l = $_POST["e_holes_l"];
		$e_holes_r = $_POST["e_holes_r"];
		$e_depig_l = $_POST["e_depig_l"];
		$e_depig_r = $_POST["e_depig_r"];
		$h_depig_l = $_POST["h_depig_l"];
		$h_depig_r = $_POST["h_depig_r"];
		$j_depig = $_POST["j_depig"];
		$t_depig = $_POST["t_depig"];
		$j_shape = $_POST["j_shape"];
		$h_shape = $_POST["h_shape"];
		$tusks_l = $_POST["tusks_l"];
		$tusks_r = $_POST["tusks_r"];
		$tushes_l = $_POST["tushes_l"];
		$tushes_r = $_POST["tushes_r"];
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
		$zone = $_POST["zone"];
		$longitude = $_POST["longitude"];
		$latitude = $_POST["latitude"];
		$file_front = $_FILES['img_front']['name'];
		$file_back = $_FILES['img_back']['name'];
		$file_left = $_FILES['img_left']['name'];
		$file_right = $_FILES['img_right']['name'];

	    if (($name!=='')||($location!=='')||($sel_location!=='')||($e_number!=='')||($e_date!=='')||($category!=='')||($sex!=='')||($age!=='')||($es_fold_l!=='')||($es_fold_r!=='')||($et_fold_l!=='')||($et_fold_r!=='')||($e_angle_l!=='')||($e_angle_r!=='')||($el_shape_l!=='')||($el_shape_r!=='')||($el_length_l!=='')||($el_length_r!=='')||($e_length_l!=='')||($e_length_r!=='')||($e_nick_l!=='')||($e_nick_r!=='')||($e_tear_l!=='')||($e_tear_r!=='')||($e_holes_l!=='')||($e_holes_r!=='')||($e_depig_l!=='')||($e_depig_r!=='')||($h_depig_l!=='')||($h_depig_r!=='')||($j_depig!=='')||($t_depig!=='')||($j_shape!=='')||($h_shape!=='')||($tusks_l!=='')||($tusks_r!=='')||($tushes_l!=='')||($tushes_r!=='')||($t_length!=='')||($t_brush!=='')||($th_spread!=='')||($th_nature!=='')||($t_kink!=='')||($wwl!=='')||($b_shape!=='')||($s_height!=='')||($p_body!=='')||($area!=='')||($zone!=='')||($file_front!=='')||($file_back!=='')||($file_left!=='')||($file_right!=='')) {

	    	if(($longitude=='')&&($latitude=='')){
	    		require_once('geoplugin.class.php');
				$geoplugin = new geoPlugin();
				 
				$geoplugin->locate();

				$village = $geoplugin->city;
				$latitude = $geoplugin->latitude;
				$longitude = $geoplugin->longitude;

				$s_folder = $name;

				$front = $user."/".$s_folder."/".$file_front;
				$back = $user."/".$s_folder."/".$file_back;
				$left = $user."/".$s_folder."/".$file_left;
				$right = $user."/".$s_folder."/".$file_right;

				$sql_el_details = "INSERT INTO elephants(name,e_age,e_number,e_date,category,sel_location,location,sex,age,es_fold_l,es_fold_r,et_fold_l,et_fold_r,e_angle_l,e_angle_r,el_shape_l,el_shape_r,el_length_l,el_length_r,e_length_l,e_length_r,e_nick_l,e_nick_r,e_tear_l,e_tear_r,e_holes_l,e_holes_r,e_depig_l,e_depig_r,h_depig_l,h_depig_r,j_depig,t_depig,j_shape,h_shape,tusks_l,tusks_r,tushes_l,tushes_r,t_length,t_brush,th_spread,th_nature,t_kink,wwl,b_shape,s_height,p_body,area,zone,longitude,latitude,image_front,image_back,image_left,image_right) VALUES('$name','$e_age','$e_number','$e_date','$category','$sel_location','$location','$sex','$age','$es_fold_l','$es_fold_r','$et_fold_l','$et_fold_r','$e_angle_l','$e_angle_r','$el_shape_l','$el_shape_r','$el_length_l','$el_length_r','$e_length_l','$e_length_r','$e_nick_l','$e_nick_r','$e_tear_l','$e_tear_r','$e_holes_l','$e_holes_r','$e_depig_l','$e_depig_r','$h_depig_l','$h_depig_r','$j_depig','$t_depig','$j_shape','$h_shape','$tusks_l','$tusks_r','$tushes_l','$tushes_r','$t_length','$t_brush','$th_spread','$th_nature','$t_kink','$wwl','$b_shape','$s_height','$p_body','$area','$zone','$longitude','$latitude','$front','$back','$left','$right')";
	        
		        if ($conn->query($sql_el_details)) {

		        	$m_folder = $_SESSION['first_name'];

		        	if ((!is_dir('uploads/'.$m_folder.'/'.$s_folder))&&(!file_exists('uploads/'.$m_folder.'/'.$s_folder))) {
		        		mkdir('uploads/'.$m_folder.'/'.$s_folder,0777);

		        		move_uploaded_file($_FILES['img_front']['tmp_name'], 'uploads/'.$m_folder.'/'.$s_folder."/".$file_front);
			        	move_uploaded_file($_FILES['img_back']['tmp_name'], 'uploads/'.$m_folder.'/'.$s_folder."/".$file_back);
			        	move_uploaded_file($_FILES['img_left']['tmp_name'], 'uploads/'.$m_folder.'/'.$s_folder."/".$file_left);
			        	move_uploaded_file($_FILES['img_right']['tmp_name'], 'uploads/'.$m_folder.'/'.$s_folder."/".$file_right);
			            $add_msg = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><b><i class="fas fa-check-circle fa-lg"></i> Elephant added successfully!</b></div>';
		        	}else{
			        	move_uploaded_file($_FILES['img_front']['tmp_name'], 'uploads/'.$m_folder.'/'.$s_folder."/".$file_front);
			        	move_uploaded_file($_FILES['img_back']['tmp_name'], 'uploads/'.$m_folder.'/'.$s_folder."/".$file_back);
			        	move_uploaded_file($_FILES['img_left']['tmp_name'], 'uploads/'.$m_folder.'/'.$s_folder."/".$file_left);
			        	move_uploaded_file($_FILES['img_right']['tmp_name'], 'uploads/'.$m_folder.'/'.$s_folder."/".$file_right);
			            $add_msg = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><b><i class="fas fa-check-circle fa-lg"></i> Elephant added successfully!</b></div>';
		        	}
		        }else{
		            $add_msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><b><i class="fas fa-exclamation-triangle fa-lg"></i> Process Failed! Something went wrong. try again</b></div>';
		        }
	    	}elseif (($longitude!=='')&&($latitude!=='')) {
	    		$s_folder = $name;

	    		$front = $user."/".$s_folder."/".$file_front;
				$back = $user."/".$s_folder."/".$file_back;
				$left = $user."/".$s_folder."/".$file_left;
				$right = $user."/".$s_folder."/".$file_right;

	    		$sql_el_details = "INSERT INTO elephants(name,e_age,e_number,e_date,category,sel_location,location,sex,age,es_fold_l,es_fold_r,et_fold_l,et_fold_r,e_angle_l,e_angle_r,el_shape_l,el_shape_r,el_length_l,el_length_r,e_length_l,e_length_r,e_nick_l,e_nick_r,e_tear_l,e_tear_r,e_holes_l,e_holes_r,e_depig_l,e_depig_r,h_depig_l,h_depig_r,j_depig,t_depig,j_shape,h_shape,tusks_l,tusks_r,tushes_l,tushes_r,t_length,t_brush,th_spread,th_nature,t_kink,wwl,b_shape,s_height,p_body,area,zone,longitude,latitude,image_front,image_back,image_left,image_right) VALUES('$name','$e_age','$e_number','$e_date','$category','$sel_location','$location','$sex','$age','$es_fold_l','$es_fold_r','$et_fold_l','$et_fold_r','$e_angle_l','$e_angle_r','$el_shape_l','$el_shape_r','$el_length_l','$el_length_r','$e_length_l','$e_length_r','$e_nick_l','$e_nick_r','$e_tear_l','$e_tear_r','$e_holes_l','$e_holes_r','$e_depig_l','$e_depig_r','$h_depig_l','$h_depig_r','$j_depig','$t_depig','$j_shape','$h_shape','$tusks_l','$tusks_r','$tushes_l','$tushes_r','$t_length','$t_brush','$th_spread','$th_nature','$t_kink','$wwl','$b_shape','$s_height','$p_body','$area','$zone','$longitude','$latitude','$front','$back','$left','$right')";
	        
		        if ($conn->query($sql_el_details)) {

		        	$m_folder = $_SESSION['first_name'];

		        	if ((!is_dir('uploads/'.$m_folder.'/'.$s_folder))&&(!file_exists('uploads/'.$m_folder.'/'.$s_folder))) {
		        		mkdir('uploads/'.$m_folder.'/'.$s_folder,0777);

		        		move_uploaded_file($_FILES['img_front']['tmp_name'], 'uploads/'.$m_folder.'/'.$s_folder."/".$file_front);
			        	move_uploaded_file($_FILES['img_back']['tmp_name'], 'uploads/'.$m_folder.'/'.$s_folder."/".$file_back);
			        	move_uploaded_file($_FILES['img_left']['tmp_name'], 'uploads/'.$m_folder.'/'.$s_folder."/".$file_left);
			        	move_uploaded_file($_FILES['img_right']['tmp_name'], 'uploads/'.$m_folder.'/'.$s_folder."/".$file_right);
			            $add_msg = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><b><i class="fas fa-check-circle fa-lg"></i> Elephant added successfully!</b></div>';
		        	}else{
			        	move_uploaded_file($_FILES['img_front']['tmp_name'], 'uploads/'.$m_folder.'/'.$s_folder."/".$file_front);
			        	move_uploaded_file($_FILES['img_back']['tmp_name'], 'uploads/'.$m_folder.'/'.$s_folder."/".$file_back);
			        	move_uploaded_file($_FILES['img_left']['tmp_name'], 'uploads/'.$m_folder.'/'.$s_folder."/".$file_left);
			        	move_uploaded_file($_FILES['img_right']['tmp_name'], 'uploads/'.$m_folder.'/'.$s_folder."/".$file_right);
			            $add_msg = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><b><i class="fas fa-check-circle fa-lg"></i> Elephant added successfully!</b></div>';
		        	}
		        }else{
		            $add_msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><b><i class="fas fa-exclamation-triangle fa-lg"></i> Process Failed! Something went wrong. try again</b></div>';
		        }
	    	}  
	    }else{
	        $add_msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><b><i class="fas fa-exclamation-triangle fa-lg"></i> Please fill at least 10 fields!</b></div>';
	    } 
	}
}

if ((isset($_SESSION["first_name"])) && (isset($_SESSION["type"]))) {
	if (($_SESSION["first_name"] == '')&&($_SESSION["type"] == '')) {
		
		header("location: index.php");

	}else{

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

	<link href="css/select2.min.css" rel="stylesheet" />
	<script src="js/select2.min.js"></script>

	<link rel="icon" href="images/elephant.ico">
	<title>Add Elephant | EIKSL</title>
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
			$('#location-field').hide();
			$('#location-select').hide();

			$("#sel_location").select2({
  				tags: true,
  				// containerCssClass : all,
  				insertTag: function (data, tag) {
				    data.push(tag);
				}
			});
		});
		$(function(){
			$("#category").click(function(){
				var cate = $("#category").val(); 
				if (cate == "Wild") {
					$("#location-field").show();
					$("#location-select").hide();
				}else if(cate == "Captive"){
					$("#location-select").show();
					$("#location-field").hide();
				}else{
					$("#location-select").hide();
					$("#location-field").hide();
				}
			});
		});
	</script>
	<style>
		p span, label span{
			color: red;
		}
		.alert{
			font-size: 17px;
		}
	</style>
</head>
<body>
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
			      	} 
			    ?>
			</ul>
			<ul class="navbar-nav ml-auto" id="nav-links">
			    <li class="nav-item" id="user-name"><?php echo "Hello, ".$_SESSION["first_name"]." !"; ?></li>
		      	<li class="nav-item">
			        <a class="btn btn-danger btn-sm" id="sign_out_btn" href="signout.php"><i class="fas fa-sign-out-alt"></i><span>|</span>SIGN OUT</a>
			    </li>
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
					<p><b>Elephant's biological information <span><b>*</b></span></b></p>
					<div class="row">
						<div class="form-group col-md-3">
					      	<label for="inputState">1.) Category</label>
					      	<select class="form-control form-control-sm" name="category" id="category">
					        	<option value="" selected>Choose...</option>
					        	<option value="Captive">Captive</option>
					        	<option value="Wild">Wild</option>
					      	</select>
					    </div>
					    <div class="form-group col-md-5" id="location-select">
					      	<label for="inputState">1.1.) Captive Elephant's Location</label><br>
					      	<select class="form-control form-control-sm" name="sel_location" id="sel_location" style="width: 100%;">
					        	<option value="" selected>Choose...</option>
					        	<option value="Elephant Orphanage - Pinnawala">Elephant Orphanage - Pinnawala</option>
					        	<option value="Elephant Transit Home - Udawalawe">Elephant Transit Home - Udawalawe</option>
					      	</select>
					    </div>
					    <div class="form-group col-md-5" id="location-field">
					      	<label for="inputState">1.1.) Wild Elephant's Location</label>
					      	<input type="text" class="form-control form-control-sm" name="location" id="location" placeholder="Enter elephant's current location here...">
					    </div>
					</div>
					<div class="row">
					    <div class="form-group col-md-5">
					      	<label for="inputState">2.) Name</label>
					      	<input type="text" class="form-control form-control-sm" name="name" id="name" placeholder="Elephant's name here...">
					    </div>
					    <div class="form-group col-md-2">
					      	<label for="inputState">3.) Age</label>
					      	<input type="text" class="form-control form-control-sm" name="e_age" id="e_age" placeholder="YYs/MMs">
					    </div>
					    <div class="form-group col-md-2">
					      	<label for="inputState">4.) Number</label>
					      	<input type="text" class="form-control form-control-sm" name="e_number" id="e_number" placeholder="Elephant's no here...">
					    </div>
					    <div class="form-group col-md-3">
					      	<label for="inputState">5.) Date of observation</label>
					      	<input type="text" class="form-control form-control-sm" name="e_date" id="e_date" placeholder="DD/MM/YYYY">
					    </div>
					</div>
					<div class="row">
					    <div class="form-group col-md-4">
					      	<label for="inputState">6.) Sex</label>
					      	<select class="form-control form-control-sm selector" name="sex" id="sex">
					        	<option value="" selected>Choose...</option>
					        	<option value="T1S1" data-left="images/examples/131.PNG">Male</option>
					        	<option value="T1S2" data-left="images/examples/132.PNG">Female</option>
					      	</select>
					    </div>
					    <div class="form-group col-md-4">
					      	<label for="inputState">7.) Age Class</label>
					      	<select class="form-control form-control-sm selector" name="age" id="age">
					        	<option value="" selected>Choose...</option>
					        	<option value="T2S1" data-left="images/examples/133.PNG">Calf</option>
					        	<option value="T2S2" data-left="images/examples/134.PNG">Juvenile</option>
					        	<option value="T2S3" data-left="images/examples/135.PNG">Sub-adult</option>
					      	</select>
					    </div>
					    <div class="form-group col-md-4">
					      	<label for="inputState">8.) Shoulder Height</label>
					      	<select class="form-control form-control-sm selector" name="s_height" id="s_height">
					        	<option value="" selected>Choose...</option>
					        	<option value="T27S1" data-left="images/examples/112.PNG"><= 100cm</option>
					        	<option value="T27S2" data-left="images/examples/113.PNG">100cm <= 150cm</option>
					        	<option value="T27S3" data-left="images/examples/114.PNG">150cm <= 200cm</option>
					      	</select>
					    </div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-3">
							<label for="inputState">9.) Ear Top Fold</label>
						</div>
						<div class="col-md-1"><label for="inputState"> : </label></div>
						<div class="col-md-1"><label for="inputState">Left</label></div>
						<div class="form-group col-md-3">
					      	<select class="form-control form-control-sm selector" name="et_fold_l" id="et_fold_l">
					        	<option value="" selected>Choose...</option>
					        	<option value="T4S1L" data-left="images/examples/4.PNG">Not folded</option>
					        	<option value="T4S2L" data-left="images/examples/5.PNG">Facing forward</option>
					        	<option value="T4S3L" data-left="images/examples/6.PNG">Folded forward</option>
					      	</select>
					    </div>
					    <div class="col-md-1"><label for="inputState">Right</label></div>
					    <div class="form-group col-md-3">
					      	<select class="form-control form-control-sm selector" name="et_fold_r" id="et_fold_r">
					        	<option value="" selected>Choose...</option>
					        	<option value="T4S1R" data-left="images/examples/1.PNG">Not folded</option>
					        	<option value="T4S2R" data-left="images/examples/2.PNG">Facing forward</option>
					        	<option value="T4S3R" data-left="images/examples/3.PNG">Folded forward</option>
					      	</select>
					    </div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<label for="inputState">10.) Ear Side Fold</label>
						</div>
						<div class="col-md-1"><label for="inputState"> : </label></div>
						<div class="col-md-1"><label for="inputState">Left</label></div>
						<div class="form-group col-md-3">
					      	<select class="form-control form-control-sm selector" name="es_fold_l" id="es_fold_l">
					        	<option value="" selected>Choose...</option>
					        	<option value="T3S1L" data-left="images/examples/14.PNG">Not folded</option>
					        	<option value="T3S2L" data-left="images/examples/15.PNG">Folded backward & forward</option>
					        	<option value="T3S3L" data-left="images/examples/16.PNG">Double folded</option>
					        	<option value="T3S4L" data-left="images/examples/17.PNG">Wavy folded</option>
					        	<option value="T3S5L" data-left="images/examples/18.PNG">Folded forward slighly</option>
					        	<option value="T3S6L" data-left="images/examples/19.PNG">Folded forward</option>
					        	<option value="T3S7L" data-left="images/examples/20.PNG">Folded backward</option>
					      	</select>
					    </div>
					    <div class="col-md-1"><label for="inputState">Right</label></div>
					    <div class="form-group col-md-3">
					      	<select class="form-control form-control-sm selector" name="es_fold_r" id="es_fold_r">
					        	<option value="" selected>Choose...</option>
					        	<option value="T3S1R" data-left="images/examples/7.PNG">Not folded</option>
					        	<option value="T3S2R" data-left="images/examples/8.PNG">Folded backward & forward</option>
					        	<option value="T3S3R" data-left="images/examples/9.PNG">Double folded</option>
					        	<option value="T3S4R" data-left="images/examples/10.PNG">Wavy folded</option>
					        	<option value="T3S5R" data-left="images/examples/11.PNG">Folded forward slighly</option>
					        	<option value="T3S6R" data-left="images/examples/12.PNG">Folded forward</option>
					        	<option value="T3S7R" data-left="images/examples/13.PNG">Folded backward</option>
					      	</select>
					    </div>
					</div>
					<div class="row"> 
						<div class="col-md-3">
							<label for="inputState">11.) Ear Angle</label>
						</div>
						<div class="col-md-1"><label for="inputState"> : </label></div>
						<div class="col-md-1"><label for="inputState">Left</label></div>
					    <div class="form-group col-md-3">
					      	<select class="form-control form-control-sm selector" name="e_angle_l" id="e_angle_l">
					        	<option value="" selected>Choose...</option>
					        	<option value="T5S1L" data-left="images/examples/23.PNG">Angle away from the head</option>
					        	<option value="T5S2L" data-left="images/examples/24.PNG">Not angled away</option>
					      	</select>
					    </div>
					    <div class="col-md-1"><label for="inputState">Right</label></div>
					    <div class="form-group col-md-3">
					      	<select class="form-control form-control-sm selector" name="e_angle_r" id="e_angle_r">
					        	<option value="" selected>Choose...</option>
					        	<option value="T5S1R" data-left="images/examples/21.PNG">Angle away from the head</option>
					        	<option value="T5S2R" data-left="images/examples/22.PNG">Not angled away</option>
					      	</select>
					    </div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<label for="inputState">12.) Ear Lobe Inner Edge Shape</label>
						</div>
						<div class="col-md-1"><label for="inputState"> : </label></div>
						<div class="col-md-1"><label for="inputState">Left</label></div>
						<div class="form-group col-md-3">
					      	<select class="form-control form-control-sm selector" name="el_shape_l" id="el_shape_l">
					        	<option value="" selected>Choose...</option>
					        	<option value="T6S1L" data-left="images/examples/28.PNG">Straight ears</option>
					        	<option value="T6S2L" data-left="images/examples/29.PNG">Partially straight ears</option>
					        	<option value="T6S3L" data-left="images/examples/30.PNG">Curved ears</option>
					      	</select>
					    </div>
					    <div class="col-md-1"><label for="inputState">Right</label></div>
					    <div class="form-group col-md-3">
					      	<select class="form-control form-control-sm selector" name="el_shape_r" id="el_shape_r">
					        	<option value="" selected>Choose...</option>
					        	<option value="T6S1R" data-left="images/examples/25.PNG">Straight ears</option>
					        	<option value="T6S2R" data-left="images/examples/26.PNG">Partially straight ears</option>
					        	<option value="T6S3R" data-left="images/examples/27.PNG">Curved ears</option>
					      	</select>
					    </div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<label for="inputState">13.) Ear Lobe Length</label>
						</div>
						<div class="col-md-1"><label for="inputState"> : </label></div>
						<div class="col-md-1"><label for="inputState">Left</label></div>
					    <div class="form-group col-md-3">
					      	<select class="form-control form-control-sm selector" name="el_length_l" id="el_length_l">
					        	<option value="" selected>Choose...</option>
					        	<option value="T7S1L" data-left="images/examples/34.PNG">Pointed</option>
					        	<option value="T7S2L" data-left="images/examples/35.PNG">Average</option>
					        	<option value="T7S3L" data-left="images/examples/36.PNG">Blunt</option>
					      	</select>
					    </div>
					    <div class="col-md-1"><label for="inputState">Right</label></div>
					    <div class="form-group col-md-3">
					      	<select class="form-control form-control-sm selector" name="el_length_r" id="el_length_r">
					        	<option value="" selected>Choose...</option>
					        	<option value="T7S1R" data-left="images/examples/31.PNG">Pointed</option>
					        	<option value="T7S2R" data-left="images/examples/32.PNG">Average</option>
					        	<option value="T7S3R" data-left="images/examples/33.PNG">Blunt</option>
					      	</select>
					    </div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<label for="inputState">14.) Ear Length</label>
						</div>
						<div class="col-md-1"><label for="inputState"> : </label></div>
						<div class="col-md-1"><label for="inputState">Left</label></div>
						<div class="form-group col-md-3">
					      	<select class="form-control form-control-sm selector" name="e_length_l" id="e_length_l">
					        	<option value="" selected>Choose...</option>
					        	<option value="T8S1L" data-left="images/examples/40.PNG">Long</option>
					        	<option value="T8S2L" data-left="images/examples/41.PNG">Medium</option>
					        	<option value="T8S3L" data-left="images/examples/42.PNG">Short</option>
					      	</select>
					    </div>
					    <div class="col-md-1"><label for="inputState">Right</label></div>
					    <div class="form-group col-md-3">
					      	<select class="form-control form-control-sm selector" name="e_length_r" id="e_length_r">
					        	<option value="" selected>Choose...</option>
					        	<option value="T8S1R" data-left="images/examples/37.PNG">Long</option>
					        	<option value="T8S2R" data-left="images/examples/38.PNG">Medium</option>
					        	<option value="T8S3R" data-left="images/examples/39.PNG">Short</option>
					      	</select>
					    </div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<label for="inputState">15.) Ear Depigmentation</label>
						</div>
						<div class="col-md-1"><label for="inputState"> : </label></div>
						<div class="col-md-1"><label for="inputState">Left</label></div>
						<div class="form-group col-md-3">
					      	<select class="form-control form-control-sm selector" name="e_depig_l" id="e_depig_l">
					        	<option value="" selected>Choose...</option>
					        	<option value="T12S1L" data-left="images/examples/45.PNG">Present</option>
					        	<option value="T12S2L" data-left="images/examples/46.PNG">None</option>
					      	</select>
					    </div>
					    <div class="col-md-1"><label for="inputState">Right</label></div>
					    <div class="form-group col-md-3">
					      	<select class="form-control form-control-sm selector" name="e_depig_r" id="e_depig_r">
					        	<option value="" selected>Choose...</option>
					        	<option value="T12S1R" data-left="images/examples/43.PNG">Present</option>
					        	<option value="T12S2R" data-left="images/examples/44.PNG">None</option>
					      	</select>
					    </div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<label for="inputState">16.) Ear Nicks</label>
						</div>
						<div class="col-md-1"><label for="inputState"> : </label></div>
						<div class="col-md-1"><label for="inputState">Left</label></div>
						<div class="form-group col-md-3">
					      	<select class="form-control form-control-sm selector" name="e_nick_l" id="e_nick_l">
					        	<option value="" selected>Choose...</option>
					        	<option value="T9S1L" data-left="images/examples/51.PNG">Before the side fold</option>
					        	<option value="T9S2L" data-left="images/examples/52.PNG">At the side fold</option>
					        	<option value="T9S3L" data-left="images/examples/53.PNG">After the side fold</option>
					        	<option value="T9S4L" data-left="images/examples/54.PNG">On the top fold</option>
					        	<option value="T9S5L" data-left="images/examples/55.PNG">None</option>
					      	</select>
					    </div>
					    <div class="col-md-1"><label for="inputState">Right</label></div>
						<div class="form-group col-md-3">
					      	<select class="form-control form-control-sm selector" name="e_nick_r" id="e_nick_r">
					        	<option value="" selected>Choose...</option>
					        	<option value="T9S1R" data-left="images/examples/47.PNG">Before the side fold</option>
					        	<option value="T9S2R" data-left="images/examples/48.PNG">At the side fold</option>
					        	<option value="T9S3R" data-left="images/examples/49.PNG">After the side fold</option>
					        	<option value="T9S4R" data-left="images/examples/50.PNG">On the top fold</option>
					        	<option value="T9S5R" data-left="images/examples/51.PNG">None</option>
					      	</select>
					    </div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<label for="inputState">17.) Ear Tears</label>
						</div>
						<div class="col-md-1"><label for="inputState"> : </label></div>
						<div class="col-md-1"><label for="inputState">Left</label></div>
						<div class="form-group col-md-3">
					      	<select class="form-control form-control-sm selector" name="e_tear_l" id="e_tear_l">
					        	<option value="" selected>Choose...</option>
					        	<option value="T10S1L" data-left="images/examples/51.PNG">Before the side fold</option>
					        	<option value="T10S2L" data-left="images/examples/52.PNG">At the side fold</option>
					        	<option value="T10S3L" data-left="images/examples/53.PNG">After the side fold</option>
					        	<option value="T10S4L" data-left="images/examples/54.PNG">On the top fold</option>
					        	<option value="T10S5L" data-left="images/examples/55.PNG">None</option>
					      	</select>
					    </div>
					    <div class="col-md-1"><label for="inputState">Right</label></div>
						<div class="form-group col-md-3">
					      	<select class="form-control form-control-sm selector" name="e_tear_r" id="e_tear_r">
					        	<option value="" selected>Choose...</option>
					        	<option value="T10S1R" data-left="images/examples/47.PNG">Before the side fold</option>
					        	<option value="T10S2R" data-left="images/examples/48.PNG">At the side fold</option>
					        	<option value="T10S3R" data-left="images/examples/49.PNG">After the side fold</option>
					        	<option value="T10S4R" data-left="images/examples/50.PNG">On the top fold</option>
					        	<option value="T10S5R" data-left="images/examples/51.PNG">None</option>
					      	</select>
					    </div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<label for="inputState">18.) Ear Holes</label>
						</div>
						<div class="col-md-1"><label for="inputState"> : </label></div>
						<div class="col-md-1"><label for="inputState">Left</label></div>
					    <div class="form-group col-md-3">
					      	<select class="form-control form-control-sm selector" name="e_holes_l" id="e_holes_l">
					        	<option value="" selected>Choose...</option>
					        	<option value="T11S1L">Large, Before the side fold</option>
					        	<option value="T11S2L">Large, At the side fold</option>
					        	<option value="T11S3L">Large, After the side fold</option>
					        	<option value="T11S4L">Small, Before the side fold</option>
					        	<option value="T11S5L" data-left="images/examples/66.PNG">Small, At the side fold</option>
					        	<option value="T11S6L" data-left="images/examples/67.PNG">Small, After the side fold</option>
					        	<option value="T11S7L" data-left="images/examples/68.PNG">None</option>
					      	</select>
					    </div>
					    <div class="col-md-1"><label for="inputState">Right</label></div>
					    <div class="form-group col-md-3">
					      	<select class="form-control form-control-sm selector" name="e_holes_r" id="e_holes_r">
					        	<option value="" selected>Choose...</option>
					        	<option value="T11S1R">Large, Before the side fold</option>
					        	<option value="T11S2R">Large, At the side fold</option>
					        	<option value="T11S3R">Large, After the side fold</option>
					        	<option value="T11S4R">Small, Before the side fold</option>
					        	<option value="T11S5R" data-left="images/examples/63.PNG">Small, At the side fold</option>
					        	<option value="T11S6R" data-left="images/examples/64.PNG">Small, After the side fold</option>
					        	<option value="T11S7R" data-left="images/examples/65.PNG">None</option>
					      	</select>
					    </div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<label for="inputState">19.) Tusks</label>
						</div>
						<div class="col-md-1"><label for="inputState"> : </label></div>
						<div class="col-md-1"><label for="inputState">Left</label></div>
						<div class="form-group col-md-3">
					      	<select class="form-control form-control-sm selector" name="tusks_l" id="tusks_l">
					        	<option value="" selected>Choose...</option>
					        	<option value="T18S1L" data-left="images/examples/70.PNG">Visible</option>
					        	<option value="T18S2L" data-left="images/examples/71.PNG">Invisible</option>
					      	</select>
					    </div>
					    <div class="col-md-1"><label for="inputState">Right</label></div>
					    <div class="form-group col-md-3">
					      	<select class="form-control form-control-sm selector" name="tusks_r" id="tusks_r">
					        	<option value="" selected>Choose...</option>
					        	<option value="T18S1R" data-left="images/examples/68.PNG">Visible</option>
					        	<option value="T18S2R" data-left="images/examples/69.PNG">Invisible</option>
					      	</select>
					    </div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<label for="inputState">20.) Tushes</label>
						</div>
						<div class="col-md-1"><label for="inputState"> : </label></div>
						<div class="col-md-1"><label for="inputState">Left</label></div>
						<div class="form-group col-md-3">
					      	<select class="form-control form-control-sm selector" name="tushes_l" id="tushes_l">
					        	<option value="" selected>Choose...</option>
					        	<option value="T19S1L" data-left="images/examples/76.PNG">Absent</option>
					        	<option value="T19S2L" data-left="images/examples/77.PNG">Present inside</option>
					        	<option value="T19S3L" data-left="images/examples/78.PNG">Visible</option>
					        	<option value="T19S4L" data-left="images/examples/79.PNG">Prominent</option>
					      	</select>
					    </div>
					    <div class="col-md-1"><label for="inputState">Right</label></div>
					    <div class="form-group col-md-3">
					      	<select class="form-control form-control-sm selector" name="tushes_r" id="tushes_r">
					        	<option value="" selected>Choose...</option>
					        	<option value="T19S1R" data-left="images/examples/72.PNG">Absent</option>
					        	<option value="T19S2R" data-left="images/examples/73.PNG">Present inside</option>
					        	<option value="T19S3R" data-left="images/examples/74.PNG">Visible</option>
					        	<option value="T19S4R" data-left="images/examples/75.PNG">Prominent</option>
					      	</select>
					    </div>
					</div>
					<hr>
					<div class="row">
					    <div class="form-group col-md-4">
					      	<label for="inputState">21.) Tail Length</label>
					      	<select class="form-control form-control-sm selector" name="t_length" id="t_length">
					        	<option value="" selected>Choose...</option>
					        	<option value="T20S1" data-left="images/examples/80.PNG">Very Long</option>
					        	<option value="T20S2" data-left="images/examples/81.PNG">Long</option>
					        	<option value="T20S3" data-left="images/examples/82.PNG">Medium</option>
					        	<option value="T20S4" data-left="images/examples/83.PNG">Short</option>
					        	<option value="T20S5" data-left="images/examples/84.PNG">Stumpy</option>
					      	</select>
					    </div>
					     <div class="form-group col-md-4">
					      	<label for="inputState">22.) Tail Brush</label>
					      	<select class="form-control form-control-sm selector" name="t_brush" id="t_brush">
					        	<option value="" selected>Choose...</option>
					        	<option value="T21S1" data-left="images/examples/85.PNG">Short anterior short posterior</option>
					        	<option value="T21S2" data-left="images/examples/86.PNG">Normal anterior short posterior</option>
					        	<option value="T21S3" data-left="images/examples/87.PNG">Short anterior normal posterior</option>
					        	<option value="T21S4" data-left="images/examples/88.PNG">Normal</option>
					      	</select>
					    </div>
						<div class="form-group col-md-4">
					      	<label for="inputState">23.) Tail Hair Spreading</label>
					      	<select class="form-control form-control-sm selector" name="th_spread" id="th_spread">
					        	<option value="" selected>Choose...</option>
					        	<option value="T22S1" data-left="images/examples/89.PNG">Limited</option>
					        	<option value="T22S2" data-left="images/examples/90.PNG">Average</option>
					        	<option value="T22S3" data-left="images/examples/91.PNG">Prominent</option>
					      	</select>
					    </div>
					</div>
					<div class="row">
					    <div class="form-group col-md-4">
					      	<label for="inputState">24.) Tail Hair Nature</label>
					      	<select class="form-control form-control-sm selector" name="th_nature" id="th_nature">
					        	<option value="" selected>Choose...</option>
					        	<option value="T23S1" data-left="images/examples/92.PNG">Curved</option>
					        	<option value="T23S2" data-left="images/examples/93.PNG">Straight</option>
					        	<option value="T23S3" data-left="images/examples/94.PNG">Both</option>
					      	</select>
					    </div>
					    <div class="form-group col-md-4">
					      	<label for="inputState">25.) Tail Kink</label>
					      	<select class="form-control form-control-sm selector" name="t_kink" id="t_kink">
					        	<option value="" selected>Choose...</option>
					        	<option value="T24S1" data-left="images/examples/95.PNG">Kinked</option>
					        	<option value="T24S2" data-left="images/examples/96.PNG">Curved</option>
					        	<option value="T24S3" data-left="images/examples/97.PNG">Twisted</option>
					        	<option value="T24S4" data-left="images/examples/98.PNG">None</option>
					      	</select>
					    </div>
					</div>
					<hr>
					<div class="row">
					    <div class="form-group col-md-3">
					      	<label for="inputState">26.) Warts/Wounds/Lumps</label>
					      	<select class="form-control form-control-sm selector" name="wwl" id="wwl">
					        	<option value="" selected>Choose...</option>
					        	<option value="T25S1" data-left="images/examples/99.PNG">None</option>
					        	<option value="T25S2" data-left="images/examples/100.PNG">Right body</option>
					        	<option value="T25S3" data-left="images/examples/101.PNG">Left body</option>
					        	<option value="T25S4" data-left="images/examples/102.PNG">Right foreleg</option>
					        	<option value="T25S5" data-left="images/examples/103.PNG">Left foreleg</option>
					        	<option value="T25S6" data-left="images/examples/104.PNG">Right hindleg</option>
					        	<option value="T25S7" data-left="images/examples/105.PNG">Left of tail</option>
					        	<option value="T25S8" data-left="images/examples/106.PNG">Right side of head</option>
					        	<option value="T25S9" data-left="images/examples/107.PNG">Left side of head</option>
					        	<option value="T25S10" data-left="images/examples/108.PNG">Trunk</option>
					      	</select>
					    </div>
					    <div class="form-group col-md-3">
					      	<label for="inputState">27.) Back Shape</label>
					      	<select class="form-control form-control-sm selector" name="b_shape" id="b_shape">
					        	<option value="" selected>Choose...</option>
					        	<option value="T26S1" data-left="images/examples/109.PNG">Flat & broken</option>
					        	<option value="T26S2" data-left="images/examples/110.PNG">Wavy & sloping</option>
					        	<option value="T26S3" data-left="images/examples/111.PNG">Humped & sloping</option>
					      	</select>
					    </div>
					    <div class="form-group col-md-3">
					      	<label for="inputState">28.) Jaw Shape</label>
					      	<select class="form-control form-control-sm selector" name="j_shape" id="j_shape">
					        	<option value="" selected>Choose...</option>
					        	<option value="T16S1" data-left="images/examples/115.PNG">Straight</option>
					        	<option value="T16S2" data-left="images/examples/116.PNG">Average</option>
					        	<option value="T16S3" data-left="images/examples/117.PNG">Curved</option>
					      	</select>
					    </div>
					    <div class="form-group col-md-3">
					      	<label for="inputState">29.) Head Shape</label>
					      	<select class="form-control form-control-sm selector" name="h_shape" id="h_shape">
					        	<option value="" selected>Choose...</option>
					        	<option value="T18S1" data-left="images/examples/118.PNG">Round</option>
					        	<option value="T18S2" data-left="images/examples/119.PNG">Oval</option>
					        	<option value="T18S3" data-left="images/examples/120.PNG">Quandangular</option>
					        	<option value="T18S4" data-left="images/examples/121.PNG">Triangular</option>
					        	<option value="T18S5" data-left="images/examples/122.PNG">Heart</option>
					      	</select>
					    </div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-3">
							<label for="inputState">30.) Head Depigmentation</label>
						</div>
						<div class="col-md-1"><label for="inputState"> : </label></div>
						<div class="col-md-1"><label for="inputState">Left</label></div>
					    <div class="form-group col-md-3">
					      	<select class="form-control form-control-sm selector" name="h_depig_l" id="h_depig_l">
					        	<option value="" selected>Choose...</option>
					        	<option value="T13S1R" data-left="images/examples/123.PNG">Absent</option>
					        	<option value="T13S2R" data-left="images/examples/124.PNG">Present</option>
					      	</select>
					    </div>
					    <div class="col-md-1"><label for="inputState">Right</label></div>
					    <div class="form-group col-md-3">
					      	<select class="form-control form-control-sm selector" name="h_depig_r" id="h_depig_r">
					        	<option value="" selected>Choose...</option>
					        	<option value="T13S1L" data-left="images/examples/125.PNG">Absent</option>
					        	<option value="T13S2L" data-left="images/examples/126.PNG">Present</option>
					      	</select>
					    </div>
					</div>
					<div class="row">
					    <div class="form-group col-md-3">
					      	<label for="inputState">31.) Jaw Depigmentation</label>
					      	<select class="form-control form-control-sm selector" name="j_depig" id="j_depig">
					        	<option value="" selected>Choose...</option>
					        	<option value="T14S1" data-left="images/examples/127.PNG">Absent</option>
					        	<option value="T14S2" data-left="images/examples/128.PNG">Present</option>
					      	</select>
					    </div>
					    <div class="form-group col-md-3">
					      	<label for="inputState">32.) Trunk Depigmentation</label>
					      	<select class="form-control form-control-sm selector" name="t_depig" id="t_depig">
					        	<option value="" selected>Choose...</option>
					        	<option value="T15S1" data-left="images/examples/127.PNG">Absent</option>
					        	<option value="T15S2" data-left="images/examples/128.PNG">Present</option>
					      	</select>
					    </div>
					    <div class="form-group col-md-3">
					      	<label for="inputState">33.) Physical body condition</label>
					      	<select class="form-control form-control-sm selector" name="p_body" id="p_body">
					        	<option value="" selected>Choose...</option>
					        	<option value="T28S1" data-left="images/examples/136.PNG">Handicapped</option>
					        	<option value="T28S1" data-left="images/examples/137.PNG">None</option>
					      	</select>
					    </div>
					</div>
					<hr>
					<p><b>Upload elephant's photos <span><b>*</b></span></b></p>
					<div class="row">
						<div class="form-group col-md-3">
							<label for="inputState">34.) Front-side View</label>
							<input type="file" name="img_front"/>
						</div>
						<div class="form-group col-md-3">
							<label for="inputState">35.) Back-side View</label>
							<input type="file" name="img_back"/>
						</div>
						<div class="form-group col-md-3">
							<label for="inputState">36.) Left-side View</label>
							<input type="file" name="img_left"/>
						</div>
						<div class="form-group col-md-3">
							<label for="inputState">37.) Right-side View</label>
							<input type="file" name="img_right"/>
						</div>
					</div>
					<hr>
					<p><b>Elephant's geograpical location information</b></p>
					<div class="row">
					    <div class="form-group col-md-3">
					      	<label for="inputState">38.) Zone<span><b>*</b></span></label>
					      	<select class="form-control form-control-sm selector_spec" name="zone" id="zone">
					        	<option value="" selected>Choose...</option>
					        	<option value="Dry">Dry</option>
					        	<option value="Intermediate">Intermediate</option>
					        	<option value="Arid">Arid</option>
					        	<option value="Wet">Wet</option>
					      	</select>
					    </div>
						<div class="form-group col-md-3">
					      	<label for="inputState">39.) Founded Area<span><b>*</b></span></label>
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
					    <div class="form-group col-md-3">
					      	<label for="inputState">40.) Longitude <i>(Optional)</i></label>
					      	<input type="text" class="form-control form-control-sm" name="longitude" id="longitude" placeholder="Enter longitude value here...">
					    </div>
					    <div class="form-group col-md-3">
					      	<label for="inputState">41.) Latitude <i>(Optional)</i></label>
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
<?php
	}
}
?>