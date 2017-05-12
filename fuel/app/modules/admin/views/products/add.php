<div class="row">
		<form action="/public/admin/products/add" class="form-horizontal form-bordered" enctype="multipart/form-data" role="form" id="NewsAdminAddForm" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"></div>
			<div class="col-xs-8" style="border-right:1px dotted #e2e2e2">
			<!-- PAGE CONTENT BEGINS -->
				<div class="form-group">
					<label for="form-field-1" class="col-sm-3 control-label no-padding-right"> Tên sản phẩm <span class="red">(*)</span></label>

					<div class="col-sm-9">
						<div class="input text required"><input name="name" class="col-xs-10 col-sm-8" placeholder="Tên sản phẩm " maxlength="200" type="text" id="NewsTitle" required="required"></div>					</div>
				</div>

				<div class="form-group">
					<label for="form-field-1" class="col-sm-3 control-label no-padding-right"> Alias <span class="red">(*)</span></label>

					<div class="col-sm-9">
						<div class="input text required"><input name="alias" class="col-xs-10 col-sm-8" placeholder="Alias" maxlength="200" type="text" id="NewsTitle" required="required"></div>					</div>
				</div>

				<div class="form-group">
					<label for="form-field-1" class="col-sm-3 control-label no-padding-right"> Model <span class="red">(*)</span></label>
					<div class="col-sm-9">
						<div class="input text">
              <input name="model" class="col-xs-10 col-sm-8" placeholder="Model" maxlength="200" type="text" id="NewsAlias"></div>					</div>
				</div>

        <div class="form-group">
					<label for="form-field-1-1" class="col-sm-3 control-label no-padding-right"> Nơi sản xuất <span class="red">(*)</span></label>
					<div class="col-sm-9">
            <input type="text" name="product_place" class="form-control" placeholder="Nơi sản xuất" maxlength="200">
					</div>
				</div>

        <div class="form-group">
					<label for="form-field-1-1" class="col-sm-3 control-label no-padding-right"> Công suất <span class="red">(*)</span></label>
					<div class="col-sm-9">
            <input type="text" name="capacity" placeholder="Công suất" class="form-control" maxlength="200">
  				</div>
				</div>

				<div class="form-group">
					<label for="form-field-1-1" class="col-sm-3 control-label no-padding-right"> Tiêu thụ điện <span class="red">(*)</span></label>
					<div class="col-sm-9">
            <input type="text" name="hp" placeholder="Tiêu thụ điện" class="form-control" maxlength="200">
  				</div>
				</div>

        <div class="form-group">
					<label for="form-field-1-1" class="col-sm-3 control-label no-padding-right"> Công dụng <span class="red">(*)</span></label>
					<div class="col-sm-9">
            <input type="text" name="useful" placeholder="Công dụng" class="form-control" maxlength="200">
          </div>
				</div>

        <div class="form-group">
					<label for="form-field-1-1" class="col-sm-3 control-label no-padding-right"> Bảo hành <span class="red">(*)</span></label>
					<div class="col-sm-9">
						<input type="text" name="guarantee" class="form-control" placeholder="Bảo hành"  maxlength="200">
          </div>
				</div>

        <div class="form-group">
					<label for="form-field-1-1" class="col-sm-3 control-label no-padding-right"> Giá <span class="red">(*)</span></label>
					<div class="col-sm-9">
						<input type="text" name="price" class="form-control" placeholder="Giá"  maxlength="200">
          </div>
				</div>

        <div class="form-group">
					<label for="form-field-1-1" class="col-sm-3 control-label no-padding-right"> Giá cũ <span class="red">(*)</span></label>
					<div class="col-sm-9">
						<input type="text" name="price_old" class="form-control" placeholder="Giá cũ"  maxlength="200">
          </div>
				</div>

        <div class="form-group">
					<label for="form-field-1-1" class="col-sm-3 control-label no-padding-right"> Category <span class="red">(*)</span></label>
					<div class="col-sm-9">
            <select id="category" name="category_id">
              <option value="">--Chọn category--</option>
              <?php foreach($listCategories as $kcate => $valcate) { ?>
                <option value="<?php echo $valcate['id'] ?>"><?php echo $valcate['name'] ?></option>
              <?php } ?>
            </select>
					</div>
				</div>

				<div class="space-4"></div>

				<div class="form-group">
					<label for="form-field-2" class="col-sm-3 control-label no-padding-right"> Mô tả sản phẩm </label>
					<div class="col-sm-9">
						<textarea name="intro" id="content-area" class="form-control" rows="8"></textarea>
					</div>
				</div>
				<div class="space-4"></div>

				<div class="form-group">
					<label for="form-field-2" class="col-sm-3 control-label no-padding-right"> Thông số kỹ thuật </label>
					<div class="col-sm-9">
						<textarea name="specifications" id="content-area1" class="form-control" rows="8"></textarea>
					</div>
				</div>
				<div class="space-4"></div>

        <div class="form-group">
					<label for="form-field-2" class="col-sm-3 control-label no-padding-right"> Tính năng nổi bật</label>
					<div class="col-sm-9">
						<textarea name="most_important" id="content-area2" class="form-control" rows="8"></textarea>
					</div>
				</div>
				<div class="space-4"></div>

        <div class="form-group">
					<label for="form-field-2" class="col-sm-3 control-label no-padding-right"> Khuyến mãi</label>
					<div class="col-sm-9">
						<textarea name="promotions" id="content-area3" class="form-control" rows="8"></textarea>
					</div>
				</div>
				<div class="space-4"></div>

				<div class="form-group">
				<label for="form-field-2" class="col-sm-3 control-label no-padding-right">Ảnh đại diện</label>
				<div class="col-sm-5">
						<div class="input file"><input type="file" name="avatar" class="form-control" id="ProductsAvartar"></div>										</div>
				</div>
				<div class="space-4"></div>
		</div>
		<div class="col-xs-4">
			<div class="row">

				<div class="col-sm-12">
						<h4 class="header blue">Tag</h4>
		        <select name="tags[]" multiple="multiple" class="form-control select2" id="ProductsTags" tabindex="-1">
							<?php foreach ($listTags as $valtags) { ?>
								<option value="<?php echo $valtags['id'] ?>"><?php echo $valtags['t_name']?></option>
							<?php } ?>
		        </select>
	      </div>

				<div class="col-sm-12">
					<h4 class="header blue">Meta Description</h4>
					<textarea name="meta_desc" class="form-control" id="NewsMetaDesc"></textarea>
				</div>

				<div class="col-sm-12">
					<h4 class="header blue">Meta Keywords</h4>
					<textarea name="meta_key" class="form-control" id="NewsMetaKey"></textarea>
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
						<button type="reset" class="btn">
							<i class="ace-icon fa fa-undo bigger-110"></i>
							Reset
						</button>
					</div>
				</div>
			</div>
		</div>
		<div class="hr hr-24"></div>
		</form>	</div>

		<script type="text/javascript">
			 tinymce.init({
					 selector: "#content-area, #content-area1, #content-area2, #content-area3",
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
