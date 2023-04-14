<!DOCTYPE html>
<?php
$page_session = \Config\Services::session();

?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


     <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/css/opensans-font.css">
     <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/fonts/line-awesome/css/line-awesome.min.css">
     <!-- Jquery -->
     <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
     <!-- Main Style Css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/css/style.css"/>


     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   



  <title>Document</title>
</head>



<body class="form-v7">

<!-- <div class="container">
<div class="col-lg-12 col-md-12 col-sm-12 col-sm-12" style="border: 2px; background-color: #eee;">
    


</div>
</div> -->
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">log in</p>
     <div class="page-content">    
          <div class="form-v7-content">
               <div class="form-left">
                  
               </div>
               
               <form class="form-detail2" action="<?php echo base_url(); ?>/public/LoginAction" method="post" id="myform">


                         <?php
                         if (isset($empty)) {
                         ?>
                              <div class="alert alert-danger"><?= $empty; ?></div>
                         <?php
                         }
                         
                         if (isset($err1)) {
                         ?>
                              <div class="alert alert-danger"><?= $err1; ?></div>
                         <?php
                         }
                         ?>

                         <?php
                         if (isset($su)) {
                         ?>
                              <div class="alert alert-success"><?= $su; ?></div>
                         <?php
                         }
                         ?>
                         
                         <?php
                         if ($page_session->getTempdata('error')) {
                         ?>
                              <div class="alert alert-danger"><?= $page_session->getTempdata('error'); ?></div>

                         <?php
                         }
                         ?>

               
<div class="d-flex flex-row align-items-center mb-4">
  <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
  <div class="form-outline flex-fill mb-0">
    <input type="email" id="form3Example4c" class="form-control" name="your_email" id="your_email" value="<?php if (isset($err)) : echo set_value(retain_value($err, 'email'));endif;  ?>"/>
    <label class="form-label" for="form3Example4c">Email</label>
   
  </div>
</div> 
                   <div class="d-flex flex-row align-items-center mb-4">
  <i class="fas fa-key fa-lg me-3 fa-fw"></i>
  <div class="form-outline flex-fill mb-0">
    <input type="password" id="form3Example4cd" class="form-control" name="password" id="password" value="<?php if (isset($err)) : echo set_value(retain_value($err, 'pwd'));endif;  ?>"/>
    <label class="form-label" for="form3Example4cd">Password</label>

  </div>
</div>

<div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <input type="submit" class="btn btn-primary btn-lg" value="Login">
                                    </div>
          <br>
        <div class="form-group">

          <p>If your password is not remember,</p>
            <a href="ForgetPassword"> <label>Forgot Password</label></a>
        </div>

         
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
                     


                    </div>
               </form>
          </div>
     </div>
     
     
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html> 