<?php 
include 'db.php';


require "header.php";
?>
<div class='main--content' data-trigger='stickyScroll'>
    <!-- Section Title Start -->
    <div class="section--title text-center" style="margin-top: 0">
        <div class="title lined">
            <h2 class="h2">Discussion</h2>
        </div>
    </div>
    <!-- Section Title End -->
    <div class='main--content-inner drop--shadow'>
                            <!-- Post Item Start -->

                            <?php
                            $konek=new mysqli('localhost','root','','db');
                            if ($konek->connect_errno){
                                "Database Error".$konek->connect_error;
                            }
                            ?>

                            <?php
                                    $id = isset($_GET['id']) ? $_GET['id'] : '';
                                    $query = mysqli_query($konek, "SELECT *,UNIX_TIMESTAMP() - tanggal AS TimeSpent from post LEFT JOIN users on users.id_user = post.id_user where id_post='$id' order by id_post DESC");
                                    if (!$query) {
                                        printf("Error: %s\n", mysqli_error($konek));
                                        exit();
                                    }
                                    while($post_row=mysqli_fetch_array($query)){
                                    $upid = $post_row['id_user'];   
                                    $posted_by = $post_row['username'];
                                    ?>

                            <div class="post--item post--single pb--30">
                                <!-- Post Image Start -->
                                <div class="post--img">
                                    <a href="blog-details.html">
                                        <?php 
                                            echo "<center><img class='card-img-top' src= 'data:image/jpeg;base64,".base64_encode($post_row['gambar'])."' height ='200' width='1200'/></center>";
                                        ?>
                                    </a>
                                </div>
                                <!-- Post Image End -->

                                <!-- Post Info Start -->
                                <div class="post--info">

                                    <!-- Post Meta Start -->
                                    <div class="post--meta">

                                        <!-- Header Topbar Links End -->
                                        <!-- kodingan NAMPILIN POSTINGAN BY -->
                                        <ul class="nav">
                                            <li>
                                                <a href="index_user.php<?php echo '?id='.$post_row['id_user']; ?>">
                                                    <i class="mr--8 fa fa-user-o"></i>
                                                    <span><?php echo $posted_by; ?></span>
                                                </a>
                                            </li>
                                            <li>
                                                <i class="mr--8 fa fa-calendar-o">
                                                </i>
                                                <span>
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
                                                        elseif($days == 0)
                                                        echo $hours.' hours ago';
                                                    ?>
                                                </span>
                                            </li>
                                            <li>
                                                <i class="mr--8 fa fa-folder-o"></i>
                                                <span> <?php echo "".$post_row['category'].""; ?>
                                                </span>
                                            </li>
                                            
                                            <!-- EDIT DELET BY yang LOGIN -->
                                            <?php if($post_row['id_user']==$_SESSION['id'])
                                            {
                                            ?>
                                            <li class="dropdown" style="float: right;">
                                                <img src="img/settings.png">
                                                <ul class="dropdown-menu">
                                                    
                                                    <li>
                                                        <a class="btn btn-light-green" href="form_edit_post.php<?php echo '?id='.$id; ?>">Edit</a>
                                                    </li>
                                                    <li>
                                                        <a class="btn btn-light-green" href="proses_delete_post.php<?php echo '?id='.$id; ?>">Delete</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <?php } ?>

                                        </ul>
                                    </div>
									
                                    <!-- Post Meta End -->

                                    <!-- Post Title Start -->
                                    <div class="post--title mt--10">
                                        <h2 class="h2"><?php echo $post_row['judul']; ?></h2 >
                                    </div>
                                    <!-- Post Title End -->

                                    <!-- Post Content Start -->
                                    <div class="post--content text-darker mt--10">
                                    <p>
                                        <?php echo $post_row['deskripsi']; ?>
                                    </p>

                                       
                                    </div>
                                    <!-- Post Content End -->

                                </div>
                                <!-- Post Info End -->
                            </div>
                            <!-- Post Item End -->


                            <!-- Comment List Start -->
                            <div class="comment--list pt--40">
                                <h4 class="h4 pb--20">
                                    <?php 
                                        $comment_query = mysqli_query ($konek, "SELECT count(id_post) FROM `comment` where id_post='$id'") or die (mysqli_error());
                                         while ($comment_row=mysqli_fetch_array($comment_query)){
                                            $comment_count = $comment_row['count(id_post)'];
                                    ?>
                                    <?php echo $comment_count; ?> Comments
                                    <?php
                                    }
                                    ?>
                                </h4>

    <?php include "form_add_comment.php"; ?>
    <?php include "form_add_reply.php"; ?>


    
<?php
    $post_id="17"; //you have to give the post id... I have choosen just a randome id.
      $usr_id="usr_id";  //you have to give the User id..
    $konek= mysqli_connect("localhost", "root", "", "db");
    $query="SELECT * ,UNIX_TIMESTAMP() - timeOfCmt AS TimeSpent from cmt_all WHERE post_id='$post_id' ORDER BY post_id desc";
    $sql=mysqli_query($konek,$query);

    if (mysqli_num_rows($sql)>0) {
        while ($row = mysqli_fetch_assoc($sql)) {
        $commentID= $row['id'];
            $post_id1 = $row['post_id'];
            $usr_id1 = $row['usr_id'];//****can featch usr info***
            $commentdata = $row['commentdata'];

        $query_R="SELECT * FROM replay WHERE commentID='$commentID'";
        $sql_R=mysqli_query($konek,$query_R);
        $ReplayCount=mysqli_num_rows($sql_R);
?>

          <div class="col-sm-12" style="min-height:40px;background-color:#E0E0E0;margin-top:5px;padding:0;">

           <div class="col-sm-12" style="margin:0;padding:auto;background-color:#C8C8C8;">
             <p>Commented By Rohan Layek , Date: 
           <!-- TIME -->
          <?php   
              $days = floor($row['TimeSpent'] / (60 * 60 * 24));
              $remainder = $row['TimeSpent'] % (60 * 60 * 24);
              $hours = floor($remainder / (60 * 60));
              $remainder = $remainder % (60 * 60);
              $minutes = floor($remainder / 60);
              $seconds = $remainder % 60;
              if($days > 0)
              echo date('F d, Y - H:i:sa', $row['timeOfCmt']);
              elseif($days == 0 && $hours == 0 && $minutes == 0)
              echo "A few seconds ago";       
              elseif($days == 0 && $hours == 0)
              echo $minutes.' minutes ago';
          ?>  </p>
           </div>

            <p style="color:black;padding:10px;margin:5px;"><?php echo nl2br(strip_tags(htmlentities($commentdata)))?></p>

          <div class="col-sm-12" style="margin:0;padding:auto;background-color:#F5F5F5;">
             <p id="Replay" class="btn btn-primary btn-xs">Total Replays (<?=$ReplayCount?>)</p>
           <p pid='<?=$commentID?>' id='ReplayButt-<?=$commentID?>' class="btn btn-primary btn-xs ReplayButt">Replay</p>

          <div id='ReplayViewer-<?=$commentID?>' class="col-sm-12 ReplayViewer" style="margin:0;padding:auto;">  <!-- replay cmt -->

          </div>
           </div>
          </div>
<?php       }
    } else {
      //$commentID = "0";
      $query="SELECT * FROM cmt_all";
      $sql=mysqli_query($konek,$query);
      while ($row = mysqli_fetch_assoc($sql)) {
        $commentID = $row['id'];
      //  echo "$commentID";
      }
      ?>

    <script type="text/javascript">
     $("#emptyCmt").html('<h2>Put A Comment.. Ask a Question.</h2>');
    </script>
  <?php  }
  ?>
   </div>
  </div>
</div>


</body>


<script type="text/javascript">

$(document).on('click', ".ReplayButt", function () {
  var ReplayButt = $(this).attr("pid");
  var commentID= '<?php echo $commentID; ?>';
  $.ajax({
      type: 'POST',
      url: 'proses_retrieve_replay.php',
      data: {
              commentID:ReplayButt
            },
      success: function(feedback){
        $("#ReplayViewer-"+ReplayButt).html(feedback);

      }
    });
});

$(document).on('click', ".ReplayCmtButt", function () {
  var idd = $(this).attr("pid");
  var ReplayCmtData =$("#ReplayCmt-"+idd).val();
  var replayUserId= '<?php echo $usr_id; ?>';
  if (ReplayCmtData.length >0) {

    $.ajax({
        type: 'POST',
        url: 'proses_add_replay.php',
        data: {
                ReplayCmtData:ReplayCmtData,
                idd:idd,
                replayUserId:replayUserId
              },
        success: function(feedback){
          $("#plsTypecmt-"+idd).html('');
          $("#ReplayCmt-"+idd).val('');
          $("#emptyCmt-"+idd).html('');
          $("#ReplayViewer-"+idd).append(feedback);

        }
      });
    }else{
        $("#plsTypecmt-"+idd).html('<STRONG style="color:red;">Please type any comment.</STRONG>');
    }
});


$(document).on('click', "#Csubmit", function () {
   var CommentData = $("#CommentData").val();
   var post_id = '<?php echo $post_id; ?>';
   var usr_id = '<?php echo $usr_id; ?>';
   var commentID= '<?php echo $commentID; ?>';
if (CommentData.length >0) {

 $.ajax({
     type: 'POST',
     url: 'proses_add_comment.php',
     data: {
             CommentData:CommentData,
             post_id:post_id,
             usr_id:usr_id,
             commentID:commentID
           },
     success: function(feedback){
       $("#plsTypecmt").html('');
       $("#emptyCmt").html('');
       // $('textarea').filter('[id*=CommentData]').val('');
       $("#CommentData").val('');
       $("#NewCmt").append(feedback);

     }
   });
 }else{
     $("#plsTypecmt").html('<STRONG style="color:red;">Please type any comment.</STRONG>');
 }
});

</script>          
    
                                <ul class="comment--items nav">
                                    <li>
                                        <!-- Comment Item Start -->
                                        <!-- LIHAT KOMEN -->
                                        <?php 
                                            $comment_query = mysqli_query ($konek, "SELECT * ,UNIX_TIMESTAMP() - date_posted AS TimeSpent FROM comment LEFT JOIN users on users.id_user = comment.id_user where id_post = '$id' order by date_posted DESC") or die (mysqli_error());
                                            while ($comment_row=mysqli_fetch_array($comment_query)){
                                            $id_comment = $comment_row['id_comment'];
                                            $comment_by = $comment_row['username'];
                                            $id_post = $comment_row['id_post'];
											$foto = $comment_row['foto'];
                                        ?>
                                        <div class="comment--item mr--15 clearfix">
                                            <div class="img float--left" data-overlay="0.3" data-overlay-color="primary">
                                                <?php 
									if ($foto == null){
										echo "<img src='img/activity-img/avatar-05.jpg' alt=''>";
									}
									else{
                                                echo "<img class='card-img-top' src= 'data:image/jpeg;base64,".base64_encode($foto)."'/>";
									}?>
                                            </div>
                                            <div class="info ov--h">
                                                <div class="header clearfix">
                                                    <div class="meta float--left">
                                                        <p class="fs--14 fw--700 text-darkest">
                                                            <a href="#">
                                                                <?php echo $comment_by; ?>
                                                            </a>
                                                        </p>

                                                        <p>
                                                            <i class="mr--10 fa fa-clock-o"></i>
                                                            <span>
                                                                <!-- TIME -->
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
                                                            </span>
                                                        </p>
                                                    </div>
                                                </div>

                                                <!-- KURANG (TOMBOL INI MUNCUL BERDASARKAN YANG LOGIN) -->
                                                <?php if($comment_row['id_user']==$_SESSION['id'])
                                                {
                                                ?>
                                                <a style="float:right;" href="proses_delete_comment.php?idc=<?php echo urlencode($id_comment); ?>&amp;id=<?php echo urlencode($id_post); ?>" title="Delete" class="btn-link" data-toggle="tooltip" data-placement="bottom">
                                                    <img src="img/delete-cross-outline-interface-symbol.png" height="15" width="15">
                                                </a>
                                                <?php } ?>
                                                
                                                <div class="content pt--8 fs--14">
                                                    <p>
                                                        
                                                     <?php echo $comment_row['content']; ?>
                                                    </p>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <?php
                                            }
                                            ?>
                                            &nbsp;
                                            <?php 
                                            if ($u_id = $id){
                                            ?>
                                            <?php }else{ ?>
                                                
                                            <?php
                                            } } ?>
                                        <!-- Comment Item End -->
                                    </li>
                                </ul>
                            </div>
                            <!-- Comment List End -->

                            <!-- Comment Form Start -->
                            <?php include 'form_add_comment.php'; ?>
                            <!-- Comment Form End -->
                        </div>
                    </div>
                    <!-- Main Content End -->
<?php
require "footer.php";
?>