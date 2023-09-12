
var tableTours;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function () {

    tableTours = $('#tableTours').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": " " + base_url + "/Tour/getTours",
            "dataSrc": ""
        },
        "columns": [
            { "data": "tour_id" },
            { "data": "tour_nombre" },
            { "data": "tour_descripcion" },
            { "data": "tour_hora_inicio" },
            { "data": "tour_telefono" },
            { "data": "tour_precio" },
            { "data": "tour_estado" },
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
                    $('row c[r^="H"]', sheet).each(function () {
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
    var formTour = document.querySelector("#formTour");
    formTour.onsubmit = function (e) {
        e.preventDefault();

        var intIdTour = document.querySelector('#tour_id').value;
        var strNombre = document.querySelector('#txtNombre').value;
        var strDescripcion = document.querySelector('#txtDescripcion').value;
        var strActividad = document.querySelector('#txtActividad').value;
        var strAlimentacion = document.querySelector('#txtAlimentacion').value;
        var strHospedaje = document.querySelector('#txtHospedaje').value;
        var strTransporte = document.querySelector('#txtTransporte').value;
        var strLugar = document.querySelector('#txtLugar').value;
        var strDisponibilidad = document.querySelector('#txtDisponibilidad').value;
        var strHoraInicio = document.querySelector('#txtHoraInicio').value;
        var strDuracion = document.querySelector('#txtDuracion').value;
        var strCupoMinimo = document.querySelector('#txtCupoMinimo').value;
        var strTelefono = document.querySelector('#txtTelefono').value;
        var intPrecio = document.querySelector('#txtPrecio').value;
        var intEstado = document.querySelector('#listEstado').value;

        if (strNombre == '' || strDescripcion == '' || strActividad == '' || strLugar == '' || strDisponibilidad == '' || strHoraInicio == '' || strDuracion == '' || strDuracion == '' || strCupoMinimo == '' || strTelefono == '' || intPrecio == '' || intEstado == '') {

            swal("Atención", "Todos los campos son obligatorios.", "error");
            return false;
        }
        if (strTelefono.length < 8) {
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
        var ajaxUrl = base_url + '/Tour/setTour';
        var formData = new FormData(formTour);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {

                var objData = JSON.parse(request.responseText);

                if (objData.status) {
                    if (rowTable == "") {
                        tableTours.api().ajax.reload();
                    } else {
                        htmlEstado = intEstado == 2 ?
                            '<span class="badge badge-info">Activo</span>' :
                            '<span class="badge badge-danger">Inactivo</span>';
                        rowTable.cells[1].textContent = strNombre;
                        rowTable.cells[2].textContent = strDescripcion;
                        rowTable.cells[3].innerHTML = strActividad;
                        rowTable.cells[4].innerHTML = strAlimentacion;
                        rowTable.cells[5].textContent = strHospedaje;
                        rowTable.cells[6].textContent = strTransporte;
                        rowTable.cells[7].textContent = strLugar;
                        rowTable.cells[8].innerHTML = strDisponibilidad;
                        rowTable.cells[9].innerHTML = strHoraInicio;
                        rowTable.cells[10].innerHTML = strDuracion;
                        rowTable.cells[11].innerHTML = strCupoMinimo;
                        rowTable.cells[12].innerHTML = strTelefono;
                        rowTable.cells[13].innerHTML = intPrecio;
                        rowTable.cells[14].innerHTML = htmlEstado;
                        rowTable = "";
                    }

                    $('#modalFormTour').modal("hide");
                    formTour.reset();
                    swal("Tours", objData.msg, "success");
                    removePhoto();
                    tableTours.api().ajax.reload();
                } else {
                    swal("Error", objData.msg, "error");
                }
            }
            return false;
        }
    }
}, false);

window.addEventListener('load', function () {

}, false);

function openModal() {
    rowTable = "";
    document.querySelector('#tour_id').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Tour";
    document.querySelector("#formTour").reset();
    document.getElementById("tile-footer").style.display = "block";
    document.getElementById("optionButtons").style.display = "none";
    $('#modalFormTour').modal('show');

    resetModalPagination() //reiniciar el modal
    removePhoto();
}

function fntViewInfo(tour_id) {
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Tour/getTour/' + tour_id;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
                switch (objData.data.tour_estado) {
                    case "1":
                        objData.data.tour_estado = '<span class="badge badge-warning">Pendiente</span>';
                        break;
                    case "2":
                        objData.data.tour_estado = '<span class="badge badge-info">Activo</span>';
                        break;
                    case "3":
                        objData.data.tour_estado = '<span class="badge badge-danger">Inactivo</span>';
                        break;
                    case "4":
                        objData.data.tour_estado = '<span class="badge badge-dark">Eliminado</span>';
                        break;
                    default:
                        objData.data.tour_estado = objData.data.tour_estado;
                        break;
                }
                document.querySelector("#celId").innerHTML              =   objData.data.tour_id;
                document.querySelector("#celNombre").innerHTML          =   objData.data.tour_nombre;
                document.querySelector("#celDescripcion").innerHTML     =   objData.data.tour_descripcion;
                document.querySelector("#celActividad").innerHTML       =   objData.data.tour_actividad;
                document.querySelector("#celAlimentacion").innerHTML    =   objData.data.tour_alimentacion;
                document.querySelector("#celHospedaje").innerHTML       =   objData.data.tour_hospedaje;
                document.querySelector("#celTransporte").innerHTML      =   objData.data.tour_transporte;
                document.querySelector("#celLugar").innerHTML           =   objData.data.tour_lugar;
                document.querySelector("#celDisponibilidad").innerHTML  =   objData.data.tour_disponibilidad;
                document.querySelector("#celHoraInicio").innerHTML      =   objData.data.tour_hora_inicio;
                document.querySelector("#celDuracion").innerHTML        =   objData.data.tour_duracion;
                document.querySelector("#celCupoMinimo").innerHTML      =   objData.data.tour_cupo_minimo;
                document.querySelector("#celTelefono").innerHTML        =   objData.data.tour_telefono;
                document.querySelector("#celPrecio").innerHTML          =   objData.data.tour_precio;
                document.querySelector("#celEstado").innerHTML          =   objData.data.tour_estado;
                document.querySelector("#imgTour").innerHTML            =   '<img src="' + objData.data.url_imagen + '"></img>';
                $('#modalViewTour').modal('show');
            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }
}

function fntCheckTour(tour_id) {
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
            <a class="btn btn-danger" href="#" data-dismiss="modal" onClick="fntDelTour(${tour_id})" >
            <i class="fa fa-fw fa-lg fa-times-circle"></i>Rechazar
        </a>`;
    document.getElementById("optionButtons").style.display = "block";

    var tour_id = tour_id;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/Tour/getTour/' + tour_id;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            var objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector("#tour_id").value            =   objData.data.tour_id;
                document.querySelector("#txtNombre").value          =   objData.data.tour_nombre;
                document.querySelector("#txtDescripcion").value     =   objData.data.tour_descripcion;
                document.querySelector("#txtActividad").value       =   objData.data.tour_actividad;
                document.querySelector("#txtAlimentacion").value    =   objData.data.tour_alimentacion;
                document.querySelector("#txtHospedaje").value       =   objData.data.tour_hospedaje;
                document.querySelector("#txtTransporte").value      =   objData.data.tour_transporte;
                document.querySelector("#txtLugar").value           =   objData.data.tour_lugar;
                document.querySelector("#txtDisponibilidad").value  =   objData.data.tour_disponibilidad;
                document.querySelector("#txtHoraInicio").value      =   objData.data.tour_hora_inicio;
                document.querySelector("#txtDuracion").value        =   objData.data.tour_duracion;
                document.querySelector("#txtCupoMinimo").value      =   objData.data.tour_cupo_minimo;
                document.querySelector("#txtTelefono").value        =   objData.data.tour_telefono;
                document.querySelector("#txtPrecio").value          =   objData.data.tour_precio;
                document.querySelector('#foto_actual').value        =   objData.data.tour_imagen;
                document.querySelector("#foto_remove").value        =   0;

                document.querySelector("#listEstado").value = 2;
                $('#listEstado').selectpicker('render');

                if (document.querySelector('#img')) {
                    document.querySelector('#img').src = objData.data.url_imagen;
                } else {
                    document.querySelector('.prevPhoto div').innerHTML = "<img id='img' src=" + objData.data.url_imagen + ">";
                }

                if (objData.data.tour_imagen == 'imageUnavailable.png') {
                    document.querySelector('.delPhoto').classList.add("notBlock");
                } else {
                    document.querySelector('.delPhoto').classList.remove("notBlock");
                }

                $('#modalFormTour').modal('show');
                resetModalPagination()
            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }
}

function fntEditTour(tour_id) {
    document.querySelector('#titleModal').innerHTML = "Actualizar registro";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar";
    document.getElementById("selectEstado").style.display = "block";
    document.getElementById("tile-footer").style.display = "block";
    document.getElementById("optionButtons").style.display = "none";

    var tour_id = tour_id;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/Tour/getTour/' + tour_id;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            var objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector("#tour_id").value            =   objData.data.tour_id;
                document.querySelector("#txtNombre").value          =   objData.data.tour_nombre;
                document.querySelector("#txtDescripcion").value     =   objData.data.tour_descripcion;
                document.querySelector("#txtActividad").value       =   objData.data.tour_actividad;
                document.querySelector("#txtAlimentacion").value    =   objData.data.tour_alimentacion;
                document.querySelector("#txtHospedaje").value       =   objData.data.tour_hospedaje;
                document.querySelector("#txtTransporte").value      =   objData.data.tour_transporte;
                document.querySelector("#txtLugar").value           =   objData.data.tour_lugar;
                document.querySelector("#txtDisponibilidad").value  =   objData.data.tour_disponibilidad;
                document.querySelector("#txtHoraInicio").value      =   objData.data.tour_hora_inicio;
                document.querySelector("#txtDuracion").value        =   objData.data.tour_duracion;
                document.querySelector("#txtCupoMinimo").value      =   objData.data.tour_cupo_minimo;
                document.querySelector("#txtTelefono").value        =   objData.data.tour_telefono;
                document.querySelector("#txtPrecio").value          =   objData.data.tour_precio;
                document.querySelector('#foto_actual').value        =   objData.data.tour_imagen;
                document.querySelector("#foto_remove").value        =   0;

                if (objData.data.tour_estado == 2) {
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

                if (objData.data.tour_imagen == 'imageUnavailable.png') {
                    document.querySelector('.delPhoto').classList.add("notBlock");
                } else {
                    document.querySelector('.delPhoto').classList.remove("notBlock");
                }

                $('#modalFormTour').modal('show');
                resetModalPagination()
            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }
}

function fntDisTour(tour_id) {
    swal({
        title: "Eliminar Tour",
        text: `¿Realmente quiere eliminar el registro No. ${tour_id}?`,
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {

        if (isConfirm) {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Tour/disTour/';
            let strData = "tour_id=" + tour_id;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);

                    if (objData.status) {
                        swal("Eliminado", objData.msg, "success");
                        tableTours.api().ajax.reload();

                    } else {
                        swal("Atención!", objData.msg, "error");
                    }
                }
            }
        }
    });
}

function fntDelTour(tour_id) {
    swal({
        title: "Rechazar Tour",
        text: `¿Está seguro de que quiere eliminar el registro No. ${tour_id}?\nEsta acción es permanente.`,
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {

        if (isConfirm) {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Tour/delTour/';
            let strData = "tour_id=" + tour_id;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);

                    if (objData.status) {
                        swal("Eliminado", objData.msg, "success");
                        tableTours.api().ajax.reload();

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

function CambiarPagina(p) {
    // mostrar primer pagina
    if (p.id == "1") {
        $("#pag1").show();
    } else {
        $("#pag1").hide();
    }
    // mostrar segunda pagina
    if (p.id == "2") {
        $("#pag2").show();
    } else {
        $("#pag2").hide();
    }
    // mostrar tercsiguienteer pagina
    if (p.id == "3") {
        $("#pag3").show();
    } else {
        $("#pag3").hide();
    }
}

function MostrarServicios() {
    //mostrar input de alimentacion
    if (document.getElementById('alim').checked) {
        $("#formAlim").show();
    } else {
        $("#formAlim").hide();
    }
    //mostrar input de hospedaje
    if (document.getElementById('hosp').checked) {
        $("#formHosp").show();
    } else {
        $("#formHosp").hide();
    }
    //mostrar input de transporte
    if (document.getElementById('trans').checked) {
        $("#formTrans").show();
    } else {
        $("#formTrans").hide();
    }
}

function verificarServicios() {
    verificarAlim();
    verificarHosp();
    verificarTrans();
}

function verificarAlim() {
    txt = document.getElementById("txtAlimentacion").value;
    if (!(txt.length == 0 || /^\s+$/.test(txt))) {
        $("#formAlim").show();
    }
}
function verificarHosp() {
    txt = document.getElementById("txtHospedaje").value;
    if (!(txt.length == 0 || /^\s+$/.test(txt))) {
        $("#formHosp").show();
    }
}
function verificarTrans() {
    txt = document.getElementById("txtTransporte").value;
    if (!(txt.length == 0 || /^\s+$/.test(txt))) {
        $("#formTrans").show();
    }
}

function resetModalPagination() {
    $("#pag1").show();
    $("#pag2").hide();
    $("#pag3").hide();
}
