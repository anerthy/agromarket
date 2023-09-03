export function Boton({ texto, link }) {
  return (
    <a href={link}>
      <button type="button">{texto}</button>
    </a>
  );
}
