<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Title -->				   
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">List Map</h5>
            </div>
            <!-- Breadcrumb -->					      
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
                    <li class="active"><span>List Map</span></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->		   
        </div>
        <?php //print_r($shop); ?>
        <!-- /Title -->								<!-- Row -->				   
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            
                          <div id="map" style="width: 1000px; height: 600px;"></div>
        
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Row -->			
    </div>
    
    <?php
    $mmm="";
    $qq=$this->db->query("select employee_email,employee_latitude,employee_longitude from tbl_employee where employee_act=1 and employee_latitude!='' and employee_id in($eids)")->result();
        $qqs=$this->db->query("select employee_latitude from tbl_employee where employee_act=1 and employee_latitude!='' and employee_id in($eids) order by employee_latitude ASC")->row();
        $qqss=$this->db->query("select employee_longitude from tbl_employee where employee_act=1 and employee_longitude!='' and employee_id in($eids) order by employee_longitude ASC")->row();

         foreach($qq as $q) {
         $mmm.="['";
         $mmm.=$q->employee_email;
         $mmm.="',";
                  $mmm.=$q->employee_latitude;
                   $mmm.=",";
                  $mmm.=$q->employee_longitude;
$mmm.="],";
     }
     $mmm= substr($mmm, 0, -1);

     ?>
      
      <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2NvblxFTR82sBD-MCVXcx8fs78uBx8cU&sensor=false">
    </script>
   <script type="text/javascript">
  
      

    var locations = [
        <?php  echo $mmm;?>
    ];


    var map = new google.maps.Map(document.getElementById('map'), {
      zoom:7,
      center: new google.maps.LatLng(<?php echo $qqs->employee_latitude;?>,<?php echo $qqss->employee_longitude;?>),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>