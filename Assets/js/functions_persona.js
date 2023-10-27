let tablePersonas;
let rowTable = "";
let divloading = document.querySelector("#divloading");
document.addEventListener('DOMContentLoaded', function () {

    tablePersonas = $('#tablePersonas').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": " " + base_url + "/persona/getAll",
            "dataSrc": ""
        },
        "columns": [
            { "data": "per_cedula" },
            { "data": "per_nombre" },
            { "data": "per_apellidos" },
            { "data": "per_direccion" },
            { "data": "per_telefono" },
            { "data": "per_estado" },
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
                        cols.splice(5, 1); // Eliminar la tercera columna (índice 2)
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
                    $('row c[r^="F"]', sheet).each(function () {
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
                        row.splice(5, 1); // Elimina la tercera columna (índice 2) de cada fila
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
                        cols.splice(5, 1); // Eliminar la tercera columna (índice 2)
                        newLines.push(cols.join(','));
                    }
                    return newLines.join('\n');
                }
            }
        ],
        "resonsieve": "true",
        "bDestroy": true,
        "iDisplayLength": 10, //aqui se pueden ver la cantidad de datos que se pueden mostrar en la tabla
        "order": [[0, "desc"]]
    });

    // if (document.querySelector("#formUsuario")) {


    //     let formUsuario = document.querySelector("#formUsuario");
    //     formUsuario.onsubmit = function (e) {
    //         e.preventDefault();
    //         var intId = document.querySelector('#per_cedula').value;
    //         let strEmail = document.querySelector('#txtEmail').value;
    //         let strNombre = document.querySelector('#txtNombre').value;
    //         let strContrasena = document.querySelector('#txtContrasena').value;
    //         let strEstado = document.querySelector('#listEstado').value;
    //         let intRol = document.querySelector('#listRol').value;
    //         let strCedula = document.querySelector('#txtCedula').value;

    //         if (strNombre == '' || strEmail == '' || intRol == '' || strCedula == '') {
    //             swal("Atención", "Todos los campos son obligatorios.", "error");
    //             return false;
    //         }

    //         //! REVISAR
    //         // let elementsValid = document.getElementsByClassName("valid");
    //         // for (let i = 0; i < elementsValid.length; i++) {
    //         //     if (elementsValid[i].classList.contains('is-invalid')) {
    //         //         swal("Atención", "Por favor verifique los campos en rojo.", "error");
    //         //         return false;
    //         //     }
    //         // }

    //         let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    //         let ajaxUrl = base_url + '/usuario/upsertUser';
    //         let formData = new FormData(formUsuario);
    //         request.open("POST", ajaxUrl, true);
    //         request.send(formData);
    //         request.onreadystatechange = function () {
    //             if (request.readyState == 4 && request.status == 200) {
    //                 let objData = JSON.parse(request.responseText);
    //                 if (objData.status) {
    //                     if (rowTable == "") {
    //                         tablePersonas.api().ajax.reload();
    //                     } else {
    //                         htmlEstado = strEstado == 'Activo' ?
    //                             '<span class="badge badge-info">Activo</span>' :
    //                             '<span class="badge badge-danger">Inactivo</span>';
    //                         rowTable.cells[1].textContent = strNombre;
    //                         rowTable.cells[2].textContent = strEmail;
    //                         rowTable.cells[3].textContent = document.querySelector("#listRol").selectedOptions[0].text;
    //                         rowTable.cells[4].textContent = strCedula;
    //                         rowTable.cells[5].innerHTML = htmlEstado;
    //                     }
    //                     $('#modalFormUsuario').modal("hide");
    //                     formUsuario.reset();
    //                     swal("Usuarios", objData.msg, "success");

    //                 } else {
    //                     swal("Error", objData.msg, "error");
    //                 }
    //             }
    //         }
    //     }
    // }
}, false);

window.addEventListener('load', function () {
    fntRolesUsuario();
}, false);

function fntRolesUsuario() {
    let ajaxUrl = base_url + '/rol/getList';
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            document.querySelector('#listRol').innerHTML = request.responseText;

            $('#listRol').selectpicker('render');
        }
    }

}

function fntViewUsuario(id) {
    let per_cedula = id;
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/persona/getByCedula/' + per_cedula;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);

            if (objData.status) {
                let estado = objData.data.per_estado == 'Activo' ?
                    '<span class="badge badge-info">Activo</span>' :
                    '<span class="badge badge-danger">Inactivo</span>';

                document.querySelector("#celEmail").innerHTML = objData.data.usr_email;
                document.querySelector("#celNombre").innerHTML = objData.data.usr_nombre;
                document.querySelector("#celRol").innerHTML = objData.data.rol_nombre;
                document.querySelector("#celCedula").innerHTML = objData.data.per_cedula;
                document.querySelector("#celEstado").innerHTML = estado;
                $('#modalViewUser').modal('show');
            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }
}

function openModal() {
    rowTable = "";
    document.querySelector('#per_cedula').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Usuario";
    document.querySelector("#formUsuario").reset();
    $('#modalFormUsuario').modal('show');
}