<section class="main-content">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<main class="primary">
					<div class="contact-inner">
						<div class="map-region">
							<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15677.084629590647!2d106.6807236!3d10.790532!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x816a806ca248851e!2zQ8OUTkcgVFkgVE5ISCBDxqAgxJBJ4buGTiBM4bqgTkggxJDhuqBJIFBIw5o!5e0!3m2!1svi!2s!4v1468425733012" width="100%" height="345" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>
						<div class="contact-infor">
							<h1 class="company-name">CÔNG TY TNHH CƠ ĐIỆN LẠNH ĐẠI PHÚ</h1>
							<div class="col-md-6 col-sm-6 no-padding-left">
								<ul class="company-address">
									<li>
										<i class="fa fa-map-marker" aria-hidden="true"></i>
										108/44A1 Trần Quang Diệu, P.14, Q.3 TP.HCM
									</li>
									<li>
										<i aria-hidden="true" class="fa fa-phone"></i>
										08.22663399 - 0969 3333 78 - 0989 2942 31
									</li>
									<li>
										<i aria-hidden="true" class="fa fa-envelope"></i>
										<a href="mailto:daiphu6699co.ltd@gmail.com">daiphu6699co.ltd@gmail.com</a>
									</li>
								</ul>
							</div>
							<div class="col-md-6 col-sm-6 no-padding-left">
								<ul class="company-open">
									<li>
										<i class="fa fa-clock-o" aria-hidden="true"></i>
										Thứ 2 - Thứ 6: 08:00 - 17:00
									</li>
									<li>
										<span>&nbsp;&nbsp;&nbsp;</span>
										Thứ 7 - CN:     08:00 - 12:00
									</li>									
								</ul>
							</div>	
						</div>
						<div class="contact-form">
							<p class="contanct-form-title">GỬI PHẢN HỒI</p>						
							<form accept-charset="utf-8" method="post" class="form-horizontal" action="<?php echo \Uri::create('/lien-he')?>">
								<div class="form-group">									
									<div class="col-md-9 col-sm-12">
										<input type="text" maxlength="50" placeholder="Họ tên" class="form-control" name="fullname">					
									</div>
								</div>	
								<div class="form-group">									
									<div class="col-md-3 col-sm-4 col-xs-5">
										<input type="text" maxlength="20" placeholder="Số điện thọai" class="form-control" name="phone">					
									</div>
									<div class="col-md-6 col-sm-8 col-xs-7">
										<input type="text" maxlength="50" placeholder="Email" class="form-control" name="email">					
									</div>
								</div>	
								<div class="form-group">									
									<div class="col-md-9 col-sm-12">
										<textarea class="form-control" name="content" rows="5"></textarea>
									</div>
								</div>	

								<div class="form-group">
							        <div class="col-md-9 col-sm-12">
							          <button type="submit" class="btn btn-blue pull-right">Gửi</button>		         
							        </div>
							    </div>
							</form>
						</div>
					</div>
				</main>
			</div>
			<?php echo $sidebar;?>
		</div>
	</div>
</section>