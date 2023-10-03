document.addEventListener('DOMContentLoaded', function () {

    var formRegister = document.querySelector("#formRegister");
    formRegister.onsubmit = function (e) {
        e.preventDefault();
        var strCedula = document.querySelector('#txtCedula').value;
        var strNombre = document.querySelector('#txtNombre').value;
        var strApellido1 = document.querySelector('#txtApellido1').value;
        var strApellido2 = document.querySelector('#txtApellido2').value;
        var strDireccion = document.querySelector('#txtDireccion').value;
        var strTelefono = document.querySelector('#txtTelefono').value;
        var strEmail = document.querySelector('#txtEmail').value;
        var strUsuario = document.querySelector('#txtUsuario').value;
        var strContrasena = document.querySelector('#txtContrasena').value;
        var strContrasenaConfirmar = document.querySelector('#txtContrasenaConfirmar').value;

        if (strCedula == '' || strNombre == '' || strApellido1 == '' || strApellido2 == '' || strDireccion == '' || strTelefono == '' || strEmail == '' || strUsuario == '' || strContrasena == '') {
            Swal.fire({
                title: 'Atención',
                text: 'Todos los campos son obligatorios.',
                icon: 'warning',
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#F19757'
            })
            return false;
        }

        if (strContrasena != strContrasenaConfirmar) {
            Swal.fire({
                title: 'Error',
                text: 'Las contraseñas deben coincidir',
                icon: 'warning',
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#F19757'
            })
            return false;
        }

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url + '/register/addPersonUser';
        var formData = new FormData(formRegister);
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

                    formRegister.reset();
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