
let rowTable = ""; 
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function(){


    //Actualizar Perfil
    if(document.querySelector("#formProductor")){
        let formProductor = document.querySelector("#formProductor");
        formPerfil.onsubmit = function(e) {
            e.preventDefault();
            let strCedula = document.querySelector('#txtCedula').value;
            let strNombre = document.querySelector('#txtNombre').value;
            let strUbicacion = document.querySelector('#txtUbicacion').value;
          

            if(strCedula == '' || strNombre == '' || strUbicacion == '' )
            {
                swal("Atención", "Todos los campos son obligatorios." , "error");
                return false;
            }

           

            let elementsValid = document.getElementsByClassName("valid");
            for (let i = 0; i < elementsValid.length; i++) { 
                if(elementsValid[i].classList.contains('is-invalid')) { 
                    swal("Atención", "Por favor verifique los campos en rojo." , "error");
                    return false;
                } 
            } 
            divLoading.style.display = "flex";
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Productor/putProductor'; 
            let formData = new FormData(formProductor);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState != 4 ) return; 
                if(request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        $('#modalFormProductor').modal("hide");
                        swal({
                            title: "",
                            text: objData.msg,
                            type: "success",
                            confirmButtonText: "Aceptar",
                            closeOnConfirm: false,
                        }, function(isConfirm) {
                            if (isConfirm) {
                                location.reload();
                            }
                        });
                    }else{
                        swal("Error", objData.msg , "error");
                    }
                }
                divLoading.style.display = "none";
                return false;
            }
        }
    }
   
}, false);



function openModalProductor(){
    $('#modalFormProductor').modal('show');
}
