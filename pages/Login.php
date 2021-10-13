<?php
    // ============Navigation Bar Included Here===========
        include '../components/NavigationBar.php';
    // =========X===Navigation Bar Included Here===X======

    // ===================Condition====================
        if(isset($_SESSION['IS_LOGIN'])){
            echo "<script>window.location='Profile.php'</script>";
        }
    // =================X==Condition===X=================

    // =============Variable Delare=================
        $msg="";
    // ==========X===Variable Delare===X==============

    // ================Login Functionality Here===========
        if(isset($_POST['login'])){
            $email_id = mysqli_escape_string($con,$_POST['email']);
            $password = mysqli_escape_string($con,$_POST['password']);
            
            // =======Featch To Database Currect Cradantioal=========
                $sql="SELECT * FROM user__info WHERE email_id='$email_id' and password='$password'";
                $res=mysqli_query($con,$sql);
            // ====X===Featch To Database Currect Cradantioal==X======\
        
            if(mysqli_num_rows($res)>0){
                $row=mysqli_fetch_assoc($res);
                $_SESSION['IS_LOGIN']='yes';
                $_SESSION['USER_EMAIL']=$row['email_id'];
                echo "<script>window.location='Profile.php'</script>";
            }else{
                $msg = "<div class='alert alert-warning alert-dismissible fade show mt-2 text-center' role='alert'>
                        <strong>Ooop!</strong> Something Want Wrong Please Check Email Id Or Password Otherwise Singup Now.
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
            }
        }
    // ==============X==Login Functionality Here==X=========
?>
    <!-- ------------Singup Form Body-------------- -->
        <div class="container" id="signup_form" >
            <?php echo $msg; ?>
            <div class="row justify-content-center mt-3">
                <div class="col-xl-6 text-light text-center">
                    <h2>Login To Your Acccount</h2>
                    <p>Choose from 130,000 online video courses with new additions published every second month</p>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-xl-6">
                    <form method="post" class="row g-3 text-light">
                        <div class="col-xl-12">
                            <label class="form-label">Email Id</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="col-xl-12">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="col-xl-12 text-center">
                            <button type="submit" name="login" class="btn btn-primary">Login Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- --------X----Singup Form Body----X---------- -->
<?php
    // ============Navigation Bar Included Here==========
        include '../components/Footer.php';
    // =========X===Navigation Bar Included Here===X======
?>