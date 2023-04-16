<?php require("./layout/Header.php"); ?>
<?php require("./layout/Navbar.php"); ?>
<?php require("./layout/db.php"); ?>
<div class="pagetitle container">
    <div style="display:flex;justify-content:space-between">
        <h1>Speaker Requests</h1>
    </div>
</div>
<div class="accordion" id="accordionExample">
    <?php
        $result = $conn->query("SELECT * FROM speech WHERE status='Applied' ORDER BY id DESC");
        if($result->num_rows > 0){
            $i=0;
            while($row=$result->fetch_assoc()){
                $i++;
                ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading<?php echo($row["id"])?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo($row["id"])?>" aria-expanded="false" aria-controls="collapse<?php echo($row["id"])?>">
                        <?php echo($i) ?> . <?php echo($row["title"]." - ".$row["status"])?>
                        </button>
                        </h2>
                        <div id="collapse<?php echo($row["id"])?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo($row["id"])?>" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <h6 style="color:#012970;">Speaker Details :</h6>
                                <div class="row">
                                    <?php
                                        $sid = $row["id"];
                                        $result1 = $conn->query("SELECT * FROM en WHERE id='$sid'");
                                        while($row1=$result1->fetch_assoc()){
                                    ?>
                                    <p class="text-muted col-6">Name : <span style="color:black"><?php echo $row1["name"] ?></span></p>
                                    <p class="text-muted col-6">Email : <span style="color:black"><?php echo $row1["email"] ?></span></p>
                                    <p class="text-muted col-6">Company : <span style="color:black"><?php echo $row1["comname"] ?></span></p>
                                    <p class="text-muted col-6">Contact : <span style="color:black"><?php echo $row1["mobile"] ?></span></p>
                                    <p class="text-muted col-12">Address : <span style="color:black"><?php echo $row1["address"] ?></span></p>
                                    <?php
                                        }
                                    ?>
                                </div>
                                <h6 style="color:#012970;">Request Details :</h6>
                                <p class="text-muted">Title : <span style="color:black"><?php echo $row["title"] ?></span></p>
                                <p class="text-muted">Category : <span style="color:black"><?php echo $row["cat"] ?></span></p>
                                <div class="my-3">
                                    <form action="/member/action/speaker.php" method="post" class="row">
                                        <input type="hidden" name="id" value="<?php echo($row["id"])?>">
                                        <p class="text-muted col-6">Status : 
                                            <span style="color:black">
                                                <select name="status" required class="form-select">
                                                    <option selected value="<?php echo($row["status"])?>"><?php echo($row["status"])?></option>
                                                    <option value="Approved">Approved</option>
                                                    <option value="Denied">Denied</option>
                                                </select>
                                            </span>
                                        </p>
                                        <p class="text-muted col-6">Comment : 
                                            <span style="color:black">
                                                <br>
                                                <input type="text" name="comment" value="<?php echo($row["comment"])?>" class=" form-control">
                                            </span>
                                        </p>
                                        <div class="col-12" style="display:flex;justify-content:right">
                                            <button class="btn btn-secondary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
            }
        }else{
    ?>
        <p style="text-align:center" >Nothing Found</td>
    <?php
        }
    ?>
</div>

<div class="pagetitle container mt-4">
    <div style="display:flex;justify-content:space-between">
        <h1>Old Requests</h1>
    </div>
</div>
<div class="accordion" id="accordionExample">
    <?php
        $result = $conn->query("SELECT * FROM speech WHERE NOT status='Applied' ORDER BY id DESC");
        if($result->num_rows > 0){
            $i=0;
            while($row=$result->fetch_assoc()){
                $i++;
                ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading<?php echo($row["id"])?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo($row["id"])?>" aria-expanded="false" aria-controls="collapse<?php echo($row["id"])?>">
                        <?php echo($i) ?> . <?php echo($row["title"]." - ".$row["status"])?>
                        </button>
                        </h2>
                        <div id="collapse<?php echo($row["id"])?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo($row["id"])?>" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <h6 style="color:#012970;">Speaker Details :</h6>
                                <div class="row">
                                    <?php
                                        $sid = $row["id"];
                                        $result1 = $conn->query("SELECT * FROM en WHERE id='$sid'");
                                        while($row1=$result1->fetch_assoc()){
                                    ?>
                                    <p class="text-muted col-6">Name : <span style="color:black"><?php echo $row1["name"] ?></span></p>
                                    <p class="text-muted col-6">Email : <span style="color:black"><?php echo $row1["email"] ?></span></p>
                                    <p class="text-muted col-6">Company : <span style="color:black"><?php echo $row1["comname"] ?></span></p>
                                    <p class="text-muted col-6">Contact : <span style="color:black"><?php echo $row1["mobile"] ?></span></p>
                                    <p class="text-muted col-12">Address : <span style="color:black"><?php echo $row1["address"] ?></span></p>
                                    <?php
                                        }
                                    ?>
                                </div>
                                <h6 style="color:#012970;">Request Details :</h6>
                                <p class="text-muted">Title : <span style="color:black"><?php echo $row["title"] ?></span></p>
                                <p class="text-muted">Category : <span style="color:black"><?php echo $row["cat"] ?></span></p>
                                <div class="my-3">
                                    <form action="/member/action/speaker.php" method="post" class="row">
                                        <input type="hidden" name="id" value="<?php echo($row["id"])?>">
                                        <p class="text-muted col-6">Status : 
                                            <span style="color:black">
                                                <select name="status" required class="form-select">
                                                    <option selected value="<?php echo($row["status"])?>"><?php echo($row["status"])?></option>
                                                    <option value="Approved">Approved</option>
                                                    <option value="Denied">Denied</option>
                                                </select>
                                            </span>
                                        </p>
                                        <p class="text-muted col-6">Comment : 
                                            <span style="color:black">
                                                <br>
                                                <input type="text" name="comment" value="<?php echo($row["comment"])?>" class=" form-control">
                                            </span>
                                        </p>
                                        <div class="col-12" style="display:flex;justify-content:right">
                                            <button class="btn btn-secondary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
            }
        }else{
    ?>
        <p style="text-align:center" >Nothing Found</td>
    <?php
        }
    ?>
</div>
<?php require("./layout/Footer.php"); ?>