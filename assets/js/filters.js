//Filtrer les orientations

//checkbox orientation
let orientationcheck = document.querySelectorAll(".orientationcheck");

for (let input of orientationcheck) {
    console.log(input);
    input.addEventListener('click', e =>
        axios.get(`./assets/php/filters.php?orientation=${input.value}`)
            .then(response => {
                let pictures = response.data;
                pictures.map(picture => {
                    document.querySelector('.results').innerHTML += `<img src="./assets/banqueimg/${picture.cover}" alt="">`;
                })
            })
    )
};


