<div class="page-header">
	<h1>
		Tin tức
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			Danh mục loại tin tức
		</small>
	</h1>
	<div class="toolbar">
		<a class="btn btn-success" href="categories/add" id="loading-btn"><span class="fa fa-plus"></span> Thêm mới</a>
	</div>
</div>
<div class="row">
  <table class="table table-striped table-bordered table-hover" id="simple-table">
    <thead>
      <tr>
        <th>No</th>
        <th>Tiêu đề</th>
        <th class="text-center">Trạng thái</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
        if(!empty($listCategories)) {
          foreach($listCategories as $kcate => $valcate){
      ?>
          <tr>
            <td><?php echo ($kcate + 1) ?></td>
            <td><?php echo $valcate['name'] ?></td>
            <td><?php echo $status = ($valcate['status'] == 1) ? "running" : "disabled"; ?></td>
            <td style="width:100px;">
              <div class="hidden-sm hidden-xs btn-group">
                <?php $token = \Security::fetch_token(); ?>
                <a href="categories/edit/<?php echo $valcate['id']?>"  class='btn btn-xs btn-success'><i class="ace-icon fa fa-pencil-square-o bigger-120" style="margin-right: 0"></i></a>
                <form method="post" action="/public/admin/news/delcate" name="my_form" id="my_form_cate">
                    <input type="hidden" name="cateid" value="<?php echo $valcate['id']?>">
                </form>
                <a href="#" class='btn btn-xs btn-danger' onclick='if (confirm("Bạn có muốn xoá loại tin tức này không ?")) { document.getElementById("my_form_cate").submit(); } event.returnValue = false; return false;'><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
              </div>
            </td>
          </tr>
      <?php
          }
        }
       ?>
    </tbody>

  </table>
</div>
