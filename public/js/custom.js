$(document).on('click', '.addToCartBtn', function(e) {
    e.preventDefault();
    var prod_id = $('.prod_id').val();
    var qty = $('.qty-input').val();

    $.ajax({
        method: "POST",
        url: "/add-to-cart",
        data: {
            prod_id: prod_id,
            prod_qty: qty,
           _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            if (response.status === 'success') {
               $('#success-message').text(response.message);
                $('#success-alert').removeClass('d-none'); // Show the alert
               $('.cart-count-badge').text(response.cart_count);
                // Optionally hide the alert after a few seconds
                setTimeout(function() {
                    $('#success-alert').addClass('d-none');
                }, 3000); // Hide after 3 seconds
            }
        },
        error: function(xhr) {
            if (xhr.status === 401) {
                // Handle unauthenticated response
                // alert(xhr.responseJSON.message || 'You must be logged in to add items to the cart.');
                window.location.href = '/signin';
            } else {
                // Handle other errors
                alert('An error occurred. Please try again.');
            }
        }
    });
});


    //increment and decrement functionality for quantity input
    $(document).ready(function() {
      $('.increment-btn').on('click', function() {
        //   var inc_value = $('.qty-input').val();
        var inc_value = $(this).siblings('.qty-input').val();
          var value = parseInt(inc_value, 10);
          value = isNaN(value) ? 0 : value;
          if (value < 10) {
              value++;
              $(this).siblings('.qty-input').val(value);
          }
      });

      $('.decrement-btn').on('click', function() {
          var inc_value = $(this).siblings('.qty-input').val();
          var value = parseInt(inc_value, 10);
          value = isNaN(value) ? 0 : value;
          if (value > 1) {
              value--;
              $(this).siblings('.qty-input').val(value);
          }
      });

       $('.delete-cart-item').click(function(e) {
           e.preventDefault();
           var prod_id = $(this).data('id');
           let $item = $(this).closest('.cart-item');
           $.ajax({
               method: "POST",
               url: "/delete-cart-item",
               data: {
                   prod_id: prod_id,
                   _token: $('meta[name="csrf-token"]').attr('content')
               },
               success: function(response) {
                   if (response.status === 'success') {
                       // Remove the cart item from the DOM
                       $item.remove();
                       let count = $('.product-count').text();
                       count = parseInt(count) - 1;
                       $('.product-count').text(count);
                       $('.cart-count-badge').text(response.cart_count);
                       // Optionally, show a success message
                       $('#success-message').text(response.message);
                       $('#success-alert').removeClass('d-none');
                       setTimeout(function() {
                           $('#success-alert').addClass('d-none');
                       }, 3000);
                   }
               },
               error: function(xhr) {
                   if (xhr.status === 401) {
                       window.location.href = '/signin';
                   } else {
                       alert('An error occurred. Please try again.');
                   }
               }
           });
       });

       $('.change-quantity').on('click', function() {
           var $btn = $(this);
           var prod_id = $(this).data('id');
           var qtyInput = $(this).siblings('.qty-input').val();
           $.ajax({
               method: "POST",
               url: "/update-cart",
               data: {
                   prod_id: prod_id,
                   prod_qty: qtyInput,
                   _token: $('meta[name="csrf-token"]').attr('content')
               },
               success: function(response) {
                   if (response.status === 'success') {
                    //update the price of particular item
                   let newSubtotal = response.subtotal; // must be returned from backend
                    $btn.closest('.cart-item').find('.item-subtotal').text('₹' + newSubtotal);
                    // ✅ Update total price
                     let newTotal = response.total; // must be returned from backend
                     $('.total-price').text('₹' + newTotal);
                     // Update per product saving
                     let newPerProductSaving = response.perProductSaving; // must be returned from backend
                     $btn.closest('.cart-item').find('.saved').text('Saved: ₹' + newPerProductSaving);
                     // Update total savings
                     $('.badge-savings').text('Savings: ₹' + response.totalSavings);
                     // Optionally, show a success message
                       $('#success-message').text(response.message);
                       $('#success-alert').removeClass('d-none');
                       setTimeout(function() {
                           $('#success-alert').addClass('d-none');
                       }, 3000);
                   }
               },
               error: function(xhr) {
                   if (xhr.status === 401) {
                       window.location.href = '/signin';
                   } else {
                       alert('An error occurred. Please try again.');
                   }
               }
           });
       });
    });

    document.getElementById("profileBtn").onclick = function() {
    document.getElementById("sidebarMenu").style.width = "250px";
}

// Close sidebar
document.getElementById("closeSidebar").onclick = function() {
    document.getElementById("sidebarMenu").style.width = "0";
}

document.getElementById("profileDropdown").addEventListener("click", function(e) {
    e.preventDefault(); // prevent page reload
    document.querySelector(".sidebar").classList.toggle("active"); 
});
