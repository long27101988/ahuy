<div class="page-header">
	<h1>
		Tin tức
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			Danh mục tin tức
		</small>
	</h1>
</div>
<div class="row">
  <table class="table table-striped table-bordered table-hover" id="simple-table">
    <thead>
      <tr>
        <th>No</th>
        <th>Page</th>
        <th>Text 1</th>
        <th>Text 2</th>
        <th>Text 3</th>
        <th>Text 4</th>
        <th>Text 5</th>
        <th>Text 6</th>
        <th>Text 7</th>
        <th>Text 8</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
        if(!empty($listNews)) {
          foreach ($listNews as $key => $value) {
      ?>
          <tr>
            <td><?php echo ($key + 1); ?></td>
            <td><?php echo $value['title']; ?></td>
            <td><?php echo $value['text1']; ?></td>
            <td><?php echo $value['text2']; ?></td>
            <td><?php echo $value['text3']; ?></td>
            <td><?php echo $value['text4']; ?></td>
            <td><?php echo $value['text5']; ?></td>
            <td><?php echo $value['text6']; ?></td>
            <td><?php echo $value['text7']; ?></td>
            <td><?php echo $value['text8']; ?></td>
            <td style="width:100px;">
              <div class="hidden-sm hidden-xs btn-group">
                <a href="show/edit/<?php echo $value['id']?>"  class='btn btn-xs btn-success'><i class="ace-icon fa fa-pencil-square-o bigger-120" style="margin-right: 0"></i></a> 
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
