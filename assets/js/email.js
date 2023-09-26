document.addEventListener("DOMContentLoaded", function () {
    emailjs.init("privatekey o publickey");

    const contactForm = document.getElementById("contactForm");

    contactForm.addEventListener("submit", function (e) {
        e.preventDefault();

        const formData = new FormData(contactForm);
        /* Aca necesitan hacerse una cuenta en emailjs y hacer el servicio junto a un template para poner los ID*/
        emailjs.sendForm("service", "template", formData)
            .then(function (response) {
                console.log("Mensaje enviado con éxito", response);
                alert("Mensaje enviado con éxito");
                contactForm.reset();
            }, function (error) {
                console.error("Hubo un error al enviar el mensaje", error);
                alert("Hubo un error al enviar el mensaje. Por favor, inténtalo de nuevo.");
            });
    });
});
