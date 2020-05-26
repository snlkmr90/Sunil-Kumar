<?php $seg1 = $this->uri->segment(1);
      $seg2 = $this->uri->segment(2);
      $seg3 = $this->uri->segment(3);
      
 ?>
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
  <!-- BEGIN SIDEBAR -->
  <div class="page-sidebar-wrapper">
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
      <!-- BEGIN SIDEBAR MENU -->
      <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
      <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
      <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
      <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
      <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
      <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
      <ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
        <li class="sidebar-toggler-wrapper">
          <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
          <div class="sidebar-toggler">
          </div>
          <!-- END SIDEBAR TOGGLER BUTTON -->
        </li>
        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
        <li class="sidebar-search-wrapper">
          <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
          <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
          <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
          <form class="sidebar-search" method="POST">
            <a href="javascript:;" class="remove">
            <i class="icon-close"></i>
            </a>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
              <a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
              </span>
            </div>
          </form>
          <!-- END RESPONSIVE QUICK SEARCH FORM -->
        </li>
        <li class="start <?= ($seg2=='dashboard')?'active open':'';?>">
          <a href="<?= base_url('admin/dashboard'); ?>">
          <i class="icon-home"></i>
          <span class="title">Dashboard</span>
          <span class="<?= ($seg2=='dashboard')?'selected':'';?>"></span>
          <?php /*<span class="arrow open"></span>*/?>
          </a>
        </li>
        <li class="<?= ($seg2=='add-category' || $seg2=='list-category' || $seg2=='edit-category' )?'open':'';?>">
          <a href="javascript:;">
          <i class="icon-basket"></i>
          <span class="title">Category</span>
          <span class="arrow <?= ($seg2=='add-category' || $seg2=='list-category' || $seg2=='edit-category' )?'open':'';?>"></span>
          </a>
          <ul class="sub-menu" <?= ($seg2=='add-category' || $seg2=='list-category')?'style="display:block"':'';?>>
            <li class="<?= ($seg2=='add-category')?'active':'';?>">
              <a href="<?= base_url('admin/category/add-category'); ?>">
              <i class="icon-home"></i>
              Add Category</a>
            </li>
            <li class="<?= ($seg2=='list-category')?'active':'';?>">
              <a href="<?= base_url('admin/category/list-category'); ?>">
              <i class="icon-basket"></i>
              List Category</a>
            </li>
          </ul>
        </li>
        <li class="<?= ($seg2=='add-post' || $seg2=='list-post' || $seg2=='edit-post' )?'open':'';?>">
          <a href="javascript:;">
          <i class="icon-basket"></i>
          <span class="title">Posts</span>
          <span class="arrow <?= ($seg2=='add-post' || $seg2=='list-post' || $seg2=='edit-post' )?'open':'';?>"></span>
          </a>
          <ul class="sub-menu" <?= ($seg2=='add-post' || $seg2=='list-post')?'style="display:block"':'';?>>
            <li class="<?= ($seg2=='add-post')?'active':'';?>">
              <a href="<?= base_url('post/add-post'); ?>">
              <i class="icon-home"></i>
              Add Posts</a>
            </li>
            <li class="<?= ($seg2=='list-post')?'active':'';?>">
              <a href="<?= base_url('post/list-post'); ?>">
              <i class="icon-basket"></i>
              List Posts</a>
            </li>
          </ul>
        </li>
        <li class="<?= ($seg2=='list-comments' || $seg2=='view-comment' )?'open':'';?>">
          <a href="javascript:;">
          <i class="icon-basket"></i>
          <span class="title">Comments</span>
          <span class="arrow <?= ( $seg2=='list-comments' || $seg2=='view-comment' )?'open':'';?>"></span>
          </a>
          <ul class="sub-menu" <?= ($seg2=='list-comments' || $seg2=='view-comment')?'style="display:block"':'';?>>
            <li class="<?= ($seg2=='list-comments')?'active':'';?>">
              <a href="<?= base_url('comments/list-comments'); ?>">
              <i class="icon-basket"></i>
              List Comments</a>
            </li>
          </ul>
        </li>
        <li class="<?= ($seg2=='list-contact' || $seg2=='view-contact' )?'open':'';?>">
          <a href="javascript:;">
          <i class="icon-basket"></i>
          <span class="title">Quick Contact</span>
          <span class="arrow <?= ( $seg2=='list-contact' || $seg2=='view-contact' )?'open':'';?>"></span>
          </a>
          <ul class="sub-menu" <?= ($seg2=='list-contact' || $seg2=='view-contact')?'style="display:block"':'';?>>
            <li class="<?= ($seg2=='list-contact')?'active':'';?>">
              <a href="<?= base_url('contact/list-contact'); ?>">
              <i class="icon-basket"></i>
              List Contacts</a>
            </li>
          </ul>
        </li>
        <li class="<?= ($seg2=='list-writeus' || $seg2=='view-writeus' )?'open':'';?>">
          <a href="javascript:;">
          <i class="icon-basket"></i>
          <span class="title">Writeus Contacts</span>
          <span class="arrow <?= ( $seg2=='list-writeus' || $seg2=='view-writeus' )?'open':'';?>"></span>
          </a>
          <ul class="sub-menu" <?= ($seg2=='list-writeus' || $seg2=='view-writeus')?'style="display:block"':'';?>>
            <li class="<?= ($seg2=='list-writeus')?'active':'';?>">
              <a href="<?= base_url('writeus/list-writeus'); ?>">
              <i class="icon-basket"></i>
              List Writeus</a>
            </li>
          </ul>
        </li>
      <!-- END SIDEBAR MENU -->
    </div>
  </div>
  <!-- END SIDEBAR -->