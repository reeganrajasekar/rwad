<?php require("./layout/Header.php"); ?>
<?php require("./layout/Navbar.php"); ?>
<?php require("./layout/db.php"); ?>
<div class="pagetitle">
    <h1>Dashboard</h1>
</div>

<div class="row">
    <div class="col-4">
        <div class="card info-card sales-card">
            <div class="card-body">
                <h5 class="card-title">Total Events</h5>

                <div class="d-flex align-items-center">
                <div class="ps-3">
                    <h6>
                        <?php
                        $result = $conn->query("SELECT id FROM event");
                        echo($result->num_rows);
                        ?>
                    </h6>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card info-card sales-card">
            <div class="card-body">
                <h5 class="card-title">Total Members</h5>

                <div class="d-flex align-items-center">
                <div class="ps-3">
                    <h6>
                        <?php
                        $result = $conn->query("SELECT id FROM members");
                        echo($result->num_rows);
                        ?>
                    </h6>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card info-card sales-card">
            <div class="card-body">
                <h5 class="card-title">Total Activities</h5>

                <div class="d-flex align-items-center">
                <div class="ps-3">
                    <h6>
                        <?php
                        $result = $conn->query("SELECT id FROM activities");
                        echo($result->num_rows);
                        ?>
                    </h6>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card info-card sales-card">
            <div class="card-body">
                <h5 class="card-title">Total Products</h5>

                <div class="d-flex align-items-center">
                <div class="ps-3">
                    <h6>
                        <?php
                        $result = $conn->query("SELECT id FROM store");
                        echo($result->num_rows);
                        ?>
                    </h6>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php require("./layout/Footer.php"); ?>