_tienda = (function () {
    let url = location.protocol + "//" + location.host + "/tienda/";

    var cargarTabla = function (data) {
        $("#tblTiendas tbody").empty();
        data.data.forEach(function (tienda, i) {
            $("#tblTiendas tbody").append(`
                        <tr>
                        <td>`+ tienda.id + `</td>
                        <td>`+ tienda.nombre + `</td>
                        <td>`+ tienda.fecha_apertura + `</td>
                        <td> <button class="btn btn-success btn-sm btn-edt">Editar</button>
                        <button class="btn btn-danger btn-sm btn-desac">Eliminar</button></td>
                        </tr>
                    `);
        });
    }

    var crearTienda = function () {

        var formulario = $("#formtienda").serialize();

        $.ajax({
            url: url + "ctienda/crearTienda",
            type: "post",
            data: formulario,
            cache: false,
            success: function (request, textStatus, jQxhr) {
                debugger;
                var data = JSON.parse(request);
                if (data.status == 200) {
                    $.notify(data.msj, {
                        className: "success",
                        globalPosition: "top center",
                        autoHideDelay: 3000,
                    });
                    $("#tname").val("");
                    $("#tfecha").val("");
                    cargarTabla(data);
                }
            },
            error: function (jqXhr, textStatus, errorThrown) {
                debugger;
                console.log(errorThrown);
            },
        });
    };

    var consultarCategorias = function (reload) {
        let url = location.protocol + "//" + location.host + "/pharmadmin/";
        $.ajax({
            url: url + "ccategoria/consultarCategorias",
            type: "post",
            cache: false,
            success: function (request, textStatus, jQxhr) {
                var data = JSON.parse(request);
                if (data.status == 200) {
                    var categoriasActivas = Array();
                    var categoriasInactivas = Array();
                    var conAct = 0;
                    var conInac = 0;
                    data.data.forEach(function (element, index) {
                        if (element.estado == 0) {
                            categoriasInactivas[index - conAct] = element;
                            conInac = conInac + 1;
                        } else {
                            categoriasActivas[index - conInac] = element;
                            conAct = conAct + 1;
                        }
                    });
                    fxcategoriasActivas(categoriasActivas, reload);
                    fxcategoriasInactivas(categoriasInactivas, reload);
                }
            },
            error: function (jqXhr, textStatus, errorThrown) {
                console.log(errorThrown);
            },
        });
    };

    var actualizarTienda = function () {
        var parametros = {
            //Acá había una error
            idtienda: $("#idtienda").val(),
            tname: $("#tname").val(),
            tfecha: $("#tfecha").val(),
        };

        $.ajax({
            url: url + "ctienda/actualizarTienda",
            type: "post",
            data: parametros,
            cache: false,
            success: function (request, textStatus, jQxhr) {
                debugger;
                var data = JSON.parse(request);
                if (data.status == 200) {
                    $.notify(data.msj, {
                        className: "success",
                        globalPosition: "top center",
                        autoHideDelay: 3000,
                    });
                    $("#tname").val("");
                    $("#tfecha").val("");
                    $("#reg").show();
                    $("#act").hide();
                    $("#btnGuardar").show();
                    $("#btnActualizar").hide();
                    $("#idtienda").val("");

                    cargarTabla(data);
                }
            },
            error: function (jqXhr, textStatus, errorThrown) {
                console.log(errorThrown);
            },
        });
    };

    var eliminarTienda = function (id) {
        var parametros = {
            idtienda: id,
        };
        $.ajax({
            url: url + "ctienda/eliminarTienda",
            type: "post",
            data: parametros,
            cache: false,
            success: function (request, textStatus, jQxhr) {
                var data = JSON.parse(request);
                if (data.status == 200) {
                    $.notify(data.msj, {
                        className: "success",
                        globalPosition: "top center",
                        autoHideDelay: 3000,
                    });
                    cargarTabla(data);
                }
            },
            error: function (jqXhr, textStatus, errorThrown) {
                console.log(errorThrown);
            },
        });
    };
    return {
        crearTienda: crearTienda,
        consultarCategorias: consultarCategorias,
        actualizarTienda: actualizarTienda,
        eliminarTienda: eliminarTienda,
    };
})();

$("#btnGuardar")
    .off("click")
    .on("click", function () {
        if ($("#tname").val() == "" || $("#tfecha").val() == "") {
            $("#divmsj-tienda").show();
            setTimeout(() => {
                $("#divmsj-tienda").hide();
            }, 3000);
        } else {
            _tienda.crearTienda();
        }
    });

$("#btnActualizar")
    .off("click")
    .on("click", function () {
        if ($("#tname").val() == "" || $("#tfecha").val() == "") {
            $("#divmsj-tienda").show();
            setTimeout(() => {
                $("#divmsj-tienda").hide();
            }, 3000);
        } else {
            _tienda.actualizarTienda();
        }
    });
$(document).ready(function () {
    // _tienda.consultarCategorias(false);
});
$(document)
    .off("click", ".btn-edt")
    .on("click", ".btn-edt", function () {
        var info = Array();
        $(this)
            .parents("tr")
            .find("td")
            .each(function (index) {
                info[index] = $(this).html();
            });
        debugger;
        $("#reg").hide();
        $("#act").show();
        $("#btnGuardar").hide();
        $("#btnActualizar").show();
        $("#tname").val($.trim(info[1]));
        $("#tfecha").val($.trim(info[2]));
        //Acá había una error
        $("#idtienda").val($.trim(info[0]));
        $("#tname").focus();
    });

$(document)
    .off("click", ".btn-desac")
    .on("click", ".btn-desac", function () {
        var info = Array();
        $(this)
            .parents("tr")
            .find("td")
            .each(function (index) {
                info[index] = $(this).html();
            });
        _tienda.eliminarTienda(info[0]);
    });