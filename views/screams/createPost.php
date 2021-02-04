<div class="row mt-5 pt-2">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">

        <form action="/create-post" method="POST">
            <input type="hidden" class="form-control" name="userid" value="<?= $_COOKIE['userid'] ?>">
            <div class="form-group">
                <label for="content">Your content:</label>
                <textarea class="form-control" rows="5" id="content" name="content"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="col-sm-3"></div>
</div>