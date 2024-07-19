$(document).ready(function () {
  var panel = $("#panel-botones");
  var panelHeight = panel.outerHeight();
  var togglePoint = panelHeight * 0.1;

  $(window).on("scroll", function () {
    if ($(window).scrollTop() > togglePoint) {
      panel.hide(300);
      // Update the toggle point to avoid repeated toggles at the same point
      togglePoint = $(window).scrollTop() + panelHeight * 0.1;
    }
  });
});

$(document).ready(function () {
  $(".dropdown-link").on("click", function (e) {
    e.preventDefault();
    $(this).toggleClass("active");
    $(this).next().slideToggle();
    $(this).find(".dropdown-icon").toggleClass("rotate");
  });

  $(".dial").knob({
    readOnly: true,
    fgColor: "#00c0ef",
    bgColor: "#00c0ef20",
  });
  $(function () {
    $(".currency").maskMoney({
      precision: 0,
      thousands: ".",
    });
  });
  // var element = document.getElementById('embed_paso1');
  // html2pdf(element);
  $(".selec-multiple").select2({
    tags: true,
  });
  $("#form-solicitud").on("submit", function (e) {
    var notificacion_enviada = $("#notificacion_enviada").val();
    var validacion = $("#validacion").val();
    var linea = $("#linea").val();
    var valor = $("#valor").val();
    var cuotas = $("#cuotas").val();
    var valor_cuota = $("#valor_cuota").val();
    var valor_desembolso = $("#valor_desembolso").val();
    var linea_desembolso = $("#linea_desembolso").val();
    var cuotas_desembolso = $("#cuotas_desembolso").val();
    var valor_cuota_desembolso = $("#valor_cuota_desembolso").val();
    if (notificacion_enviada == 0 && validacion == 7) {
      if (
        linea != linea_desembolso ||
        valor != valor_desembolso ||
        cuotas != cuotas_desembolso ||
        valor_cuota != valor_cuota_desembolso
      ) {
        var r = confirm(
          "Se han modificado algunos valores de desembolso, se enviara una notificación al usuario. ¿desea continuar?"
        );
        if (r == false) {
          e.preventDefault();
        } else {
          $("#confirm_user").val(1);
        }
      } else {
        $("#confirm_user").val(0);
      }
    }
  });

  tinyMCE.init({
    mode: "specific_textareas",
    editor_selector: "tinyeditor",
    theme: "modern",
    color_picker_callback: function (callback, value) {
      callback("#FF0000");
    },
    block_formats: "Parrafo=p;Titulo 1=h2;Titulo 2=h3;Titulo 3=h4;Titulo 4=h5",
    language_url: "/scripts/tinymce/langs/es.js",
    language: "es",
    plugins:
      "contextmenu,textcolor,colorpicker,link ,responsivefilemanager, table ,visualblocks,code,paste,image, charmap, print, preview, anchor,advlist,media, table, contextmenu, paste ",
    external_filemanager_path: "/scripts/tinymce/plugins/filemanager/",
    filemanager_title: "Responsive Filemanager",
    external_plugins: {
      filemanager: "/scripts/tinymce/plugins/filemanager/plugin.min.js",
      responsivefilemanager:
        "/scripts/tinymce/plugins/responsivefilemanager/plugin.min.js",
    },
    theme_modern_toolbar_location: "bottom",
    paste_auto_cleanup_on_paste: true,

    fontsize_formats:
      "12px 14px 16px 18px 20px 22px 24px 26px 28px 30px 32px 36px 38px 40px 45px 50px 55px 60px 65px 70px 75px",
    toolbar:
      "mybutton,|,formatselect,|,fontsizeselect,forecolor,|,bold,italic,underline,|,alignleft, aligncenter, alignright, alignjustify,bullist,numlist,|,link,unlink,image,media,responsivefilemanager,|,removeformat,code",
    menubar: false,
    resize: true,
    browser_spellcheck: true,
    statusbar: true,
    relative_urls: false,
    image_title: true,
    image_advtab: true,
    style_formats: [
      {
        title: "Image Left",
        selector: "img",
        styles: {
          float: "left",
          margin: "0 10px 0 10px",
        },
      },
      {
        title: "Image Right",
        selector: "img",
        styles: {
          float: "right",
          margin: "0 10px 0 10px",
        },
      },
    ],
    setup: function (editor) {
      editor.on("init", function (e) {
        editor.getDoc().body.style.fontSize = "16px";
      });
      editor.addButton("mybutton", {
        type: "listbox",
        text: "Tema Claro",
        icon: false,
        onselect: function (e) {
          editor.getWin().document.body.style.backgroundColor = this.value();
        },
        values: [
          { text: "Tema Claro", value: "#FFFFFF" },
          { text: "Tema Oscuro", value: "#333333" },
        ],
      });
    },
  });
  $(".file-image").fileinput({
    maxFileSize: 2048,
    previewFileType: "image",
    allowedFileExtensions: ["jpg", "jpeg", "gif", "png"],
    browseClass: "btn  btn-verde",
    showUpload: false,
    showRemove: false,
    browseIcon: '<i class="fas fa-image"></i> ',
    browseLabel: "Imagen",
    language: "es",
    dropZoneEnabled: false,
  });

  $(".file-document").fileinput({
    maxFileSize: 10240,
    previewFileType: "image",
    browseLabel: "Archivo",
    browseClass: "btn  btn-cafe",
    allowedFileExtensions: ["pdf", "jpg", "jpeg", "gif", "png", "xlsx"],
    showUpload: false,
    showRemove: false,
    browseIcon: '<i class="fas fa-folder-open"></i> ',
    language: "es",
    dropZoneEnabled: false,
  });

  $(".file-robot").fileinput({
    maxFileSize: 2048,
    previewFileType: "image",
    allowedFileExtensions: ["txt", ".txt"],
    browseClass: "btn btn-success btn-file-robot",
    showUpload: false,
    showRemove: false,
    browseLabel: "Robot",
    browseIcon: '<i class="fas fa-robot"></i> ',
    language: "es",
    dropZoneEnabled: false,
    showPreview: false,
  });

  $(".file-sitemap").fileinput({
    maxFileSize: 2048,
    previewFileType: "image",
    allowedFileExtensions: ["xml", ".xml"],
    browseClass: "btn btn-success btn-file-sitemap",
    showUpload: false,
    showRemove: false,
    browseLabel: "SiteMap",
    browseIcon: '<i class="fas fa-sitemap"></i> ',
    language: "es",
    dropZoneEnabled: false,
    showPreview: false,
  });
  $('[data-toggle="tooltip"]').tooltip();
  $(".up_table,.down_table").click(function () {
    var row = $(this).parents("tr:first");
    var value = row.find("input").val();
    var content1 = row.find("input").attr("id");
    var content2 = 0;
    if ($(this).is(".up_table")) {
      if (row.prev().find("input").val() > 0) {
        row.find("input").val(row.prev().find("input").val());
        row.prev().find("input").val(value);
        content2 = row.prev().find("input").attr("id");
        row.insertBefore(row.prev());
      }
    } else {
      if (row.next().find("input").val() > 0) {
        row.find("input").val(row.next().find("input").val());
        row.next().find("input").val(value);
        content2 = row.next().find("input").attr("id");
        row.insertAfter(row.next());
      }
    }
    var route = $("#order-route").val();
    var csrf = $("#csrf").val();
    if (route != "") {
      $.post(route, { csrf: csrf, id1: content1, id2: content2 });
    }
  });

  $(".selectpagination").change(function () {
    var route = $("#page-route").val();
    var pages = $(this).val();
    $.post(route, { pages: pages }, function () {
      location.reload();
    });
  });

  $(".changetheme").on("change", function () {
    var color = "#FFFFFF";

    var contenedor = $(this).attr("data-campo-tiny");
    if ($(this).val() == 1) {
      color = "#333333";
    }
    var editor = window.tinyMCE.get(contenedor);
    editor.getWin().document.body.style.backgroundColor = color;
  });
  $(".switch-form").bootstrapSwitch({
    onText: "Si",
    offText: "No",
  });

  $("#contenido_tipo").on("change", function () {
    var value = $(this).val();
    if (parseInt(value) == 1) {
      //Si es un banner
      $(".no-seccion").hide();
      $(".no-banner").hide();
      $(".no-contenido").hide();
      $(".si-banner").show();
    } else if (parseInt(value) == 2) {
      //Si es un Contenedor
      $(".no-seccion").hide();
      $(".no-banner").hide();
      $(".no-contenido").hide();
      $(".si-seccion").show();
    } else if (parseInt(value) == 3) {
      //Si es un contenido simple
      $(".no-seccion").hide();
      $(".no-banner").hide();
      $(".no-contenido").hide();
      $(".si-contenido").show();
    } else if (parseInt(value) == 5) {
      //Si es un contenido de Contenedor
      $(".no-acordion").hide();
      $(".no-carrousel").hide();
      $(".no-contenido2").hide();
      $(".si-contenido2").show();
    } else if (parseInt(value) == 6) {
      //Si es un contenido de Contenedor
      $(".no-contenido2").hide();
      $(".no-acordion").show();
      $(".no-carrousel").hide();
      $(".si-carrousel").show();
    } else if (parseInt(value) == 7) {
      //Si es un banner
      $(".no-acordion").hide();
      $(".no-contenido2").hide();
      $(".no-acordion").hide();
      $(".no-carrousel").hide();
      $(".si-acordion").show();
    }
  });
  $(".colorpicker")
    .colorpicker({
      onChange: function (e) {
        console.log("entro");
      },
    })
    .on("colorpickerChange colorpickerCreate", function (e) {
      console.log("entro");
      // console.log( e.colorpicker.picker.parents('.input-group'));
      //e.colorpicker.picker.parents('.input-group').find('input').css('background-color', e.value);
    })
    .on("create", function (e) {
      var val = $(this).val();
      $(this).css({ backgroundColor: $(this).val() });
    })
    .on("change", function (e) {
      var val = $(this).val();
      $(this).css({ backgroundColor: $(this).val() });
    });
});

function eliminarImagen(campo, ruta) {
  var csrf = $("#csrf").val();
  var csrf_section = $("#csrf_section").val();
  var id = $("#id").val();
  if (confirm("¿Esta seguro de borrar esta imagen?") == true) {
    $.post(
      ruta,
      { id: id, csrf: csrf, csrf_section: csrf_section, campo: campo },
      function (data) {
        if (parseInt(data.elimino) == 1) {
          $("#imagen_" + campo).hide();
        }
      }
    );
  }
  return false;
}
function validarcambios() {}
