<?php require("./layout/Header.php"); ?>
<?php require("./layout/Navbar.php"); ?>
<?php require("./layout/db.php"); ?>
<link rel="stylesheet" href="/static/css/chat.css">

    <section class="msger">
        <header class="msger-header">
            <div class="msger-header-title">
            <i class="fas fa-comment-alt"></i> Rwad Chat
            </div>
            <div class="msger-header-options">
            <span></span>
            </div>
        </header>

        <article class="msger-chat" id="chat">
            <?php
            $enid=$_GET["id"];
            $sql = "SELECT * FROM chat WHERE enid='$enid' order by id ASC";
            $result = $conn->query($sql);
            while($row=$result->fetch_assoc()){
            ?>
            <?php
            if($row["mid"]=="no"){
            ?>
            
            <div class="msg left-msg">
                <div class="msg-img" style="display:flex;justify-content:center;align-items:center;font-size:22px;color:white">En</div>
                <div class="msg-bubble">
                    <div class="msg-info">
                        <div class="msg-info-name"><?php echo $row["name"] ?></div>
                        <div class="msg-info-time"><?php echo $row["date"] ?></div>
                    </div>
                    <div class="msg-text">
                    <?php echo $row["data"] ?>
                    </div>
                </div>
            </div>
            <?php
            }else{
            ?>
            
            <div class="msg right-msg">
                <div class="msg-img" style="display:flex;justify-content:center;align-items:center;font-size:22px;color:white">Mem</div>
                <div class="msg-bubble">
                    <div class="msg-info">
                        <div class="msg-info-name"><?php echo $row["name"] ?></div>
                        <div class="msg-info-time"><?php echo $row["date"] ?></div>
                    </div>
                    <div class="msg-text">
                    <?php echo $row["data"] ?>
                    </div>
                </div>
            </div>
            <?php
            }
            }
            ?>
        </article>

        <script>document.getElementById('chat').lastElementChild.scrollIntoView({ behavior: 'smooth' });;</script>

        <form class="msger-inputarea" action="/member/action/chat.php" method="post">
            <input type="hidden" name="enid" value="<?php echo $_GET["id"] ?>">
            <input type="text" name="data" class="msger-input" placeholder="Enter your message...">
            <button type="submit" class="msger-send-btn">Send</button>
        </form>
    </section>

<?php require("./layout/Footer.php"); ?>