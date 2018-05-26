    <!--content area start-->
    <div id="content" class="pmd-content dashboard">
        <!--tab start-->
        <div class="container-fluid full-width-container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" style="margin-bottom: 20px">
                    <i class="btn btn-success pmd-ripple-effect" style="font-style:normal;"> <a href='<?php echo base_url()."index.php/Director/generate"?>' style="color:white">Create invite link</a> </i>
                    <p style="display: inline"> &nbsp; <?php echo base_url()."index.php/Guest/create/".$reg_link->registrationLink?> </p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="margin-bottom: 20px">
                    <i class="btn btn-success pmd-ripple-effect pull-right" style="font-style:normal" data-target="#num-of-accounts-modal" data-toggle="modal">Change number of accounts</i>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- responsive table example -->
                    <div class="pmd-card pmd-z-depth pmd-card-custom-view">
                        <table id="example" class="table pmd-table table-hover table-striped display responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>Email</th>
                                    <th>Teams</th>
                                    <th style="text-align: center">Manager</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="director-employee-view.html">John</a>
                                    </td>
                                    <td>
                                        <a href="director-employee-view.html">Doe</a>
                                    </td>
                                    <td>john.doe@gmail.com</td>
                                    <td>
                                        <select class="multiselect" multiple="multiple">
                                            <option value="data-science">Data Science</option>
                                            <option value="machine-learning">Machine Learning</option>
                                        </select>
                                    </td>
                                    <td style="text-align: center">
                                        <div class="checkbox pmd-default-theme">
                                            <label class="pmd-checkbox pmd-checkbox-ripple-effect">
                                                <input type="checkbox" value="">
                                            </label>
                                        </div>
                                    </td>
                                    <td class="pmd-table-row-action" style="text-align: center">
                                        <a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm" data-toggle="modal"
                                            data-target="#delete-modal">
                                            <i class="material-icons md-dark pmd-sm">delete</i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="director-employee-view.html">John</a>
                                    </td>
                                    <td>
                                        <a href="director-employee-view.html">Doe</a>
                                    </td>
                                    <td>john.doe@gmail.com</td>
                                    <td>
                                        <select class="multiselect" multiple="multiple">
                                            <option value="data-science">Data Science</option>
                                            <option value="machine-learning">Machine Learning</option>
                                        </select>
                                    </td>
                                    <td style="text-align: center">
                                        <div class="checkbox pmd-default-theme">
                                            <label class="pmd-checkbox pmd-checkbox-ripple-effect">
                                                <input type="checkbox" value="">
                                            </label>
                                        </div>
                                    </td>
                                    <td class="pmd-table-row-action" style="text-align: center">
                                        <a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm" data-toggle="modal"
                                            data-target="#delete-modal">
                                            <i class="material-icons md-dark pmd-sm">delete</i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="director-employee-view.html">John</a>
                                    </td>
                                    <td>
                                        <a href="director-employee-view.html">Doe</a>
                                    </td>
                                    <td>john.doe@gmail.com</td>
                                    <td>
                                        <select class="multiselect" multiple="multiple">
                                            <option value="data-science">Data Science</option>
                                            <option value="machine-learning">Machine Learning</option>
                                        </select>
                                    </td>
                                    <td style="text-align: center">
                                        <div class="checkbox pmd-default-theme">
                                            <label class="pmd-checkbox pmd-checkbox-ripple-effect">
                                                <input type="checkbox" value="">
                                            </label>
                                        </div>
                                    </td>
                                    <td class="pmd-table-row-action" style="text-align: center">

                                        <a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm" data-toggle="modal"
                                            data-target="#delete-modal">
                                            <i class="material-icons md-dark pmd-sm">delete</i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="director-employee-view.html">John</a>
                                    </td>
                                    <td>
                                        <a href="director-employee-view.html">Doe</a>
                                    </td>
                                    <td>john.doe@gmail.com</td>
                                    <td>
                                        <select class="multiselect" multiple="multiple">
                                            <option value="data-science">Data Science</option>
                                            <option value="machine-learning">Machine Learning</option>
                                        </select>
                                    </td>
                                    <td style="text-align: center">
                                        <div class="checkbox pmd-default-theme">
                                            <label class="pmd-checkbox pmd-checkbox-ripple-effect">
                                                <input type="checkbox" value="">
                                            </label>
                                        </div>
                                    </td>
                                    <td class="pmd-table-row-action" style="text-align: center">

                                        <a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm" data-toggle="modal"
                                            data-target="#delete-modal">
                                            <i class="material-icons md-dark pmd-sm">delete</i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="director-employee-view.html">John</a>
                                    </td>
                                    <td>
                                        <a href="director-employee-view.html">Doe</a>
                                    </td>
                                    <td>john.doe@gmail.com</td>
                                    <td>
                                        <select class="multiselect" multiple="multiple">
                                            <option value="data-science">Data Science</option>
                                            <option value="machine-learning">Machine Learning</option>
                                        </select>
                                    </td>
                                    <td style="text-align: center">
                                        <div class="checkbox pmd-default-theme">
                                            <label class="pmd-checkbox pmd-checkbox-ripple-effect">
                                                <input type="checkbox" value="">
                                            </label>
                                        </div>
                                    </td>
                                    <td class="pmd-table-row-action" style="text-align: center">

                                        <a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm" data-toggle="modal"
                                            data-target="#delete-modal">
                                            <i class="material-icons md-dark pmd-sm">delete</i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="director-employee-view.html">John</a>
                                    </td>
                                    <td>
                                        <a href="director-employee-view.html">Doe</a>
                                    </td>
                                    <td>john.doe@gmail.com</td>
                                    <td>
                                        <select class="multiselect" multiple="multiple">
                                            <option value="data-science">Data Science</option>
                                            <option value="machine-learning">Machine Learning</option>
                                        </select>
                                    </td>
                                    <td style="text-align: center">
                                        <div class="checkbox pmd-default-theme">
                                            <label class="pmd-checkbox pmd-checkbox-ripple-effect">
                                                <input type="checkbox" value="">
                                            </label>
                                        </div>
                                    </td>
                                    <td class="pmd-table-row-action" style="text-align: center">

                                        <a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm" data-toggle="modal"
                                            data-target="#delete-modal">
                                            <i class="material-icons md-dark pmd-sm">delete</i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="director-employee-view.html">John</a>
                                    </td>
                                    <td>
                                        <a href="director-employee-view.html">Doe</a>
                                    </td>
                                    <td>john.doe@gmail.com</td>
                                    <td>
                                        <select class="multiselect" multiple="multiple">
                                            <option value="data-science">Data Science</option>
                                            <option value="machine-learning">Machine Learning</option>
                                        </select>
                                    </td>
                                    <td style="text-align: center">
                                        <div class="checkbox pmd-default-theme">
                                            <label class="pmd-checkbox pmd-checkbox-ripple-effect">
                                                <input type="checkbox" value="">
                                            </label>
                                        </div>
                                    </td>
                                    <td class="pmd-table-row-action" style="text-align: center">

                                        <a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm" data-toggle="modal"
                                            data-target="#delete-modal">
                                            <i class="material-icons md-dark pmd-sm">delete</i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="director-employee-view.html">John</a>
                                    </td>
                                    <td>
                                        <a href="director-employee-view.html">Doe</a>
                                    </td>
                                    <td>john.doe@gmail.com</td>
                                    <td>
                                        <select class="multiselect" multiple="multiple">
                                            <option value="data-science">Data Science</option>
                                            <option value="machine-learning">Machine Learning</option>
                                        </select>
                                    </td>
                                    <td style="text-align: center">
                                        <div class="checkbox pmd-default-theme">
                                            <label class="pmd-checkbox pmd-checkbox-ripple-effect">
                                                <input type="checkbox" value="">
                                            </label>
                                        </div>
                                    </td>
                                    <td class="pmd-table-row-action" style="text-align: center">

                                        <a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm" data-toggle="modal"
                                            data-target="#delete-modal">
                                            <i class="material-icons md-dark pmd-sm">delete</i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="director-employee-view.html">John</a>
                                    </td>
                                    <td>
                                        <a href="director-employee-view.html">Doe</a>
                                    </td>
                                    <td>john.doe@gmail.com</td>
                                    <td>
                                        <select class="multiselect" multiple="multiple">
                                            <option value="data-science">Data Science</option>
                                            <option value="machine-learning">Machine Learning</option>
                                        </select>
                                    </td>
                                    <td style="text-align: center">
                                        <div class="checkbox pmd-default-theme">
                                            <label class="pmd-checkbox pmd-checkbox-ripple-effect">
                                                <input type="checkbox" value="">
                                            </label>
                                        </div>
                                    </td>
                                    <td class="pmd-table-row-action" style="text-align: center">
                                        <a type="button" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm" data-toggle="modal" data-target="#delete-modal">
                                            <i class="material-icons md-dark pmd-sm">delete</i>
                                        </a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- table end -->

                </div>




            </div>
        </div>
        <!-- tab end -->

    </div>
    <!-- content area end -->




    <!-- num of accounts modal -->
    <div tabindex="-1" class="modal fade" id="num-of-accounts-modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button" style="color:black;">×</button>
                    <h2 class="pmd-card-title-text text-center">Change number of accounts</h2>
                    <h6 class="text-center">Increase or decrease the number of available accounts for your company</h6>
                    <h6 class="text-center alert alert-success">
                        <!-- <span style="font-weight: bold">WARNING:</span>  -->
                        To successfully decrease number of accounts remaining accounts must be free, have no owner
                    </h6>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <table class="table" style="width:60%; margin-left:auto; margin-right:auto; margin-top:50px">
                            <tr>
                                <td>Number of accounts</td>
                                <td style="text-align: center">15</td>
                            </tr>
                            <tr>
                                <td class="form-group pmd-textfield">
                                    New number of accounts
                                </td>
                                <td>
                                    <input type="number" id="name" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="pmd-modal-action text-center">
                    <a hred="" data-dismiss="modal" class="btn pmd-ripple-effect btn-success" type="button" data-target="#price-modal" data-toggle="modal">Calculate price</a>
                </div>
            </div>
        </div>
    </div>

    <!-- price modal -->
    <div tabindex="-1" class="modal fade" id="price-modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <p class="text-center" style="margin-top:10px">New price is
                    <span style="font-weight: bold">$100.00</span>
                </p>
                <div class="pmd-modal-action text-center">
                    <a href="director-admin-accounts.html" class="btn pmd-ripple-effect btn-success" type="button">Confirm</a>
                    <a href="" data-dismiss="modal" class="btn pmd-ripple-effect btn-success" type="button">Cancel</a>
                </div>
            </div>
        </div>
    </div>

    <!-- delete modal -->
    <div id="delete-modal" class="modal fade " tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-title" id="myModalLabel">Do you really want to delete this account?</div>
                </div>
                <!-- <div class="modal-body">
                Do you really want to delete this row?
            </div> -->
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal">No</button>
                    <button class="btn btn-success" data-dismiss="modal">Yes</button>
                </div>
            </div>
        </div>
    </div>