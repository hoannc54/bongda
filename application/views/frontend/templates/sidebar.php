<div id="sidebar" class="col-md-4 sidebar" role="complementary">
    <div class="sidebar-inner">
        <aside class="widget-area">
            <div id="tab_widget-2" class="widget widget_tab_widget">
                <ul class="nav">
                    <li class="active"><a href="#tab_widget-2-1" data-toggle="tab">Nổi bật</a></li>
                    <li><a href="#tab_widget-2-2" data-toggle="tab">Mới</a></li>
                </ul>
                <div class="tab-content">
                    <div id="tab_widget-2-1" class="tab-pane active fade in">
                        <div class="tab-popular-posts">
                            <?php foreach ($popular_articles as $article):?>
                                <div class="media">
                                    <div class="pull-left">
                                        <a href="<?php echo base_url('view/article/' . $article->alias); ?>">
                                            <img width="64"
                                                 height="64"
                                                 src="<?php echo base_url();?>assets/frontend/wp-content/uploads/2014/01/30-64x64.jpg"
                                                 class="img-responsive wp-post-image"
                                                 alt="30"
                                                 sizes="(max-width: 64px) 100vw, 64px"/>
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h3 class="entry-title">
                                            <a href="<?php echo base_url('view/article/' . $article->alias); ?>">
                                                <?php echo $article->title;?>
                                            </a>
                                        </h3>
                                        <div class="entry-meta small">
                                            <i class="fa fa-clock-o"></i> <?php echo date('H:i', strtotime($article->post_on));?>
                                            <i class="fa fa-calendar"></i> <?php echo date('d-m-Y', strtotime($article->post_on));?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                    <div id="tab_widget-2-2" class="tab-pane fade">
                        <div class="tab-latest-posts">
                            <?php foreach ($lastest_articles as $article):?>
                                <div class="media">
                                    <div class="pull-left">
                                        <a href="<?php echo base_url('view/article/' . $article->alias); ?>">
                                            <img width="64"
                                                 height="64"
                                                 src="<?php echo base_url();?>assets/frontend/wp-content/uploads/2014/01/30-64x64.jpg"
                                                 class="img-responsive wp-post-image"
                                                 alt="30"
                                                 sizes="(max-width: 64px) 100vw, 64px"/>
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h3 class="entry-title">
                                            <a href="<?php echo base_url('view/article/' . $article->alias); ?>">
                                                <?php echo $article->title;?>
                                            </a>
                                        </h3>
                                        <div class="entry-meta small">
                                            <i class="fa fa-clock-o"></i> <?php echo date('H:i', strtotime($article->post_on));?>
                                            <i class="fa fa-calendar"></i> <?php echo date('d-m-Y', strtotime($article->post_on));?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
            <div id="image_widget-4" class="widget widget_image_widget"><h2 class="widgettitle">
                    Advertisement</h2>
                <a href="#" target="_blank"><img src="<?php echo base_url();?>assets/frontend/wp-content/uploads/2014/01/sidebar-ad.png"
                                                 class="img-responsive" alt=""></a></div>
            <div id="gallery_widget-2" class="widget widget_gallery_widget"><h2 class="widgettitle">Gallery</h2>
                <div class="row widget-gallery">
                    <div class="col-xs-6"><a href="index6595.html?p=459">
                            <div class="img-container"><img width="280" height="155"
                                                            src="<?php echo base_url();?>assets/frontend/wp-content/uploads/2014/01/01-280x155.jpg"
                                                            class="img-responsive wp-post-image" alt="01"
                                                            sizes="(max-width: 280px) 100vw, 280px"/><i
                                    class="fa fa-picture-o"></i>
                                <div class="overlay"><h3 class="entry-title">Biggest College Football Loss</h3>
                                </div>
                            </div>
                        </a></div>
                    <div class="col-xs-6"><a href="indexc79d.html?p=448">
                            <div class="img-container"><img width="280" height="155"
                                                            src="<?php echo base_url();?>assets/frontend/wp-content/uploads/2014/01/42-280x155.jpg"
                                                            class="img-responsive wp-post-image" alt="42"
                                                            sizes="(max-width: 280px) 100vw, 280px"/><i
                                    class="fa fa-picture-o"></i>
                                <div class="overlay"><h3 class="entry-title">Deliver sucker-punch but still need a
                                        striker</h3></div>
                            </div>
                        </a></div>
                    <div class="col-xs-6"><a href="indexd89d.html?p=261">
                            <div class="img-container"><img width="280" height="155"
                                                            src="<?php echo base_url();?>assets/frontend/wp-content/uploads/2014/01/16-280x155.jpg"
                                                            class="img-responsive wp-post-image" alt="16"
                                                            sizes="(max-width: 280px) 100vw, 280px"/><i
                                    class="fa fa-picture-o"></i>
                                <div class="overlay"><h3 class="entry-title">British And Irish Lions Legend Jeremy
                                        Guscott On Their</h3></div>
                            </div>
                        </a></div>
                    <div class="col-xs-6"><a href="index48fd.html?p=184">
                            <div class="img-container"><img width="280" height="155"
                                                            src="<?php echo base_url();?>assets/frontend/wp-content/uploads/2014/01/04-280x155.jpg"
                                                            class="img-responsive wp-post-image" alt="04"
                                                            sizes="(max-width: 280px) 100vw, 280px"/><i
                                    class="fa fa-picture-o"></i>
                                <div class="overlay"><h3 class="entry-title">Jorge Sampaoli&#8217;s Chile Side Will
                                        Entertain Fans If They Qualify</h3></div>
                            </div>
                        </a></div>
                </div>
            </div>
        </aside>
    </div>
</div>