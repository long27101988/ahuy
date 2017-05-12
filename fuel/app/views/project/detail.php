<section class="main-content">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<main class="primary">
					<div class="project-details-inner">
						<section class="project-content">
							<div class="project-title">
								<div class="project-title-t">
									<h1 class="title-section"><?php echo $project['title']?></h1>
									<div class="other-info clearfix">
										<span class="date-time">
											<i class="fa fa-clock-o"></i> 
											<?php 
												echo date('d', strtotime($project['created']))
											?> 
											Tháng 
											<?php 
												echo date('m, Y', strtotime($project['created']))
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
								<div class="project-title-b">
									<ul>
										<li><span>Chủ đầu tư :</span>Trường mầm non Đông Dương</li>
										<li><span>Công trình :</span>Trường trường mầm non Đông Dương</li>
										<li><span>Địa điểm :</span>Quôc lộ 13, P. Hiệp Phước, Quận Thủ Đức. TP. Hồ Chí Minh</li>
										<li><span>Mô tả dự án :</span>Cung cấp - Lắp đặt hệ thống điều hòa không khí.</li>
									</ul>
								</div>
							</div><!-- project-title -->
							<div class="project-description">
								<div class="project-desc">																	
									<h2 class="title-section">CHI TIẾT DỰ ÁN</h2>
									<?php echo $project['content'];?>
								</div>
								<!-- Mở rộng sẽ làm sau -->
								<!-- expand -->
								<!-- <div class="project-more-info">
									<ul>
										<li><span>Diện tích</span>1000m2</li>
										<li><span>Số lượng máy</span>500 (Electrolux 1 HP (ESM09CRF-D4))</li>
										<li><span>Tổng chi cho dự án</span>10.000 $</li>
										<li><span>Thời gian thực hiện</span>39 ngày</li>
									</ul>
								</div> -->
							</div><!-- project-description -->

							<div class="clearfix"></div>
							<?php if ($galleries) :?>
								<div class="project-images">
									<h2 class="title-section">HÌNH ẢNH THỰC TẾ</h2>
									<div class="project-images-inner">
										<div id="project-sync2" class="owl-carousel galleries-item">
											<?php 
												$galleries_detail = [];
												foreach($galleries as $item) : 
													$path = Asset::get_file('projects/galleries/'.$item['image_link'], 'img');				
													if (!empty($path)) :
											?>
												<div class="item">							
													<?php echo Asset::img('projects/galleries/'.$item['image_link'], ['alt' => '', 'class' => 'img-responsive']);?>		
												</div>												
											<?php
													$galleries_detail[] = [
														'des' =>$item['description'],
														'img' => 'projects/galleries/'.$item['image_link']
													];	
													endif;
												endforeach;
											?>
										</div>										
										<div id="project-sync1" class="owl-carousel">
											<?php foreach ($galleries_detail as $g_item) :?>
												<div class="item">
													<div>
														<?php echo Asset::img($g_item['img'], ['alt' => '', 'class' => 'img-responsive']); ?>	
													</div>
													<p><?php echo $g_item['des'];?></p>
												</div>														
											<?php endforeach;?>								
										</div>
									</div>
								</div><!-- project-images -->
							<?php endif;?>
						</section><!-- project-content -->

						<div class="clearfix"></div>
						<?php if ($relateProjects) :?>
							<section class="other-projects">
								<h3 class="title-section">CÁC DỰ ÁN KHÁC</h3>
								<div class="other-projects-inner">
									<div class="row">
										<?php foreach($relateProjects as $item) :?>
											<div class="col-md-4 col-sm-6">
												<div class="project-item">
													<div class="project-img relate-project">
														<?php 
															$path = Asset::get_file('projects/'.$item['avartar'], 'img');				
															if (!empty($path)) {
																echo Asset::img('projects/'.$item['avartar'], ['alt' => $item['title'], 'class' => 'img-responsive relate-p-i']);
															} else {												
																echo Asset::img('no-image/no_image.jpg', ['alt' => $item['title'], 'class' => 'img-responsive relate-p-i']);
															}		
														?>					
														<a class="view-details" href="<?php echo \Uri::create('du-an/' . $item['alias'] . '.html');?>">
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
														<a href="<?php echo \Uri::create('du-an/' . $item['alias'] . '.html');?>">
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
						<!-- other-projects -->
						<!-- <div class="discuss">
							<h3 class="title-section">THẢO LUẬN VỀ MÁY LẠNH <span>ELECTROLUX 1 HP ESM09CRF-D4 </span></h3>
							<div class="discuss-form">
								<form action="">
									<div class="field">
										<textarea name="Bình luận của bạn..."></textarea>
									</div>
									<div class="field clearfix">
										<div class="clearfix">
											<input type="text" placeholder="Tên">
											<input type="email" name="" id="" placeholder="Email">
										</div>
										<div class="clearfix" style="text-align: right">
											<a href=""><i class="fa fa-camera"></i> Kèm ảnh</a>
											<button class="button">GỬI</button>
										</div>
									</div>
								</form>
								<div class="clearfix">
									<p>Có 99 bình luận</p>
									<div class="clearfix">
										<label>Xem theo: </label>&nbsp;
										<label class="checkbox-inline">
											<input type="checkbox" id="inlineCheckbox1" value="option1"> Sản phẩm nổi bật
										</label>
										<label class="checkbox-inline">
											<input type="checkbox" id="inlineCheckbox2" value="option2"> Sản phẩm mới
										</label>
									</div>
								</div>
							</div>
							<div class="discuss-content">
								<ul>
									<li>
										<div class="level level-1">
											<div class="level-content">
												<div class="avatar">
													<a href="">
														<img src="img/avatar.jpg" alt="">
														<span>Seven</span>
													</a>
												</div>
												<div class="text">
													<p>Công suất của máy lạnh Panasonic 1.5 HP CU/CS-U12SKH-8, đảm bảo làm mát hoàn toàn những căn phòng có diện tích từ 15 đến 20 mét vuông. Do vậy, bạn có thể yên tâm mua chiếc máy lạnh này về và thư giãn trong một bầu không khí đầy sảng khoái.</p>
												</div>
												<div class="more">
													<a href="#" class="answer">Trả lời</a>
													<a href="javascript: void(0)" class="like"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Thích</a>
													<a href="javascript: void(0)" class="time"><i class="fa fa-clock-o" aria-hidden="true"></i> 11:00, 20/06/2016</a>
												</div>
											</div>
										</div>
										<div class="level level-2">
											<div class="level-content">
												<div class="avatar">
													<a href="">
														<img src="img/avatar.jpg" alt="">
														<span>Quản trị viên</span>
													</a>
												</div>
												<div class="text">
													<p>Công suất của máy lạnh Panasonic 1.5 HP CU/CS-U12SKH-8, đảm bảo làm mát hoàn toàn những căn phòng có diện tích từ 15 đến 20 mét vuông. Do vậy, bạn có thể yên tâm mua chiếc máy lạnh này về và thư giãn trong một bầu không khí đầy sảng khoái.</p>
												</div>
												<div class="more">
													<a href="#" class="answer">Trả lời</a>
													<a href="javascript: void(0)" class="like"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Thích</a>
													<a href="javascript: void(0)" class="time"><i class="fa fa-clock-o" aria-hidden="true"></i> 11:00, 20/06/2016</a>
												</div>
											</div>
											<div class="level-form">
												<form action="">
													<div class="field">
														<textarea name="Bình luận của bạn..."></textarea>
													</div>
													<div class="field clearfix">
														<a href=""><i class="fa fa-camera"></i> Kèm ảnh</a>
														<button class="button">GỬI</button>
													</div>
												</form>
											</div>
										</div>
									</li>
									<li>
										<div class="level level-1">
											<div class="level-content">
												<div class="avatar">
													<a href="">
														<img src="img/avatar.jpg" alt="">
														<span>Seven</span>
													</a>
												</div>
												<div class="text">
													<p>Công suất của máy lạnh Panasonic 1.5 HP CU/CS-U12SKH-8, đảm bảo làm mát hoàn toàn những căn phòng có diện tích từ 15 đến 20 mét vuông. Do vậy, bạn có thể yên tâm mua chiếc máy lạnh này về và thư giãn trong một bầu không khí đầy sảng khoái.</p>
												</div>
												<div class="more">
													<a href="#" class="answer">Trả lời</a>
													<a href="javascript: void(0)" class="like"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Thích</a>
													<a href="javascript: void(0)" class="time"><i class="fa fa-clock-o" aria-hidden="true"></i> 11:00, 20/06/2016</a>
												</div>
											</div>
										</div>
										<div class="level level-2">
											<div class="level-content">
												<div class="avatar">
													<a href="">
														<img src="img/avatar.jpg" alt="">
														<span>Quản trị viên</span>
													</a>
												</div>
												<div class="text">
													<p>Công suất của máy lạnh Panasonic 1.5 HP CU/CS-U12SKH-8, đảm bảo làm mát hoàn toàn những căn phòng có diện tích từ 15 đến 20 mét vuông. Do vậy, bạn có thể yên tâm mua chiếc máy lạnh này về và thư giãn trong một bầu không khí đầy sảng khoái.</p>
												</div>
												<div class="more">
													<a href="#" class="answer">Trả lời</a>
													<a href="javascript: void(0)" class="like"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Thích</a>
													<a href="javascript: void(0)" class="time"><i class="fa fa-clock-o" aria-hidden="true"></i> 11:00, 20/06/2016</a>
												</div>
											</div>
											<div class="level-form">
												<form action="">
													<div class="field">
														<textarea name="Bình luận của bạn..."></textarea>
													</div>
													<div class="field clearfix">
														<a href=""><i class="fa fa-camera"></i> Kèm ảnh</a>
														<button class="button">GỬI</button>
													</div>
												</form>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div> -->
					</div>
				</main>
			</div>
			<?php echo $sidebar?>
		</div>
	</div>
</section>