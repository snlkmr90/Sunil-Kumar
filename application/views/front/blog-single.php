       <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v7.0&appId=2635273296713528&autoLogAppEvents=1"></script>
        <section class="section single-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-title-area text-center">
                                <ol class="breadcrumb hidden-xs-down">
                                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                                    <li class="breadcrumb-item">Blog</li>
                                    <li class="breadcrumb-item active"><?= $get_post_data->post_name; ?></li>
                                </ol>

                                <span class="color-orange"><a href="<?= base_url().'category/'.$get_post_data->cat_slug; ?>" title=""><?= $get_post_data->cat_name; ?></a></span>

                                <h3><?= $get_post_data->post_name; ?></h3>

                                <div class="blog-meta big-meta">
                                    <small><a href="<?= 'category/'.$get_post_data->post_slug; ?>" title=""><?= date('d, M Y', strtotime($get_post_data->post_created_at)); ?></a></small>
                                    <small><a href="tech-author.html" title="">by Admin</a></small>
                                    <small><a href="#" title=""><i class="fa fa-eye"></i> <?= $view_count; ?></a></small>
                                </div><!-- end meta -->

                                <div class="post-sharing">
                                    <ul class="list-inline">
                                        <li>
                                            <div class="fb-share-button" data-href="<?= base_url(uri_string()); ?>" data-layout="button_count" data-size="large">
                                        <a class="fb-button btn btn-primary" target="_blank" href="https://www.facebook.com/sharer/sharer.php?app_id=2610053399228391&sdk=joey&u=<?=base_url(uri_string());?>&display=popup&ref=plugin&src=share_button" onclick="window.open(this.href,'facebook-share-dialog','width=626,height=436');return false;"><i class="fa fa-facebook"></i><span class="down-mobile">Share on Facebook</span></a>
                                       </div>

                                        </li>
                                        <li>
                                            <a class="tw-button btn btn-primary" href="https://twitter.com/share?url=<?=base_url(uri_string());?>&text=<?= $get_post_data->post_name; ?>" class="twitter" onclick="window.open(this.href,'twitsharehome','width=626,height=436'); return false;"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a>
                                        </li>
                                    </ul>
                                </div><!-- end post-sharing -->
                            </div><!-- end title -->

                            <div class="single-post-media">
                                <img src="upload/tech_menu_08.jpg" alt="" class="img-fluid">
                            </div><!-- end media -->

                            <div class="blog-content">
                                <?= $get_post_data->post_description; ?>
                            </div><!-- end content -->

                            <?php /*<div class="blog-title-area">
                                <div class="tag-cloud-single">
                                    <span>Tags</span>
                                    <small><a href="#" title="">lifestyle</a></small>
                                    <small><a href="#" title="">colorful</a></small>
                                    <small><a href="#" title="">trending</a></small>
                                    <small><a href="#" title="">another tag</a></small>
                                </div><!-- end meta -->

                                <div class="post-sharing">
                                    <ul class="list-inline">
                                        <li>
                                            <div class="fb-share-button" data-href="<?= base_url(uri_string()); ?>" data-layout="button_count" data-size="large">
                                        <a class="fb-button btn btn-primary" target="_blank" href="https://www.facebook.com/sharer/sharer.php?app_id=2610053399228391&sdk=joey&u=<?=base_url(uri_string());?>&display=popup&ref=plugin&src=share_button" onclick="window.open(this.href,'facebook-share-dialog','width=626,height=436');return false;"><i class="fa fa-facebook"></i><span class="down-mobile">Share on Facebook</span></a>
                                       </div>

                                        </li>
                                        <li>
                                            <a class="tw-button btn btn-primary" href="https://twitter.com/share?url=<?=base_url(uri_string());?>&text=<?= $get_post_data->post_name; ?>" class="twitter" onclick="window.open(this.href,'twitsharehome','width=626,height=436'); return false;"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a>
                                        </li>
                                    </ul>
                                </div><!-- end post-sharing -->
                            </div><!-- end title --> 

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="banner-spot clearfix">
                                        <div class="banner-img">
                                            <img src="upload/banner_01.jpg" alt="" class="img-fluid">
                                        </div><!-- end banner-img -->
                                    </div><!-- end banner -->
                                </div><!-- end col -->
                            </div><!-- end row --> */ ?>

                            <hr class="invis1">

                            <div class="custombox prevnextpost clearfix">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="blog-list-widget">
                                            <div class="list-group">
                                                <a href="<?= $get_prev_post->post_slug; ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                                    <div class="w-100 justify-content-between text-right">
                                                        <?php if(isset($get_prev_post->post_feat_img) && file_exists('./assets/uploads/255x212/'.$get_prev_post->post_feat_img)){ ?>
                                                        <img src="<?php echo base_url().'/assets/uploads/255x212/'.$get_prev_post->post_feat_img; ?>" alt="" class="img-fluid float-right">
                                                        <?php } ?>
                                                        <h5 class="mb-1"><?= $get_prev_post->post_name; ?></h5>
                                                        <small>Prev Post</small>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div><!-- end col -->

                                    <div class="col-lg-6">
                                        <div class="blog-list-widget">
                                            <div class="list-group">
                                                <a href="<?= $get_next_post->post_slug; ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                                    <div class="w-100 justify-content-between">
                                                        <?php if(isset($get_next_post->post_feat_img) && file_exists('./assets/uploads/255x212/'.$get_next_post->post_feat_img)){ ?>
                                                        <img src="<?php echo base_url().'/assets/uploads/255x212/'.$get_next_post->post_feat_img; ?>" alt="" class="img-fluid float-left">
                                                        <?php } ?>
                                                        <h5 class="mb-1"><?= $get_next_post->post_name; ?></h5></h5>
                                                        <small>Next Post</small>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end author-box -->

                            <?php /*<hr class="invis1">

                            <div class="custombox authorbox clearfix">
                                <h4 class="small-title">About author</h4>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <img src="upload/author.jpg" alt="" class="img-fluid rounded-circle"> 
                                    </div><!-- end col -->

                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                        <h4><a href="#">Jessica</a></h4>
                                        <p>Quisque sed tristique felis. Lorem <a href="#">visit my website</a> amet, consectetur adipiscing elit. Phasellus quis mi auctor, tincidunt nisl eget, finibus odio. Duis tempus elit quis risus congue feugiat. Thanks for stop Tech Blog!</p>

                                        <div class="topsocial">
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Website"><i class="fa fa-link"></i></a>
                                        </div><!-- end social -->

                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end author-box --> */?>

                            <hr class="invis1">

                            <div class="custombox clearfix">
                                <h4 class="small-title">You may also like</h4>
                                <div class="row">
                                    <?php if($post_you_may_likes){ foreach($post_you_may_likes as $post_you_may_like){?> 
                                    <div class="col-lg-6">
                                        <div class="blog-box">
                                            <div class="post-media">
                                                <a href="<?= $post_you_may_like->post_slug; ?>" title="">
                                                    <?php if(isset($post_you_may_like->post_feat_img) && file_exists('./assets/uploads/255x212/'.$post_you_may_like->post_feat_img)){ ?>
                                                        <img src="<?php echo base_url().'/assets/uploads/825x474/'.$post_you_may_like->post_feat_img; ?>" alt="" class="img-fluid">
                                                        <?php } ?>
                                                    <div class="hovereffect">
                                                        <span class=""></span>
                                                    </div><!-- end hover -->
                                                </a>
                                            </div><!-- end media -->
                                            <div class="blog-meta">
                                                <h4><a href="<?= $post_you_may_like->post_slug; ?>" title=""><?= $post_you_may_like->post_name; ?></a></h4>
                                                <small><a href="<?= base_url().'category/'.$post_you_may_like->cat_slug; ?>" title=""><?= $post_you_may_like->cat_name; ?></a></small>
                                                <small><a href="<?= base_url().'category/'.$post_you_may_like->cat_slug; ?>" title=""><?= date('d, M Y', strtotime($post_you_may_like->post_created_at)); ?></a></small>
                                            </div><!-- end meta -->
                                        </div><!-- end blog-box -->
                                    </div><!-- end col -->
                                <?php } } ?>
                                </div><!-- end row -->
                            </div><!-- end custom-box -->

                            <hr class="invis1">

                            <div class="custombox clearfix">
                                <h4 class="small-title"><?= $comment_count->totalcomments; ?> Comments</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="comments-list">
                                            <?php if($comments){ foreach($comments as $comment){ ?>
                                            <div class="media">
                                                <div class="media-body">
                                                    <h4 class="media-heading user_name"><?= $comment->comment_name; ?> <small>
                                                    <?php

                                                    $time_ago = strtotime($comment->comment_posted_at);
                                                    $cur_time   = time();
                                                    $time_elapsed   = $cur_time - $time_ago;
                                                    $seconds    = $time_elapsed ;
                                                    $minutes    = round($time_elapsed / 60 );
                                                    $hours      = round($time_elapsed / 3600);
                                                    $days       = round($time_elapsed / 86400 ); 
                                                    echo $days.'days ago.';
                                                    ?></small></h4>
                                                    <p><?= $comment->comment_text; ?></p>
                                                    <a href="#commentform" class="btn btn-primary btn-sm">Reply</a>
                                                </div>
                                            </div>
                                        <?php } }else{?>
                                            <p>No comments available on post yet ..!</p>
                                        <?php } ?>
                                        </div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end custom-box -->

                            <hr class="invis1">

                            <div class="custombox clearfix">
                                <h4 class="small-title">Leave a Reply</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form id= "commentform" class="form-wrapper">
                                            <input id="commentname" type="text" class="form-control" placeholder="Your name">
                                            <input id="commentemail" type="text" class="form-control" placeholder="Email address">
                                            <input id="commentwebsite" type="text" class="form-control" placeholder="Website">
                                            <textarea id="commenttext" class="form-control" placeholder="Your comment"></textarea>
                                            <button id="postcomment" class="btn btn-primary">Submit Comment</button>
                                            <span id='commentloader' style="display:none;"><img src="<?= base_url().'assets/front/images/loader.gif'?>"></span>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->

                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="sidebar">
                            <div class="widget">
                                <div class="banner-spot clearfix">
                                    <div class="banner-img">
                                        <img src="upload/banner_07.jpg" alt="" class="img-fluid">
                                    </div><!-- end banner-img -->
                                </div><!-- end banner -->
                            </div><!-- end widget -->

                            <div class="widget">
                                <h2 class="widget-title">Popular Posts</h2>
                                <div class="blog-list-widget">
                                    <div class="list-group">
                                        <a href="tech-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <img src="upload/tech_blog_08.jpg" alt="" class="img-fluid float-left">
                                                <h5 class="mb-1">5 Beautiful buildings you need..</h5>
                                                <small>12 Jan, 2016</small>
                                            </div>
                                        </a>

                                        <a href="tech-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <img src="upload/tech_blog_01.jpg" alt="" class="img-fluid float-left">
                                                <h5 class="mb-1">Let's make an introduction for..</h5>
                                                <small>11 Jan, 2016</small>
                                            </div>
                                        </a>

                                        <a href="tech-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 last-item justify-content-between">
                                                <img src="upload/tech_blog_03.jpg" alt="" class="img-fluid float-left">
                                                <h5 class="mb-1">Did you see the most beautiful..</h5>
                                                <small>07 Jan, 2016</small>
                                            </div>
                                        </a>
                                    </div>
                                </div><!-- end blog-list -->
                            </div><!-- end widget -->

                            <div class="widget">
                                <div class="banner-spot clearfix">
                                    <div class="banner-img">
                                        <img src="upload/banner_03.jpg" alt="" class="img-fluid">
                                    </div><!-- end banner-img -->
                                </div><!-- end banner -->
                            </div><!-- end widget -->
                        </div><!-- end sidebar -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>