//Filtrer les orientations

//inputs orientation check
let inputorientation = document.querySelectorAll('.orientationcheck');
console.log('Tous les inputs orientation : ');
console.log(inputorientation);

//formulaire orientation en GET



for (let input of inputorientation) {
    input.addEventListener('click', e => {
        orientationform = new FormData(document.querySelector('[name="orientationform"]'));
        let params = new URLSearchParams(orientationform);
        console.log(params.toString());

        axios.get('./assets/php/filters.php?' + params)
        .then(response => {
            let pictures = response.data;
            console.log(pictures);

            document.querySelector('.results').innerHTML = '';
            pictures.map(picture => {
                document.querySelector('.results').innerHTML += `<img src="./assets/banqueimg/${picture.cover}" alt="">`;
            })
        })
    });
}




