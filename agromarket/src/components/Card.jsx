import "./assets/Card.css";

export function Card() {
  return (
    <article>
      <header>
        <img src="avatar" alt="https://unavatar.io/midudev" />
        <div>
          <strong>midu</strong>
          <span>@midu</span>
        </div>
      </header>

      <aside>
        <button>Seguir</button>
      </aside>
    </article>
  );
}
