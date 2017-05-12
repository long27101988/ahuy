<div class="page-header">
	<h1>
		Tin tức
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			Danh mục tin tức
		</small>
	</h1>
	<div class="toolbar">
		<a class="btn btn-success" href="/public/admin/projects/addimg/<?php echo $idProject ?>" id="loading-btn"><span class="fa fa-plus"></span> Thêm mới</a>
	</div>
</div>
<div class="row">
  <table class="table table-striped table-bordered table-hover" id="simple-table">
    <thead>
      <tr>
        <th>No</th>
        <th>Mô tả</th>
        <th class="text-center">Ảnh đại diện</th>
        <th class="text-center">Trạng thái</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
        if(!empty($listImages)) {
          foreach($listImages as $kimg => $valimg){
      ?>
          <tr>
            <td><?php echo ($kimg + 1) ?></td>
            <td><?php echo $valimg['description'] ?></td>
            <td><?php

            $path = Asset::get_file('galleries/'.$valimg['image_link'], 'img');
            if (!empty($path)) {
              echo Asset::img('galleries/' . $valimg['image_link'], ['alt' => $valimg['description'], 'class' => 'img-responsive img-hot-news', 'width' =>'40']);
            } else {
              echo Asset::img('no-image/no_image_hot_news.jpg', ['alt' => $valimg['description'], 'class' => 'img-responsive img-hot-news', 'width' =>'40']);
            }
            ?></td>
            <td><?php echo $status = ($valimg['status'] == 1) ? "running" : "disabled"; ?></td>
            <td style="width:100px;">
              <div class="hidden-sm hidden-xs btn-group">
                <?php $token = \Security::fetch_token(); ?>
                <a href="/public/admin/projects/editimg/<?php echo $idProject ?>/<?php echo $valimg['id']?>"  class='btn btn-xs btn-success'><i class="ace-icon fa fa-pencil-square-o bigger-120" style="margin-right: 0"></i></a>
                <form method="post" action="/public/admin/projects/delimg/<?php echo $idProject ?>/<?php echo $valimg['id']?>" name="my_form" id="my_form"  method="post">
                    <input type="hidden" name="imagesid" value="<?php echo $valimg['id']?>">
                </form>
                <a href="#" class='btn btn-xs btn-danger' onclick='if (confirm("Bạn có muốn xoá hình này không ?")) { document.getElementById("my_form").submit(); } event.returnValue = false; return false;'><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
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
