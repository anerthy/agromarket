
var tableVoluntarios;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function () {

    tableVoluntarios = $('#tableVoluntarios').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": " " + base_url + "/Voluntario/getVoluntarios",
            "dataSrc": ""
        },
        "columns": [
            { "data": "vol_id" },
            { "data": "vol_cedula" },
            { "data": "vol_nombre" },
            { "data": "vol_apellidos" },
            { "data": "vol_edad" },
            { "data": "vol_lugar_residencia" },
            { "data": "vol_telefono" },
            { "data": "vol_estado" },
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
                "customize": function (xlsx) {
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
                "customize": function (doc) {
                    doc.content[1].table.body.forEach(function (row) {
                        row.splice(8, 1); // Elimina la tercera columna (índice 2) de cada fila
                    });
                }
            }, {
                "extend": "csvHtml5",
                "text": "<i class='fas fa-file-csv'></i> CSV",
                "titleAttr": "Exportar a CSV",
                "className": "btn btn-info",
                customize: function (csv) {
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

    //NUEVO 
    var formVoluntario = document.querySelector("#formVoluntario");
    formVoluntario.onsubmit = function (e) {
        e.preventDefault();

        var intIdVoluntario = document.querySelector('#vol_id').value;
        var strNombre = document.querySelector('#txtNombre').value;
        var strPrimerApellido = document.querySelector('#txtPrimerApellido').value;
        var strSegundoApellido = document.querySelector('#txtSegundoApellido').value;
        var strCedula = document.querySelector('#txtCedula').value;
        var strCorreo = document.querySelector('#txtCorreo').value;
        var strTelefono = document.querySelector('#txtTelefono').value;
        var strFechaNacimiento = document.querySelector('#txtFechaNacimiento').value;
        var strGenero = document.querySelector('#txtGenero').value;
        var strLugarResidencia = document.querySelector('#txtLugarResidencia').value;
        var intEstado = document.querySelector('#listEstado').value;

        if (strNombre == '' || strPrimerApellido == '' || strSegundoApellido == '' || strCedula == '' || strCorreo == '' || strTelefono == '' || strFechaNacimiento == '' || strGenero == '' || strLugarResidencia == '' || intEstado == '') {
            swal("Atención", "Todos los campos son obligatorios.", "error");
            return false;
        }
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url + '/Voluntario/setVoluntario';
        var formData = new FormData(formVoluntario);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {

                var objData = JSON.parse(request.responseText);
                if (objData.status) {
                    if (rowTable == "") {
                        tableVoluntarios.api().ajax.reload();
                    } else {
                        htmlEstado = intEstado == 2 ?
                            '<span class="badge badge-info">Activo</span>' :
                            '<span class="badge badge-danger">Inactivo</span>';
                        rowTable.cells[1].textContent = strNombre;
                        rowTable.cells[2].textContent = strPrimerApellido;
                        rowTable.cells[3].textContent = strSegundoApellido;
                        rowTable.cells[4].textContent = strCedula;
                        rowTable.cells[5].textContent = strCorreo;
                        rowTable.cells[6].textContent = strTelefono;
                        rowTable.cells[7].textContent = strFechaNacimiento;
                        rowTable.cells[8].textContent = strGenero;
                        rowTable.cells[9].textContent = strLugarResidencia;
                        rowTable.cells[10].innerHTML = htmlEstado;
                        rowTable = "";
                    }
                    $('#modalFormVoluntario').modal("hide");
                    formVoluntario.reset();
                    swal("Voluntarios", objData.msg, "success");
                    tableVoluntarios.api().ajax.reload();
                } else {
                    swal("Error", objData.msg, "error");
                }
            }
            return false;
        }
    }
}, false);
$('#tableVoluntarios').DataTable();

function openModal() {
    rowTable = "";
    document.querySelector('#vol_id').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Voluntario";
    document.querySelector("#formVoluntario").reset();
    $('#modalFormVoluntario').modal('show');
}

function fntViewInfo(vol_id) {
    document.getElementById("optionButtons").style.display = "none";
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Voluntario/getVoluntario/' + vol_id;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
                switch (objData.data.vol_estado) {
                    case "1":
                        objData.data.vol_estado = '<span class="badge badge-warning">Pendiente</span>';
                        break;
                    case "2":
                        objData.data.vol_estado = '<span class="badge badge-info">Activo</span>';
                        break;
                    case "3":
                        objData.data.vol_estado = '<span class="badge badge-danger">Inactivo</span>';
                        break;
                    case "4":
                        objData.data.vol_estado = '<span class="badge badge-dark">Eliminado</span>';
                        break;
                    default:
                        objData.data.vol_estado = objData.data.vol_estado;
                        break;
                }
                document.querySelector("#celId").innerHTML = objData.data.vol_id;
                document.querySelector("#celNombre").innerHTML = objData.data.vol_nombre;
                document.querySelector("#celPrimerApellido").innerHTML = objData.data.vol_primer_apellido;
                document.querySelector("#celSegundoApellido").innerHTML = objData.data.vol_segundo_apellido;
                document.querySelector("#celCedula").innerHTML = objData.data.vol_cedula;
                document.querySelector("#celCorreo").innerHTML = objData.data.vol_correo;
                document.querySelector("#celTelefono").innerHTML = objData.data.vol_telefono;
                document.querySelector("#celFechaNacimiento").innerHTML = objData.data.vol_fecha_nacimiento;
                document.querySelector("#celGenero").innerHTML = objData.data.vol_genero;
                document.querySelector("#celLugarResidencia").innerHTML = objData.data.vol_lugar_residencia;
                document.querySelector("#celEstado").innerHTML = objData.data.vol_estado;
                $('#modalViewVoluntario').modal('show');
            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }
}

function fntCheckVoluntario(vol_id) {
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Voluntario/getVoluntario/' + vol_id;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
                switch (objData.data.vol_estado) {
                    case "1":
                        objData.data.vol_estado = '<span class="badge badge-warning">Pendiente</span>';
                        break;
                    case "2":
                        objData.data.vol_estado = '<span class="badge badge-info">Activo</span>';
                        break;
                    case "3":
                        objData.data.vol_estado = '<span class="badge badge-danger">Inactivo</span>';
                        break;
                    case "4":
                        objData.data.vol_estado = '<span class="badge badge-dark">Eliminado</span>';
                        break;
                    default:
                        objData.data.vol_estado = objData.data.vol_estado;
                        break;
                }
                document.querySelector("#celId").innerHTML = objData.data.vol_id;
                document.querySelector("#celNombre").innerHTML = objData.data.vol_nombre;
                document.querySelector("#celPrimerApellido").innerHTML = objData.data.vol_primer_apellido;
                document.querySelector("#celSegundoApellido").innerHTML = objData.data.vol_segundo_apellido;
                document.querySelector("#celCedula").innerHTML = objData.data.vol_cedula;
                document.querySelector("#celCorreo").innerHTML = objData.data.vol_correo;
                document.querySelector("#celTelefono").innerHTML = objData.data.vol_telefono;
                document.querySelector("#celFechaNacimiento").innerHTML = objData.data.vol_fecha_nacimiento;
                document.querySelector("#celGenero").innerHTML = objData.data.vol_genero;
                document.querySelector("#celLugarResidencia").innerHTML = objData.data.vol_lugar_residencia;
                document.querySelector("#celEstado").innerHTML = objData.data.vol_estado;

                document.getElementById("closeModal").style.display = "none";

                document.querySelector("#optionButtons").innerHTML =
                    `<center><button class="btn btn-info" data-dismiss="modal" onClick="fntAcceptVoluntario(${vol_id})">
                        <i class="fa fa-fw fa-lg fa-check-circle"></i>
                        <span id="btnText">Aceptar</span>
                    </button>&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-danger" href="#" data-dismiss="modal" onClick="fntDelVoluntario(${vol_id})" >
                        <i class="fa fa-fw fa-lg fa-times-circle"></i>Rechazar
                    </a><br><br></center>`;
                document.getElementById("optionButtons").style.display = "block";

                $('#modalViewVoluntario').modal('show');
            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }
}

function fntEditVoluntario(vol_id) {
    document.querySelector('#titleModal').innerHTML = "Actualizar Voluntario";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar";
    document.getElementById("selectEstado").style.display = "block";

    var vol_id = vol_id;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/Voluntario/getVoluntario/' + vol_id;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            var objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector("#vol_id").value = objData.data.vol_id;
                document.querySelector("#txtNombre").value = objData.data.vol_nombre;
                document.querySelector("#txtPrimerApellido").value = objData.data.vol_primer_apellido;
                document.querySelector("#txtSegundoApellido").value = objData.data.vol_segundo_apellido;
                document.querySelector("#txtCedula").value = objData.data.vol_cedula;
                document.querySelector("#txtCorreo").value = objData.data.vol_correo;
                document.querySelector("#txtTelefono").value = objData.data.vol_telefono;
                document.querySelector("#txtFechaNacimiento").value = objData.data.vol_fecha_nacimiento;
                document.querySelector("#txtLugarResidencia").value = objData.data.vol_lugar_residencia;

                var optionSelect = (objData.data.vol_genero == 'Masculino') ?
                    optionSelect = '<option value="Masculino" selected class="notBlock">Masculino</option>' :
                    optionSelect = '<option value="Femenino" selected class="notBlock">Femenino</option>';

                var htmlSelect = `${optionSelect}
                                  <option value="Masculino">Masculino</option>
                                  <option value="Femenino">Femenino</option>`;
                document.querySelector("#txtGenero").innerHTML = htmlSelect;

                if (objData.data.vol_estado == 2) {
                    document.querySelector("#listEstado").value = 2;
                } else {
                    document.querySelector("#listEstado").value = 3;
                }
                $('#listEstado').selectpicker('render');

                $('#modalFormVoluntario').modal('show');
            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }

}

function fntAcceptVoluntario(vol_id) {
    swal({
        title: "Aceptar Voluntario",
        text: `¿Está seguro de que quiere aceptar el registro No. ${vol_id}?`,
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, aceptar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {
        if (isConfirm) {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Voluntario/acceptVoluntario/';
            let strData = "vol_id=" + vol_id;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);

                    if (objData.status) {
                        swal("Aceptado", objData.msg, "success");
                        tableVoluntarios.api().ajax.reload();

                    } else {
                        swal("Atención!", objData.msg, "error");
                    }
                }
            }
        }
    });
}

function fntDisVoluntario(vol_id) {
    swal({
        title: "Eliminar Voluntario",
        text: `¿Está seguro de que quiere eliminar el registro No. ${vol_id}?`,
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {
        if (isConfirm) {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Voluntario/disVoluntario/';
            let strData = "vol_id=" + vol_id;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);

                    if (objData.status) {
                        swal("Eliminado", objData.msg, "success");
                        tableVoluntarios.api().ajax.reload();

                    } else {
                        swal("Atención!", objData.msg, "error");
                    }
                }
            }
        }
    });
}

function fntDelVoluntario(vol_id) {
    swal({
        title: "Rechazar Voluntario",
        text: `¿Está seguro de que quiere rechazar el registro No. ${vol_id}?\n¡Esta acción es permanente!`,
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, rechazar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {
        if (isConfirm) {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Voluntario/delVoluntario/';
            let strData = "vol_id=" + vol_id;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);

                    if (objData.status) {
                        swal("Eliminado", objData.msg, "success");
                        tableVoluntarios.api().ajax.reload();

                    } else {
                        swal("Atención!", objData.msg, "error");
                    }
                }
            }
        }
    });
}