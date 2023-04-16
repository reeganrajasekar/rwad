<?php require("./layout/Header.php"); ?>
<?php require("./layout/Navbar.php"); ?>
<?php require("./layout/db.php"); ?>
<div class="pagetitle container">
    <div style="display:flex;justify-content:space-between">
        <h1>Activities</h1>
        <button class="btn btn-primary" style="background-color: #012970;" data-bs-toggle="modal" data-bs-target="#myModal">Add</button>
    </div>
</div>

<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" style="color:#012970">Add Activity</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <form onsubmit="document.getElementById('loader').style.display='block'" enctype="multipart/form-data" action="/member/action/activity.php" method="post">
                <div class="form-floating mb-3 ">
                    <input required type="text" class="form-control"  name="title" placeholder="Hospital Name">
                    <label>Title</label>
                </div>
                <div class="form-floating mb-3 mt-3">
                    <input required type="text" class="form-control"  name="data" placeholder="Mobile">
                    <label>Description</label>
                </div>
                <div class="form-floating mb-3 mt-3">
                    <input required type="file" class="form-control"  name="img" placeholder="ATM No">
                    <label>Image</label>
                </div>
                <div class="form-floating mb-3 mt-3">
                    <input required type="date" class="form-control"  name="date" placeholder="PIN">
                    <label>Date</label>
                </div>
                <div style="display:flex;justify-content:flex-end">
                    <button class="btn  w-25" style="background-color:#012970;color:#fff">Add</button>
                </div>
            </form>
        </div>

        </div>
    </div>
</div>

<div class="table-responsive">        
    <table class="table table-striped table-bordered" style="background-color:white">
        <thead style="text-align:center">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $result = $conn->query("SELECT * FROM activities ORDER BY id DESC");
            if($result->num_rows > 0){
                $i=0;
                while($row=$result->fetch_assoc()){
                    $i++;
                    ?>
                        <tr>
                            <td style="text-align:center"><?php echo($i) ?></td>
                            <td><?php echo($row["title"]) ?></td>
                            <td><?php echo($row["data"]) ?></td>
                            <td style="width:300px">
                                <img src="/static/uploads/<?php echo($row["img"]) ?>" class="w-100">
                            </td>
                            <td><?php echo($row["date"]) ?></td>
                            <td class="text-center">
                                <form action="/member/action/delete_activity.php" method="get">
                                    <input type="hidden" name="id" value="<?php echo($row["id"]) ?>">
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                }
            }else{
            ?>
            <tr>
                <td style="text-align:center" colspan="6">Nothing Found</td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<?php require("./layout/Footer.php"); ?>