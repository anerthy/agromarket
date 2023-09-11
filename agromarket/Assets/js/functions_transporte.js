var tableTransportes;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function () {


    tableTransportes = $('#tableTransportes').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": " " + base_url + "/Transporte/getTransportes",
            "dataSrc": ""
        },
        "columns": [
            { "data": "trans_id" },
            { "data": "trans_nombre" },
            { "data": "trans_descripcion" },
            { "data": "trans_clase" },
            { "data": "trans_tipo" },
            { "data": "trans_disponibilidad" },
            { "data": "trans_telefono" },
            { "data": "trans_estado" },
            { "data": "options" }
        ],
        'dom': 'lBfrtip',
        'buttons': [
            {
                "extend": "copyHtml5",
                "text": "<i class='far fa-copy'></i> Copiar",
                "titleAttr": "Copiar",
                "className": "btn btn-secondary",
                customize: function(data) {
                    var rows = data.split('\n');
                    var newRows = [];
                    for (var i = 0; i < rows.length; i++) {
                        var cols = rows[i].split('\t');
                        cols.splice(8, 1); // Eliminar la tercera columna (índice 2)
                        newRows.push(cols.join('\t'));
                    }
                    return newRows.join('\n');
                }
            
            }, {
                "extend": "excelHtml5",
                "text": "<i class='fas fa-file-excel'></i> Excel",
                "titleAttr": "Exportar a Excel",
                "className": "btn btn-success",
                "customize": function(xlsx) {
                    var sheet = xlsx.xl.worksheets['sheet1.xml'];
                    $('row c[r^="I"]', sheet).each(function () {
                        $(this).remove(); // Elimina la tercera columna (C) de cada fila a partir de la tercera fila
                    });
                }
            }, {
                "extend": "pdfHtml5",
                "text": "<i class='fas fa-file-pdf'></i> PDF",
                "titleAttr": "Exportar a PDF",
                "className": "btn btn-danger",
                "customize": function(doc) {
                    doc.content[1].table.body.forEach(function(row) {
                        row.splice(8, 1); // Elimina la tercera columna (índice 2) de cada fila
                    });
                }
            }, {
                "extend": "csvHtml5",
                "text": "<i class='fas fa-file-csv'></i> CSV",
                "titleAttr": "Exportar a CSV",
                "className": "btn btn-info",
                customize: function(csv) {
                    var lines = csv.split('\n');
                    var newLines = [];
                    for (var i = 0; i < lines.length; i++) {
                        var cols = lines[i].split(',');
                        cols.splice(8, 1); // Eliminar la tercera columna (índice 2)
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
                alert("No selecciono foto");
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

    //NUEVO REGISTRO
    var formTransporte = document.querySelector("#formTransporte");
    formTransporte.onsubmit = function (e) {
        e.preventDefault();

        var intIdTransporte = document.querySelector('#trans_id').value;
        var strNombre = document.querySelector('#txtNombre').value;
        var strDescripcion = document.querySelector('#txtDescripcion').value;
        var strClase = document.querySelector('#txtClase').value;
        var strTipo = document.querySelector('#txtTipo').value;
        var strDisponibilidad = document.querySelector('#txtDisponibilidad').value;
        var strTelefono = document.querySelector('#txtTelefono').value;
        var intEstado = document.querySelector('#listEstado').value;

        if (strNombre == '' || strDescripcion == '' || strClase == '' || strTipo == '' || strDisponibilidad == '' || strTelefono == '' || intEstado == '') {
            swal("Atención", "Todos los campos son obligatorios.", "error");
            return false;
        }
        if (strTelefono.length < 8) {
            swal("Atención", "El numero de telefono debe de tener 8 numeros", "error");
            return false;
        }

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url + '/Transporte/setTransporte';
        var formData = new FormData(formTransporte);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {

                var objData = JSON.parse(request.responseText);
                if (objData.status) {
                    if (rowTable == "") {
                        tableTransportes.api().ajax.reload();
                    } else {
                        htmlEstado = intEstado == 2 ?
                            '<span class="badge badge-info">Activo</span>' :
                            '<span class="badge badge-danger">Inactivo</span>';
                        rowTable.cells[1].textContent = strNombre;
                        rowTable.cells[2].textContent = strDescripcion;
                        rowTable.cells[3].innerHTML = strClase;
                        rowTable.cells[4].innerHTML = strTipo;
                        rowTable.cells[5].innerHTML = strDisponibilidad;
                        rowTable.cells[6].innerHTML = strTelefono;
                        rowTable.cells[7].innerHTML = htmlEstado;
                        rowTable = "";
                    }

                    $('#modalFormTransporte').modal("hide");
                    formTransporte.reset();
                    swal("Transporte", objData.msg, "success");
                    removePhoto();
                    tableTransportes.api().ajax.reload();
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
    document.querySelector('#trans_id').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo transporte";
    document.querySelector("#formTransporte").reset();
    document.getElementById("tile-footer").style.display = "block";
    document.getElementById("optionButtons").style.display = "none";
    $('#modalFormTransporte').modal('show');
    removePhoto();
}


function fntViewInfo(trans_id) {
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Transporte/getTransporte/' + trans_id;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
                switch (objData.data.trans_estado) {
                    case "1":
                        objData.data.trans_estado = '<span class="badge badge-warning">Pendiente</span>';
                        break;
                    case "2":
                        objData.data.trans_estado = '<span class="badge badge-info">Activo</span>';
                        break;
                    case "3":
                        objData.data.trans_estado = '<span class="badge badge-danger">Inactivo</span>';
                        break;
                    case "4":
                        objData.data.trans_estado = '<span class="badge badge-dark">Eliminado</span>';
                        break;
                    default:
                        objData.data.trans_estado = objData.data.trans_estado;
                        break;
                }
                document.querySelector("#celId").innerHTML = objData.data.trans_id;
                document.querySelector("#celNombre").innerHTML = objData.data.trans_nombre;
                document.querySelector("#celDescripcion").innerHTML = objData.data.trans_descripcion;
                document.querySelector("#celClase").innerHTML = objData.data.trans_clase;
                document.querySelector("#celTipo").innerHTML = objData.data.trans_tipo;
                document.querySelector("#celDisponibilidad").innerHTML = objData.data.trans_disponibilidad;
                document.querySelector("#celTelefono").innerHTML = objData.data.trans_telefono;
                document.querySelector("#celEstado").innerHTML = objData.data.trans_estado;
                document.querySelector("#imgTransporte").innerHTML = '<img src="' + objData.data.url_imagen + '"></img>';
                $('#modalViewTransporte').modal('show');
            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }
}

function fntCheckTransporte(trans_id) {
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
            <a class="btn btn-danger" href="#" data-dismiss="modal" onClick="fntDelTransporte(${trans_id})" >
            <i class="fa fa-fw fa-lg fa-times-circle"></i>Rechazar
        </a>`;
    document.getElementById("optionButtons").style.display = "block";

    var trans_id = trans_id;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/Transporte/getTransporte/' + trans_id;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            var objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector("#trans_id").value = objData.data.trans_id;
                document.querySelector("#txtNombre").value = objData.data.trans_nombre;
                document.querySelector("#txtDescripcion").value = objData.data.trans_descripcion;

                var optionClase = (objData.data.trans_clase == 'Publico') ?
                    optionClase = '<option value="Publico" selected class="notBlock">Publico</option>' :
                    optionClase = '<option value="Privado" selected class="notBlock">Privado</option>';

                var htmlClase = `${optionClase}
                            <option value="Publico">Publico</option>
                            <option value="Privado">Privado</option>`;
                document.querySelector("#txtClase").innerHTML = htmlClase;

                var optionTipo = (objData.data.trans_tipo == 'Terrestre') ?
                    optionTipo = '<option value="Terrestre" selected class="notBlock">Terrestre</option>' :
                    optionTipo = '<option value="Maritimo" selected class="notBlock">Maritimo</option>';

                var htmlTipo = `${optionTipo}
                            <option value="Terrestre">Terrestre</option>
                            <option value="Maritimo">Maritimo</option>`;
                document.querySelector("#txtTipo").innerHTML = htmlTipo;

                document.querySelector("#txtDisponibilidad").value = objData.data.trans_disponibilidad;
                document.querySelector("#txtTelefono").value = objData.data.trans_telefono;
                document.querySelector('#foto_actual').value = objData.data.trans_imagen;
                document.querySelector("#foto_remove").value = 0;

                document.querySelector("#listEstado").value = 2;
                $('#listEstado').selectpicker('render');

                if (document.querySelector('#img')) {
                    document.querySelector('#img').src = objData.data.url_imagen;
                } else {
                    document.querySelector('.prevPhoto div').innerHTML = "<img id='img' src=" + objData.data.url_imagen + ">";
                }
                if (objData.data.trans_imagen == 'imageUnavailable.png') {
                    document.querySelector('.delPhoto').classList.add("notBlock");
                } else {
                    document.querySelector('.delPhoto').classList.remove("notBlock");
                }
                $('#modalFormTransporte').modal('show');
            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }
}

function fntEditTransporte(trans_id) {
    document.querySelector('#titleModal').innerHTML = "Actualizar transporte";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar";
    document.getElementById("selectEstado").style.display = "block";
    document.getElementById("tile-footer").style.display = "block";
    document.getElementById("optionButtons").style.display = "none";

    var trans_id = trans_id;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/Transporte/getTransporte/' + trans_id;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            var objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector("#trans_id").value = objData.data.trans_id;
                document.querySelector("#txtNombre").value = objData.data.trans_nombre;
                document.querySelector("#txtDescripcion").value = objData.data.trans_descripcion;

                var optionClase = (objData.data.trans_clase == 'Publico') ?
                    optionClase = '<option value="Publico" selected class="notBlock">Publico</option>' :
                    optionClase = '<option value="Privado" selected class="notBlock">Privado</option>';

                var htmlClase = `${optionClase}
                            <option value="Publico">Publico</option>
                            <option value="Privado">Privado</option>`;
                document.querySelector("#txtClase").innerHTML = htmlClase;

                var optionTipo = (objData.data.trans_tipo == 'Terrestre') ?
                    optionTipo = '<option value="Terrestre" selected class="notBlock">Terrestre</option>' :
                    optionTipo = '<option value="Maritimo" selected class="notBlock">Maritimo</option>';

                var htmlTipo = `${optionTipo}
                            <option value="Terrestre">Terrestre</option>
                            <option value="Maritimo">Maritimo</option>`;
                document.querySelector("#txtTipo").innerHTML = htmlTipo;

                document.querySelector("#txtDisponibilidad").value = objData.data.trans_disponibilidad;
                document.querySelector("#txtTelefono").value = objData.data.trans_telefono;
                document.querySelector('#foto_actual').value = objData.data.trans_imagen;
                document.querySelector("#foto_remove").value = 0;

                if (objData.data.trans_estado == 2) {
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
                if (objData.data.trans_imagen == 'imageUnavailable.png') {
                    document.querySelector('.delPhoto').classList.add("notBlock");
                } else {
                    document.querySelector('.delPhoto').classList.remove("notBlock");
                }
                $('#modalFormTransporte').modal('show');
            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }
}

function fntDisTransporte(trans_id) {
    swal({
        title: "Eliminar transporte",
        text: `¿Realmente quiere eliminar el registro No. ${trans_id}?`,
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {

        if (isConfirm) {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Transporte/disTransporte';
            let strData = "trans_id=" + trans_id;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Eliminado", objData.msg, "success");
                        tableTransportes.api().ajax.reload();
                    } else {
                        swal("Atención!", objData.msg, "error");
                    }
                }
            }
        }

    });

}

function fntDelTransporte(trans_id) {
    swal({
        title: "Eliminar transporte",
        text: `¿Está seguro de que quiere eliminar el registro No. ${trans_id}?\nEsta acción es permanente.`,
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {

        if (isConfirm) {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Transporte/delTransporte';
            let strData = "trans_id=" + trans_id;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Eliminado", objData.msg, "success");
                        tableTransportes.api().ajax.reload();
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