<!DOCTYPE html>
<html>
<head>
	<title>POST AND COMMENT SYSTEM</title>
	<?php include('dbconn.php'); ?>
	<?php include('session.php'); ?>
	
	<script src="vendors/jquery-1.7.2.min.js"></script>
    <script src="vendors/bootstrap.js"></script>

        <!-- ==== Google Font ==== -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700%7CRoboto:300,400,400i,500,700">

    <!-- ==== Plugins Bundle ==== -->
    <link rel="stylesheet" href="css/plugins.min.css">
    
    <!-- ==== Main Stylesheet ==== -->
    <link rel="stylesheet" href="style.css">
    
    <!-- ==== Responsive Stylesheet ==== -->
    <link rel="stylesheet" href="css/responsive-style.css">
    
    <!-- ==== Color Scheme Stylesheet ==== -->
    <link rel="stylesheet" href="css/colors/color-1.css" id="changeColorScheme">
    
    <!-- ==== Custom Stylesheet ==== -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- ==== HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries ==== -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body>
	

		<br>
		WELCOME!
			<a href="logout.php"><?php 
				echo $member_row['username'];
			?> - Log Out</a>
			
		<br>
		<br>
		
					<form method="post"> 
					<input type="text" name="post_judul" placeholder=".........Judul Bro........" required></input><br>
					<input type="text" name="post_member" placeholder=".........Mau Berapa Orang Bro........" required></input><br>
					<textarea name="post_deskripsi" rows="7" cols="64" style="text-align:center;" placeholder=".........Write Someting........" required></textarea>
					<br>
					<button name="post">&nbsp;POST</button>
					<br>
					<hr>
					</form>
						<?php	
							$query = mysqli_query($con, "SELECT *,UNIX_TIMESTAMP() - tanggal AS TimeSpent from post LEFT JOIN user on user.id_user = post.id_user order by id_post DESC")or die(mysqli_error());
							while($post_row=mysqli_fetch_array($query)){
							$id = $post_row['id_post'];	
							$upid = $post_row['id_user'];	
							$posted_by = $post_row['firstname']." ".$post_row['lastname'];
						?>
					<a style="text-decoration:none; float:right;" href="deletepost.php<?php echo '?id='.$id; ?>"><button><font color="red"> x DELETE </button></font></a>
					<a href="home4.php<?php echo '?id='.$id; ?>"><button><font color="blue"> x SEE DETAIL </button></font></a>
					<h3>Posted by: <a href="#"> <?php echo $posted_by; ?></a>
					-
						<?php				
							$days = floor($post_row['TimeSpent'] / (60 * 60 * 24));
							$remainder = $post_row['TimeSpent'] % (60 * 60 * 24);
							$hours = floor($remainder / (60 * 60));
							$remainder = $remainder % (60 * 60);
							$minutes = floor($remainder / 60);
							$seconds = $remainder % 60;
							if($days > 0)
							echo date('F d, Y - H:i:sa', $post_row['tanggal']);
							elseif($days == 0 && $hours == 0 && $minutes == 0)
							echo "A few seconds ago";		
							elseif($days == 0 && $hours == 0)
							echo $minutes.' minutes ago';
						?>
					<br>
					<br><?php echo $post_row['deskripsi']; ?></h3>
					<form method="post">
					<hr>
					Comment:<br>
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<textarea name="comment_content" rows="2" cols="44" style="text-align:center;" placeholder=".........Type your comment here........" required></textarea><br>
					<input type="submit" name="comment">
					</form>
						
					</br>
				
							<?php 
								$comment_query = mysqli_query ($con, "SELECT * ,UNIX_TIMESTAMP() - date_posted AS TimeSpent FROM comment LEFT JOIN user on user.id_user = comment.id_user where id_post = '$id'") or die (mysqli_error());
								while ($comment_row=mysqli_fetch_array($comment_query)){
								$id_comment = $comment_row['id_comment'];
								$comment_by = $comment_row['firstname']." ".  $comment_row['lastname'];
							?>
					<br><a href="#"><?php echo $comment_by; ?></a> - <?php echo $comment_row['content']; ?>
					<br>
							<?php				
								$days = floor($comment_row['TimeSpent'] / (60 * 60 * 24));
								$remainder = $comment_row['TimeSpent'] % (60 * 60 * 24);
								$hours = floor($remainder / (60 * 60));
								$remainder = $remainder % (60 * 60);
								$minutes = floor($remainder / 60);
								$seconds = $remainder % 60;
								if($days > 0)
								echo date('F d, Y - H:i:sa', $comment_row['date_posted']);
								elseif($days == 0 && $hours == 0 && $minutes == 0)
								echo "A few seconds ago";		
								elseif($days == 0 && $hours == 0)
								echo $minutes.' minutes ago';
							?>
					<br>
							<?php
							}
							?>
					<hr
					&nbsp;
					<?php 
					if ($u_id = $id){
					?>
					
				
					
					<?php }else{ ?>
						
					<?php
					} } ?>
					
				
							<?php
								if (isset($_POST['post'])){
								$post_judul = $_POST['post_judul'];
								$post_member  = $_POST['post_member'];
								$post_deskripsi  = $_POST['post_deskripsi'];
								
								mysqli_query($con, "insert into post (judul, member, deskripsi, tanggal, id_user) values ('$post_judul','$post_member','$post_deskripsi','".strtotime(date("Y-m-d h:i:sa"))."','$id_user') ")or die(mysqli_error());
								header('location:home.php');
								}
							?>

							<?php
							
								if (isset($_POST['comment'])){
								$comment_content = $_POST['comment_content'];
								$id_post=$_POST['id'];
								
								mysqli_query($con, "insert into comment (content,date_posted,id_user,id_post) values ('$comment_content','".strtotime(date("Y-m-d h:i:sa"))."','$id_user','$id_post')") or die (mysqli_error());
								header('location:home.php');
								}
							?>

</body>

  <?php include('footer.php');?>

</html>