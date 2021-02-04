
<div class="pt-2 mt-5 row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <?php if (isset($_COOKIE['userid'])) : ?>
            <div class="d-flex justify-content-end">
                <a href="/create-post">
                    <button class="mb-4 btn btn-dark">Create Post</button></a>
            </div>
        <?php endif ?>

        <?php foreach ($screams as $scream) : ?>
            <div class="p-3 p-4 mb-5 bg-white rounded shadow">
                <div class="d-flex justify-content-between">
                    <div class="d-flex">
                        <img class=" rounded-circle" src="https://lh3.googleusercontent.com/-JM2xsdjz2Bw/AAAAAAAAAAI/AAAAAAAAAAA/DVECr-jVlk4/photo.jpg" / width="50px" height="50px">
                        <div>
                            <span class="font-weight-bolder"><?= $scream['name'] ?></span>
                            <br />
                            <small><?= $scream['created_date'] ?></small>
                        </div>
                    </div>
                    <div>
                        <?php if (isset($_COOKIE['userid'])) : ?>
                            <?php if ($_COOKIE['userid'] === $scream['userid']) : ?>
                                <button class="btn btn-danger btn-sm delete-modal" data-toggle="modal" data-target="#myModal" data-screamid="<?= $scream['scream_id'] ?>"><i class="fa fa-trash"></i></button>
                            <?php else : ?>
                                <div></div>
                            <?php endif ?>

                        <?php endif ?>
                    </div>
                </div>
                <?php if (strlen($scream['content']) > 200) :  ?>
                    <p class="mt-3"><?= substr($scream['content'], 0, 200) ?>...<a href="/detail?screamid=<?= $scream['scream_id'] ?>"><b>See More</b></a></p>
                <?php else : ?>
                    <p class="contents"><?= $scream['content'] ?></p>
                <?php endif ?>
                <div>
                    <a href="/detail?screamid=<?= $scream['scream_id'] ?>">
                        <button class="btn btn-info" href="/"><?= $scream['commentCount']?> <i class="pl-3 fas fa-comment"></i></button>
                    </a>

                </div>
            </div>
        <?php endforeach; ?>

        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Are you sure you want to delete this post?</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="/delete-post" method="POST">
                            <input type="hidden" class="form-control modalId" name="screamid" ?>

                            <button type="submit" name="delete" class="mt-3 btn btn-primary btn-block">Yes</button>
                        </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
<div class="col-sm-3"></div>
</div>