<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Đăng nhập vào hệ thống</title>
		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />
		<?php 
			echo \Theme::instance()->asset->css([
				'bootstrap.min.css',
				'font-awesome/4.2.0/css/font-awesome.min.css',
				 'ace.min.css',
				'bootstrap.min.css',
				'custom.css',
			]);
		?>
		
		<!-- text fonts -->
		<style type="text/css">
			h4.bigger {
				font-size: 24px;
			}
			select, input[type] {
				font-weight: normal;
			}
		</style>
	</head>
	<body class="login-layout" style="background-color: #0b87c9">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="space-6"></div>

							<div class="position-relative" style="margin-top: 90px;">
								<div id="login-box" class="login-box visible widget-box no-border" style="background-color: #f7f7f7">
									<?php echo @$content;?>
								</div><!-- /.login-box -->
							</div><!-- /.position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->
		<?php 
			echo \Theme::instance()->asset->js([
				'2.1.1/jquery.min.js',
				'bootstrap.min.js'
			]);
		?>
	</body>
</html>
