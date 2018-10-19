$(document).ready(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });  
  $('.product-card h5.product-name').each(function(){
        $(this).text($(this).text().substring(0,60)+"...");
     });
    $('#defaultCheck2').change(function() {
        if(this.checked) {
            $('#price-after-sale').show();
            $('#original-price-label').text('Price before Sale');
        }else{
            $('#price-after-sale').hide();
            $('#original-price-label').text('Price');
        }
    });
    $('#defaultCheck3').change(function() {
        if(this.checked) {
            $('#price-after-sale-edit').show();
            $('#original-price-label-edit').text('Price before Sale');
        }else{
            $('#price-after-sale-edit').hide();
            $('#original-price-label-edit').text('Price');
        }
    });
    /***** Slick Slider *******/
    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav'
      });
      $('.slider-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        arrows: false,
        focusOnSelect: true
      });
    /***** End Slick Slider *******/


    $("#file-upload-1").change(function() {
        readURL(this);
      });
      $("#file-upload-1").click(function(e) {
        var bg = $(this).siblings("#custom-upload").css('background-image');
        if (bg !== 'none') {
        $(this).siblings("#custom-upload").removeClass('custom-file-hover')
        $(this).siblings("#custom-upload").css('background-image','');
        $(this).siblings("#custom-upload").children('i').css('display','block');
        
        $(this).value = "";
        e.preventDefault();
        }
      });
      $("#file-upload-2").change(function() {
        readURL(this);
      });
      $("#file-upload-2").click(function(e) {
        var bg = $(this).siblings("#custom-upload").css('background-image');
        if (bg !== 'none') {
        $(this).siblings("#custom-upload").removeClass('custom-file-hover')
        $(this).siblings("#custom-upload").css('background-image','');
        $(this).siblings("#custom-upload").children('i').css('display','block');
        
        $(this).value = "";
        e.preventDefault();
        }
      });
      $("#file-upload-3").change(function() {
        readURL(this);
      });
      $("#file-upload-3").click(function(e) {
        var bg = $(this).siblings("#custom-upload").css('background-image');
        if (bg !== 'none') {
        $(this).siblings("#custom-upload").removeClass('custom-file-hover')
        $(this).siblings("#custom-upload").css('background-image','');
        $(this).siblings("#custom-upload").children('i').css('display','block');
        
        $(this).value = "";
        e.preventDefault();
        }
      });
      $("#file-upload-4").change(function() {
        readURL(this);
      });
      $("#file-upload-4").click(function(e) {
        var bg = $(this).siblings("#custom-upload").css('background-image');
        if (bg !== 'none') {
        $(this).siblings("#custom-upload").removeClass('custom-file-hover')
        $(this).siblings("#custom-upload").css('background-image','');
        $(this).siblings("#custom-upload").children('i').css('display','block');
        
        $(this).value = "";
        e.preventDefault();
        }
      });
      
      // For A Delete Record Popup
	$('.remove-record').click(function() {
    
		var id = $(this).attr('data-id');
		var url = $(this).attr('data-url');
		$(".remove-record-model").attr("action",url);
		$('body').find('.remove-record-model').append('<input name="_method" type="hidden" value="DELETE">');
		$('body').find('.remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
	});

	$('.remove-data-from-delete-form').click(function() {
		$('body').find('.remove-record-model').find( "input" ).remove();
	});
	$('.modal').click(function() {
		// $('body').find('.remove-record-model').find( "input" ).remove();
  });
  

$("#Like-btn").click(function(){
  
  var urllikes = $(this).attr('data-url');
  $.ajax({
    method: 'POST',
    url: urllikes,
    data: {}
 }).done(function(data){
      $('#alert').show();
      $('#alert').append(data.message);
      $('span.likes_counter').html(data.likesCounter);
      $("#Like-btn").hide();
      $("#dislike-btn").show();
})
});

$("#dislike-btn").click(function(){
  
  var urldislikes = $(this).attr('data-url');
  $.ajax({
    method: 'POST',
    url: urldislikes,
    data: {}
 }).done(function(data){
      $('#alert-dislike').show();
      $('#alert-dislike').append(data.message);
      $('span.likes_counter').html(data.likesCounter);
      $("#dislike-btn").hide();
      $("#Like-btn").show();
})
});







$("#comment-btn").click(function(){
  
  var urlcomment = $(this).attr('data-url');
  var comment_text = $('textarea[name="comment-body"]').val();
  $.ajax({
    method: 'POST',
    url: urlcomment,
    data: {comment_body: comment_text}
 }).done(function(data){
  var large = '<div class="col-12"><div class="card comment"><div class="card-body"><div class="info"><span class="username"><i class="fas fa-comment dark-blue mr-2"> </i>'+ user.name +'</span><span class="date blue">Just Now</span></div><p>'+ comment_text +'</p></div></div></div>';
  $(".comments-card").prepend(large);
})
});



$('#Edit-product-modal').on('shown.bs.modal', function (e) {
  var id  = $(e.relatedTarget).attr('data-id');
  var producturl = "/productapi/"+id;
  var imagesurl = "/iamgesapi/"+id;
  $.ajax({
    url: producturl,
    method: "get"    
  }).done(function(response) {
    //Setting input values
    $("input#product_title_edit").val(response.product_title);
    $("input#defaultCheck3_edit").prop('checked',response.product_sale);
    if(response.product_sale){
            $('#price-after-sale-edit').show();
            $('#original-price-label-edit').text('Price before Sale');
    }else{
            $('#price-after-sale-edit').hide();
            $('#original-price-label-edit').text('Price');
    }
    $("textarea#description_edit").val(response.product_description);
    $("input#price_original_edit").val(response.product_price_presale);
    $("input#price_new_edit").val(response.product_price_postsale);
    $("select#Category_edit").val(response.product_category_id);
    $("select#Type_edit").attr('data-source','/category/'+ response.product_category_id +'/types');
    $.ajax({
      url: $('select#Type_edit').attr('data-source'),
    }).then(function(options){
      $('select#Type_edit').html('');
      options.map(function(option){
        var $option = $('<option>');
  
        $option
          .val(option.id)
          .text(option.type_name);
          $('select#Type_edit').append($option);
      })
    })
    $("select#Type_edit").val(response.product_type_id);

    

    //Setting submit url
    
    $("#edit-form").attr("action","/product/"+id+"/edit");
  });
})


$('select#Category_edit').change(function(){
  var category_id = $(this).val();
  
  $('select#Type_edit').attr('data-source','/category/'+ category_id +'/types');
  $.ajax({
    url: $('select#Type_edit').attr('data-source'),
  }).then(function(options){
    $('select#Type_edit').html('');
    options.map(function(option){
      var $option = $('<option>');

      $option
        .val(option.id)
        .text(option.type_name);
        $('select#Type_edit').append($option);
    })
  })
})
$('select#Category').change(function(){
  var category_id = $(this).val();
  
  $('select#Type').attr('data-source','/category/'+ category_id +'/types');
  $.ajax({
    url: $('select#Type').attr('data-source'),
  }).then(function(options){
    $('select#Type').html('');
    options.map(function(option){
      var $option = $('<option>');

      $option
        .val(option.id)
        .text(option.type_name);
        $('select#Type').append($option);
    })
  })
})

$('select[data-source]').each(function(){
  var $select = $(this);
  $select.append('<option>Select</option>');

  $.ajax({
    url: $select.attr('data-source'),
  }).then(function(options){
    options.map(function(option){
      var $option = $('<option>');

      $option
        .val(option.id)
        .text(option.category_name);

        $select.append($option);
    })
  })
})





});
function readCategories(){
  
}
function readURL(input) {

    if (input.files && input.files[0]) {
      var reader = new FileReader();
  
      reader.onload = function(e) {
        // e.target.result
        $(input).siblings("#custom-upload").css('background-image','url('+e.target.result+')');
        $(input).siblings("#custom-upload").children('i').css('display','none');
        $(input).siblings("#custom-upload").addClass('custom-file-hover');
      }
  
      reader.readAsDataURL(input.files[0]);
    }
  }