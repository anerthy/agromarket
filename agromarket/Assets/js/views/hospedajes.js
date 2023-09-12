const url = 'https://paraisoazul.org/Servicios/getHospedajes';

const contenedor = document.getElementById("cards-container");
const btnAnterior = document.getElementById("btn-anterior");
const btnSiguiente = document.getElementById("btn-siguiente");
const pageCounter = document.getElementById("num-page");

const htmlNombre = document.getElementById("hosp-nombre");
const htmlDescripcion = document.getElementById("hosp-descripcion");
const htmlDireccion = document.getElementById("hosp-direccion");
const htmlTipo = document.getElementById("hosp-tipo");
const htmlTelefono = document.getElementById("hosp-telefono");
const htmlWhatsApp = document.getElementById("wsa");
const htmlPrecio = document.getElementById("hosp-precio");
const htmlImagen = document.getElementById("hosp-imagen");

let numberPage = 1;
let service = `${url}/${numberPage}`;

async function request(url, funtion) {
    let response = await fetch(url);
    let json = await response.json();

    funtion(json);
};

function printCards(data) {
    let content = '';
    pageCounter.innerHTML = numberPage;

    if (data.length != 0) {
        btnSiguiente.style.display = 'block';
        data.map(e => {
            content += `
                        <section class="programs">
                            <div class="main">
                            <ul class="cards">
                                <li class="cards_item">
                                
                            <div class="card animate__animated  animate__backInDown">
                                <div class="card">
                                    <div class="card_image">
                                    <img id="imagen" src="${e.hosp_imagen}" alt="Imagen del hospedaje" class="card-img-top" alt="Imagen del hospedaje" style="width: 300px; height:300px;">
                                    </div>
                                    <div class="card_content">
                                    <h2 class="card_title">
                                        <center>
                                        <p class="Color-Title Tipografia-contenido-Hosp">${e.hosp_nombre}</p>
                                        </center>
                                    </h2>
                                    <button type="button" class="btn btn-primary Back-Button Tipografia-contenido-Hosp" data-toggle="modal" data-target="#modalHospedaje" onclick="getInfo(${e.hosp_id})">Ver más</button>
                                    </div>
                                </div>
                                </div>

                                </li>
                            </ul>
                            </div>
                        </section>
                        `;
        });
    } else {
        content = `
                <div style="margin: 0 auto;">
                    <p>Has llegado al final de la lista de servicios de hospedaje.</p>
                </div>
                `;
        btnSiguiente.style.display = 'none';
    }
    contenedor.innerHTML = content;
};

btnSiguiente.addEventListener("click", () => {
    numberPage++;
    service = `${url}/${numberPage}`;
    request(service, printCards);
});

btnAnterior.addEventListener("click", () => {
    if (numberPage > 1) {
        numberPage--;
        service = `${url}/${numberPage}`;
        request(service, printCards);
    }
});

function printModal(id) {

    return (content => {

        const register = content.filter(e => e.hosp_id == id);

        htmlNombre.innerHTML = register[0].hosp_nombre;
        htmlDescripcion.innerHTML = register[0].hosp_descripcion;
        htmlDireccion.innerHTML = register[0].hosp_direccion;
        htmlTipo.value = register[0].hosp_tipo;
        htmlTelefono.innerHTML = register[0].hosp_telefono;
        htmlWhatsApp.href = `https://wa.me/506${register[0].hosp_telefono}`;
        htmlPrecio.value = `₡ ${register[0].hosp_precio}`;
        htmlImagen.innerHTML = '<img src="' + register[0].hosp_imagen + '"></img>';
    });
};

function getInfo(id) {
    request(service, printModal(id))
}

request(service, printCards);
