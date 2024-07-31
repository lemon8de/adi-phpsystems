<form class="form-horizontal" action="../php_api/register_api.php" method="POST">
    <div class="form-group">
        <div class="input-group">
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password" autocomplete="off" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col">
            <button type="submit" class="btn bg-primary btn-block" name="Register" value="Register">Register</button>
        </div>
    </div>

</form>