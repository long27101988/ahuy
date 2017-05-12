<div class="page-header">
	<h1>
		Tin tức
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			Danh mục tin tức
		</small>
	</h1>
	<div class="toolbar">
		<a class="btn btn-success" href="projects/add" id="loading-btn"><span class="fa fa-plus"></span> Thêm mới</a>
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
        if(!empty($listProjects)) {
          foreach($listProjects as $kproject => $valproject){
      ?>
          <tr>
            <td><?php echo ($kproject + 1) ?></td>
            <td><?php echo $valproject['title'] ?></td>
            <td><?php

            $path = Asset::get_file('projects/'.$valproject['avartar'], 'img');
            if (!empty($path)) {
              echo Asset::img('projects/' . $valproject['avartar'], ['alt' => $valproject['title'], 'class' => 'img-responsive img-hot-news', 'width' =>'40']);
            } else {
              echo Asset::img('no-image/no_image_hot_news.jpg', ['alt' => $valproject['title'], 'class' => 'img-responsive img-hot-news', 'width' =>'40']);
            }
            ?></td>
            <td><?php echo $status = ($valproject['status'] == 1) ? "running" : "disabled"; ?></td>
            <td><?php echo $valproject['short_content'] ?></td>
            <td style="width:100px;">
              <div class="hidden-sm hidden-xs btn-group">
                <?php $token = \Security::fetch_token(); ?>
                <a href="projects/edit/<?php echo $valproject['id']?>"  class='btn btn-xs btn-success'><i class="ace-icon fa fa-pencil-square-o bigger-120" style="margin-right: 0"></i></a>
                <a href="projects/galleries/<?php echo $valproject['id']?>"  class='btn btn-xs btn-success'><i class="ace-icon 	fa fa-picture-o bigger-120" style="margin-right: 0"></i></a>
                <form method="post" action="projects/del/" name="my_form" id="my_form"  method="post">
                    <input type="hidden" name="projectsid" value="<?php echo $valproject['id']?>">
                </form>
                <a href="#" class='btn btn-xs btn-danger' onclick='if (confirm("Bạn có muốn xoá dự án này không ?")) { document.getElementById("my_form").submit(); } event.returnValue = false; return false;'><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
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
