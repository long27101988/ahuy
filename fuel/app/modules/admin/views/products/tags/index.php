<div class="page-header">
	<h1>
		Tin tức
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			Danh mục Tags
		</small>
	</h1>
	<div class="toolbar">
		<a class="btn btn-success" href="tags/add" id="loading-btn"><span class="fa fa-plus"></span> Thêm mới</a>
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
        if(!empty($listTags)) {
          foreach($listTags as $ktags => $valtags){
      ?>
          <tr>
            <td><?php echo ($ktags + 1) ?></td>
            <td><?php echo $valtags['t_name'] ?></td>
            <td><?php echo $status = ($valtags['status'] == 1) ? "running" : "disabled"; ?></td>
            <td style="width:100px;">
              <div class="hidden-sm hidden-xs btn-group">
                <?php $token = \Security::fetch_token(); ?>
                <a href="tags/edit/<?php echo $valtags['id']?>"  class='btn btn-xs btn-success'><i class="ace-icon fa fa-pencil-square-o bigger-120" style="margin-right: 0"></i></a>
                <form method="post" action="/public/admin/products/deltag/" name="my_form" id="my_form"  method="post">
                    <input type="hidden" name="tagid" value="<?php echo $valtags['id']?>">
                </form>
                <a href="#" class='btn btn-xs btn-danger' onclick='if (confirm("Bạn có muốn xoá tin tức này không ?")) { document.getElementById("my_form").submit(); } event.returnValue = false; return false;'><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
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
