
</div>
<div class="col-lg-2 col-md-2 col-sm-12 col-sm-12">

</div>
<?php
$this->extend("master_admin");

$this->section("dynamicpage");
?>


<div class="col-lg-2 col-md-2 col-sm-12 col-sm-12">

</div>

<section class="100%" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Edit User</p>

                <form action="<?php echo base_url(); ?>/public/Edituser" method="post" name="fome1" class="mt-4">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" class="form-control" name="Owner_name" id="name" value="<?= $udata['Owner_name']; ?>"/>
                      <label class="form-label" for="form3Example1c">Owner Name</label>
                    </div>
                    
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" class="form-control" name="Shop_name" id="name" value="<?= $udata['Shop_name']; ?>"/>
                      <label class="form-label" for="form3Example3c">Shop Name</label>
                    </div>
                    
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="number" class="form-control" name="mo" id="mo" value="<?= $udata['mo']; ?>"/>
                      <label class="form-label" for="form3Example3c">Mobile Number</label>
                    </div>
                    
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="form3Example4c" class="form-control" name="email" id="email" value="<?= $udata['email']; ?>" readonly/>
                      <label class="form-label" for="form3Example4c">Email</label>
                    </div>
                  </div> 

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4cd" class="form-control" name="pwd" id="password" value="<?= $udata['pwd']; ?>"/>
                      <label class="form-label" for="form3Example4cd">Password</label>
                    </div>
                  </div>

                 

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <input type="submit" class="btn btn-primary btn-lg" value="Submit">
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




<div class="col-lg-2 col-md-2 col-sm-12 col-sm-12">

</div>
</div>

<?php
$this->endSection();
?>









<!-- ---------------------------------------------->


