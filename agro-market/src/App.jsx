import { Route, Switch } from "wouter";
import Home from "./components/Home";
import Producers from "./components/Producers";
import ProducerDetails from "./components/ProducerDetails";
import Products from "./components/Products";
import ProductPage from "./pages/ProductPage";
// import ProductDetails from "./components/ProductDetails";
import Activities from "./components/Activities";

function App() {
  return (
    <div>
      <Switch>
        <Route path="/" component={Home}></Route>
        <Route path="/producers" component={Producers}></Route>
        <Route path="/producer/:id" component={ProducerDetails}></Route>
        <Route path="/products" component={Products}></Route>
        <Route path="/product" component={ProductPage}></Route>
        {/* <Route path="/product/:id" component={ProductDetails}></Route> */}
        <Route path="/activities" component={Activities}></Route>
      </Switch>
    </div>
  );
}

export default App;
