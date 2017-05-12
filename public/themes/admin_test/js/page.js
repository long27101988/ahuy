;(function($, undefined) {

	 $(document).ready(function() {
   		 Common = new Common();
   		 return Common;
 	 });
	Common = (function() {

		
		function Common() {
			this.count = 1;
		 	this.btnAddMore = $('.btn-addmore');
		 	this.btnAddMoreImage = $('.btn-addmore-image');
		 	this.btnMinus = $('.btn-minus');
		 	this.btnDeleteImage = $('.delete-image');
		 	this.btnDeleteImageSlider = $('.delete-image-slider');
		 	this.distinationRegion = $('.project-upload');
		 	this.showAddUploadInput();
		 	this.showAddUploadSlider();
		 	this.removeUploadInput();
		 	this.deleteImageOfGallery();
		 	this.deleteImageOfSlider();
		};
		Common.prototype.removeUploadInput = function(){
			var $this = this;
			$('.btn-minus').unbind();
			$('.btn-minus').on({
				click: function(){
					var idx = $(this).data('index');
					$('.upload'+idx).remove();
				}
			});
		};
		//set up datapick: get 2 parameter: selector, addon
		Common.prototype.showAddUploadInput = function(){
			var $this = this;
			this.btnAddMore.unbind();
			this.btnAddMore.on({
				click: function(){
					html = '<div class="form-group upload'+$this.count+'">'+
						'<label for="form-field-1" class="col-sm-3 control-label no-padding-right"></label>'+
						'<div class="col-sm-5">'+
							'<div class="input-group">'+
								'<input type="file"  class="form-control" name="data[Project][gallery][]">'+
								'<div class="spinbox-buttons input-group-btn ">			'+		
									'<button class="btn spinbox-down btn-sm btn-danger btn-minus" type="button" data-index="'+$this.count+'">	'+				
											'<i class="icon-only  ace-icon ace-icon fa fa-minus bigger-110"></i>	'+
									'</button>	'+			
								'</div>'+
							'</div>'+
						'</div>'+
					'</div>';
					$this.count++;
					$this.distinationRegion.append(html);
					$this.removeUploadInput();
				}
			});
		}
		Common.prototype.showAddUploadSlider = function(){
			var $this = this;
			this.btnAddMoreImage.unbind();
			this.btnAddMoreImage.on({
				click: function(){
					html = '<div class="form-group upload'+$this.count+'">'+
						'<label for="form-field-1" class="col-sm-3 control-label no-padding-right"></label>'+
						'<div class="col-sm-5">'+
							'<div class="input-group">'+
								'<input type="file"  class="form-control" name="data[Slider][image][]">'+
								'<div class="spinbox-buttons input-group-btn ">			'+		
									'<button class="btn spinbox-down btn-sm btn-danger btn-minus" type="button" data-index="'+$this.count+'">	'+				
											'<i class="icon-only  ace-icon ace-icon fa fa-minus bigger-110"></i>	'+
									'</button>	'+			
								'</div>'+
							'</div>'+
						'</div>'+
					'</div>';
					$this.count++;
					$this.distinationRegion.append(html);
					$this.removeUploadInput();
				}
			});
		}
		Common.prototype.deleteImageOfGallery = function()
		{
			var $this = this;
			$this.btnDeleteImage.on({
				click:function(){
					var id = $(this).data('id');
					link = '../../../../admin/projects/delete_image';
					li = $(this).closest('li');
					$.post(link, {id : id }, function(res){
						if(res ==1)
						{
							li.remove();
						}
					});
					return false;
				}
			});
		}
		Common.prototype.deleteImageOfSlider = function()
		{
			var $this = this;
			$this.btnDeleteImageSlider.on({
				click:function(){
					var id = $(this).data('id');
					link = '../admin/sliders/delete_image';
					li = $(this).closest('li');
					$.post(link, {id : id }, function(res){
						if(res ==1)
						{
							li.remove();
						}
					});
					return false;
				}
			});
		}

		 return Common;
		}
		
	)();
	$(document).ready(function()
	{
 		
	});
	
})(jQuery);






















