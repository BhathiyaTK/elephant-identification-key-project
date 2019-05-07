<?php

include 'db.php';

$distVal = $_POST["distVal"];
$areaVal = $_POST["areaVal"];
$username = $_SESSION["first_name"];

$sql = "SELECT * FROM elephants WHERE area='$areaVal'";
$sql_rslt = mysqli_query($conn,$sql);

?>
<script>
     function initMap1() {
        var map = new google.maps.Map(document.getElementById('map1'), {
          center: new google.maps.LatLng(6.296052, 80.953027),
          zoom: 11
        });
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('map_xml.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
              var area = markerElem.getAttribute('area');
              var village = markerElem.getAttribute('village');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = village+", "+area
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

      function doNothing() {}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=--YOUR_ACCESS_CODE_HERE--&callback=initMap1"></script>
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
	.details{
		background-color: #fff;
		border-radius: 5px;
		padding: 5px 20px;
	}
	#map1{
		width: 100%;
        height: 500px;
        border-radius: 5px;
		box-shadow: 2px 2px 10px 2px rgba(0,0,0,0.4);
    }
    #heading{
    	padding: 0;
    	margin: 0;
    }
	.img_view img{
		width: 100%;
		height: 200px;
	}
	.img_view img:hover{
		cursor: pointer;
	}
    .modal-body img{
    	width: 100%;
    }
</style>
<div class="row el-details-div">
	<div class="col-md-5" id="map1"></div>
	<div class="col-md-7" id="detail-div">
		<div id="el-detail-title">
			<h3>Elephants' Details</h3>
		</div>
		<div class="details-divider"></div>
		<?php
		while($row = mysqli_fetch_array($sql_rslt)){
		?>
		<div class="accordion" id="accordionExample">
			<div class="card">
			    <div class="card-header" id="heading">
			      <h5 class="mb-0">
			        <button class="btn btn-link" type="button" data-toggle="collapse" data-parent="#accordionExample" data-target="#collapse<?php echo $row["id"]; ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $row["id"]; ?>">
			          <i class="fas fa-map-marker-alt"></i>&nbsp<?php echo "Elephant in ".$row["village"].", ".$row["area"]; ?>
			        </button>
			      </h5>
			    </div>

			    <div id="collapse<?php echo $row["id"]; ?>" class="collapse" aria-labelledby="heading" >
			      <div class="card-body">
			        <?php echo "Latitude : ".$row["latitude"]."| Longitude : ".$row["longitude"]."<br><br>"; ?>
			        <div class="el-imgs">
						<div class="row">
							<div class="col-sm-12 col-md-3 col-lg-3 img_view">
								<img data-toggle="modal" data-target="#front_view_modal" src=<?php echo '"uploads/'.$row["image_front"].'"'; ?>>
								<p>Front View</p>
							</div>
							<div class="col-sm-12 col-md-3 col-lg-3 img_view">
								<img data-toggle="modal" data-target="#back_view_modal" src=<?php echo '"uploads/'.$row["image_back"].'"'; ?>>
								<p>Back View</p>
							</div>
							<div class="col-sm-12 col-md-3 col-lg-3 img_view">
								<img data-toggle="modal" data-target="#left_view_modal" src=<?php echo '"uploads/'.$row["image_left"].'"'; ?>>
								<p>Left View</p>
							</div>
							<div class="col-sm-12 col-md-3 col-lg-3 img_view">
								<img data-toggle="modal" data-target="#right_view_modal" src=<?php echo '"uploads/'.$row["image_right"].'"'; ?>>
								<p>Right View</p>
							</div>
						</div>
					</div>
			      </div>
			    </div>
			</div>
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
		}
		?>
	</div>
</div>

