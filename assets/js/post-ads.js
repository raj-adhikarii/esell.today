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
          jQuery("#custom_post_ads_form")[0].reset();

          jQuery("#preview-parent").empty(); // Clear preview images
  
          toastr.success(response);

          // Clear the checkbox
        $('#agree').prop('checked', false);

        // Redirect to "/my-ads/" page
        window.location.href = "/my-ads/";
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


/*===================/*
    Delete product
/*===================*/
jQuery(document).ready(function($) {
  $('.delete-product').on('click', function(e) {
      e.preventDefault();

      var productId = $(this).data('product-id');

      // Confirm deletion with the user
      if (confirm('Are you sure you want to delete this product?')) {
          // Make AJAX call to delete the product
          $.ajax({
              url: '/wp-admin/admin-ajax.php',
              type: 'POST',
              data: {
                  action: 'delete_product',
                  product_id: productId
              },
              success: function(response) {
                  // Handle success response
                  console.log(response);

                  // Parse the JSON response
                  var data = JSON.parse(response);

                  // Check if the deletion was successful
                  if (data.success) {
                      
                      location.reload();
                  } else {
                      console.log(data.message);
                  }
              },
              error: function(xhr, status, error) {
                  // Handle error
                  console.log(error);
              }
          });
      }
  });
});

/*=============================/*
   post wordpress user image 
/*============================*/

$(document).ready(function() {
  // Handle file selection
  $('#profile-img-upload').change(function(e) {
      var file = e.target.files[0];
      if (file) {
          // Validate the file type (optional)
          var allowedTypes = ['image/jpeg', 'image/png'];
          if (allowedTypes.indexOf(file.type) === -1) {
              alert('Invalid file type. Please select a JPEG or PNG image.');
              return;
          }

          // Read the file and display the preview
          var reader = new FileReader();
          reader.onload = function(e) {
              $('#profile-img-preview').attr('src', e.target.result);
          };
          reader.readAsDataURL(file);

          // Upload the file via AJAX
          var formData = new FormData();
          formData.append('file', file);
          formData.append('action', 'upload_profile_image');
          $.ajax({
              url: '/wp-admin/admin-ajax.php',
              type: 'POST',
              data: formData,
              processData: false,
              contentType: false,
              success: function(response) {
                  console.log(response); // Handle the response from the server

                  // Optionally display a success message to the user
                  alert('Image uploaded successfully!');
              },
              error: function(xhr, textStatus, errorThrown) {
                  console.log('Upload failed: ' + errorThrown);
              }
          });
      }
  });
});