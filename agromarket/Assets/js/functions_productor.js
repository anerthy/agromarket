document.addEventListener('DOMContentLoaded', function () {


    //Actualizar Perfil
    if (document.querySelector("#formProductor")) {
        let formProductor = document.querySelector("#formProductor");
        formProductor.onsubmit = function (e) {
            e.preventDefault();
            let strNombre = document.querySelector('#txtNombre').value;
            let strUbicacion = document.querySelector('#txtUbicacion').value;


            if (strNombre == '' || strUbicacion == '') {
                swal("Atención", "Todos los campos son obligatorios.", "error");
                return false;
            }



            let elementsValid = document.getElementsByClassName("valid");
            for (let i = 0; i < elementsValid.length; i++) {
                if (elementsValid[i].classList.contains('is-invalid')) {
                    swal("Atención", "Por favor verifique los campos en rojo.", "error");
                    return false;
                }
            }

            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Productor/volverseProductor';
            let formData = new FormData(formProductor);
            request.open("POST", ajaxUrl, true);
            request.send(formData);
            request.onreadystatechange = function () {
                if (request.readyState != 4) return;
                if (request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        console.log('si funca')
                       
                    } else {
                        console.log('no funca')
                        
                    }
                    window.location.href = base_url + '/productor';
                }
                return false;
            }
        }
    }

}, false);
