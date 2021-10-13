//Fonction permettant de créer une popup

(function(){

    let popupCenter = function(url, title, width, height){
        let popupWidth = width || 640;
        let popupHeight = height || 320;
        let windowLeft = window.screenLeft || window.screenX;
        let windowTop = window.screenTop || window.screenY;
        let windowWidth = window.innerWidth || document.documentElement.clientWidth;
        let windowHeight = window.innerHeight || document.documentElement.clientHeight;
        let popupLeft = windowLeft + windowWidth / 2 - popupWidth / 2 ;
        let popupTop = windowTop + windowHeight / 2 - popupHeight / 2;
        let popup = window.open(url, title, 'scrollbars=yes, width=' + popupWidth + ', height=' + popupHeight + ', top=' + popupTop + ', left=' + popupLeft);
        popup.focus();
        return true;
    };


//Création d'un évènement au click sur l'élément avec l'id "share_facebook"
    document.getElementById('share_facebook').addEventListener('click', function(e){
        e.preventDefault();
        //Récupération de l'url stocké dans l'attribut "data_url" de l'élémént share_facebook
        let url = this.getAttribute('data_url');
        // Création du lien de partage à passer dans la function popupCenter,en passant l'url
        // dans la fonction encodeURIComponent() pour avoir une url propore
        let shareUrl = "https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(url);
        popupCenter(shareUrl, "Partager sur facebook");
    });
    document.getElementById('share_twitter').addEventListener('click', function(e){
        e.preventDefault();
        let url = this.getAttribute('data-url');
        let shareUrl = "https://twitter.com/intent/tweet?text=" + encodeURIComponent(document.title) +
            "&url=" + encodeURIComponent(url);
        popupCenter(shareUrl, "Partager sur Twitter");
    });



     document.querySelector('.share_instagram').addEventListener('click', function(e){
         e.preventDefault();
         let url = this.getAttribute('data-url');
         let shareUrl = "https://www.instagram.com/sharer/sharer.php?u="  + encodeURIComponent(url);
         popupCenter(shareUrl, "Partager sur instagram");
     });

   document.querySelector('.share_linkedin').addEventListener('click', function(e){
        e.preventDefault();
        let url = this.getAttribute('data-url');
        let shareUrl = "https://www.linkedin.com/shareArticle?url=" + encodeURIComponent(url);
        popupCenter(shareUrl, "Partager sur Linkedin");
    });


})();