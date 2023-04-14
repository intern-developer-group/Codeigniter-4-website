

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
    <h1 align="center" style="background-color: #fff; color:black;padding-bottom: 10px;"> Manage Users</h1>
</div>

<div class="col-lg-2 col-md-2 col-sm-12 col-sm-12">
<div class="container">
    <button class="btn btn-secondary my-2 my-sm-0" style="margin-left: 50px;" type="submit" style="margin-top: 10px;">
         <a class="nav-link" href="AdminAddUser">
         Add New Merchant</a></button>
</div>
</div>



<div class="col-lg-12 col-md-12 col-sm-12 col-sm-12">
    <h3 align="center" style="background-color: #fff; color:black;padding-bottom: 10px;"> User List</h3>
</div>

<br><br><br>
<div class="col-lg-12 col-md-12 col-sm-12 col-sm-12 table-responsive text-wrap" style="border: 2px;">
<div class="container">

    <table id="dtHorizontalVerticalExample dtBasicExample" class="table table-striped table-bordered table-sm " cellspacing="0" width="100%">
        <thead>
            <tr>
                
                <th>Owner name </th>
                <th>Shop name </th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Password</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>



            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($userdata as $u) {
                echo "<tr>";
                echo "<td>" . $u['Owner_name'] . "</td>";
                echo "<td>" . $u['Shop_name'] . "</td>";
                echo "<td>" . $u['mo'] . "</td>";
                echo "<td>" . $u['email'] . "</td>";
                echo "<td>" . $u['pwd'] . "</td>";
                echo "<td>" . $u['status'] . "</td>";
                echo "<td><a href='" . base_url() . "/public/AdminEditUser?email=" . $u['email'] . "'><input type='button' class='btn-primary' value='Edit'/></a></td>";
                echo "<td><a href='" . base_url() . "/public/AdminDeleteUser?email=" . $u['email'] . "'><input type='button' class='btn-danger' value='Delete'</a></td>";
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