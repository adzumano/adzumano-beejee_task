<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Log in admin panel</div>
        <div class="card-body">
            <form action="/app/admin/login" method="post">
                <div class="form-group">
                    <label>Login</label>
                    <input class="form-control" type="text" name="login">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password">
                </div>
                <a href="/app/home" style="float:left;padding-bottom:10px;">Go to home page<i class="fa fa-fw fa-arrow-right"></i></a>
                <button type="submit" class="btn btn-primary btn-block">Log in</button>
            </form>
        </div>
    </div>
</div>