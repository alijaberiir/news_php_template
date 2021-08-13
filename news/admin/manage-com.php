<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0 || $_SESSION['user_roll'] !== 'admin')
  {
header('location:index.php');
}
else{

if($_GET['action']='st')
{

$postid=intval($_GET['id']);
$query3=mysqli_query($con,"SELECT status FROM tblcomments where id ='$postid'");
$row3=mysqli_fetch_array($query3);
if ($row3['status'] == 0){$f=1;}else{$f=0;};
$query=mysqli_query($con,"UPDATE tblcomments SET status='$f' WHERE id='$postid'");
if($query)
{
$msg="کامنت قابل نمایش شد";
}
else{
$error="مشکلی پیش امده لطفا دوباره تلاش کنید.";
}
}
if($_GET['del']='del'){
$postid=intval($_GET['did']);
$query4=mysqli_query($con,"DELETE FROM tblcomments   WHERE id='$postid'");
if($query4)
{
$msg="کامنت حذف شد";
}
else{
$error="مشکلی پیش امده لطفا دوباره تلاش کنید.";
}
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App title -->
        <title>پنل مدیریت | مدیریت کامنت</title>

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="../plugins/morris/morris.css">

        <!-- jvectormap -->
        <link href="../plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="../plugins/switchery/switchery.min.css">

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
           <?php include('includes/topheader.php');?>

            <!-- ========== Left Sidebar Start ========== -->
           <?php include('includes/leftsidebar.php');?>


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">مدیریت کامنت </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">مدیریت کامنت</a>
                                        </li>
                                        <li>
                                            <a href="#">کامنت</a>
                                        </li>
                                        <li class="active">
                                             ادمین
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


                                    <div class="table-responsive">
<table class="table table-colored table-centered table-inverse m-0">
<thead>
<tr>

<th>عنوان خبر</th>
<th>نام</th>
<th>متن</th>
<th>زمان</th>
<th>وضعیت</th>
<th>عملیات</th>
</tr>
</thead>
<tbody>

<?php
$query=mysqli_query($con,"SELECT * FROM tblcomments ");
$rowcount=mysqli_num_rows($query);

if($rowcount==0)
{
?>
<tr>

<td colspan="4" align="center"><h3 style="color:red">موردی یافت نشد</h3></td>
<tr>
<?php
} else {

while($row=mysqli_fetch_array($query))
{
$nid=$row['postId'];
;
if($row['status'] == 0){
    $st="مخفی";
   
}else{
        $st="نمایان";
    }

$query2=mysqli_query($con,"SELECT PostTitle FROM tblposts where id = '$nid' ");
$rowcount2=mysqli_num_rows($query2);
while($row2=mysqli_fetch_array($query2))
{

?>
 <tr>
<td><b><?php echo htmlentities($row2['PostTitle']);?></b></td>
<td><?php echo htmlentities($row['name'])?></td>
<td><?php echo htmlentities($row['comment'])?></td>
<td><?php echo htmlentities($row['postingDate'])?></td>
<td><?php echo $st;?></td>
<td><a href="manage-com.php?id=<?php echo htmlentities($row['id']);?>&&action=st"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a>
    &nbsp;<a href="manage-com.php?did=<?php echo htmlentities($row['id']);?>&&action=del" onclick="return confirm('Do you reaaly want to delete ?')"> <i class="fa fa-trash-o" style="color: #f05050"></i></a> </td>
 </tr>
<?php } }}?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div> <!-- container -->

                </div> <!-- content -->

       <?php include('includes/footer.php');?>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->



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

        <!-- CounterUp  -->
        <script src="../plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="../plugins/counterup/jquery.counterup.min.js"></script>

        <!--Morris Chart-->
		<script src="../plugins/morris/morris.min.js"></script>
		<script src="../plugins/raphael/raphael-min.js"></script>

        <!-- Load page level scripts-->
        <script src="../plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="../plugins/jvectormap/gdp-data.js"></script>
        <script src="../plugins/jvectormap/jquery-jvectormap-us-aea-en.js"></script>


        <!-- Dashboard Init js -->
		<script src="assets/pages/jquery.blog-dashboard.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>
<?php } ?>
