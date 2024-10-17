let calcuBTNs = document.querySelectorAll(".calcuBTN");
let clearBTN = document.querySelector("#clear");
let backspaceBTN = document.querySelector("#backspace");
let equalBTN = document.querySelector("#equal");
let display = document.querySelector("#display");

calcuBTNs.forEach((el) => {
  el.addEventListener("click", () => {
    display.value += el.value;
  });
});

const evaluate = () => {
  if (display.value !== "") {
    try {
      let hasil = math.evaluate(display.value);
      display.value = hasil;
    } catch (err) {
      Swal.fire({
        title: "Error!",
        text: "Input tidak valid!",
        icon: "error",
        confirmButtonText: "OK",
      });
    }
  } else {
    Swal.fire({
      title: "Error!",
      text: "Masukkan angka terlebih dahulu!",
      icon: "error",
      confirmButtonText: "OK",
    });
  }
};

equalBTN.addEventListener("click", evaluate);
clearBTN.addEventListener("click", () => {
  display.value = "";
});
backspaceBTN.addEventListener("click", () => {
  display.value = display.value.slice(0, -1);
});
