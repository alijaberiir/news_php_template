<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0 || $_SESSION['user_roll'] !== 'admin')
  {
header('location:index.php');
}
else
{
//     if(!$con){
//         $ssrv="Server Not Connected";
//     }
// else



?>


<!DOCTYPE html>
<html lang="en">
    <head>

        <title>پنل مدیریت | اضافه کردن دسته</title>

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
<!-- Top Bar End -->


<!-- ========== Left Sidebar Start ========== -->
           <?php include('includes/leftsidebar.php');?>
 <!-- Left Sidebar End -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">افزودن دسته</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">مدیر</a>
                                        </li>
                                        <li>
                                            <a href="#">دسته </a>
                                        </li>
                                        <li class="active">
                                            افزودن دسته
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
                                    <h4 class="m-t-0 header-title"><b>افزودن دسته </b></h4>
                                    <hr />



<div class="row">
<div class="col-sm-6">
<!---Success Message--->
  <!--ssrv  -->

<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "newsportal";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
// if(isset($_POST['submit'])){
//     $category=$_POST['category'];
//     $description=$_POST['description'];
//     $status="1";
//     $sql = "INSERT INTO  tblcategory(CategoryName, Description, Is_Active)
//     VALUES ('$category', '$description', '$status')";
//     if ($conn->query($sql) === TRUE) {
//         echo "New record created successfully";
//     } else {
//         echo "Error: " . $sql . "<br>" . $conn->error;
//     }
// }
// $conn->close();
?>
  <?php
  if(isset($_POST['submit']))
  {
      $category=$_POST['category'];
      $description=$_POST['description'];
      $status="1";
      $query=mysqli_query($con,"insert into tblcategory(CategoryName,Description,Is_Active)
      values('$category','$description','$status')");
      if($query)
      {
          $msg = "دسته ایجاد شد";
      }
      else
      {
          $error = "مشکلی پیش امد لطفا دوباره تلاش کنید";
      }
  }
  ?>

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
                        				<div class="col-md-6">
                        					<form class="form-horizontal" method="post">
	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">دسته</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" value="" name="category" required>
	                                                </div>
	                                            </div>

	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">توضیحات دسته</label>
	                                                <div class="col-md-10">
	                                                    <textarea class="form-control" rows="5" name="description" required></textarea>
	                                                </div>
	                                            </div>

        <div class="form-group">
                                                    <label class="col-md-2 control-label">&nbsp;</label>
                                                    <div class="col-md-10">

                                                <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="submit">
                                                    ارسال
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
