<section class="title-page">
	<div class="container">
		<h1 class="title-1">
			<?php
				switch ($controller) {
					case 'page':
						echo "GIỚI THIỆU";
						break;
					case 'project':
						echo "DỰ ÁN";
						break;
					case 'service':
						echo "DỊCH VỤ";
						break;
					case 'product':
						echo "SẢN PHẨM";
						break;
					case 'news':
						echo "TIN TỨC";
						break;
					case 'contact':
						echo "LIÊN HỆ";
						break;					
					
					default:
						# code...
						break;
				}
			?>
		</h1>
	</div>
</section>