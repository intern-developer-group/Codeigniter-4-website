<?php
// print_r($userdata);
 $page_session = \Config\Services::session();
$this->extend('master_admin');

?>
<div class="col-lg-2 col-md-2 col-sm-12 col-sm-12">

</div>
<div class="col-lg-8 col-md-8 col-sm-12 col-sm-12" style="border: 2px;">
    <?php
    if ($page_session->getTempdata('success')) {
    ?>
        <div class="alert alert-success"><?= $page_session->getTempdata('success'); ?></div>
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
</div>
<div class="col-lg-2 col-md-2 col-sm-12 col-sm-12">

</div>
<?php
// $this->endSection();
$this->section("dynamicpage");
?>

<div class="col-lg-4 col-md-4 col-sm-12 col-sm-12">   </div>

<section class="100%" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Edit product</p>

                <form action="<?php echo base_url(); ?>/public/editProduct" method="post" name="fome1" class="mt-4">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" class="form-control" name="whight" id="name" />
                      <label class="form-label" for="form3Example1c">whight</label>
                       <?php
            if (isset($validationError)) :
                echo display_validation_error($validationError, 'whight');
            endif;
            ?>
                    </div>
                    
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" class="form-control" name="netwhight" id="netwhight"/>
                      <label class="form-label" for="form3Example3c">netwhight</label>
                      <?php
            if (isset($validationError)) :
                echo display_validation_error($validationError, 'netwhight');
            endif;
            ?>
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


<?php
$this->endSection();
?>




