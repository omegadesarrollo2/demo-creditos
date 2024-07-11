$(document).ready(function () {
  $('#btn-found-user').on('click', function () {
    var user = $('#user').val();
    $.ajax({
      url: '/page/login/foundUser',
      method: 'post',
      data: {
        user: user
      },
      dataType: 'json',
      success: function (response) {
        if (response.status == 'found') {
          var data = JSON.parse(response.data)
          $('.password-container').show(300)
        } else {
          $('.password-container').hide()
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El usuario no existe',
          })
        }
      }
    })
  });
  $('#loginForm').on('submit', function (e) {
    e.preventDefault();
    let data = $(this).serialize();
    $.ajax({
      url: $(this).attr('action'),
      method: 'post',
      data: data,
      dataType: 'json',
      success: function (response) {
        if (response.status == 'success') {
          Swal.fire({
            icon: 'success',
            text: response.message,
          }).then((result) => {
            window.location.href = '/page/sistema'
          })
        } else if (response.status == 'error') {
          Swal.fire({
            icon: 'error',
            text: response.message,
          })
        }
      }
    })
  })
  $('#registerForm').on('submit', function (e) {
    e.preventDefault();
    let data = $(this).serialize();
    $.ajax({
      url: $(this).attr('action'),
      method: 'post',
      data: data,
      dataType: 'json',
      success: function (response) {
        if (response.status == 'success') {
          Swal.fire({
            icon: 'success',
            text: response.message,
          }).then((result) => {
            window.location.href = '/'
          })
        } else if (response.status == 'error') {
          Swal.fire({
            icon: 'error',
            text: response.message,
          })
        }
      }
    })
  })
  $("#password").on("keyup", function () {
    validar_clave($(this).val());
    comparar_claves();
  });
  $("#repeat_password").on("keyup", function () {
    comparar_claves();
  });
  function comparar_claves() {
    let clave = $("#password").val(),
      clave2 = $("#repeat_password").val();
    if (clave == clave2) {
      $("#alert-contrasenia2").hide();
    } else {
      $("#alert-contrasenia2").show();
    }
  }
});
function validar_clave(contrasenna) {
  var mayuscula = false;
  var minuscula = false;
  var numero = false;
  var count = false;

  for (var i = 0; i < contrasenna.length; i++) {
    if (contrasenna.charCodeAt(i) >= 65 && contrasenna.charCodeAt(i) <= 90) {
      mayuscula = true;
    } else if (
      contrasenna.charCodeAt(i) >= 97 &&
      contrasenna.charCodeAt(i) <= 122
    ) {
      minuscula = true;
    } else if (
      contrasenna.charCodeAt(i) >= 48 &&
      contrasenna.charCodeAt(i) <= 57
    ) {
      numero = true;
    }
  }
  if (mayuscula == true && minuscula == true && numero == true) {
    if (contrasenna.length > 8) {
      $("#alert-contrasenia").hide();
    } else {
      $("#alert-contrasenia").show();
    }
  } else {
    $("#alert-contrasenia").show();
  }
}

var videos = [];
$(document).ready(function () {
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
  $('.dropdown-toggle').dropdown();
  $(".carouselsection").carousel({
    quantity: 4,
    sizes: {
      '900': 3,
      '500': 1
    }
  });
  $(".banner-video-youtube").each(function () {
    console.log($(this).attr("data-video"));
    var datavideo = $(this).attr("data-video");
    var idvideo = $(this).attr("id");
    var playerDefaults = { autoplay: 0, autohide: 1, modestbranding: 0, rel: 0, showinfo: 0, controls: 0, disablekb: 1, enablejsapi: 0, iv_load_policy: 3 };
    var video = { 'videoId': datavideo, 'suggestedQuality': 'hd720' };
    videos[videos.length] = new YT.Player(idvideo, {
      'videoId': datavideo, playerVars: playerDefaults, events: {
        'onReady': onAutoPlay,
        'onStateChange': onFinish
      }
    });
  });
  function onAutoPlay(event) {
    event.target.playVideo();
    event.target.mute();
  }
  function onFinish(event) {
    if (event.data === 0) {
      event.target.playVideo();
    }
  }


  $(".file-image").fileinput({
    maxFileSize: 10240,
    previewFileType: "image",
    allowedFileExtensions: ["jpg", "jpeg", "gif", "png"],
    browseClass: "btn  btn-verde",
    showUpload: false,
    showRemove: false,
    browseIcon: "<i class=\"fas fa-image\"></i> ",
    browseLabel: "Imagen",
    language: "es",
    dropZoneEnabled: false
  });

  $(".file-document").fileinput({
    maxFileSize: 10240,
    previewFileType: "image",
    browseLabel: "Examinar",
    browseClass: "btn  btn-cafe",
    allowedFileExtensions: ["pdf", "jpg", "jpeg", "gif", "png"],
    showUpload: false,
    showRemove: false,
    browseIcon: "<i class=\"fas fa-folder-open\"></i> ",
    language: "es",
    dropZoneEnabled: false
  });

  $(".file-robot").fileinput({
    maxFileSize: 10240,
    previewFileType: "image",
    allowedFileExtensions: ["txt", ".txt"],
    browseClass: "btn btn-success btn-file-robot",
    showUpload: false,
    showRemove: false,
    browseLabel: "Robot",
    browseIcon: "<i class=\"fas fa-robot\"></i> ",
    language: "es",
    dropZoneEnabled: false,
    showPreview: false
  });

  $(".file-sitemap").fileinput({
    maxFileSize: 10240,
    previewFileType: "image",
    allowedFileExtensions: ["xml", ".xml"],
    browseClass: "btn btn-success btn-file-sitemap",
    showUpload: false,
    showRemove: false,
    browseLabel: "SiteMap",
    browseIcon: "<i class=\"fas fa-sitemap\"></i> ",
    language: "es",
    dropZoneEnabled: false,
    showPreview: false
  });

  if ($("#linea") && $("#id1").val() != "") {
    //seleccionar_linea();
    //$("#linea").change();
  }
  if ($("#recoge")) {
    //recoger();
  }

});




