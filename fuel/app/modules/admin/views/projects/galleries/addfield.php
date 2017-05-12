<div class="row">
  <div class="form-group">
    <label for="form-field-1" class="col-sm-3 control-label no-padding-right"> Hình <?php echo $number ?> <span class="red">(*)</span></label>

    <div class="col-sm-9">
      <div class="input text required">
        <input name="image[]" class="col-xs-10 col-sm-8" type="file">
      </div>
    </div>
  </div>

  <div class="space-4"></div>

  <div class="form-group">
    <label for="form-field-1" class="col-sm-3 control-label no-padding-right control-label no-padding-right"> Mô tả cho hình <?php  echo $number ?><span class="red">(*)</span></label>
    <div class="col-sm-9">
      <div class="input text required">
        <textarea name="des[]" rows="3" cols="40"></textarea>
      </div>
    </div>
  </div>
</div>
