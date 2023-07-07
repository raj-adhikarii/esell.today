/* =====================================================
Template Name   : Clasad
Description     : Classified Ads and Listing HTML5 Template
Author          : Themesland
Version         : 1.0
=======================================================*/


(function ($) {
    "use strict";


    // multi level dropdown menu
    $('.dropdown-menu a.dropdown-toggle').on('click', function (e) {
        if (!$(this).next().hasClass('show')) {
            $(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
        }
        var $subMenu = $(this).next('.dropdown-menu');
        $subMenu.toggleClass('show');

        $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function (e) {
            $('.dropdown-submenu .show').removeClass('show');
        });
        return false;
    });



    // data-background    
    $(document).on('ready', function () {
        $("[data-background]").each(function () {
            $(this).css("background-image", "url(" + $(this).attr("data-background") + ")");
        });
    });


    // wow init
    new WOW().init();


    // hero slider
    $('.hero-slider').owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        margin: 0,
        autoplay: true,
        autoplayHoverPause: true,
        autoplayTimeout: 5000,
        items: 1,
        navText: [
            "<i class='far fa-long-arrow-left'></i>",
            "<i class='far fa-long-arrow-right'></i>"
        ],

        onInitialized: function (event) {
            var $firstAnimatingElements = $('.owl-item').eq(event.item.index).find("[data-animation]");
            doAnimations($firstAnimatingElements);
        },

        onChanged: function (event) {
            var $firstAnimatingElements = $('.owl-item').eq(event.item.index).find("[data-animation]");
            doAnimations($firstAnimatingElements);
        }
    });

    //hero slider do animations
    function doAnimations(elements) {
        var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        elements.each(function () {
            var $this = $(this);
            var $animationDelay = $this.data('delay');
            var $animationDuration = $this.data('duration');
            var $animationType = 'animated ' + $this.data('animation');
            $this.css({
                'animation-delay': $animationDelay,
                '-webkit-animation-delay': $animationDelay,
                'animation-duration': $animationDuration,
                '-webkit-animation-duration': $animationDuration,
            });
            $this.addClass($animationType).one(animationEndEvents, function () {
                $this.removeClass($animationType);
            });
        });
    }



    // category-slider
    $('.category-slider').owlCarousel({
        loop: true,
        margin: 20,
        nav: false,
        dots: true,
        navText: [
            "<i class='fal fa-long-arrow-left'></i>",
            "<i class='fal fa-long-arrow-right'></i>"
        ],
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    });



    // product-slider
    $('.product-slider').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        dots: true,
        navText: [
            "<i class='fal fa-long-arrow-left'></i>",
            "<i class='fal fa-long-arrow-right'></i>"
        ],
        autoplay: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    });


    // location-slider
    $('.location-slider').owlCarousel({
        loop: true,
        margin: 20,
        nav: false,
        dots: true,
        navText: [
            "<i class='fal fa-long-arrow-left'></i>",
            "<i class='fal fa-long-arrow-right'></i>"
        ],
        autoplay: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    });


    // testimonial-slider
    $('.testimonial-slider').owlCarousel({
        loop: true,
        margin: 30,
        nav: false,
        dots: true,
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });


    // partner-slider
    $('.partner-slider').owlCarousel({
        loop: true,
        margin: 50,
        nav: false,
        dots: false,
        autoplay: true,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 3
            },
            1000: {
                items: 6
            }
        }
    });


    // preloader
    $(window).on('load', function () {
        $(".preloader").fadeOut("slow");
    });


    // fun fact counter
    $('.counter').countTo();
    $('.counter-box').appear(function () {
        $('.counter').countTo();
    }, {
        accY: -100
    });



    // progress bar
    $(document).ready(function () {
        var progressBar = $('.progress');
        if (progressBar.length) {
            progressBar.each(function () {
                var Self = $(this);
                Self.appear(function () {
                    var progressValue = Self.data('value');
                    Self.find('.progress-bar').animate({
                        width: progressValue + '%'
                    }, 1000);
                });
            })
        }
    });


    // magnific popup init
    $(".popup-gallery").magnificPopup({
        delegate: '.popup-img',
        type: 'image',
        gallery: {
            enabled: true
        },
    });

    $(".popup-youtube, .popup-vimeo, .popup-gmaps").magnificPopup({
        type: "iframe",
        mainClass: "mfp-fade",
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });



    // scroll to top
    $(window).scroll(function () {

        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            $("#scroll-top").fadeIn('slow');
        } else {
            $("#scroll-top").fadeOut('slow');
        }
    });

    $("#scroll-top").click(function () {
        $("html, body").animate({ scrollTop: 0 }, 1500);
        return false;
    });


    $(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
            $('.navbar').addClass("fixed-top");
        } else {
            $('.navbar').removeClass("fixed-top");
        }
    });


    // countdown
    if ($('#countdown').length) {
        $('#countdown').countdown('2028/01/30', function (event) {
            $(this).html(event.strftime('' + '<div class="row">' + '<div class="col countdown-single">' + '<h2 class="mb-0">%-D</h2>' + '<h5 class="mb-0">Day%!d</h5>' + '</div>' + '<div class="col countdown-single">' + '<h2 class="mb-0">%H</h2>' + '<h5 class="mb-0">Hours</h5>' + '</div>' + '<div class="col countdown-single">' + '<h2 class="mb-0">%M</h2>' + '<h5 class="mb-0">Minutes</h5>' + '</div>' + '<div class="col countdown-single">' + '<h2 class="mb-0">%S</h2>' + '<h5 class="mb-0">Seconds</h5>' + '</div>' + '</div>'));
        });
    }


    // project filter
    $(window).on('load', function () {
        if ($(".filter-box").children().length > 0) {
            $(".filter-box").isotope({
                itemSelector: '.filter-item',
                masonry: {
                    columnWidth: 1
                },
            });

            $('.filter-btns').on('click', 'li', function () {
                var filterValue = $(this).attr('data-filter');
                $(".filter-box").isotope({ filter: filterValue });
            });

            $(".filter-btns li").each(function () {
                $(this).on("click", function () {
                    $(this).siblings("li.active").removeClass("active");
                    $(this).addClass("active");
                });
            });
        }
    });


    // flexslider
    if ($('.flexslider-thumbnails').length) {
        $('.flexslider-thumbnails').flexslider({
            animation: "slide",
            controlNav: "thumbnails",
        });
    }


    // bootstrap tooltip enable
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })

    
    // phone number reveal
    $('.product-single-author-phone').click(function(){
        $('.author-number').hide();
        $('.author-reveal-number').show();
    });


    // copywrite date
    let date = new Date().getFullYear();
    $("#date").html(date);


    // nice select
    $(document).ready(function () {
        $('.select').niceSelect();
    });


    // price slider
    $(function () {
        $(".price-range").slider({
            step: 500,
            range: true,
            min: 0,
            max: 90000,
            values: [10000, 50000],
            slide: function (event, ui) { $(".priceRange").val("$" + ui.values[0].toLocaleString() + " - $" + ui.values[1].toLocaleString()); }
        });
        $(".priceRange").val("$" + $(".price-range").slider("values", 0).toLocaleString() + " - $" + $(".price-range").slider("values", 1).toLocaleString());
    });


    // profile image btn
    $(".profile-img-btn").click(function () {
        $(".profile-img-file").click();
    });


    // product images upload
    $(".product-img-upload").click(function () {
        $(".product-img-file").click();
    });


    // store images upload
    $(".store-upload").click(function (e) {
        $(e.target).closest(".form-group").find('.store-file').click();
    });


    // message bottom scroll
    if ($('.message-content-info').length) {
        $(function () {
            var chatbox = $('.message-content-info');
            var chatheight = chatbox[0].scrollHeight;
            chatbox.scrollTop(chatheight);
        });
    }

})(jQuery);

// DataTransfer allows updating files in input shortable
var dataTransfer = new DataTransfer()

const form = document.querySelector('#form')
const input = document.querySelector('#input')

input.addEventListener('change', () => {

  let files = input.files

  for (let i = 0; i < files.length; i++) {
    // A new upload must not replace images but be added
    dataTransfer.items.add(files[i])

    // Generate previews using FileReader
    let reader, preview, previewImage
    reader = new FileReader()

    preview = document.createElement('div')
    previewImage = document.createElement('img')
    deleteButton = document.createElement('button')
    orderInput = document.createElement('input')

    preview.classList.add('preview')
    document.querySelector('#preview-parent').appendChild(preview)
    deleteButton.setAttribute('data-index', i)
    deleteButton.setAttribute('onclick', 'deleteImage(this)')
    deleteButton.innerText = 'Delete'
    orderInput.type = 'hidden'
    orderInput.name = 'images_order[' + files[i].name + ']'

    preview.appendChild(previewImage)
    preview.appendChild(deleteButton)
    preview.appendChild(orderInput)

    reader.readAsDataURL(files[i])
    reader.onloadend = () => {
      previewImage.src = reader.result
    }
  }

  // Update order values for all images
  updateOrder()
  // Finally update input files that will be sumbitted
  input.files = dataTransfer.files
})

const updateOrder = () => {
  let orderInputs = document.querySelectorAll('input[name^="images_order"]')
  let deleteButtons = document.querySelectorAll('button[data-index]')
  for (let i = 0; i < orderInputs.length; i++) {
    orderInputs[i].value = [i]
    deleteButtons[i].dataset.index = [i]
    
    // Just to show that order is always correct I add index here
    deleteButtons[i].innerText = 'Delete (image ' + i + ')'
  }
}

const deleteImage = (item) => {
  // Remove image from DataTransfer and update input
  dataTransfer.items.remove(item.dataset.index)
  input.files = dataTransfer.files
  // Delete element from DOM and update order
  item.parentNode.remove()
  updateOrder()
}

// I make the images sortable by means of SortableJS
const el = document.getElementById('preview-parent')
new Sortable(el, {
  animation: 150,

  // Update order values every time a change is made
  onEnd: (event) => {
    updateOrder()
  }
})


jQuery(document).ready(function($) {
    $('.product-favorite').on('click', function(e) {
        e.preventDefault();
        
        var productId = $(this).data('product-id');
        
        // Trigger YITH Wishlist functionality
        yith_wcwl_add_to_wishlist(productId);
    });
});


// Add event listener to remove wishlist functionality
document.addEventListener('DOMContentLoaded', function() {
    const removeButtons = document.querySelectorAll('.product-favorite');

    removeButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const productId = this.getAttribute('data-product-id');

            // Make an AJAX request to remove the product from the wishlist
            // Replace `remove-from-wishlist.php` with the actual server-side script or endpoint
            fetch('remove-from-wishlist.php', {
                method: 'POST',
                body: JSON.stringify({ productId: productId })
            })
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                // Check the response data and handle any errors or success messages

                // If the removal was successful, remove the corresponding product item from the DOM
                if (data.success) {
                    const productItem = button.closest('.product-item');
                    if (productItem) {
                        productItem.remove();
                    }
                }
            })
            .catch(function(error) {
                // Handle any errors that occurred during the AJAX request
                console.error('Error:', error);
            });
        });
    });
});

  // Get the icon element
  const wishlistIcon = document.getElementById('wishlist-icon');

  // Check if there is at least one wishlist item
  if (wishlistItemCount > 0) {
    // Update the class to switch to the filled heart icon
    wishlistIcon.className = 'fas fa-heart';
  }