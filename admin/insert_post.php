<!DOCTYPE html>
<html>
<head>
	 <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>
	<title></title>
</head>
<body>
	<form action="insert_post.php" method="post" enctype="multipart/form-data">

		<table width="800" align="center" border="2" bgcolor="orange">
			<tr>
				<td colspan="6">
					
					<h1 align="center">Insert New Post:</h1>
				</td>
			</tr>
			<tr>
				<td align="right"><strong>Post Title:</strong></td>
				<td><input type="text" name="post_title" size="60"/></td>
			</tr>

			<tr>
				<td align="right"><strong>Post Category:</strong></td>
				<td>
					<select name="cat">
						<option value="null">Select a Category </option>
							<?php
						include("../config.php");
						
						$db=getDatabase();

						$sql="select * from category";

						$run_q=$db->executeQuery($sql);

						while($row_cat=$db->fetchArray($run_q)){

							$cat_id=$row_cat['cat_id'];

							$cat_title=$row_cat['cat_title'];

							echo"<option value='$cat_id'>$cat_title</option>";
						}

						?>
					</select>

				</td>
			</tr>

			<tr>
				<td align="right"><strong>Post Author:</strong></td>
				<td><input type="text" name="post_author" size="60"/></td>
			</tr>

			<tr>
				<td align="right"><strong>Post Keywords:</strong></td>
				<td><input type="text" name="post_keywords" size="60"/></td>
			</tr>

			<tr>
				<td align="right"><strong>Post Image:</strong></td>
				<td><input type="file" name="post_image" size="50"/></td>
			</tr>

			<tr>
				<td align="right"><strong>Post Content:</strong></td>
				<td><textarea name="post_content" rows="15" cols="50"/></textarea></td>
			</tr>

			<tr>
				<td colspan="6" align="center"><input type="submit" name="submit" value="Publish"/></td>
			</tr>


			

		</table>
		

	</form>

</body>
</html>
<?php 
if(isset($_POST['submit'])){
	/*$insertInfo=array();

	$insertInfo['category_id']=$_REQUEST['cat'];
	$insertInfo['post_title']=$_REQUEST['post_title'];
	$insertInfo['post_date']=date('d-m-Y');
	$insertInfo['post_author']=$_REQUEST['post_author'];
	$insertInfo['post_keywords']=$_REQUEST['post_keywords'];
	$insertInfo['post_image']=$_FILES['post_image']['name'];
	//$insertInfo['post_image']=$_FILES['post_image']['temp_name'];
	$insertInfo['post_content']=$_REQUEST['post_content'];

	if($insertInfo['post_title']=='' OR $insertInfo['category_id']=='null' OR $insertInfo['post_author']=='' OR $insertInfo['post_keywords']=='' OR $insertInfo['post_content']=='' OR $insertInfo['post_image']=='')
	{
		echo "<script>alert('Please fill all the fields and try again')</script>";
		exit();
	}

	else{

		move_uploaded_file($_FILES['post_image']['temp_name'], 'news_images/'.$_FILES['post_image']['name']);

	   $res=$db->insert('posts',$insertInfo);

	   //if($res){

	   	echo "<script>alert('Post have been published')</script>";

	   	echo "<script>window.open('insert_post.php','_self')</script>";
	  // }
}
}
*/
$category_id=$_POST['cat'];

$post_title=$_POST['post_title'];

$post_date=$_POST['post_date'];

$post_author=$_POST['post_author'];

$post_keywords=$_POST['post_keywords'];

$post_image=$_FILES['post_image']['name'];

$post_image_tmp=$_FILES['post_image']['tmp_name'];

$post_content=$_POST['post_content'];

if($post_title=='' OR $post_cat=='null' OR $post_author=='' OR $post_keywords=='' OR $post_image=='' OR $post_content==''){
		
		echo "<script>alert('Please fill in all the fileds')</script>";
		exit();
		}

		else{

  move_uploaded_file($post_image_tmp, "news_images/$post_image");

	$insert="insert into posts(category_id,post_title,post_date,post_author,post_keywords,post_image,post_content) values('$category_id','$post_title','$post_date','$post_author','$post_keywords','$post_image','$post_content')";

	$run_q=$db->executeQuery($insert);

	if($run_q)
	{

	 	echo "<script>alert('Post have been published')</script>";

	   	echo "<script>window.open('insert_post.php','_self')</script>";
}
}
	?>

	<?php } ?>