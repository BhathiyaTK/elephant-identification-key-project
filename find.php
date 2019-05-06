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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script src="js/jQuery.Form.js"></script>

	<link rel="stylesheet" href="css/fm.selectator.jquery.css">
	<script src="js/fm.selectator.jquery.js"></script>

	<script src="js/chosen.jquery.js" type="text/javascript"></script>
	<script src="js/ImageSelect.jquery.js" type="text/javascript"></script>
	<link rel="icon" href="images/elephant2.png">
	<title>Elephant Identification Key | Find Elephants</title>
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
			$("#form1-1-div").hide();
			$("#el_map_details").hide();
			$("#el_map_details1").hide();

			$('.selector').selectator();
			$('.selector_spec').selectator({
				useSearch: false
			});
		});
		///////////////////find elephant funcs//////////////////

		$(function(){
			$("#search-type").click(function(){
				var findVal = $("#search-type").val();
				if (findVal == "val1") {
					$("#form1-div").show();
					$("#form1-1")[0].reset();
					$("#form1-1-div").hide();
				}else if(findVal == "val2"){
					$("#form1-1-div").show();
					$("#form1")[0].reset();
					$("#form1-div").hide();
				}
			});
		});
		$(function(){
			$("#form1").on('submit', function(e1){
				e1.preventDefault();
				var distVal = $("#district option:selected").text();
				var areaVal = $("#city").val();
				$.ajax({
					type: 'POST',
					url: 'location_wise.php',
					data: {distVal:distVal,areaVal:areaVal},
					success: function(data1){
						$("#el_map_details").show();
						$("#el_map_details").html(data1);
						$("#el_map_details1").hide();
						$("#form1-1")[0].reset();
					}
				});
			});
		});
		$(function(){
			$("#form1-1").on('submit', function(e2){
				e2.preventDefault();
				var sex = $("#sex").val();
				var age = $("#age").val();
				var es_fold = $("#es_fold").val();
				var et_fold = $("#et_fold").val();
				var e_angle = $("#e_angle").val();
				var el_shape = $("#el_shape").val();
				var el_length = $("#el_length").val();
				var e_nick_tear = $("#e_nick_tear").val();
				var e_holes = $("#e_holes").val();
				var e_depig = $("#e_depig").val();
				var h_depig = $("#h_depig").val();
				var j_depig = $("#j_depig").val();
				var t_depig = $("#t_depig").val();
				var j_shape = $("#j_shape").val();
				var h_shape = $("#h_shape").val();
				var tusks = $("#tusks").val();
				var tushes = $("#tushes").val();
				var t_length = $("#t_length").val();
				var t_brush = $("#t_brush").val();
				var th_spread = $("#th_spread").val();
				var th_nature = $("#th_nature").val();
				var t_kink = $("#t_kink").val();
				var wwl = $("#wwl").val();
				var b_shape = $("#b_shape").val();
				var s_height = $("#s_height").val();
				var p_body = $("#p_body").val();

				$.ajax({
					type: 'POST',
					url: 'elephant_wise.php',
					data: {sex:sex,age:age,es_fold:es_fold,et_fold:et_fold,e_angle:e_angle,el_shape:el_shape,el_length:el_length,e_nick_tear:e_nick_tear,e_holes:e_holes,e_depig:e_depig,h_depig:h_depig,j_depig:j_depig,t_depig:t_depig,j_shape:j_shape,h_shape:h_shape,tusks:tusks,tushes:tushes,t_length:t_length,t_brush:t_brush,th_spread:th_spread,th_nature:th_nature,t_kink:t_kink,wwl:wwl,b_shape:b_shape,s_height:s_height,p_body:p_body},
					success: function(data2){
						$("#el_map_details1").show();
						$("#el_map_details1").html(data2);
						$("#el_map_details").hide();
						$("#form1")[0].reset();
					}
				}); 
			});
		});

		$(function(){
			$("#district").on('change', function(){
				var districtVal = $(this).val();
				$.ajax({
					type:'POST',
					url: 'dropdown_filter.php',
					data:{districtVal:districtVal},
					success: function(response){
						$("#area_list").html(response);
					}
				});
			});
		});

	</script>

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

	<section class="find-el">
		<div class="container">
			<div class="reference-title">
				<h2>Explore Elephants in Sri Lanka</h2>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="find-el-container">
						<div class="row">
							<div class="col-md-4">
								<label for="inputState">Select the filter</label>
			  					<select class="form-control form-control-sm" name="search-type" id="search-type">
			  						<option value="val1" selected>Location wise</option>
			  						<option value="val2">Elephant wise</option>
			  					</select>
							</div>
						</div>
	  					<br>
	  					<div id="form1-div">
	  						<form id="form1">
								<div class="row">
								    <div class="form-group col-md-4">
								      	<label for="inputState">District</label>
								      	<select class="form-control form-control-sm selector_spec" name="district" id="district">
								        	<option value="" selected>Choose...</option>
								        	<?php
								        	$sql1 = "SELECT * FROM districts";
								        	$sql1_rslts = mysqli_query($conn,$sql1);

								        	while ($row = mysqli_fetch_array($sql1_rslts)) {
								        		echo '<option value="'.$row["code"].'">'.$row["name"].'</option>';
								        	}
								        	?>
								      	</select>
								    </div>
								    <div class="form-group col-md-4" id="area_list"></div>
								</div>
								<br>
								<div class="button-div" id="check-button-div">
							    	<button type="submit" class="btn btn-success btn-sm form-button" id="check_button1"><i class="fas fa-search"></i> Find Elephants</button>
							    </div>
							</form>
	  					<br>
	  					</div>
	  					<div id="form1-1-div">
	  						<hr>
	  						<form id="form1-1">
								<div class="row">
								    <div class="form-group col-md-4">
								      	<label for="inputState">Sex</label>
								      	<select class="form-control form-control-sm" name="sex" id="sex">
								        	<option value="" selected>Choose...</option>
								        	<option value="T1S1">Male</option>
								        	<option value="T1S2">Female</option>
								      	</select>
								    </div>
								     <div class="form-group col-md-3">
								      	<label for="inputState">Age Class</label>
								      	<select class="form-control form-control-sm" name="age" id="age">
								        	<option value="" selected>Choose...</option>
								        	<option value="T2S1">Calf</option>
								        	<option value="T2S2">Juvenile</option>
								        	<option value="T2S3">Sub-adult</option>
								      	</select>
								    </div>
								</div>
								<hr>
								<div class="row">
								    <div class="form-group col-md-3">
								      	<label for="inputState">Ear Side Fold</label>
								      	<select class="form-control form-control-sm" name="es_fold" id="es_fold">
								        	<option value="" selected>Choose...</option>
								        	<option style="background-image: url(images/examples/1.png);" value="T3S1">Not folded</option>
								        	<option value="T3S2">Folded backward & forward</option>
								        	<option value="T3S3">Double folded</option>
								        	<option value="T3S4">Wavy folded</option>
								        	<option value="T3S5">Folded forward slighly</option>
								        	<option value="T3S6">Folded forward</option>
								        	<option value="T3S7">Folded backward</option>
								      	</select>
								    </div>
								     <div class="form-group col-md-3">
								      	<label for="inputState">Ear Top Fold</label>
								      	<select class="form-control form-control-sm" name="et_fold" id="et_fold">
								        	<option value="" selected>Choose...</option>
								        	<option value="T4S1">Not folded</option>
								        	<option value="T4S2">Facing forward</option>
								        	<option value="T4S3">Folded forward</option>
								      	</select>
								    </div>
								    <div class="form-group col-md-3">
								      	<label for="inputState">Ear Angle</label>
								      	<select class="form-control form-control-sm" name="e_angle" id="e_angle">
								        	<option value="" selected>Choose...</option>
								        	<option value="T5S1">Angle away from the head</option>
								        	<option value="T5S2">Not angled away</option>
								      	</select>
								    </div>
								     <div class="form-group col-md-3">
								      	<label for="inputState">Ear Lobe Inner Edge Shape</label>
								      	<select class="form-control form-control-sm" name="el_shape" id="el_shape">
								        	<option value="" selected>Choose...</option>
								        	<option value="T6S1">Straight ears</option>
								        	<option value="T6S2">Partially straight ears</option>
								        	<option value="T6S3">Curved ears</option>
								      	</select>
								    </div>
								</div>
								<div class="row">
								    <div class="form-group col-md-3">
								      	<label for="inputState">Ear Lobe Length</label>
								      	<select class="form-control form-control-sm" name="el_length" id="el_length">
								        	<option value="" selected>Choose...</option>
								        	<option value="T7S1">Pointed</option>
								        	<option value="T7S2">Average</option>
								        	<option value="T7S3">Blunt</option>
								      	</select>
								    </div>
								     <div class="form-group col-md-3">
								      	<label for="inputState">Ear Length</label>
								      	<select class="form-control form-control-sm" name="e_length" id="e_length">
								        	<option value="" selected>Choose...</option>
								        	<option value="T8S1">Long</option>
								        	<option value="T8S2">Medium</option>
								        	<option value="T8S3">Short</option>
								      	</select>
								    </div>
								    <div class="form-group col-md-3">
								      	<label for="inputState">Ear Nicks & Tears</label>
								      	<select class="form-control form-control-sm" name="e_nick_tear" id="e_nick_tear">
								        	<option value="" selected>Choose...</option>
								        	<option value="T9S1">Before the side fold</option>
								        	<option value="T9S2">At the side fold</option>
								        	<option value="T9S3">After the side fold</option>
								        	<option value="T9S4">On the top fold</option>
								        	<option value="T9S5">None</option>
								      	</select>
								    </div>
								     <div class="form-group col-md-3">
								      	<label for="inputState">Ear Holes</label>
								      	<select class="form-control form-control-sm" name="e_holes" id="e_holes">
								        	<option value="" selected>Choose...</option>
								        	<option value="T10S1">Large, Before the side fold</option>
								        	<option value="T10S2">Large, At the side fold</option>
								        	<option value="T10S3">Large, After the side fold</option>
								        	<option value="T10S4">Small, Before the side fold</option>
								        	<option value="T10S5">Small, At the side fold</option>
								        	<option value="T10S6">Small, After the side fold</option>
								        	<option value="T10S7">None</option>
								      	</select>
								    </div>
								</div>
								<hr>
								<div class="row">
								    <div class="form-group col-md-3">
								      	<label for="inputState">Ear Depigmentation</label>
								      	<select class="form-control form-control-sm" name="e_depig" id="e_depig">
								        	<option value="" selected>Choose...</option>
								        	<option value="T11S1">Present</option>
								        	<option value="T11S2">None</option>
								      	</select>
								    </div>
								    <div class="form-group col-md-3">
								      	<label for="inputState">Head Depigmentation</label>
								      	<select class="form-control form-control-sm" name="h_depig" id="h_depig">
								        	<option value="" selected>Choose...</option>
								        	<option value="T12S1">Absent</option>
								        	<option value="T12S2">Present</option>
								      	</select>
								    </div>
								    <div class="form-group col-md-3">
								      	<label for="inputState">Jaw Depigmentation</label>
								      	<select class="form-control form-control-sm" name="j_depig" id="j_depig">
								        	<option value="" selected>Choose...</option>
								        	<option value="T13S1">Absent</option>
								        	<option value="T13S2">Present</option>
								      	</select>
								    </div>
								    <div class="form-group col-md-3">
								      	<label for="inputState">Trunk Depigmentation</label>
								      	<select class="form-control form-control-sm" name="t_depig" id="t_depig">
								        	<option value="" selected>Choose...</option>
								        	<option value="T14S1">Absent</option>
								        	<option value="T14S2">Present</option>
								      	</select>
								    </div>
								</div>
								<hr>
								<div class="row">
								    <div class="form-group col-md-3">
								      	<label for="inputState">Jaw Shape</label>
								      	<select class="form-control form-control-sm" name="j_shape" id="j_shape">
								        	<option value="" selected>Choose...</option>
								        	<option value="T15S1">Straight</option>
								        	<option value="T15S2">Average</option>
								        	<option value="T15S3">Curved</option>
								      	</select>
								    </div>
								    <div class="form-group col-md-3">
								      	<label for="inputState">Head Shape</label>
								      	<select class="form-control form-control-sm" name="h_shape" id="h_shape">
								        	<option value="" selected>Choose...</option>
								        	<option value="T16S1">Round</option>
								        	<option value="T16S2">Oval</option>
								        	<option value="T16S3">Quandangular</option>
								        	<option value="T16S4">Triangular</option>
								        	<option value="T16S5">Heart</option>
								      	</select>
								    </div>
								    <div class="form-group col-md-3">
								      	<label for="inputState">Tusks</label>
								      	<select class="form-control form-control-sm" name="tusks" id="tusks">
								        	<option value="" selected>Choose...</option>
								        	<option value="T17S1">Visible</option>
								        	<option value="T17S2">Invisible</option>
								      	</select>
								    </div>
								    <div class="form-group col-md-3">
								      	<label for="inputState">Tushes</label>
								      	<select class="form-control form-control-sm" name="tushes" id="tushes">
								        	<option value="" selected>Choose...</option>
								        	<option value="T18S1">Absent</option>
								        	<option value="T18S2">Present inside</option>
								        	<option value="T18S3">Visible</option>
								        	<option value="T18S4">Prominent</option>
								      	</select>
								    </div>
								</div>
								<hr>
								<div class="row">
								    <div class="form-group col-md-3">
								      	<label for="inputState">Tail Length</label>
								      	<select class="form-control form-control-sm" name="t_length" id="t_length">
								        	<option value="" selected>Choose...</option>
								        	<option value="T19S1">Very Long</option>
								        	<option value="T19S2">Long</option>
								        	<option value="T19S3">Medium</option>
								        	<option value="T19S4">Short</option>
								        	<option value="T19S5">Stumpy</option>
								      	</select>
								    </div>
								     <div class="form-group col-md-3">
								      	<label for="inputState">Tail Brush</label>
								      	<select class="form-control form-control-sm" name="t_brush" id="t_brush">
								        	<option value="" selected>Choose...</option>
								        	<option value="T20S1">Short anterior short posterior</option>
								        	<option value="T20S2">Normal anterior short posterior</option>
								        	<option value="T20S3">Short anterior normal posterior</option>
								        	<option value="T20S4">Normal</option>
								      	</select>
								    </div>
								    <div class="form-group col-md-3">
								      	<label for="inputState">Tail Hair Spreading</label>
								      	<select class="form-control form-control-sm" name="th_spread" id="th_spread">
								        	<option value="" selected>Choose...</option>
								        	<option value="T21S1">Limited</option>
								        	<option value="T21S2">Average</option>
								        	<option value="T21S3">Prominent</option>
								      	</select>
								    </div>
								     <div class="form-group col-md-3">
								      	<label for="inputState">Tail Hair Nature</label>
								      	<select class="form-control form-control-sm" name="th_nature" id="th_nature">
								        	<option value="" selected>Choose...</option>
								        	<option value="T22S1">Curved</option>
								        	<option value="T22S2">Straight</option>
								        	<option value="T22S3">Both</option>
								      	</select>
								    </div>
								</div>
								<div class="row">
								    <div class="form-group col-md-3">
								      	<label for="inputState">Tail Kink</label>
								      	<select class="form-control form-control-sm" name="t_kink" id="t_kink">
								        	<option value="" selected>Choose...</option>
								        	<option value="T23S1">Kinked</option>
								        	<option value="T23S2">Curved</option>
								        	<option value="T23S3">Twisted</option>
								        	<option value="T23S4">None</option>
								      	</select>
								    </div>
								</div>
								<hr>
								<div class="row">
								    <div class="form-group col-md-3">
								      	<label for="inputState">Warts/Wounds/Lumps</label>
								      	<select class="form-control form-control-sm" name="wwl" id="wwl">
								        	<option value="" selected>Choose...</option>
								        	<option value="T24S1">None</option>
								        	<option value="T24S2">Right body</option>
								        	<option value="T24S3">Left body</option>
								        	<option value="T24S4">Right foreleg</option>
								        	<option value="T24S5">Left foreleg</option>
								        	<option value="T24S6">Right hindleg</option>
								        	<option value="T24S7">Left of tail</option>
								        	<option value="T24S8">Right side of head</option>
								        	<option value="T24S9">Left side of head</option>
								        	<option value="T24S10">Trunk</option>
								      	</select>
								    </div>
								    <div class="form-group col-md-3">
								      	<label for="inputState">Back Shape</label>
								      	<select class="form-control form-control-sm" name="b_shape" id="b_shape">
								        	<option value="" selected>Choose...</option>
								        	<option value="T25S1">Flat & broken</option>
								        	<option value="T25S2">Wavy & sloping</option>
								        	<option value="T25S3">Humped & sloping</option>
								      	</select>
								    </div>
								    <div class="form-group col-md-3">
								      	<label for="inputState">Shoulder Height</label>
								      	<select class="form-control form-control-sm" name="s_height" id="s_height">
								        	<option value="" selected>Choose...</option>
								        	<option value="T26S1"><= 100cm</option>
								        	<option value="T26S2">100cm <= 150cm</option>
								        	<option value="T26S3">150cm <= 200cm</option>
								      	</select>
								    </div>
								    <div class="form-group col-md-3">
								      	<label for="inputState">Physical body condition</label>
								      	<select class="form-control form-control-sm" name="p_body" id="p_body">
								        	<option value="" selected>Choose...</option>
								        	<option value="T27S1">Handicapped</option>
								        	<option value="T27S1">None</option>
								      	</select>
								    </div>
								</div>
								<br>
								<div class="button-div" id="check-button-div">
							    	<button type="submit" class="btn btn-success btn-sm form-button" id="check_button2"><i class="fas fa-search"></i> Find Elephant</button>
							    </div>
							</form>
	  					</div>
					</div>
				</div>
			</div>
			<br>
			<div id="el_map_details"></div>
			<div id="el_map_details1"></div>
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
				<div class="col-md-3 col-sm-12 footer_line">
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
				<div class="col-md-4 col-sm-12 footer_line">
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