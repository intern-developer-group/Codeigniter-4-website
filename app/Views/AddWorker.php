

<?php
$this->extend("master_admin");

$this->section("dynamicpage");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/css/bootstrap.css" />
    <script type="text/javascript" src="<?php echo base_url(); ?>/public/assets/js/bootstrap.js"> </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/public/assets/js/popper.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/public/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/public/assets/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/public/assets/js/form_validate.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/public/assets/js/myjs.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/public/assets/js/validation.js"></script>
</head>
<body>
    

<section class="100%" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Add New Worker</p>

                <form action="<?php echo base_url(); ?>/public/worker/ins" method="post" name="fome1" class="mt-4">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" class="form-control" name="worker_name" id="name" value="<?php if (isset($err)) : echo set_value(retain_value($err, 'worker_name'));endif;  ?>"/>
                      <label class="form-label" for="form3Example1c">worker Name</label>
                      <?php
                  if (isset($err)) {
                      if ($err->hasError('worker_name')) {
                        ?> <div style="color: red;"> <?php
                          echo $err->getError('worker_name');?></div><?php
                      }
                  } ?>
                    </div>
                    
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" class="form-control" name="worker_surname" id="name" value="<?php if (isset($err)) : echo set_value(retain_value($err, 'worker_surname'));endif;  ?>"/>
                      <label class="form-label" for="form3Example3c">Worker Surname</label>
                      <?php
                  if (isset($err)) {
                      if ($err->hasError('worker_surname')) {
                        ?> <div style="color: red;"> <?php
                          echo $err->getError('worker_surname');?></div><?php
                      }
                  } ?>
                    </div>
                    
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="number" class="form-control" name="mo" id="mo" value="<?php if (isset($err)) : echo set_value(retain_value($err, 'mo'));endif;  ?>"/>
                      <label class="form-label" for="form3Example3c">Mobile Number</label>
                      <?php
                  if (isset($err)) {   
                      if ($err->hasError('mo')) {
                        ?> <div style="color: red;"> <?php
                          echo $err->getError('mo');?></div><?php
                      }
                  } ?>
                    </div>
                    
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="form3Example4c" class="form-control" name="email" id="email" value="<?php if (isset($err)) : echo set_value(retain_value($err, 'email'));endif;  ?>"/>
                      <label class="form-label" for="form3Example4c">Email</label>
                      <?php
                  if (isset($err)) {
                      if ($err->hasError('email')) {
                        ?> <div style="color: red;"> <?php
                          echo $err->getError('email');?></div><?php
                      }
                  } ?>
                    </div>
                  </div> 

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example4cd" class="form-control" name="address" id="password" value="<?php if (isset($err)) : echo set_value(retain_value($err, 'address'));endif;  ?>"/>
                      <label class="form-label" for="form3Example4cd">Worker Address</label>

                      <?php
                  if (isset($err)) {   
                      if ($err->hasError('address')) {
                        ?> <div style="color: red;"> <?php
                          echo $err->getError('address');?></div><?php
                      }
                  } ?>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example4cd" class="form-control" name="gold" id="password" value="<?php if (isset($err)) : echo set_value(retain_value($err, 'gold'));endif;  ?>"/>
                      <label class="form-label" for="form3Example4cd">worker tacking gold</label>

                      <?php
                  if (isset($err)) {   
                      if ($err->hasError('gold')) {
                        ?> <div style="color: red;"> <?php
                          echo $err->getError('gold');?></div><?php
                      }
                  } ?>
                    </div>
                  </div>

                 

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <input type="submit" class="btn btn-primary btn-lg" value="Add Worker">
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



</body>
</html>
<?php
$this->endSection();
?>