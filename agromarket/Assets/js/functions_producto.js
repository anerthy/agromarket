
var tableAlimentaciones;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function () {


    tableAlimentaciones = $('#tableAlimentaciones').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": " " + base_url + "/Alimentacion/getAlimentaciones",
            "dataSrc": ""
        },
        "columns": [
            { "data": "alim_id" },
            { "data": "alim_nombre" },
            { "data": "alim_descripcion" },
            { "data": "alim_direccion" },
            { "data": "alim_horario" },
            { "data": "alim_telefono" },
            { "data": "alim_estado" },
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
    var formAlimentacion = document.querySelector("#formAlimentacion");
    formAlimentacion.onsubmit = function (e) {
        e.preventDefault();

        var intIdAlimentacion = document.querySelector('#alim_id').value;
        var strNombre = document.querySelector('#txtNombre').value;
        var strDescripcion = document.querySelector('#txtDescripcion').value;
        var strDireccion = document.querySelector('#txtDireccion').value;
        var strHoraApertura = document.querySelector('#txtHoraApertura').value;
        var strHoraCierre = document.querySelector('#txtHoraCierre').value;
        var strTelefono = document.querySelector('#txtTelefono').value;
        var intEstado = document.querySelector('#listEstado').value;

        if (strNombre == '' || strDescripcion == '' || strDireccion == '' || strHoraApertura == '' || strHoraCierre == '' || strTelefono == '' || intEstado == '') {
            swal("Atención", "Todos los campos son obligatorios.", "error");
            return false;
        }
        if (strTelefono.length < 8) {
            swal("Atención", "El numero de telefono debe de tener 8 numeros", "error");
            return false;
        }

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url + '/Alimentacion/setAlimentacion';
        var formData = new FormData(formAlimentacion);
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
                        rowTable.cells[3].innerHTML = strDireccion;
                        rowTable.cells[5].innerHTML = strHoraApertura;
                        rowTable.cells[6].innerHTML = strHoraCierre;
                        rowTable.cells[6].innerHTML = strTelefono;
                        rowTable.cells[7].innerHTML = htmlEstado;
                        rowTable = "";
                    }

                    $('#modalFormAlimentacion').modal("hide");
                    formAlimentacion.reset();
                    swal("Alimentación", objData.msg, "success");
                    removePhoto();
                    tableAlimentaciones.api().ajax.reload();
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
    document.querySelector('#alim_id').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nueva alimentación";
    document.querySelector("#formAlimentacion").reset();

    document.getElementById("tile-footer").style.display = "block";
    document.getElementById("optionButtons").style.display = "none";

    $('#modalFormAlimentacion').modal('show');
    removePhoto();
}

function fntViewInfo(alim_id) {
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Alimentacion/getAlimentacion/' + alim_id;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
                switch (objData.data.alim_estado) {
                    case "1":
                        objData.data.alim_estado = '<span class="badge badge-warning">Pendiente</span>';
                        break;
                    case "2":
                        objData.data.alim_estado = '<span class="badge badge-info">Activo</span>';
                        break;
                    case "3":
                        objData.data.alim_estado = '<span class="badge badge-danger">Inactivo</span>';
                        break;
                    case "4":
                        objData.data.alim_estado = '<span class="badge badge-dark">Eliminado</span>';
                        break;
                    default:
                        objData.data.alim_estado = objData.data.alim_estado;
                        break;
                }
                document.querySelector("#celId").innerHTML = objData.data.alim_id;
                document.querySelector("#celNombre").innerHTML = objData.data.alim_nombre;
                document.querySelector("#celDescripcion").innerHTML = objData.data.alim_descripcion;
                document.querySelector("#celDireccion").innerHTML = objData.data.alim_direccion;
                document.querySelector("#celHoraApertura").innerHTML = objData.data.alim_hora_apertura;
                document.querySelector("#celHoraCierre").innerHTML = objData.data.alim_hora_cierre;
                document.querySelector("#celTelefono").innerHTML = objData.data.alim_telefono;
                document.querySelector("#celEstado").innerHTML = objData.data.alim_estado;
                document.querySelector("#imgAlimentacion").innerHTML = '<img src="' + objData.data.url_imagen + '"></img>';
                $('#modalViewAlimentacion').modal('show');
            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }
}

function fntCheckAlimentacion(alim_id) {
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
            <a class="btn btn-danger" href="#" data-dismiss="modal" onClick="fntDelAlimentacion(${alim_id})" >
            <i class="fa fa-fw fa-lg fa-times-circle"></i>Rechazar
        </a>`;
    document.getElementById("optionButtons").style.display = "block";

    var alim_id = alim_id;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/Alimentacion/getAlimentacion/' + alim_id;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            var objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector("#alim_id").value = objData.data.alim_id;
                document.querySelector("#txtNombre").value = objData.data.alim_nombre;
                document.querySelector("#txtDescripcion").value = objData.data.alim_descripcion;
                document.querySelector("#txtDireccion").value = objData.data.alim_direccion;
                document.querySelector("#txtHoraApertura").value = objData.data.alim_hora_apertura;
                document.querySelector("#txtHoraCierre").value = objData.data.alim_hora_cierre;
                document.querySelector("#txtTelefono").value = objData.data.alim_telefono;
                document.querySelector('#foto_actual').value = objData.data.alim_imagen;
                document.querySelector("#foto_remove").value = 0;

                document.querySelector("#listEstado").value = 2;
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
                $('#modalFormAlimentacion').modal('show');

            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }
}

function fntEditAlimentacion(alim_id) {

    document.querySelector('#titleModal').innerHTML = "Actualizar Alimentación";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar";
    document.getElementById("selectEstado").style.display = "block";
    document.getElementById("tile-footer").style.display = "block";
    document.getElementById("optionButtons").style.display = "none";

    var alim_id = alim_id;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/Alimentacion/getAlimentacion/' + alim_id;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            var objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector("#alim_id").value = objData.data.alim_id;
                document.querySelector("#txtNombre").value = objData.data.alim_nombre;
                document.querySelector("#txtDescripcion").value = objData.data.alim_descripcion;
                document.querySelector("#txtDireccion").value = objData.data.alim_direccion;
                document.querySelector("#txtHoraApertura").value = objData.data.alim_hora_apertura;
                document.querySelector("#txtHoraCierre").value = objData.data.alim_hora_cierre;
                document.querySelector("#txtTelefono").value = objData.data.alim_telefono;
                document.querySelector('#foto_actual').value = objData.data.alim_imagen;
                document.querySelector("#foto_remove").value = 0;

                if (objData.data.alim_estado == 2) {
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

                $('#modalFormAlimentacion').modal('show');

            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }
}

function fntDisAlimentacion(alim_id) {
    swal({
        title: "Eliminar Alimentación",
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
            let ajaxUrl = base_url + '/Alimentacion/disAlimentacion';
            let strData = "alim_id=" + alim_id;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Eliminado", objData.msg, "success");
                        tableAlimentaciones.api().ajax.reload();
                    } else {
                        swal("Atención!", objData.msg, "error");
                    }
                }
            }
        }

    });

}

function fntDelAlimentacion(alim_id) {
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
            let ajaxUrl = base_url + '/Alimentacion/delAlimentacion';
            let strData = "alim_id=" + alim_id;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Eliminado", objData.msg, "success");
                        tableAlimentaciones.api().ajax.reload();
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