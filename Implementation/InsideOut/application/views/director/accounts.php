    <!--content area start-->
    <div id='content' class='pmd-content dashboard'>
        <!--tab start-->
        <div class='container-fluid full-width-container'>
            <div class='row'>
                <div class='col-lg-9 col-md-9 col-sm-12 col-xs-12' style='margin-bottom: 20px'>
                    <i class='btn btn-success pmd-ripple-effect' style='font-style:normal;'> <a href='<?php echo base_url().'index.php/Director/generate'?>' style='color:white'>Create invite link</a> </i>
                    <p style='display: inline'> &nbsp; <?php echo base_url().'index.php/Guest/create/'.$company->registrationLink?> </p>
                </div>
                <div class='col-lg-3 col-md-3 col-sm-12 col-xs-12' style='margin-bottom: 20px'>
                    <i class='btn btn-success pmd-ripple-effect pull-right' style='font-style:normal' data-target='#num-of-accounts-modal' data-toggle='modal'>Change number of accounts</i>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p><font color="#4acc8e">Number of Accounts: </font><?php echo $company->numAccounts?></p>
                    <p><font color="#4acc8e">Number of Accounts in use: </font><?php echo $company->numAccountsUsed?></p>
                </div>
            </div>
            <div class='row'>
                <div class='col'>
                    <!-- responsive table example -->
                    <div class='pmd-card pmd-z-depth pmd-card-custom-view'>
                        <table id='example' class='table pmd-table table-hover table-striped display responsive nowrap' cellspacing='0' width='100%'>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Teams</th>
                                    <th style='text-align: center'>Manager</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach($menadzeri as $menadzer){
                                    $email = $menadzer['email'];
                                    $id = $menadzer['Id'];
                                    $name = $menadzer['name'];
                                    $surname = $menadzer['surname'];
                                    $njegovitimovi = $menadzer['teams'];
                                    echo "<form method=\"post\" action=\"".base_url()."index.php/Director/editAccountManager/$id"."\"><tr>
                                    <td>
                                        <a href=\"".base_url()."index.php/Director/viewEmployee/$id"."\">$name $surname</a>
                                    </td>
                                    <td>$email"; 
                                    if (isset($message) && isset($accid) && $accid == $id){
                                        if ($message == "error1")
                                            $message = "You must first deselect all teams before changing Manager status!";
                                        else
                                            $message = "There already exists a manager for $message !";
                                        echo "<font class='pull-right' color='red'> $message </font>";
                                    }
                                    echo "</td>
                                    <td>
                                        <select name=\"select" . "$id" . "[]\" id=\"select" . "$id" . "\" ". "multiple=\"multiple\">";
                                            foreach($timovi as $tim){
                                                $imetima = $tim->teamName;
                                                $selektovan = "";
                                                foreach($njegovitimovi as $njegovtim)
                                                    if ($njegovtim->teamName == $imetima){
                                                        $selektovan = "selected";
                                                        break;
                                                    }
                                                echo "<option value=\"$imetima\" $selektovan>$imetima</option>";
                                            }
                                    echo "
                                        </select>
                                    </td>
                                    <td style='text-align: center'>
                                        <div class='checkbox pmd-default-theme'>
                                            <label class='pmd-checkbox pmd-checkbox-ripple-effect'>
                                                <input type='checkbox' name=\"ismngr$id\" checked>
                                            </label>
                                        </div>
                                    </td>
                                    <td style='text-align: center'>
                                    <input type='submit' value='SAVE' class='btn btn-success pmd-ripple-effect pull-right' style='font-style:normal'>
                                    </td>
                                </form>
                                    <td class='pmd-table-row-action' style='text-align: center'>
                                        <button onclick=\"(function(){document.deleteForm.id.value=$id})()\"
                                            class='btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm' data-toggle='modal' data-target=\"#delete-modal\">
                                            <i class='material-icons md-dark pmd-sm'>delete</i>
                                        </button>
                                    </td>
                                </tr>";
                                }

                                foreach($radnici as $radnik){
                                    $email = $radnik['email'];
                                    $id = $radnik['Id'];
                                    $name = $radnik['name'];
                                    $surname = $radnik['surname'];
                                    $njegovitimovi = $radnik['teams'];
                                    echo "<form method='post' action=".base_url()."index.php/Director/editAccountWorker/$id"."><tr>
                                    <td>
                                        <a href=".base_url()."index.php/Director/viewEmployee/"."$id".">$name $surname</a>
                                    </td>
                                    <td>$email"; 
                                    if (isset($message) && isset($accid) && $accid == $id){
                                        if ($message == "error1")
                                            $message = "You must first deselect all teams before changing Manager status!";
                                        else
                                            $message = "There already exists a manager for $message";
                                        echo "<font class='pull-right' color='red'> $message </font>";
                                    }
                                    echo "</td>
                                    <td>
                                         <select name=\"select" . "$id" . "[]\" id=\"select" . "$id" . "\" ". "multiple=\"multiple\">";
                                            foreach($timovi as $tim){
                                                $imetima = $tim->teamName;
                                                $selektovan = "";
                                                foreach($njegovitimovi as $njegovtim)
                                                    if ($njegovtim->teamName == $imetima){
                                                        $selektovan = "selected";
                                                        break;
                                                    }
                                                echo "<option $selektovan>$imetima</option>";
                                            }
                                    echo"
                                        </select>
                                    </td>
                                    <td style='text-align: center'>
                                        <div class='checkbox pmd-default-theme'>
                                            <label class='pmd-checkbox pmd-checkbox-ripple-effect'>
                                                <input type='checkbox' name=\"ismngr$id\">
                                            </label>
                                        </div>
                                    </td>
                                    <td style='text-align: center'>
                                    <input type='submit' value='SAVE' class='btn btn-success pmd-ripple-effect pull-right' style='font-style:normal'>
                                    </td>
                                </form>
                                    <td class='pmd-table-row-action' style='text-align: center'>
                                        <button onclick=\"(function(){document.deleteForm.id.value=$id})()\"
                                                class='btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm' data-toggle='modal' data-target=\"#delete-modal\">
                                            <i class='material-icons md-dark pmd-sm'>delete</i>
                                        </button>
                                    </td>
                                </tr>";
                                }
                            ?>
                                
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
                <form class="form-horizontal" role="form" method="post" action="<?php echo base_url()."index.php/Director/calculatePrice/" ?> ">
                    <div class="modal-body">
                        <table class="table" style="width:60%; margin-left:auto; margin-right:auto;">
                            <?php 
                                if (isset($message)) {
                                    echo 
                                    "<tr>
                                        <td colspan='2'><font color=\"red\">" . urldecode($message) . "</font>
                                        </td>
                                    </tr>";
                                }
                            ?>
                            <tr>
                                <td>Number of accounts</td>
                                <td style="text-align: center"><?php echo $company->numAccountsUsed ?></td>
                            </tr>
                            <tr>
                                <td class="form-group pmd-textfield">
                                    New number of accounts
                                </td>
                                <td>
                                    <input type="number" name="numOfAccounts" class="form-control">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="pmd-modal-action text-center">
                        <input type="submit" class="btn pmd-ripple-effect btn-success" type="button" value="Calculate price" >
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- price modal -->
    <div tabindex="-1" class="modal fade" id="price-modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <p class="text-center" style="margin-top:10px">New price is
                    <span style="font-weight: bold">$<?php echo $price; ?></span>
                </p>
                <div class="pmd-modal-action text-center">
                    <form method="post" action="<?php echo base_url()."index.php/Director/changeNumOfAccounts/" ?> ">
                        <input type="hidden" name="price" value="<?php echo $price; ?>" >
                        <input type="submit" class="btn pmd-ripple-effect btn-success" type="button" value="Confirm" >
                        <input type="reset" data-dismiss="modal" class="btn pmd-ripple-effect btn-success" type="button" value="Cancel">
                    </form>
                </div>
            </div>
        </div>
    </div>

    