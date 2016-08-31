function deleteElement(){
	$.SmartMessageBox({
                title : "Voulez vous vraiment suprimer cet element",
                content : "",
                buttons : '[No][Yes]'
			 },function(result) {
                if(result=== "Yes"){
                	$.smallBox({
                                        title : "Operation effectuée avec succées",
                                        content: "2 seconds ago..." ,
                                        color : "#0099CC",
                                        iconSmall : "fa fa-thumbs-up fa-2x fadeInRight animated",
                                        timeout : 4000
                                    });
                
                }else {
                	$.smallBox({
                                    title : "Cancel",
                                    content: "2 seconds ago..." ,
                                    color : "#990000",
                                    iconSmall : "fa fa-times fa-2x fadeInRight animated",
                                    timeout : 4000
                    });
                }
              }  
        );	

}
function updatePonderation(){
 $.SmartMessageBox({
                title : "Ajouter la dose",
                content : "",
				input : "text",
				inputValue : "",
				placeholder : 'Ponderation',
                buttons : '[Cancel][Confirmer]'
			 },function(result) {
                if(result=== "Confirmer"){
                	$.smallBox({
                                        title : "Operation effectuée avec succées",
                                        content: "2 seconds ago..." ,
                                        color : "#0099CC",
                                        iconSmall : "fa fa-thumbs-up fa-2x fadeInRight animated",
                                        timeout : 4000
                                    });
                
                }else {
                	$.smallBox({
                                    title : "Cancel",
                                    content: "2 seconds ago..." ,
                                    color : "#990000",
                                    iconSmall : "fa fa-times fa-2x fadeInRight animated",
                                    timeout : 4000
                    });
                }
              }  
        );	
}
