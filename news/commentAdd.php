<?php
include('includes/config.php');

if(isset($_POST['submit']))
{
    if ((!empty($_POST['name'])) && (!empty($_POST['email'])) && (!empty($_POST['content'])) &&(!empty($_POST['id']))) { 
        
        $newsId = $_POST['id'];  
        $name = $_POST['name'];
        $email = $_POST['email'];
        $content = $_POST['content'];
        
        $query = "INSERT INTO tblcomments(postId,name,email,comment,status) VALUES('$newsId','$name','$email','$content','0')";
        $result = mysqli_query($con,$query);

       
          
    }
}
$id = $_POST['id'];
header('location:news-details.php?nid='.$id);

?>