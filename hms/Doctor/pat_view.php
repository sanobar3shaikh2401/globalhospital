<?php 
 include('func.php');
// if(!isset($_SESSION['username']))
//   echo "session expired";
// else
    // display_admin_panel();

?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> Global Hospital</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">
       <li class="nav-item">
        <a class="nav-link" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="post" action="search.php">
      <input class="form-control mr-sm-2" type="text" placeholder="enter contact number" aria-label="Search" name="contact">
      <input type="submit" class="btn btn-outline-light my-2 my-sm-0 btn btn-outline-light" id="inputbtn" name="search_submit" value="Search">
    </form>
  </div>
</nav>
  </head>
  <style type="text/css">
    button:hover{cursor:pointer;}
    #inputbtn:hover{cursor:pointer;}
  </style>
  <body style="padding-top:50px;">
 <!-- <div class="jumbotron" id="ab1"></div> -->
 <br>
  	<!-- <div class="row" style="width: 100%; height: 60px; padding-left: 30px;">
  		<div class="col-md-12 bg-primary">
  			<h4 class="mt-3 text-light">Admin | Manage Doctor</h4>
  		</div>
	</div> -->
   <div class="container" style="margin-top:20px;">
      <div class="row">
        <div class="col-md-12">
        <div class="card">
      <div class="card-body" style="background-color: #007bff;color: #ffffff;">
        <div class="row">
          <div class="col-md-1.9 mr-3">
            <a href="Dashboard.php" class="btn btn-light">Go Back</a>
          </div>
          <div class="col-md-2.1">
            <h4>View patient</h4>
          </div>
          <div class="offset-2 col-md-6">
            <form class="form-group" action="Search Patient.php" method="POST">
              <div class="row">
                <div class="col-md-10">
                  <input type="text" name="search" class="form-control" placeholder="Enter Contact">
                </div>
                <div class="col-md-2">
                  <input type="submit" name="patient_search_submit" class="btn btn-light" value="Search">
                </div>
              </div>
            </form>
          </div>
        </div>
        
        
      </div>
      <div class="card-body">
        <?php pat_view();  ?>
        <br><br>
         <table class="table table-hover">
          <thead>
            <tr  class="bg-dark">
              <td colspan='7' style='font-size:20px;color:#fff'>
               Medical History</td>
             </tr>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Patient Name</th>
              <th scope="col">Patient Contact Number</th>
              <th scope="col">Patient Gender</th>
              <th scope="col">Action</th>

            </tr>
          </thead>
          <tbody>
            <?php  pat_medhis_display();  ?>
          </tbody>
        </table>
        <br><br>
        
        <p align="center">                            
 <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Add Medical History</button></p>  

<?php  ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Medical History</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <table class="table table-bordered table-hover data-tables">

        <form method="post" name="submit" action="func.php">

            <tr>
          <th>Blood Pressure :</th>
          <td>
          <input name="bp" placeholder="Blood Pressure" class="form-control wd-450" required="true"></td>
        </tr>                          
           <tr>
          <th>Blood Sugar :</th>
          <td>
          <input name="bs" placeholder="Blood Sugar" class="form-control wd-450" required="true"></td>
        </tr> 
        <tr>
          <th>Weight :</th>
          <td>
          <input name="weight" placeholder="Weight" class="form-control wd-450" required="true"></td>
        </tr>
        <tr>
          <th>Body Temprature :</th>
          <td>
          <input name="bodytemp" placeholder="Blood Sugar" class="form-control wd-450" required="true"></td>
        </tr>
                               
           <tr>
          <th>Prescription :</th>
          <td>
          <textarea name="pres" placeholder="Medical Prescription" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
        </tr>  
         
      </table>
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <button type="submit" name="medhis_add" class="btn btn-primary">Submit</button>
  
  </form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
      </div>
    </div>
      </div>
      </div>
   	</div>

   <br><br>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <!--Sweet alert js-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
  </body>
</html>
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.6/dist/sweetalert2.all.min.js" integrity="sha256-RRb75FFB4bqHpBTVaEua+QNVpKSI5m4HBvQKgY1E8S4=" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        Swal.fire({
          title: 'Welcome!',
          text: 'Hava a great day!',
          imageUrl: 'images/4.jpg',
          imageWidth: 300,
          imageHeight: 200,
          imageAlt: 'Custom image',
        })
      });
    </script>