     <!-- Start Home Banner -->
    <section id="home_banner" class="home-slide" style="background-image: url('assets/img/slide-bg.jpg'); background-size: cover; background-position: 50% 50%;background-attachment: fixed;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="mt-250"></div>
                    <h3><?php echo $site['title_1'];?></h3>
                    <p><?php echo $site['text_1'];?></p>
                    <a class="btn btn-default" href="<?php echo base_url('register');?>" role="button">Register</a>
                </div>
                <div class="col-md-6">
                    <div class="mt-200 hidden-sm hidden-xs"></div>
                    <img src="<?php echo base_url('assets/upload/image/'.$site['img_1']) ?>" class="img-responsive center-block" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- End Home Banner -->
</header>
<!-- End Header -->
 <!-- Start About Section -->
    <section id="about" class="padding-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12 section-heade text-center">
                    <h3>Tentang <?php echo $site['nameweb'];?></h3>
                    <div class="space-25"></div>
                    <div class="space-50"></div>
                </div>
                <?php foreach ($about as $about){ ?>
                <div class="col-md-4 text-center about-box" data-aos="fade-up" data-aos-delay="200">
                    <i class="fa fa-<?php echo $about['icon'];?> fa-5x"></i>
                    <h4><?php echo $about['title'];?></h4>
                    <p><?php echo $about['text'];?></p>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- End About Section -->
    <!-- Start Features Section -->
    <section id="features" class="pt-100" style="background-image: url(''); background-size: cover; background-position: 50% 50%;background-attachment: fixed;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 section-heade white text-center">
                    <h3>Fitur <?php echo $site['nameweb'];?></h3>
                    <div class="space-25"></div>
                    <div class="space-50"></div>
                </div>
                <div class="col-md-4 text-right">
                    <div class="features-wrapper right-icon">
                        <ul class="list-unstyled">
                            <li>
                                <div class="single-feature" data-aos="fade-right" data-aos-delay="200">
                                    <div class="features-icon">
                                        <img src="../d33wubrfki0l68.cloudfront.net/117cc79cd0b3b0342b990d60e138871449341d3b/6ae08/assets/img/icon-4.png" class="img-responsive" alt="">
                                    </div>
                                    <div class="features-details">
                                        <h5><?php echo $site['title_2'];?></h5>
                                        <p><?php echo $site['text_2'];?></p>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li>
                                <div class="single-feature" data-aos="fade-right" data-aos-delay="400">
                                    <div class="features-icon">
                                        <img src="../d33wubrfki0l68.cloudfront.net/17acc8c9820ffd66a36fc1ebc1c14ce8e3f970ff/1ceb2/assets/img/icon-5.png" class="img-responsive" alt="">
                                    </div>
                                    <div class="features-details">
                                        <h5><?php echo $site['title_3'];?></h5>
                                        <p><?php echo $site['text_3'];?></p>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li>
                                <div class="single-feature" data-aos="fade-right" data-aos-delay="600">
                                    <div class="features-icon">
                                        <img src="../d33wubrfki0l68.cloudfront.net/a05578b9ab2842ee97aad02abda67222fa9c114c/5f5f8/assets/img/icon-6.png" class="img-responsive" alt="">
                                    </div>
                                    <div class="features-details">
                                        <h5><?php echo $site['title_4'];?></h5>
                                        <p><?php echo $site['text_4'];?></p>>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 text-center about-box hidden-sm hidden-xs" data-aos="fade-up">
                    <img src="<?php echo base_url('assets/upload/image/'.$site['img_2']);?>" class="img-responsive center-block" alt="">
                </div>
                <div class="col-md-4 text-left about-box">
                    <div class="features-wrapper left-icon">
                        <ul class="list-unstyled">
                            <li>
                                <div class="single-feature" data-aos="fade-left" data-aos-delay="200">
                                    <div class="features-icon">
                                        <img src="../d33wubrfki0l68.cloudfront.net/31aceeebdb14fb5e8b7af60ef487a442ced7b2b1/59eb3/assets/img/icon-7.png" class="img-responsive" alt="">
                                    </div>
                                    <div class="features-details">
                                        <h5><?php echo $site['title_5'];?></h5>
                                        <p><?php echo $site['text_5'];?></p>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li>
                                <div class="single-feature" data-aos="fade-left" data-aos-delay="400">
                                    <div class="features-icon">
                                        <img src="../d33wubrfki0l68.cloudfront.net/a474c8c17261c9cf0b809adf43c3117e2723fd20/7d680/assets/img/icon-8.png" class="img-responsive" alt="">
                                    </div>
                                    <div class="features-details">
                                        <h5><?php echo $site['title_6'];?></h5>
                                        <p><?php echo $site['text_6'];?></p>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li>
                                <div class="single-feature" data-aos="fade-left" data-aos-delay="600">
                                    <div class="features-icon">
                                        <img src="../d33wubrfki0l68.cloudfront.net/de71b8040eb56c465f44d8311085ae9488039fda/4adf5/assets/img/icon-9.png" class="img-responsive" alt="">
                                    </div>
                                    <div class="features-details">
                                        <h5><?php echo $site['title_7'];?></h5>
                                        <p><?php echo $site['text_7'];?></p>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Start Features Section -->
    <!-- Start One Feature Section -->
    <section id="event" class="padding-100">
        <div class="container">
            <div class="row">    
                <div class="col-md-12 section-heade text-center">
                    <h3>Event <?php echo $site['nameweb'];?></h3>
                    <div class="space-25"></div>
                    <div class="space-50"></div>
                </div>
    <?php 
        if (count($event)){
        $i = 0;
        foreach ($event as $event){
        if($i==2) break;
        if(count($event['event_name'])==$i+1) { 
     ?>
    <section class="one-feature pt-100">
        <div class="container">
            <div class="row">
                <div class="col-md-6" data-aos="fade-right" data-aos-delay="600">
                    <img src="<?php echo base_url('assets/upload/image/'.$event['cover_url']);?>" class="img-responsive center-block" alt="">
                </div>
                <div class="col-md-6" data-aos="fade-left" data-aos-delay="200">
                    <h2><?php echo $event['event_name'];?></h2>
                    <p><?php echo $event['description'];?></p>
                    <a class="btn btn-default colored" href="<?php echo base_url('event/detail/'.$event['slug_event']);?>" role="button">Lihat Selengkapnya</a>
                </div>
            </div>
        </div>
    </section>
    <?php }else{ ?>
    <!-- End One Feature Section -->
    <!-- Start One Feature Section -->
    <section class="one-feature padding-100">
        <div class="container">
            <div class="row">
                <div class="col-md-6" data-aos="fade-right" data-aos-delay="200">
                    <h2><?php echo $event['event_name'];?></h2>
                    <p><?php echo $event['description'];?></p>
                    <a class="btn btn-default colored" href="<?php echo base_url('event/detail/'.$event['slug_event']);?>" role="button">Lihat Selengkapnya</a>
                </div>
                <div class="col-md-6" data-aos="fade-left" data-aos-delay="600">
                    <img src="<?php echo base_url('assets/upload/image/'.$event['cover_url']);?>" class="img-responsive center-block" alt="">
                </div>
            </div>
        </div>
    </section>
    <?php } $i++; }} ?>
    <div class="col-md-12 text-center">
        <div class="space-50"></div>
        <a class='btn btn-default colored' href='<?php echo base_url('event');?>' role='button'>Lihat Semua Event</a>
    </div>    
    </div>
    </div>
    </section>
    <!-- End One Feature Section -->
    <!-- Start Testimonial Section -->
    <section id="testimonial" class="padding-100" style="background-image: url('assets/img/testimonial-bg.jpg'); background-size: cover; background-position: 50% 50%;background-attachment: fixed;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 section-heade white text-center">
                    <h3>testimonial</h3>
                    <div class="space-25"></div>
                    <div class="space-50"></div>
                </div>
                <div class="col-md-8 col-md-offset-2">
                    <div class="testimonial-slider owl-carousel owl-theme">
                    <?php foreach ($testi as $testi) { ?>
                        <div class="item">
                            <div class="col-md-4 text-center">
                                <div class="client-img center-block">
                                    <img src="<?php echo base_url('assets/upload/image/'.$testi['photo']);?>" class="img-responsive center-block" alt="">
                                </div>
                                <h4><?php echo $testi['testi_name'];?></h4>
                                <div class="client-rate">
                                    <ul class="list-inline">
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <p><?php echo $testi['testi_description'];?></p>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Testimonial Section -->
    <!-- Start Price Section 
    <section id="price" class="padding-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12 section-heade text-center">
                    <h3>Paket</h3>
                    <div class="space-25"></div>
                    <div class="space-50"></div>
                </div>
                <div class="col-md-4">
                    <div class="price-table text-center">
                        <div class="space-50"></div>
                        <h4>Starter</h4>
                        <div class="space-50"></div>
                        <div class="cost">
                            <h3>20<span>$</span></h3>
                        </div>
                        <div class="space-50"></div>
                        <ul class="list-unstyled">
                            <li>100 MB Disk Space</li>
                            <li>2 Subdomains</li>
                            <li>5 Email Accounts</li>
                            <li>Webmail Support</li>
                            <li>Customer Support 24/7</li>
                        </ul>
                        <div class="space-50"></div>
                        <a class="btn btn-default blue" href="#" role="button">Read More</a>
                        <div class="space-50"></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="price-table text-center feature">
                        <div class="space-50"></div>
                        <h4>basic</h4>
                        <div class="space-50"></div>
                        <div class="cost">
                            <h3>30<span>$</span></h3>
                        </div>
                        <div class="space-50"></div>
                        <ul class="list-unstyled">
                            <li>100 MB Disk Space</li>
                            <li>2 Subdomains</li>
                            <li>5 Email Accounts</li>
                            <li>Webmail Support</li>
                            <li>Customer Support 24/7</li>
                        </ul>
                        <div class="space-50"></div>
                        <a class="btn btn-default colored" href="#" role="button">Read More</a>
                        <div class="space-50"></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="price-table text-center">
                        <div class="space-50"></div>
                        <h4>unlimited</h4>
                        <div class="space-50"></div>
                        <div class="cost">
                            <h3>40<span>$</span></h3>
                        </div>
                        <div class="space-50"></div>
                        <ul class="list-unstyled">
                            <li>100 MB Disk Space</li>
                            <li>2 Subdomains</li>
                            <li>5 Email Accounts</li>
                            <li>Webmail Support</li>
                            <li>Customer Support 24/7</li>
                        </ul>
                        <div class="space-50"></div>
                        <a class="btn btn-default blue" href="#" role="button">Read More</a>
                        <div class="space-50"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Price Section -->
    <!-- Start FAQ Section -->
    <section id="faq" class="padding-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12 section-heade text-center">
                    <h3>faq</h3>
                    <div class="space-25"></div>
                    <div class="space-50"></div>
                </div>
                <div class="col-md-6" data-aos="fade-right" data-aos-delay="200">
                    <div class="space-50"></div>
                    <div class="space-50"></div>
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <?php 
                            if (count($faq)){
                            $i = 0;
                            foreach ($faq as $faq){
                            if(count($faq['faq_name'])==$i+1) { 
                         ?>
                        <div class="panel">
                            <div class="panel-heading" role="tab" id="heading_1">
                                <h4 class="panel-title">
                                    <a class="" role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $faq['faq_id'];?>" aria-expanded="true" aria-controls="<?php echo $faq['faq_id'];?>">
                                <?php echo $faq['faq_name'];?>
                            </a>
                                </h4>
                            </div>
                            <div id="<?php echo $faq['faq_id'];?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading_1">
                                <div class="panel-body">
                                    <?php echo $faq['faq_description'];?>
                                </div>
                            </div>
                        </div>
                        <?php }else{ ?>
                        <div class="panel">
                            <div class="panel-heading" role="tab" id="heading_2">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $faq['faq_id'];?>" aria-expanded="true" aria-controls="<?php echo $faq['faq_id'];?>">
                                <?php echo $faq['faq_name'];?>
                            </a>
                                </h4>
                            </div>
                            <div id="<?php echo $faq['faq_id'];?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_2">
                                <div class="panel-body">
                                    <?php echo $faq['faq_description'];?>
                                </div>
                            </div>
                        </div>
                        <?php }$i++;}} ?>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-left" data-aos-delay="600">
                    <img src="<?php echo base_url('assets/upload/image/'.$site['img_faq']);?>" class="img-responsive center-block" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- End FAQ Section -->
    <!-- Start Contact Section -->
    <section id="contact" class="padding-100" style="background-image: url('assets/img/contact-bg.jpg'); background-size: cover; background-position: 50% 50%;background-attachment: fixed;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 section-heade white text-center">
                    <h3>Kontak Kami</h3>
                    <div class="space-25"></div>
                    <div class="space-50"></div>
                </div>
                <?php
                if($this->session->flashdata('sukses')) { 
                    echo '<body onload="success()">';                                
                } 
                ?>
                <script>
                function success() {
                    alert("Pesan berhasil dikirim");
                }
                </script>
                <div class="col-md-8">
                    <form method='post' action="<?php echo base_url('contact');?>">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="sender" type="text" id="yourname" placeholder="Enter Your Name" required>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" id="youremail" placeholder="Enter Your Email" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="subject" class="form-control" id="yoursubject" placeholder="Enter Your Subject" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" name="messages" id="yourmessage" rows="6" placeholder="Enter Your Message" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-default center-block">submit</button>
                    </form>
                </div>
                <div class="col-md-4">
                    <ul class="list-unstyled contact-info">      
                        <li>
                            <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                            <div class="text"><?php echo $site['phone_number'];?></div>
                        </li>
                        <li>
                            <div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                            <div class="text"><a href="mailto:mail@appy.com"><?php echo $site['email'];?></a></div>
                        </li>
                    </ul>
                    <ul class="list-inline social-icons">
                        <li class="facebook"><a href="<?php echo $site['facebook'];?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li class="twitter"><a href="<?php echo $site['facebook'];?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li class="instagram"><a href="<?php echo $site['instagram'];?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>                        

                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Section -->