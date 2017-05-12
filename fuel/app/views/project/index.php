<section class="main-content">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<main class="primary">
					<div class="services-inner">
						<ul>
							<?php for($i = 0; $i < count($listProjects); $i += 2) :?>
								<li>
									<div class="row">
										<div class="col-md-6 col-sm-6">
											<div class="item service-item">
												<div class="service-img">												
													<?php 
														$path = Asset::get_file('projects/'.$listProjects[$i]['avartar'], 'img');				
														if (!empty($path)) {
															echo Asset::img('projects/'.$listProjects[$i]['avartar'], ['alt' => $listProjects[$i]['title'], 'class' => 'img-responsive project-img']);
														} else {												
															echo Asset::img('no-image/no_image.jpg', ['alt' => $listProjects[$i]['title'], 'class' => 'img-responsive project-img']);
														}		
													?>			
													<a class="view-details" href="<?php echo \Uri::create('du-an/'.$listProjects[$i]['alias'].'.html');?>">
														<?php echo \Theme::instance()->asset->img('add-1.png', ['alt' => '']); ?>
														<!-- <div class="view-details-info clearfix">
															<div class="rating">
																<i class="fa fa-star star"></i>
																<i class="fa fa-star star"></i>
																<i class="fa fa-star star"></i>
																<i class="fa fa-star-half-o star"></i>
																<i class="fa fa-star-o star"></i>
															</div>
															<span class="views"><i class="fa fa-eye"></i> 999+</span>
														</div> -->
													</a>
												</div>
												<h4 class="title-item"><a href="<?php echo \Uri::create('du-an/'.$listProjects[$i]['alias'].'.html');?>"><?php echo $listProjects[$i]['title'];?></a></h4>
												<h5><?php echo $listProjects[$i]['short_content'];?></h5>
												<a href="<?php echo \Uri::create('du-an/'.$listProjects[$i]['alias'].'.html');?>" class="detail">Chi tiết</a>
											</div>
										</div>
										<?php 
											if (!empty($listProjects[$i + 1])) :
												$j = $i + 1;
										?>
											<div class="col-md-6 col-sm-6">
												<div class="item service-item">
													<div class="service-img">
														<?php 
															$path = Asset::get_file('projects/'.$listProjects[$j]['avartar'], 'img');				
															if (!empty($path)) {
																echo Asset::img('projects/'.$listProjects[$j]['avartar'], ['alt' => $listProjects[$j]['title'], 'class' => 'img-responsive project-img']);
															} else {												
																echo Asset::img('no-image/no_image.jpg', ['alt' => $listProjects[$j]['title'], 'class' => 'img-responsive project-img']);
															}		
														?>			
														<a class="view-details" href="<?php echo \Uri::create('du-an/'.$listProjects[$j]['alias'].'.html');?>">
														<?php echo \Theme::instance()->asset->img('add-1.png', ['alt' => '']); ?>
															<!-- <div class="view-details-info clearfix">
																<div class="rating">
																	<i class="fa fa-star star"></i>
																	<i class="fa fa-star star"></i>
																	<i class="fa fa-star star"></i>
																	<i class="fa fa-star-half-o star"></i>
																	<i class="fa fa-star-o star"></i>
																</div>
																<span class="views"><i class="fa fa-eye"></i> 999+</span>
															</div> -->
														</a>
													</div>
													<h4 class="title-item"><a href="<?php echo \Uri::create('du-an/'.$listProjects[$j]['alias'].'.html');?>"><?php echo $listProjects[$j]['title'];?></a></h4>
													<h5><?php echo $listProjects[$j]['short_content'];?></h5>
													<a href="<?php echo \Uri::create('du-an/'.$listProjects[$i]['alias'].'.html');?>" class="detail">Chi tiết</a>
												</div>
											</div>
										<?php endif;?>
									</div>
								</li>
							<?php endfor;?>
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