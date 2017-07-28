$(document).ready(function(){
    // for forms
    $('.message a').click(function(){
        $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
    });
    $('#second_email').on('keyup',function(event){
        if( $(this).val() != $('#first_email').val() ){
            $('#email_error').show();           
        }
    });
    $('#second_pass').on('keyup',function(event){
        if( $(this).val() != $('#first_pass').val() ){
            $('#pass_error').show();           
        }
    });
});