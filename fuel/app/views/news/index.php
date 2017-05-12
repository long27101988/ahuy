<section class="main-content">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<main class="primary">
					<div class="news-inner">
						<?php if(!empty($topNews)) :?>
						<section class="hot-news">
							<h2 class="title-section">TIN MỚI NHẤT</h2>
							<div class="hot-news-w clearfix">
								<?php foreach($topNews as $item) :?>
									<div class="hot-new">
										<?php 	
											$path = Asset::get_file('news/' . $item['avartar'], 'img');	
											if (!empty($path)) {
												echo Asset::img('news/' . $item['avartar'], ['alt' => $item['title'], 'class' => 'img-responsive img-hot-news']);
											} else {												
												echo Asset::img('no-image/no_image_hot_news.jpg', ['alt' => $item['title'], 'class' => 'img-responsive img-hot-news']);
											}					
										?>			
										<a href="<?php echo  \Uri::create('tin-tuc/'.$item['alias'].'.html')?>" class="hot-new-info">
											<div class="hot-new-title">
												<p>
													<i class="fa fa-clock-o"></i> 
													<?php 
														echo date('d', strtotime($item['created']))
													?> 
													Tháng 
													<?php 
														echo date('m, Y', strtotime($item['created']))
													?>
													</p>
												<h4><?php echo $item['title'];?></h4>
											</div>
											<div class="hot-new-content">
												<p><?php echo $item['short_content'];?></p>
												<span class="views"><i class="fa fa-eye"></i> <?php echo $item['hits'];?></span>
											</div>
										</a>
									</div>		
								<?php endforeach;?>						
							</div>
						</section><!-- hot-news -->
						<?php endif;?>
						<section class="old-news">
							<?php if($action != 'tags') :?>
								<h2 class="title-section">TIN CŨ HƠN</h2>
							<?php else : ?>
								<h2 class="title-section">TIN TỨC</h2>
							<?php endif; ?>
							<div class="old-news-w">
								<ul>
									<?php 
										for($i = 0; $i < count($listNews); $i += 2):
									?>
										<li>
											<div class="row">												
												<div class="col-md-6">
													<table class="table-new">
														<tr>
															<td rowspan="2">
																<a href="<?php echo  \Uri::create('tin-tuc/'.$listNews[$i]['alias'].'.html')?>" class="sidebar-new-img">
																	<?php 
																		$path = Asset::get_file('news/'.$listNews[$i]['avartar'], 'img');				
																		if (!empty($path)) {
																			echo Asset::img('news/'.$listNews[$i]['avartar'], ['alt' => $listNews[$i]['title'], 'class' => 'img-responsive']);
																		} else {												
																			echo Asset::img('no-image/no_image.jpg', ['alt' => $listNews[$i]['title'], 'class' => 'img-responsive']);
																		}		
																	?>					
																</a>
															</td>
															<td>
																<h3 class="sidebar-new-title"><a href="<?php echo  \Uri::create('tin-tuc/'.$listNews[$i]['alias'].'.html')?>" ><?php echo  $listNews[$i]['title'];?></a></h3>
																<p><?php echo $listNews[$i]['short_content'];?></p>
															</td>
														</tr>
														<tr>
															<td>
																<p class="other-info"><span class="date-time"><i class="fa fa-clock-o"></i> 
																<?php echo date('d', strtotime($listNews[$i]['created']))?> Tháng <?php echo date('m, Y', strtotime($listNews[$i]['created']))?>
																</span>&nbsp;&nbsp;&nbsp;<span class="views"><i class="fa fa-eye"></i> <?php echo $listNews[$i]['hits'];?></span></p>
															</td>
														</tr>
													</table>
												</div>
												<?php 
													if (!empty($listNews[$i + 1])) :
														$j = $i + 1;
												?>
													<div class="col-md-6">
													<table class="table-new">
														<tr>
															<td rowspan="2">
																<a href="<?php echo  \Uri::create('tin-tuc/'.$listNews[$j]['alias'].'.html')?>" class="sidebar-new-img">
																	<?php 
																		$path = Asset::get_file('news/'.$listNews[$j]['avartar'], 'img');				
																		if (!empty($path)) {
																			echo Asset::img('news/'.$listNews[$j]['avartar'], ['alt' => $listNews[$j]['title'], 'class' => 'img-responsive']);
																		} else {												
																			echo Asset::img('no-image/no_image.jpg', ['alt' => $listNews[$j]['title'], 'class' => 'img-responsive']);
																		}		
																	?>					
																</a>
															</td>
															<td>
																<h3 class="sidebar-new-title"><a href="<?php echo  \Uri::create('tin-tuc/'.$listNews[$j]['alias'].'.html')?>" ><?php echo  $listNews[$j]['title'];?></a></h3>
																<p><?php echo $listNews[$j]['short_content'];?></p>
															</td>
														</tr>
														<tr>
															<td>
																<p class="other-info"><span class="date-time"><i class="fa fa-clock-o"></i> 
																<?php echo date('d', strtotime($listNews[$j]['created']))?> Tháng <?php echo date('m, Y', strtotime($listNews[$j]['created']))?>
																</span>&nbsp;&nbsp;&nbsp;<span class="views"><i class="fa fa-eye"></i> <?php echo $listNews[$j]['hits'];?></span></p>
															</td>
														</tr>
													</table>
												</div>
												<?php endif;?>
											</div>
										</li>	
									<?php endfor;?>								
								</ul>
							</div>
						</section><!-- old-news -->
					</div><!-- news-inner -->
				</main>
				<div class="paper clearfix">
					<?php echo $pagination;?>
				</div>
			</div>
			<?php echo $sidebar;?>
		</div>
	</div>
</section>