<?php
    // ==============Include Top File==============
        include 'Top.php';
    // ===========X===Include Top File===X===========
?>
    <!-- ----------------Top Navigation Bar Here----------------- -->
        <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?php echo SITE__PATH ?>/index.php">Simple Web Project</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav align-items-center">
                        <?php
                            if(!isset($_SESSION['IS_LOGIN'])){
                        ?>
                            <li class="nav-item">
                                <a class="nav-link active text-uppercase " href="<?php echo SITE__PATH ?>/index.php">Signup</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase " href="<?php echo SITE__PATH ?>/pages/Login.php">Login</a>
                            </li>
                        <?php }else{ ?>
                            <li class="text-primary">Welcome ! <span><?php echo $_SESSION['USER_EMAIL']; ?></span></li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase" href="<?php echo SITE__PATH ?>/pages/Profile.php">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase" href="<?php echo SITE__PATH ?>/pages/Logout.php"><button class="btn btn-success text-uppercase">Logout</button></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
    <!-- -------------X---Top Navigation Bar Here---X-------------- -->