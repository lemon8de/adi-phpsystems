<?php
$response_body = [];

$response_body['inner_html'] = <<<HTML
            <!-- content start -->
            <!-- <div class="container"> -->
            <div class="row">
                    <div class="col-4">
                        <label>General</label>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Generic</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">PLE Partname</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Product Description</label>
                            <textarea id="" rows="4" style="width: 100%;"></textarea>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Project Category</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">TDE Status</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">SUB BU</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Notes</label>
                            <textarea id="" rows="4" style="width: 100%;"></textarea>
                        </div>
                    </div>
                    <div class="col-4">
                        <label>Links</label>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">PLE Link</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">PRIME Link</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">ARP Link</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <label>Key Personnel</label>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Primary TDE</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Primary PE</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Releasing TDE</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Releasing PE</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="">
                            </div>
                        </div>
                        <label>Equipment</label>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Tester</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Handler</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Prober</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="">
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <label>text Created</label>
                        <div class="form-group row">
                            <div class="col-12">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Modified by</label>
                            <div class="col-sm-8">
                                <input type="text" readonly value="adsfad" class="form-control">
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
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label>Char Lot Availability</label>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label>Transfer Package</label>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label>IB Lot Availability</label>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label>Target Release</label>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">TDE Activities Completed</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Actual Release</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control">
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

echo json_encode($response_body);
exit();