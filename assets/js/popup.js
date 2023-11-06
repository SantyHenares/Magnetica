// Import the functions you need from the SDKs you need
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.5.2/firebase-app.js";
import {
  getFirestore,
  collection,
  addDoc,
} from "https://www.gstatic.com/firebasejs/10.5.2/firebase-firestore.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.5.2/firebase-analytics.js";
const firebaseConfig = {
  apiKey: "AIzaSyAuC31nB2XKL88CDC1oVK_n0eWqwBV0uwA",
  authDomain: "magnetica-database.firebaseapp.com",
  projectId: "magnetica-database",
  storageBucket: "magnetica-database.appspot.com",
  messagingSenderId: "92080819795",
  appId: "1:92080819795:web:2754bdba2e78eafb1040a6",
  measurementId: "G-46N8WNR627",
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const db = getFirestore(app);
const analytics = getAnalytics(app);

function guardarDatos() {
  const name = document.getElementById("name-popup").value;
  const email = document.getElementById("email-popup").value;
  const today = new Date();
  const day = today.getDate();
  const month = today.getMonth() + 1;
  const year = today.getFullYear();

  const fechaHoy = `${day < 10 ? "0" + day : day}-${
    month < 10 ? "0" + month : month
  }-${year}`;

  if (!name || !email) {
    alert("Completa ambos campos");
  } else {
    const datos = {
      nombre: name,
      email: email,
      fecha: fechaHoy,
    };
    return addDoc(collection(db, "Email-registrados"), datos)
      .then((docRef) => {
        return { name: name, email: email };
      })
      .catch((error) => {
        Swal.showValidationMessage(
          `Error al guardar los datos en Firebase: ${error}`
        );
      });
  }
}
