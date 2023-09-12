const url = 'https://paraisoazul.org/Servicios/getTours';
const contenedor = document.getElementById("cards-container");
const btnAnterior = document.getElementById("btn-anterior");
const btnSiguiente = document.getElementById("btn-siguiente");
const pageCounter = document.getElementById("num-page");

const htmlNombre = document.getElementById("tour-nombre");
const htmlDescripcion = document.getElementById("tour-descripcion");
const htmlActividad = document.getElementById("tour-actividad");
const htmlLugar = document.getElementById("tour-lugar");
const htmlServicios = document.getElementById("tour-servicios");
const htmlDisponibilidad = document.getElementById("tour-disponibilidad");
const htmlPrecio = document.getElementById("tour-precio");
const htmlHoraInicio = document.getElementById("tour-hora-inicio");
const htmlDuracion = document.getElementById("tour-duracion");
const htmlCupo = document.getElementById("tour-cupo");
const htmlTelefono = document.getElementById("tour-telefono");
const htmlWhatsApp = document.getElementById("wsa");
const htmlImagen = document.getElementById("tour-imagen");

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
                                    <img id="imagen" src="${e.tour_imagen}" alt="Imagen del tour" class="card-img-top" alt="Imagen del tour" style="width: 300px; height:300px;">
                                    </div>
                                    <div class="card_content">
                                    <h2 class="card_title">
                                        <center>
                                        <p class="Color-Title Tipografia-contenido-Hosp">${e.tour_nombre}</p>
                                        </center>
                                    </h2>
                                    <button type="button" class="btn btn-primary Back-Button Tipografia-contenido-Hosp" data-toggle="modal" data-target="#modalTour" onclick="getInfo(${e.tour_id})">Ver más</button>
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
                    <p>Has llegado al final de la lista de tours.</p>
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

        const register = content.filter(e => e.tour_id == id);
        let servicios = "";
        if (register[0].tour_alimentacion.length > 0) {
            servicios = `<li>${register[0].tour_alimentacion}</li>`;
        }
        if (register[0].tour_transporte.length > 0) {
            servicios += `<li>${register[0].tour_transporte}</li>`;
        }
        if (register[0].tour_hospedaje.length > 0) {
            servicios += `<li>${register[0].tour_hospedaje}</li>`;
        }

        htmlServicios.innerHTML = servicios;
        htmlNombre.innerHTML = register[0].tour_nombre;
        htmlDescripcion.innerHTML = register[0].tour_descripcion;
        htmlLugar.innerHTML = register[0].tour_lugar;
        htmlActividad.innerHTML = register[0].tour_actividad;
        htmlDisponibilidad.innerHTML = register[0].tour_disponibilidad;
        htmlPrecio.value = `₡ ${register[0].tour_precio}`;
        htmlHoraInicio.value = register[0].tour_hora_inicio;
        htmlDuracion.value = register[0].tour_duracion;
        htmlCupo.value = `${register[0].tour_cupo_minimo} personas`;
        htmlTelefono.innerHTML = register[0].tour_telefono;
        htmlWhatsApp.href = `https://wa.me/506${register[0].tour_telefono}`;
        htmlImagen.innerHTML = '<img src="' + register[0].tour_imagen + '"></img>';
    });
};

function getInfo(id) {
    request(service, printModal(id))
}

request(service, printCards);
