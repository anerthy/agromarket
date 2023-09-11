
var tableHospedajes;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function () {


    tableHospedajes = $('#tableHospedajes').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": " " + base_url + "/Hospedaje/getHospedajes",
            "dataSrc": ""
        },
        "columns": [
            { "data": "hosp_id" },
            { "data": "hosp_nombre" },
            { "data": "hosp_descripcion" },
            { "data": "hosp_tipo" },
            { "data": "hosp_direccion" },
            { "data": "hosp_telefono" },
            { "data": "hosp_precio" },
            { "data": "hosp_estado" },
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


    var formHospedaje = document.querySelector("#formHospedaje");
    formHospedaje.onsubmit = function (e) {
        e.preventDefault();

        var intIdHospedaje = document.querySelector('#hosp_id').value;
        var strNombre = document.querySelector('#txtNombre').value;
        var strDescripcion = document.querySelector('#txtDescripcion').value;
        var strTipo = document.querySelector('#txtTipo').value;
        var strDireccion = document.querySelector('#txtDireccion').value;
        var strTelefono = document.querySelector('#txtTelefono').value;
        var intPrecio = document.querySelector('#txtPrecio').value;
        var intEstado = document.querySelector('#listEstado').value;

        if (strNombre == '' || strDescripcion == '' || strTipo == '' || strDireccion == '' || strTelefono == '' || intPrecio == '' || intEstado == '') {
            swal("Atención", "Todos los campos son obligatorios.", "error");
            return false;
        }
        if (strTelefono.length < 8) {
            swal("Atención", "El numero de telefono debe de tener 8 numeros", "error");
            return false;
        }

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url + '/Hospedaje/setHospedaje';
        var formData = new FormData(formHospedaje);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {

                var objData = JSON.parse(request.responseText);
                if (objData.status) {
                    if (rowTable == "") {
                        tableHospedajes.api().ajax.reload();
                    } else {
                        htmlStatus = intEstado == 2 ?
                            '<span class="badge badge-info">Activo</span>' :
                            '<span class="badge badge-danger">Inactivo</span>';
                        rowTable.cells[1].textContent = strNombre;
                        rowTable.cells[2].textContent = strDescripcion;
                        rowTable.cells[3].innerHTML = strTipo;
                        rowTable.cells[4].innerHTML = strDireccion;
                        rowTable.cells[5].innerHTML = strTelefono;
                        rowTable.cells[6].innerHTML = intPrecio;
                        rowTable.cells[7].innerHTML = htmlStatus;
                        rowTable = "";
                    }

                    $('#modalFormHospedaje').modal("hide");
                    formHospedaje.reset();
                    swal("Hospedaje", objData.msg, "success");
                    removePhoto();
                    tableHospedajes.api().ajax.reload();
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
    document.querySelector('#hosp_id').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo hospedaje";
    document.querySelector("#formHospedaje").reset();
    document.getElementById("tile-footer").style.display = "block";
    document.getElementById("optionButtons").style.display = "none";
    $('#modalFormHospedaje').modal('show');
    removePhoto();
}


function fntViewInfo(hosp_id) {
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Hospedaje/getHospedaje/' + hosp_id;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
                switch (objData.data.hosp_estado) {
                    case "1":
                        objData.data.hosp_estado = '<span class="badge badge-warning">Pendiente</span>';
                        break;
                    case "2":
                        objData.data.hosp_estado = '<span class="badge badge-info">Activo</span>';
                        break;
                    case "3":
                        objData.data.hosp_estado = '<span class="badge badge-danger">Inactivo</span>';
                        break;
                    case "4":
                        objData.data.hosp_estado = '<span class="badge badge-dark">Eliminado</span>';
                        break;
                    default:
                        objData.data.hosp_estado = objData.data.hosp_estado;
                        break;
                }
                document.querySelector("#celId").innerHTML = objData.data.hosp_id;
                document.querySelector("#celNombre").innerHTML = objData.data.hosp_nombre;
                document.querySelector("#celDescripcion").innerHTML = objData.data.hosp_descripcion;
                document.querySelector("#celTipo").innerHTML = objData.data.hosp_tipo;
                document.querySelector("#celDireccion").innerHTML = objData.data.hosp_direccion;
                document.querySelector("#celTelefono").innerHTML = objData.data.hosp_telefono;
                document.querySelector("#celPrecio").innerHTML = objData.data.hosp_precio;
                document.querySelector("#celEstado").innerHTML = objData.data.hosp_estado;
                document.querySelector("#imgHospedaje").innerHTML = '<img src="' + objData.data.url_imagen + '"></img>';
                $('#modalViewHospedaje').modal('show');
            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }
}

function fntCheckHospedaje(hosp_id) {
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
            <a class="btn btn-danger" href="#" data-dismiss="modal" onClick="fntDelHospedaje(${hosp_id})" >
            <i class="fa fa-fw fa-lg fa-times-circle"></i>Rechazar
        </a>`;
    document.getElementById("optionButtons").style.display = "block";

    var hosp_id = hosp_id;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/Hospedaje/getHospedaje/' + hosp_id;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            var objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector("#hosp_id").value = objData.data.hosp_id;
                document.querySelector("#txtNombre").value = objData.data.hosp_nombre;
                document.querySelector("#txtDescripcion").value = objData.data.hosp_descripcion;

                if (objData.data.hosp_tipo == 'Camping') {
                    var option = '<option value="Camping" selected class="notBlock">Camping</option>';
                } else {
                    var option = '<option value="Cabina" selected class="notBlock">Cabina</option>';
                }
                var htmlTipo = `${option}
                                  <option value="Camping">Camping</option>
                                  <option value="Cabina">Cabina</option>`;
                document.querySelector("#txtTipo").innerHTML = htmlTipo;

                document.querySelector("#txtDireccion").value = objData.data.hosp_direccion;
                document.querySelector("#txtTelefono").value = objData.data.hosp_telefono;
                document.querySelector("#txtPrecio").value = objData.data.hosp_precio;
                document.querySelector('#foto_actual').value = objData.data.hosp_imagen;
                document.querySelector("#foto_remove").value = 0;

                document.querySelector("#listEstado").value = 2;
                $('#listEstado').selectpicker('render');

                if (document.querySelector('#img')) {
                    document.querySelector('#img').src = objData.data.url_imagen;
                } else {
                    document.querySelector('.prevPhoto div').innerHTML = "<img id='img' src=" + objData.data.url_imagen + ">";
                }

                if (objData.data.hosp_imagen == 'imageUnavailable.png') {
                    document.querySelector('.delPhoto').classList.add("notBlock");
                } else {
                    document.querySelector('.delPhoto').classList.remove("notBlock");
                }
                $('#modalFormHospedaje').modal('show');
            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }
}

function fntEditHospedaje(hosp_id) {

    document.querySelector('#titleModal').innerHTML = "Actualizar hospedaje";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar";
    document.getElementById("selectEstado").style.display = "block";
    document.getElementById("tile-footer").style.display = "block";
    document.getElementById("optionButtons").style.display = "none";

    var hosp_id = hosp_id;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/Hospedaje/getHospedaje/' + hosp_id;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            var objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector("#hosp_id").value = objData.data.hosp_id;
                document.querySelector("#txtNombre").value = objData.data.hosp_nombre;
                document.querySelector("#txtDescripcion").value = objData.data.hosp_descripcion;

                if (objData.data.hosp_tipo == 'Camping') {
                    var option = '<option value="Camping" selected class="notBlock">Camping</option>';
                } else {
                    var option = '<option value="Cabina" selected class="notBlock">Cabina</option>';
                }
                var htmlTipo = `${option}
                                  <option value="Camping">Camping</option>
                                  <option value="Cabina">Cabina</option>`;
                document.querySelector("#txtTipo").innerHTML = htmlTipo;

                document.querySelector("#txtDireccion").value = objData.data.hosp_direccion;
                document.querySelector("#txtTelefono").value = objData.data.hosp_telefono;
                document.querySelector("#txtPrecio").value = objData.data.hosp_precio;
                document.querySelector('#foto_actual').value = objData.data.hosp_imagen;
                document.querySelector("#foto_remove").value = 0;

                if (objData.data.hosp_estado == 2) {
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

                if (objData.data.hosp_imagen == 'imageUnavailable.png') {
                    document.querySelector('.delPhoto').classList.add("notBlock");
                } else {
                    document.querySelector('.delPhoto').classList.remove("notBlock");
                }
                $('#modalFormHospedaje').modal('show');
            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }

}

function fntDisHospedaje(hosp_id) {
    swal({
        title: "Eliminar Hospedaje",
        text: `¿Realmente quiere eliminar el registro No. ${hosp_id}?`,
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {

        if (isConfirm) {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Hospedaje/disHospedaje';
            let strData = "hosp_id=" + hosp_id;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Eliminado", objData.msg, "success");
                        tableHospedajes.api().ajax.reload();
                    } else {
                        swal("Atención!", objData.msg, "error");
                    }
                }
            }
        }
    });
}

function fntDelHospedaje(hosp_id) {
    swal({
        title: "Eliminar Hospedaje",
        text: `¿Está seguro de que quiere eliminar el registro No. ${hosp_id}?\nEsta acción es permanente.`,
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {

        if (isConfirm) {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Hospedaje/delHospedaje';
            let strData = "hosp_id=" + hosp_id;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Eliminado", objData.msg, "success");
                        tableHospedajes.api().ajax.reload();
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


