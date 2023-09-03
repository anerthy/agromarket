import { useEffect, useState } from "react";
import axios from "axios";

export function PhotoList() {
  const [photos, setPhotos] = useState([]);
  const [searchTerm, setSearchTerm] = useState("");
  const [currentPage, setCurrentPage] = useState(1);
  const itemsPerPage = 5;

  useEffect(() => {
    // Realiza la solicitud GET a la API cuando el componente se monta
    axios
      .get("https://jsonplaceholder.typicode.com/photos")
      .then((response) => {
        // Limita la cantidad de registros a los primeros 100
        const first100Photos = response.data.slice(0, 100);
        // Actualiza el estado con los datos de los primeros 100 registros
        setPhotos(first100Photos);
      })
      .catch((error) => {
        console.error("Error al obtener datos de la API:", error);
      });
  }, []);

  // Filtra las fotos basadas en el término de búsqueda
  const filteredPhotos = photos.filter((photo) => {
    return photo.title.toLowerCase().includes(searchTerm.toLowerCase());
  });

  // Calcula el índice de inicio y fin de la página actual
  const startIndex = (currentPage - 1) * itemsPerPage;
  const endIndex = startIndex + itemsPerPage;

  // Calcula los elementos a mostrar en la página actual
  const itemsToShow = filteredPhotos.slice(startIndex, endIndex);

  // Funciones para cambiar de página
  const goToPreviousPage = () => {
    if (currentPage > 1) {
      setCurrentPage(currentPage - 1);
    }
  };

  const goToNextPage = () => {
    if (currentPage < Math.ceil(filteredPhotos.length / itemsPerPage)) {
      setCurrentPage(currentPage + 1);
    }
  };

  return (
    <div>
      <h1>Lista de Fotos</h1>
      <input
        type="text"
        placeholder="Buscar por título"
        value={searchTerm}
        onChange={(e) => setSearchTerm(e.target.value)}
      />
      <ul>
        {itemsToShow.map((photo) => (
          <li key={photo.id}>
            <img src={photo.thumbnailUrl} alt={photo.title} />
            <p>{photo.title}</p>
            <button
              onClick={() => {
                alert(photo.id);
              }}
            >
              Ver foto
            </button>
          </li>
        ))}
      </ul>
      <div>
        {/* Botón "Anterior" */}
        <button onClick={goToPreviousPage} disabled={currentPage === 1}>
          Anterior
        </button>
        {/* Botón "Siguiente" */}
        <button
          onClick={goToNextPage}
          disabled={
            currentPage === Math.ceil(filteredPhotos.length / itemsPerPage)
          }
        >
          Siguiente
        </button>
      </div>
    </div>
  );
}
