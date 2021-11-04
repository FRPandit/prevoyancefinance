function displayForm(nameInput, value, divName ,form ) {

    var selector = ' input[name="' + nameInput + '"] '
    var valueBtn = '"' + value + '"'
    var div = '"' + divName + '"'
    var formAffiche = "`{{" + form + " }}`"
    console.log(selector)
    console.log(valueBtn)
    console.log(div)
    console.log(formAffiche)

    if (document.querySelector(selector)) {
        document.querySelectorAll(selector).forEach((elem) => {
            elem.addEventListener("change", function (event) {
                var radioValue = event.target.value;

                if (radioValue == valueBtn) {
                    // oui => afficher l'input text
                    document.getElementsByName(div)[0].style.display = 'block'
                    document.getElementsByName(div)[0].innerHTML = formAffiche

                } else {
                    // Non j'en ai pas
                    document.getElementsByName(div)[0].style.display = "none"
                    // le none supp le formulaire
                }
            });
        });
    }
}