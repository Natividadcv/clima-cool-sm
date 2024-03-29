/*====================================================
SUBIENDO LA FOTO DEL USUARIO
======================================================*/
$(".nuevaFoto").change(function () {
  let imagen = this.files[0];

  /*====================================================
    VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
    ======================================================*/

  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
    $(".nuevaFoto").val("");

    const swal = new SweetAlert({
      title: "Error al subir la imagen",
      text: "¡La imagen debe estar en formato JPG o PNG!",
      type: "error",
      confirmButtonText: "¡Cerrar!",
    });
  } else if (imagen["size"] > 2000000) {
    $(".nuevaFoto").val("");

    const swal = new SweetAlert({
      title: "Error al subir la imagen",
      text: "¡La imagen no debe pesar más de 2MB!",
      type: "error",
      confirmButtonText: "¡Cerrar!",
    });
  } else {
    let datosImagen = new FileReader();
    datosImagen.readAsDataURL(imagen);

    $(datosImagen).on("load", function (event) {
      let rutaImagen = event.target.result;

      $(".previsualizar").attr("src", rutaImagen);
    });
  }
});

/*====================================================
  AGREGAR USUARIO
  ======================================================*/

/*====================================================
  EDITAR USUARIO
  ======================================================*/

$(".btnEditarUsuario").click(function () {
  let idUsuario = $(this).attr("idUsuario");

  let datos = new FormData();
  datos.append("idUsuario", idUsuario);

  $.ajax({
    url: "ajax/usuarios.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      console.log({ respuesta });

      $("#txtEditarNombre").val(respuesta["nombre"]);
      $("#txtEditarUsuario").val(respuesta["usuario"]);
      $("#editarPerfil").html(respuesta["perfil"]);
      $("#editarPerfil").val(respuesta["perfil"]);
      $("#fotoActual").val(respuesta["foto"]);
      $("#passwordActual").val(respuesta["password"]);

      if (respuesta["foto"] != "") {
        $(".previsualizar").attr("src", respuesta["foto"]);
      }
    },
  });
});
