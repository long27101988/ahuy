<section class="main-content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<main class="primary">
					<div class="product-details-inner">
						<?php if($tags) :?>
						<section class="search-products clearfix">
							<!-- <div>
								<form action="" method="" class="product-search-form">
									<input type="text" placeholder="Tìm kiếm...">
									<button type="button"><i class="fa fa-search"></i></button>
								</form>
							</div> -->
							<div>
								<label><i class="fa fa-long-arrow-right" aria-hidden="true" style="cursor: default"></i> Tìm nhanh: </label>
								<div>
									<?php foreach($tags as $tag) :?>
										<a href="<?php echo \Uri::create('san-pham/tags/' . $tag['alias'])?>"><?php echo $tag['t_name'];?></a>
									<?php endforeach;?>
								</div>
							</div>
						</section>
						<?php endif;?>
						<section class="product-info">
							<div class="row">
								<div class="col-md-6">
									<div class="product-desc">
										<div class="product-img">
									    <div id="sync1" class="owl-carousel">
									      <div class="item">
									      	<?php echo Asset::img('products.jpg');?>
									      </div>
									      <div class="item">
									      	<?php echo Asset::img('products.jpg');?>
									      </div>
									      <div class="item">
									      	<?php echo Asset::img('products.jpg');?>
									      </div>
									      <div class="item">
									      	<?php echo Asset::img('products.jpg');?>
									      </div>
									      <div class="item">
									      	<?php echo Asset::img('products.jpg');?>
									      </div>
									    </div>
									    <div id="sync2" class="owl-carousel">
									      <div class="item">
									      	<?php echo Asset::img('products.jpg');?>
									      </div>
									      <div class="item">
									      	<?php echo Asset::img('products.jpg');?>
									      </div>
									      <div class="item">
									      	<?php echo Asset::img('products.jpg');?>
									      </div>
									      <div class="item">
									      	<?php echo Asset::img('products.jpg');?>
									      </div>
									      <div class="item">
									      	<?php echo Asset::img('products.jpg');?>
									      </div>
									    </div>
										</div>
										<div class="product-feature mb-product-feature">
											<input type="hidden" name="pid" value="<?php echo $product['id'] ?>">
											<h1><?php echo $product['name']?> <a href="#"><i class="fa fa-share-alt"></i> Share</a></h1>
											<div class="product-feature-c">
												<div class="product-feature-t">
													<h2 class="title-section">TÍNH NĂNG NỔI BẬT</h2>
													<ul>
														<li>- AutoX đem đến công nghệ làm lạnh nhanh và mạnh mẽ cho cả căn phòng.</li>
														<li>- Bảo vệ sức khỏe tốt hơn nhờ công nghệ Nanoe-G.</li>
														<li>- Máy lạnh tiết kiệm điện với máy biến tần Inverter và cảm biến Econavi.</li>
													</ul>
													<div class="sale-off">
														<h3>KHUYẾN MÃI</h3>
														<ul>
															<li>- Tặng kèm gói bảo hành 5 năm</li>
															<li>- Bao phí lắp đặt</li>
															<li>- Tặng ống đồng</li>
														</ul>
													</div>
												</div>
												<div class="product-feature-b clearfix">
													<p class="price"><span>Gía:</span> <?php echo number_format($product['price'], 0, ',', '.');?> đ</p>
													<div class="buy">
														<a href="javascript:void(0)" class="addShopping"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
														<a href="#">MUA NGAY</a>
													</div>
												</div>
											</div>
										</div>
										<div class="product-info">
											
											<h4 class="title-section">Thông số kỹ thuật</h4>
											<ul>
												<li>
													<span>MODEL</span>
													<span class="kt-detail"><?php echo $product['model'];?></span>
												</li>
												<li>
													<span>XUẤT XỨ</span>
													<span class="kt-detail"><?php echo $product['product_place'];?></span>
												</li>
												<li>
													<span>CÔNG SUẤT</span>
													<span class="kt-detail"><?php echo $product['hp'];?> HP</span>
												</li>
												<li>
													<span>DIỆN TÍCH SỬ DỤNG</span>
													<span class="kt-detail"><?php echo $product['useful'];?></span></li>
												<li>
													<span>TIÊU THỤ ĐIỆN</span>1 HP
												</li>
												<li>
													<span>BẢO HÀNH</span>
													<span class="kt-detail"><?php echo $product['guarantee'];?></span>
												</li>
												<li><span>NGÀY CẬP NHẬT</span> <?php echo date('d/m/Y', strtotime($product['modified']));?></li>
												<li><span>TÌNH TRẠNG</span>
													<?php
														if ($product['status'] == 1) {
															echo "Còn hàng";
														} elseif ($product['status'] == 0) {
															echo "Hết hàng";
														}
													?>
												</li>
											</ul>
										</div>
										<div class="product-text">
											<h5><a href="#" class="btnToggleText">GIỚI THIỆU TÍNH NĂNG SẢN PHẨM <i class="fa fa-caret-down" aria-hidden="true"></i></a></h5>
											<div class="product-text-c">
												<div class="product-text-c-in">
										<!-- 			<h6>Thiết kế trang nhã với gam màu trắng độc đáo</h6>
													<p>Với gam màu trắng nhã nhặn, máy lạnh Panasonic 1.5 HP CU/CS-U12SKH-8 có thiết kế khá tinh tế và hiện đại. Những đường viền quanh thân máy sắc sảo tạo nên độ sang trọng cho chiếc máy này. Với bề mặt dễ lau chùi, máy điều hòa Panasonic 1.5 HP CU/CS-U12SKH-8 sẽ giúp bạn dễ dàng vệ sinh máy một cách đơn giản nhất.</p>
													<img src="img/product-img-1.jpg" alt="">
													<h6>Thiết kế trang nhã với gam màu trắng độc đáo</h6>
													<p>Công suất của máy lạnh Panasonic 1.5 HP CU/CS-U12SKH-8, đảm bảo làm mát hoàn toàn những căn phòng có diện tích từ 15 đến 20 mét vuông. Do vậy, bạn có thể yên tâm mua chiếc máy lạnh này về và thư giãn trong một bầu không khí đầy sảng khoái.</p>
													<img src="img/product-img-2.jpg" alt="">
													<p>Công suất của máy lạnh Panasonic 1.5 HP CU/CS-U12SKH-8, đảm bảo làm mát hoàn toàn những căn phòng có diện tích từ 15 đến 20 mét vuông. Do vậy, bạn có thể yên tâm mua chiếc máy lạnh này về và thư giãn trong một bầu không khí đầy sảng khoái.</p> -->
													<?php echo $product['intro'];?>
												</div>
											</div>
										</div>
										<?php if ($relateProducts) :?>
										<div class="other-products">
											<h3 class="title-section">MÁY LẠNH TƯƠNG TỰ</h3>
											<div class="other-products-carousel">
												<?php foreach($relateProducts as $r_item) :?>
													<div class="item product-item">
														<div class="product-img">
															<a href="<?php echo \Uri::create('san-pham/' . $r_item['alias'] . '.html');?>">
																<?php
				                                                    $path = Asset::get_file('products/' . $r_item['avatar'], 'img');
				                                                    if (!empty($path)) {
				                                                        echo Asset::img('products/' . $r_item['avatar'], ['alt' => $r_item['name'], 'class' => 'img-responsive product-r-image', 'title' => $r_item['name']]);
				                                                    } else {
				                                                        echo Asset::img('no-image/no_image.jpg', ['alt' => $r_item['name'], 'class' => 'img-responsive product-r-image', 'title' => $r_item['name']]);
				                                                    }
				                                                ?>
															</a>
														</div>
														<div class="product-title">
															<h3><a href="<?php echo \Uri::create('san-pham/' . $r_item['alias'] . '.html');?>" title="<?php echo $r_item['name']?>"><?php echo $r_item['name']?></a></h3>
															<p class="price"><?php echo number_format($r_item['price'], 0, ',', '.');?> đ</p>
														</div>
													</div>
												<?php endforeach;?>
											</div>
										</div>
										<?php endif;?>
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
										</div>
										<div class="paper clearfix">
											<ul class="clearfix">
												<li class="active"><a href="#">1</a></li>
												<li><a href="#">2</a></li>
												<li><a href="#">3</a></li>
												<li><a href="#">Trang cuối</a></li>
											</ul>
										</div> -->
									</div>
								</div>
								<div class="col-md-6">
									<div class="product-feature pc-product-feature">
										<h1 ><?php echo $product['name']?> <div class="fb-share-button" data-href="<?php echo \Uri::create('san-pham/' . $r_item['alias'] . '.html');?>" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="<?php echo \Uri::create('san-pham/' . $r_item['alias'] . '.html');?>">Chia sẻ</a></div>
										</h1>

										<div class="product-feature-c">
											<div class="product-feature-t">
												<h2 class="title-section">TÍNH NĂNG NỔI BẬT</h2>
												<ul>
													<li>- AutoX đem đến công nghệ làm lạnh nhanh và mạnh mẽ cho cả căn phòng.</li>
													<li>- Bảo vệ sức khỏe tốt hơn nhờ công nghệ Nanoe-G.</li>
													<li>- Máy lạnh tiết kiệm điện với máy biến tần Inverter và cảm biến Econavi.</li>
												</ul>
												<div class="sale-off">
													<h3>KHUYẾN MÃI</h3>
													<ul>
														<li>- Tặng kèm gói bảo hành 5 năm</li>
														<li>- Bao phí lắp đặt</li>
														<li>- Tặng ống đồng</li>
													</ul>
												</div>
											</div>
											<div class="product-feature-b clearfix">
												<p class="price"><span>Gía:</span> <?php echo number_format($product['price'], 0, ',', '.');?> đ</p>
												<div class="buy">
													<a href="javascript:void(0)" class="addShopping"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
													<a href="#">MUA NGAY</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>
				</main>
			</div>
		</div>
	</div>
</section>
