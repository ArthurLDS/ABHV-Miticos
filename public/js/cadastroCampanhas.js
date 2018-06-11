$(document).ready(function() {
    alert("AAAAAAAAAAAAAAA");
    $("[name='formEvento']").submit((e) => {
        e.preventDefault();
    })
});

function colaborar(mensagem){
	alert(mensagem);
}

function teste(){
    console.log("Foi");
	    
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        /* the route pointing to the post function */
        url: 'campanhas/save',
        type: 'POST',
        dataType: 'JSON',
        /* send the csrf-token and the input to the controller */
        data: {_token: CSRF_TOKEN, 
            responsavel: "Arthur",
            tipoEvento: "DOS BOM",
            dataEvento: "2018-01-01",
            endereco: "Rua tal",
            cidade: "Taquara",
            objetivoEvento: "Arrecadar alimentos"
        },
        /* remind that 'data' is the response of the AjaxController */
        success: function (data) { 
            console.log(data);
            alert("FOI");
        }
    }); 
}

function criarEvento(){
    let isFormValid =  $("[name='formEvento']").valid();
    
    if(isFormValid){
        let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            /* the route pointing to the post function */
            url: 'campanhas/save',
            type: 'POST',
            dataType: 'JSON',
            /* send the csrf-token and the input to the controller */
            data: {_token: CSRF_TOKEN, 
                responsavel: $("[name='responsavel']").val(),
                tipoEvento:  $("[name='tipoEvento']").val(),
                dataEvento: $("[name='dataEvento']").val(),
                endereco: $("[name='endereco']").val(),
                cidade: $("[name='cidade']").val(),
                objetivoEvento: $("[name='objetivoEvento']").val()
            },
            /* remind that 'data' is the response of the AjaxController */
            success: function (data) { 
                console.log(data);
                alert("FOI");
            }
        }); 
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
        });

        console.log(resposta);

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
    console.log(circle.radius);
    
     map.addMarker(marker);
    //circle.bindTo('center', marker, 'position');
}
