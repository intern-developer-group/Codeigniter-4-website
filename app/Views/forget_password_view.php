<?php
$page_session = \Config\Services::session();
// $this->extend("Welcome");
// $this->section("sessionpage");
?>
<div class="col-lg-2 col-md-2 col-sm-12 col-sm-12">

</div>
<div class="col-lg-8 col-md-8 col-sm-12 col-sm-12" style="border: 2px;">
    <?php
    if ($page_session->getTempdata('error')) {
    ?>
        <div class="alert alert-danger"><?= $page_session->getTempdata('error'); ?></div>
    <?php
    }
    if ($page_session->getTempdata('success')) {
    ?>
        <div class="alert alert-success"><?= $page_session->getTempdata('success'); ?></div>

    <?php
    }
    ?>
</div>
<div class="col-lg-2 col-md-2 col-sm-12 col-sm-12">

</div>
<?php
// $this->endSection();

// $this->section("dynamicpage");
?>

<div class="col-lg-2 col-md-2 col-sm-12 col-sm-12">

</div>
<div class="col-lg-8 col-md-8 col-sm-12 col-sm-12" style="border: 2px;" style="align-content: center;">
    <h1 align="center" style="background-color: #251f36; color:white;padding-bottom: 10px;"> Forget Password</h1>
     <form class="form-detail2" action="<?php echo base_url(); ?>/public/forgetpasswordaction" method="post" id="myform">
    <div class="form-group">
        <label for="email">Registered Email address:</label>
        <input type="email" class="form-control" placeholder="Enter email" id="email" name="eid" value="<?php if (isset($validationError)) :
                                                                                                            echo set_value(retain_value($validationError, 'eid'));
                                                                                                        endif;  ?>">
        <span class="err">
            <?php
            if (isset($validationError)) :
                echo display_validation_error($validationError, 'eid');
            endif;
            ?>
        </span>
    </div>



    <button type="submit" class="btn btn-primary" name="s">Submit </button>
</div>
</form>
<div class="col-lg-2 col-md-2 col-sm-12 col-sm-12">

</div>


