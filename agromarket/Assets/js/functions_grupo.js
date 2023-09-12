
var tableGrupos;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function () {


    tableGrupos = $('#tableGrupos').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": " " + base_url + "/Grupo/getGrupos",
            "dataSrc": ""
        },
        "columns": [
            { "data": "gpo_id" },
            { "data": "gpo_nombre" },
            { "data": "gpo_descripcion" },
            { "data": "gpo_correo" },
            { "data": "gpo_telefono" },
            { "data": "gpo_estado" },
            { "data": "com_nombre" },
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
                        cols.splice(7, 1); // Eliminar la tercera columna (índice 2)
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
                    $('row c[r^="G"]', sheet).each(function () {
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
                        row.splice(7, 1); // Elimina la tercera columna (índice 2) de cada fila
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
    var formGrupo = document.querySelector("#formGrupo");
    formGrupo.onsubmit = function (e) {
        e.preventDefault();

        var intIdGrupo = document.querySelector('#gpo_id').value;
        var strNombre = document.querySelector('#txtNombre').value;
        var strRepresentante = document.querySelector('#txtRepresentante').value;
        var strDescripcion = document.querySelector('#txtDescripcion').value;
        var strUbicacion = document.querySelector('#txtUbicacion').value;
        var strCorreo = document.querySelector('#txtCorreo').value;
        var intTelefono = document.querySelector('#txtTelefono').value;
        var intNumeroIntegrantes = document.querySelector('#txtNumeroIntegrantes').value;
        var intComunidad = document.querySelector('#listComunidad').value;
        var intEstado = document.querySelector('#listEstado').value;

        if (strNombre == '' || strDescripcion == '' || intEstado == '' || strCorreo == '' || intTelefono == '' || intNumeroIntegrantes == '' || strUbicacion == '' || strRepresentante == '' || intComunidad == '') {
            alert(intComunidad);
            swal("Atención", "Todos los campos son obligatorios.", "error");
            return false;
        }
        if (intTelefono.length < 8) {
            swal("Atención", "El numero de telefono debe de tener 8 numeros", "error");
            return false;
        }

        let elementsValid = document.getElementsByClassName("valid");
        for (let i = 0; i < elementsValid.length; i++) {
            if (elementsValid[i].classList.contains('is-invalid')) {
                swal("Atención", "Por favor verifique los campos en rojo.", "error");
                return false;
            }
        }

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url + '/Grupo/setGrupo';
        var formData = new FormData(formGrupo);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {

                var objData = JSON.parse(request.responseText);

                if (objData.status) {
                    if (rowTable == "") {
                        tableGrupos.api().ajax.reload();
                    } else {
                        htmlEstado = intEstado == 2 ?
                            '<span class="badge badge-info">Activo</span>' :
                            '<span class="badge badge-danger">Inactivo</span>';
                        rowTable.cells[1].textContent = strNombre;
                        rowTable.cells[7].textContent = strRepresentante;
                        rowTable.cells[2].textContent = strDescripcion;
                        rowTable.cells[6].textContent = strUbicacion;
                        rowTable.cells[3].innerHTML = strCorreo;
                        rowTable.cells[4].innerHTML = intTelefono;
                        rowTable.cells[5].innerHTML = intNumeroIntegrantes;
                        rowTable.cells[8].innerHTML = htmlEstado;
                        rowTable.cells[9].innerHTML = intComunidad;
                        rowTable = "";
                    }
                    $('#modalFormGrupo').modal("hide");
                    formGrupo.reset();
                    swal("Grupos", objData.msg, "success");
                    removePhoto();
                    tableGrupos.api().ajax.reload();
                } else {
                    swal("Error", objData.msg, "error");
                }
            }
            return false;
        }
    }
}, false);

window.addEventListener('load', function () {
    fntComunidadesGrupo();

}, false);

function fntComunidadesGrupo() {
    var ajaxUrl = base_url + '/Comunidad/getSelectComunidades';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            document.querySelector('#listComunidad').innerHTML = request.responseText;
            document.querySelector('#listComunidad').value = 1;
            $('#listComunidad').selectpicker('render');
        }
    }
}

function openModal() {
    rowTable = "";
    document.querySelector('#gpo_id').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Grupo";
    document.querySelector("#formGrupo").reset();
    $('#modalFormGrupo').modal('show');
    removePhoto();
}

function fntViewInfo(gpo_id) {
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Grupo/getGrupo/' + gpo_id;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
                var estado = (objData.data.gpo_estado == "2") ?
                    estado = '<span class="badge badge-info">Activo</span>' :
                    estado = '<span class="badge badge-danger">Inactivo</span>';

                document.querySelector("#celId").innerHTML = objData.data.gpo_id;
                document.querySelector("#celNombre").innerHTML = objData.data.gpo_nombre;
                document.querySelector("#celRepresentante").innerHTML = objData.data.gpo_representante;
                document.querySelector("#celDescripcion").innerHTML = objData.data.gpo_descripcion;
                document.querySelector("#celUbicacion").innerHTML = objData.data.gpo_ubicacion;
                document.querySelector("#celCorreo").innerHTML = objData.data.gpo_correo;
                document.querySelector("#celTelefono").innerHTML = objData.data.gpo_telefono;
                document.querySelector("#celNumeroIntegrantes").innerHTML = objData.data.gpo_numero_integrantes;
                document.querySelector("#celComunidad").innerHTML = objData.data.com_nombre;
                document.querySelector("#celEstado").innerHTML = estado;
                document.querySelector("#imgGrupo").innerHTML = '<img src="' + objData.data.url_logo + '"></img>';
                $('#modalViewGrupo').modal('show');
            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }
}

function fntEditGrupo(gpo_id) {
    document.querySelector('#titleModal').innerHTML = "Actualizar Grupo";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar";

    var gpo_id = gpo_id;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/Grupo/getGrupo/' + gpo_id;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            var objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector("#gpo_id").value = objData.data.gpo_id;
                document.querySelector("#txtNombre").value = objData.data.gpo_nombre;
                document.querySelector("#txtDescripcion").value = objData.data.gpo_descripcion;
                document.querySelector("#txtCorreo").value = objData.data.gpo_correo;
                document.querySelector("#txtTelefono").value = objData.data.gpo_telefono;
                document.querySelector("#txtNumeroIntegrantes").value = objData.data.gpo_numero_integrantes;
                document.querySelector("#txtUbicacion").value = objData.data.gpo_ubicacion;
                document.querySelector("#txtRepresentante").value = objData.data.gpo_representante;
                document.querySelector("#listComunidad").value = objData.data.gpo_comunidad;
                document.querySelector('#foto_actual').value = objData.data.gpo_logo;
                document.querySelector("#foto_remove").value = 0;
                $('#listComunidad').selectpicker('render')
                if (objData.data.gpo_estado == 2) {
                    document.querySelector("#listEstado").value = 2;
                } else {
                    document.querySelector("#listEstado").value = 3;
                }
                $('#listEstado').selectpicker('render');

                if (document.querySelector('#img')) {
                    document.querySelector('#img').src = objData.data.url_logo;
                } else {
                    document.querySelector('.prevPhoto div').innerHTML = "<img id='img' src=" + objData.data.url_logo + ">";
                }

                if (objData.data.logo == 'imageUnavailable.png') {
                    document.querySelector('.delPhoto').classList.add("notBlock");
                } else {
                    document.querySelector('.delPhoto').classList.remove("notBlock");
                }
                $('#modalFormGrupo').modal('show');
            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }
}

function fntDelGrupo(gpo_id) {
    swal({
        title: "Eliminar Grupo",
        text: `¿Realmente quiere eliminar el Grupo N° ${gpo_id}?`,
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {

        if (isConfirm) {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Grupo/delGrupo/';
            let strData = "gpo_id=" + gpo_id;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);

                    if (objData.status) {
                        swal("Eliminar!", objData.msg, "success");
                        tableGrupos.api().ajax.reload();

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