<?php $this->load->view('frontend/templates/header');?>
<section id="main-body-wrapper" class="container">
    <div class="row" id="main-body">

<!--Left-->
        <div class="col-md-8">
            <div id="post-26" class="clearfix post-26 page type-page status-publish hentry">
                <div>
                    <div id="featured-slider" class="loading">
                        <?php $this->load->view('frontend/home/parties/sliders')?>
                    <!--/#featured-slider-->
                    <div class="news-block news-latest"><h2 class="title">Latest News</h2>
                        <div id="carousel-latest322" class="carousel slide">
                            <ol class="carousel-indicators">
                                <li data-target='#carousel-latest322' data-slide-to='0' class='active'></li>
                                <li data-target='#carousel-latest322' data-slide-to='1'></li>
                                <li data-target='#carousel-latest322' data-slide-to='2'></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="row">
                                    <?php for($i = 0; $i < 3; $i++):?>
                                        <div class="col-xs-6 col-sm-4">
                                            <div class="item-content">
                                                <div class="entry-image"><a href="index6595.html?p=459"><img width="296"
                                                                                                             height="164"
                                                                                                             src="<?php echo base_url();?>assets/frontend/wp-content/uploads/2014/01/<?php echo $lastest_news[$i]->img;?>"
                                                                                                             class="img-responsive wp-post-image"
                                                                                                             alt="01"
                                                                                                             sizes="(max-width: 296px) 100vw, 296px"/></a>
                                                    <p class="entry-category"><a href="index81ea.html?cat=3"
                                                                                 rel="category">Football</a></p>

                                                </div>
                                                <h3 class="entry-title"><a href="<?php echo base_url('view/article/' . $lastest_news[$i]->alias); ?>">
                                                        <?php echo $lastest_news[$i]->title;?></a></h3>
                                                <div class="entry-meta small"><i class="fa fa-clock-o"></i> 1:40 pm <i
                                                        class="fa fa-calendar"></i> 25 Nov 2013
                                                </div>
                                            </div>
                                        </div>
                                    <?php endfor;?>
                                    </div>
                                </div>

                                <div class="item ">
                                    <div class="row">
                                        <?php for($i = 3; $i < 6; $i++):?>
                                            <div class="col-xs-6 col-sm-4">
                                                <div class="item-content">
                                                    <div class="entry-image"><a href="index6595.html?p=459"><img width="296"
                                                                                                                 height="164"
                                                                                                                 src="<?php echo base_url();?>assets/frontend/wp-content/uploads/2014/01/<?php echo $lastest_news[$i]->img;?>"
                                                                                                                 class="img-responsive wp-post-image"
                                                                                                                 alt="01"
                                                                                                                 sizes="(max-width: 296px) 100vw, 296px"/></a>
                                                        <p class="entry-category"><a href="index81ea.html?cat=3"
                                                                                     rel="category">Football</a></p>

                                                    </div>
                                                    <h3 class="entry-title"><a href="<?php echo base_url('view/article/' . $lastest_news[$i]->alias); ?>">
                                                            <?php echo $lastest_news[$i]->title;?></a></h3>
                                                    <div class="entry-meta small"><i class="fa fa-clock-o"></i> 1:40 pm <i
                                                            class="fa fa-calendar"></i> 25 Nov 2013
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endfor;?>

                                    </div>
                                </div>
                                <div class="item ">
                                    <div class="row">
                                        <?php for($i = 6; $i < 9; $i++):?>
                                            <div class="col-xs-6 col-sm-4">
                                                <div class="item-content">
                                                    <div class="entry-image"><a href="index6595.html?p=459"><img width="296"
                                                                                                                 height="164"
                                                                                                                 src="<?php echo base_url();?>assets/frontend/wp-content/uploads/2014/01/<?php echo $lastest_news[$i]->img;?>"
                                                                                                                 class="img-responsive wp-post-image"
                                                                                                                 alt="01"
                                                                                                                 sizes="(max-width: 296px) 100vw, 296px"/></a>
                                                        <p class="entry-category"><a href="index81ea.html?cat=3"
                                                                                     rel="category">Football</a></p>

                                                    </div>
                                                    <h3 class="entry-title"><a href="<?php echo base_url('view/article/' . $lastest_news[$i]->alias); ?>">
                                                            <?php echo $lastest_news[$i]->title;?></a></h3>
                                                    <div class="entry-meta small"><i class="fa fa-clock-o"></i> 1:40 pm <i
                                                            class="fa fa-calendar"></i> 25 Nov 2013
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endfor;?>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    <div class="row">
                        <?php foreach ($categories_articles as $category_articles):?>
                            <?php $articles = $category_articles["articles"]?>
                            <?php if(sizeof($articles) > 3):?>
                                <div class="col-sm-6">
                                    <div class="news-block news-latest layout-default">
                                        <h2 class="title">
                                            <?php echo $category_articles["category"]->name;?>
                                        </h2>
                                        <div class="primary">
                                            <div class="entry-image">
                                                <a href="<?php echo base_url('view/article/' . $articles[0]->alias); ?>">
                                                    <img width="400"
                                                         height="222"
                                                         src="<?php echo base_url();?>assets/frontend/wp-content/uploads/2014/01/33-400x222.jpg"
                                                         class="img-responsive wp-post-image"
                                                         alt="33"
                                                         sizes="(max-width: 400px) 100vw, 400px"/>
                                                </a>
                                                <div class="overlay">
                                                    <a class="btn btn-primary btn-sm" href="<?php echo base_url('view/article/' . $articles[0]->alias); ?>">
                                                        Chi tiết
                                                    </a>
                                                </div>
                                            </div>
                                            <h3 class="entry-title">
                                                <a href="<?php echo base_url('view/article/' . $articles[0]->alias); ?>">
                                                    <?php echo $articles[0]->title ?>
                                                </a>
                                            </h3>
                                            <div class="entry-meta small">
                                                <i class="fa fa-clock-o"></i> <?php echo date('H:i', strtotime($articles[0]->post_on));?>
                                                <i class="fa fa-calendar"></i> <?php echo date('d-m-Y', strtotime($articles[0]->post_on));?>
                                            </div>
                                        </div>
                                        <?php for($i = 1; $i < 4; $i++):?>
                                            <div class="secondary">
                                                <h4 class="entry-title">
                                                    <a href="<?php echo base_url('view/article/' . $articles[$i]->alias); ?>">
                                                        <?php echo $articles[$i]->title ?>
                                                    </a>
                                                </h4>
                                                <div class="entry-meta small">
                                                    <i class="fa fa-clock-o"></i> <?php echo date('H:i', strtotime($articles[$i]->post_on));?>
                                                    <i class="fa fa-calendar"></i> <?php echo date('d-m-Y', strtotime($articles[$i]->post_on));?>
                                                </div>
                                            </div>
                                        <?php endfor;?>
                                    </div>
                                </div>
                            <?php endif;?>
                        <?php endforeach;?>
                    </div>
                    <div class="news-block news-popular"><h2 class="title">Popular News</h2>
                        <div id="carousel-popular43" class="carousel slide">
                            <ol class="carousel-indicators">
                                <li data-target='#carousel-popular43' data-slide-to='0' class='active'></li>
                                <li data-target='#carousel-popular43' data-slide-to='1'></li>
                                <li data-target='#carousel-popular43' data-slide-to='2'></li>
                                <li data-target='#carousel-popular43' data-slide-to='3'></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="row">
                                        <div class="col-sm-6 col-primary">
                                            <div class="item-inner">
                                                <div class="entry-image"><a href="index1639.html?p=330"><img width="296"
                                                                                                             height="164"
                                                                                                             src="<?php echo base_url();?>assets/frontend/wp-content/uploads/2014/01/<?php echo $popular_news[0]->img;?>"
                                                                                                             class="img-responsive wp-post-image"
                                                                                                             alt="30"
                                                                                                             sizes="(max-width: 296px) 100vw, 296px"/></a>

                                                </div>
                                                <div class="entry-content"><h3 class="entry-title"><a
                                                            href="<?php echo base_url('view/article/' . $popular_news[0]->alias); ?>"><?php echo $popular_news[0]->title?></a></h3></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-secondary">
                                            <?php for ($i=0;$i<4;$i++):?>
                                            <div class="media">

                                                <div class="pull-left"><a href="<?php echo base_url('view/article/' . $popular_news[$i]->alias); ?>"><img width="64"
                                                                                                           height="64"
                                                                                                           src="<?php echo base_url();?>assets/frontend/wp-content/uploads/2014/01/<?php echo $popular_news[$i]->img;?>"
                                                                                                           class="img-responsive wp-post-image"
                                                                                                           alt="37"
                                                                                                           sizes="(max-width: 64px) 100vw, 64px"/></a>
                                                </div>
                                                <div class="media-body"><h4 class="entry-title"><a
                                                            href="<?php echo base_url('view/article/' . $popular_news[$i]->alias); ?>"><?php echo $popular_news[$i]->title;?></a></h4>
                                                    <div class="entry-meta small"><i class="fa fa-clock-o"></i> 12:12 pm
                                                        <i class="fa fa-calendar"></i> 25 Nov 2013
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endfor;?>

                                        </div>
                                    </div>
                                </div>
                                <div class="item ">
                                    <div class="row">
                                        <div class="col-sm-6 col-primary">
                                            <div class="item-inner">
                                                <div class="entry-image"><a href="index1639.html?p=330"><img width="296"
                                                                                                             height="164"
                                                                                                             src="<?php echo base_url();?>assets/frontend/wp-content/uploads/2014/01/<?php echo $popular_news[4]->img;?>"
                                                                                                             class="img-responsive wp-post-image"
                                                                                                             alt="30"
                                                                                                             sizes="(max-width: 296px) 100vw, 296px"/></a>

                                                </div>
                                                <div class="entry-content"><h3 class="entry-title"><a
                                                            href="<?php echo base_url('view/article/' . $popular_news[4]->alias); ?>"><?php echo $popular_news[4]->title?></a></h3></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-secondary">
                                            <?php for ($i=5;$i<8;$i++):?>
                                                <div class="media">

                                                    <div class="pull-left"><a href="<?php echo base_url('view/article/' . $popular_news[$i]->alias); ?>"><img width="64"
                                                                                                                                                              height="64"
                                                                                                                                                              src="<?php echo base_url();?>assets/frontend/wp-content/uploads/2014/01/<?php echo $popular_news[$i]->img;?>"
                                                                                                                                                              class="img-responsive wp-post-image"
                                                                                                                                                              alt="37"
                                                                                                                                                              sizes="(max-width: 64px) 100vw, 64px"/></a>
                                                    </div>
                                                    <div class="media-body"><h4 class="entry-title"><a
                                                                href="<?php echo base_url('view/article/' . $popular_news[$i]->alias); ?>"><?php echo $popular_news[$i]->title;?></a></h4>
                                                        <div class="entry-meta small"><i class="fa fa-clock-o"></i> 12:12 pm
                                                            <i class="fa fa-calendar"></i> 25 Nov 2013
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endfor;?>

                                        </div>
                                    </div>
                                </div>
                                <div class="item ">
                                    <div class="row">
                                        <div class="col-sm-6 col-primary">
                                            <div class="item-inner">
                                                <div class="entry-image"><a href="index1639.html?p=330"><img width="296"
                                                                                                             height="164"
                                                                                                             src="<?php echo base_url();?>assets/frontend/wp-content/uploads/2014/01/<?php echo $popular_news[8]->img;?>"
                                                                                                             class="img-responsive wp-post-image"
                                                                                                             alt="30"
                                                                                                             sizes="(max-width: 296px) 100vw, 296px"/></a>

                                                </div>
                                                <div class="entry-content"><h3 class="entry-title"><a
                                                            href="<?php echo base_url('view/article/' . $popular_news[8]->alias); ?>"><?php echo $popular_news[8]->title?></a></h3></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-secondary">
                                            <?php for ($i=9;$i<12;$i++):?>
                                                <div class="media">

                                                    <div class="pull-left"><a href="<?php echo base_url('view/article/' . $popular_news[$i]->alias); ?>"><img width="64"
                                                                                                                                                              height="64"
                                                                                                                                                              src="<?php echo base_url();?>assets/frontend/wp-content/uploads/2014/01/<?php echo $popular_news[$i]->img;?>"
                                                                                                                                                              class="img-responsive wp-post-image"
                                                                                                                                                              alt="37"
                                                                                                                                                              sizes="(max-width: 64px) 100vw, 64px"/></a>
                                                    </div>
                                                    <div class="media-body"><h4 class="entry-title"><a
                                                                href="<?php echo base_url('view/article/' . $popular_news[$i]->alias); ?>"><?php echo $popular_news[$i]->title;?></a></h4>
                                                        <div class="entry-meta small"><i class="fa fa-clock-o"></i> 12:12 pm
                                                            <i class="fa fa-calendar"></i> 25 Nov 2013
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endfor;?>

                                        </div>
                                    </div>
                                </div>
                                <div class="item ">
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-sm-6 col-primary">
                                                <div class="item-inner">
                                                    <div class="entry-image"><a href="index1639.html?p=330"><img width="296"
                                                                                                                 height="164"
                                                                                                                 src="<?php echo base_url();?>assets/frontend/wp-content/uploads/2014/01/<?php echo $popular_news[12]->img;?>"
                                                                                                                 class="img-responsive wp-post-image"
                                                                                                                 alt="30"
                                                                                                                 sizes="(max-width: 296px) 100vw, 296px"/></a>

                                                    </div>
                                                    <div class="entry-content"><h3 class="entry-title"><a
                                                                href="<?php echo base_url('view/article/' . $popular_news[12]->alias); ?>"><?php echo $popular_news[12]->title?></a></h3></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-secondary">
                                                <?php for ($i=13;$i<16;$i++):?>
                                                    <div class="media">

                                                        <div class="pull-left"><a href="<?php echo base_url('view/article/' . $popular_news[$i]->alias); ?>"><img width="64"
                                                                                                                                                                  height="64"
                                                                                                                                                                  src="<?php echo base_url();?>assets/frontend/wp-content/uploads/2014/01/<?php echo $popular_news[$i]->img;?>"
                                                                                                                                                                  class="img-responsive wp-post-image"
                                                                                                                                                                  alt="37"
                                                                                                                                                                  sizes="(max-width: 64px) 100vw, 64px"/></a>
                                                        </div>
                                                        <div class="media-body"><h4 class="entry-title"><a
                                                                    href="<?php echo base_url('view/article/' . $popular_news[$i]->alias); ?>"><?php echo $popular_news[$i]->title;?></a></h4>
                                                            <div class="entry-meta small"><i class="fa fa-clock-o"></i> 12:12 pm
                                                                <i class="fa fa-calendar"></i> 25 Nov 2013
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endfor;?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="news-block news-video">
                        <h2 class="title">Video</h2>
                        <div id="carousel-video" class="carousel slide scale">
                            <ol class="carousel-indicators">
                                <li data-target='#carousel-video' data-slide-to='0' class='active'></li>
                                <li data-target='#carousel-video' data-slide-to='1'></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="row">
                                        <?php for($i = 0; $i < 3; $i++):?>
                                            <div class="col-sm-4">
                                                <div class="item-content">
                                                    <div class="entry-image">
                                                        <a class="anchor-video" href="<?php echo base_url('view/video/' . $videos[$i]->alias); ?>">
                                                            <i class="fa fa-play-circle-o"></i>
                                                            <img width="280" height="155"
                                                                 src="<?php echo base_url().$videos[$i]->image;?>"
                                                                 class="img-responsive wp-post-image"
                                                                 alt="41"
                                                                 sizes="(max-width: 280px) 100vw, 280px"/>
                                                        </a>
                                                    </div>
                                                    <h3 class="entry-title">
                                                        <a href="<?php echo base_url('view/video/' . $videos[$i]->alias); ?>">
                                                            <?php echo $videos[$i]->title ?>
                                                        </a>
                                                    </h3>
                                                    <div class="entry-meta small"><i class="fa fa-clock-o"></i> 12:31 pm <i
                                                            class="fa fa-calendar"></i> 25 Nov 2013
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endfor;?>
                                    </div>
                                </div>
                                <div class="item ">
                                    <div class="row">
                                        <?php for($i = 3; $i < 6; $i++):?>
                                            <div class="col-sm-4">
                                                <div class="item-content">
                                                    <div class="entry-image">
                                                        <a class="anchor-video" href="<?php echo base_url('view/video/' . $videos[$i]->alias); ?>">
                                                            <i class="fa fa-play-circle-o"></i>
                                                            <img width="280" height="155"
                                                                 src="<?php echo base_url().$videos[$i]->image;?>"
                                                                 class="img-responsive wp-post-image"
                                                                 alt="41"
                                                                 sizes="(max-width: 280px) 100vw, 280px"/>
                                                        </a>
                                                    </div>
                                                    <h3 class="entry-title">
                                                        <a href="<?php echo base_url('view/video/' . $videos[$i]->alias); ?>">
                                                            <?php echo $videos[$i]->title ?>
                                                        </a>
                                                    </h3>
                                                    <div class="entry-meta small"><i class="fa fa-clock-o"></i> 12:31 pm <i
                                                            class="fa fa-calendar"></i> 25 Nov 2013
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endfor;?>
                                    </div>
                                </div>
<!--                               -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--End Left-->
<!-- Right-->
        <?php $this->load->view('frontend/templates/sidebar');?>
<!-- End Right -->
    </div>
</section>
<?php $this->load->view('frontend/templates/footer'); ?>