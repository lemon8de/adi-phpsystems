<form action="../php_api/add_project.php" method="POST">
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="min-width:98%;">
        <div class="modal-content" style="padding:10px; margin:10px;">
            <!-- content start -->
            <!-- <div class="container"> -->
                <div class="row">
                    <div class="col-4">
                        <label>General</label>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Generic</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="generic">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">PLE Partname</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="ple_partname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Product Description</label>
                            <textarea id="" rows="4" style="width: 100%;" name="product_description"></textarea>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Project Category</label>
                            <select class="col-sm-8 form-control" id="" name="project_category">
                                <option disabled selected value="">Select Project Category</option>
                                <?php 
                                    $sql = "SELECT project_category, display_name from project_category_masterlist";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute();

                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo <<<HTML
                                            <option value="{$row['project_category']}">{$row['display_name']}</option>
                                        HTML;
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">TDE Status</label>
                            <select class="col-sm-8 form-control" id="" name="tde_status">
                                <option disabled selected value="">Select TDE Status</option>
                                <?php 
                                    $sql = "SELECT tde_status, display_name from tde_status_masterlist";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute();

                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo <<<HTML
                                            <option value="{$row['tde_status']}">{$row['display_name']}</option>
                                        HTML;
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">SUB BU</label>
                            <select class="col-sm-8 form-control" id="" name="sub_bu">
                                <option disabled selected value="">Select SUB BU</option>
                                <?php 
                                    $sql = "SELECT sub_bu, display_name from sub_bu_masterlist";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute();

                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo <<<HTML
                                            <option value="{$row['sub_bu']}">{$row['display_name']}</option>
                                        HTML;
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Notes</label>
                            <textarea id="" name="notes" rows="4" style="width: 100%;"></textarea>
                        </div>
                    </div>
                    <div class="col-4">
                        <label>Links</label>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">PLE Link</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="ple_link">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">PRIME Link</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="prime_link">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">ARP Link</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="arp_link">
                            </div>
                        </div>
                        <label>Key Personnel</label>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Primary TDE</label>
                            <select class="col-sm-8 form-control" id="" name="primary_tde">
                                <option disabled selected value="">Select Primary TDE</option>
                                <?php 
                                    $sql = "SELECT id, full_name from users where approved = '1' and users_group = 'test'";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute();

                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo <<<HTML
                                            <option value="{$row['id']}">{$row['full_name']}</option>
                                        HTML;
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Primary PE</label>
                            <select class="col-sm-8 form-control" id="" name="primary_pe">
                                <option disabled selected value="">Select Primary PE</option>
                                <?php 
                                    $sql = "SELECT id, full_name from users where approved = '1' and users_group = 'product'";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute();

                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo <<<HTML
                                            <option value="{$row['id']}">{$row['full_name']}</option>
                                        HTML;
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Releasing TDE</label>
                            <select class="col-sm-8 form-control" id="" name="releasing_tde">
                                <option disabled selected value="">Select Releasing TDE</option>
                                <?php 
                                    $sql = "SELECT id, full_name from users where approved = '1' and users_group = 'test'";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute();

                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo <<<HTML
                                            <option value="{$row['id']}">{$row['full_name']}</option>
                                        HTML;
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Releasing PE</label>
                            <select class="col-sm-8 form-control" id="" name="releasing_pe">
                                <option disabled selected value="">Select Releasing PE</option>
                                <?php 
                                    $sql = "SELECT id, full_name from users where approved = '1' and users_group = 'product'";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute();

                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo <<<HTML
                                            <option value="{$row['id']}">{$row['full_name']}</option>
                                        HTML;
                                    }
                                ?>
                            </select>
                        </div>
                        <label>Equipment</label>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Tester</label>
                            <select class="col-sm-8 form-control" id="" name="tester">
                                <option disabled selected value="">Select Tester</option>
                                <?php 
                                    $sql = "SELECT tester, display_name from tester_masterlist";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute();

                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo <<<HTML
                                            <option value="{$row['tester']}">{$row['display_name']}</option>
                                        HTML;
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Handler</label>
                            <select class="col-sm-8 form-control" id="" name="handler">
                                <option disabled selected value="">Select Handler</option>
                                <?php 
                                    $sql = "SELECT handler, display_name from handler_masterlist";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute();

                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo <<<HTML
                                            <option value="{$row['handler']}">{$row['display_name']}</option>
                                        HTML;
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Prober</label>
                            <select class="col-sm-8 form-control" id="" name="prober">
                                <option disabled selected value="">Select Prober</option>
                                <?php 
                                    $sql = "SELECT prober, display_name from prober_masterlist";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute();

                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo <<<HTML
                                            <option value="{$row['prober']}">{$row['display_name']}</option>
                                        HTML;
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <label>Date Created</label>
                        <div class="form-group row">
                            <div class="col-12">
                                <input type="date" class="form-control" name="date_created">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Modified by</label>
                            <div class="col-sm-8">
                                <input type="text" readonly value="<?php echo $_SESSION['full_name'];?>" class="form-control" name="modified_by">
                            </div>
                        </div>

                        <label>Critical Dates</label>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">
                                <label>Initial</label>
                            </div>
                            <div class="col-4">
                                <label>Re-Commit</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label>Silicon Availability</label>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="date" class="form-control" name="silicon_ad_initial">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="date" class="form-control" name="silicon_ad_recommit">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label>Char Lot Availability</label>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="date" class="form-control" name="charlot_ad_initial">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="date" class="form-control" name="charlot_ad_recommit">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label>Transfer Package</label>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="date" class="form-control" name="transfer_package_initial">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="date" class="form-control" name="transfer_package_recommit">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label>IB Lot Availability</label>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="date" class="form-control" name="iblot_ad_initial">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="date" class="form-control" name="iblot_ad_recommit">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label>Target Release</label>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="date" class="form-control" name="target_release_initial">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="date" class="form-control" name="target_release_recommit">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">TDE Activities Completed</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" name="tde_activities_completed">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Actual Release</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" name="actual_release">
                            </div>
                        </div>
                    </div>
                </div>
            <!-- </div> -->
            <!-- content end -->
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Project</button>
            </div>
        </div>
    </div>
    </div>
</form>