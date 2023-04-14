

<?php
$this->extend("master_admin");

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
    <h1 align="center" style="background-color: #fff; color:black;padding-bottom: 10px;"> Manage Contact</h1>
</div>


<div class="col-lg-12 col-md-12 col-sm-12 col-sm-12">
    <h3 align="center" style="background-color: #fff; color:black;padding-bottom: 10px;"> Contact List</h3>
</div>

<br><br><br>
<div class="col-lg-12 col-md-12 col-sm-12 col-sm-12 table-responsive text-wrap" style="border: 2px;">
<div class="container">

    <table id="dtHorizontalVerticalExample dtBasicExample" class="table table-striped table-bordered table-sm " cellspacing="0" width="100%">
        <thead>
            <tr>
                
                <th>Name </th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Massage</th>
                <th>Delete</th>



            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($userdata as $u) {
                echo "<tr>";
                echo "<td>" . $u['name'] . "</td>";
                echo "<td>" . $u['mo'] . "</td>";
                echo "<td>" . $u['email'] . "</td>";
                echo "<td>" . $u['massage'] . "</td>";
                echo "<td><a href='" . base_url() . "/public/AdminDeleteContact?email=" . $u['email'] . "'><input type='button' class='btn-danger' value='Delete'</a></td>";
                echo "<tr>";
               
            }
            ?>
        </tbody>
    </table>
</div>
</div>
</div>


<?php
$this->endSection();
?>