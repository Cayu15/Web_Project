document.getElementById("registrationform").addEventListener("submit", function(event) {
    event.preventDefault(); 

    var username = document.getElementById("user").value.trim();
    if (username === "") {
        alert("Kérlek add meg a felhasználónevet.");
        return;
    }

    var password = document.getElementById("password").value;
    if (password === "") {
        alert("Kérlek add meg a jelszót.");
        return;
    } else if (!isValidPassword(password)) {
        alert("A jelszónak legalább 8 karakter hosszúnak kell lennie, és tartalmaznia kell legalább egy kisbetűt, egy nagybetűt és egy számot.");
        return;
    }

    var lastname = document.getElementById("lastname").value.trim();
    if (lastname === "") {
        alert("Kérlek add meg a vezetéknevet.");
        return;
    }

    var firstname = document.getElementById("firstname").value.trim();
    if (firstname === "") {
        alert("Kérlek add meg a keresztnevet.");
        return;
    }

    var email = document.getElementById("email").value.trim();
    if (email === "") {
        alert("Kérlek add meg az e-mail címet.");
        return;
    } else if (!isValidEmail(email)) {
        alert("Érvénytelen e-mail cím formátum.");
        return;
    }

    event.target.submit();
});


function isValidEmail(email)
{
    var regex = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    return regex.test(email);
}


function isValidPassword(password)
{
    var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
    return regex.test(password);
}
