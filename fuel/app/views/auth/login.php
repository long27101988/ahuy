<div class="widget-body">
	<div class="widget-main">
		<h4 class="header blue lighter bigger">
			<i class="ace-icon fa fa-lock green"></i>
			 Đăng nhập 
		</h4>
		<div class="space-6"></div>
		<?php //echo $this->Session->flash();?>
		<?php 
			echo \Form::open();
		?>
			<fieldset>
				<label class="block clearfix">
					<span class="block input-icon input-icon-right">
						<?php 
							echo \Form::input('username', '', ['class' => 'form-control', 'placeholder' => 'Tài khoản']);		
						?>				
						<i class="ace-icon fa fa-user"></i>
					</span>
				</label>
				<label class="block clearfix">
					<span class="block input-icon input-icon-right">
						<?php 
							echo \Form::input('password', '', ['class' => 'form-control', 'placeholder' => 'Mật khẩu', 'type' => 'password']);		
						?>			
						<i class="ace-icon fa fa-lock"></i>
					</span>
				</label>
				<div class="space"></div>
				<div class="clearfix">
					<label class="inline">
						<?php 
							echo \Form::input('remember', '', ['class' => 'ace', 'type' => 'checkbox', 'value' => 1]);		
						?>						
						<span class="lbl"> Nhớ đăng nhập</span>
					</label>

					<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
						<i class="ace-icon fa fa-key"></i>
						<span class="bigger-110">Login</span>
					</button>
				</div>
				<div class="space-4"></div>
			</fieldset>
		<?php 
			echo \Form::close();
		?>
	</div><!-- /.widget-main -->
</div><!-- /.widget-body -->