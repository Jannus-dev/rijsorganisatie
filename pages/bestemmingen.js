let vertrek = document.querySelector("#departureDate");

let terugkomst = document.querySelector("#returnDate");

const today = new Date().toISOString().split("T")[0];

vertrek.setAttribute("min", today);

vertrek.value = today;

terugkomst.setAttribute("min", today);

vertrek.addEventListener("change", () => setDate());

terugkomst.addEventListener("change", () => setDate());

const setDate = () => {
  const vertrekDate = vertrek.value;

  const terugkomstDate = terugkomst.value;

  vertrek.setAttribute("max", terugkomstDate);

  terugkomst.setAttribute("min", vertrekDate);
};

const inisializeDate = () => {
  vertrek = document.querySelector("#departureDate");

  terugkomst = document.querySelector("#returnDate");

  vertrek.setAttribute("min", today);

  vertrek.value = today;

  terugkomst.setAttribute("min", today);

  vertrek.addEventListener("change", () => setDate());

  terugkomst.addEventListener("change", () => setDate());
};
