<?php
    // ============Navigation Bar Included Here===========
        include '../components/NavigationBar.php';
    // =========X===Navigation Bar Included Here===X======

    // ===================Condition====================
        if(!isset($_SESSION['IS_LOGIN'])){
            echo "<script>window.location='Login.php'</script>";
        }
    // =================X==Condition===X=================

    // =============Global Variable Declare==============
        $type="";
        $id="";
    // =========X====Global Variable Declare===X===========

    // =============Delete Account Functionality==========
        if(isset($_GET['type']) && $_GET['type']!='' && isset($_GET['id']) && $_GET['id']>0){
            $type = mysqli_escape_string($con,$_GET['type']);
            $id=mysqli_escape_string($con,$_GET['id']);

            if($type=='delete'){
                $img = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM user__info WHERE id='$id'"));
                unlink(SERVER_PROFILE_IMAGE.$img['profile_image']);
                mysqli_query($con,"DELETE FROM user__info WHERE id='$id'");
                echo "<script>window.location='Logout.php'</script>";
                echo "<script>window.location='../index.php'</script>";
            }
        }
    // ===========X==Delete Account Functionality===X=======

    // =============Retriew Data Frome Datavbase============
        $current_user =  $_SESSION['USER_EMAIL'];

        $sql = mysqli_query($con,"SELECT * FROM user__info WHERE email_id='$current_user'");

        $res = mysqli_fetch_assoc($sql);
    // ==========X===Retriew Data Frome Datavbase====X========
?>
    <!-- ------------Profile Page------------- -->
        <div class="container" id="profile_page">
            <div class="row justify-content-center mt-3">
                <div class="col-xl-6 text-light text-center">
                    <h2>Profile</h2>
                    <p>Your Profile Display Here...</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-6 text-light">
                    <a href="<?php echo SITE__PATH ?>/index.php?id=<?php echo $res['id'] ?>"><button class="btn btn-primary"><i class="fas fa-pen"></i></button></a>
                </div>
            </div>
            <div class="row justify-content-center mt-2">
                <div class="col-xl-6 text-center">
                    <div class="profile_image">
                        <?php 
                            if(!$res['profile_image']){
                        ?>
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAM1BMVEXk5ueutLeqsbTn6eqpr7PJzc/j5ebf4eLZ3N2wtrnBxsjN0NLGysy6v8HT1tissra8wMNxTKO9AAAFDklEQVR4nO2d3XqDIAxAlfivoO//tEOZWzvbVTEpic252W3PF0gAIcsyRVEURVEURVEURVEURVEURVEURVEURVEURVEURflgAFL/AirAqzXO9R7XNBVcy9TbuMHmxjN6lr92cNVVLKEurVfK/zCORVvW8iUBnC02dj+Wpu0z0Y6QlaN5phcwZqjkOkK5HZyPAjkIjSO4fIdfcOwFKkJlX4zPu7Ha1tIcwR3wWxyFhRG6g4Je0YpSPDJCV8a2Sv2zd1O1x/2WMDZCwljH+clRrHfWCLGK8REMiql//2si5+DKWKcWeAGcFMzzNrXC/0TUwQ2s6+LhlcwjTMlYsUIQzPOCb7YBiyHopyLXIEKPEkI/TgeuiidK/R9FniUDOjRDpvm0RhqjMyyXNjDhCfIMYl1gGjIMIuYsnGEYRMRZOMMunaLVwpWRW008v6fYKDIzxCwVAeNSO90BJW6emelYBRF/kHpYGVaoxTDAaxOFsfP9y8hpJ4xd7gOcij7JNGQ1EYFgkPJa1jQEiYZXRaRINKxSDUW9n+FT82lSKadkiru9/4XPqSLWOekGPoY05TAvLm9orm+YWuwHoBHkZKijNBJGmeb61eL6Ff/6q7bLr7yvv3vKGhpDRjvgjGaPz+gUg6YgcvpyAR2FIZ9U6nEEyZRTovmEU32KichpGn7C17XrfyH9gK/c0CMP05HZIM2uf9sEveizKveBy9/6Qt7o89ne33D525cfcIMW6ab+TMEukQbQbu+xu7X3A9bChmWaCeAkG17bpntwXgWxHaMzGPmUaR5dQZiKqRVeUZ3047fi3nAu28h4CHxCsZAgmEH8Y27jJAhm8c+5RQzRQNVGhVFSfxOYIjp/pP7RxzjevYXVGf4eLt+BJ1vCuLuLkrgABgCGXZ2wik5uty+oBvNirI6mkzhAf4Gsb58Hcm67Jzd+KwD10BYPLL3e0MjvKrgAULnOfveF/O4N2Xb9BZom3gJes3F9X5Zze8/6Yt09b4CrqsEjUv8oFBaR2rl+6CZr2xVrp24o/WitBKuGrrpl1+bFkmK2qXTON4VpbdfLa7o7y/WdLxG7lm2Lqh2clOwTegbvc/vj2U78CwhA87Bn8G5Nk3eOb0Nsr9flz3sG78UUtue4kpv1xvjg3TMay62BMlTlP+vrOMnJsRmt/ze0jsfkPPYdAH57hK+34PeOyc8XIXu5xT2HsUkdZz+adwg8HGFfQ3K5jtDvbUiO4Di9/ywHGrL88pDizZ++oTp+an+SMX/ndymUCwmHMdO7yuOx83pUx/eEMU0AvxWndwgidAqOZ8ypCwdEfvvEo6D9HwpA8wzvmOJEqAg9ySu8g4x0Hb9hSB/BANEKJ+LbPBU0lzbAJs4xt1AoshKkUGQmiH8/jJ0gdhTTLmSegHlPE0oOdXALnqDjKYh3px//fSgSWG8UqfrrIICzYYSJXRr9BSPbpNzw7gBjKjKOYI7ReIGqQRIap5+5MdjyvuDkExvGeXSlONWZAP3/AZBwJohU7QJRGU+cTVH18ELmRPNBmibW6MT/k1b0XhdkRBvyT6SB6EYv/GvhSmRNpGngRULsAlxMCGNXp7w3FfdEbTEEDdLI9TdIKRUzUesa3I461ER8cpNT7gMRhpKmYVS9ELOgCUQsa4SsulciKiLbY+AnHD8cpuhISsnxpamI84sbDq9qYJgf8wiiOBrC7Ml7M7ZECCqKoiiKoiiKoiiKoijv5AvJxlZRyNWWLwAAAABJRU5ErkJggg==" alt="">
                        <?php }else{?>
                            <img src="<?php echo SITE_PROFILE_IMAGE.$res['profile_image'] ?>" alt="">
                        <?php } ?>
                        <h4 class="text-light mt-2"><?php echo $res['first_name']; ?> <?php echo $res['last_name']; ?></h4>
                    </div>
                </div>
            </div>
            <div class="row justify-content-around mt-2">
                <div class="col-xl-6 d-flex justify-content-between flex-wrap">
                    <ul class="text-light">
                        <li>Email Id</li>
                        <li>Contact Number</li>
                        <li>Password</li>
                    </ul>
                    <ul class="text-info">
                        <li><?php echo $res['email_id']; ?></li>
                        <li><?php echo $res['contact_no']; ?></li>
                        <li><?php echo $res['password']; ?></li>
                    </ul>
                </div>
            </div>
            <div class="row justify-content-center mt-2">
                <div class="col-xl-6 text-danger text-center">
                    <p>Danger Zone</p>
                    <a href="?id=<?php echo $res['id']; ?>&type=delete"><button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></a>
                </div>
            </div>
        </div>
    <!-- ---------X---Profile Page---X---------- -->
<?php
    // ============Navigation Bar Included Here==========
        include '../components/Footer.php';
    // =========X===Navigation Bar Included Here===X======
?>