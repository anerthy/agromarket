let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function () {

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
                alert("No seleccionó una foto");
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
                    // window.location.href = base_url + '/productor';
                }
                return false;
            }
        }
    }

}, false);

function removePhoto() {
    document.querySelector('#foto').value = "";
    document.querySelector('.delPhoto').classList.add("notBlock");
    if (document.querySelector('#img')) {
        document.querySelector('#img').remove();
    }
}

function fntEditProductor() {
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/Productor/getProductor/';
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            var objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector("#pdt_id").value = objData.data.pdt_id;
                document.querySelector("#txtNombre").value = objData.data.pdt_nombre;
                document.querySelector("#txtUbicacion").value = objData.data.pdt_ubicacion;
                document.querySelector('#foto_actual').value = objData.data.pdt_imagen;
                document.querySelector("#foto_remove").value = 0;

                if (document.querySelector('#img')) {
                    document.querySelector('#img').src = objData.data.pdt_imagen;
                } else {
                    document.querySelector('.prevPhoto div').innerHTML = "<img id='img' src=" + objData.data.pdt_imagen + ">";
                }

                if (objData.data.pdt_imagen == 'imageUnavailable.png') {
                    document.querySelector('.delPhoto').classList.add("notBlock");
                } else {
                    document.querySelector('.delPhoto').classList.remove("notBlock");
                }
                $('#modalFormProdutor').modal('show');
            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }
}
