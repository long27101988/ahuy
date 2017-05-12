<section class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <main class="primary">
                    <div class="project-details-inner">
                        <section class="project-content">
                            <div class="project-title">
                                <div class="project-title-t">
                                    <h1 class="title-section"><?php echo $news['title']?></h1>
                                    <div class="other-info clearfix">
                                        <span class="date-time">
                                            <i class="fa fa-clock-o"></i> 
                                            <?php 
                                                echo date('d', strtotime($news['created']))
                                            ?> 
                                            Tháng 
                                            <?php 
                                                echo date('m, Y', strtotime($news['created']))
                                            ?>
                                        </span>
                                        <!-- <div class="rating">
                                            <i class="fa fa-star star"></i>
                                            <i class="fa fa-star star"></i>
                                            <i class="fa fa-star star"></i>
                                            <i class="fa fa-star-half-o star"></i>
                                            <i class="fa fa-star-o star"></i>
                                        </div>
                                        <span class="views"><i class="fa fa-eye"></i> 999+</span>
                                        <span class="views"><i class="fa fa-share-alt"></i> Share</span> -->
                                    </div>
                                </div>                    
                            </div><!-- project-title -->
                            <div class="project-description">
                                <div class="project-desc">                                                                  
                                    <?php echo $news['content'];?>
                                </div>
                            </div><!-- project-description -->
                        </section>

                        <?php if($tags) :?>
                            <section id="tag-region">
                                <div class="list-tag">
                                    <span class="label-tag"><label><i class="fa fa-tags" aria-hidden="true"></i> Từ khóa: </label></span>
                                    <span class="tag-item">
                                        <?php 
                                            foreach($tags as $k => $item) :
                                        ?>
                                            <a href="<?php echo \Uri::create('tin-tuc/tags/' . $item['alias'])?>" rel="tag"><?php echo $item['t_name'];?></a>
                                        <?php 
                                            if ($k < count($tags) - 1) echo ',';
                                            endforeach;
                                        ?>
                                    </span>
                                </div>
                            </section>
                        <?php endif; ?>                                  

                        <div class="clearfix"></div>
                        <?php if ($relateNews) :?>
                            <section id="news-relate">
                                <h3 class="title-section">TIN TỨC KHÁC</h3>
                                <div class="r-inner">
                                    <div class="nr-item">
                                        <div class="row">
                                            <?php foreach($relateNews as $k => $item) :?>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 item-relate-news">
                                                    <div class="wrap-content-nr">
                                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 no-padding">
                                                            <a href="<?php echo  \Uri::create('tin-tuc/' . $item['alias'] . '.html')?>">
                                                            <?php 
                                                                $path = Asset::get_file('news/' . $item['avartar'], 'img');               
                                                                if (!empty($path)) {
                                                                    echo Asset::img('news/' . $item['avartar'], ['alt' => $item['title'], 'class' => 'img-responsive relate-news-img']);
                                                                } else {                                                
                                                                    echo Asset::img('no-image/no_image.jpg', ['alt' => $item['title'], 'class' => 'img-responsive relate-news-img']);
                                                                }       
                                                            ?>    
                                                            </a>    
                                                        </div>
                                                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                                            <h3 class="title-relate-new"><a href="<?php echo  \Uri::create('tin-tuc/' . $item['alias'] . '.html')?>"><?php echo $item['title'];?></a></h3>
                                                            <div class="date-view">
                                                                <span class="date-time">
                                                                    <i class="fa fa-clock-o"></i> 
                                                                   <?php echo date('d', strtotime($item['created']))?> Tháng <?php echo date('m, Y', strtotime($item['created']))?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                            
                                            <?php 
                                                if ($k > 0 && $k % 2 != 0) {
                                                    echo "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'><div class='relate-news-hr'></div></div>";
                                                }
                                                endforeach;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        <?php endif;?>

                    </div>
                </main>
            </div>
            <?php echo $sidebar?>
        </div>
    </div>
</section>