<section class="main-content">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<main class="primary">
					<div class="products-inner">
						<section class="search-products clearfix">
							<div>
								<label class="checkbox-inline">
									<input type="checkbox" id="inlineCheckbox1" value="option1"> Sản phẩm nổi bật
								</label>
								<label class="checkbox-inline">
									<input type="checkbox" id="inlineCheckbox2" value="option2"> Sản phẩm mới
								</label>
								<label class="checkbox-inline">
									<input type="checkbox" id="inlineCheckbox3" value="option3"> Giá tốt
								</label>
							</div>
							<div>
								<form action="" method="" class="product-search-form">
									<input type="text" placeholder="Tìm kiếm...">
									<button type="button"><i class="fa fa-search"></i></button>
								</form>
							</div>
						</section>
						<section class="list-products">
							<h2 class="title-section">SẢN PHẨM NỔI BẬT</h2>
							<div class="row">
								<?php foreach($listProducts as $item) :?>
									<div class="col-md-4 col-sm-6">
										<div class="product-item">
											<div class="product-img">
												<?php
	                          $path = Asset::get_file('products/' . $item['avatar'], 'img');
	                          if (!empty($path)) {
	                              echo Asset::img('products/' . $item['avatar'], ['alt' => $item['name'], 'class' => 'img-responsive product-i-image']);
	                          } else {
	                              echo Asset::img('no-image/no_image.jpg', ['alt' => $item['name'], 'class' => 'img-responsive product-i-image']);
	                          }
	                      ?>
												<div class="view-details">
													<div class="top">
														<div class="rating">
															<i class="fa fa-star star"></i>
															<i class="fa fa-star star"></i>
															<i class="fa fa-star star"></i>
															<i class="fa fa-star-half-o star"></i>
															<i class="fa fa-star-o star"></i>
														</div>
														<p>
															<!-- <span class="views"><i class="fa fa-eye"></i> 999+</span>&nbsp;&nbsp;&nbsp;<span class="share"><i class="fa fa-share-alt"></i> Share</span> -->
														</p>
													</div>
													<?php echo \Theme::instance()->asset->img('add.png', ['alt' => '']); ?>

													<div class="bottom">
														<a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
														<a href="#">MUA NGAY</a>
													</div>
													<div class="box-details">
														<ul>
															<li class="box-details-title">
																<h4><a href="<?php echo \Uri::create('san-pham/' . $item['alias'] . '.html');?>"><?php echo $item['name']?></a></h4>
															</li>
															<li class="box-details-image">
																<div class="slider owl-carousel">
														      <div class="item">
														      	<?php echo \Asset::img('products.jpg', ['alt' => '']); ?>
														      </div>
														      <div class="item">
														      	<?php echo \Asset::img('products.jpg', ['alt' => '']); ?>
														      </div>
														      <div class="item">
														      	<?php echo \Asset::img('products.jpg', ['alt' => '']); ?>
														      </div>
														      <div class="item">
														      	<?php echo \Asset::img('products.jpg', ['alt' => '']); ?>
														      </div>
														      <div class="item">
														      	<?php echo \Asset::img('products.jpg', ['alt' => '']); ?>
														      </div>
														    </div>
														    <div class="thumbnails owl-carousel">
														      <div class="item">
														      	<?php echo \Asset::img('products.jpg', ['alt' => '']); ?>
														      </div>
														      <div class="item">
														      	<?php echo \Asset::img('products.jpg', ['alt' => '']); ?>
														      </div>
														      <div class="item">
														      	<?php echo \Asset::img('products.jpg', ['alt' => '']); ?>
														      </div>
														      <div class="item">
														      	<?php echo \Asset::img('products.jpg', ['alt' => '']); ?>
														      </div>
														      <div class="item">
														      	<?php echo \Asset::img('products.jpg', ['alt' => '']); ?>
														      </div>
														    </div>
															</li>
															<li class="box-details-info-1">
																<div class="clearfix">
																	<h5>Thông số cơ bản</h5>
																	<p>
																		<a href="<?php echo \Uri::create('san-pham/' . $item['alias'] . '.html');?>">Chi tiết sản phẩm <i class="fa fa-caret-right" aria-hidden="true"></i>
																		</a>
																	</p>
																</div>
															</li>
															<li class="box-details-info-2">
																<ul>
																	<li>- Công suất: <?php echo $item['hp'];?> HP</li>
																	<li>- Máy lạnh thường</li>
																	<li>- Phạm vi làm lạnh: <?php echo $item['useful'];?></li>
																	<li>- Bảo hành: <?php echo $item['guarantee'];?></li>
																	<li>- Sản xuất tại: <?php echo $item['product_place'];?></li>
																</ul>
															</li>
															<li class="box-details-price">
																<div class="clearfix">
																	<p class="price"><?php echo number_format($item['price'], 0, ',', '.');?> đ</p>
																	<div class="buy">
																		<a href="javascript:void(0)" class="addShopping"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
																		<a href="#">MUA NGAY</a>
																	</div>
																</div>
															</li>
														</ul>


														<!-- <a class="box-details-close" href="#"><i class="fa fa-times"></i></a> -->
													</div>
												</div>

											</div>
											<div class="product-title">
												<h3><a href="<?php echo \Uri::create('san-pham/' . $item['alias'] . '.html');?>"><?php echo $item['name']?></a></h3>
												<p class="price"><?php echo number_format($item['price'], 0, ',', '.');?> đ</p>
											</div>
										</div>
									</div>
								<?php endforeach;?>
							</div>
						</section>
					</div>
				</main>
				<div class="paper clearfix">
					<?php echo $pagination;?>
				</div>
				<section class="home-partner">
					<h2 class="title-1">THƯƠNG HIỆU ĐỐI TÁC</h2>
					<div class="owl-carousel home-partner-carousel">
						<!-- Slides -->
						<div class="item">
							<div class="item-inner">
								<a href="#" target="_blank">
									<?php echo \Asset::img('partner-1.png', ['alt' => '']); ?>
								</a>
							</div>
						</div>
						<div class="item">
							<div class="item-inner">
								<a href="#" target="_blank">
									<?php echo \Asset::img('partner-2.png', ['alt' => '']); ?>
								</a>
							</div>
						</div>
						<div class="item">
							<div class="item-inner">
								<a href="#" target="_blank">
									<?php echo \Asset::img('partner-3.png', ['alt' => '']); ?>
								</a>
							</div>
						</div>
						<div class="item">
							<div class="item-inner">
								<a href="#" target="_blank">
									<?php echo \Asset::img('partner-4.png', ['alt' => '']); ?>
								</a>
							</div>
						</div>
						<div class="item">
							<div class="item-inner">
								<a href="#" target="_blank">
									<?php echo \Asset::img('partner-1.png', ['alt' => '']); ?>
								</a>
							</div>
						</div>
						<div class="item">
							<div class="item-inner">
								<a href="#" target="_blank">
									<?php echo \Asset::img('partner-2.png', ['alt' => '']); ?>
								</a>
							</div>
						</div>
						<div class="item">
							<div class="item-inner">
								<a href="#" target="_blank">
									<?php echo \Asset::img('partner-3.png', ['alt' => '']); ?>
								</a>
							</div>
						</div>
						<div class="item">
							<div class="item-inner">
								<a href="#" target="_blank">
									<?php echo \Asset::img('partner-4.png', ['alt' => '']); ?>
								</a>
							</div>
						</div>
					</div>
				</section><!-- home-partner -->
			</div>
			<div class="col-md-3">
				<aside class="sidebar sidebar-2">
					<div class="sidebar-box">
						<h3 class="box-title company-title title-collapse">Chọn hãng  <i class="fa fa-caret-up" aria-hidden="true"></i></h3>
						<div class="box-content company">
							<div class="checkbox">
								<label>
									<input type="checkbox" value=""> Panasonic (Nhật Bản)
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" value=""> Daikin (Nhật Bản)
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" value=""> Toshiba (Nhật Bản)
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" value=""> Elextrolux (Thụy Điển)
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" value=""> Samsung (Hàn Quốc)
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" value=""> Sharp (Nhật Bản)
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" value=""> Panasonic (Nhật Bản)
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" value=""> Daikin (Nhật Bản)
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" value=""> Toshiba (Nhật Bản)
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" value=""> Elextrolux (Thụy Điển)
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" value=""> Samsung (Hàn Quốc)
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" value=""> Sharp (Nhật Bản)
								</label>
							</div>
						</div>
					</div>
					<div class="sidebar-box">
						<h3 class="box-title title-collapse">Loại máy <i class="fa fa-caret-up" aria-hidden="true"></i></h3>
						<div class="box-content">
							<div class="checkbox">
								<label>
									<input type="checkbox" value=""> Máy lạnh thường
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" value=""> Máy lạnh Inverter<br/>(Tiết kiệm điện)
								</label>
							</div>
						</div>
					</div>
					<div class="sidebar-box">
						<h3 class="box-title">Chọn mức giá</h3>
						<div class="box-content">
							<div class="slider-price clearfix">
								<div class="clearfix">
									<span id="min-price"></span>
									<span id="max-price"></span>
								</div>
								<div id="slider-price"></div>
							</div>
						</div>
					</div>
					<div class="sidebar-box">
						<h3 class="box-title">Công suốt lạnh (HP)</h3>
						<div class="box-content">
							<div class="slider-ph clearfix">
								<div class="clearfix">
									<span id="min-ph"></span>
									<span id="max-ph"></span>
								</div>
								<div id="slider-ph"></div>
							</div>
						</div>
					</div>
				</aside>
			</div>
		</div>
	</div>
</section>
