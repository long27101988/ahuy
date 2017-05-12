<section class="main-content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <main class="primary">
          <div class="products-inner">
            <section class="search-products clearfix">
							<div>
							<a href="public/san-pham">Quay lại trang sản phẩm</a>
							</div>
							<div>
								<form action="" method="" class="product-search-form">
									<input type="text" placeholder="Tìm kiếm...">
									<button type="button"><i class="fa fa-search"></i></button>
								</form>
							</div>
						</section>
            <hr>
            <section>


              <form accept-charset="utf-8" action="<?php echo \Uri::create('/san-pham/thanh-toan')?>" method="POST">
                <h3>Thông tin đơn đặt hàng</h3>
                <input type="text" name="name_order" placeholder="Ông/Bà">
                <input type="text" name="email_order" value="Email">
                <input type="text" name="address_order" value="Địa chỉ">

                <h3>Thông tin nhận hàng</h3>
                <input type="checkbox" name="same_order"> Giống thông tin đặt hàng
                <input type="text" name="name_ship" placeholder="Ông/Bà">
                <input type="text" name="email_ship" value="Email">
                <input type="text" name="address_ship" value="Địa chỉ">
                <textarea name="note" rows="8" cols="40">Ghi chú</textarea>
                <button type="submit" class="btn btn-blue pull-right">Gửi</button>
              </form>
            </section>
          </div>
        </main>
      </div>
    </div>
  </div>
</section>
