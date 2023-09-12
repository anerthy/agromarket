
var tableComunidades;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function () {

    tableComunidades = $('#tableComunidades').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": " " + base_url + "/Comunidad/getComunidades",
            "dataSrc": ""
        },
        "columns": [
            { "data": "com_id" },
            { "data": "com_nombre" },
            { "data": "com_descripcion" },
            { "data": "com_provincia" },
            { "data": "com_canton" },
            { "data": "com_distrito" },
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
                        cols.splice(6, 1); // Eliminar la tercera columna (índice 2)
                        newRows.push(cols.join('\t'));
                    }
                    return newRows.join('\n');
                }
            
            }, {
                "extend": "excelHtml5",
                "text": "<i class='fas fa-file-excel'></i> Excel",
                "titleAttr": "Esportar a Excel",
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
                "titleAttr": "Esportar a PDF",
                "className": "btn btn-danger",
                "customize": function(doc) {
                    doc.content[1].table.body.forEach(function(row) {
                        row.splice(6, 1); // Elimina la tercera columna (índice 2) de cada fila
                    });
                }
            }, {
                "extend": "csvHtml5",
                "text": "<i class='fas fa-file-csv'></i> CSV",
                "titleAttr": "Esportar a CSV",
                "className": "btn btn-info",
                customize: function(csv) {
                    var lines = csv.split('\n');
                    var newLines = [];
                    for (var i = 0; i < lines.length; i++) {
                        var cols = lines[i].split(',');
                        cols.splice(6, 1); // Eliminar la tercera columna (índice 2)
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
    var formComunidad = document.querySelector("#formComunidad");
    formComunidad.onsubmit = function (e) {
        e.preventDefault();

        var intIdComunidad = document.querySelector('#com_id').value;
        var strNombre = document.querySelector('#txtNombre').value;
        var strDescripcion = document.querySelector('#txtDescripcion').value;
        var strProvincia = document.querySelector('#txtProvincia').value;
        var strCanton = document.querySelector('#txtCanton').value;
        var strDistrito = document.querySelector('#txtDistrito').value;
        if (strNombre == '' || strDescripcion == '' || strProvincia == '' || strCanton == '' || strDistrito == '') {
            swal("Atención", "Todos los campos son obligatorios.", "error");
            return false;
        }
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url + '/Comunidad/setComunidad';
        var formData = new FormData(formComunidad);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {

                var objData = JSON.parse(request.responseText);
                if (objData.status) {

                    if (rowTable == "") {
                        tableComunidades.api().ajax.reload();
                    } else {
                        rowTable.cells[1].textContent = strNombre;
                        rowTable.cells[2].textContent = strDescripcion;
                        rowTable.cells[3].textContent = strProvincia;
                        rowTable.cells[4].textContent = strCanton;
                        rowTable.cells[5].textContent = strDistrito;
                        rowTable = "";
                    }

                    $('#modalFormComunidad').modal("hide");
                    formComunidad.reset();
                    swal("Comunidades", objData.msg, "success");
                    removePhoto();
                    tableComunidades.api().ajax.reload();
                } else {
                    swal("Error", objData.msg, "error");
                }
            }
            return false;
        }
    }
}, false);
$('#tableComunidades').DataTable();

const guanacaste = ["Nicoya", "Santa Cruz", "Bagaces", "Cañas"];
const puntarenas = ["Manzanillo", "Lepanto", "Puntarenas"];

var provincia = document.getElementById("txtProvincia");
var canton = document.getElementById("txtCanton");
var distrito = document.getElementById("txtDistrito");

let optionCantones = `<option value="" selected>Escoga el canton</option>`;
let optionDistritos = `<option value="" selected>Escoga el distrito</option>`;

provincia.addEventListener("blur", function () {
    optionCantones = `<option value="" selected>Escoga el canton</option>`;
    switch (provincia.value) {
        case 'Guanacaste':
            optionCantones += guanacaste.reduce((acumulado, elemento) => {
                return acumulado += `<option value="${elemento}">${elemento}</option>`;
            }, "");
            break;
        case 'Puntarenas':
            optionCantones += puntarenas.reduce((acumulado, elemento) => {
                return acumulado += `<option value="${elemento}">${elemento}</option>`;
            }, "");
            break;
        default:
            optionCantones = optionCantones;
            break;
    }
    canton.innerHTML = optionCantones;
    distrito.innerHTML = `<option value="" selected>Escoga el distrito</option>`;
});

canton.addEventListener("blur", function () {
    switch (canton.value) {
        case 'Nicoya':
            optionDistritos = `<option value="San Antonio" >San Antonio</option><option value="Quebrada Onda" >Quebrada Onda</option>`;
            break;
        case 'Santa Cruz':
            optionDistritos = `<option value="Santa Cruz" >Santa Cruz</option><option value="Bolson" >Bolson</option>`;
            break;
        case 'Bagaces':
            optionDistritos = `<option value="Bagaces" >Bagaces</option>`;
            break;
        case 'Cañas':
            optionDistritos = `<option value="Bebedero" >Bebedero</option><option value="Porozal" >Porozal</option>`;
            break;
        case 'Puntarenas':
            optionDistritos = `<option value="Puntarenas" >Puntarenas</option>`;
            break;
        case 'Manzanillo':
            optionDistritos = `<option value="Manzanillo" >Manzanillo</option>`;
            break;
        case 'Lepanto':
            optionDistritos = `<option value="Lepanto" >Lepanto</option>`;
            break;
        default:
            optionDistritos = optionDistritos;
            break;
    }
    distrito.innerHTML = optionDistritos;
});


function openModal() {
    rowTable = "";
    document.querySelector('#com_id').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nueva Comunidad";
    document.querySelector("#formComunidad").reset();
    $('#modalFormComunidad').modal('show');
    removePhoto();
}

function fntViewInfo(com_id) {
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Comunidad/getComunidad/' + com_id;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector("#celId").innerHTML = objData.data.com_id;
                document.querySelector("#celNombre").innerHTML = objData.data.com_nombre;
                document.querySelector("#celDescripcion").innerHTML = objData.data.com_descripcion;
                document.querySelector("#celProvincia").innerHTML = objData.data.com_provincia;
                document.querySelector("#celCanton").innerHTML = objData.data.com_canton;
                document.querySelector("#celDistrito").innerHTML = objData.data.com_distrito;
                document.querySelector("#imgComunidad").innerHTML = '<img src="' + objData.data.url_imagen + '"></img>';
                $('#modalViewComunidad').modal('show');
            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }
}

function fntEditComunidad(com_id) {
    document.querySelector('#titleModal').innerHTML = "Actualizar Comunidad";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar";

    var com_id = com_id;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/Comunidad/getComunidad/' + com_id;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector("#com_id").value = objData.data.com_id;
                document.querySelector("#txtNombre").value = objData.data.com_nombre;
                document.querySelector("#txtDescripcion").value = objData.data.com_descripcion;
                document.querySelector("#txtProvincia").value = objData.data.com_provincia;
                document.querySelector('#foto_actual').value = objData.data.com_imagen;
                document.querySelector("#foto_remove").value = 0;

                var option_canton = `<option value="${objData.data.com_canton}" selected class="notBlock">${objData.data.com_canton}<option>`;
                var option_distrito = `<option value="${objData.data.com_distrito}" selected class="notBlock">${objData.data.com_distrito}<option>`;
                switch (objData.data.com_canton) {
                    case 'Nicoya':
                        option_canton += `<option value="Santa Cruz">Santa Cruz</option>
                                    <option value="Bagaces">Bagaces</option>
                                    <option value="Cañas">Cañas</option>`;

                        option_distrito += `<option value="San Antonio">San Antonio</option>
                                    <option value="Quebrada Honda">Quebrada Honda</option>`;
                        break;
                    case 'Santa Cruz':
                        option_canton += `<option value="Nicoya">Nicoya</option>
                                    <option value="Bagaces">Bagaces</option>
                                    <option value="Cañas">Cañas</option>`;

                        option_distrito += `<option value="San Cruz">San Cruz</option>
                                    <option value="Bolson">Bolson</option>`;
                        break;
                    case 'Bagaces':
                        option_canton += `<option value="Santa Cruz">Santa Cruz</option>
                                    <option value="Nicoya">Nicoya</option>
                                    <option value="Cañas">Cañas</option>`;

                        option_distrito += `<option value="Bagaces">Bagaces</option>`;
                        break;
                    case 'Cañas':
                        option_canton = `<option value="Santa Cruz">Santa Cruz</option>
                                    <option value="Bagaces">Bagaces</option>
                                    <option value="Nicoya">Nicoya</option>`;

                        option_distrito += `<option value="Bebedero">Bebedero</option>
                                    <option value="Porozal">Porozal</option>`;
                        break;
                    default:
                        break;
                }
                document.querySelector("#txtDistrito").innerHTML = option_distrito;
                document.querySelector("#txtCanton").innerHTML = option_canton;

                if (document.querySelector('#img')) {
                    document.querySelector('#img').src = objData.data.url_imagen;
                } else {
                    document.querySelector('.prevPhoto div').innerHTML = "<img id='img' src=" + objData.data.url_imagen + ">";
                }

                if (objData.data.com_imagen == 'portada_categoria.png') {
                    document.querySelector('.delPhoto').classList.add("notBlock");
                } else {
                    document.querySelector('.delPhoto').classList.remove("notBlock");
                }
                $('#modalFormComunidad').modal('show');
            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }
}

function fntDelComunidad(com_id) {
    swal({
        title: "Eliminar Comunidad",
        text: `¿Realmente quiere eliminar la comunidad N° ${com_id}?`,
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {

        if (isConfirm) {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Comunidad/delComunidad/';
            let strData = "com_id=" + com_id;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Eliminar!", objData.msg, "success");
                        tableComunidades.api().ajax.reload();

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