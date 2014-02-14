$( document ).ready(function()
{
    $(function() 
    {
        $('#upload_photo').change(function(e)
        {
          addImage(e); 
         });

        function addImage(e)
        {
            var file = e.target.files[0],
            imageType = /image.*/;
        
            if (!file.type.match(imageType))
            return;
      
            var reader = new FileReader();
            reader.onload = fileOnload;
            reader.readAsDataURL(file);
        }
      
        function fileOnload(e) 
        {
            var result=e.target.result,
                imagen = new Image(250,187);
            imagen.src=result;

            oFoto = jQuery('#photo');
            oContexto = oFoto[0].getContext('2d');
            oContexto.clearRect(0, 0, 250, 187);
            oContexto.drawImage(imagen, 0, 0);
        }
    });

    //Nos aseguramos que estén definidas
    //algunas funciones básicas
    window.URL = window.URL || window.webkitURL;
    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia ||
    function() {
        alert('Su navegador no soporta navigator.getUserMedia().');
    };

    //Este objeto guardará algunos datos sobre la cámara
    window.datosVideo = {
        'StreamVideo': null,
        'url': null
    }

    jQuery('#start_camera').on('click', function(e) {

        //Pedimos al navegador que nos da acceso a 
        //algún dispositivo de video (la webcam)
        navigator.getUserMedia({
            'audio': false,
            'video': true
        }, function(streamVideo) {
            datosVideo.StreamVideo = streamVideo;
            datosVideo.url = window.URL.createObjectURL(streamVideo);
            jQuery('#camera').attr('src', datosVideo.url);

        }, function() {
            alert('No fue posible obtener acceso a la cámara.');
        });

    });

    jQuery('#stop_camera').on('click', function(e) {

        if (datosVideo.StreamVideo) {
            datosVideo.StreamVideo.stop();
            window.URL.revokeObjectURL(datosVideo.url);
        }

    });
    jQuery('#take_photo').on('click', function(e) {
        var oCamara, oFoto, oContexto, w, h;
        oCamara = jQuery('#camera');
        oFoto = jQuery('#photo');
        w = oCamara.width();
        h = oCamara.height();
        oFoto.attr({
            'width': w,
            'height': h
        });
        oContexto = oFoto[0].getContext('2d');
        oContexto.drawImage(oCamara[0], 0, 0, w, h);
    });  

    jQuery('#new_user_submit').on('click',function(){
        var canvas = document.getElementById('photo');
        var context = canvas.getContext('2d');
        var dataURL = canvas.toDataURL();
        var opt;
        dataURL = dataURL+'';

        var temp = window.location.href,
        temp2 = temp.split('/'),
        parts;
        $.each(temp2, function(key, line) 
        {
            parts = line.split(' ');
        });
        if(parts[parts.length-1]=='fotoUser.php')
        {
            opt="usuario";
        }
        else if(parts[parts.length-1]=='fotoPaciente.php')
        {
            opt="paciente";
        }
        alert(opt);
        var parametros = {'img': dataURL,'op':opt};

        jQuery.ajax(
        {
            data: parametros,
            url: 'guardarimgs.php',
            type: 'post',
            success: function(data)
            {
                alert(data['option']);
            }
        }).done(function(o)
            {
              console.log('Guardado!');
            });
    }); 
});