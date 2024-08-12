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

<?php include '../modals/add_project.php';?>

<style>
.col-custom {
    flex: 0 0 20%; /* 100% / 5 = 20% */
    max-width: 20%;
}
</style>