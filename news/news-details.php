<?php
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


        <title>صفحه اصلی | آسمان نیوز</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
<style>
.media-body {
    margin: 0;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    text-align: right;
    background-color: #fff;
    padding: 10px;
}

.name {
    font-size: 1.25rem;
    margin-bottom: .5rem;
    font-family: inherit;
    font-weight: 500;
    line-height: 1.2;
    color: inherit;
}

.user-img {
    margin-left: 1rem!important;
    vertical-align: middle;
    border-style: none;
}

.date {
    margin-bottom: .5rem;
    font-family: inherit;
    font-weight: 500;
    line-height: 1.2;
    color: inherit;
}

.content {
    width: 100%;
    overflow-wrap: break-word;
    word-wrap: break-word;
}
</style>
  </head>

  <body>

    <!-- Navigation -->
   <?php include('includes/header.php');?>

    <!-- Page Content -->
    <div class="container">



      <div class="row" style="margin-top: 4%">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <!-- Blog Post -->
<?php
$pid=intval($_GET['nid']);
 $query=mysqli_query($con,"select tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.id='$pid'");
while ($row=mysqli_fetch_array($query)) {
?>

          <div class="card mb-4">

            <div class="card-body">
              <h2 class="card-title"><?php echo htmlentities($row['posttitle']);?></h2>
              <p><a href="category.php?catid=<?php echo htmlentities($row['cid'])?>"><?php echo htmlentities($row['category']);?></a> |
                <b> </b><?php echo htmlentities($row['subcategory']);?></p>
                <hr />

 <img class="img-fluid rounded" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">

              <p class="card-text"><?php
$pt=$row['postdetails'];
              echo  (substr($pt,0));?></p>

            </div>
            <div class="card-footer text-muted">
             <?php echo htmlentities($row['postingdate']);?>
             <?php } ?>
             <div style="direction: rtl;" class="card-body">
                                <form name="Comment" method="post" action="commentAdd.php">
                                    <input type="hidden" name="id" value="<?php echo $_GET['nid'];?>" />
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control"
                                            placeholder="نام خود را وارد کنید" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control"
                                            placeholder="ادرس ایمیل خود را وارد کنید" required>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="content" rows="3" placeholder="نظر خود را بنویسید"
                                            required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="submit">ارسال</button>
                                </form>
                            </div>

                            <?php 
                    $id = $_GET['nid'];
                    $query = "SELECT name, comment, postingDate FROM tblcomments WHERE postId = '$id' and status=1";
                    $result = mysqli_query($con, $query);

                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                       <hr>
                    <div class="media col-md-12 ">
                 
                       
                        <div class="col-md-10 media-body">
                            <div class="name"><?php echo htmlentities($row['name']);?></div>
                            <div class="date"><?php echo htmlentities($row['postingDate']);?></div>
                            <div class="content"><?php echo htmlentities($row['comment']);?></div>
                        </div>
                        <img class="d-flex w-100 col-md-2 rounded-circle user-img" src="images/usericon.png" alt="">
                    </div>
                    
                    <?php } ?>
            </div>
          </div>


                            
                            
   



        </div>

        <!-- Sidebar Widgets Column -->
      <?php include('includes/sidebar.php');?>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
      <?php include('includes/footer.php');?>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
