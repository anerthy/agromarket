const url = 'https://paraisoazul.org/Servicios/getAlimentationes';

const contenedor = document.getElementById("cards-container");
const btnAnterior = document.getElementById("btn-anterior");
const btnSiguiente = document.getElementById("btn-siguiente");
const pageCounter = document.getElementById("num-page");

const htmlNombre = document.getElementById("alim-nombre");
const htmlDescripcion = document.getElementById("alim-descripcion");
const htmlDireccion = document.getElementById("alim-direccion");
const htmlHorario = document.getElementById("alim-horario");
const htmlTelefono = document.getElementById("alim-telefono");
const htmlWhatsApp = document.getElementById("wsa");
const htmlImagen = document.getElementById("alim-imagen");

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
                                <img id="imagen" src="${e.alim_imagen}" alt="Imagen de la alimentacion" class="card-img-top" alt="Imagen de la alimentacion" style="width: 300px; height:300px;">
                                </div>
                                <div class="card_content">
                                <h2 class="card_title">
                                    <center>
                                    <p class="Color-Title Tipografia-contenido-Hosp">${e.alim_nombre}</p>
                                    </center>
                                </h2>
                                <button type="button" class="btn btn-primary Back-Button Tipografia-contenido-Hosp" data-toggle="modal" data-target="#modalAlimentacion" onclick="getInfo(${e.alim_id})">Ver más</button>
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
                    <p>Has llegado al final de la lista de servicios de alimentación.</p>
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

        const register = content.filter(e => e.alim_id == id);

        htmlNombre.innerHTML = register[0].alim_nombre;
        htmlDescripcion.innerHTML = register[0].alim_descripcion;
        htmlDireccion.innerHTML = register[0].alim_direccion;
        htmlHorario.value = register[0].alim_horario;
        htmlTelefono.innerHTML = register[0].alim_telefono;
        htmlWhatsApp.href = `https://wa.me/506${register[0].alim_telefono}`;
        htmlImagen.innerHTML = '<img src="' + register[0].alim_imagen + '"></img>';
    });
};

function getInfo(id) {
    request(service, printModal(id))
}

request(service, printCards);
