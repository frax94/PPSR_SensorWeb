// INIZIO FUNZIONE CATEGORIE
function click_categorie(categoria) {
           var lista_categorie = ["avventura", "azione", "giochi_di_guida",  
                                "giochi_di_ruolo", "online", "picchiaduro", "platform", "sparatutto", "sportivo"]; 
           var i; 
           for (i = 0; i < lista_categorie.length; i++) { 
               if (lista_categorie[i] == categoria) { 
                   document.getElementById(lista_categorie[i]).style.display="block"; 
               } else {
                   document.getElementById(lista_categorie[i]).style.display="none";
               }
       }
}
