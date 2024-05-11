document.addEventListener("DOMContentLoaded", function() {
    const contactForm = document.getElementById("contact_feedback");

    if (contactForm !== null) {
        contactForm.addEventListener("submit", function(event) {
            const message = document.getElementById("message").value.trim();
            if (message === "") {
                event.stopImmediatePropagation();
                event.preventDefault();

                alert("Kérlek adj meg egy üzenetet.");
            }
        });
    }
});