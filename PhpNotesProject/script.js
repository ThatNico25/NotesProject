function addNote(){
    document.getElementsByClassName("btn-update")[0].disabled = true;
}


function updateNote(){
    document.getElementsByClassName("btn-update")[0].disabled = false;
}

function selectNote(id, title, description) {

    document.getElementsByClassName("btn-update")[0].disabled = false;

    var note = document.getElementById("Note_" + id).innerHTML;
    const myArray = note.split("- ");

    document.getElementsByClassName("titleNote")[0].value = title;
    var result = description.replaceAll('}~#-n237fls93&{}~#-&{}~#-n237fls93&{}~#-&{', '\n');
    var test = result.replaceAll('}~#-n237fls93&{}~#-&{', '');

    document.getElementById("pass").value = test;
}