                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="<?= base_url('contact/list-contact'); ?>">Contacts</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>View Contact</span>
                                </li>
                            </ul>
                            <div class="page-toolbar">
                                <div class="btn-group pull-right">
                                    <button onclick='window.location.href="<?= base_url('contact/list-contact'); ?>"' type="button" class="btn green btn-sm btn-outline" data-toggle="dropdown"> Back
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
                                        <li> <h5>Contact Id </h5> </li>
                                        <li> <h5>Contact Subject </h5> </li>
                                        <li> <h5>Contact Name </h5> </li>
                                        <li> <h5>Contact Email </h5> </li>
                                        <li> <h5>Contact Phone </h5> </li>
                                        <li> <h5>Contact Message </h5></li>
                                        <li> <h5>Contact Received At </h5> </li>
                                    </ul>
                                </div>
                                <div class="col-xs-4">
                                    <ul class="list-unstyled">
                                        <?php if($contact){
                                            foreach($contact as $contact){?>
                                            <li><h5><?= $contact->contact_id;?></h5></li>
                                            <li><h5><?= $contact->contact_subject;?></h5></h5></li>
                                            <li><h5><?= $contact->contact_name;?></h5></li>
                                            <li><h5><?= $contact->contact_email;?></h5></li>
                                            <li><h5><?= $contact->contact_phone;?></h5></li>
                                            <li><h5><?= $contact->contact_message;?></h5></li>
                                            <li><h5><?= $contact->contact_recieved_at;?></h5></li>
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
                