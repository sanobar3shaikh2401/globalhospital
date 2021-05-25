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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <a class="navbar-brand" href="Dashboard.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Global Hospital</a>
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
 <!-- <div class="jumbotron" id="ab1"></div>
  	<div class="row" style="width: 100%; height: 60px; padding-left: 30px;">
  		<div class="col-md-12 bg-primary">
  			<h4 class="mt-3 text-light">Doctor | Add Patient</h4>
  		</div>
	</div> -->
   <div class="container" style="margin-top:20px;">
   		<div class="row">
   			<div class=" offset-1 col-md-10 offset-1">
   				<div class="card text-dark">
            <div class="card-body" style="background-color: #007bff;color: #ffffff;">
              <a href="Dashboard.php" class="btn btn-light">Go Back</a>
              Add Patient
            </div>
  				  <div class="card-body">
  				   <div class="panel-body">
  							<form role="form" name="" method="post" action="func.php">
                  <div class="form-group">
                    <label for="doctorname">
                    Patient Name
                    </label>
                    <input type="text" name="patname" class="form-control"  placeholder="Enter Patient Name" required="true">
                    </div>
                    <div class="form-group">
                    <label for="fess">
                     Patient Contact no
                    </label>
                    <input type="text" name="patcontact" class="form-control"  placeholder="Enter Patient Contact no" required="true" maxlength="10" pattern="[0-9]+">
                    </div>
                    <div class="form-group">
                    <label for="fess">
                    Patient Email
                    </label>
                    <input type="email" id="patemail" name="patemail" class="form-control"  placeholder="Enter Patient Email id" required="true" onBlur="userAvailability()">
                    <span id="user-availability-status1" style="font-size:12px;"></span>
                    </div>
                    <div class="form-group">
                    <label class="block">
                    Gender
                    </label>
                    <div class="clip-radio radio-primary">
                    <input type="radio" id="rg-female" name="gender" value="Female" >
                    <label for="rg-female">
                    Female
                    </label>
                    <input type="radio" id="rg-male" name="gender" value="Male">
                    <label for="rg-male">
                    Male
                    </label>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="address">
                    Patient Address
                    </label>
                    <textarea name="pataddress" class="form-control"  placeholder="Enter Patient Address" required="true"></textarea>
                    </div>
                    <div class="form-group">
                    <label for="fess">
                     Patient Age
                    </label>
                    <input type="text" name="patage" class="form-control"  placeholder="Enter Patient Age" required="true">
                    </div>
                    <div class="form-group">
                    <label for="fess">
                     Medical History
                    </label>
                    <textarea type="text" name="medhis" class="form-control"  placeholder="Enter Patient Medical History(if any)" required="true"></textarea>
                    </div>  

                    <button type="submit" name="pat_add" id="submit" class="btn btn-o btn-primary">
                    Add
                    </button>
                    </form>	
  					</div>
  				  </div>
				  </div>
   			</div>	
   		</div>
      <br><br>
     
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