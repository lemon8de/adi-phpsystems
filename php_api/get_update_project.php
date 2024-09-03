<?php
require 'db_connection.php';
session_name("adi-php-systems");
session_start();

$response_body = [];
$generic = $_GET['generic'];

$sql = "SELECT a.*, b.*, c.*, d.*, e.* from general_project_info as a left join critical_dates as b on a.generic = b.generic left join equipment as c on a.generic = c.generic left join key_personnel as d on a.generic = d.generic left join links as e on a.generic = e.generic where a.generic = :generic";

$stmt = $conn -> prepare($sql);
$stmt -> bindParam(':generic', $generic);
$stmt -> execute();
$data = $stmt -> fetch(PDO::FETCH_ASSOC);

if ($data) {

    //fuck me thats alot of selects
    $sql = "SELECT project_category, display_name from project_category_masterlist";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $project_category_select = "";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $selected = "";
        if ($row['project_category'] == $data['project_category']) {
            $selected = " selected";
        }
        $project_category_select .= <<<HTML
            <option value="{$row['project_category']}"{$selected}>{$row['display_name']}</option>
        HTML;
    }
    $sql = "SELECT tde_status, display_name from tde_status_masterlist";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $tde_status_select = "";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $selected = "";
        if ($row['tde_status'] == $data['tde_status']) {
            $selected = " selected";
        }
        $tde_status_select .= <<<HTML
            <option value="{$row['tde_status']}"{$selected}>{$row['display_name']}</option>
        HTML;
    }
    $sql = "SELECT sub_bu, display_name from sub_bu_masterlist";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $sub_bu_select = "";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $selected = "";
        if ($row['sub_bu'] == $data['sub_bu']) {
            $selected = " selected";
        }
        $sub_bu_select .= <<<HTML
            <option value="{$row['sub_bu']}"{$selected}>{$row['display_name']}</option>
        HTML;
    }
    $sql = "SELECT id, full_name from users where approved = '1' and users_group = 'test'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $name1_select = "";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $selected = "";
        if ($row['full_name'] == $data['primary_tde']) {
            $selected = " selected";
        }
        $name1_select .= <<<HTML
            <option value="{$row['id']}"{$selected}>{$row['full_name']}</option>
        HTML;
    }
    $sql = "SELECT id, full_name from users where approved = '1' and users_group = 'product'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $name2_select = "";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $selected = "";
        if ($row['full_name'] == $data['primary_pe']) {
            $selected = " selected";
        }
        $name2_select .= <<<HTML
            <option value="{$row['id']}"{$selected}>{$row['full_name']}</option>
        HTML;
    }
    $sql = "SELECT id, full_name from users where approved = '1' and users_group = 'test'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $name3_select = "";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $selected = "";
        if ($row['full_name'] == $data['releasing_tde']) {
            $selected = " selected";
        }
        $name3_select .= <<<HTML
            <option value="{$row['id']}"{$selected}>{$row['full_name']}</option>
        HTML;
    }
    $sql = "SELECT id, full_name from users where approved = '1' and users_group = 'product'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $name4_select = "";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $selected = "";
        if ($row['full_name'] == $data['releasing_pe']) {
            $selected = " selected";
        }
        $name4_select .= <<<HTML
            <option value="{$row['id']}"{$selected}>{$row['full_name']}</option>
        HTML;
    }

    $sql = "SELECT tester, display_name from tester_masterlist";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $tester_select = "";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $selected = "";
        if ($row['display_name'] == $data['tester']) {
            $selected = " selected";
        }
        $tester_select .= <<<HTML
            <option value="{$row['tester']}"{$selected}>{$row['display_name']}</option>
        HTML;
    }
    $sql = "SELECT handler, display_name from handler_masterlist";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $handler_select = "";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $selected = "";
        if ($row['display_name'] == $data['handler']) {
            $selected = " selected";
        }
        $handler_select .= <<<HTML
            <option value="{$row['handler']}"{$selected}>{$row['display_name']}</option>
        HTML;
    }

    $sql = "SELECT prober, display_name from prober_masterlist";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $prober_select = "";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $selected = "";
        if ($row['display_name'] == $data['prober']) {
            $selected = " selected";
        }
        $prober_select .= <<<HTML
            <option value="{$row['prober']}"{$selected}>{$row['display_name']}</option>
        HTML;
    }
    $response_body['inner_html'] = <<<HTML
            <!-- content start -->
            <!-- <div class="container"> -->
                <div class="row">
                    <div class="col-4">
                        <label>General</label>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Generic</label>
                            <div class="col-sm-8">
                                <input type="text" value="{$data['generic']}" class="form-control" name="generic" required readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">PLE Partname</label>
                            <div class="col-sm-8">
                                <input type="text" value="{$data['ple_partname']}" class="form-control" name="ple_partname" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Product Description</label>
                            <textarea id="" rows="4" style="width: 100%;" name="product_description" required>{$data['product_description']}</textarea>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Project Category</label>
                            <select class="col-sm-8 form-control" id="" name="project_category" required>
                                <option disabled selected value="">Select Project Category</option>
                                {$project_category_select}
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">TDE Status</label>
                            <select class="col-sm-8 form-control" id="" name="tde_status" required>
                                <option disabled selected value="">Select TDE Status</option>
                                {$tde_status_select}
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">SUB BU</label>
                            <select class="col-sm-8 form-control" id="" name="sub_bu" required>
                                <option disabled selected value="">Select SUB BU</option>
                                {$sub_bu_select}
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Notes</label>
                            <textarea id="" name="notes" rows="4" style="width: 100%;" required>{$data['notes']}</textarea>
                        </div>
                    </div>
                    <div class="col-4">
                        <label>Links</label>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">PLE Link</label>
                            <div class="col-sm-8">
                                <input type="text" value="{$data['ple_lnk']}" class="form-control" name="ple_link" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">PRIME Link</label>
                            <div class="col-sm-8">
                                <input type="text" value="{$data['prime_link']}" class="form-control" name="prime_link" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">ARP Link</label>
                            <div class="col-sm-8">
                                <input type="text" value="{$data['apr_link']}" class="form-control" name="arp_link" required>
                            </div>
                        </div>
                        <label>Key Personnel</label>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Primary TDE</label>
                            <select class="col-sm-8 form-control" id="" name="primary_tde" required>
                                <option disabled selected value="">Select Primary TDE</option>
                                {$name1_select}
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Primary PE</label>
                            <select class="col-sm-8 form-control" id="" name="primary_pe" required>
                                <option disabled selected value="">Select Primary PE</option>
                                {$name2_select}
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Releasing TDE</label>
                            <select class="col-sm-8 form-control" id="" name="releasing_tde" required>
                                <option disabled selected value="">Select Releasing TDE</option>
                                {$name3_select}
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Releasing PE</label>
                            <select class="col-sm-8 form-control" id="" name="releasing_pe" required>
                                <option disabled selected value="">Select Releasing PE</option>
                                {$name4_select}
                            </select>
                        </div>
                        <label>Equipment</label>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Tester</label>
                            <select class="col-sm-8 form-control" id="" name="tester" required>
                                <option disabled selected value="">Select Tester</option>
                                {$tester_select}
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Handler</label>
                            <select class="col-sm-8 form-control" id="" name="handler" required>
                                <option disabled selected value="">Select Handler</option>
                                {$handler_select}
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Prober</label>
                            <select class="col-sm-8 form-control" id="" name="prober" required>
                                <option disabled selected value="">Select Prober</option>
                                {$prober_select}
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <label>Date Created</label>
                        <div class="form-group row">
                            <div class="col-12">
                                <input type="date" class="form-control" name="date_created" value="{$data['date_created']}" required readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Modified by</label>
                            <div class="col-sm-8">
                                <input type="text" readonly value="{$_SESSION['full_name']}" class="form-control" name="modified_by">
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
                                    <input type="date" value="{$data['silicon_ad_initial']}" class="form-control" name="silicon_ad_initial" required readonly>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="date" value="{$data['silicon_ad_recommit']}" class="form-control" name="silicon_ad_recommit">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label>Char Lot Availability</label>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="date" value="{$data['charlot_ad_initial']}" class="form-control" name="charlot_ad_initial" required readonly>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="date" value="{$data['charlot_ad_recommit']}" class="form-control" name="charlot_ad_recommit">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label>Transfer Package</label>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="date" value="{$data['transfer_package_initial']}" class="form-control" name="transfer_package_initial" required readonly>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="date" value="{$data['transfer_package_recommit']}" class="form-control" name="transfer_package_recommit">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label>IB Lot Availability</label>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="date" value="{$data['iblot_ad_initial']}" class="form-control" name="iblot_ad_initial" required readonly>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="date" value="{$data['iblot_ad_recommit']}" class="form-control" name="iblot_ad_recommit">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label>Target Release</label>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="date" value="{$data['target_release_initial']}" class="form-control" name="target_release_initial" required readonly>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="date" value="{$data['target_release_recommit']}" class="form-control" name="target_release_recommit">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">TDE Activities Completed</label>
                            <div class="col-sm-6">
                                <input type="date" value="{$data['tde_activities_completed']}" class="form-control" name="tde_activities_completed">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Actual Release</label>
                            <div class="col-sm-6">
                                <input type="date" value="{$data['actual_release']}" class="form-control" name="actual_release" required readonly>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- </div> -->
            <!-- content end -->
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Edit Project</button>
            </div>
    HTML;
}

echo json_encode($response_body);
exit();