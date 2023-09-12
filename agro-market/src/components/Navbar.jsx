import { Link } from "wouter";

export default function Navbar() {
  return (
    <nav>
      <Link key={1} href={`/`}>
        Inicio
      </Link>
      <br />
      <Link key={2} href={`/products`}>
        Productos
      </Link>
      <br />
      <Link key={3} href={`/producers`}>
        Productores
      </Link>
      <br />
      <Link key={4} href={`/activities`}>
        Actividades
      </Link>
    </nav>
  );
}
