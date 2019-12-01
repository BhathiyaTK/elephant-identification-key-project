<?php

include 'db.php';

$zoneVal = $_POST["zoneVal"];
$username = $_SESSION["first_name"];

$sql = "SELECT * FROM elephants WHERE zone='$zoneVal'";
$sql_rslt = mysqli_query($conn,$sql);

$count=mysqli_num_rows($sql_rslt);

if ($count>=1) {
?>

<script>

    // var markers_on_map = [];

    function initMap2() {
      var map = new google.maps.Map(document.getElementById('map2'), {
        center: new google.maps.LatLng(7.873695, 80.652169),
        zoom: 7
      });
      var infoWindow = new google.maps.InfoWindow;

      var place_name = '<?php echo $zoneVal; ?>';

          // Change this depending on the name of your PHP or XML file
          downloadUrl('loc/'+place_name+'.php', function(data) {
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

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=<YOUR_GOOGLE_MAP_API_KEY_HERE>&callback=initMap2"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
<!-- <script src="js/piechart.min.js"></script>
  <link rel="stylesheet" href="css/piechart.min.css"> -->
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
  .details{
    background-color: #fff;
    border-radius: 5px;
    padding: 5px 20px;
  }
  #map2{
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
  @media(max-width: 600px){
    .el-details-div{
      padding: 20px;
    }
    #detail-div{
      padding-left: 0;
      margin-top: 30px;
    }
    #map2{
      height: 300px;
    }
  }
</style>
<div class="row el-details-div">
  <div class="col-sm-12 col-md-6 col-lg-6" id="map2"></div>
  <div class="col-sm-12 col-md-6 col-lg-6" id="detail-div">
    <div id="el-detail-title">
      <h5>Founded Results</h5>
    </div>
    <div class="details-divider"></div>
    <?php
    while($row = mysqli_fetch_array($sql_rslt)){
      ?>
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary btn-sm ele_modal_btn" data-toggle="modal" data-target="#modal<?php echo $row["id"]; ?>">
        <i class="fas fa-map-marker-alt"></i>&nbsp<?php echo $row["name"]; ?>
      </button>

      <!-- Modal -->
      <div class="modal fade" id="modal<?php echo $row["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle"><?php echo $row["name"]; ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table class="table table-bordered table-sm" style="font-size: 16px; width: 80%; margin: 0 auto 20px;">
                <tbody>
                  <tr>
                    <td colspan="2"><?php echo "Name : <b>".$row["name"]."</b>"; ?></td>
                    <td>
                      <?php 
                      $year = substr($row["e_age"], 0, 2);
                      $month = substr($row["e_age"], -2, 5);
                      echo "Age : <b>".$year."y ".$month."m</b>"; 
                      ?>                        
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo "Elephant No : <b>".$row["e_number"]."</b>"; ?></td>
                    <td><?php echo "Observed Date : <b>".$row["e_date"]."</b>"; ?></td>
                    <td><?php echo "Location : <b>".$row["area"]."</b>"; ?></td>
                  </tr>
                  <tr>
                    <td colspan="2"><?php echo "Latitude : <b>".$row["latitude"]."</b>, Longitude : <b>".$row["longitude"]."</b>"; ?>
                    <td><?php echo "Zone : <b>".$row["zone"]."</b>"; ?></td></td>
                  </tr>
                </tbody>
              </table>
              <div class="el-imgs">
                <div class="row">
                  <div class="col-sm-12 col-md-2 col-lg-2 img_view">
                    <img data-toggle="modal" data-target="#front_view_modal<?php echo $row["id"]; ?>" src=<?php echo '"uploads/'.$row["image_front"].'"'; ?>>
                    <p>Front View</p>
                  </div>
                  <div class="col-sm-12 col-md-2 col-lg-2 img_view">
                    <img data-toggle="modal" data-target="#back_view_modal<?php echo $row["id"]; ?>" src=<?php echo '"uploads/'.$row["image_back"].'"'; ?>>
                    <p>Back View</p>
                  </div>
                  <div class="col-sm-12 col-md-4 col-lg-4 img_view">
                    <img data-toggle="modal" data-target="#left_view_modal<?php echo $row["id"]; ?>" src=<?php echo '"uploads/'.$row["image_left"].'"'; ?>>
                    <p>Left View</p>
                  </div>
                  <div class="col-sm-12 col-md-4 col-lg-4 img_view">
                    <img data-toggle="modal" data-target="#right_view_modal<?php echo $row["id"]; ?>" src=<?php echo '"uploads/'.$row["image_right"].'"'; ?>>
                    <p>Right View</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <!-- front image modal --->
      <div class="modal fade" id="front_view_modal<?php echo $row["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
      <div class="modal fade" id="back_view_modal<?php echo $row["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
      <div class="modal fade" id="left_view_modal<?php echo $row["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
      <div class="modal fade" id="right_view_modal<?php echo $row["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
    <br><br>
    <div style="font-size: 19px; font-family: Open Sans; font-weight: 700;">
      <?php 
      // Wild & Captive sql quaries
      $sql_captive = "SELECT COUNT(category) AS cap FROM elephants WHERE zone='$zoneVal' AND category='Captive'";
      $sql_captive_rslt = mysqli_query($conn,$sql_captive);
      $row_captive = mysqli_fetch_array($sql_captive_rslt);

      $sql_wild = "SELECT COUNT(category) AS wld FROM elephants WHERE zone='$zoneVal' AND category='Wild'";
      $sql_wild_rslt = mysqli_query($conn,$sql_wild);
      $row_wild = mysqli_fetch_array($sql_wild_rslt);

      // Genger sql quaries
      $sql_male = "SELECT COUNT(sex) AS male FROM elephants WHERE zone='$zoneVal' AND sex='T1S1'";
      $sql_male_rslt = mysqli_query($conn,$sql_male);
      $row_male = mysqli_fetch_array($sql_male_rslt);

      $sql_fmale = "SELECT COUNT(sex) AS fmale FROM elephants WHERE zone='$zoneVal' AND sex='T1S2'";
      $sql_fmale_rslt = mysqli_query($conn,$sql_fmale);
      $row_fmale = mysqli_fetch_array($sql_fmale_rslt);

      // Age class quaries
      $sql_calf = "SELECT COUNT(age) AS calf FROM elephants WHERE zone='$zoneVal' AND age='T2S1'";
      $sql_calf_rslt = mysqli_query($conn,$sql_calf);
      $row_calf = mysqli_fetch_array($sql_calf_rslt);

      $sql_juve = "SELECT COUNT(age) AS juve FROM elephants WHERE zone='$zoneVal' AND age='T2S2'";
      $sql_juve_rslt = mysqli_query($conn,$sql_juve);
      $row_juve = mysqli_fetch_array($sql_juve_rslt);

      $sql_sa = "SELECT COUNT(age) AS sa FROM elephants WHERE zone='$zoneVal' AND age='T2S3'";
      $sql_sa_rslt = mysqli_query($conn,$sql_sa);
      $row_sa = mysqli_fetch_array($sql_sa_rslt);
      
      $total = $row_wild["wld"]+$row_captive["cap"];
      echo "Total Elephants : <b>".$total."</b>";
      ?>
    </div>
  </div>
</div>
<br>
    <script>
      $(document).ready(function(){
        var options1 = {
        title: {
          text: "Captive & Wild"
        },
        data: [{
          type: "pie",
          startAngle: 3,
          showInLegend: "true",
          legendText: "{label}",
          indexLabel: "{label} ({y})",
            // yValueFormatString:"#,##0.#"%"",
            dataPoints: [
            { label: "Captive", y: <?php echo $row_captive["cap"]; ?>, color: "#e8a31a" },
            { label: "Wild", y: <?php echo $row_wild["wld"]; ?>, color: "#19a62e" }
            ]
          }]
        };
        var options2 = {
        title: {
          text: "Gender"
        },
        data: [{
          type: "pie",
          startAngle: 3,
          showInLegend: "true",
          legendText: "{label}",
          indexLabel: "{label} ({y})",
            // yValueFormatString:"#,##0.#"%"",
            dataPoints: [
            { label: "Male", y: <?php echo $row_male["male"]; ?>, color: "#2e29c2" },
            { label: "Female", y: <?php echo $row_fmale["fmale"]; ?>, color: "#f0379d" }
            ]
          }]
        };
        var options3 = {
        title: {
          text: "Age Class"
        },
        data: [{
          type: "pie",
          startAngle: 30,
          showInLegend: "true",
          legendText: "{label}",
          indexLabel: "{label} ({y})",
            // yValueFormatString:"#,##0.#"%"",
            dataPoints: [
            { label: "Calf", y: <?php echo $row_calf["calf"]; ?>, color: "#a4b811" },
            { label: "Juvenile", y: <?php echo $row_juve["juve"]; ?>, color: "#c70e33" },
            { label: "Sub-Adult", y: <?php echo $row_sa["sa"]; ?>, color: "#0e90c7" }
            ]
          }]
        };
        $("#chartContainer1").CanvasJSChart(options1);
        $("#chartContainer2").CanvasJSChart(options2);
        $("#chartContainer3").CanvasJSChart(options3);
      });
    </script>

    <div class="row">
      <div class="col-md-4">
        <div class="table-with-pie">
          <div id="chartContainer1" style="height: 280px; max-width: 100%; margin: 0px auto;"></div>
          <hr>
          <div class="chart-results">
            <div class="row">
              <div class="col-md-6">
                <?php 
                $val1 = $row_wild["wld"]/($row_wild["wld"]+$row_captive["cap"])*100;
                echo "Wild : <b>".$row_wild["wld"]." <br>(".number_format((float)$val1, 2, '.', '')."%)</b>";
                ?>
              </div>
              <div class="col-md-6">
                <?php 
                $val2 = $row_captive["cap"]/($row_wild["wld"]+$row_captive["cap"])*100;
                echo "Captive : <b>".$row_captive["cap"]." <br>(".number_format((float)$val2, 2, '.', '')."%)</b>";
                ?>
              </div>
            </div>
            <hr>
            <small style="color: #aaa;"><i>According to the selected zone</i></small>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="table-with-pie">
          <div id="chartContainer2" style="height: 280px; max-width: 100%; margin: 0px auto;"></div>
          <hr>
          <div class="chart-results">
            <div class="row">
              <div class="col-md-6">
                <?php 
                $val1_s = $row_male["male"]/($row_male["male"]+$row_fmale["fmale"])*100;
                echo "Male : <b>".$row_male["male"]." <br>(".number_format((float)$val1_s, 2, '.', '')."%)</b>";
                ?>
              </div>
              <div class="col-md-6">
                <?php 
                $val2_s = $row_fmale["fmale"]/($row_male["male"]+$row_fmale["fmale"])*100;
                echo "Female : <b>".$row_fmale["fmale"]." <br>(".number_format((float)$val2_s, 2, '.', '')."%)</b>";
                ?>
              </div>
            </div>
            <hr>
            <small style="color: #aaa;"><i>According to the selected zone</i></small>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="table-with-pie">
          <div id="chartContainer3" style="height: 280px; max-width: 100%; margin: 0px auto;"></div>
          <hr>
          <div class="chart-results">
            <div class="row">
              <div class="col-md-4">
                <?php
                $val1_age = $row_calf["calf"]/($row_calf["calf"]+$row_juve["juve"]+$row_sa["sa"])*100;
                echo "Calf : <b>".$row_calf["calf"]." <br>(".number_format((float)$val1_age, 2, '.', '')."%)</b>";
                ?>
              </div>
              <div class="col-md-4">
                <?php 
                $val2_age = $row_juve["juve"]/($row_calf["calf"]+$row_juve["juve"]+$row_sa["sa"])*100;
                echo "Juvenile : <b>".$row_juve["juve"]." <br>(".number_format((float)$val2_age, 2, '.', '')."%)</b>";
                ?>
              </div>
              <div class="col-md-4">
                <?php 
                $val3_age = $row_sa["sa"]/($row_calf["calf"]+$row_juve["juve"]+$row_sa["sa"])*100;
                echo "Sub-Adult : <b>".$row_sa["sa"]." <br>(".number_format((float)$val3_age, 2, '.', '')."%)</b>";
                ?>
              </div>
            </div>
            <hr>
            <small style="color: #aaa;"><i>According to the selected zone</i></small>
          </div>
        </div>
      </div>
    </div>
    

<?php
}else{
  echo '<div style="font-size: 18px; font-family: Open Sans; text-align:center;"><b><i class="far fa-sad-tear fa-lg"></i> &nbsp No Results were Found.</b></div>';
}
?>
