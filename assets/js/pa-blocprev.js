    //Récupération du tableau des <div> de format (step 1)
    let divformats = document.querySelectorAll('.format-list');
    //Récupération du tableau des <div> de finition (step 2)
    let divfinitions = document.querySelectorAll('.finition-list');
    //Récupération du tableau des <div> de cadre (step 3)
    let divframes = document.querySelectorAll('.frame-list');

    //Bouton pour passer à l'étape suivante
    let stepsbutton = document.querySelector('#stepsbutton');
    //Label 2
    let step2 = document.querySelector('#step2');
    //Label 3
    let step3 = document.querySelector('#step3');

    //ETAPE 2 : 
    // -> récupérer la valeur du data-format dans la <div> sélectionnée, 
    // -> appliquer une bordure de sélection sur la <div> choisie
    // -> appeler la fonction priceFormat
    const getFormat = (event, divformat) => {
        const format = event.currentTarget.dataset.format;
        divformat.style = "border: 2px solid #aca06c";
        priceFormat(price, format);
    }

    //ETAPE 5 : 
    // -> récupérer la valeur du data-finition dans la <div> sélectionnée,
    // -> appliquer une bordure de sélection sur la <div> choisie
    // -> appeler la fonction priceFinition
    const getFinition = (event, divfinition, prixduformat) => {
        const finition = event.currentTarget.dataset.finition;
        divfinition.style = "border: 2px solid #aca06c";
        priceFinition(prixduformat, finition);
    }

    //ETAPE 8 :
    // -> récupérer la valeur du data-frame dans la <div> sélectionnée,
    // -> appliquer une bordure de sélection sur la <div> choisie
    // -> appeler la fonction priceFrame
    const getFrame = (event, divframe, prixdelafinition) => {
        const frame = event.currentTarget.dataset.frame;
        console.log(frame);
        divframe.style = "border: 2px solid #aca06c";
        priceFrame(prixdelafinition, frame);
    }

    //ETAPE 3 : la fonction priceFormat permet de calculer le prix de l'image selon le format choisi. Puis :
    // -> Affiche le prix dans la div#prix
    // -> Si le format choisi est bien dans la liste, activation du bouton 'stepsbutton',
    // ->  Au clic sur ce bouton, déclenchement d'un évènement qui cache les <div> format et affiche une des deux <div> finition, selon le format choisi.
    // -> désactivation du bouton 'stepsbutton'.
    // -> appel de la fonction stepTwo.
    function priceFormat(unprix, unformat) {
        let prixduformat = '';
        if (unformat == 'classique') {
            prixduformat = unprix * 1.3;
            document.querySelector('.photosurlemur2').style = "max-width : 10%;";
            document.querySelector('.photosurlemur1').style = "max-width : 5%;";
            document.querySelector('.photosurlemur3').style = "max-width : 5%;";
            document.querySelector('.photosurlemur4').style = "max-width : 5%;";
            document.querySelector('.divquimenerve').style = "top : 25%";
        } else if (unformat == 'grand') {
            prixduformat = unprix * 2.6;
            document.querySelector('.photosurlemur2').style = "max-width : 20%;";
            document.querySelector('.divquimenerve').style = "top : 20%";
        } else if (unformat == 'geant') {
            prixduformat = unprix * 5.2;
            document.querySelector('.photosurlemur2').style = "max-width : 30%;";
            document.querySelector('.divquimenerve').style = "top : 15%";
        } else if (unformat == 'collector') {
            prixduformat = unprix * 13;
            document.querySelector('.photosurlemur2').style = "max-width : 40%;";
            document.querySelector('.divquimenerve').style = "top : 8%";
        }

        document.getElementById('prix').innerHTML = 'TOTAL : ' + prixduformat + '€';

        //passer à l'étape suivante seulement si les valeurs choisies correspondent à l'une des suivantes 
        if (unformat == 'classique' || unformat == 'grand' || unformat == 'geant' || unformat == 'collector') {
            stepsbutton.disabled = false;
        };

        stepsbutton.addEventListener('click', event => {
            document.querySelector('.format-choice').style = "display: none;";
            step2.disabled = false;
            document.querySelector('.finition-choice').style = "display: block;";
            if (unformat == 'classique') {
                document.querySelector('.finition-choice-2').style = "display: block;";
            } else {
                document.querySelector('.finition-choice-1').style = "display: block;";
            }
        });
        //stepsbutton.disabled = true;

        //Appel de la fonction pour passer à l'étape suivante. Prixduformat en paramètre puisqu'on en a besoin pour calculer le prix suivant.
        stepTwo(prixduformat);
    }

    //ETAPE 6 : 
    function priceFinition(prixduformat, lafinition) {
        //Récupération de la finition, calcul du prix en fonction
        let prixdelafinition = '';
        if ((lafinition == 'pp_black') || (lafinition == 'paper_draw')) {
            prixdelafinition = prixduformat;
        } else if (lafinition == 'pp_white') {
            prixdelafinition = prixduformat * 1.4;
        } else if (lafinition == 'aluminium') {
            prixdelafinition = prixduformat * 2.6;
        } else if (lafinition == 'acrylic') {
            prixdelafinition = prixduformat * 3.35;
        }
        //Affichage du prix calculé dans le <div#prix>
        document.getElementById('prix').innerHTML = 'TOTAL : ' + prixdelafinition + '€';

        //"Sécurité" pour activer le bouton seulement si la finition choisie fait bien partie de la liste
        if (lafinition == 'pp_black' || lafinition == 'pp_white' || lafinition == 'paper_draw' || lafinition == 'aluminium' || lafinition == 'acrylic') {
            stepsbutton.disabled = false;
        };

        //Affichage des <div> frame selon le choix de la finition
        stepsbutton.addEventListener('click', event => {
            document.querySelector('.finition-choice').style = "display: none;";
            step3.disabled = false;
            document.querySelector('.frame-choice').style = "display: block;";
            if (lafinition == 'aluminium' || lafinition == 'acrylic') {
                document.querySelector('.frame-choice-1').style = "display: block;";
            } else if (lafinition == 'pp_black' || lafinition == 'pp_white') {
                document.querySelector('.frame-choice-2').style = "display: block;";
            } else {
                document.querySelector('.frame-choice-3').style = "display: block;";
            }
            //stepsbutton.disabled = true;
        });
        //Appel de la fonction pour passer à l'étape suivante. Prixdelafinition en paramètre puisqu'on en a besoin pour calculer le prix suivant.
        stepThree(prixdelafinition);
    }

    //ETAPE 9
    function priceFrame(price_finition, frame) {
        let total_price = '';
        if ((frame == 'none') || (frame == 'white_wood') || (frame == 'mahogany') || (frame == 'brushed_aluminium') || (frame == 'black_aluminium')) {
            total_price = price_finition;
        }
        else if((frame == 'white_satin') || (frame == 'black_satin') || (frame == 'walnut') || (frame == 'oak')) {
            total_price = price_finition * 1.45;
        }
        //Affichage du prix calculé dans le <div#prix>
        document.getElementById('prix').innerHTML = 'TOTAL : ' + total_price + '€';
    }

    //ETAPE 7 :
    function stepThree(prixdelafinition) {
        for (index = 0; index < divframes.length; index++) {
            //Désactivation du bouton stepsbutton tant que le choix du cadre n'est pas fait.
            //stepsbutton.disabled = true;
            let divframe = divframes[index];
            divframe.addEventListener('click', event => {
                for (let divframe2 of divframes) {
                    divframe2.style = "border : solid 1px #687079;";
                };
                getFrame(event, divframe, prixdelafinition);
            });
        }
    }

    //ETAPE 4 :
    // -> même code qu'à l'ETAPE 1 pour afficher/masquer les bordures de sélection, appel de la fonction getFinition
    function stepTwo(prixduformat) {
        for (index = 0; index < divfinitions.length; index++) {
            //Désactivation du bouton stepsbutton tant que le choix de la finition n'est pas fait.
            //stepsbutton.disabled = true;
            let divfinition = divfinitions[index];
            divfinition.addEventListener('click', event => {
                for (let divfinition2 of divfinitions) {
                    divfinition2.style = "border : solid 1px #687079;";
                };
                getFinition(event, divfinition, prixduformat);
            });
        }
    }

    //ETAPE 1 : parcourir les <div> format, ajouter un évènement au clic :
    // -> enlever les bordures de sélection partout
    // -> appeler la fonction getFormat
    for (index = 0; index < divformats.length; index++) {
        let divformat = divformats[index];
        divformat.addEventListener('click', event => {
            for (let divformat2 of divformats) {
                divformat2.style = "border : solid 1px #687079;";
            };
            getFormat(event, divformat);
        });
    }