$(document).ready(function(){
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