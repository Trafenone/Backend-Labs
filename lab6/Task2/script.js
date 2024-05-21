const notesContainer = document.getElementById("notes-container");
const noteForm = document.getElementById("note-form");
const updateButtons = document.getElementById("updateButtons");
const addButton = document.getElementById("addButton");
const updateButton = document.getElementById("updateButton");
const cancelButton = document.getElementById("cancelButton");
let selectedNoteId = null;

document.addEventListener("DOMContentLoaded", fetchNotes);

noteForm.addEventListener("submit", (event) => {
    event.preventDefault();
    fetch("http://lab6/Task2/NotesApp.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({title: noteForm.title.value, content: noteForm.content.value})
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                clearForm();
                fetchNotes();
            } else {
                console.log(data.error);
            }
        })
        .catch(error => console.error(error))
});

updateButton.addEventListener("click", updateNote);
cancelButton.addEventListener("click", clearForm);

function fetchNotes() {
    fetch("http://lab6/Task2/NotesApp.php", {
        method: "GET",
        headers: {
            "Content-Type": "application/json"
        }
    })
        .then(response => response.json())
        .then(data => {
            if (Array.isArray(data) && data.length == 0) {
                notesContainer.innerHTML = "<h2>Notes not exists</h2>";
            } else {
                printNotes(data);
            }
        })
        .catch(error => console.error(error));
}

function updateNote(id) {
    fetch("http://lab6/Task2/NotesApp.php", {
        method: "PUT",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({id: selectedNoteId, title: noteForm.title.value, content: noteForm.content.value})
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                clearForm();
                fetchNotes();
            } else {
                console.log(data.error);
            }
        })
        .catch(error => console.error(error));
}

function deleteNote(event, id) {
    event.stopPropagation();
    fetch(`http://lab6/Task2/NotesApp.php?id=${id}`, {
        method: "DELETE",
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                clearForm();
                fetchNotes();
            } else {
                console.log(data.error);
            }
        })
        .catch(error => console.error(error));
}

function clearForm() {
    selectedNoteId = null;
    addButton.style.display = "block";
    updateButtons.style.display = "none";
    noteForm.title.value = "";
    noteForm.content.value = "";
}

function selectNote(data) {
    selectedNoteId = data.id;
    addButton.style.display = "none";
    updateButtons.style.display = "flex";
    noteForm.title.value = data.title;
    noteForm.content.value = data.content;
}

function printNotes(notes) {
    notesContainer.innerHTML = "";
    for (const data of notes) {
        const note = document.createElement("div");
        const title = document.createElement("h3");
        const content = document.createElement("p");
        const deleteButton = document.createElement("button");

        note.className = "note";
        note.addEventListener("click", () => selectNote(data));
        title.innerHTML = data.title;
        content.innerHTML = data.content;
        deleteButton.innerHTML = "Delete";
        deleteButton.addEventListener("click", (event) => deleteNote(event, data.id));

        note.appendChild(title);
        note.appendChild(content);
        note.appendChild(deleteButton);
        notesContainer.appendChild(note);
    }
}