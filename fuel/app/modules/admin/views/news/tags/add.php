<div class="row">
		<form action="/public/admin/news/tags/add" class="form-horizontal form-bordered" enctype="multipart/form-data" role="form" id="NewsAdminAddForm" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"></div>
			<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
				<div class="form-group">
					<label for="form-field-1" class="col-sm-3 control-label no-padding-right"> Tag name<span class="red">(*)</span></label>

					<div class="col-sm-9">
						<div class="input text required"><input name="t_name" class="col-xs-10 col-sm-8" placeholder="Tag name" maxlength="200" type="text" id="NewsTitle" required="required"></div>					</div>
				</div>
				<div class="form-group">
					<label for="form-field-1" class="col-sm-3 control-label no-padding-right"> Alias <span class="red">(*)</span></label>

					<div class="col-sm-9">
						<div class="input text"><input name="alias" class="col-xs-10 col-sm-8" placeholder="Alias" maxlength="200" type="text" id="NewsAlias"></div>					</div>
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
