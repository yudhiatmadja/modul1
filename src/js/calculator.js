// calculator.js
document.addEventListener("DOMContentLoaded", () => {
  // Addition
  const additionForm = document.getElementById("penjumlahan-form");
  if (additionForm) {
    additionForm.addEventListener("submit", (event) => {
      event.preventDefault();
      const num1 = parseFloat(document.getElementById("number1").value);
      const num2 = parseFloat(document.getElementById("number2").value);
      const sum = num1 + num2;
      document.getElementById("result").value = `${sum}`;
    });
  }

  // Subtraction
  const subtractionForm = document.getElementById("pengurangan-form");
  if (subtractionForm) {
    subtractionForm.addEventListener("submit", (event) => {
      event.preventDefault();
      const num1 = parseFloat(document.getElementById("number1").value);
      const num2 = parseFloat(document.getElementById("number2").value);
      const difference = num1 - num2;
      document.getElementById("result").value = `${difference}`;
    });
  }

  // Multiplication
  const multiplicationForm = document.getElementById("perkalian-form");
  if (multiplicationForm) {
    multiplicationForm.addEventListener("submit", (event) => {
      event.preventDefault();
      const num1 = parseFloat(document.getElementById("mul1").value);
      const num2 = parseFloat(document.getElementById("mul2").value);
      const product = num1 * num2;
      document.getElementById("result").value = `Hasil: ${product}`;
    });
  }

  // Division
  const divisionForm = document.getElementById("pembagian-form");
  if (divisionForm) {
    divisionForm.addEventListener("submit", (event) => {
      event.preventDefault();
      const num1 = parseFloat(document.getElementById("div1").value);
      const num2 = parseFloat(document.getElementById("div2").value);
      if (num2 === 0) {
        document.getElementById("result").value = "Error: Pembagi tidak boleh 0.";
      } else {
        const quotient = num1 / num2;
        document.getElementById("result").value = `${quotient}`;
      }
    });
  }
});
