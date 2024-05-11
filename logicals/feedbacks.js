document.addEventListener("DOMContentLoaded", function() {
    const table = document.getElementById("messages");
    const tbody = table.querySelector("tbody");
    const url = "./logicals/feedbacks.php";

    fetch(url).then(response => response.json()).then(data => {
        for (const item of data) {
            const row = window.createRow(item.feedback_id, item.user, item.message, item.date_add);
            tbody.append(row);
        }
    });

    window.createRow = function(id, name, message, date) {
        console.log({
            id,
            name,
            message,
            date
        })
        const tr = document.createElement("tr");

        const th = document.createElement("th");
        th.setAttribute("scope", "row");
        th.innerText = id;
        tr.appendChild(th);

        const tdName = document.createElement("td");
        tdName.innerText = name;
        tr.appendChild(tdName);

        const tdMessage = document.createElement("td");
        tdMessage.innerText = message;
        tr.appendChild(tdMessage);

        const tdDate = document.createElement("td");
        tdDate.innerText = date;
        tr.appendChild(tdDate);

        return tr;
    }
});