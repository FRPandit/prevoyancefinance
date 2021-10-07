function articleAccess(param) {

    param = parseInt(param)

    if (param === 2 ) {
        document.getElementById("bloc_access").style.display = "none";
    }
    else{
        document.getElementById("bloc_access").style.display = "block";
    }
}

function newArticleAccess(param){
    param = parseInt(param)

    if (param === 2){
        document.getElementById("new_access").style.display =  "none";
        document.getElementById("end_date").style.display = "block";
    }else{
        document.getElementById("new_access").style.display = "block";
        document.getElementById("end_date").style.display = "none";
    }
}