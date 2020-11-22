_producto = (function () {
    let url = location.protocol + "//" + location.host + "/producto/";

    var cargarTabla = function (data) {
        $("#tblProductos tbody").empty();
        data.data.forEach(function (producto, i) {
            $("#tblTiendas tbody").append(`
                        <tr>
                        <td>`+ producto.sku + `</td>
                        <td>`+ producto.nombre + `</td>
                        <td>`+ producto.description+ `</td>
                        <td>`+ producto.imagen+ `</td>
                        <td> <button class="btn btn-success btn-sm btn-edt">Editar</button>
                        <button class="btn btn-danger btn-sm btn-desac">Eliminar</button></td>
                        </tr>
                    `);
        });
    }

    var crearProducto = function () {

        var formulario = $("#formproducto").serialize();

        $.ajax({
            url: url + "cproducto/crearProducto",
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
                    $("#pname").val("");
                    $("#pdescripcion").val("");
                    $("#pvalor").val("");
                    $("#ptiendas").val("");
                    $("#pimagen").val("");                    
                    cargarTabla(data);
                }
            },
            error: function (jqXhr, textStatus, errorThrown) {
                debugger;
                console.log(errorThrown);
            },
        });
    };

  

    var actualizarProductos = function () {
        var parametros = {
            //Acá había una error
            sku: $("#sku").val(),
            pname: $("#pname").val(),
            pdescripcion: $("#pdescripcion").val(),
            pvalor: $("#pvalor").val(),
            pvalor: $("#ptiendas").val(),
            pvalor: $("#pimagen").val(),
        };

        $.ajax({
            url: url + "cproducto/actualizarProductos",
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
                    $("#pname").val("");
                    $("#pdescripcion").val("");
                    $("#pvalor").val("");
                    $("#ptiendas").val("");
                    $("#pimagen").val("");
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

    var eliminarProducto = function (sku) {
        var parametros = {
            sku: sku,
        };
        $.ajax({
            url: url + "cproducto/eliminarProducto",
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
        crearProducto: crearProducto,
       
        actualizarProductos: actualizarProductos,
        eliminarProducto: eliminarProducto,
    };
})();

$("#btnGuardar")
    .off("click")
    .on("click", function () {
        if ($("#pname").val() == "" || $("#pdescripcion").val() == ""|| $("#pvalor").val() == ""||$("#ptiendas").val() == ""||$("#pimagen").val() == "") {
            $("#divmsj-productos").show();
            setTimeout(() => {
                $("#divmsj-productos").hide();
            }, 3000);
        } else {
            pro.crearTienda();
        }
    });

$("#btnActualizar")
    .off("click")
    .on("click", function () {
        if ($("#pname").val() == "" || $("#pdescripcion").val() == ""|| $("#pvalor").val() == ""||$("#ptiendas").val() == ""||$("#pimagen").val() == "")  {
            $("#divmsj-tienda").show();
            setTimeout(() => {
                $("#divmsj-tienda").hide();
            }, 3000);
        } else {
            _producto.actualizarProducto();
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
        $("#pname").val($.trim(info[1]));
        $("#pdescripcion").val($.trim(info[2]));
        $("#pvalor").val($.trim(info[3]));
        $("#ptiendas").val($.trim(info[4]));
        $("#pimagen").val($.trim(info[5]));
        //Acá había una error
        $("#sku").val($.trim(info[0]));
        $("#sku").focus();
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
        _producto.eliminarProducto(info[0]);
    });