
$(function () {
    // initialize select
    $('select').material_select()
})
/*
function createRow(tbody, banque, competence, i) {
    var tr = document.createElement('tr');
    //label
    var td = document.createElement('td');
    td.innerHTML = banque['label'];
    tr.appendChild(td);
    //domaine
    td = document.createElement('td');
    td.innerHTML = banque['code_domaine'];
    tr.appendChild(td);
    //critere
    td = document.createElement('td');
    td.innerHTML = banque['code_critere'];
    tr.appendChild(td);
    //systeme
    td = document.createElement('td');
    td.innerHTML = banque['code_systeme'];
    tr.appendChild(td);
    //contexte
    td = document.createElement('td');
    td.innerHTML = banque['code_contexte'];
    tr.appendChild(td);
    //competence
    td = document.createElement('td');
    td.innerHTML = competence;
    tr.appendChild(td);
    //instruction
    td = document.createElement('td');
    //Modal Trigger
    var a_trigger = document.createElement('a');
    a_trigger.className = "modal-trigger";
    a_trigger.href = "model" + i;
    var i = document.createElement('i');
    i.className = "material-icons";
    i.innerHTML = "toc";
    a_trigger.appendChild(i);
    td.appendChild(a_trigger);
    //Modal Structure
    var div_model = document.createElement('div');
    div_model.id = "model" + i;
    div_model.className = "modal";
    var div_content = document.createElement('div');
    div_content.className = "modal-content darken-1";
    //situation clinique
    var div_situation = document.createElement('div');
    div_situation.className = "card-panel hoverable";
    var h = document.createElement('h5');
    h.className = "center";
    var u = document.createElement("u");
    u.innerHTML = "Situation Clinique ";
    h.appendChild(u);
    div_situation.appendChild(h);
    div_situation.innerHTML = banque['situation_Clinique'];
    div_content.appendChild(div_situation);
    var br = document.createElement('br');
    div_content.appendChild(br);
    //instruction aux etudiant
    var div_instruction = document.createElement('div');
    div_instruction.className = "card-panel hoverable";
    h = document.createElement('h5');
    h.className = "center";
    var u = document.createElement("u");
    u.innerHTML = "Instruction aux etudiants ";
    h.appendChild(u);
    div_instruction.appendChild(h);
    div_instruction.innerHTML = banque['instruction_Etudiant'];
    div_content.appendChild(div_instruction);
    div_model.appendChild(div_content);
    //footer
    var div_footer = document.createElement('div');
    div_footer.className = "modal-footer darken-1 ";
    var a_close = document.createElement('a');
    a_close.href = "#!";
    a_close.className = "modal-action modal-close waves-effect waves-green btn-flat white";
    a_close.innerHTML = "Close";
    div_footer.appendChild(a_close);
    div_model.appendChild(div_footer);
    td.appendChild(div_model);
    tr.appendChild(td);
    //ponderation
    td = document.createElement('td');
    //var div_input=document.createElement('div');
    //div_input.className='input-field col s12'
    input_ponderation = document.createElement('input');
    input_ponderation.id = banque['id_Banque'] + "P";
    input_ponderation.className = 'validate';
    input_ponderation.type = 'number';
    input_ponderation.name = banque['id_Banque'] + 'P';
    input_ponderation.max = "100";
    input_ponderation.min = "0";
    /*label = document.createElement('label');
     label.for=banque['id_Banque']+'P';
     label.innerHTML='ponderation';
     div_input.appendChild(label);
     div_input.appendChild(input_ponderation);*/
    /*td.appendChild(input_ponderation);
    tr.appendChild(td);
    //checkbox
    td = document.createElement('td');
    var check = document.createElement('input');
    check.id = banque['id_Banque'] + "B";
    check.name = banque['id_Banque'] + "B";
    check.value = "yes";
    check.type = "checkbox"
    var label_check = document.createElement('label');
    label_check.htmlFor = banque['id_Banque'] + "B";
    label_check.innerHTML = "Check"
    td.appendChild(check);
    td.appendChild(label_check);
    tr.appendChild(td);
    tbody.appendChild(tr);
}
*/
function hasCompetence(array, pr) {
    for (var i = 0; i < array.length; i++) {
        if (array[i] == pr) {
            return true;
        }
    }
    return false;
}

function onChangeFiltre() {
    var tbody_trs = document.getElementById("tbody_banque").getElementsByTagName('tr');
    for (var i=0;i<tbody_trs.length;i++) {
            tbody_trs[i].style.display='block';
    }
    var select_contexte = document.getElementById("id_contexte").value;
    var select_critere = document.getElementById("id_critere").value;
    var select_domaine = document.getElementById("id_domaine").value;
    var select_systeme = document.getElementById("id_systeme").value;
    var j = 1;
    for (var i = 0; i < banques.length; i++) {
        var bool = false;
        if ((select_systeme != "") && (banques[i]["id_Systeme"] != select_systeme)) {
            tbody_trs[i].style.display='none';
            continue;
        }
        if ((select_domaine != "") && (banques[i]["id_Domaine"] != select_domaine)) {
            tbody_trs[i].style.display='none';
            continue;
        }
        if ((select_critere != "") && (banques[i]["id_Critere"] != select_critere)) {
            tbody_trs[i].style.display='none';
            continue;
        }
        if ((select_contexte != "") && (banques[i]["id_Contexte"] != select_contexte)) {
            tbody_trs[i].style.display='none';
            continue;
        }
        
        var k=0;
	var nb_NonChecked=0;
        var bool=true;
        while(true){
        	check=document.getElementById("checkbox"+competences[k]['id_Competence'])
        	if(check.checked){
      		  	if(hasCompetence(competenceBanqueId[i],competences[k]['id_Competence'])){
      		  		bool=false;
      		  		break;
	 	       	}
    	   	} else {
			nb_NonChecked++;
		}
        	k++;
        	if(k>=competences.length){
        		break;
        	}
        }
        if(bool&&(nb_NonChecked<competences.length)){
            tbody_trs[i].style.display='none';
        	continue;
        }
        tbody_trs[i].style.display='';
        //array.push(banques[i]["id_Banque"]);
        //createRow(tbody, banques[i], competenceBanque[i], j);
        //j++;
    }
}
