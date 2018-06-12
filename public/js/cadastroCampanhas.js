var base64Image = "";

$(document).ready(function() {
    $("[name='formEvento']").submit((e) => {
        e.preventDefault();
    })
});

function colaborar(mensagem){
	alert(mensagem);
}

function criarEvento(){
    let isFormValid =  $("[name='formEvento']").valid();
    
    if(isFormValid){
        let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            /* the route pointing to the post function */
            url: 'campanhas/save',
            type: 'POST',
            /* send the csrf-token and the input to the controller */
            data: {_token: CSRF_TOKEN, 
                tituloEvento: $("[name='tituloEvento']").val(),
                responsavel: $("[name='responsavel']").val(),
                cnpjCpf: $("[name='cnpjCpf']").val(),
                email: $("[name='email']").val(),
                tipoEvento:  $("[name='tipoEvento']").val(),
                dataEvento: $("[name='dataEvento']").val(),
                endereco: $("[name='endereco']").val(),
                cidade: $("[name='cidade']").val(),
                objetivoEvento: $("[name='objetivoEvento']").val(),
                imagemBase64: base64Image
            }
        }).done(function (response) { 
            console.log("OK", response)
            $("#alert-success").show();
        })
        .fail(function (response) { 
            console.log("FAIL", response)
            $("#alert-error").show();
        })
    }
}

function encodeImagetoBase64(element) {
       
    console.log(element.files);
    let self = this;
    if (element.files && element.files[0]) {
        var FR= new FileReader();
    
        FR.addEventListener("load", function(e) {
          console.log(e.target.result.length);
          self.base64Image = e.target.result;
        }); 
        
        FR.readAsDataURL( element.files[0]);
    }
    
}
$("[name='cidade']").blur(function () {
    setTimeout(function () {
        let txt_raio = 1000;
        let txt_endereco = $("[name='endereco']").val() + ", " + $("[name='cidade']").val();
        let url = `https://maps.googleapis.com/maps/api/geocode/json?address=${txt_endereco}`;
        let resposta;

        $.getJSON(url, function (data) {
            resposta = data.results[0].geometry.location;
            initMap(txt_raio, resposta.lat, resposta.lng);
        })
    }, 500);
});

    
function initMap(_radius, _latitude, _longitude) {
    if (!(_radius || _latitude || _longitude)) {
        _radius = 5000;
        _latitude = -30.0346471;
        _longitude = -51.2176584;
    }
    var map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: _latitude, lng: _longitude },
        zoom: 14
    });
    var marker = new google.maps.Marker({
        position: { lat: _latitude, lng: _longitude },
        animation: google.maps.Animation.DROP,
        map: map
    });
    var circle = new google.maps.Circle({
        map: map,
        radius: _radius,    // 10 miles in metres
        fillColor: '#AA0000',
        strokeColor: '#FFF',
        strokeWeight: .9
    });
    map.addMarker(marker);
    //circle.bindTo('center', marker, 'position');
}
