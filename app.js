/* boutons pour ouvrir les portes */
let doorButton = document.querySelector('#door-button');
/* les portes */
let leftDoor = document.querySelector('.left-door');
let rightDoor = document.querySelector('.right-door');
/* bouton pour ramener les portes */
let doorButtonPage = document.querySelector('.door-button-page');
/* boutons de filtre */
let boutonFiltrer = document.querySelector('.filtrer');
let boutonTrier = document.querySelector('.trier');
/* boite des filtres et compétences */
let filtrerBox = document.querySelector('.filtrer-box');
let trierBox = document.querySelector('.trier-box');
/* bouton de retour au top */
let topButton = document.getElementById('top-button');
console.log(topButton);


/* ouverture des portes*/
doorButton.addEventListener('click', () => {
    /* retire les classes de fermetures si elles sont présentes */
    leftDoor.classList.remove('left-door-close', 'left-door-open');
    rightDoor.classList.remove('right-door-close', 'right-door-open');
    doorButton.classList.remove('btn-anim-in', 'btn-anim-out');

    /* lance l'animation du bouton, puis celle des portes 3.5s plus tard */
    doorButton.classList.toggle('btn-anim-out');
    setTimeout(function () {
        leftDoor.classList.toggle('left-door-open');
        rightDoor.classList.toggle('right-door-open');
    }, 1000);

    /* autorise le scroll de la page a la fin de l'animation */
    setTimeout(() => {
        document.body.style.overflowY = "visible";
    }, 3500)
})


/* fermeture des portes */
doorButtonPage.addEventListener('click', () => {
    /* ramene au top de la page et n'autorise plus le scroll */
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
    document.body.style.overflowY = "hidden";

    /* applique les classes de fermetures */
    leftDoor.classList.toggle('left-door-close');
    rightDoor.classList.toggle('right-door-close');
    setTimeout(function () {
        doorButton.classList.toggle('btn-anim-in');
    }, 1500);
})

boutonFiltrer.addEventListener('click', () => {
    trierBox.classList.remove('trier-box-toggle');
    filtrerBox.classList.toggle('filtrer-box-toggle');
})

boutonTrier.addEventListener('click', () => {
    filtrerBox.classList.remove('filtrer-box-toggle');
    trierBox.classList.toggle('trier-box-toggle');
})

/* le bouton s'affiche lorsque le scroll est égale a x */
window.onscroll = function(){scrollFunction()};

function scrollFunction() {
    if (window.pageYOffset > 130 || document.documentElement.scrollTop > 130) {
      topButton.style.display = "block";
    } else {
      topButton.style.display = "none";
    }
  }

  /* retourne au tp */
topButton.addEventListener('click', () => {
    window.pageYOffset = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
})

/* get distance from top */
window.addEventListener('scroll', () => {
    console.log(window.pageYOffset);
})
