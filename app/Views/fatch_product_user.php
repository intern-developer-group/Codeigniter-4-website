<?php
$this->extend("main_master");

$this->section("dynamicpage");
?>

<div class="col-lg-2 col-md-2 col-sm-12 col-sm-12">

</div>
<div class="col-lg-2 col-md-2 col-sm-12 col-sm-12">

</div>
<?php
// $this->endSection();
// $this->section("dynamicpage");
?>
<div class="col-lg-10 col-md-10 col-sm-12 col-sm-12">

</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-sm-12">
    <h1 align="center" style="background-color: #fff; color:black;padding-bottom: 10px;"> Products </h1>
</div>


<br><br><br>


    
            <?php
            foreach ($userdata as $u) {
                $path = base_url() . "/public/uploads/" . $u['productpic'];
?>

               <div class="card" style="width: 18rem; margin-left: 50px; margin-top: 20px;  margin-bottom: 20px; height:350px">
               
  <?php echo "<img class='card-img-top' src='" . $path . "' height='50%' width='60px'/>"; ?>
  <div class="card-body">
    <p class="card-text"><b>Product Whight</b></p>
    <p class="card-text"><?php echo $u['whight']; ?> </p>
    <p class="card-text"><b>Product Net.Whight</b></p>
    <p class="card-text"><?php echo $u['netwhight']; ?> </p>


    </div>
</div>
               <?php
            }
            ?>

 


<?php
$this->endSection();
?>


