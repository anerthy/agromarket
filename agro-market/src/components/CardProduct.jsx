export function Card({ id, nombre, categoria, precio, imagen }) {
  return (
    <>
      <div className="card" key={id} style={{ width: "18rem" }}>
        <img src={imagen} className="card-img-top" alt="Imagen del producto" />
        <div className="card-body">
          <h5 className="card-title">{nombre}</h5>
          <p className="card-text"> {categoria}</p>
          <p className="card-text">₡ {precio}</p>
          <button className="btn btn-primary">Ver Más</button>
        </div>
      </div>
    </>
  );
}
