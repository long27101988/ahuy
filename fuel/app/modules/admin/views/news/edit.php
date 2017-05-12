 <div class="row">
 		<form action="/public/admin/news/edit/<?php echo $newsinfo['id'] ?>" class="form-horizontal form-bordered" enctype="multipart/form-data" role="form" id="NewsAdminEditForm" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"></div>		<div class="col-xs-8" style="border-right:1px dotted #e2e2e2">
 			<!-- PAGE CONTENT BEGINS -->
 				<div class="form-group">
 					<label for="form-field-1" class="col-sm-3 control-label no-padding-right"> Tiêu đề <span class="red">(*)</span></label>

 					<div class="col-sm-9">
 						<div class="input text required"><input name="title" class="col-xs-10 col-sm-8" placeholder="Tiêu đề" maxlength="100" type="text" value="<?php echo $newsinfo['title'] ?>" id="NewsTitle" required="required"></div>					</div>
 				</div>
 				<div class="form-group">
 					<label for="form-field-1" class="col-sm-3 control-label no-padding-right"> Alias <span class="red">(*)</span></label>

 					<div class="col-sm-9">
 						<div class="input text"><input name="alias" class="col-xs-10 col-sm-8" placeholder="Alias" maxlength="200" type="text" value="<?php echo $newsinfo['alias'] ?>" id="NewsAlias"></div>					</div>
 				</div>

        <div class="form-group">
					<label for="form-field-1" class="col-sm-3 control-label no-padding-right"> Loại tin tức <span class="red">(*)</span></label>

					<div class="col-sm-9">
						<div class="input text">
							<select id="listcate" name="cate">
								<option value="">--Chọn loại tin--</option>
								<?php foreach($listCategories as $valcate) { ?>
									<option value="<?php echo $valcate['id'] ?>" <?php echo ($newsinfo['cateid'] == $valcate['id'])? "selected": ""; ?>><?php echo $valcate['name'] ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>

 				<div class="form-group">
 					<label for="form-field-1-1" class="col-sm-3 control-label no-padding-right"> Nội dung thu gọn <span class="red">(*)</span></label>
 					<div class="col-sm-9">

 						<textarea name="short_content" id="short-content-area" class="form-control" rows="5" maxlength="200"><?php echo $newsinfo['short_content'] ?></textarea>					</div>
 				</div>
 				<div class="space-4"></div>

        <div class="form-group">
					<label for="form-field-2" class="col-sm-3 control-label no-padding-right"> Nội dung </label>
					<div class="col-sm-9">
						<textarea name="content" id="content-area" class="form-control" rows="8"><?php echo $newsinfo['content'] ?></textarea>
					</div>
				</div>
				<div class="space-4"></div>


 				<div class="form-group">
 					<label for="form-field-2" class="col-sm-3 control-label no-padding-right">Ảnh đại diện</label>

 					<div class="col-sm-5">
              <?php if($newsinfo['avartar'] != ""){  ?>
 							        <img src="<?php echo '/public/assets/img/news/'.$newsinfo['avartar'] ?>" class="img-responsive" style="max-width: 150px" alt="">
              <?php } ?>
              <div class="input file"><input type="file" name="avartar" class="form-control" id="NewsAvarta"></div>
 					</div>
 				</div>
 				<div class="space-4"></div>
 		</div>
 		<div class="col-xs-4">
 			<div class="row">
 				<div class="col-sm-12">
 					<h4 class="header blue">Tag</h4>
          <select name="tags[]" multiple="multiple" class="form-control select2" id="NewsTags" tabindex="-1">
						<?php foreach ($listTags as $valtags) { ?>
							<option value="<?php echo $valtags['id'] ?>" <?php echo (in_array($valtags['id'], $listMetaTag)) ? "selected":""; ?> ><?php echo $valtags['t_name']?></option>
						<?php } ?>
	        </select>
        </div>
 				<div class="col-sm-12">
 					<h4 class="header blue">Meta Description</h4>
 					<textarea name="meta_desc" class="form-control" id="NewsMetaDesc"><?php echo $newsinfo['meta_desc'] ?></textarea>				</div>

 				<div class="col-sm-12">
 					<h4 class="header blue">Meta Keywords</h4>
 					<textarea name="meta_key" class="form-control" id="NewsMetaKey"><?php echo $newsinfo['meta_key'] ?></textarea>				</div>
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
