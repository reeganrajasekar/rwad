<?php require("./layout/Header.php"); ?>
<?php require("./layout/Navbar.php"); ?>
<?php require("./layout/db.php"); ?>
<div class="pagetitle container">
    <div style="display:flex;justify-content:space-between">
        <h1>Change Password</h1>
    </div>
</div>

<form class="container" onsubmit="document.getElementById('loader').style.display='block'" enctype="multipart/form-data" action="/member/action/member.php" method="post">
    <div class="form-floating mb-3 ">
        <input required type="password" class="form-control"  name="old" placeholder="Hospital Name">
        <label>Old Password</label>
    </div>
    <div class="form-floating mb-3 mt-3">
        <input required type="password" class="form-control"  name="new" placeholder="Mobile">
        <label>New Password</label>
    </div>
    <div style="display:flex;justify-content:flex-end">
        <button class="btn  w-25" style="background-color:#012970;color:#fff">Change</button>
    </div>
</form>

<?php require("./layout/Footer.php"); ?>