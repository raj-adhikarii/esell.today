jQuery(document).ready(function(){
  jQuery(document).on('submit','#custom_post_ads_form',function(event){
      event.preventDefault(); // Prevents the default action of the click event
      var formData = new FormData(this);
      // Add action to form data
      formData.append('action', 'custom_post_ads');

      // Make AJAX call
      $.ajax({
      url: "/wp-admin/admin-ajax.php",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
          // Handle success response
          console.log(response);
          //jQuery("#custom_post_ads_form")[0].reset();
          // jQuery('.custom-message').empty().text(response).show();
          // jQuery('html, body').animate({
          //   scrollTop: $("#user-profile").offset().top
          // }, 1000, 'swing', function() {
          //   window.location.hash = '#user-profile';
          // });
  
          toastr.success(response);
      },
      error: function(xhr, status, error) {
          // Handle error
          console.log(error);
      }
      });
  });
  jQuery(document).ready(function() {
      jQuery('.product-img-file').change(function() {
        var files = this.files;
        var maxImages = 10;
    
        if (files.length > maxImages) {
          jQuery('#error-message').text('You can upload a maximum of ' + maxImages + ' images.');
          this.value = '';
        } else {
          jQuery('#error-message').empty();
        }
      });
  });


  jQuery(document).on('submit', '#my-ads-search-form', function(event) {
    event.preventDefault(); // Prevent the default form submission
  
    var formData = new FormData(this);
    // Add action to form data
    formData.append('action', 'fetch_my_ads');
    console.log(formData);

      //Make AJAX call
      $.ajax({
        url: "/wp-admin/admin-ajax.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            // Handle success response
            console.log(response);
            jQuery('.product-data').empty();
            jQuery('.product-data').append(response);
        },
        error: function(xhr, status, error) {
            // Handle error
            console.log(error);
        }
      });
  });

  
});

//   jQuery(document).ready(function($) {
//     var dataEdit = $('.images-section').data('edit');

//     if (dataEdit !== undefined) {
//         $('#upload-images-section').hide();
//     }
//     $('#change-images-checkbox').on('change', function() {
//         if ($(this).is(':checked')) {
//             $('#upload-images-section').show();
//         } else {
//             $('#upload-images-section').hide();
//         }
//     });
// });

jQuery(document).ready(function($) {
var uploadSection = $('#upload-images-section');
var fileInput = $('input[name="product_images[]"]');

if ($('.images-section').data('edit') !== undefined) {
  uploadSection.hide();
}

$('#change-images-checkbox').on('change', function() {
  if ($(this).is(':checked')) {
      uploadSection.show();
  } else {
      uploadSection.hide();
      fileInput.val('');
  }
});

if ($('.images-section').data('edit') !== undefined) {
$('form').on('submit', function() {
  if (!$('#change-images-checkbox').is(':checked')) {
      fileInput.prop('disabled', true);
  }else{
    fileInput.prop('disabled', false);
    fileInput.value = null;
  }
});
}
});
