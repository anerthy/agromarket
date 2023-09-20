
var tableActividades;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");

document.addEventListener('DOMContentLoaded', function () {
    tableActividades = $('#tableActividades').dataTable({
        "processing": true,
        "serverSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": " " + base_url + "/Actividad/getActividades",
            "dataSrc": ""
        },
        "columns": [
            { "data": "act_id" },
            { "data": "act_nombre" },
            { "data": "act_descripcion" },
            { "data": "act_lugar" },
            { "data": "act_fecha" },
            { "data": "act_hora" },
            { "data": "act_estado" },
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
    var formActividad = document.querySelector("#formActividad");
formActividad.onsubmit = function (e) {
    e.preventDefault();

    var intIdActividad = document.querySelector('#act_id').value;
    var strNombre = document.querySelector('#txtNombre').value;
    var strDescripcion = document.querySelector('#txtDescripcion').value;
    var strLugar = document.querySelector('#txtLugar').value;
    var strFecha = document.querySelector('#txtFecha').value;
    var strHora = document.querySelector('#txtHora').value;
    var intEstado = document.querySelector('#listEstado').value;

    if (strNombre == '' || strDescripcion == '' || strLugar == '' || strFecha == '' || strHora == '' || intEstado == '') {
        swal("Atención", "Todos los campos son obligatorios.", "error");
        return false;
    }

    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/Actividad/setActividad';
    var formData = new FormData(formActividad);
    request.open("POST", ajaxUrl, true);
    request.send(formData);
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var objData = JSON.parse(request.responseText);
            if (objData.status) {
                if (rowTable == "") {
                    tableActividades.api().ajax.reload();
                } else {
                    var htmlEstado = intEstado == 2 ?
                        '<span class="badge badge-info">Activo</span>' :
                        '<span class="badge badge-danger">Inactivo</span>';

                    rowTable.cells[1].textContent = strNombre;
                    rowTable.cells[2].textContent = strDescripcion;
                    rowTable.cells[3].textContent = strLugar;
                    rowTable.cells[4].textContent = strFecha;
                    rowTable.cells[5].textContent = strHora;
                    rowTable.cells[6].innerHTML = htmlEstado;
                    rowTable = "";
                }

                $('#modalFormActividad').modal("hide");
                formActividad.reset();
                swal("Actividad", objData.msg, "success");
                tableActividades.api().ajax.reload();
            } else {
                swal("Error", objData.msg, "error");
            }
        }
        return false
    }
}

    
}, false);

function openModal() {
    rowTable = "";
    document.getElementById("selectEstado").style.display = "none";
    document.querySelector('#act_id').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nueva Actividad";
    document.querySelector("#formActividad").reset();

    document.getElementById("tile-footer").style.display = "block";
    document.getElementById("optionButtons").style.display = "none";

    $('#modalFormActividad').modal('show');
}


function fntViewInfo(act_id) {
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Actividad/getActividad/' + act_id; // Asegúrate de usar la URL y la ruta correctas
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
                switch (objData.data.act_estado) {
                    case "1":
                        objData.data.act_estado = '<span class="badge badge-warning">Pendiente</span>';
                        break;
                    case "2":
                        objData.data.act_estado = '<span class="badge badge-info">Activo</span>';
                        break;
                    case "3":
                        objData.data.act_estado = '<span class="badge badge-danger">Inactivo</span>';
                        break;
                    case "4":
                        objData.data.act_estado = '<span class="badge badge-dark">Eliminado</span>';
                        break;
                    default:
                        objData.data.act_estado = objData.data.act_estado;
                        break;
                }
                document.querySelector("#celId").innerHTML = objData.data.act_id;
                document.querySelector("#celNombre").innerHTML = objData.data.act_nombre;
                document.querySelector("#celDescripcion").innerHTML = objData.data.act_descripcion;
                document.querySelector("#celDireccion").innerHTML = objData.data.act_direccion;
                document.querySelector("#celHoraApertura").innerHTML = objData.data.act_hora_apertura;
                document.querySelector("#celHoraCierre").innerHTML = objData.data.act_hora_cierre;
                document.querySelector("#celTelefono").innerHTML = objData.data.act_telefono;
                document.querySelector("#celEstado").innerHTML = objData.data.act_estado;
                document.querySelector("#imgActividad").innerHTML = '<img src="' + objData.data.url_imagen + '"></img>';
                $('#modalViewActividad').modal('show');
            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }
}

function fntCheckActividad(act_id) {
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
        <a class="btn btn-danger" href="#" data-dismiss="modal" onClick="fntDelActividad(${act_id})">
            <i class="fa fa-fw fa-lg fa-times-circle"></i>Rechazar
        </a>`;
    document.getElementById("optionButtons").style.display = "block";

    var act_id = act_id;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/Actividad/getActividad/' + act_id; // Asegúrate de usar la URL y la ruta correctas
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector("#act_id").value = objData.data.act_id;
                document.querySelector("#txtNombre").value = objData.data.act_nombre;
                document.querySelector("#txtDescripcion").value = objData.data.act_descripcion;
                document.querySelector("#txtDireccion").value = objData.data.act_direccion;
                document.querySelector("#txtHoraApertura").value = objData.data.act_hora_apertura;
                document.querySelector("#txtHoraCierre").value = objData.data.act_hora_cierre;
                document.querySelector("#txtTelefono").value = objData.data.act_telefono;
                document.querySelector('#foto_actual').value = objData.data.act_imagen;
                document.querySelector("#foto_remove").value = 0;

                document.querySelector("#listEstado").value = 2;
                $('#listEstado').selectpicker('render');

                if (document.querySelector('#img')) {
                    document.querySelector('#img').src = objData.data.url_imagen;
                } else {
                    document.querySelector('.prevPhoto div').innerHTML = "<img id='img' src=" + objData.data.url_imagen + ">";
                }

                if (objData.data.act_imagen == 'imageUnavailable.png') {
                    document.querySelector('.delPhoto').classList.add("notBlock");
                } else {
                    document.querySelector('.delPhoto').classList.remove("notBlock");
                }
                $('#modalFormActividad').modal('show');
            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }
}


function fntEditActividad(act_id) {
    document.querySelector('#titleModal').innerHTML = "Actualizar Actividad";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar";
    document.getElementById("selectEstado").style.display = "block";
    document.getElementById("tile-footer").style.display = "block";
    document.getElementById("optionButtons").style.display = "none";

    var act_id = act_id;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/Actividad/getActividad/' + act_id; // Asegúrate de usar la URL y la ruta correctas
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector("#act_id").value = objData.data.act_id;
                document.querySelector("#txtNombre").value = objData.data.act_nombre;
                document.querySelector("#txtDescripcion").value = objData.data.act_descripcion;
                document.querySelector("#txtDireccion").value = objData.data.act_direccion;
                document.querySelector("#txtHoraApertura").value = objData.data.act_hora_apertura;
                document.querySelector("#txtHoraCierre").value = objData.data.act_hora_cierre;
                document.querySelector("#txtTelefono").value = objData.data.act_telefono;
                document.querySelector('#foto_actual').value = objData.data.act_imagen;
                document.querySelector("#foto_remove").value = 0;

                if (objData.data.act_estado == 2) {
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

                if (objData.data.act_imagen == 'imageUnavailable.png') {
                    document.querySelector('.delPhoto').classList.add("notBlock");
                } else {
                    document.querySelector('.delPhoto').classList.remove("notBlock");
                }

                $('#modalFormActividad').modal('show');
            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }
}


function fntDisActividad(act_id) {
    swal({
        title: "Eliminar Actividad",
        text: `¿Realmente quiere eliminar el registro No. ${act_id}?`,
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {

        if (isConfirm) {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Actividad/disActividad'; // Asegúrate de usar la URL y la ruta correctas
            let strData = "act_id=" + act_id;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Eliminado", objData.msg, "success");
                        tableActividades.api().ajax.reload(); // Asegúrate de usar el nombre correcto de la tabla de actividades
                    } else {
                        swal("Atención!", objData.msg, "error");
                    }
                }
            }
        }

    });

}


function fntDelActividad(act_id) {
    swal({
        title: "Rechazar registro",
        text: `¿Está seguro de que quiere eliminar el registro No. ${act_id}?\nEsta acción es permanente.`,
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, rechazar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {

        if (isConfirm) {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Actividad/delActividad'; // Asegúrate de usar la URL y la ruta correctas
            let strData = "act_id=" + act_id;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Eliminado", objData.msg, "success");
                        tableActividades.api().ajax.reload(); // Asegúrate de usar el nombre correcto de la tabla de actividades
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