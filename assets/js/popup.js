document.addEventListener("DOMContentLoaded", function () {
  const firebaseConfig = {
    apiKey: "AIzaSyAuC31nB2XKL88CDC1oVK_n0eWqwBV0uwA",
    authDomain: "magnetica-database.firebaseapp.com",
    projectId: "magnetica-database",
    storageBucket: "magnetica-database.appspot.com",
    messagingSenderId: "92080819795",
    appId: "1:92080819795:web:2754bdba2e78eafb1040a6",
    measurementId: "G-46N8WNR627",
  };

  const app = initializeApp(firebaseConfig);
  const db = getFirestore();

  Swal.fire({
    title: "Se parte de nuestra comunidad Magnética.",
    color: "#941F20",
    html: `<input type="text" id="name-popup" class="swal2-input" placeholder="Nombre">
                <input type="email" id="email-popup" class="swal2-input" placeholder="Email">`,
    customClass: {
      title: "title-class",
      popup: "popup-class",
    },
    padding: "40px",
    inputAttributes: {
      autocapitalize: "off",
    },
    showCancelButton: true,
    confirmButtonText: "Enviar suscripción",
    confirmButtonColor: "#941F20",
    showLoaderOnConfirm: true,
    preConfirm: () => {
      const name = Swal.getPopup().querySelector("#name-popup").value;
      const email = Swal.getPopup().querySelector("#email-popup").value;
      if (!name || !email) {
        Swal.showValidationMessage(
          `Por favor, ingresa un nombre y un correo electrónico`
        );
      } else {
        const datos = {
          nombre: name,
          email: email,
        };
        return addDoc(collection(db, "usuarios"), datos)
          .then((docRef) => {
            return { name: name, email: email };
          })
          .catch((error) => {
            Swal.showValidationMessage(
              `Error al guardar los datos en Firebase: ${error}`
            );
          });
      }
    },
  }).then((result) => {
    Swal.fire(
      `
          Nombre: ${result.value.name}
          Email: ${result.value.email}
        `.trim()
    );
  });
});
