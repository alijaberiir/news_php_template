<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0){
    
header('location:index.php');

}else{
    $error = '';
    $msg='';
if(isset($_POST['submit'])){
$password=$_POST['passwords'];
$newpassword=$_POST['newpassword'];
$user=$_SESSION['login'];
$q=mysqli_query($con,"SELECT * from tbladmin where AdminUserName='$user' || AdminEmailId='$user' ");
$row=mysqli_fetch_array($q);
if($row>0){
$dbpassword=$row['AdminPassword'];
if($dbpassword == $password ){
    $q1=mysqli_query($con,"UPDATE  tbladmin SET AdminPassword='$newpassword' WHERE  AdminUserName='$user' || AdminEmailId='$user'");
    $msg="رمز شما تغییر یافت";
   
    }else{
    $error="مشکلی پیش امد دوباره تلاش کنید";
}

}}
?>


<!DOCTYPE html>
<html lang="en">
    <head>

        <title>مدیرت پنل | ویرایش رمز</title>

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>



    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">


              <!-- Top Bar Start -->
             <?php include('includes/topheader.php');?>
              <!-- ========== Left Sidebar Start ========== -->
               <?php include('includes/leftsidebar.php');?>
              <!-- Left Sidebar End -->



<!-- Top Bar Start -->
 <?php //include('includes/topheader.php');?>
<!-- Top Bar End -->


<!-- ========== Left Sidebar Start ========== -->
           <?php //include('includes/leftsidebar.php');?>
 <!-- Left Sidebar End -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">تغیر رمز عبور</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">مدیر</a>
                                        </li>

                                        <li class="active">
                                         تغییر رمز
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>تغییر رمز </b></h4>
                                    <hr />



<div class="row">
<div class="col-sm-6">
<!---Success Message--->
<?php if($msg){ ?>
<div class="alert alert-success" role="alert">
 <?php echo htmlentities($msg);?>
</div>
<?php } ?>

<!---Error Message--->
<?php if($error){ ?>
<div class="alert alert-danger" role="alert">
<?php echo htmlentities($error);?></div>
<?php } ?>


</div>
</div>





<div class="row">
<div class="col-md-10">
<form class="form-horizontal" name="chngpwd" method="post" onSubmit="return valid();">

<div class="form-group">
<label class="col-md-4 control-label">رمز فعلی</label>
<div class="col-md-8">
<input type="text" class="form-control" value="" name="passwords" required>
</div>
</div>


<div class="form-group">
<label class="col-md-4 control-label">رمز جدید</label>
<div class="col-md-8">
<input type="text" class="form-control" value="" name="newpassword" required>
</div>
</div>



 <div class="form-group">
<label class="col-md-4 control-label">&nbsp;</label>
<div class="col-md-8">

<button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="submit">
                                                    تغییر
                                                </button>
                                                    </div>
                                                </div>

	                                        </form>
                        				</div>


                        			</div>











                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->

<?php include('includes/footer.php');?>

            </div>
        </div>

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>
<?php } ?>
