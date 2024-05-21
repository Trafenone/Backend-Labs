const registrationForm = document.getElementById("registrationForm");
const loginForm = document.getElementById("loginForm");

document.getElementById("registrationForm").addEventListener("submit", function (event) {
    event.preventDefault();

    let name = document.getElementById("name").value;
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;

    if (name && email && password) {
        fetch("http://lab6/Task1/Backend/register.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({name: name, email: email, password: password})
        })
            .then(response => response.json())
            .then(data => {
                document.getElementById("message").innerHTML = data.success ? data.message : data.error;
            })
            .catch(error => console.error("Error:", error));
    } else {
        document.getElementById("message").innerHTML = "Please fill in all fields.";
    }
});