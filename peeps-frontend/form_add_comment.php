<div class="comment--form pb--30" data-form="validate">
    <h4 class="h4 pb--15">Leave A Comment</h4>

    <form method="post"  action='proses_add_comment.php'>
        <div class="row gutter--15">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="user" value="<?php echo $_SESSION['id']?>">
            <div class="col-sm-12">
                <div class="form-group">
                    <textarea name="comment_content" placeholder="Comment *" class="form-control" required></textarea>
                </div>
            </div>

            <div class="col-sm-12 pt--10">
                <button class="btn btn-sm btn-primary fs--14" type="submit" name="comment">Post Comment</button>
            </div>
        </div>
    </form>
</div>