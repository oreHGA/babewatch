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

    // 
    function convertURIToImageData(URI) {
        return new Promise(function(resolve, reject) {
            if (URI == null) return reject();
            var canvas = document.createElement('canvas'),
                context = canvas.getContext('2d'),
                image = new Image();
            image.addEventListener('load', function() {
            canvas.width = image.width;
            canvas.height = image.height;
            context.drawImage(image, 0, 0, canvas.width, canvas.height);
            resolve(context.getImageData(0, 0, canvas.width, canvas.height));
            }, false);
            image.src = URI;
        });
    }
    $('#addfriend').click(function(){
        $('#verify_spinner').show();
    });
    // Set up web cam
    Webcam.set({
        dest_width: 320,
        dest_height: 240,
        image_format: 'png',
        force_flash: false
    });
    Webcam.attach( '#camera' );

    $('#capture').click(function(){
        $('#verify_spinner').show();
        // disable button
        $('#capture').attr('disabled', true);
        Webcam.snap( function(data_uri) {
                $.ajax({
                    type: "POST", 
                    url: "/verifyfriend", 
                    data:  { 'image' : data_uri , '_token' : CSRF_TOKEN }, 
                    success: function(result){
                        data = JSON.parse(result);
                        var status = data.status;
                        var message = data.message;
                        $('#verify_spinner').hide();
                        $('#capture').attr('disabled', false);
                        generatePopUpHTML(status, message);
                        $('#modalToggler').click();
                    }
                });
        } );
    });
    $('body').on('click', '#close', function(){$('#modalToggler').click() });
    function generatePopUpHTML(status, message){
        // destination_id is where the final div with result tags will be sent
        var titleHTML = "";
        var bodyHTML = "";
        var footerHTML = ""; 
        titleHTML = '<button type="button" class="close" data-dismiss="modal">&times;</button>';   
        titleHTML += '<h3>👶🏾 Babewatch</h3>';
        bodyHTML = '<div class="container">' + message + '</div>';
        if(status == "Pass"){
            footerHTML = '<a href="' + APP_URL + "/success" + '"><button type="button"  style="background-color:#030303;" class="btn btn-primary" id="submit">Continue</button></a>';
        }else{
            footerHTML = '<button type="button" class="btn btn-primary"  style="background-color:#030303;" id="close">Go Back</button>';   
            $('.modal-body').addClass('container');
        }     
        
        $('.modal-header').html( titleHTML );
        $('.modal-body').html( bodyHTML );
        $('.modal-footer').html( footerHTML );
    }
});