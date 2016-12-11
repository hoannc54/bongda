<?php $article_first_id = 0;?>
<div id="carousel-featured" class="carousel slide" data-interval="8000" data-ride="carousel">
    <div class="carousel-inner">
        <div class="item active">
            <div class="row">
                <div class="col-sm-8 slider-primary">
                    <div class="item-inner"><a href="index6595.html?p=459">
                            <div class="item-thumbnail">
                                <img width="520" height="350"
                                     src="<?php echo base_url();?>assets/frontend/wp-content/uploads/2014/01/01-520x350.jpg"
                                     class="img-responsive wp-post-image"
                                     alt="01"/>
                            </div>
                        </a>
                        <div class="item-content">
                            <a href="index6595.html?p=459">
                                <h2 class="entry-title">
                                    <?php echo $slider_articles[$article_first_id]->title?>
                                </h2></a>
                            <p class="entry-content">
                                <?php echo $slider_articles[$article_first_id]->description?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 slider-secondary">
                    <?php $article_first_id += 1?>
                    <?php for($i = $article_first_id; $i < $article_first_id + 2; $i++):?>
                        <div class="secondary-item">
                            <div class="item-inner"><a href="index4efb.html?p=405">
                                    <div class="item-thumbnail">
                                        <img width="300" height="150"
                                             src="<?php echo base_url();?>assets/frontend/wp-content/uploads/2014/01/39-300x150.jpg"
                                             class="img-responsive wp-post-image"
                                             alt="39"/>
                                    </div>
                                </a>
                                <div class="item-content">
                                    <a href="">
                                        <h3 class="entry-title">
                                            <?php echo $slider_articles[$i]->title?>
                                        </h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endfor;?>
                    <?php $article_first_id += 2;?>

                </div>
            </div><!--/.row-->
        </div>
        <!--/.item-->
        <div class="item ">
            <div class="row">
                <div class="col-sm-8 slider-primary">
                    <div class="item-inner">
                        <a href="index8a7d.html?p=301">
                            <div class="item-thumbnail">
                                <img width="520" height="350"
                                     src="<?php echo base_url();?>assets/frontend/wp-content/uploads/2014/01/23-520x350.jpg"
                                     class="img-responsive wp-post-image"
                                     alt="23"/>
                            </div>
                        </a>
                        <div class="item-content">
                            <a href="index8a7d.html?p=301">
                                <h2 class="entry-title">
                                    <?php echo $slider_articles[$article_first_id]->title;?>
                                </h2>
                            </a>
                            <p class="entry-content">
                                <?php echo $slider_articles[$article_first_id]->description?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 slider-secondary">
                    <?php $article_first_id += 1?>
                    <?php for($i = $article_first_id; $i < $article_first_id + 2; $i++):?>
                        <div class="secondary-item">
                            <div class="item-inner"><a href="index4efb.html?p=405">
                                    <div class="item-thumbnail">
                                        <img width="300" height="150"
                                             src="<?php echo base_url();?>assets/frontend/wp-content/uploads/2014/01/24-300x150.jpg"
                                             class="img-responsive wp-post-image"
                                             alt="39"/>
                                    </div>
                                </a>
                                <div class="item-content">
                                    <a href="">
                                        <h3 class="entry-title">
                                            <?php echo $slider_articles[$i]->title; ?>
                                        </h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endfor;?>
                </div>
            </div><!--/.row-->
        </div><!--/.item-->
    </div><!--/.carousel-inner-->
    <a class="left featured-slider-control" href="#carousel-featured" data-slide="prev"><i
            class="fa fa-angle-left"></i></a><a class="right featured-slider-control"
                                                href="#carousel-featured" data-slide="next"><i
            class="fa fa-angle-right"></i></a></div><!--/#carousel-featured--></div>