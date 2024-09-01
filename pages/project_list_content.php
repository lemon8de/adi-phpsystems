<div class="row">
    <div class="col-9">
        <div class="form-group">
            <div class="input-group">
                <input type="text" class="form-control" id="GenericSearch" name="" placeholder="Generic" autocomplete="off" required onkeyup="debounce(search, 150)">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-search"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php 
    if ($_SESSION['users_role'] == 'admin' || $_SESSION['users_role'] == "leader") { ?>
    <div class="col-3">
        <button type="submit" class="btn bg-info btn-block" data-toggle="modal" data-target=".bd-example-modal-lg">Add Project</button>
    </div>
    <?php }?>
</div>


<div class="row justify-content-center">
    <div class="col-custom">
        <div class="form-group">
            <label>Project Category</label>
            <div class="input-group">
                <select class="form-control" id="ProjectCategorySearch" onchange="search()">
                    <option selected value="">Select Project Category</option>
                    <?php 
                        $sql = "SELECT project_category, display_name from project_category_masterlist";
                        $stmt = $conn -> prepare($sql);
                        $stmt -> execute();
                        
                        while ($data = $stmt -> fetch(PDO::FETCH_ASSOC)) {
                            echo <<<HTML
                                <option value="{$data['project_category']}">{$data['display_name']}</option>
                            HTML;
                        }
                    ?>
                </select>
            </div>
        </div>
    </div>

    <div class="col-custom">
        <div class="form-group">
            <label>SUB BU</label>
            <div class="input-group">
                <select class="form-control" id="SubBuSearch" onchange="search()">
                    <option selected value="">Select SUB BU</option>
                    <?php 
                        $sql = "SELECT sub_bu, display_name from sub_bu_masterlist";
                        $stmt = $conn -> prepare($sql);
                        $stmt -> execute();
                        
                        while ($data = $stmt -> fetch(PDO::FETCH_ASSOC)) {
                            echo <<<HTML
                                <option value="{$data['sub_bu']}">{$data['display_name']}</option>
                            HTML;
                        }
                    ?>
                </select>
            </div>
        </div>
    </div>

    <div class="col-custom">
        <div class="form-group">
            <label>TDE Status</label>
            <div class="input-group">
                <select class="form-control" id="TdeStatusSearch" onchange="search()">
                    <option selected value="">Select TDE Status</option>
                    <?php 
                        $sql = "SELECT tde_status, display_name from tde_status_masterlist";
                        $stmt = $conn -> prepare($sql);
                        $stmt -> execute();
                        
                        while ($data = $stmt -> fetch(PDO::FETCH_ASSOC)) {
                            echo <<<HTML
                                <option value="{$data['tde_status']}">{$data['display_name']}</option>
                            HTML;
                        }
                    ?>
                </select>
            </div>
        </div>
    </div>

    <div class="col-custom">
        <div class="form-group">
            <label>Key Personnel</label>
            <div class="input-group">
                <select class="form-control" id="KeyPersonnelSearch" name="" onchange="search()">
                    <option selected value="">Select Key Personnel</option>
                    <?php 
                        $sql = "SELECT id, full_name from users where users_group = 'test'";
                        $stmt = $conn -> prepare($sql);
                        $stmt -> execute();
                        
                        while ($data = $stmt -> fetch(PDO::FETCH_ASSOC)) {
                            echo <<<HTML
                                <option value="{$data['full_name']}">{$data['full_name']}</option>
                            HTML;
                        }
                    ?>
                </select>
            </div>
        </div>
    </div>

    <div class="col-custom">
        <div class="form-group">
            <label>Target Release Date Range</label>
            <div class="input-group">
                <input type="text" class="form-control float-right" id="target-release-date-range" name="target-release-date-range" onchange="search()">
                <!-- <script>
                    $('input[name="target-release-date-range"]').daterangepicker();
                </script> -->
            </div>
        </div>
    </div>
</div>

<table class="table table-head-fixed text-nowrap table-hover" id="accounts_table">
    <thead style="text-align:center;">
        <tr>
            <td>Generic</td>
            <td>Project Category</td>
            <td>Sub BU</td>
            <td>TDE Status</td>
            <td>Key Personnel</td>
            <td>Target Release Date (RTS)</td>
            <td>TDE Activities Completed Date</td>
            <td colspan="3">Action</td>
        </tr>
    </thead>
    <tbody id="ProjectSearchContent">
    <?php
        $sql = "SELECT a.generic, a.project_category, a.sub_bu, a.tde_status, b.releasing_tde, c.target_release_initial, c.target_release_recommit, c.tde_activities_completed from general_project_info as a left join key_personnel as b on a.generic = b.generic left join critical_dates as c on a.generic = c.generic";
        $stmt = $conn -> prepare($sql);
        $stmt -> execute();

        $sql_sub_bu = "SELECT display_name from sub_bu_masterlist where sub_bu = :sub_bu";
        $stmt_sub_bu = $conn -> prepare($sql_sub_bu);

        $sql_product = "SELECT display_name from project_category_masterlist where project_category = :project_category";
        $stmt_product = $conn -> prepare($sql_product);

        $sql_tde_status = "SELECT display_name from tde_status_masterlist where tde_status = :tde_status";
        $stmt_tde_status = $conn -> prepare($sql_tde_status);

        while($data = $stmt -> fetch(PDO::FETCH_ASSOC)) {

            $stmt_product -> bindValue(':project_category', $data['project_category']);
            $stmt_product -> execute();
            $product = $stmt_product -> fetch(PDO::FETCH_ASSOC);
            if ($product) {
                $data['project_category'] = $product['display_name'];
            }

            $stmt_sub_bu -> bindValue(':sub_bu', $data['sub_bu']);
            $stmt_sub_bu -> execute();
            $sub_bu = $stmt_sub_bu -> fetch(PDO::FETCH_ASSOC);
            if ($sub_bu) {
                $data['sub_bu'] = $sub_bu['display_name'];
            }

            $stmt_tde_status -> bindValue(':tde_status', $data['tde_status']);
            $stmt_tde_status -> execute();
            $tde_status = $stmt_tde_status -> fetch(PDO::FETCH_ASSOC);
            if ($tde_status) {
                $data['tde_status'] = $tde_status['display_name'];
            }

            if ($_SESSION['users_role'] == 'admin' || $_SESSION['users_role'] == 'leader') {
                $button = <<<HTML
                    <td><button class="btn btn-info btn-block">View</button></td>
                    <td><button class="btn btn-primary btn-block">Edit</button></td>
                    <td><button class="btn btn-danger btn-block">Delete</button></td>
                HTML;
            } else {
                $button = <<<HTML
                    <td><button class="btn btn-info btn-block">View</button></td>
                HTML;
            }

            echo <<<HTML
            <tr>
                    <td>{$data['generic']}</td>
                    <td>{$data['project_category']}</td>
                    <td>{$data['sub_bu']}</td>
                    <td>{$data['tde_status']}</td>
                    <td>{$data['releasing_tde']}</td>
                    <td>{$data['target_release_initial']}</td>
                    <td>{$data['tde_activities_completed']}</td>
                    {$button}
            </tr>
            HTML;
        }
    ?>
    </tbody>
</table>

<?php 
if ($_SESSION['users_role'] == 'admin' || $_SESSION['users_role'] == 'leader') {
    include '../modals/add_project.php';
}
?>

<style>
.col-custom {
    flex: 0 0 18%; /* 100% / 5 = 20% */
    max-width: 20%;
    margin-right: 10px;
}
</style>

<script>
    function debounce(method, delay) {
        clearTimeout(method._tId);
        method._tId = setTimeout(function() {
            method();
        }, delay);
    }

    function search() {
        $.ajax({
            url: '../php_api/search_projects.php',
            type: 'GET',
            data: {
                'generic' : document.getElementById('GenericSearch').value,
                'project_category' : document.getElementById('ProjectCategorySearch').value,
                'sub_bu' : document.getElementById('SubBuSearch').value,
                'tde_status' : document.getElementById('TdeStatusSearch').value,
                'key_personnel' : document.getElementById('KeyPersonnelSearch').value
                //'target_release_date' : document.getElementById('xx').value,
            },
            dataType: 'json',
            success: function (response) {
                console.log(response);
                document.getElementById('ProjectSearchContent').innerHTML = response.inner_html;
            }
        });
    }
</script>