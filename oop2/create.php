<?php 
session_start();
require 'Admin.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){

// CODE ...... 
$title     = $_POST['title'];
$content    = $_POST['content'];



$admin = new admin($title,$content,$_FILES);
$admin->Register();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <title>Register</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
 <h2>blog</h2>


 <?php 
     if(isset($_SESSION['Message'])){
         foreach($_SESSION['Message'] as $key => $val){
             echo '* '.$key." : ".$val.'<br>';
         }
     unset($_SESSION['Message']);
        }
 
 ?>



 <form  action="<?php echo $_SERVER['PHP_SELF'];?>"   method="post"  enctype="multipart/form-data" >

 

 <div class="form-group">
   <label for="exampleInputName">title</label>
   <input type="text" class="form-control" id="exampleInputName"  name="title" aria-describedby="" placeholder="Enter title">
 </div>


 <div class="form-group">
   <label for="exampleInputName">content</label>
   <input type="text" class="form-control" id="exampleInputName"  name="content" aria-describedby="" placeholder="Enter content">
 </div>

 <div class="form-group">
                            <label for="exampleInputPassword">Image</label><br>
                            <input type="file" name="image">
                        </div>
      
 
 <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>


