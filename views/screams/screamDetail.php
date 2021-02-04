

<div class="container mt-5">
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="p-3 p-4 mb-5 bg-white rounded shadow col style=" height: 500px; overflow: scroll;">
            <div class="d-flex justify-content-between">
                <div class="d-flex">
                    <img class=" rounded-circle" src="https://lh3.googleusercontent.com/-JM2xsdjz2Bw/AAAAAAAAAAI/AAAAAAAAAAA/DVECr-jVlk4/photo.jpg" / width="50px" height="50px">
                    <div>
                        <span class="font-weight-bolder"><?= $scream['name'] ?></span>
                        <br />
                        <small><?= $scream['created_date'] ?></small>
                    </div>
                </div>
            </div>
            <p><?= $scream['content'] ?></p>

        </div>
        <div class="col-sm-5 w-100">
            <div>
                <button class="btn btn-info"><?= $scream['commentCount'] ?><i class="pl-3 fas fa-comment"></i></button>
            </div>
            <form action="/detail" method="POST">
                <div class="form-group">
                    <input type="hidden" class="form-control" name="userid" value="<?= $_COOKIE['userid'] ?>">
                    <input type="hidden" class="form-control" name="screamid" value="<?= $scream['scream_id'] ?>">
                </div>
                <div class="form-group">
                    <label for="cmt">Comment</label>
                    <textarea type="text" class="form-control" rows="5" id="cmt" name="comment"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <?php foreach ($comments as $comment) : ?>
                <div class="p-3 my-3 bg-white rounded shadow col">
                    <div class="d-flex">
                        <img class=" rounded-circle" src="https://lh3.googleusercontent.com/-JM2xsdjz2Bw/AAAAAAAAAAI/AAAAAAAAAAA/DVECr-jVlk4/photo.jpg" / width="50px" height="50px">
                        <div>
                            <span class="font-weight-bolder"><?= $comment['name'] ?></span>
                            <br />
                            <small><?= $comment['created_date'] ?></small>
                        </div>
                    </div>
                    <p><?= $comment['comment'] ?></p>
                </div>
            <?php endforeach ?>
        </div>


    </div>
</div>

</div>