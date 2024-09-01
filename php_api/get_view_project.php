<?php
require 'db_connection.php';
$response_body = [];
$generic = $_GET['generic'];

$sql = "SELECT a.*, b.*, c.*, d.*, e.* from general_project_info as a left join critical_dates as b on a.generic = b.generic left join equipment as c on a.generic = c.generic left join key_personnel as d on a.generic = d.generic left join links as e on a.generic = e.generic where a.generic = :generic";

$stmt = $conn -> prepare($sql);
$stmt -> bindParam(':generic', $generic);
$stmt -> execute();
$data = $stmt -> fetch(PDO::FETCH_ASSOC);

$sql_sub_bu = "SELECT display_name from sub_bu_masterlist where sub_bu = :sub_bu";
$stmt_sub_bu = $conn -> prepare($sql_sub_bu);

$sql_product = "SELECT display_name from project_category_masterlist where project_category = :project_category";
$stmt_product = $conn -> prepare($sql_product);

$sql_tde_status = "SELECT display_name from tde_status_masterlist where tde_status = :tde_status";
$stmt_tde_status = $conn -> prepare($sql_tde_status);

if ($data) {
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
    $response_body['inner_html'] = <<<HTML
                <!-- content start -->
                <!-- <div class="container"> -->
                <div class="row">
                        <div class="col-4">
                            <label>General</label>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Generic</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{$data['generic']}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">PLE Partname</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{$data['ple_partname']}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Product Description</label>
                                <textarea id="" rows="4" style="width: 100%;">{$data['product_description']}</textarea>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Project Category</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{$data['project_category']}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">TDE Status</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{$data['tde_status']}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">SUB BU</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{$data['sub_bu']}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Notes</label>
                                <textarea rows="4" style="width: 100%;">{$data['notes']}</textarea>
                            </div>
                        </div>
                        <div class="col-4">
                            <label>Links</label>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">PLE Link</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{$data['ple_lnk']}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">PRIME Link</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{$data['prime_link']}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">ARP Link</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{$data['apr_link']}">
                                </div>
                            </div>
                            <label>Key Personnel</label>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Primary TDE</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{$data['primary_tde']}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Primary PE</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{$data['primary_pe']}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Releasing TDE</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{$data['releasing_tde']}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Releasing PE</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{$data['releasing_pe']}">
                                </div>
                            </div>
                            <label>Equipment</label>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Tester</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{$data['tester']}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Handler</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{$data['handler']}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Prober</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{$data['prober']}">
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <label>Date Created</label>
                            <div class="form-group row">
                                <div class="col-12">
                                    <input type="text" class="form-control" value="{$data['date_created']}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Modified by</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{$data['modified_by']}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Modified Date</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{$data['modified_date']}">
                                </div>
                            </div>

                            <label>Critical texts</label>
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
                                        <input type="text" class="form-control" value="{$data['silicon_ad_initial']}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{$data['silicon_ad_recommit']}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label>Char Lot Availability</label>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{$data['charlot_ad_initial']}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{$data['charlot_ad_recommit']}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label>Transfer Package</label>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{$data['transfer_package_initial']}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{$data['transfer_package_recommit']}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label>IB Lot Availability</label>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{$data['iblot_ad_initial']}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{$data['iblot_ad_recommit']}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label>Target Release</label>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{$data['target_release_initial']}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{$data['target_release_recommit']}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label">TDE Activities Completed</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" value="{$data['tde_activities_completed']}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label">Actual Release</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" value="{$data['actual_release']}">
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- </div> -->
                <!-- content end -->
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
    HTML;
}

echo json_encode($response_body);
exit();