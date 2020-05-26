<?php 
$ci = & get_instance();
$ci->load->model("blog_model");
$popular_posts=$this->blog_model->get_popular_posts();
?>

<div class="widget">
    <h2 class="widget-title">Popular Posts</h2>
    <div class="blog-list-widget">
        <div class="list-group">
            <?php if($popular_posts){foreach($popular_posts as $pop_post){?> 
            <a href="<?= base_url().'blog/'.$pop_post->post_slug; ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="w-100 justify-content-between popular-post-border">
                    <?php if(isset($pop_post->post_feat_img) && file_exists('./assets/uploads/55X46/'.$pop_post->post_feat_img)){ ?>
                            <img src="<?php echo base_url().'/assets/uploads/55X46/'.$pop_post->post_feat_img; ?>" alt="" class="img-fluid float-left">
                            <?php } ?>
                    <h5 class="mb-1"><?php if(strlen(strip_tags(htmlspecialchars_decode($pop_post->post_name))) > 20){echo substr(strip_tags(htmlspecialchars_decode($pop_post->post_name)), 0,20).'..[...]';}else{ echo htmlspecialchars_decode(strip_tags($pop_post->post_name)); } ?>

                    </h5>
                    <small><?= date('d, M Y', strtotime($pop_post->post_created_at)); ?></small>
                </div>
            </a>
        <?php } } ?>
        </div>
    </div><!-- end blog-list -->
</div><!-- end widget -->