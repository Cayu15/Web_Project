document.addEventListener("DOMContentLoaded", function() {
    const regForm = document.getElementById("registrationform");
    if (regForm !== null) {
        regForm.addEventListener("submit", function(event) {
            event.preventDefault();

            const username = document.getElementById("user").value.trim();
            if (username === "") {
                alert("Kérlek add meg a felhasználónevet.");
                return;
            }

            const password = document.getElementById("password").value;
            if (password === "") {
                alert("Kérlek add meg a jelszót.");
                return;
            } else if (!window.isValidPassword(password)) {
                alert("A jelszónak legalább 8 karakter hosszúnak kell lennie, és tartalmaznia kell legalább egy kisbetűt, egy nagybetűt és egy számot.");
                return;
            }

            const lastname = document.getElementById("lastname").value.trim();
            if (lastname === "") {
                alert("Kérlek add meg a vezetéknevet.");
                return;
            }

            const firstname = document.getElementById("firstname").value.trim();
            if (firstname === "") {
                alert("Kérlek add meg a keresztnevet.");
                return;
            }

            const email = document.getElementById("email").value.trim();
            if (email === "") {
                alert("Kérlek add meg az e-mail címet.");
                return;
            } else if (!window.isValidEmail(email)) {
                alert("Érvénytelen e-mail cím formátum.");
                return;
            }

            event.target.submit();
        });
    }

    window.isValidEmail = function(email)
    {
        const regex = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        return regex.test(email);
    }

    window.isValidPassword = function(password)
    {
        const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
        return regex.test(password);
    }
});