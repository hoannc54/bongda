<?php $this->load->view('frontend/templates/header');?>
<section id="main-body-wrapper" class="container">
    <div class="row" id="main-body">
        <div id="content" class="site-content col-md-8" role="main">
            <ul class="breadcrumb">
                <li>
                    <a href="#" class="breadcrumb_home">Home</a>
                </li>
                <li class="active">
                    <a href="">NFL</a>
                    <span class="raquo">/</span> McNulty: Arsenal&#8217;s draw shows need to goal
                </li>
            </ul>

            <article id="post-330" class="post-330 post type-post status-publish format-standard has-post-thumbnail hentry category-nfl tag-football-2 tag-goals">
               <?php
               foreach ($list_match as $lm){?>
                   <a href="<?php echo base_url('view/guess/') . "/".$lm['match_id']; ?>" class="btn btn-info"><?php echo $lm['match_name'];?></a>
                    </br>
                    </br>
               <?php } ?>
                <?php
                foreach ($match as $m){?>
                  
                    <?php
                    $team1 = $m['team1'];
                    $team2 = $m['team2'];
                    $data['ngay'] = $m['date'];
                    $data['thang'] = $m['month'];
                    $data['nam'] = $m['year'];
                    ?>
               <?php } ?>

                <div class="entry-content">


                    <div class="entry-tags">Tags: <a href="index3e36.html?tag=football-2" rel="tag">football</a>, <a href="indexb913.html?tag=goals" rel="tag">goals</a></div>

                </div>

                <footer>


                </footer>                   <nav class="navigation post-navigation" role="navigation">
                    <ul class="pager">
                        <li class="previous">
                            <a href="index4bd3.html?p=326" rel="prev"><i class="fa fa-long-arrow-left"></i> Previous</a>                </li>

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