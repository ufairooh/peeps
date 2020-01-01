<?php
/* @var Controller $this */
require "header.php";
?>
<div class='main--content col-md-8 pb--60' data-trigger='stickyScroll'>
    <div class='main--content-inner drop--shadow'>
    <?php
        include 'form_add_post.php';
    ?>
	<br>
        <!-- Topics List Start -->
        <div class='topics--list'>
    	<?php
    		$query="SELECT *,UNIX_TIMESTAMP() - tanggal AS TimeSpent from post LEFT JOIN users on users.id_user = post.id_user order by id_post DESC";
    		$result = mysqli_query($konek, $query);
            if (!$result) {
                printf("Error: %s\n", mysqli_error($konek));
                exit();
            }
    		while ($row = mysqli_fetch_array($result))
            {
                $id = $row['id_post']; 
    	?>
    		
    	<table class='table'>
            <tr>
            	<td>
                    <?php 
                        echo "<img class='card-img-top' src= 'data:image/jpeg;base64,".base64_encode($row['gambar'])."' height ='20' width='20'/>";
                    ?>
                </td>
                <td>
            		<?php
                        echo "<h4 class='h6 fw--500 text-darkest'>".$row['judul']."</h4>";
                        echo"<p>".$row['deskripsi']."</p>";
                        echo "Posted By ".$row['username']." ";
                        
            		?>
                </td>
                <td>
                    <a href="view_post_detail.php<?php echo '?id='.$id; ?>">join</a>
                </td>
            </tr>
        </table>
        <?php 
            }
        ?>
        </div>
        <!-- Topics List End -->
    </div>
</div>

<script type='text/javascript'>
function readURL(input) {
if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
        $('#blah')
            .attr('src', e.target.result)
            .width(500)
            .height(200);
    };

    reader.readAsDataURL(input.files[0]);
}
}

function Angkasaja(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 31 && (charCode < 48 || charCode > 57))
	return false;
	return true;
}
</script>
<?php
/* @var Controller $this */
require "footer.php";
?>