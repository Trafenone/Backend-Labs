const container = document.getElementById("container");

document.addEventListener("DOMContentLoaded", () => {
    fetch("http://lab6/Task1/Backend/users.php", {
        method: "GET", headers: {
            "Content-Type": "application/json"
        }
    })
        .then(response => response.json())
        .then(data => {
            showTable(data);
        })
        .catch(error => console.error(error));
});

function showTable(data) {
    const table = document.createElement("table");

    for (const element of data) {
        let row = document.createElement("tr");
        let nameCol = document.createElement("td");
        let emailCol = document.createElement("td");

        nameCol.innerHTML = element.name;
        emailCol.innerHTML = element.email;

        row.appendChild(nameCol);
        row.appendChild(emailCol);

        table.appendChild(row);
    }

    container.appendChild(table);
}