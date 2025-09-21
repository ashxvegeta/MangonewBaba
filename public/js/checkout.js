$(document).ready(function() {
    $('.rzrpay_btn').click(function() {
        // Handle Razorpay payment integration here
         var name = $('#name').val().trim();
         var email = $('#email').val().trim();
         var phone = $('#phone').val().trim();
         var address = $('#address').val().trim();
         var city = $('#city').val().trim();
         var state = $('#state').val().trim();
         
         if(!name){
            name_error = 'Name is required';
            $('#name_error').html('');
            $('#name_error').text(name_error);
         }
         else{
            $('#name_error').html('');
         }
         if(!email){
            email_error = 'Email is required';
            $('#email_error').html('');
            $('#email_error').html(email_error);
            
         }
         else{
            $('#email_error').html('');
         }
         if(!phone){
            phone_error = 'Phone is required';
            $('#phone_error').html('');
            $('#phone_error').html(phone_error);
         }
        else{
            $('#phone_error').html('');
         }
         if(!address){
            address_error = 'Address is required';
            $('#address_error').html('');
            $('#address_error').html(address_error);

         }
         else{
            $('#address_error').html('');
         }
         if(!city){
            city_error = 'City is required';
            $('#city_error').html('');
            $('#city_error').html(city_error);
         }else{
            $('#city_error').html('');
         }
         if(!state){
            state_error = 'State is required';
            $('#state_error').html('');
            $('#state_error').html(state_error);
         }
        else{
            $('#state_error').html('');
        }

         if(name != '' && email != '' && phone != '' && address != '' && city != '' && state != ''){
           var data = {
               'name': name,
               'email': email,
               'phone': phone,
               'address': address,
               'city': city,
               'state': state
           };
             $.ajax({
                   method: "POST",
                     url: "/proceed-to-pay",
                     data: data,
                     success: function (response) {
                        alert(response.total_price);
                        // var options = {
                        //       "key": "rzp_test_1DP5mmOlF5G5ag", // Enter the Key ID generated from the Dashboard
                        //       "amount": response.total_price * 100, // Amount is in currency subunits. Default currency is INR. Hence, 100 refers to 100 paise
                        //       "currency": "INR",
                        //       "name": "E-commerce",
                        //       "description": "Test Transaction",
                        //       "image": "https://example.com/your_logo",
                        //       "order_id": response.id, //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                        //       "handler": function (responsea){
                        //           // alert(responsea.razorpay_payment_id);
                        //       }
                        //   };
                        //   var rzp1 = new Razorpay(options);
                        //   rzp1.open();
                      }
                  });
              }
          });
});