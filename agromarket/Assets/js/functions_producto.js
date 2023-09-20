
var tableProductos;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function () {


    tableProductos = $('#tableProductos').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": " " + base_url + "/Producto/getProductos",
            "dataSrc": ""
        },
        "columns": [
            { "data": "pro_id" },
            { "data": "pro_nombre" },
            { "data": "alim_descripcion" },
            { "data": "pro_categoria" },
            { "data": "pro_precio" },
            { "data": "pro_imagen" },
            { "data": "pro_estado" },
            { "data": "options" }

        ],
        'dom': 'lBfrtip',
        'buttons': [
            {
                "extend": "copyHtml5",
                "text": "<i class='far fa-copy'></i> Copiar",
                "titleAttr": "Copiar",
                "className": "btn btn-secondary",
                customize: function (data) {
                    var rows = data.split('\n');
                    var newRows = [];
                    for (var i = 0; i < rows.length; i++) {
                        var cols = rows[i].split('\t');
                        cols.splice(7, 1); // Eliminar la tercera columna (índice 2)
                        newRows.push(cols.join('\t'));
                    }
                    return newRows.join('\n');
                }

            }, {
                "extend": "excelHtml5",
                "text": "<i class='fas fa-file-excel'></i> Excel",
                "titleAttr": "Esportar a Excel",
                "className": "btn btn-success",
                "customize": function (xlsx) {
                    var sheet = xlsx.xl.worksheets['sheet1.xml'];
                    $('row c[r^="H"]', sheet).each(function () {
                        $(this).remove(); // Elimina la tercera columna (C) de cada fila a partir de la tercera fila
                    });
                }
            }, {
                "extend": "pdfHtml5",
                "text": "<i class='fas fa-file-pdf'></i> PDF",
                "titleAttr": "Esportar a PDF",
                "className": "btn btn-danger",
                "customize": function (doc) {
                    doc.content[1].table.body.forEach(function (row) {
                        row.splice(7, 1); // Elimina la tercera columna (índice 2) de cada fila
                    });
                }
            }, {
                "extend": "csvHtml5",
                "text": "<i class='fas fa-file-csv'></i> CSV",
                "titleAttr": "Esportar a CSV",
                "className": "btn btn-info",
                customize: function (csv) {
                    var lines = csv.split('\n');
                    var newLines = [];
                    for (var i = 0; i < lines.length; i++) {
                        var cols = lines[i].split(',');
                        cols.splice(7, 1); // Eliminar la tercera columna (índice 2)
                        newLines.push(cols.join(','));
                    }
                    return newLines.join('\n');
                }
            }
        ],
        "resonsieve": "true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "desc"]]
    });


    if (document.querySelector("#foto")) {
        let foto = document.querySelector("#foto");
        foto.onchange = function (e) {
            let uploadFoto = document.querySelector("#foto").value;
            let fileimg = document.querySelector("#foto").files;
            let nav = window.URL || window.webkitURL;
            let contactAlert = document.querySelector('#form_alert');
            if (uploadFoto != '') {
                let type = fileimg[0].type;
                let name = fileimg[0].name;
                if (type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png') {
                    contactAlert.innerHTML = '<p class="errorArchivo">El archivo no es válido.</p>';
                    if (document.querySelector('#img')) {
                        document.querySelector('#img').remove();
                    }
                    document.querySelector('.delPhoto').classList.add("notBlock");
                    foto.value = "";
                    return false;
                } else {
                    contactAlert.innerHTML = '';
                    if (document.querySelector('#img')) {
                        document.querySelector('#img').remove();
                    }
                    document.querySelector('.delPhoto').classList.remove("notBlock");
                    let objeto_url = nav.createObjectURL(this.files[0]);
                    document.querySelector('.prevPhoto div').innerHTML = "<img id='img' src=" + objeto_url + ">";
                }
            } else {
                alert("No seleccionó una foto");
                if (document.querySelector('#img')) {
                    document.querySelector('#img').remove();
                }
            }
        }
    }

    if (document.querySelector(".delPhoto")) {
        let delPhoto = document.querySelector(".delPhoto");
        delPhoto.onclick = function (e) {
            document.querySelector("#foto_remove").value = 1;
            removePhoto();
        }
    }

    //NUEVA ALIMENTACION
    var formProducto = document.querySelector("#formProducto");
    formProducto.onsubmit = function (e) {
        e.preventDefault();

        var intIdProducto = document.querySelector('#pro_id').value;
        var strNombre = document.querySelector('#txtNombre').value;
        var strDescripcion = document.querySelector('#txtDescripcion').value;
        var strCategoria = document.querySelector('#txtCategoria').value;
        var intPrecio = document.querySelector('#txtPrecio').value;
        var strImagen = document.querySelector('#txtImagen').value;
        var strEstado = document.querySelector('#listEstado').value;

        if (strNombre == '' || strDescripcion == '' || strCategoria == '' || intPrecio == '' || strImagen == '' || strEstado == '') {
            swal("Atención", "Todos los campos son obligatorios.", "error");
            return false;
        }
        if (strTelefono.length < 8) {
            swal("Atención", "El numero de telefono debe de tener 8 numeros", "error");
            return false;
        }

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url + '/Producto/setProducto';
        var formData = new FormData(formProducto);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {

                var objData = JSON.parse(request.responseText);
                if (objData.status) {
                    if (rowTable == "") {
                        tableAlimentaciones.api().ajax.reload();
                    } else {
                        htmlEstado = intEstado == 2 ?
                            '<span class="badge badge-info">Activo</span>' :
                            '<span class="badge badge-danger">Inactivo</span>';

                        rowTable.cells[1].textContent = strNombre;
                        rowTable.cells[2].textContent = strDescripcion;
                        rowTable.cells[3].innerHTML = strCategoria;
                        rowTable.cells[5].innerHTML = intPrecio;
                        rowTable.cells[6].innerHTML = strImagen;
                        rowTable.cells[7].innerHTML = htmlEstado;
                        rowTable = "";
                    }

                    $('#modalFormProducto').modal("hide");
                    formProducto.reset();
                    swal("Producto", objData.msg, "success");
                    removePhoto();
                    tableProductos.api().ajax.reload();
                } else {
                    swal("Error", objData.msg, "error");
                }
            }

            return false;

        }
    }

}, false);

function openModal() {
    rowTable = "";
    document.getElementById("selectEstado").style.display = "none";
    document.querySelector('#pro_id').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Producto";
    document.querySelector("#formProducto").reset();

    document.getElementById("tile-footer").style.display = "block";
    document.getElementById("optionButtons").style.display = "none";

    $('#modalFormProducto').modal('show');
    removePhoto();
}

function fntViewInfo(alim_id) {
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Producto/getProducto/' + pro_id;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
                switch (objData.data.pro_estado) {
                    case "Pendiente":
                        objData.data.pro_estado = '<span class="badge badge-warning">Pendiente</span>';
                        break;
                    case "Activo":
                        objData.data.pro_estado = '<span class="badge badge-info">Activo</span>';
                        break;
                    case "Inactivo":
                        objData.data.pro_estado = '<span class="badge badge-danger">Inactivo</span>';
                        break;
                    case "Eliminado":
                        objData.data.pro_estado = '<span class="badge badge-dark">Eliminado</span>';
                        break;
                    default:
                        objData.data.pro_estado = objData.data.pro_estado;
                        break;
                }
                document.querySelector("#celId").innerHTML = objData.data.pro_id;
                document.querySelector("#celNombre").innerHTML = objData.data.pro_nombre;
                document.querySelector("#celDescripcion").innerHTML = objData.data.pro_descripcion;
                document.querySelector("#celCategoria").innerHTML = objData.data.pro_categoria;
                document.querySelector("#celPrecio").innerHTML = objData.data.pro_precio;
                document.querySelector("#celEstado").innerHTML = objData.data.alim_estado;
                document.querySelector("#img").innerHTML = '<img src="' + objData.data.url_imagen + '"></img>';
                $('#modalViewProducto').modal('show');
            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }
}

function fntCheckProducto(alim_id) {
    document.querySelector('#titleModal').innerHTML = "Revisar registro";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Revisar";

    document.getElementById("selectEstado").style.display = "none";
    document.getElementById("tile-footer").style.display = "none";

    document.querySelector("#optionButtons").innerHTML =
        `<br><button id="btnActionForm" class="btn btn-info" type="submit">
            <i class="fa fa-fw fa-lg fa-check-circle"></i>
            <span id="btnText">Aceptar</span>
        </button>&nbsp;&nbsp;&nbsp;
            <a class="btn btn-danger" href="#" data-dismiss="modal" onClick="fntDelProducto(${alim_id})" >
            <i class="fa fa-fw fa-lg fa-times-circle"></i>Rechazar
        </a>`;
    document.getElementById("optionButtons").style.display = "block";

    var pro_id = pro_id;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/Producto/getProducto/' + pro_id;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            var objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector("#pro_id").value = objData.data.pro_id;
                document.querySelector("#txtNombre").value = objData.data.pro_nombre;
                document.querySelector("#txtDescripcion").value = objData.data.pro_descripcion;
                document.querySelector("#txtCategoria").value = objData.data.pro_categoria;
                document.querySelector("#txtPrecio").value = objData.data.pro_precio;
                document.querySelector("#txtEstado").value = objData.data.pro_estado;
                document.querySelector('#foto_actual').value = objData.data.pro_imagen;
                document.querySelector("#foto_remove").value = 0;



                document.querySelector("#listEstado").value = 2;
                $('#listEstado').selectpicker('render');

                if (document.querySelector('#img')) {
                    document.querySelector('#img').src = objData.data.url_imagen;
                } else {
                    document.querySelector('.prevPhoto div').innerHTML = "<img id='img' src=" + objData.data.url_imagen + ">";
                }

                if (objData.data.pro_imagen == 'imageUnavailable.png') {
                    document.querySelector('.delPhoto').classList.add("notBlock");
                } else {
                    document.querySelector('.delPhoto').classList.remove("notBlock");
                }
                $('#modalFormProducto').modal('show');

            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }
}

function fntEditProducto(pro_id) {

    document.querySelector('#titleModal').innerHTML = "Actualizar Producto";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar";
    document.getElementById("selectEstado").style.display = "block";
    document.getElementById("tile-footer").style.display = "block";
    document.getElementById("optionButtons").style.display = "none";

    var pro_id = pro_id;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/Producto/getProducto/' + pro_id;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            var objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector("#pro_id").value = objData.data.pro_id;
                document.querySelector("#txtNombre").value = objData.data.pro_nombre;
                document.querySelector("#txtDescripcion").value = objData.data.pro_descripcion;
                document.querySelector("#txtCategoria").value = objData.data.pro_categoria;
                document.querySelector("#txtPrecio").value = objData.data.pro_precio;
                document.querySelector("#txtEstado").value = objData.data.pro_estado;
                document.querySelector('#foto_actual').value = objData.data.pro_imagen;
                document.querySelector("#foto_remove").value = 0;

                if (objData.data.pro_estado == 2) {
                    document.querySelector("#listEstado").value = 2;
                } else {
                    document.querySelector("#listEstado").value = 3;
                }
                $('#listEstado').selectpicker('render');

                if (document.querySelector('#img')) {
                    document.querySelector('#img').src = objData.data.url_imagen;
                } else {
                    document.querySelector('.prevPhoto div').innerHTML = "<img id='img' src=" + objData.data.url_imagen + ">";
                }

                if (objData.data.alim_imagen == 'imageUnavailable.png') {
                    document.querySelector('.delPhoto').classList.add("notBlock");
                } else {
                    document.querySelector('.delPhoto').classList.remove("notBlock");
                }

                $('#modalFormProducto').modal('show');

            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }
}

function fntDisProducto(alim_id) {
    swal({
        title: "Eliminar Producto",
        text: `¿Realmente quiere eliminar el registro No. ${alim_id}?`,
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {

        if (isConfirm) {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Producto/disProducto';
            let strData = "pro_id=" + alim_id;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Eliminado", objData.msg, "success");
                        tableProductos.api().ajax.reload();
                    } else {
                        swal("Atención!", objData.msg, "error");
                    }
                }
            }
        }

    });

}

function fntDelProducto(alim_id) {
    swal({
        title: "Rechazar registro",
        text: `¿Está seguro de que quiere eliminar el registro No. ${alim_id}?\nEsta acción es permanente.`,
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, rechazar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {

        if (isConfirm) {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Producto/delProducto';
            let strData = "pro_id=" + pro_id;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Eliminado", objData.msg, "success");
                        tableProductos.api().ajax.reload();
                    } else {
                        swal("Atención!", objData.msg, "error");
                    }
                }
            }
        }

    });

}

function removePhoto() {
    document.querySelector('#foto').value = "";
    document.querySelector('.delPhoto').classList.add("notBlock");
    if (document.querySelector('#img')) {
        document.querySelector('#img').remove();
    }
}