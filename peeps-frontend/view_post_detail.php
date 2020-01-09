<?php 
include 'db.php';
if ($_SESSION['id'] == false ){
    header('location:loginusers.php');
}
require "header.php";
?>
<div class='main--content' data-trigger='stickyScroll'>
    <!-- Section Title Start -->
    <div class="section--title text-center" style="margin-top: 0">
        <div class="title lined">
            <h2 class="h2">Discussion</h2>
        </div>
    </div>
    <!-- Section Title End --><center>
    <div class='main--content-inner drop--shadow' style="width:85%; ">

                            <!-- Post Item Start -->

                            <?php
                            $konek=new mysqli('localhost','root','','db');
                            if ($konek->connect_errno){
                                "Database Error".$konek->connect_error;
                            }
                            ?>

                            <?php
                                    $id = isset($_GET['id']) ? $_GET['id'] : '';
                                    $query = "SELECT *,UNIX_TIMESTAMP() - tanggal AS TimeSpent from post LEFT JOIN users on users.id_user = post.id_user where id_post='$id' order by id_post DESC";
                                    $result = mysqli_query($konek, $query);
                                    if ($result){
                                      if (!$query) {
                                          printf("Error: %s\n", mysqli_error($konek));
                                          exit();
                                      }
                                      while($post_row=mysqli_fetch_array($result)){
                                      $usr_id = $post_row['id_user'];   
                                      $posted_by = $post_row['username'];
                                      $post_id= $post_row['id_post'];
                                      ?>


                            <div class="post--item post--single pb--30">
                                <!-- Post Image Start -->
                                <div class="post--img">
                                    <a href="blog-details.html">
                                        <?php 
                                            echo "<center><img class='card-img-top' src= 'data:image/jpeg;base64,".base64_encode($post_row['gambar'])."' height ='auto' width='70%'/></center>";
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
                                                        <a class="btn btn-light-green" href="proses_delete_post.php<?php echo '?id='.$id; ?>" onclick="return confirm('Are you sure want to delete post?')">Delete</a>
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
                              Comments
                            </h4>
                                <ul class="comment--items nav" style="margin-left: 10px;">
                                    <li >
                                    <!-- Comment Item Start -->
                                    <!-- LIHAT KOMEN -->
                                    <div id="NewCmt">
                                    <div  id="emptyCmt"></div>
                                    <?php
                                        // $post_id="17"; //you have to give the post id... I have choosen just a randome id.
                                        // $usr_id="usr_id";  //you have to give the User id..
                                        $konek= mysqli_connect("localhost", "root", "", "db");
                                        $query="SELECT * ,UNIX_TIMESTAMP() - timeOfCmt AS TimeSpent from comment LEFT JOIN users on users.id_user = comment.usr_id WHERE post_id='$id' ORDER BY timeOfCmt desc";
                                        $sql=mysqli_query($konek,$query);
                                        if (mysqli_num_rows($sql)>0) {
                                            while ($row = mysqli_fetch_assoc($sql)) {
                                                $commentID= $row['id'];
                                                $post_id1 = $row['post_id'];
                                                $usr_id1 = $row['usr_id'];//****can featch usr info***
                                                $username = $row['username'];
                                                $commentdata = $row['commentdata'];
                                                $foto = $row['foto'];
                                                $CommentCount=mysqli_num_rows($sql);
                                            $query_R="SELECT * FROM replay WHERE commentID='$commentID'";
                                            $sql_R=mysqli_query($konek,$query_R);
                                            $ReplayCount=mysqli_num_rows($sql_R);
                                      ?>
                                        <div class="comment--item mr--15 clearfix">
                                            <div class="img float--left" data-overlay="0.3" data-overlay-color="primary">
                                                <!-- KODINGAN BUAT FOTO -->
                                                <img src="img/comments-img/avatar-01.jpg" alt="">
                                            </div>
                                            <div class="info ov--h">
                                                <div class="header clearfix">
                                                    <div class="meta float--left">
                                                        <p class="fs--14 fw--700 text-darkest">
                                                            <a href="#">
                                                                <?php echo $username ?>
                                                            </a>
                                                        </p>

                                                        <p>
                                                            <i class="mr--10 fa fa-clock-o"></i>
                                                            <span>
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
                                                                    elseif($days == 0)
                                                                    echo $hours.' hours ago';
                                                                ?>
                                                            </span>
                                                        </p>
                                                    </div>
                                                    <div class="reply text-darker float--right">
                                                  

                                                  <!-- KURANG (TOMBOL INI MUNCUL BERDASARKAN YANG LOGIN) -->
                                                  <?php if($row['usr_id']==$_SESSION['id'])
                                                  {
                                                  ?>
                                                  <a style="float:right; padding-right: 20px;" href="proses_delete_comment.php?idc=<?php echo urlencode($commentID); ?>&amp;id=<?php echo urlencode($post_id1); ?>" title="Delete" class="btn-link" data-toggle="tooltip" data-placement="bottom" onclick="return confirm('Are you sure want to delete comment?')">
                                                      <img src="img/delete-cross-outline-interface-symbol.png" height="15" width="15">
                                                  </a>
                                                  <?php } ?>
                                                  <!-- end of delete button -->
                                                </div>
                                                </div>

                                                
                                                <div class="content pt--8 fs--14">
                                                    <p>
                                                     <?php echo nl2br(strip_tags(htmlentities($commentdata)))?>
                                                    </p>
                                                     <h5 class="h5 pb--20 float--left" id="Replay">Total Replays (<?=$ReplayCount?>)</h5>
                                                </div>
                                                
                                               
                                                
                                                <!-- reply button -->
                                                  <p pid='<?=$commentID?>' id='ReplayButt-<?=$commentID?>' class="btn btn-default ReplayButt float--right">Replay</p>
                                                  <!-- end reply button -->
                                                <div id='ReplayViewer-<?=$commentID?>' class="col-sm-12 ReplayViewer">  <!-- replay cmt --></div>
                                            </div>
                                        </div>
                                       
                                        <?php       
                                          }
                                          } else {
                                          //$commentID = "0";
                                          $query="SELECT * FROM comment";
                                          $sql=mysqli_query($konek,$query);
                                          while ($row = mysqli_fetch_assoc($sql)) {
                                            $commentID = $row['id'];
                                          //  echo "$commentID";
                                          }
                                          ?>
                                            <script type="text/javascript">
                                              $("#emptyCmt").html('<p>There is empty comment. <br>Lets discuss something...</p>');
                                            </script>
                                          <?php  }
                                          ?>
                                        
                                            
                                    </li>
                                </ul>
                            </div>
                            <!-- Comment List End -->
                            <!-- Comment Form Start -->
                            <?php include 'form_add_comment.php'; ?>
                            <?php 
                                            if ($u_id = $id){
                                            ?>
                                            <?php }else{ ?>
                                                
                                            <?php
                                            }} } ?>
                                        <!-- Comment Item End -->
                            <!-- Comment Form End -->
 
                        </div><!-- iniending div yg atas -->
                        </center>
                    </div>
                    <!-- Main Content End -->


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
    var replayUserId= '<?php echo $_SESSION['id']?>';
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
     var post_id = '<?php echo $id; ?>';
     var usr_id = '<?php echo $_SESSION['id']?>';
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
                   
<?php
require "footer.php";
?>