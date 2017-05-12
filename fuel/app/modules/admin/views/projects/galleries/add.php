<div class="row">
		<form action="/public/admin/projects/addimg/<?php echo $idProject ?>" class="form-horizontal form-bordered" enctype="multipart/form-data" role="form" id="NewsAdminAddForm" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"></div>
		<div class="col-xs-12" style="border-right:1px dotted #e2e2e2">
			<!-- PAGE CONTENT BEGINS -->
			<div class="row">
				<div class="form-group">
					<label for="form-field-1" class="col-sm-3 control-label no-padding-right"> Hình 1 <span class="red">(*)</span></label>

					<div class="col-sm-9">
						<div class="input text required">
							<input name="image[]" class="col-xs-10 col-sm-8" type="file">
						</div>
					</div>
				</div>

				<div class="space-4"></div>

				<div class="form-group">
					<label for="form-field-1" class="col-sm-3 control-label no-padding-right control-label no-padding-right"> Mô tả cho hình 1<span class="red">(*)</span></label>
					<div class="col-sm-9">
						<div class="input text required">
							<textarea name="des[]" rows="3" cols="40"></textarea>
						</div>
					</div>
				</div>
			</div>

			<div class="addmore">

			</div>
			<div class="col-xs-12">
				<div class="row">
					<div class="clearfix">
						<div class="col-md-offset-3 col-md-9">
							<button type="button" class="btn btn-success addFieldUpload">
								<i class="ace-icon fa fa-check bigger-110"></i>
								Add More
							</button>
							<input type="hidden" name="number_field_upload" value="1">
						</div>
					</div>
				</div>
			</div>


		</div>
		<div class="col-xs-12">
			<div class="row">
				<div class="clearfix form-actions">
					<div class="col-md-offset-3 col-md-9">
						<button type="submit" class="btn btn-info">
							<i class="ace-icon fa fa-check bigger-110"></i>
							Submit
						</button>
					</div>
				</div>
			</div>
		</div>
		<div class="hr hr-24"></div>
		</form>	</div>

		<script type="text/javascript">
			 tinymce.init({
					 selector: "#content-area" ,
								plugins: [
									 " advlist  lists link image charmap print preview",
									 "searchreplace visualblocks code fullscreen",
									 "insertdatetime media table contextmenu paste filemanager textcolor"
							 ],
					 toolbar: "insertfile undo redo |  bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview media fullpage | forecolor backcolor emoticons | pagebreak | fontsizeselect",
					 fontsize_formats: "8px 10px 12px 14px 16px 18px 20px 24px 36px",
			 });

			 $('#content-area').removeAttr('required');
		</script>
