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
            <h1>Chọn trận đấu để dự đoán kết quả:</h1>
            <br>
            <form action="<?php echo base_url();?>view/guess_result" method="post">
                <select name = 'trandau'>
                    <?php foreach ($list_match as $lm) {

                        echo "<option value = '".$lm['match_id']."'>"."Tran dau giua ".$lm['match_name']."</option>";

                    } ?>
                </select>
                <input type="submit" name="submit" value="Dự đoán"/>
                <br>
                <br>
                <h2>Danh sách trận đấu sắp diễn ra</h2>
            <article id="post-330" class="post-330 post type-post status-publish format-standard has-post-thumbnail hentry category-nfl tag-football-2 tag-goals">
               <?php
               foreach ($list_match as $lm){?>
                   <?php echo "<h3>".$lm['match_name']."</h3>";?>
                   <?php echo $lm['date']."-".$lm['month']."-".$lm['year'];?>
                    </br>
                    <?php echo $lm['description'];?>
                    </br>
               <?php } ?>



                <div class="entry-content">


                    <div class="entry-tags">Tags: <a href="index3e36.html?tag=football-2" rel="tag">football</a>, <a href="indexb913.html?tag=goals" rel="tag">goals</a></div>

                </div>

                <footer>


                </footer>                   <nav class="navigation post-navigation" role="navigation">

            </article><!--/#post-->

        </div>
        <!--/#content -->
<!--Right-->
        <?php $this->load->view('frontend/templates/sidebar');?>
<!--End Right-->
    </div>
</section>
<?php $this->load->view('frontend/templates/footer');?>