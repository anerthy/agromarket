import { useEffect, useState } from "react";
import PageTemplate from "../components/PageTemplate";

export default function ProductPage() {
  const [data, setData] = useState([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const fetchData = async () => {
      try {
        const response = await fetch(
          "http://localhost/agromarket/agromarket/product/getAll"
        );
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        const jsonData = await response.json();
        setData(jsonData);
        setLoading(false);
      } catch (error) {
        console.error("Error fetching data:", error);
        setLoading(false);
      }
    };

    fetchData();
  }, []);

  return (
    <>
      <PageTemplate>
        <div>
          {loading ? (
            <p>Cargando...</p>
          ) : (
            <div>
              {data.map((producto) => (
                <div key={producto.pro_id}>
                  <img src={producto.pro_imagen} alt={producto.pro_nombre} />
                  <h2>{producto.pro_nombre}</h2>
                  <p>{producto.pro_descripcion}</p>
                  <p>Categoría: {producto.pro_categoria}</p>
                  <p>Precio: ${producto.pro_precio}</p>
                </div>
              ))}
            </div>
          )}
        </div>
      </PageTemplate>
    </>
  );
}
