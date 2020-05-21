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
			post <small>post Listing</small>
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
						<a href="#">post</a>
					</li>
				</ul>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<?php if($this->session->flashdata('post_add_success')){ ?>
                  <div class="alert alert-success">
				      <button class="close" data-close="alert"></button>
				      <span>
				      	<?= $this->session->flashdata('post_add_success'); ?>
				      </span>
				    </div>
				   <?php } ?>
					<!-- Begin: life time stats -->
					<div class="portlet">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>post
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-container">
								<table class="table table-striped table-bordered table-hover" id="datatable_products">
								<thead>
								<tr role="row" class="heading">
									<th width="15%">
										 Post&nbsp;Name
									</th>
									<th width="15%">
										 Post Category
									</th>
									<th width="15%">
										 Post Status
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
										<input type="text" class="form-control form-filter input-sm" name="post_name" value="<?= isset($admin_post_filter)?$admin_post_filter['post_name']:''; ?>">
									</td>
									<td>
									<?php 
			                            $options = array();
			                            $options[''] = "Select";
			                            foreach($categories as $cat)
			                            {
			                              $options[$cat->cat_id] = $cat->cat_name;
			                            }
			                             
			                             echo form_dropdown('post_cat', $options, (isset($admin_post_filter['post_cat']) && $admin_post_filter['post_cat'] !=null )?$admin_post_filter['post_cat']:set_value('post_cat'),'class="table-group-action-input form-control"'); 
                             		?>
                             		</td>

									<td>
										<?php 
				                            $options = [
				                            		''    => 'Select',
				                                    '1'  => 'Active',
				                                    '0'  => 'Inactive',
				                                    
				                            ];
                             				echo form_dropdown('post_status', $options, isset($admin_post_filter)?$admin_post_filter['post_status']:'','class="form-control form-filter input-sm"'); ?>
									</td>
									<td>
										<div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
											<input type="text" class="form-control form-filter input-sm" readonly name="post_created_from" id="post_created_from" placeholder="From" value="<?= isset($admin_post_filter)?$admin_post_filter['post_created_from']:''; ?>">
											<span class="input-group-btn">
											<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
											</span>
										</div>
										<div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
											<input type="text" class="form-control form-filter input-sm" readonly name="post_created_to" id="post_created_to" placeholder="To" value="<?= isset($admin_post_filter)?$admin_post_filter['post_created_to']:''; ?>">
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
										<a class="btn btn-sm red filter-cancel" href='<?= base_url('post/resetPostFilter');?>'><i class="fa fa-times"></i> Reset</a>
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
										 Post&nbsp;Name
									</th>
									<th width="15%">
										 Post Category
									</th>
									<th width="15%">
										 Post Status
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
										<?php if($posts){
											foreach($posts as $post){?>
											<tr>
											<td><?= $post->post_id;?></td>
											<td><?= $post->post_name;?></td>
											<td><?= $post->cat_name;?></td>
											<td><?= ($post->post_status !=null && $post->post_status ==1 )?'<span class="alert-success">Active</span>':'<span class="text-danger">Inactive</span>';?></td>
											<td><?= $post->post_created_at;?></td>
											<td>
												<div class="margin-bottom-5">
													<a class="btn btn-sm blue filter-submit margin-bottom" href="<?= base_url('post/edit-post/').$post->post_id; ?>"><i class="fa fa-edit"></i> Edit </a>
												</div>
											</td>
										</tr>
										<?php } }else{ ?>
											<tr>
											<td colspan='10' class="text-center">No Post Found</td>
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
	