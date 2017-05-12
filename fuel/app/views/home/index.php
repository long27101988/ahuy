<section class="home-section2">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php echo $text2; ?>
			</div>
			
		</div>
	</div>
</section>

<section class="home-section3">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php echo $text3; ?>
			</div>
		</div>
	</div>
</section>

 <!-- service -->
<?php if(!empty($text4) || !empty($text5) || !empty($text6) || !empty($text7)) { ?>
<section class="home-section4">
	<div class="container-wrapper">
		<div class="col-md-12">
			<div class="row">
				<?php if(!empty($text4) ||  !empty($text6)) {?>
					<div class="col-md-6" style="padding-right: 10px; padding-left: 0px;">
						<?php if(!empty($text4)) {?>
						<div class="home-cube-first"><?php echo $text4; ?></div> 
						<?php } ?>
						<?php if(!empty($text6)) {?>
						<div class="home-cube"><?php echo $text6; ?></div> 
						<?php } ?>
					</div>
				<?php } ?>
				<?php if(!empty($text5) ||  !empty($text7)) {?>
					<div class="col-md-6" style="padding-right: 0px; padding-left: 10px;">
						<?php if(!empty($text5)) {?>
						<div class="home-cube-first"><?php echo $text5; ?></div> 
						<?php } ?>
						<?php if(!empty($text7)) {?>
						<div class="home-cube"><?php echo $text7; ?></div>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</section><!-- home-service -->
<?php } ?>
<!-- <section class="home-map">
	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15677.084629590647!2d106.6807236!3d10.790532!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x816a806ca248851e!2zQ8OUTkcgVFkgVE5ISCBDxqAgxJBJ4buGTiBM4bqgTkggxJDhuqBJIFBIw5o!5e0!3m2!1svi!2s!4v1468425733012" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
</section> --><!-- home-map