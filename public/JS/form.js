
// Utilisé sur list article pour afficher ou non le filtre access
function articleAccess(param) {

    //Permet de passer param en it
    param = parseInt(param)

    //Verification que la value du select est bien égale à 2
    if (param === 2 ) {
        // Si c'est le cas, n'affiche pas le bloc access
        document.getElementById("bloc_access").style.display = "none";
    }
    else{
        //Sinon on l'affiche
        document.getElementById("bloc_access").style.display = "block";
    }
}

// Utilisé pour la création ou la modification d'un article
function newArticleAccess(param){
    param = parseInt(param)

    //Verification que la value du select est bien égale à 2
    if (param === 2){
        // Si c'est le cas, n'affiche pas le bloc access
        // Affiche le block end_date et le block short_description
        document.getElementById("new_access").style.display =  "none";
        document.getElementById("end_date").style.display = "block";
        document.getElementById("short_description").style.display = "block";
    }else{
        // Sinon, affiche le bloc access
        // Et n'affiche pas le block end_date et le block short_description
        document.getElementById("new_access").style.display = "block";
        document.getElementById("end_date").style.display = "none";
        document.getElementById("short_description").style.display = "none";
    }
}