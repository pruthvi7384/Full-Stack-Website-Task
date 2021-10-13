<?php
    // ============Navigation Bar Included Here===========
        include 'components/NavigationBar.php';
    // =========X===Navigation Bar Included Here===X======

    // =================Assign Variabkle=================
            $first_name ='';
            $last_name ='';
            $email_id ='';
            $contact_no ='';
            $password ='';

            $typee = '';

            $msg = '';

            $id='';
    // ==============X===Assign Variabkle===X==============

    // ==================Edit Profile=================
        if(isset($_GET['id']) && $_GET['id'] != ''){
            $id = mysqli_escape_string($con,$_GET['id']);
            $sql_r = mysqli_query($con,"SELECT * FROM user__info WHERE id = $id");
            $res_r = mysqli_fetch_assoc($sql_r);
            $first_name = $res_r['first_name'];
            $last_name = $res_r['last_name'];
            $email_id = $res_r['email_id'];
            $contact_no = $res_r['contact_no'];
            $password = $res_r['password'];
        }
    // ===============X===Edit Profile===X==============


    // ================Send Data To Database==============
            if(isset($_POST['sing_up'])){
                $first_name = mysqli_escape_string($con,$_POST['first_name']);
                $last_name =  mysqli_escape_string($con,$_POST['last_name']);
                $email_id =  mysqli_escape_string($con,$_POST['email']);
                $contact_no = mysqli_escape_string($con,$_POST['contact_no']);
                $password =  mysqli_escape_string($con,$_POST['password']);

                $sql = mysqli_query($con,"SELECT * FROM user__info WHERE email_id ='$email_id'");

                if($id == ''){
                    if(mysqli_num_rows($sql)>0){
                        $msg = "<div class='alert alert-warning alert-dismissible fade show mt-2 text-center' role='alert'>
                                    <strong>Ooop!</strong> Your Email Id Alrady Exist Please Try Entere Differnt Email Id.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
                    }else{ 
                        if($_FILES['image']['type']==''){
                            mysqli_query($con,"INSERT INTO user__info(first_name,last_name,email_id,contact_no,password) VALUES(' $first_name','$last_name','$email_id','$contact_no','$password')");
                            $msg = "<div class='alert alert-success alert-dismissible fade show mt-2 text-center' role='alert'>
                                            <strong>Congractualtion ! Your Singup Step Sussesfuly done ! <a href='pages/Login.php' class='alert-link'>Please Login Now</a> 
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>";
                            }else{
                                $type=$_FILES['image']['type'];
                                if($type!='image/jpeg' && $type!='image/png'){
                                    $msg = "<div class='alert alert-warning alert-dismissible fade show mt-2 text-center' role='alert'>
                                            <strong>Ooop!</strong> Invalid Image Formate Please Try To Select JPeG or PNG Image.
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>";
                                }else{
                                    $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
                                    move_uploaded_file($_FILES['image']['tmp_name'],SERVER_PROFILE_IMAGE.$image);
                                    mysqli_query($con,"INSERT INTO user__info(first_name,last_name,email_id,contact_no,password,profile_image) VALUES(' $first_name','$last_name','$email_id','$contact_no','$password','$image')");
                                    $msg = "<div class='alert alert-success alert-dismissible fade show mt-2 text-center' role='alert'>
                                            <strong>Congractualtion ! Your Singup Step Sussesfuly done ! <a href='pages/Login.php' class='alert-link'>Please Login Now</a> 
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>";
                                }
                        }
                    }
                }else{
                    if($_FILES['image']['type']==''){
                        mysqli_query($con,"UPDATE user__info SET first_name='$first_name',last_name='$last_name',email_id='$email_id',contact_no='$contact_no',password='$password' WHERE id='$id'");
                        //  echo "<script>window.location='Profile.php'</script>";
                    }else{
                        $img = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM user__info WHERE id='$id'"));
                        unlink(SERVER_PROFILE_IMAGE.$img['profile_image']);
                        if($_FILES['image']['type']!='image/jpeg' && $_FILES['image']['type']!='image/png'){
                            $msg = "<div class='alert alert-warning alert-dismissible fade show mt-2 text-center' role='alert'>
                                    <strong>Ooop!</strong> Invalid Image Formate Please Try To Select JPeG or PNG Image.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
                        }else{
                            $image = rand(11111,99999).'_'.$_FILES['image']['name'];
                            move_uploaded_file($_FILES['image']['tmp_name'],SERVER_PROFILE_IMAGE.$image);
                            mysqli_query($con,"UPDATE user__info SET first_name='$first_name',last_name='$last_name',email_id='$email_id',contact_no='$contact_no',password='$password',profile_image='$image' WHERE id='$id'");
                           //  echo "<script>window.location='Profile.php'</script>";
                        }
                    }
                    
                }
            }
    // ============X====Send Data To Database===X===========
?>
    <!-- ------------Singup Form Body-------------- -->
        <div class="container" id="signup_form" >
            <?php echo $msg; ?>
            <div class="row justify-content-center mt-3">
                <div class="col-xl-6 text-light text-center">
                    <h2>Signup To Acccount</h2>
                    <p>Choose from 130,000 online video courses with new additions published every second month</p>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-xl-6">
                    <form method="post" action="" enctype="multipart/form-data" class="row g-3 text-light">
                        <div class="col-xl-6">
                            <label class="form-label">First Name</label>
                            <input type="text" name="first_name" value="<?php echo $first_name; ?>" class="form-control" required>
                        </div>
                        <div class="col-xl-6">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="last_name" value="<?php echo $last_name; ?>" class="form-control" required>
                        </div>
                        <div class="col-xl-12">
                            <label class="form-label">Email Id</label>
                            <input type="email" name="email" value="<?php echo $email_id; ?>" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Contact Number</label>
                            <input type="text" name="contact_no" value="<?php echo $contact_no; ?>" class="form-control" required>
                        </div>
                        <div class="col-xl-12">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" value="<?php echo $password; ?>" class="form-control">
                        </div>
                        <div class="col-xl-12">
                            <label class="form-label">Profile Image</label>
                            <input type="file" class="form-control" name="image" value=""/>
                        </div>
                        <div class="col-xl-12 text-center">
                            <button type="submit" name="sing_up" class="btn btn-primary">
                                <?php if($id){
                                    echo "Update Now";
                                }else{
                                    echo "Signup Now";
                                }?>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- --------X----Singup Form Body----X---------- -->
<?php
    // ============Navigation Bar Included Here==========
        include 'components/Footer.php';
    // =========X===Navigation Bar Included Here===X======
?>
