function fntAfiliarse(id) {
    swal({
        title: "Afiliarse",
        text: `Usted esta apunto de volverse afiliado en nuestra plataforma`,
        type: "success",
        showCancelButton: true,
        confirmButtonText: "Si, afiliarme!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {

        if (isConfirm) {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Afiliado/Afiliarse';
            let strData = "alf_id=" + id;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        swal("Afiliado", objData.msg, "success");
                    } else {
                        swal("Atención!", objData.msg, "error");
                    }
                }
            }
        }
    });
}