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
      <!-- BEGIN STYLE CUSTOMIZER -->
      <div class="theme-panel hidden-xs hidden-sm">
        <div class="theme-options">
          <div class="theme-option theme-colors clearfix">
            <span>
            THEME COLOR </span>
            <ul>
              <li class="color-default current tooltips" data-style="default" data-container="body" data-original-title="Default">
              </li>
              <li class="color-darkblue tooltips" data-style="darkblue" data-container="body" data-original-title="Dark Blue">
              </li>
              <li class="color-blue tooltips" data-style="blue" data-container="body" data-original-title="Blue">
              </li>
              <li class="color-grey tooltips" data-style="grey" data-container="body" data-original-title="Grey">
              </li>
              <li class="color-light tooltips" data-style="light" data-container="body" data-original-title="Light">
              </li>
              <li class="color-light2 tooltips" data-style="light2" data-container="body" data-html="true" data-original-title="Light 2">
              </li>
            </ul>
          </div>
          <div class="theme-option">
            <span>
            Theme Style </span>
            <select class="layout-style-option form-control input-sm">
              <option value="square" selected="selected">Square corners</option>
              <option value="rounded">Rounded corners</option>
            </select>
          </div>
          <div class="theme-option">
            <span>
            Layout </span>
            <select class="layout-option form-control input-sm">
              <option value="fluid" selected="selected">Fluid</option>
              <option value="boxed">Boxed</option>
            </select>
          </div>
          <div class="theme-option">
            <span>
            Header </span>
            <select class="page-header-option form-control input-sm">
              <option value="fixed" selected="selected">Fixed</option>
              <option value="default">Default</option>
            </select>
          </div>
          <div class="theme-option">
            <span>
            Top Menu Dropdown</span>
            <select class="page-header-top-dropdown-style-option form-control input-sm">
              <option value="light" selected="selected">Light</option>
              <option value="dark">Dark</option>
            </select>
          </div>
          <div class="theme-option">
            <span>
            Sidebar Mode</span>
            <select class="sidebar-option form-control input-sm">
              <option value="fixed">Fixed</option>
              <option value="default" selected="selected">Default</option>
            </select>
          </div>
          <div class="theme-option">
            <span>
            Sidebar Menu </span>
            <select class="sidebar-menu-option form-control input-sm">
              <option value="accordion" selected="selected">Accordion</option>
              <option value="hover">Hover</option>
            </select>
          </div>
          <div class="theme-option">
            <span>
            Sidebar Style </span>
            <select class="sidebar-style-option form-control input-sm">
              <option value="default" selected="selected">Default</option>
              <option value="light">Light</option>
            </select>
          </div>
          <div class="theme-option">
            <span>
            Sidebar Position </span>
            <select class="sidebar-pos-option form-control input-sm">
              <option value="left" selected="selected">Left</option>
              <option value="right">Right</option>
            </select>
          </div>
          <div class="theme-option">
            <span>
            Footer </span>
            <select class="page-footer-option form-control input-sm">
              <option value="fixed">Fixed</option>
              <option value="default" selected="selected">Default</option>
            </select>
          </div>
        </div>
      </div>
      <!-- END STYLE CUSTOMIZER -->
      <!-- BEGIN PAGE HEADER-->
      <h3 class="page-title">
      Category Edit <small>create & edit category</small>
      </h3>
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <i class="fa fa-home"></i>
            <a href="index.html">Home</a>
            <i class="fa fa-angle-right"></i>
          </li>
          <li>
            <a href="#">Category</a>
            <i class="fa fa-angle-right"></i>
          </li>
          <li>
            <a href="#">Category Edit</a>
          </li>
        </ul>
        <?php /* <div class="page-toolbar">
          <div class="btn-group pull-right">
            <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
            Actions <i class="fa fa-angle-down"></i>
            </button>
            <ul class="dropdown-menu pull-right" role="menu">
              <li>
                <a href="#">Action</a>
              </li>
              <li>
                <a href="#">Another action</a>
              </li>
              <li>
                <a href="#">Something else here</a>
              </li>
              <li class="divider">
              </li>
              <li>
                <a href="#">Separated link</a>
              </li>
            </ul>
          </div>
        </div> */?>
      </div>
      <!-- END PAGE HEADER-->
      <!-- BEGIN PAGE CONTENT-->
      <div class="row">
        <div class="col-md-12">
            <?= form_open(base_url()."admin/category/edit-category/$cat_id",'class="form-horizontal form-row-seperated"');?>
            <div class="portlet">
              <div class="portlet-title">
                <div class="caption">
                  <i class="fa fa-shopping-cart"></i>Test category
                </div>
                <div class="actions btn-set">
                  <button type="button" name="back" class="btn default"><i class="fa fa-angle-left"></i> Back</button>
                  <button class="btn green"><i class="fa fa-check"></i> Save</button>
                </div>
              </div>
              <div class="portlet-body">
                <div class="tabbable">
                  <ul class="nav nav-tabs">
                    <li class="active">
                      <a href="#tab_general" data-toggle="tab">
                      General </a>
                    </li>
                    <?php /* <li>
                      <a href="#tab_meta" data-toggle="tab">
                      Meta </a>
                    </li>
                    */?>
                  </ul>
                  
                  
                  <?php if($this->session->flashdata('cat_update_success')){ ?>
                  <div class="alert alert-success">
				      <button class="close" data-close="alert"></button>
				      <span>
				      	<?= $this->session->flashdata('cat_update_success'); ?>
				      </span>
				    </div>
				   <?php } ?>
                  <div class="tab-content no-space">
                    <div class="tab-pane active" id="tab_general">
                      <div class="form-body">
                        <div class="form-group">
                          <label class="col-md-2 control-label">Category Name: <span class="required">
                          * </span>
                          </label>
                          <div class="col-md-10">
                          	<?php 
                          	if($categories[0]->cat_name){
                          		$cat_name = $categories[0]->cat_name;
                          	}else{
                          		$cat_name = set_value('cat_name');
                          	}
                          	if($categories[0]->cat_description){
                          		$cat_description = $categories[0]->cat_description;
                          	}else{
                          		$cat_description = set_value('cat_description');
                          	}
                          	if($categories[0]->cat_meta_title){
                          		$cat_meta_title = $categories[0]->cat_meta_title;
                          	}else{
                          		$cat_meta_title = set_value('cat_meta_title');
                          	}
							if($categories[0]->cat_keyword){
                          		$cat_keyword = $categories[0]->cat_keyword;
                          	}else{
                          		$cat_keyword = set_value('cat_keyword');
                          	}
                          	if($categories[0]->cat_meta_desc){
                          		$cat_meta_desc = $categories[0]->cat_meta_desc;
                          	}else{
                          		$cat_meta_desc = set_value('cat_meta_desc');
                          	}

                          	 ?>
                            <?= form_input('cat_name', $cat_name, 'class="form-control" placeholder="Enter Category Name" '); ?>
                            <?=form_error('cat_name','<p class="text-danger">','</p>');?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-2 control-label">Category Description:
                          </label>
                          <div class="col-md-10">
                            <?php
                            $options = array(
                                'name' => 'cat_description',
                                'rows' => '2',
                                'cols' => '50',
                                'value'=> $cat_description,
                                'class'=>"form-control"
                            );
                             echo form_textarea($options); ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-2 control-label">Meta Title:
                          </label>
                          <div class="col-md-10">
                            <?php
                            $options = array(
                                'name' => 'cat_meta_title',
                                'rows' => '2',
                                'cols' => '50',
                                'value'=> $cat_meta_title,
                                'class'=>"form-control"
                            );
                             echo form_textarea($options); ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-2 control-label">Meta Keywords:
                          </label>
                          <div class="col-md-10">
                            <?php
                            $options = array(
                                'name' => 'cat_keyword',
                                'rows' => '2',
                                'cols' => '50',
                                'value'=> $cat_keyword,
                                'class'=>"form-control"
                            );
                             echo form_textarea($options); ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-2 control-label">Meta Description: 
                          </label>
                          <div class="col-md-10">
                            <?php
                            $options = array(
                                'name' => 'cat_meta_desc',
                                'rows' => '2',
                                'cols' => '50',
                                'value'=> $cat_meta_desc,
                                'class'=>"form-control"
                            );
                             echo form_textarea($options); ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-2 control-label">Status: 
                          </label>
                          <div class="col-md-10">
                            <?php 
                            $options = [
                                    '1'  => 'Enabled',
                                    '0'    => 'Disabled'
                            ];
                             echo form_dropdown('cat_status', $options, isset($categories[0]->cat_status)?$categories[0]->cat_status:set_value('cat_status'),'class="table-group-action-input form-control input-medium"'); ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php form_close(); ?>
        </div>
      </div>
      <!-- END PAGE CONTENT-->
    </div>
  </div>
  <!-- END CONTENT -->