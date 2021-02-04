<div class="container">
    <div class="row mt-5">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 mt-1">
            <h1>Create an account </h1>
            <form action="/sign-up" method="POST">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name " name="name">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                </div>
                <div class="form-group">
                    <label for="confirm-pwd">Confirm Password:</label>
                    <input type="password" class="form-control" id="confirm-pwd" placeholder="Enter password" name="confirm-pwd">
                </div>
                <button type="submit" class="btn btn-primary">Sign up </button>
            </form>
            <a href="/sign-in">Already have an account?</a>
        </div>
        <div class="col-sm-3"></div>
    </div>

</div>