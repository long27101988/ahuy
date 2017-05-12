	<footer id="footer" class="footer">
		<div class="t-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<?php if(!empty($dataText8)) {
							echo $dataText8;
						} ?>
					</div>	
				</div>
			</div>
		</div><!-- t-footer -->
	</footer><!-- footer -->
	<?php if(!empty($codeAnalytic)) { ?>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	 ga('create', '<?php echo $codeAnalytic; ?>', 'auto');
	  ga('send', 'pageview');

	</script>
	<?php 
	}

	echo \Theme::instance()->asset->js(
		[
			'plugins/jquery-1.11.3.min.js',
			'plugins/jquery-ui.min.js',
			'plugins/bootstrap.min.js',
			'plugins/_owl.carousel.js',
			'plugins/owl.carousel.min.js',
			'plugins/jquery.mCustomScrollbar.concat.min.js',
			'plugins/jquery.sticky.js',
			'script.js',
			'fb.js',
		]
	);
	?>

