        <section class="section first-section">
            <div class="container-fluid">
                <div class="masonry-blog clearfix">
                    <?php if($featured_posts){ foreach($featured_posts as $featured_post){?> 
                    <div class="second-slot">
                        <div class="masonry-box post-media">
                            <?php if(isset($featured_post->post_feat_img) && file_exists('./assets/uploads/255x212/'.$featured_post->post_feat_img)){ ?>
                             <img src="<?php echo base_url().'assets/uploads/325x270/'.$featured_post->post_feat_img;?>" alt="" class="img-fluid">
                         <?php } ?>
                             <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-orange"><a href="<?= base_url().'category/'.$featured_post->cat_slug; ?>" title=""><?= $featured_post->cat_name; ?></a></span>
                                        <h4><a href="<?= 'blog/'.$featured_post->post_slug; ?>" title=""><?= $featured_post->post_name; ?></a></h4>
                                        <small><a href="<?= 'blog/'.$featured_post->post_slug; ?>" title=""><?= date('d, M Y', strtotime($featured_post->post_created_at)); ?></a></small>
                                        <small><a href="tech-author.html" title="">by admin</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                             </div><!-- end shadow -->
                        </div><!-- end post-media -->
                    </div><!-- end second-side -->
                <?php } } ?>

            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-top clearfix">
                                <h4 class="pull-left">Blog Posts <a href="#"><i class="fa fa-newspaper-o"></i></a></h4>
                            </div><!-- end blog-top -->

                            <div class="blog-list clearfix">
                                <?php if($list_blog_posts){ foreach($list_blog_posts as $list_blog_post){ ?>
                                <hr class="invis">
                                <div class="blog-box row">
                                    <div class="col-md-4">
                                        <div class="post-media">
                                            <a href="<?= 'blog/'.$list_blog_post->post_slug; ?>" title="">
                                                <?php if(isset($list_blog_post->post_feat_img) && file_exists('./assets/uploads/255x212/'.$list_blog_post->post_feat_img)){ ?>
                                                <img src="<?php echo base_url().'/assets/uploads/255x212/'.$list_blog_post->post_feat_img; ?>" alt="" class="img-fluid">
                                            <?php } ?>
                                                <div class="hovereffect"></div>
                                            </a>
                                        </div><!-- end media -->
                                    </div><!-- end col -->

                                    <div class="blog-meta big-meta col-md-8">
                                        <h4><a href="<?= 'blog/'.$list_blog_post->post_slug; ?>" title=""><?= $list_blog_post->post_name; ?></a></h4>
                                        <p><?php if(strlen(strip_tags(htmlspecialchars_decode($list_blog_post->post_description))) > 200){echo substr(strip_tags(htmlspecialchars_decode($list_blog_post->post_description)), 0,200).'..[...]';}else{ echo htmlspecialchars_decode(strip_tags($list_blog_post->post_description)); } ?></p>
                                        <small class="firstsmall"><a class="bg-orange" href="<?= base_url().'category/'.$list_blog_post->cat_slug; ?>" title=""><?= $list_blog_post->cat_name; ?></a></small>
                                        <small><a href="<?= 'blog/'.$list_blog_post->post_slug; ?>" title=""><?= date('d, M Y', strtotime($list_blog_post->post_created_at)); ?></a></small>
                                        <small><a href="tech-author.html" title="">by Admin</a></small>
                                        <small><a href="<?= 'blog/'.$list_blog_post->post_slug; ?>" title=""><i class="fa fa-eye"></i> <?= $list_blog_post->viewcount; ?></a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                            <?php } } ?>

                            </div><!-- end blog-list -->
                        </div><!-- end page-wrapper -->

                        <hr class="invis">

                        <div class="row">
                            <div class="col-md-12">
                                <nav aria-label="Page navigation">
                                <?= $links; ?>
                                </nav>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->

                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="sidebar">
                            <?php /*<div class="widget">
                                <div class="banner-spot clearfix">
                                    <div class="banner-img">
                                        <img src="<?=base_url();?>assets/front/upload/banner_07.jpg" alt="" class="img-fluid">
                                    </div><!-- end banner-img -->
                                </div><!-- end banner -->
                            </div><!-- end widget --> 

                            <div class="widget">
                                <h2 class="widget-title">Recent Reviews</h2>
                                <div class="blog-list-widget">
                                    <div class="list-group">
                                        <a href="tech-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <img src="<?=base_url();?>assets/front/upload/tech_blog_02.jpg" alt="" class="img-fluid float-left">
                                                <h5 class="mb-1">Banana-chip chocolate cake recipe..</h5>
                                                <span class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </span>
                                            </div>
                                        </a>

                                        <a href="tech-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <img src="<?=base_url();?>assets/front/upload/tech_blog_03.jpg" alt="" class="img-fluid float-left">
                                                <h5 class="mb-1">10 practical ways to choose organic..</h5>
                                                <span class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </span>
                                            </div>
                                        </a>

                                        <a href="tech-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 last-item justify-content-between">
                                                <img src="<?=base_url();?>assets/front/upload/tech_blog_07.jpg" alt="" class="img-fluid float-left">
                                                <h5 class="mb-1">We are making homemade ravioli..</h5>
                                                <span class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div><!-- end blog-list -->
                            </div><!-- end widget -->
                            */?>
                            <div class="widget">
                                <h2 class="widget-title">Follow Us</h2>

                                <div class="row text-center">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <a target="_blank" href="https://www.facebook.com/GuestBlogss-100617495007814" class="social-button facebook-button">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <a target="_blank" href="https://twitter.com/GBlogss" class="social-button twitter-button">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </div>
                                </div>
                            </div><!-- end widget -->

                            <?php /*<div class="widget">
                                <div class="banner-spot clearfix">
                                    <div class="banner-img">
                                        <img src="<?=base_url();?>assets/front/upload/banner_03.jpg" alt="" class="img-fluid">
                                    </div><!-- end banner-img -->
                                </div><!-- end banner -->
                            </div><!-- end widget --> */ ?>
                        </div><!-- end sidebar -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>