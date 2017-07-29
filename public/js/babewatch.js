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

    // Set up web cam
    Webcam.set({
        dest_width: 640,
        dest_height: 480,
        image_format: 'png',
        force_flash: false
    });
    Webcam.attach( '#camera' );

    $('#capture').click(function(){
        Webcam.snap( function(data_uri) {
            // convertURIToImageData(data_uri).then(function(imageData) {
                $.ajax({
                    type: "POST", 
                    url: "/verifyfriend", 
                    data:  { 'image' : data_uri , '_token' : CSRF_TOKEN }, 
                    success: function(result){
                        console.log(result);
                    }
                });
            // });
            
        } );

    });
});