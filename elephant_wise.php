<?php

include 'db.php';

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
$e_nick_tear_l = $_POST["e_nick_tear_l"];
$e_nick_tear_r = $_POST["e_nick_tear_r"];
$e_holes_l = $_POST["e_holes_l"];
$e_holes_r = $_POST["e_holes_r"];
$e_depig_l = $_POST["e_depig_l"];
$e_depig_r = $_POST["e_depig_r"];
$h_depig = $_POST["h_depig"];
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
$username = $_SESSION["first_name"];

$sql = "SELECT * FROM elephants WHERE (sex='$sex' AND age='$age' AND es_fold_l='$es_fold_l' AND es_fold_r='$es_fold_r' AND et_fold_l='$et_fold_l' AND et_fold_r='$et_fold_r' AND e_angle_l='$e_angle_l' AND e_angle_r='$e_angle_r' AND el_shape_l='$el_shape_l' AND el_shape_r='$el_shape_r' AND el_length_l='$el_length_l' AND el_length_r='$el_length_r' AND e_nick_tear_l='$e_nick_tear_l' AND e_nick_tear_r='$e_nick_tear_r' AND e_holes_l='$e_holes_l' AND e_holes_r='$e_holes_r' AND e_depig_l='$e_depig_l' AND e_depig_r='$e_depig_r' AND h_depig='$h_depig' AND j_depig='$j_depig' AND t_depig='$t_depig' AND j_shape='$j_shape' AND h_shape='$h_shape' AND tusks_l='$tusks_l' AND tusks_r='$tusks_r' AND tushes_l='$tushes_l' AND tushes_r='$tushes_r' AND t_length='$t_length' AND t_brush='$t_brush' AND th_spread='$th_spread' AND th_nature='$th_nature' AND t_kink='$t_kink' AND wwl='$wwl' AND b_shape='$b_shape' AND s_height='$s_height' AND p_body='$p_body')";

$sql_rslt = mysqli_query($conn,$sql);

$count=mysqli_num_rows($sql_rslt);

if ($count>=1) {

	$row = mysqli_fetch_array($sql_rslt);
?>
<style>
	.el-details-div{
		padding: 30px;
		border-radius: 5px;
	}
	#detail-div{
		padding-left: 50px;
	}
	#el-detail-title h3{
		font-family: Roboto;
		font-weight: 300;
	}
	.el-imgs, .el-imgs p{
		text-align: center;
	}
	.details-divider{
		border-top: 3px solid #13db24;
		margin-bottom: 30px;
	}
	.img_view img{
		width: 100%;
		height: 200px;
	}
	.img_view img:hover{
		cursor: pointer;
	}
	.details{
		background-color: #fff;
		border-radius: 5px;
		padding: 5px 20px;
	}
	#map{
		width: 100%;
        height: 500px;
        border-radius: 5px;
		box-shadow: 2px 2px 10px 2px rgba(0,0,0,0.4);
    }
    .modal-body img{
    	width: 100%;
    }
    @media(max-width: 600px){
	    .el-details-div{
	      	padding: 20px;
	    }
	    #detail-div{
	      	padding-left: 0;
	      	margin-top: 30px;
	    }
	    #map{
	      	height: 300px;
	    }
	}
</style>
<div class="row el-details-div">
	<div class="col-sm-12 col-md-5 col-lg-5" id="map"></div>
	<div class="col-sm-12 col-md-7 col-lg-7" id="detail-div">
		<div id="el-detail-title">
			<h3>Elephant's Details</h3>
		</div>
		<div class="details-divider"></div>
		<div class="el-imgs">
			<div class="row">
				<div class="col-sm-12 col-md-6 col-lg-6 img_view">
					<img data-toggle="modal" data-target="#front_view_modal" src=<?php echo '"uploads/'.$row["image_front"].'"'; ?>>
					<p>Front View</p>
				</div>
				<div class="col-sm-12 col-md-6 col-lg-6 img_view">
					<img data-toggle="modal" data-target="#back_view_modal" src=<?php echo '"uploads/'.$row["image_back"].'"'; ?>>
					<p>Back View</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-md-6 col-lg-6 img_view">
					<img data-toggle="modal" data-target="#left_view_modal" src=<?php echo '"uploads/'.$row["image_left"].'"'; ?>>
					<p>Left View</p>
				</div>
				<div class="col-sm-12 col-md-6 col-lg-6 img_view">
					<img data-toggle="modal" data-target="#right_view_modal" src=<?php echo '"uploads/'.$row["image_right"].'"'; ?>>
					<p>Right View</p>
				</div>
			</div>
		</div>
		<div class="details">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<p>
					<ul>
						<li>Name : <b><?php echo $row["name"]; ?></b></li>
						<li>Elephant No. : <b><?php echo $row["e_number"]; ?></b></li>
						<li>Date of observation : <b><?php echo $row["e_date"]; ?></b></li>
						<li>Founded Area : <b><?php echo $row["area"]; ?></b></li>
						<li>Latitude : <i><?php echo $row["latitude"]; ?></i></li>
						<li>Longitude : <i><?php echo $row["longitude"]; ?></i></li>
					</ul>
				</p>
			</div>
		</div>
	</div>
	<script type="text/javascript">
        function initMap(){
            var location = {lat:<?php echo $row["latitude"]; ?>, lng:<?php echo $row["longitude"]; ?>};
            var map = new google.maps.Map(document.getElementById("map"), {
                zoom: 10,
                center: location
            });
            var marker1 = new google.maps.Marker({
                position: location,
                map: map
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCV4UEXFCrxhJY1VYMJ9YRgq_9jCn95or0&callback=initMap"></script>
</div>
<!-- front image modal --->
<div class="modal fade" id="front_view_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Front View</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src=<?php echo '"uploads/'.$row["image_front"].'"'; ?>>
      </div>
    </div>
  </div>
</div>

<!-- back image modal --->
<div class="modal fade" id="back_view_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Back View</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src=<?php echo '"uploads/'.$row["image_back"].'"'; ?>>
      </div>
    </div>
  </div>
</div>

<!-- left image modal --->
<div class="modal fade" id="left_view_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Left View</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src=<?php echo '"uploads/'.$row["image_left"].'"'; ?>>
      </div>
    </div>
  </div>
</div>

<!-- right image modal --->
<div class="modal fade" id="right_view_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Right View</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src=<?php echo '"uploads/'.$row["image_right"].'"'; ?>>
      </div>
    </div>
  </div>
</div>

<?php
}else{
  echo '<div style="font-size: 18px; font-family: Open Sans; text-align:center;"><b><i class="far fa-sad-tear fa-lg"></i> &nbsp No Results were Found.</b></div>';
}
?>