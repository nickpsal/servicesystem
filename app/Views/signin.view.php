<form action="" method="POST">
    <!-- Sign In Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="<?=URL?>home" class="">
                            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i><?= $data['logoText'] ?></h3>
                        </a>
                        <h3>Sign In</h3>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="username" placeholder="name@example.com" required>
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                    </div>
                    <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign In End -->
</form>