
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="widget">
                            <div class="text-left">
                                <a href="<?= base_url(); ?>"><img src="<?=base_url('assets/front/')?>images/favicon32x32.png" alt="" class="img-fluid"></a>
                                <p>GuestBlogss is a blogging/guest posting website. There are various categories to read posts about.</p>
                                <div class="social">
                                    <a target="_blank" href="https://www.facebook.com/GuestBlogss-100617495007814" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>              
                                    <a target="_blank" href="https://twitter.com/GBlogss" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                    <?php /* <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Google Plus"><i class="fa fa-google-plus"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                    */ ?>
                                </div>

                                <hr class="invis">

                                <?php /* <div class="newsletter-widget text-left">
                                    <form class="form-inline">
                                        <input type="text" class="form-control" placeholder="Enter your email address">
                                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                                    </form>
                                </div><!-- end newsletter --> */ ?>
                            </div><!-- end footer-text -->
                        </div><!-- end widget -->
                    </div><!-- end col -->

                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <h2 class="widget-title">Popular Categories</h2>
                            <div class="link-widget">
                                <ul>
                                    <?php if($footer_menu_categories){ foreach($footer_menu_categories as $menu_cats){?>
                                    <li><a href="<?= base_url().'category/'.$menu_cats->cat_slug;?>"><?= $menu_cats->cat_name;?> <span>(<?= $menu_cats->totalcatposts;?>)</span></a></li>
                                    <?php } } ?>
                                </ul>
                            </div><!-- end link-widget -->
                        </div><!-- end widget -->
                    </div><!-- end col -->

                    <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <h2 class="widget-title">Copyrights</h2>
                            <div class="link-widget">
                                <ul>
                                    <li><a href="#">About us</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="<?= base_url('write-for-us'); ?>">Guest Blogging</a></li>
                                </ul>
                            </div><!-- end link-widget -->
                        </div><!-- end widget -->
                    </div><!-- end col -->
                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <br>
                        <div class="copyright">&copy; GuestBlogss: <a href="https://GuestBlogss.com">HTML Design</a>.</div>
                    </div>
                </div>
            </div><!-- end container -->
        </footer><!-- end footer -->

        <div class="dmtop">Scroll to Top</div>
        
    </div><!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    <script src="<?=base_url();?>assets/front/js/jquery.min.js"></script>
    <script src="<?=base_url();?>assets/front/js/tether.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>assets/front/js/custom.js"></script>
    <?php if ($this->uri->segment(1)=='blog'){ ?>
        <script>
            $('#commentform').submit(function(e){
                e.preventDefault();
                $('.commentErr').remove();
                var postid= "<?= $get_post_data->post_id; ?>";
                var commentname = $('#commentname').val();
                var commentemail = $('#commentemail').val();
                var commentwebsite = $('#commentwebsite').val();
                var commenttext = $('#commenttext').val();

                var nameregex = /^[a-zA-Z0-9!@#\$%\^\&*\)\(+=._-]+$/g;
                var emailregex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                var commenterror = 0;
                if(commentname=='')
                {
                    $('#commentname').after('<p class="commentErr">Name field is Required</p>');
                    commenterror = 1;
                }
                if(commentemail=='')
                {
                    $('#commentemail').after('<p class="commentErr">Email field is required</p>');
                    commenterror = 1;
                }else if(!commentemail.match(emailregex)){
                    
                    $('#commentemail').after('<p class="commentErr">Please enter a valid email !</p>');
                    commenterror = 1;
                }
                if(commenttext=='')
                {
                    $('#commenttext').after('<p class="commentErr">Comment field is required</p>');
                    commenterror = 1;
                }
                if(commenterror == 0)
                {
                    $.ajax({
                        url:'<?=base_url().'postcomment'?>',
                        data:{commentwebsite:commentwebsite,commentname:commentname,commentemail:commentemail,commenttext:commenttext,postid:postid},
                        type:'POST',
                        dataType: 'JSON',
                        beforeSend:function(data){
                           $('#commentloader').show();
                        },
                        success:function(data){
                            if(data.success=='true'|| data.success==true){
                                $('#commentname').before('<p class="text-success bg-secondary commentsuccess">Thankyou for you comment. We will post the same afer review !</p>');
                                setTimeout(function(){ $('.commentsuccess').fadeOut();  }, 8000);
                              $('#commentform').trigger('reset');  
                            }
                            
                        },
                        complete:function(data){
                           $('#commentloader').hide();
                        },
                        error: function(data)
                          {        
                           ;
                            $('#commentloader').hide();
                          },


                    });
                }


            });
        </script>
    <?php } ?>
    <?php if ($this->uri->segment(1)=='contact-us'){ ?>
        <script>
            $('#contactform').submit(function(e){
                e.preventDefault();
                $('.contactErr').remove();
                var contactname = $('#contactname').val();
                var contactemail = $('#contactemail').val();
                var contactphone = $('#contactphone').val();
                var contactsubject = $('#contactsubject').val();
                var contactmessage = $('#contactmessage').val();

                var nameregex = /^[a-zA-Z0-9!@#\$%\^\&*\)\(+=._-]+$/g;
                var emailregex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                var contactError = 0;
                if(contactname=='')
                {
                    $('#contactname').after('<p class="contactErr">Name field is Required</p>');
                    contactError = 1;
                }
                if(contactemail=='')
                {
                    $('#contactemail').after('<p class="contactErr">Email field is required</p>');
                    contactError = 1;
                }else if(!contactemail.match(emailregex)){
                    
                    $('#contactemail').after('<p class="contactErr">Please enter a valid email !</p>');
                    contactError = 1;
                }
                if(contactmessage=='')
                {
                    $('#contactmessage').after('<p class="contactErr">Message field is required</p>');
                    contactError = 1;
                }
                if(contactphone.length !== 10 || isNaN(contactphone)){
                    $('#contactphone').after('<p class="contactErr">Phone field should have 10 digit value. </p>');
                    contactError = 1;   
                }
                if(contactsubject=='')
                {
                    $('#contactsubject').after('<p class="contactErr">Subject field is required</p>');
                    contactError = 1;
                }
                if(contactError == 0)
                {
                    $.ajax({
                        url:'<?=base_url().'save-contact';?>',
                        data:{contactname:contactname,contactemail:contactemail,contactmessage:contactmessage,contactphone:contactphone,contactsubject:contactsubject},
                        type:'POST',
                        dataType: 'JSON',
                        beforeSend:function(data){
                           $('#contactloader').show();
                        },
                        success:function(data){
                            if(data.success=='true'|| data.success==true){
                                $('#contactmessage').after('<p class="text-success bg-secondary contactsuccess">Thankyou for contacting us. We will get back to you soon !</p>');
                                setTimeout(function(){ $('.contactsuccess').fadeOut();  }, 8000);
                              $('#contactform').trigger('reset');  
                            }
                            
                        },
                        complete:function(data){
                           $('#contactloader').hide();
                        },
                        error: function(data)
                          {        
                           ;
                            $('#contactloader').hide();
                          },


                    });
                }


            });
        </script>
    <?php } ?>
    <?php if ($this->uri->segment(1)=='write-for-us'){ ?>
    <script>
            
            $('#writeusform').submit(function(e){
                e.preventDefault();
                $('.writeusErr').remove();
                var writeusname = $('#writeusname').val();
                var writeusemail = $('#writeusemail').val();
                var writeussubject = $('#writeussubject').val();
                var writeusmessage = $('#writeusmessage').val();

                var nameregex = /^[a-zA-Z0-9!@#\$%\^\&*\)\(+=._-]+$/g;
                var emailregex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                var writeusError = 0;
                if(writeusname=='')
                {
                    $('#writeusname').after('<p class="writeusErr">Name field is Required</p>');
                    writeusError = 1;
                }
                if(writeusemail=='')
                {
                    $('#writeusemail').after('<p class="writeusErr">Email field is required</p>');
                    writeusError = 1;
                }else if(!writeusemail.match(emailregex)){
                    
                    $('#writeusemail').after('<p class="writeusErr">Please enter a valid email !</p>');
                    writeusError = 1;
                }
                if(writeusmessage=='')
                {
                    $('#writeusmessage').after('<p class="writeusErr">Message field is required</p>');
                    writeusError = 1;
                }
                if(writeussubject=='')
                {
                    $('#writeussubject').after('<p class="writeusErr">Subject field is required</p>');
                    writeusError = 1;
                }
                if(writeusError == 0)
                {
                    $.ajax({
                        url:'<?=base_url().'save-writeus';?>',
                        data:{writeusname:writeusname,writeusemail:writeusemail,writeusmessage:writeusmessage,writeussubject:writeussubject},
                        type:'POST',
                        dataType: 'JSON',
                        beforeSend:function(data){
                           $('#writeusloader').show();
                        },
                        success:function(data){
                            if(data.success=='true'|| data.success==true){
                                $('#writeusmessage').after('<p class="text-success bg-secondary writeussuccess">Thankyou for contacting us. We will get back to you soon !</p>');
                                setTimeout(function(){ $('.writeussuccess').fadeOut();  }, 8000);
                              $('#writeusform').trigger('reset');  
                            }
                            
                        },
                        complete:function(data){
                           $('#writeusloader').hide();
                        },
                        error: function(data)
                          {        
                           ;
                            $('#writeusloader').hide();
                          },


                    });
                }


            });
        </script>
    <?php } ?>
</body>
</html>