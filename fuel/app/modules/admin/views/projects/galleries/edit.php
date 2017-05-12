 <div class="row">
 		<form action="/public/admin/projects/editimg/<?php echo $imgInfo['project_id'] ?>/<?php echo $imgInfo['id'] ?>" class="form-horizontal form-bordered" enctype="multipart/form-data" role="form" id="ProjectsAdminEditForm" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"></div>
      <div class="col-xs-12" style="border-right:1px dotted #e2e2e2">
 			<!-- PAGE CONTENT BEGINS -->
      <div class="form-group">
        <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> Hình <span class="red">(*)</span></label>

        <div class="col-sm-9">
          <div class="input text required">
            <?php if($imgInfo['image_link'] != ""){ ?>
                    <img src="<?php echo '/public/assets/img/galleries/'.$imgInfo['image_link'] ?>" class="img-responsive" style="max-width: 150px" alt="">
            <?php } ?>
            <input name="image" class="col-xs-10 col-sm-8" type="file">
          </div>
        </div>
      </div>

      <div class="space-4"></div>

      <div class="form-group">
        <label for="form-field-1" class="col-sm-3 control-label no-padding-right control-label no-padding-right"> Mô tả cho hình<span class="red">(*)</span></label>
        <div class="col-sm-9">
          <div class="input text required">
            <textarea name="des" rows="3" cols="40"><?php echo $imgInfo['description'] ?></textarea>
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
 							Cập nhật
 						</button>

 						&nbsp; &nbsp;
 					</div>
 				</div>
 			</div>
 		</div>
 		<div class="hr hr-24"></div>
 	</form></div>
