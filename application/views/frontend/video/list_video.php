<?php $this->load->view('frontend/templates/header');?>
    <section id="main-body-wrapper" class="container">
        <div class="row" id="main-body">
            <div id="content" class="site-content col-md-8" role="main">



                <?php
                $mount_videos = sizeof($list_videos);
                for ($i = 0; $i < ($mount_videos + 2) / 3; $i++) { ?>
                    <div class="row">
                        <?php for ($j = 0; $j < 3; $j++) {
                            if (isset($list_videos[$i * 3 + $j])) { ?>
                                <div class="col-md-4">
                                    <div class="row">
                                        <h3><?php echo $list_videos[$i * 3 + $j]->title; ?></h3>
                                    </div>
                                    <div class="row">
                                        <img src="<?php echo base_url($list_videos[$i * 3 + $j]->image); ?>" class="img-thumbnail">
                                    </div>
                                    <div class="row">
                                        <?php echo $list_videos[$i * 3 + $j]->description; ?>
                                        <br>
                                        <a href="<?php echo base_url('view/video/' . $list_videos[$i * 3 + $j]->alias); ?>" class="btn btn-info">Xem chi tiết</a>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="col-md-4"></div>
                            <?php }
                        } ?>
                    </div>
                <?php } ?>

                <!-- phân trang -->
                <div class="row">
                    <div class="pull-right">
                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                </div>
                <div class="entry-content">


                    <div class="entry-tags">Tags: <a href="index3e36.html?tag=football-2" rel="tag">football</a>, <a href="indexb913.html?tag=goals" rel="tag">goals</a></div>

                </div>

                <footer>


                </footer>		    		<nav class="navigation post-navigation" role="navigation">
                    <ul class="pager">
                        <li class="previous">
                            <a href="index4bd3.html?p=326" rel="prev"><i class="fa fa-long-arrow-left"></i> Previous</a>				</li>

                        <li class="next"><a href="index221f.html?p=332" rel="next">Next <i class="fa fa-long-arrow-right"></i></a></li>

                    </ul><!-- .nav-links -->
                </nav><!-- .navigation -->

                <span class='st_sharethis_large' displayText='ShareThis'></span>
                <span class='st_facebook_large' displayText='Facebook'></span>
                <span class='st_twitter_large' displayText='Tweet'></span>
                <span class='st_linkedin_large' displayText='LinkedIn'></span>
                <span class='st_pinterest_large' displayText='Pinterest'></span>
                <span class='st_email_large' displayText='Email'></span>
                <span class='st_googleplus_large' displayText='Google +'></span>

                <div id="comments" class="comments-area">



                </div>
                </article><!--/#post-->

            </div>
            <!--/#content -->
            <!--Right-->
            <?php $this->load->view('frontend/templates/sidebar');?>
            <!--End Right-->
        </div>
    </section>
<?php $this->load->view('frontend/templates/footer');?>