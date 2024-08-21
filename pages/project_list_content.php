<div class="row">
    <div class="col-9">
        <div class="form-group">
            <div class="input-group">
                <input type="text" class="form-control" id="" name="" placeholder="Generic" autocomplete="off" required>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-search"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-3">
        <button type="submit" class="btn bg-info btn-block" data-toggle="modal" data-target=".bd-example-modal-lg">Add Project</button>
    </div>
</div>

<div class="row">
    <div class="col-custom">
        <div class="form-group">
            <label>Project Category</label>
            <div class="input-group">
                <select class="form-control" id="" name="">
                    <option disabled selected value="">Select Project Category</option>
                </select>
            </div>
        </div>
    </div>

    <div class="col-custom">
        <div class="form-group">
            <label>SUB BU</label>
            <div class="input-group">
                <select class="form-control" id="" name="">
                    <option disabled selected value="">Select SUB BU</option>
                </select>
            </div>
        </div>
    </div>

    <div class="col-custom">
        <div class="form-group">
            <label>TDE Status</label>
            <div class="input-group">
                <select class="form-control" id="" name="">
                    <option disabled selected value="">Select TDE Status</option>
                </select>
            </div>
        </div>
    </div>

    <div class="col-custom">
        <div class="form-group">
            <label>Key Personnel</label>
            <div class="input-group">
                <select class="form-control" id="" name="">
                    <option disabled selected value="">Select Key Personnel</option>
                </select>
            </div>
        </div>
    </div>

    <div class="col-custom">
        <div class="form-group">
            <label>Target Release Date Range</label>
            <div class="input-group">
                <input type="text" class="form-control float-right" id="target-release-date-range" name="target-release-date-range">
                <script>
                    $('input[name="target-release-date-range"]').daterangepicker();
                </script>
            </div>
        </div>
    </div>
</div>

<div class="container" id="ProjectContent">
    <div class="row" style="border: 1px solid black;">
        <div class="col-1">
            Generic
        </div>
        <div class="col-1">
            Project Category
        </div>
        <div class="col-1">
            Sub BU
        </div>
        <div class="col-1">
            TDE Status
        </div>
        <div class="col-1">
            Key Personnel
        </div>
        <div class="col-2">
            Target Release Date (RTS)
        </div>
        <div class="col-2">
            TDE Activities Completed Date
        </div>
        <div class="col-3 text-center">
            Action
        </div>
    </div>
    <?php
        $sql = "SELECT a.generic, a.project_category, a.sub_bu, a.tde_status, b.releasing_tde, c.target_release_initial, c.target_release_recommit, c.tde_activities_completed from general_project_info as a left join key_personnel as b on a.generic = b.generic left join critical_dates as c on a.generic = c.generic";
        $stmt = $conn -> prepare($sql);
        $stmt -> execute();

        while($data = $stmt -> fetch(PDO::FETCH_ASSOC)) {
            echo <<<HTML
            <div class="row mt-2 text-center">
                <div class="col-1">
                    {$data['generic']}
                </div>
                <div class="col-1">
                    {$data['project_category']}
                </div>
                <div class="col-1">
                    {$data['sub_bu']}
                </div>
                <div class="col-1">
                    {$data['tde_status']}
                </div>
                <div class="col-1">
                    {$data['releasing_tde']}
                </div>
                <div class="col-2">
                    {$data['target_release_initial']}
                </div>
                <div class="col-2">
                    {$data['tde_activities_completed']}
                </div>
                <div class="col-3 text-center">
                    <div class="row">
                        <div class="col-4">
                            <button class="btn btn-info btn-block">View</button>
                        </div>
                        <div class="col-4">
                            <button class="btn btn-primary btn-block">Edit</button>
                        </div>
                        <div class="col-4">
                            <button class="btn btn-danger btn-block">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            HTML;
        }
    ?>
</div>
<?php include '../modals/add_project.php';?>

<style>
.col-custom {
    flex: 0 0 20%; /* 100% / 5 = 20% */
    max-width: 20%;
}
</style>