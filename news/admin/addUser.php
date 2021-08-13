<?php
session_start();
include('includes/config.php');

$message = '';
$error = '';



if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = mysqli_query($con,"SELECT * FROM tbladmin WHERE AdminUserName='$username' OR AdminEmailId='$email'");
    if ($result) 
        $info = mysqli_fetch_array($result);
        if ($info['AdminUserName'] == $username)
            $error = "نام کاربری از قبل ثبت شده است";
        
        elseif ($info['AdminEmailId'] == $email)
            $error = "ایمیل وارد شده از قبل ثبت شده است!";
    else
        $result2 = mysqli_query($con,"INSERT INTO tbladmin (AdminUserName, AdminPassword, AdminEmailId, Is_Active, user_roll)  VALUES ('$username', '$password', '$email', '1', 'editor')"  );

        if ($result2){
            $message = "ثبت نام موفقیت امیز بود";

        }else
            $error = "مشکلی پیش امد دوباره تلاش کنید";  
       
    
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <title>ثبت نام کاربر جدید</title>

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

</head>


<body class="fixed-left">

    <div id="wrapper">


        <div class="content-page">

            <!-- content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                  
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <h4 class="m-t-0 header-title"><b>ثبت نام کاربر جدید </b></h4>
                                <hr />
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- Success -->
                                        <?php if($message){ ?>
                                        <div class="alert alert-success" role="alert">
                                            <?php echo htmlentities($message);?>
                                        </div>
                                        <?php } ?>

                                        <!-- Error -->
                                        <?php if($error){ ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo htmlentities($error);?></div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <form class="form-horizontal" name="category" method="post">
                                        <div class="form-group">
                                                <label class="col-md-3 control-label">نام کاربری</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control"  name="username" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> ایمیل</label>
                                                <div class="col-md-9">
                                                    <input type="email" class="form-control"  name="email"
                                                        required>
                                                </div>
                                            </div>
                                         
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">رمز</label>
                                                <div class="col-md-9">
                                                    <input type="password" class="form-control"  name="password"
                                                        required>
                                                </div>
                                            </div>
                                          
                                 
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">&nbsp;</label>
                                                <div class="col-md-9">

                                                    <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="submit">
                                                        ثبت نام
                                                    </button>
                                                    <a href="index.php"><button type="button" class="btn btn-custom waves-effect waves-light btn-md" >
                                                       ورود
                                                    </button></a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>

    <!-- App js -->
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>

</body>

</html>
