<div class="container">
    <div class="row mt-5">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 mt-5">
            <h1>This is Sign in </h1>
            <?php if (isset($_GET['msg'])) : ?>
                <div class="alert alert-success">
                    <strong>Success!</strong> <?= $_GET['msg']; ?>.
                </div>
            <?php else : ?>
                <div></div>
            <?php endif ?>
            <?php if (isset($_GET['error'])) : ?>
                <div class="alert alert-warning">
                     <?= $_GET['error']; ?>.
                </div>
            <?php else : ?>
                <div></div>
            <?php endif ?>
            <form action="/sign-in" method="POST">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                </div>
                <button type="submit" class="btn btn-primary">Sign in </button>
            </form>
            <a href="/sign-up">Don't have an account?</a>
        </div>
        <div class="col-sm-3"></div>
    </div>

</div>