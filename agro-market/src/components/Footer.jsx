import { Link } from "wouter";

export default function Footer() {
  return (
  <footer className="footer mt-auto py-3 bg-light">
      <div className="container">
        <span className="text-muted"> 
          <Link to="/" className="nav-link">
          © 2023 AgroMarket
          </Link>
        </span>
      </div>
    </footer>
  );
}
