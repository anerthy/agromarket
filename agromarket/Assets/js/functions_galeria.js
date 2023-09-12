
var tableGalerias;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function () {

    tableGalerias = $('#tableGalerias').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": " " + base_url + "/Galeria/getGalerias",
            "dataSrc": ""
        },
        "columns": [
            { "data": "gal_id" },
            { "data": "gal_titulo" },
            { "data": "gal_descripcion" },
            { "data": "gal_pagina" },
            { "data": "gal_seccion" },
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
        "order": [[3, "asc"]]
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
    var formGaleria = document.querySelector("#formGaleria");
    formGaleria.onsubmit = function (e) {
        e.preventDefault();

        var intIdGaleria = document.querySelector('#gal_id').value;
        var strTitulo = document.querySelector('#txtTitulo').value;
        var strDescripcion = document.querySelector('#txtDescripcion').value;
        var strSeccion = document.querySelector('#txtSeccion').value;

        if (strTitulo == '' || strDescripcion == '' || strSeccion == '') {
            swal("Atención", "Todos los campos son obligatorios.", "error");
            return false;
        }
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url + '/Galeria/setGaleria';
        var formData = new FormData(formGaleria);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {

                var objData = JSON.parse(request.responseText);
                if (objData.status) {
                    if (rowTable == "") {
                        tableGalerias.api().ajax.reload();
                    } else {
                        rowTable.cells[1].textContent = strTitulo;
                        rowTable.cells[2].textContent = strDescripcion;
                        rowTable.cells[3].textContent = strSeccion;
                        rowTable = "";
                    }
                    $('#modalFormGaleria').modal("hide");
                    formGaleria.reset();
                    swal("Galeria", objData.msg, "success");
                    removePhoto();
                    tableGalerias.api().ajax.reload();
                } else {
                    swal("Error", objData.msg, "error");
                }
            }
            return false;
        }
    }
}, false);

$('#tableGalerias').DataTable();

function openModal() {
    rowTable = "";
    document.querySelector('#gal_id').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nueva Galeria";
    document.querySelector("#formGaleria").reset();
    $('#modalFormGaleria').modal('show');
    removePhoto();
}

function fntViewInfo(gal_id) {
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Galeria/getGaleria/' + gal_id;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector("#celId").innerHTML = objData.data.gal_id;
                document.querySelector("#celTitulo").innerHTML = objData.data.gal_titulo;
                document.querySelector("#celDescripcion").innerHTML = objData.data.gal_descripcion;
                document.querySelector("#celPagina").innerHTML = objData.data.gal_pagina;
                document.querySelector("#celSeccion").innerHTML = objData.data.gal_seccion;
                document.querySelector("#imgGaleria").innerHTML = '<img src="' + objData.data.url_imagen + '"></img>';
                $('#modalViewGaleria').modal('show');
            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }
}

function fntEditGaleria(gal_id) {
    document.querySelector('#titleModal').innerHTML = "Actualizar Galeria";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar";

    var gal_id = gal_id;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/Galeria/getGaleria/' + gal_id;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector("#gal_id").value = objData.data.gal_id;
                document.querySelector("#txtTitulo").value = objData.data.gal_titulo;
                document.querySelector("#txtDescripcion").value = objData.data.gal_descripcion;
                document.querySelector("#txtPagina").value = objData.data.gal_pagina;
                document.querySelector("#txtSeccion").value = objData.data.gal_seccion;
                document.querySelector('#foto_actual').value = objData.data.gal_url;
                document.querySelector("#foto_remove").value = 0;

                if (document.querySelector('#img')) {
                    document.querySelector('#img').src = objData.data.url_imagen;
                } else {
                    document.querySelector('.prevPhoto div').innerHTML = "<img id='img' src=" + objData.data.url_imagen + ">";
                }

                if (objData.data.gal_imagen == 'imageUnavailable.png') {
                    document.querySelector('.delPhoto').classList.add("notBlock");
                } else {
                    document.querySelector('.delPhoto').classList.remove("notBlock");
                }
                $('#modalFormGaleria').modal('show');
            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }
}

function removePhoto() {
    document.querySelector('#foto').value = "";
    document.querySelector('.delPhoto').classList.add("notBlock");
    if (document.querySelector('#img')) {
        document.querySelector('#img').remove();
    }
}