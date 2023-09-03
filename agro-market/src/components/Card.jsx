import { useState } from "react";
import "../assets/css/Card.css";

export function Card({ children, title = "default", image, booleano, fnt }) {
  const [estado, setEstado] = useState(booleano);
  // [0] el valor
  // [1] para cambiar el valor

  const handleClick = () => {
    setEstado(!estado);
  };

  const texto = estado ? "ver mas" : "ver menos";
  const classButton = estado ? "blue" : "red";

  return (
    <>
      <h1 className="title">{fnt(title)}</h1>
      <img src={image} alt={title} />
      <p>{children}</p>
      <button className={classButton} onClick={handleClick}>
        {texto}
      </button>
    </>
  );
}
