<section class="main-content">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<main class="primary">
					<div class="project-details-inner">
						<section class="project-content">
							<div class="project-title">
								<div class="project-title-t">
									<h1 class="title-section"><?php echo $service['title']?></h1>
									<div class="other-info clearfix">
										<span class="date-time">
											<i class="fa fa-clock-o"></i> 
											<?php 
												echo date('d', strtotime($service['created']))
											?> 
											Tháng 
											<?php 
												echo date('m, Y', strtotime($service['created']))
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
									<?php echo $service['content'];?>
								</div>								
							</div><!-- project-description -->							
						</section><!-- project-content -->

						<?php if($tags) :?>
							<section id="tag-region">
								<div class="list-tag">
									<span class="label-tag"><label><i class="fa fa-tags" aria-hidden="true"></i> Từ khóa: </label></span>
									<span class="tag-item">
										<?php 
											foreach($tags as $k => $item) :
										?>
											<a href="<?php echo \Uri::create('dich-vu/tags/' . $item['alias'])?>" rel="tag"><?php echo $item['t_name'];?></a>
										<?php 
											if ($k < count($tags) - 1) echo ',';
											endforeach;
										?>
									</span>
								</div>
							</section>
						<?php endif; ?>
						
						<div class="clearfix"></div>
						<?php if ($relateServices) :?>
							<section class="other-projects" style="margin-top: 20px;">
								<h3 class="title-section">CÁC DỊCH VỤ KHÁC</h3>
								<div class="other-projects-inner">
									<div class="row">
										<?php foreach($relateServices as $item) :?>
											<div class="col-md-4 col-sm-6">
												<div class="project-item">
													<div class="project-img relate-project">
														<?php 
															$path = Asset::get_file('services/'.$item['avatar'], 'img');				
															if (!empty($path)) {
																echo Asset::img('services/'.$item['avatar'], ['alt' => $item['title'], 'class' => 'img-responsive relate-p-i']);
															} else {												
																echo Asset::img('no-image/no_image.jpg', ['alt' => $item['title'], 'class' => 'img-responsive relate-p-i']);
															}		
														?>					
														<a class="view-details" href="<?php echo \Uri::create('dich-vu/' . $item['alias'] . '.html');?>">
															<?php echo \Theme::instance()->asset->img('add.png', ['alt' => '', 'class' => 'img-responsive']);?>	
															<div class="top">
																<span class="date-time"><i class="fa fa-clock-o"></i> 
																	<?php 
																		echo date('d', strtotime($item['created']))
																	?> 
																	Tháng 
																	<?php 
																		echo date('m, Y', strtotime($item['created']))
																	?>
																</span>
															</div>
															<!-- <div class="bottom">
																<span class="views"><i class="fa fa-eye"></i> 999+</span>&nbsp;&nbsp;<span class="share"><i class="fa fa-share-alt"></i> Share</span>
															</div> -->
														</a>
													</div>
													<h4 class="title-item">
														<a href="<?php echo \Uri::create('dich-vu/' . $item['alias'] . '.html');?>">
															<?php 
																echo $item['title'];
															?>																
														</a>
													</h4>
												</div>
											</div>			
										<?php endforeach;?>						
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