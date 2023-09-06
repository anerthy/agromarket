import React from "react";
import { useState } from "react";
import reactLogo from "./assets/react.svg";
import viteLogo from "/vite.svg";
import "./App.css";
import { Card } from "./components/Card";
// import { ProductPage } from "./pages/ProductPage";
import { PhotoList } from "./components/PhotoList";

// import { Link, BrowserRouter, Route, Switch } from "react-router-dom";

// const Actividades = () => <h1>Actividades</h1>;

function App() {
  const [count, setCount] = useState(0);
  const formatTitle = (title) => `@${title}`;
  const card2 = {
    fnt: formatTitle,
    booleano: false,
    title: "objeto",
    body: "descripcion",
    image: "https://placehold.co/100x100?text=objeto",
  };

  return (
    <>
      <div>
        <a href="https://vitejs.dev" target="_blank">
          <img src={viteLogo} className="logo" alt="Vite logo" />
        </a>
        <a href="https://react.dev" target="_blank">
          <img src={reactLogo} className="logo react" alt="React logo" />
        </a>
      </div>
      <h1>Vite + React</h1>
      <div className="card">
        <button onClick={() => setCount((count) => count + 1)}>
          count is {count}
        </button>
        <p>
          Edit <code>src/App.jsx</code> and save to test HMR
        </p>
      </div>
      {/* <ProductsPage /> */}

      <section className="card-section">
        <Card
          fnt={formatTitle}
          booleano={false}
          title="Hello world"
          body="lorem ipsum"
          image="https://placehold.co/100x100?text=Hello+World"
        >
          Hijo
        </Card>

        <Card {...card2}>Hijo</Card>

        <Card
          fnt={formatTitle}
          booleano
          body="lorem ipsum"
          image="https://placehold.co/100x100?text=Hello+World"
        >
          Hijo
        </Card>
      </section>

      <PhotoList />

      <p className="read-the-docs">
        Click on the Vite and React logos to learn more
      </p>
    </>
  );
}

export default App;
