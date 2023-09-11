import { useRoute } from "wouter";

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
      <h1>Producer details...</h1>
    </>
  );
};

export default ProducerDetails;
