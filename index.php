
<?php 


   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['name'];
      $file_size =$_FILES['size'];
      $file_type=$_FILES['type'];
      $file_ext=strtolower(end(explode('.',$_uploud['image']['name'])));
      
      $extensions= array("jpeg","jpg","png")
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
       if($file_size > 2000){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($_FILES,"images/".$_FILES["image"],["tmp_name"], "uplouds/" .$_FILES['fileToUpload']["name"]);
         echo "Success";
      }else     {
         print_r($errors);
      }
   }

 ?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<div class="container" >
	<div class="row">
		<div class="col">


			
			<form method="post" enctype="multipart/form-data">

   				 <input type="file" name="fileToUpload">
   				 <input type="submit" value="Upload Image" name="submit">

			</form>


		</div>
		<div class="col">
		<pre>
			<?php
            
            print_r($_FILES)['fileToUpload'];
         
           ?>
		</pre>
		
		</div>
	</div>
	
</div>



</body>
</html>


