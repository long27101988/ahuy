<div class="row">
	<form action="/admin/show/edit/<?php echo $newsinfo['id'] ?>" class="form-horizontal form-bordered" enctype="multipart/form-data" role="form" id="NewsAdminEditForm" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"></div>		<div class="col-xs-8" style="border-right:1px dotted #e2e2e2">
	<!-- PAGE CONTENT BEGINS -->
		<div class="form-group">
			<label for="form-field-1" class="col-sm-3 control-label no-padding-right"> Tiêu đề <span class="red">(*)</span></label>
			<div class="col-sm-9">
				<div class="input text required">
					<input name="title" class="col-xs-10 col-sm-8" placeholder="Tiêu đề" maxlength="100" type="text" value="<?php echo $newsinfo['title'] ?>" id="NewsTitle" required="required">
				</div>					
			</div>
		</div>
		<div class="form-group">
			<label for="form-field-1" class="col-sm-3 control-label no-padding-right"> Tiêu đề trang <span class="red">(*)</span></label>
			<div class="col-sm-9">
				<div class="input text required">
					<input name="title_page" class="col-xs-10 col-sm-8" placeholder="Tiêu đề trang" maxlength="100" type="text" value="<?php echo $newsinfo['title_page'] ?>" id="PageTitle" required="required">
				</div>					
			</div>
		</div>
		<div class="form-group">
			<label for="form-field-1-1" class="col-sm-3 control-label no-padding-right"> Nội dung text 1 <span class="red">(*)</span></label>
			<div class="col-sm-9">
			<textarea name="text1" id="content-area-1" class="form-control" rows="5" maxlength="200"><?php echo $newsinfo['text1'] ?></textarea>					</div>
		</div>
		<div class="space-4"></div>
		<div class="form-group">
			<label for="form-field-2" class="col-sm-3 control-label no-padding-right"> Nội dung text 2 </label>
			<div class="col-sm-9">
				<textarea name="text2" id="content-area-2" class="form-control" rows="8"><?php echo $newsinfo['text2'] ?></textarea>
			</div>
		</div>
		<div class="space-4"></div>
		<div class="form-group">
			<label for="form-field-2" class="col-sm-3 control-label no-padding-right"> Nội dung text 3 </label>
			<div class="col-sm-9">
				<textarea name="text3" id="content-area-3" class="form-control" rows="8"><?php echo $newsinfo['text3'] ?></textarea>
			</div>
		</div>
		<div class="space-4"></div>
		<div class="form-group">
			<label for="form-field-2" class="col-sm-3 control-label no-padding-right"> Nội dung text 4 </label>
			<div class="col-sm-9">
				<textarea name="text4" id="content-area-4" class="form-control" rows="8"><?php echo $newsinfo['text4'] ?></textarea>
			</div>
		</div>
		<div class="space-4"></div>
		<div class="form-group">
			<label for="form-field-2" class="col-sm-3 control-label no-padding-right"> Nội dung text 5 </label>
			<div class="col-sm-9">
				<textarea name="text5" id="content-area-5" class="form-control" rows="8"><?php echo $newsinfo['text5'] ?></textarea>
			</div>
		</div>
		<div class="space-4"></div>
		<div class="form-group">
			<label for="form-field-2" class="col-sm-3 control-label no-padding-right"> Nội dung text 6 </label>
			<div class="col-sm-9">
				<textarea name="text6" id="content-area-6" class="form-control" rows="8"><?php echo $newsinfo['text6'] ?></textarea>
			</div>
		</div>
		<div class="space-4"></div>
		<div class="form-group">
			<label for="form-field-2" class="col-sm-3 control-label no-padding-right"> Nội dung text 7 </label>
			<div class="col-sm-9">
				<textarea name="text7" id="content-area-7" class="form-control" rows="8"><?php echo $newsinfo['text7'] ?></textarea>
			</div>
		</div>
		<div class="space-4"></div>
		<div class="form-group">
			<label for="form-field-2" class="col-sm-3 control-label no-padding-right"> Nội dung text 8 </label>
			<div class="col-sm-9">
				<textarea name="text8" id="content-area-8" class="form-control" rows="8"><?php echo $newsinfo['text8'] ?></textarea>
			</div>
		</div>
		<div class="space-4"></div>
	</div>
	<div class="col-xs-4">
		<div class="row">
			<div class="col-sm-12">
				<h4 class="header blue">Meta Description</h4>
			<textarea name="meta_desc" class="form-control" id="NewsMetaDesc"><?php echo $newsinfo['meta_desc'] ?></textarea>				</div>
			<div class="col-sm-12">
				<h4 class="header blue">Meta Keywords</h4>
			<textarea name="meta_key" class="form-control" id="NewsMetaKey"><?php echo $newsinfo['meta_key'] ?></textarea>				</div>
			<div class="col-sm-12">
				<h4 class="header blue">Meta Description</h4>
				<input name="codeanalytics" class="col-xs-10 col-sm-8" placeholder="Code google analytics" maxlength="100" type="text" value="<?php echo $newsinfo['codeanalytics'] ?>" id="CodeGA">				</div>
		</div>
	</div>
	<div class="col-xs-12">
		<div class="row">
			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					<button type="submit" class="btn btn-info">
					<i class="ace-icon fa fa-check bigger-110"></i>
					Cập nhật
					</button>
					&nbsp; &nbsp;
				</div>
			</div>
		</div>
	</div>
	<div class="hr hr-24"></div>
</form></div>
<script type="text/javascript">
tinymce.init({
selector: "#content-area-1",
plugins: [
" advlist  lists link image charmap print preview",
"searchreplace visualblocks code fullscreen",
"insertdatetime media table contextmenu paste filemanager textcolor"
],
toolbar: "insertfile undo redo |  bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview media fullpage | forecolor backcolor emoticons | pagebreak | fontsizeselect",
fontsize_formats: "8px 10px 12px 14px 16px 18px 20px 24px 36px",
});
tinymce.init({
selector: "#content-area-2",
plugins: [
" advlist  lists link image charmap print preview",
"searchreplace visualblocks code fullscreen",
"insertdatetime media table contextmenu paste filemanager textcolor"
],
toolbar: "insertfile undo redo |  bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview media fullpage | forecolor backcolor emoticons | pagebreak | fontsizeselect",
fontsize_formats: "8px 10px 12px 14px 16px 18px 20px 24px 36px",
});
tinymce.init({
selector: "#content-area-3",
plugins: [
" advlist  lists link image charmap print preview",
"searchreplace visualblocks code fullscreen",
"insertdatetime media table contextmenu paste filemanager textcolor"
],
toolbar: "insertfile undo redo |  bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview media fullpage | forecolor backcolor emoticons | pagebreak | fontsizeselect",
fontsize_formats: "8px 10px 12px 14px 16px 18px 20px 24px 36px",
});
tinymce.init({
selector: "#content-area-4",
plugins: [
" advlist  lists link image charmap print preview",
"searchreplace visualblocks code fullscreen",
"insertdatetime media table contextmenu paste filemanager textcolor"
],
toolbar: "insertfile undo redo |  bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview media fullpage | forecolor backcolor emoticons | pagebreak | fontsizeselect",
fontsize_formats: "8px 10px 12px 14px 16px 18px 20px 24px 36px",
});
tinymce.init({
selector: "#content-area-5",
plugins: [
" advlist  lists link image charmap print preview",
"searchreplace visualblocks code fullscreen",
"insertdatetime media table contextmenu paste filemanager textcolor"
],
toolbar: "insertfile undo redo |  bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview media fullpage | forecolor backcolor emoticons | pagebreak | fontsizeselect",
fontsize_formats: "8px 10px 12px 14px 16px 18px 20px 24px 36px",
});
tinymce.init({
selector: "#content-area-6",
plugins: [
" advlist  lists link image charmap print preview",
"searchreplace visualblocks code fullscreen",
"insertdatetime media table contextmenu paste filemanager textcolor"
],
toolbar: "insertfile undo redo |  bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview media fullpage | forecolor backcolor emoticons | pagebreak | fontsizeselect",
fontsize_formats: "8px 10px 12px 14px 16px 18px 20px 24px 36px",
});
tinymce.init({
selector: "#content-area-7",
plugins: [
" advlist  lists link image charmap print preview",
"searchreplace visualblocks code fullscreen",
"insertdatetime media table contextmenu paste filemanager textcolor"
],
toolbar: "insertfile undo redo |  bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview media fullpage | forecolor backcolor emoticons | pagebreak | fontsizeselect",
fontsize_formats: "8px 10px 12px 14px 16px 18px 20px 24px 36px",
});
tinymce.init({
selector: "#content-area-8",
plugins: [
" advlist  lists link image charmap print preview",
"searchreplace visualblocks code fullscreen",
"insertdatetime media table contextmenu paste filemanager textcolor"
],
toolbar: "insertfile undo redo |  bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview media fullpage | forecolor backcolor emoticons | pagebreak | fontsizeselect",
fontsize_formats: "8px 10px 12px 14px 16px 18px 20px 24px 36px",
});
$('#content-area-1').removeAttr('required');
$('#content-area-2').removeAttr('required');
$('#content-area-3').removeAttr('required');
$('#content-area-4').removeAttr('required');
$('#content-area-5').removeAttr('required');
$('#content-area-6').removeAttr('required');
$('#content-area-7').removeAttr('required');
$('#content-area-8').removeAttr('required');
</script>