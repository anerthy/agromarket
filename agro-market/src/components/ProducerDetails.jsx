import { useRoute } from "wouter";
import PageTemplate from "./PageTemplate";


const fetchProducer = async (id) => {
  const response = await fetch(`http://localhost/agromarket/producer/${id}`);
  if (!response.ok) {
    throw new Error("Network response was not ok");
  }
  return response.json();
};

const ProducerDetails = () => {
  const [match, params] = useRoute("/producer/:id");
  fetchProducer(params.id);

  return (
    <>
      <PageTemplate>
      <h1>Detalles del productor #{params.id}</h1>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus earum
        consequatur at iure. Dignissimos cumque inventore impedit officia
        mollitia, eum aperiam sunt accusamus esse, voluptatibus sed possimus
        ullam deleniti doloremque?
      </p>
      </PageTemplate>
    </>
  );
};

export default ProducerDetails;
