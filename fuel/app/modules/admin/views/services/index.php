<div class="page-header">
	<h1>
		Tin tức
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			Danh mục tin tức
		</small>
	</h1>
	<div class="toolbar">
		<a class="btn btn-success" href="services/add" id="loading-btn"><span class="fa fa-plus"></span> Thêm mới</a>
	</div>
</div>
<div class="row">
  <table class="table table-striped table-bordered table-hover" id="simple-table">
    <thead>
      <tr>
        <th>No</th>
        <th>Tiêu đề</th>
        <th class="text-center">Ảnh đại diện</th>
        <th class="text-center">Trạng thái</th>
        <th class="hidden-480">Short content</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
        if(!empty($listServices)) {
          foreach($listServices as $kser => $valser){
      ?>
          <tr>
            <td><?php echo ($kser + 1) ?></td>
            <td><?php echo $valser['title'] ?></td>
            <td><?php

            $path = Asset::get_file('services/'.$valser['avatar'], 'img');
            if (!empty($path)) {
              echo Asset::img('services/' . $valser['avatar'], ['alt' => $valser['title'], 'class' => 'img-responsive img-hot-news', 'width' =>'40']);
            } else {
              echo Asset::img('no-image/no_image_hot_news.jpg', ['alt' => $valser['title'], 'class' => 'img-responsive img-hot-news', 'width' =>'40']);
            }
            ?></td>
            <td><?php echo $status = ($valser['status'] == 1) ? "running" : "disabled"; ?></td>
            <td><?php echo $valser['short_content'] ?></td>
            <td style="width:100px;">
              <div class="hidden-sm hidden-xs btn-group">
                <?php $token = \Security::fetch_token(); ?>
                <a href="services/edit/<?php echo $valser['id']?>"  class='btn btn-xs btn-success'><i class="ace-icon fa fa-pencil-square-o bigger-120" style="margin-right: 0"></i></a>
                <form method="post" action="/public/admin/services/del/" name="my_form" id="my_form"  method="post">
                    <input type="hidden" name="serviceid" value="<?php echo $valser['id']?>">
                </form>
                <a href="#" class='btn btn-xs btn-danger' onclick='if (confirm("Bạn có muốn xoá dịch vụ này không ?")) { document.getElementById("my_form").submit(); } event.returnValue = false; return false;'><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
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
