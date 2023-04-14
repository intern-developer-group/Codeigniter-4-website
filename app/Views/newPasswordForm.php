<?php
$page_session = \Config\Services::session();
// $this->extend("Welcome");
// $this->section("sessionpage");
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

// $this->section("dynamicpage");
?>

<div class="col-lg-2 col-md-2 col-sm-12 col-sm-12">
    <?php
    // if (isset($validationError)) :
    //     echo $validationError->listErrors();

    // endif;
    ?>
</div>


<div class="col-lg-8 col-md-8 col-sm-12 col-sm-12" style="border: 2px;">
    <h1 align="center" style="background-color: #251f36; color:white;padding-bottom: 10px;"> Registration</h1>
<form class="form-detail2" action="<?php echo base_url(); ?>/public/updatenewPassword" method="post" id="myform">
    <div class="form-group">
        <label for="pwd">New Password:</label>
        <input type="password" class="form-control" placeholder="Enter Password" id="pass" name="pwd" value="<?php if (isset($validationError)) :
                                                                                                                    echo set_value(retain_value($validationError, 'pwd'));
                                                                                                                endif;  ?>">
        <span class=" err">
            <?php
            if (isset($validationError)) :
                //                     if ($validationError->hasError('pwd')) :
                //                         echo $validationError->getError('pwd');
                //                     endif;
                echo display_validation_error($validationError, 'pwd');
            endif;

            ?>
        </span>

    </div>

    <div class="form-group">
        <label for="pwd">Confirm New Password:</label>
        <input type="password" class="form-control" placeholder="Re-Enter Password" id="password1" name="repwd" value="<?php if (isset($validationError)) :
                                                                                                                            echo set_value(retain_value($validationError, 'fn1'));
                                                                                                                        endif;  ?>">
        <span class="err">
            <?php
            if (isset($validationError)) :
                //                     if ($validationError->hasError('repwd')) :
                //                         echo $validationError->getError('repwd');
                //                     endif;
                echo display_validation_error($validationError, 'repwd');
            endif;

            ?>
        </span>

    </div>


    <input type="submit" class="btn btn-primary" value="Submit" name="sub" />
    
    </form>
</div>
<div class="col-lg-2 col-md-2 col-sm-12 col-sm-12">

</div>
</div>

<?php
// $this->endSection();
?>