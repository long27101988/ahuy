<div class="page-header">
	<h1>
		Tin tức
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			Danh mục tin tức
		</small>
	</h1>
	<div class="toolbar">
		<a class="btn btn-success" href="products/add" id="loading-btn"><span class="fa fa-plus"></span> Thêm mới</a>
	</div>
</div>
<div class="row">
  <table class="table table-striped table-bordered table-hover" id="simple-table">
    <thead>
      <tr>
        <th>No</th>
        <th>Tên sản phẩm</th>
        <th class="text-center">Ảnh đại diện</th>
        <th class="text-center">Category</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
        if(!empty($listProducts)) {
          foreach($listProducts as $kproduct => $valproduct){
      ?>
          <tr>
            <td><?php echo ($kproduct + 1) ?></td>
            <td><?php echo $valproduct['name'] ?></td>
            <td><?php

            $path = Asset::get_file('products/'.$valproduct['avatar'], 'img');
            if (!empty($path)) {
              echo Asset::img('products/' . $valproduct['avatar'], ['alt' => $valproduct['name'], 'class' => 'img-responsive img-hot-product', 'width' =>'40']);
            } else {
              echo Asset::img('no-image/no_image_hot_news.jpg', ['alt' => $valproduct['name'], 'class' => 'img-responsive img-hot-product', 'width' =>'40']);
            }
            ?></td>
            <td><?php echo $valproduct['namecate'] ?></td>
            <td style="width:100px;">
              <div class="hidden-sm hidden-xs btn-group">
                <?php $token = \Security::fetch_token(); ?>
                <a href="products/edit/<?php echo $valproduct['id']?>"  class='btn btn-xs btn-success'><i class="ace-icon fa fa-pencil-square-o bigger-120" style="margin-right: 0"></i></a>
                <form method="post" action="products/del/" name="my_form" id="my_form"  method="post">
                    <input type="hidden" name="productsid" value="<?php echo $valproduct['id']?>">
                </form>
                <a href="#" class='btn btn-xs btn-danger' onclick='if (confirm("Bạn có muốn xoá sản phẩm này không ?")) { document.getElementById("my_form").submit(); } event.returnValue = false; return false;'><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
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
