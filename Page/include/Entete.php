<?php
    session_start();
    
    if(!isset($_SESSION['Id'], $_SESSION['Name']))
    {
        header("Location: http://localhost/Advance/BalibProj/SNCC/");
    }
?>
<div class="row">
    <div class="col-md-6" id="Welcome_Zone">
            <div class="btn-group">
                <?php
                    if((strcmp($_SESSION['Group_Id'],'1')==0 ||strcmp($_SESSION['Group_Id'],'4')==0))
                    {
                        echo '<a class="btn btn-primary" id="icon_home" href="Dashboard.php"><span class="glyphicon glyphicon-home"></span></a>';
                    }
                ?>
                <a id="Main_Welcome" class="btn btn-primary" href="#">
                    Bienvenue
                    <span class="User_Name">
                        <?php echo utf8_encode($_SESSION['Name']); ?>
                    </span>
                </a>
            </div>
    </div>
    
    <div class="col-md-6" id="Logout_Zone">
        <a href="../Code/Controleur/Logout.php">
            <button type="button" class="btn btn-primary" id="Btn_Logout" name="btn_Logout">
                <span class="glyphicon glyphicon-log-out"></span>
                DECONNEXION
            </button>
        </a>
    </div>
</div>

