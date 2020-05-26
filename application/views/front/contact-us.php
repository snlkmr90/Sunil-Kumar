        <div class="page-title lb single-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2><i class="fa fa-envelope-open-o bg-orange"></i> Contact us </h2>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
                            <li class="breadcrumb-item active">Contact Us</li>
                        </ol>
                    </div><!-- end col -->                    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end page-title -->

        <section class="section wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-wrapper">
                            <div class="row">
                                <div class="col-lg-5">
                                    <h4>Who we are</h4>
                                    <p>GuestBlogss is a personal blog for handcrafted, cameramade photography content, guest blogging from guests.</p>
                   
                                    <h4>How we help?</h4>
                                    <p>We have blogs written for you as per you search</p>
             
                                </div>
                                <div class="col-lg-7">
                                    <form id= "contactform" class="form-wrapper">
                                        <input id= "contactname" type="text" class="form-control" placeholder="Your name">
                                        <input id= "contactemail" type="text" class="form-control" placeholder="Email address">
                                        <input id= "contactphone" type="text" class="form-control" placeholder="Phone">
                                        <input id="contactsubject" type="text" class="form-control" placeholder="Subject">
                                        <textarea id= "contactmessage" class="form-control" placeholder="Your message"></textarea>
                                        <button type="submit" class="btn btn-primary">Send <i class="fa fa-envelope-open-o"></i></button>
                                        <span id='contactloader' style="display:none;"><img src="<?= base_url().'assets/front/images/loader.gif'?>"></span>
                                    </form>
                                </div>
                            </div>
                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>