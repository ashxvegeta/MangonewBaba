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
    });