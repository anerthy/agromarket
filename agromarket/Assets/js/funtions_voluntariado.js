var tableVoluntarios;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");

document.addEventListener('DOMContentLoaded', function () {

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

        if (strNombre == '' || strPrimerApellido == '' || strSegundoApellido == '' || strCedula == '' || strCorreo == '' || strTelefono == '' || strFechaNacimiento == '' || strGenero == '' || strLugarResidencia == '') {
            // swal("Atención", "Todos los campos son obligatorios.", "error");
            
            Swal.fire({
                title: 'Atención',
                text: 'Todos los campos son obligatorios.',
                icon: 'warning',
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#F19757'
              })
            
            
            return false;
        }

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url + '/Voluntariado/addVoluntario';
        var formData = new FormData(formVoluntario);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {

                var objData = JSON.parse(request.responseText);
                if (objData.status) {

                    Swal.fire({
                        title: 'Datos enviados',
                        text: 'Los datos fueron enviados de manera exitosa.',
                        icon: 'success',
                        confirmButtonText: 'Aceptar',
                        confirmButtonColor: '#3085d6'
                      })

                    formVoluntario.reset();
                }
                else {
                    Swal.fire({
                        title: 'ERROR',
                        text: 'Estos datos ya fueron ingresados',
                        icon: 'error',
                        confirmButtonText: 'Aceptar',
                        confirmButtonColor: '#F27474'
                      })
                }
            }
            return false;
        }
    }
}, false);

function openModal() {
    rowTable = "";
    document.querySelector('#vol_id').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector("#formVoluntario").reset();
    $('#modalFormVoluntariado').modal('show');

}