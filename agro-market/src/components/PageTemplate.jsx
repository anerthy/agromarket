import Navbar from "./Navbar";
import Footer from "./Footer";

export default function PageTemplate({children}) {
  return (
  <>
    <Navbar />
      {children}
    <Footer />
  </>

  );
}
