function validateForm(event) {
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;

  if (!email || !password) {
    event.preventDefault();

    Swal.fire({
      icon: "error",
      title: "Oops!",
      text: "email atau password kosong",
      confirmButtonText: "OK",
    });
  } else {
    event.preventDefault();
    Swal.fire({
      icon: "success",
      title: "sukses",
      text: "good",
      confirmButtonText: "OK",
    });
  }
}
