import { Link } from "wouter";

export default function Navbar() {
  return (
    <nav className="navbar navbar-expand-lg navbar-light bg-light">
      <div className="container">
        <Link to="/" className="navbar-brand">
          AgroMarket
        </Link>
        <div className="collapse navbar-collapse" id="navbarNav">
          <ul className="navbar-nav">
            <li className="nav-item">
              <Link to="/products" className="nav-link">
                Productos
              </Link>
            </li>
            <li className="nav-item">
              <Link to="/producers" className="nav-link">
                Productores
              </Link>
            </li>
            <li className="nav-item">
              <Link to="/activities" className="nav-link">
                Actividades
              </Link>
            </li>
            {/* <li className="nav-item">
            <Link to="/donaciones" className="nav-link">
              Donaciones
            </Link>
          </li> */}
          </ul>
        </div>
      </div>
    </nav>
  );
}
