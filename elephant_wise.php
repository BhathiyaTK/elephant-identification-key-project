<?php

include 'db.php';

$sex = $_POST["sex"];
$age = $_POST["age"];
$es_fold = $_POST["es_fold"];
$et_fold = $_POST["et_fold"];
$e_angle = $_POST["e_angle"];
$el_shape = $_POST["el_shape"];
$el_length = $_POST["el_length"];
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
$username = $_SESSION["first_name"];

$sql = "SELECT * FROM elephants WHERE (sex='$sex' AND age='$age' AND es_fold='$es_fold' AND et_fold='$et_fold' AND e_angle='$e_angle' AND el_shape='$el_shape' AND el_length='$el_length' AND e_nick_tear='$e_nick_tear' AND e_holes='$e_holes' AND e_depig='$e_depig' AND h_depig='$h_depig' AND j_depig='$j_depig' AND t_depig='$t_depig' AND j_shape='$j_shape' AND h_shape='$h_shape' AND tusks='$tusks' AND tushes='$tushes' AND t_length='$t_length' AND t_brush='$t_brush' AND th_spread='$th_spread' AND th_nature='$th_nature' AND t_kink='$t_kink' AND wwl='$wwl' AND b_shape='$b_shape' AND s_height='$s_height' AND p_body='$p_body')";

$sql_rslt = mysqli_query($conn,$sql);

$row = mysqli_fetch_array($sql_rslt);
?>
<style>
	.el-details-div{
		background-color: #eee;
		padding: 30px 50px 30px 30px;
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
		<div class="row details">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<p>
					<ul>
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