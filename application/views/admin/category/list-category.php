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
			Category <small>Category Listing</small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">eCommerce</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Category</a>
					</li>
				</ul>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<?php if($this->session->flashdata('cat_add_success')){ ?>
                  <div class="alert alert-success">
				      <button class="close" data-close="alert"></button>
				      <span>
				      	<?= $this->session->flashdata('cat_add_success'); ?>
				      </span>
				    </div>
				   <?php } ?>
					<!-- Begin: life time stats -->
					<div class="portlet">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Category
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-container">
								<table class="table table-striped table-bordered table-hover" id="datatable_products">
								<thead>
								<tr role="row" class="heading">
									<th width="15%">
										 Category&nbsp;Name
									</th>
									<th width="15%">
										 Category Status
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
										<input type="text" class="form-control form-filter input-sm" name="cat_name" value="<?= isset($admin_cat_filter)?$admin_cat_filter['cat_name']:''; ?>">
									</td>
									<td>
										<?php 
				                            $options = [
				                            		''    => 'Select',
				                                    '1'  => 'Active',
				                                    '0'  => 'Inactive',
				                                    
				                            ];
                             				echo form_dropdown('cat_status', $options, isset($admin_cat_filter)?$admin_cat_filter['cat_status']:'','class="form-control form-filter input-sm"'); ?>
									</td>
									<td>
										<div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
											<input type="text" class="form-control form-filter input-sm" readonly name="cat_created_from" id="cat_created_from" placeholder="From" value="<?= isset($admin_cat_filter)?$admin_cat_filter['cat_created_from']:''; ?>">
											<span class="input-group-btn">
											<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
											</span>
										</div>
										<div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
											<input type="text" class="form-control form-filter input-sm" readonly name="cat_created_to" id="cat_created_to" placeholder="To" value="<?= isset($admin_cat_filter)?$admin_cat_filter['cat_created_to']:''; ?>">
											<span class="input-group-btn">
											<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
											</span>
										</div>
									</td>
									<td>
										<div class="margin-bottom-5">
											<?= form_hidden('filtercat', '1'); ?>
											<button class="btn btn-sm yellow filter-submit margin-bottom"><i class="fa fa-search"></i> Search</button>
										</div>
										<a class="btn btn-sm red filter-cancel" href='<?= base_url('category/resetCategoryFilter');?>'><i class="fa fa-times"></i> Reset</a>
									</td>
								</tr>
								<?= form_close();?>
								</thead>
								</table>
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-container">
								<table class="table table-striped table-bordered table-hover" id="datatable_products">
								<thead>
								<tr role="row" class="heading">
									<th width="10%">
										 ID
									</th>
									<th width="15%">
										 Category&nbsp;Name
									</th>
									<th width="15%">
										 Category Status
									</th>
									<th width="15%">
										 Date&nbsp;Created
									</th>
									<th width="10%">
										 Actions
									</th>
								</tr>
								</thead>
								<tbody>
										<?php if($categories){
											foreach($categories as $category){?>
											<tr>
											<td><?= $category->cat_id;?></td>
											<td><?= $category->cat_name;?></td>
											<td><?= ($category->cat_status !=null && $category->cat_status ==1 )?'<span class="alert-success">Active</span>':'<span class="text-danger">Inactive</span>';?></td>
											<td><?= $category->cat_created_at;?></td>
											<td>
												<div class="margin-bottom-5">
													<a class="btn btn-sm blue filter-submit margin-bottom" href="<?= base_url('category/edit-category/').$category->cat_id; ?>"><i class="fa fa-edit"></i> Edit </a>
												</div>
											</td>
										</tr>
										<?php } }else{ ?>
											<tr>
											<td colspan='10' class="text-center">No Category Found</td>
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
	