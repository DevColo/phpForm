jQuery.validator.addMethod("noSpace", function(value, element) { 
    return value == '' || value.trim().length != 0;  
}, "No space please and don't leave it empty");
jQuery.validator.addMethod("customEmail", function(value, element) { 
  return this.optional( element ) || /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test( value ); 
}, "Please enter valid email address!");
$.validator.addMethod( "alphanumeric", function( value, element ) {
return this.optional( element ) || /^\w+$/i.test( value );
}, "Letters, numbers, and underscores only please" );
var $registrationForm = $('#registration');
if($registrationForm.length){
  var whitelist = ['png','jpe?g','gif'];
  $registrationForm.validate({
      rules:{
          // //username is the name of the textbox
          // fname: {
          //     required: true,
          //     //alphanumeric is the custom method, we defined in the above
          //     alphanumeric: true
          // },
          fname: {
              required: true,
              noSpace: true
          },
          lname: {
              required: true,
              noSpace: true
          },
          email: {
              required: true,
              customEmail: true
          },
          password: {
              required: true
          },
          confirm: {
              required: true,
              equalTo: '#password'
          },
          DOB: {
              required: true
          },    
          gender: {
              required: true
          },
          'skills[]': {
              required: true,
              minlength: 2
          },
          address: {
              required: true
          },
          city: {
              required: true
          },
          state: {
              required: true
          },
          country: {
              required: true
          },
          zipcode: {
              required: true
          },
      },
      messages:{
          // username: {
          //     //error message for the required field
          //     required: 'Please enter username!'
          // },
          fname: {
              required: 'Please enter first name!'
          },
          lname: {
              required: 'Please enter last name!'
          },
          email: {
              required: 'Please enter email!',
              //error message for the email field
              email: 'Please enter valid email!'
          },
          password: {
              required: 'Please enter password!'
          },
          confirm: {
              required: 'Please enter confirm password!',
              equalTo: 'Please enter same password!'
          },
          DOB: {
              required: 'Please enter Date of birth!'
          },
          gender: {
              required: 'Please select gender!'
          },
          'skills[]': {
              required: 'Please select at least two skills!',
              minlength: "Check not less than {0} boxes"
          },
          address: {
              required: 'Please enter address!'
          },
          city: {
              required: 'Please enter city!'
          },
          state: {
              required: 'Please enter state!'
          },
          country: {
              required: 'Please enter country!'
          },
          zipcode: {
              required: 'Please enter zipcode!'
          },
      },
      errorPlacement: function(error, element) 
      {
        if (element.is(":radio")) 
        {
            error.appendTo(element.parents('.gender'));
        }
        else if(element.is(":checkbox")){
            error.appendTo(element.parents('.skills'));
        }
        else 
        { 
            error.insertAfter( element );
        }
        
       }
  });
}