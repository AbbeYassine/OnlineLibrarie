function onFocusChanged(j,table_patient,input_name){
	var input=document.getElementById('input_patient_'+input_name+(j+1));
	if(!input){
		var tr=document.createElement('tr');
table_patient.appendChild(tr);
//CIN
var td=document.createElement('td');
var div=document.createElement('div'); 
div.className='input-field col s12'
input_new=document.createElement('input');
   		input_new.id='input_patient_CIN'+(j+1);
		input_new.className='validate';
		input_new.type='text' ;
		input_new.name='input_patient_CIN'+(j+1)
		label = document.createElement('label');
label.htmlFor='input_patient_CIN'+(j+1);
label.innerHTML='CIN';
div.appendChild(label);
div.appendChild(input_new);
td.appendChild(div);
tr.appendChild(td);
input_new.onfocus=function(){
onFocusChanged(j+1,table_patient,'CIN');
}
   		//nom
var td=document.createElement('td');
var div=document.createElement('div'); 
div.className='input-field col s12';
input_new=document.createElement('input');
   		input_new.id='input_patient_nom'+(j+1);
   		input_new.name='input_patient_nom'+(j+1);
		input_new.className='validate';
		input_new.type='text' ;
		label = document.createElement('label');
label.htmlFor='input_patient_nom'+(j+1);
label.innerHTML='Nom';
div.appendChild(label);
div.appendChild(input_new);
td.appendChild(div);
tr.appendChild(td);
input_new.onfocus=function(){
onFocusChanged(j+1,table_patient,'nom');
}
//prenom
var td=document.createElement('td');
var div=document.createElement('div'); 
div.className='input-field col s12'
input_new=document.createElement('input');
   		input_new.id='input_patient_prenom'+(j+1);
   		input_new.name='input_patient_prenom'+(j+1);
		input_new.className='validate';
		input_new.type='text' ;
		label = document.createElement('label');
label.htmlFor='input_patient_prenom'+(j+1);
label.innerHTML='Prenom';
div.appendChild(label);
div.appendChild(input_new);
td.appendChild(div);
tr.appendChild(td);
input_new.onfocus=function(){
onFocusChanged(j+1,table_patient,'prenom');
}

	}
}

$(document).ready(function(){
    	var table_patient= document.getElementById('table_patient');
    	var input_patient=document.getElementById('input_patient_nom1');
input_patient.onfocus=function(){
onFocusChanged(1,table_patient,'nom');
}
var input_patient=document.getElementById('input_patient_prenom1');
input_patient.onfocus=function(){
onFocusChanged(1,table_patient,'prenom');
}

var input_patient=document.getElementById('input_patient_CIN1');
input_patient.onfocus=function(){
onFocusChanged(1,table_patient,'CIN');
}
});