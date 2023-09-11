
var tableContenido;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function () {

    tableContenido = $('#tableContenido').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": " " + base_url + "/Contenido/getContenidos",
            "dataSrc": ""
        },
        "columns": [
            { "data": "cont_id" },
            { "data": "cont_titulo" },
            { "data": "cont_contenido" },
            { "data": "cont_pagina" },
            { "data": "options" }
        ],
        'dom': 'lBfrtip',
        'buttons': [
            {
                "extend": "copyHtml5",
                "text": "<i class='far fa-copy'></i> Copiar",
                "titleAttr": "Copiar",
                "className": "btn btn-secondary"
            }, {
                "extend": "excelHtml5",
                "text": "<i class='fas fa-file-excel'></i> Excel",
                "titleAttr": "Esportar a Excel",
                "className": "btn btn-success"
            }, {
                "extend": "pdfHtml5",
                "text": "<i class='fas fa-file-pdf'></i> PDF",
                "titleAttr": "Esportar a PDF",
                "className": "btn btn-danger"
            }, {
                "extend": "csvHtml5",
                "text": "<i class='fas fa-file-csv'></i> CSV",
                "titleAttr": "Esportar a CSV",
                "className": "btn btn-info"
            }
        ],
        "resonsieve": "true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "desc"]]
    });

    //Nuevo Contenido
    var formContenido = document.querySelector("#formContenido");
    formContenido.onsubmit = function (e) {
        e.preventDefault();

        var intIdContenido = document.querySelector('#cont_id').value;
        var strTitulo = document.querySelector('#txtTitulo').value;
        var strContenido = document.querySelector('#txtContenido').value;

        if (strTitulo == '' || strContenido == '') {
            swal("Atención", "Todos los campos son obligatorios.", "error");
            return false;
        }
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url + '/Contenido/setContenido';
        var formData = new FormData(formContenido);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {

                var objData = JSON.parse(request.responseText);
                if (objData.status) {

                    if (rowTable == "") {
                        tableContenido.api().ajax.reload();
                    } else {
                        rowTable.cells[1].textContent = strTitulo;
                        rowTable.cells[2].textContent = strContenido;
                        rowTable = "";
                    }
                    $('#modalFormContenido').modal("hide");
                    formContenido.reset();
                    swal("Contenido", objData.msg, "success");
                    tableContenido.api().ajax.reload();
                } else {
                    swal("Error", objData.msg, "error");
                }
            }
            return false;
        }
    }
}, false);
$('#tableContenido').DataTable();

function openModal() {
    rowTable = "";
    document.querySelector('#cont_id').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Contenido";
    document.querySelector("#formContenido").reset();
    $('#modalFormContenido').modal('show');
}

function fntViewInfo(cont_id) {
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Contenido/getContenido/' + cont_id;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector("#celId").innerHTML = objData.data.cont_id;
                document.querySelector("#celTitulo").innerHTML = objData.data.cont_titulo;
                document.querySelector("#celContenido").innerHTML = objData.data.cont_contenido;
                document.querySelector("#celPagina").innerHTML = objData.data.cont_pagina;
                document.querySelector("#celPosicion").innerHTML = objData.data.cont_posicion;
                $('#modalViewContenido').modal('show');
            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }
}

function fntEditContenido(cont_id) {
    document.querySelector('#titleModal').innerHTML = "Actualizar Contenido";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar";

    var cont_id = cont_id;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/Contenido/getContenido/' + cont_id;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            var objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector("#cont_id").value = objData.data.cont_id;
                document.querySelector("#txtTitulo").value = objData.data.cont_titulo;
                document.querySelector("#txtContenido").value = objData.data.cont_contenido;
                document.querySelector('#txtPagina').value = objData.data.cont_pagina;
                document.querySelector('#txtPosicion').value = objData.data.cont_posicion;
                $('#modalFormContenido').modal('show');
            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }
}