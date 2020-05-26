<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			contact <small>contact Listing</small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?= base_url('admin/dashboard'); ?>">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">contact</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">List contact</a>
					</li>
				</ul>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<?php if($this->session->flashdata('contact_delete_success')){ ?>
                  <div class="alert alert-success">
				      <button class="close" data-close="alert"></button>
				      <span>
				      	<?= $this->session->flashdata('contact_delete_success'); ?>
				      </span>
				    </div>
				   <?php } ?>
					<!-- Begin: life time stats -->
					<div class="portlet">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Contact
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-container" style="overflow-x:auto;">
								<table class="table table-striped table-bordered table-hover" id="datatable_products">
								<thead>
								<tr role="row" class="heading">
									<th width="15%">
										 Sender Name
									</th>
									<th width="15%">
										 Sender Email
									</th>
									<th width="15%">
										 Sender Phone
									</th>
									<th width="15%">
										 Date&nbsp;Created
									</th>
									<th width="10%">
										 Actions
									</th>
								</tr>
								<?= form_open();?>
								<tr role="row" class="filter">
									<td>
										<input type="text" class="form-control form-filter input-sm" name="contact_name" value="<?= isset($admin_contact_filter)?$admin_contact_filter['contact_name']:''; ?>">
									</td>
									<td>
										<input type="text" class="form-control form-filter input-sm" name="contact_email" value="<?= isset($admin_contact_filter)?$admin_contact_filter['contact_email']:''; ?>">
									</td>
									<td>
										<input type="text" class="form-control form-filter input-sm" name="contact_phone" value="<?= isset($admin_contact_filter)?$admin_contact_filter['contact_phone']:''; ?>">
									</td>
									<td>
										<div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
											<input type="text" class="form-control form-filter input-sm" readonly name="contact_created_from" id="contact_created_from" placeholder="From" value="<?= isset($admin_contact_filter)?$admin_contact_filter['contact_created_from']:''; ?>">
											<span class="input-group-btn">
											<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
											</span>
										</div>
										<div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
											<input type="text" class="form-control form-filter input-sm" readonly name="contact_created_to" id="contact_created_to" placeholder="To" value="<?= isset($admin_contact_filter)?$admin_contact_filter['contact_created_to']:''; ?>">
											<span class="input-group-btn">
											<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
											</span>
										</div>
									</td>
									<td>
										<div class="margin-bottom-5">
											<?= form_hidden('filtercontact', '1'); ?>
											<button class="btn btn-sm yellow filter-submit margin-bottom"><i class="fa fa-search"></i> Search</button>
										</div>
										<a class="btn btn-sm red filter-cancel" href='<?= base_url('contact/resetcontactfilter');?>'><i class="fa fa-times"></i> Reset</a>
									</td>
								</tr>
								<?= form_close();?>
								</thead>
								</table>
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-container" style="overflow-x:auto;">
								<table class="table table-striped table-bordered table-hover" id="datatable_products">
								<thead>
								<tr role="row" class="heading">
									<th width="10%">
										 ID
									</th>
									<th width="15%">
										 Sender Name
									</th>
									<th width="15%">
										 Sender Email
									</th>
									<th width="15%">
										 Sender Phone
									</th>
									<th width="15%">
										 Contact Recieved At
									</th>
									<th width="10%">
										 Actions
									</th>
								</tr>
								</thead>
								<tbody>
										<?php if($contact){
											foreach($contact as $contact){?>
											<tr>
											<td><?= $contact->contact_id;?></td>
											<td><?= $contact->contact_name;?></td>
											<td><?= $contact->contact_email;?></td>
											<td><?= $contact->contact_phone;?></td>
											<td><?= $contact->contact_recieved_at;?></td>
											<td>
												<div class="margin-bottom-5">
													<a class="btn btn-sm purple filter-submit margin-top-10" href="<?= base_url('contact/view-contact/').$contact->contact_id; ?>"><i class="fa fa fa-eye"></i> View </a>
													<a class="btn btn-sm red filter-submit margin-top-10" href="<?= base_url('contact/delete-contact/').$contact->contact_id; ?>"><i class="fa fa fa-times"></i> Delete </a>
												</div>
											</td>
										</tr>
										<?php } }else{ ?>
											<tr>
											<td colspan='10' class="text-center">No contact Found</td>
											<tr>
										<?php } ?>
								</tbody>
								</table>
								<div class="text-center"><?=$links;?></div>
							</div>
						</div>
					</div>
					<!-- End: life time stats -->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
	