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
    alert('Proceeding to payment gateway');
}else{
    return false; // stop payment flow if any field is empty
}
    
    });
});