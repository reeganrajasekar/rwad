<?php require("./layout/Header.php"); ?>
<?php require("./layout/Navbar.php"); ?>
<?php require("./layout/db.php"); ?>
<div class="pagetitle container">
    <div style="display:flex;justify-content:space-between">
        <h1>Chat</h1>
    </div>
</div>

<div class="table-responsive">        
    <table class="table table-striped table-bordered" style="background-color:white">
        <thead style="text-align:center">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $result = $conn->query("SELECT DISTINCT enid FROM chat");
            if($result->num_rows > 0){
                $i=0;
                while($row=$result->fetch_assoc()){
                    $i++;
                    $enid=$row['enid'];
                    $result1 = $conn->query("SELECT * FROM en WHERE id='$enid'");
                    while($row1=$result1->fetch_assoc()){
                    ?>
                        <tr>
                            <td style="text-align:center"><?php echo($i) ?></td>
                            <td><?php echo($row1["name"]) ?></td>
                            <td class="text-center">
                                <form action="/member/chat_en.php" method="get">
                                    <input type="hidden" name="id" value="<?php echo($row["enid"]) ?>">
                                    <button class="btn btn-secondary">Chat</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                }
            }else{
            ?>
            <tr>
                <td style="text-align:center" colspan="3">Nothing Found</td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<?php require("./layout/Footer.php"); ?>