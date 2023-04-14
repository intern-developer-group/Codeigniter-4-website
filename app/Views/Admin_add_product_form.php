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

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                <form action="<?php echo base_url(); ?>/public/add_prod/ins" method="post" name="fome1" class="mt-4" enctype = "multipart/form-data">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" class="form-control" name="whight" id="name" />
                      <label class="form-label" for="form3Example1c">Product Whight</label>
               
                    </div>
                    
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" class="form-control" name="netwhight" id="name" />
                      <label class="form-label" for="form3Example3c">Product net.Whight</label>
                     
                    </div>
                    
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="file" class="form-control" name="pic" id="name" />
                      <label class="form-label" for="form3Example3c">Product Picture:</label>
                     
                    </div>
                    
                  </div>

        


                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <input type="submit" class="btn btn-primary btn-lg" value="Add product">
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
<!-- 
<div class="col-lg-12 col-md-12 col-sm-12 col-sm-12 table-responsive" style="text-align: justify; ">
    <h1> Registration table </h1>
    <?php
    // echo $users; ?>
</div> -->



</body>
</html>