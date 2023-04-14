<?php
$this->extend("Main_master");

$this->section("dynamicpage");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <div class="container" style="text-align:center; ">
    <img src="<?php echo base_url(); ?>/public/assets/image/bg.jpg" alt="Forest" width="100%" height="80%">

    <h1>Welcome To Kangan Jewellers</h1>
    </div> -->
    <div class="container">
  <img src="<?php echo base_url(); ?>/public/assets/image/bg.jpg" alt="Background Image" style="width:100%; height:100%;">
  <div class="centered"><u>Welcome To Kangan Jewellers</u></div>
</div>
<style>
    .container {
  position: relative;
  text-align: center;
  color: white;
}
.centered {
  position: absolute;
  top: 50px;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size: 52px;
  font-family: 'fantasy';
}
</style>
</body>
</html>

<?php
    $this->endSection();
?>