<form class="form-horizontal" action="../php_api/register_api.php" method="POST">
    <div class="form-group">
        <div class="input-group">
            <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Full Name" autocomplete="off" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user-check"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="input-group">
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
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

    <div class="form-group">
        <div class="input-group">
            <select class="form-control" id="users_role" name="users_role">
                <option disabled selected value="">Select User Role</option>
                <?php 
                    require '../php_api/db_connection.php';
                    $sql = "SELECT * FROM users_role_masterlist";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    foreach($stmt->fetchALL() as $x){
                        echo '
                            <option value="' . $x['role'] .'">' . $x['display_name'] . '</option>
                        ';
                    }
                
                ?>
            </select>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user-tag"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <select class="form-control" id="users_group" name="users_group">
                <option disabled selected value="">Select User Group</option>
                <?php 
                    require '../php_api/db_connection.php';
                    $sql = "SELECT * FROM users_group_masterlist";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $conn = null;
                    foreach($stmt->fetchALL() as $x){
                        echo '
                            <option value="' . $x['role'] .'">' . $x['display_name'] . '</option>
                        ';
                    }
                
                ?>
            </select>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-users"></span>
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