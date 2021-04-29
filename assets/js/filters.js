//Filtrer les orientations

//inputs orientation check
let inputorientation = document.querySelectorAll('.orientationcheck');

//fonction pour envoyer des requêtes en PHP à la BDD puis récupérer les données via axios
function axiosFilters(e) {
    //page affichée, 1 par défaut sinon on récupère le data-page sur les spans
    let currentpage = e.currentTarget.dataset.page;

    //undefined par défaut au chargement de la page & si pas de span cliqué, redéfini à 1 pour éviter une erreur
    if (currentpage == undefined) {
        currentpage = 1;
    }
    console.log('current page :' + currentpage);

    //mise en forme des données du formulaire
    orientationform = new FormData(document.querySelector('[name="orientationform"]'));

    //récupération des paramètres
    let params = new URLSearchParams(orientationform);
    //ajout d'un paramètre page dans l'url
    params.append('page', currentpage);
    console.log(params.toString());

    //envoi d'une requête avec axios, passage des paramètres ci-dessus dans l'url
    axios.get('./assets/php/filters.php?' + params)
        .then(response => {

            //décortiquage de le réponse :
            //récupération des données des images
            let pictures = response.data.responses;

            //récupération du nombre d'images total pour pouvoir faire la pagination
            let totalpictures = response.data.quantity;
            //calcul du total de pages pour une limite de 24 images/ page, arrondi à l'entier supérieur
            let totalpages = Math.round(totalpictures / 24);
            console.log('nombre total de page :' + totalpages);

            //à chaque requête, on vide la div dans laquelle seront affichées les images (au cas où on décoche une checkbox par exemple);
            document.querySelector('.results').innerHTML = '';

            //boucle sur le tableau contenant toutes les images, concaténation des résultats & affichage dans la div
            pictures.map(picture => {
                document.querySelector('.results').innerHTML += `<img src="./assets/banqueimg/${picture.cover}" alt="">`;
            })

            ////////////////////////////////////////////////

            //pagination

            //à chaque requête, on vide la div dans laquelle seront affichées les pages
            document.querySelector('.pagination').innerHTML = '';

            //page précédente, condition pour ne pas afficher "page précédente" quand on est à la première page
            if (currentpage > 1) {
                document.querySelector('.pagination').innerHTML += `<span class="links" data-page="${currentpage - 1}">Page précédente</span>`;
            }

            //toutes les pages
            for (let i = 1; i <= totalpages; i++) {
                if(i == currentpage){
                    document.querySelector('.pagination').innerHTML += `<span class="links" data-page="${i}" id="here">${i}</span>`;
                }else{
                    document.querySelector('.pagination').innerHTML += `<span class="links" data-page="${i}">${i}</span>`;
                }
            }
            //page suivante, condition pour ne pas afficher "page suivante" quand on est à la dernière page
            if (totalpages > currentpage) {
                document.querySelector('.pagination').innerHTML += `<span class="links" data-page="${currentpage + 1}">Page suivante</span>`;
            }

            //évènement quand on clique sur un span/ numéro de page
            let links = document.querySelectorAll('.links');
            for (link of links){
                link.addEventListener('click', axiosFilters);
            }
        })
}

//formulaire orientation en GET
for (let input of inputorientation) {
    input.addEventListener('click', axiosFilters);
}


