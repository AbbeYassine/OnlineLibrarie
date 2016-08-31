function createRow(tbody, etudiant) {
    var tr = document.createElement('tr');
    tr.id =etudiant['id_Etudiant']+"css";
    //CIN
    var td = document.createElement('td');
    td.innerHTML = etudiant['CIN'];

    tr.appendChild(td);
    //nom
    var td = document.createElement('td');
    td.innerHTML = etudiant['nom'];
    tr.appendChild(td);
    //prenom
    var td = document.createElement('td');
    td.innerHTML = etudiant['prenom'];
    tr.appendChild(td);
    //niveau
    var td = document.createElement('td');
    td.innerHTML = etudiant['niveau'];
    tr.appendChild(td);
    //check
    var td = document.createElement('td');
    var check = document.createElement('input');
    check.id = etudiant['id_Etudiant'];
    check.name = etudiant['id_Etudiant'];
    check.value = "yes";
    check.type = "checkbox"
    var label_check = document.createElement('label');
    label_check.htmlFor = etudiant['id_Etudiant'];
    label_check.innerHTML = "Check"
    td.appendChild(check);
    td.appendChild(label_check);

    tr.appendChild(td);
    tbody.appendChild(tr);

}
function hasElement(element, array) {
    for (var i = 0; i < array.length; i++) {
        if (array[i] == element) {
            return true;
        }
    }
    return false;
}
function onChangeStage() {
    var tbody = document.getElementById("tbody_etudiant");
    var select_service = document.getElementById("select_service");
    if (select_service.value != "") {
        while (tbody.hasChildNodes()) {
            tbody.removeChild(tbody.firstChild);
        }
        for (var i = 0; i < etudiants.length; i++) {
            var bool = true;
            for (var j = 0; j < stage_Encadrant_Etudiant.length; j++) {
                if ((etudiants[i]['id_Etudiant'] == stage_Encadrant_Etudiant[j]['id_Etudiant']) 
                    && (select_service.value == stage_Encadrant_Etudiant[j]["id_Service"])) {
                    bool = false;
                    break;
                }
            }
            if (bool) {
                createRow(tbody, etudiants[i]);
            }
        }

    }
}

$(function () {
    // initialize select
    $('select').material_select()
})