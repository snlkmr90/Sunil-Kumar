                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="<?= base_url('writeus/list-writeus'); ?>">Writeus</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>View writeus</span>
                                </li>
                            </ul>
                            <div class="page-toolbar">
                                <div class="btn-group pull-right">
                                    <button onclick='window.location.href="<?= base_url('writeus/list-writeus'); ?>"' type="button" class="btn green btn-sm btn-outline" data-toggle="dropdown"> Back
                                        <i class="fa fa-undo"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- END PAGE HEADER-->
                        <div class="invoice">
                            <hr/>
                            <div class="row">
                                <div class="col-xs-4">
                                    <ul class="list-unstyled">
                                        <li> <h5>Writeus Id </h5> </li>
                                        <li> <h5>Writeus Subject </h5> </li>
                                        <li> <h5>Writeus Name </h5> </li>
                                        <li> <h5>Writeus Email </h5> </li>
                                        <li> <h5>Writeus Message </h5></li>
                                        <li> <h5>Writeus Received At </h5> </li>
                                    </ul>
                                </div>
                                <div class="col-xs-4">
                                    <ul class="list-unstyled">
                                        <?php if($writeus){
                                            foreach($writeus as $writeus){?>
                                            <li><h5><?= $writeus->writeus_id;?></h5></li>
                                            <li><h5><?= $writeus->writeus_subject;?></h5></h5></li>
                                            <li><h5><?= $writeus->writeus_name;?></h5></li>
                                            <li><h5><?= $writeus->writeus_email;?></h5></li>
                                            <li><h5><?= $writeus->writeus_message;?></h5></li>
                                            <li><h5><?= $writeus->writeus_recieved_at;?></h5></li>
                                          <?php } }else{ ?>
                                          <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
                