<section class="main-content">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<main class="primary">
					<div class="projects-inner">
						<ul>
							<?php foreach ($listServices as $item) :?>
								<li>
									<div class="project-item clearfix">
										<div class="project-img">
											<a href="<?php echo \Uri::create('dich-vu/'. $item['alias'] . '.html');?>">
												<?php 
													$path = Asset::get_file('services/'.$item['avatar'], 'img');				
													if (!empty($path)) {
														echo Asset::img('services/'.$item['avatar'], ['alt' => $item['title'], 'class' => 'img-responsive services-img']);
													} else {												
														echo Asset::img('no-image/no_image.jpg', ['alt' => $item['title'], 'class' => 'img-responsive project-img']);
													}		
												?>				
											</a>											
												<!-- lam sau nha -->
											<!-- <a class="view-details" href="#"> -->
												<?php //echo \Theme::instance()->asset->img('add-1.png', ['alt' => '']); ?>
												<!-- <div class="clearfix">
													<div class="rating">
														<i class="fa fa-star star"></i>
														<i class="fa fa-star star"></i>
														<i class="fa fa-star star"></i>
														<i class="fa fa-star-half-o star"></i>
														<i class="fa fa-star-o star"></i>
													</div>
													<span class="views"><i class="fa fa-eye"></i> 999+</span>
												</div> -->
											<!-- </a> -->
										</div>
										<div class="project-text">
											<h2 class="title-item">
												<a href="<?php echo \Uri::create('dich-vu/'. $item['alias'] . '.html');?>"><?php echo $item['title']?></a>
											</h2>
											<p><?php echo $item['short_content']?></p>
											<a href="<?php echo \Uri::create('dich-vu/'. $item['alias'] . '.html');?>" class="detail">Chi tiết</a>
										</div>
									</div>
								</li>
							<?php endforeach;?>
						</ul>
					</div>
				</main>
				<div class="paper clearfix">
					<?php echo $pagination;?>
				</div>
			</div>
			<?php echo $sidebar;?>
		</div>
	</div>
</section>