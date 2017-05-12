(function(){
  setTimeout(function(){
    if (window.Select2 !== undefined){
      if ($(".select2").length > 0) {
        $('.select2').select2();
        clearInterval();
      }
    }
  }, 100);


  $('.addFieldUpload').on('click', function() {
      var number = $('input[name="number_field_upload"]').val();
      number = parseInt(number) + 1;
      $.ajax({
        url: "/public/admin/projects/addfield",
        type: "post",
        dataType: "html",
        data: {numberOfField : number},
        success: function(dataField) {
          $('.addmore').append(dataField);
          $('input[name="number_field_upload"]').val(number);
        }
      });
  });

})();
