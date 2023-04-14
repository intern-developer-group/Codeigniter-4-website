<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/css/bootstrap.css" />
    <script type="text/javascript" src="<?php echo base_url(); ?>/public/assets/js/bootstrap.js"> </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/public/assets/js/popper.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/public/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/public/assets/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/public/assets/js/form_validate.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/public/assets/js/myjs.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/public/assets/js/validation.js"></script>
    
    <title>kangan Jewellers
    </title>
</head>
<body style="background: #fff;">
<nav class="navbar navbar-expand-lg navbar-dark " style="
    background: #454545;" >
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="color : #d1b753;">Kangan Jewellers</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="http://localhost/KJ/public/main_home" style="color : #fff;">Home
            <span class="visually-hidden" style="background-color : #fff;">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="fatch_product" style="color : #fff;">Products
          </a>
        <li class="nav-item">
          <a class="nav-link active" href="edit_profile" style="color : #fff;">Change Profile
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="changePassword" style="color : #fff;">Change Password
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="contact" style="color : #fff;">Contact Us
          </a>
        </li>
        
        
        
      </ul>
      <form class="d-flex">
     
    
         <button class="btn btn-secondary my-2 my-sm-0" style="margin-left: 10px;" type="submit">
         <a class="nav-link" href="http://localhost/KJ/public/Logout">
         logout</a></button>
        
      </form>
    </div>
  </div>
</nav>

<div class="row">

<?php
$this->renderSection("dynamicpage")
?>
</div>


<footer class="footer1" style = "color : white; background : #454545; ;">
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-md-6">
                     <div class="call_now2">
                        <h3 style="color : #d1b753;">Kangan Jewellers </h3>
                        <span>Anilbhai Lodhiya</span>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="call_now">
                        <h3>Call Now</h3>
                        <span>(+91)7383436881</span>
                     </div>
                  </div><br><br><br>
              <div class="col">
                <div class="container"> 
                  <div class="social-icon">
                   <a href="https://www.instagram.com/parmeshwarijewellers/?igshid=YmMyMTA2M2Y="><i class="instagram fa fa-instagram"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   <a href="http://api.whatsapp.com/send?phone=7487828145&text=hello"> <i class="whatsapp fa fa-whatsapp"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                 
</div>
                </div>
              </div>
               </div>
            </div>
            <div class="copyright"style= "background : #6a6a6a; text-align : center;" >
               <div class="container" >
                  © 2022 Kangan Jewellers; All Rights Reserved
               </div>
            </div>
         </div>
      </footer>

