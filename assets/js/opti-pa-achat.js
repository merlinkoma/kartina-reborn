let parcours = {
    format: '',
    finition: '',
    frame: '',
    price: {
        formatprice: 0,
        finitionprice: 0,
        frameprice: 0,
    },
};

//Récupération du tableau des <div> de format (step 1)
let divchoices = document.querySelectorAll('.div-choice');

//Bouton pour passer à l'étape suivante
let nextbutton = document.querySelector('#nextbutton');
//Bouton pour valider le formulaire
let formbutton = document.querySelector('#formbutton');

//div d'affichage du prix
let total = document.querySelector('#prix');

//Label 1
let step1 = document.querySelector('#step1');
//Label 2
let step2 = document.querySelector('#step2');
//Label 3
let step3 = document.querySelector('#step3');

//image avec mockup
let image = document.querySelector('#photosurlemur');
//image seule
let aloneimage = document.querySelector('#photopassurlemur');
//div du cadre
let divframe = document.querySelector('.frame');

function steps() {
    console.log('log Steps');
    console.log(parcours);
    //Boucle sur toutes les div du parcours d'achat
    for (i = 0; i < divchoices.length; i++) {
        let choosendiv = divchoices[i];
        //ajout d'un évènement au clic sur la div choisie
        choosendiv.addEventListener('click', event => {

            for (let choosendiv2 of divchoices) {
                //suppression de la bordure de sélection sur les autres div/ remplacement par la bordure normale
                choosendiv2.style = "border : solid 1px #687079";
            };

            //vérification du data-type de la div choisie (format, finition ou frame)
            if (choosendiv.dataset.type == 'format') {
                parcours.format = choosendiv.dataset[event.currentTarget.dataset['type']];
                //envoi vers la fonction mockup pour avoir un aperçu du format
                //le style appliqué change selon l'orientation d'origine de l'image donc récupération du data-orientation
                mockupFormat(image.dataset['orientation'], parcours.format);
            }
            if (choosendiv.dataset.type == 'finition') {
                parcours.finition = choosendiv.dataset[event.currentTarget.dataset['type']];
                //envoi vers la fonction mockup pour avoir un aperçu de la finition seulement si la finition choisie est passe-partout blanc ou noir
                if (parcours.finition == "pp_white" || parcours.finition == "pp_black") {
                    mockupFinition(parcours.finition);
                }
            }
            if (choosendiv.dataset.type == 'frame') {
                parcours.frame = choosendiv.dataset[event.currentTarget.dataset['type']];
                //envoi vers la fonction mockup pour avoir un aperçu du cadre
                mockupFrame(parcours.frame, parcours)
            }
            //ajout de la bordure de sélection
            choosendiv.style = "border : solid 2px #aca06c";

            nextbutton.disabled = false;
        });
    }

    //ajout d'un évènement sur le bouton "suivant", envoi vers la fonction getChoice pour remplir l'objet parcours avec les choix de l'utilisateur
    nextbutton.addEventListener('click', event => {
        getChoice(parcours);
    });
}
steps();

function getChoice(objet) {
    console.log('log getChoice');
    console.log(parcours);
    //désactivation du bouton "suivant" tant qu'il n'y a pas de choix
    nextbutton.disabled = true;

    //vérification de l'étape à laquelle se trouve l'utilisateur
    if (objet.format !== '' && objet.finition == '') {
        //le bouton "suivant" doit être visible & le bouton de validation caché à cette étape (précision nécessaire au cas où l'utilisateur revient en arrière)
        nextbutton.hidden = false;
        formbutton.hidden = true;

        //si l'utilisateur revient en arrière, vérification que seule la div du choix de la finition soit visible
        document.querySelector('.div-format').style = 'display : none';
        document.querySelector('.div-finition').style = 'display : block';
        document.querySelector('.div-frame').style = 'display : none';

        //si l'utilisateur revient en arrière, l'étape en cours apparaît en noir, les étapes suivantes sont de nouveaux grisées
        step2.style = 'color : black';
        step3.style = 'color : grey';

        //@TODO vérifier l'utilité de cette étape
        for (let choosendiv2 of divchoices) {
            choosendiv2.style = "border : solid 1px #687079";
        };

        //affichage des sous-div finition selon le format choisi
        if (objet.format == 'classique') {
            document.querySelector('.finition-choice-1').style = 'display : none';
            document.querySelector('.finition-choice-2').style = 'display : block';
        } else {
            document.querySelector('.finition-choice-1').style = 'display : block';
            document.querySelector('.finition-choice-2').style = 'display : none';
        }

        //envoi vers la fonction priceFormat pour calculer le prix avec la finition
        priceFormat(price, objet.format, parcours);
    }
    else if (objet.format !== '' && objet.finition !== '' && objet.frame == '') {
        //le bouton "suivant" doit être visible & le bouton de validation caché à cette étape (précision nécessaire au cas où l'utilisateur revient en arrière)
        nextbutton.hidden = false;
        formbutton.hidden = true;

        //si l'utilisateur revient en arrière, vérification que seule la div du choix de la finition soit visible
        document.querySelector('.div-format').style = 'display : none';
        document.querySelector('.div-finition').style = 'display : none';
        document.querySelector('.div-frame').style = 'display : block';

        //l'étape en cours apparaît en noir
        step3.style = 'color : black';

        //les sous-div frame affichées sont différentes selon la finition choisie
        if (objet.finition == 'paper_draw') {
            document.querySelector('.frame-choice-1').style = 'display : none';
            document.querySelector('.frame-choice-2').style = 'display : none';
            document.querySelector('.frame-choice-3').style = 'display : block';
        } else if (objet.finition == 'aluminium' || objet.finition == 'acrylic') {
            document.querySelector('.frame-choice-1').style = 'display : block';
            document.querySelector('.frame-choice-2').style = 'display : none';
            document.querySelector('.frame-choice-3').style = 'display : none';
        } else {
            document.querySelector('.frame-choice-1').style = 'display : none';
            document.querySelector('.frame-choice-2').style = 'display : block';
            document.querySelector('.frame-choice-3').style = 'display : none';
        }
        //envoi vers la fonction priceFinition pour calculer le prix après le choix de la finition
        priceFinition(parcours.price.formatprice, parcours.finition, parcours);
    }
    else if (objet.format == '' && objet.finition == '' && objet.frame == '') {

        //le bouton "suivant" doit être visible & le bouton de validation caché à cette étape (précision nécessaire au cas où l'utilisateur revient en arrière)
        nextbutton.hidden = false;
        formbutton.hidden = true;

        //si l'utilisateur revient en arrière, vérification que seule la div du choix du format soit visible
        document.querySelector('.div-format').style = 'display : block';
        document.querySelector('.div-finition').style = 'display : none';
        document.querySelector('.div-frame').style = 'display : none';

        //les étapes suivantes sont grisées
        step2.style = 'color : grey';
        step3.style = 'color : grey';

        //@TODO vérifier l'utilité de cette étape
        for (let choosendiv2 of divchoices) {
            choosendiv2.style = "border : solid 1px #687079";
        };
    } else {
        nextbutton.hidden = true;
        priceFrame(parcours.price.finitionprice, parcours.frame, parcours);
        formbutton.hidden = false;
    }
}

function priceFormat(price, format, objet) {
    console.log('calcul du prix du format');
    //initilisation de la variable prixduformat
    let prixduformat = 0;
    //calcul du prix selon le choix du format
    if (format == 'classique') {
        prixduformat = price * 1.3;
    } else if (format == 'grand') {
        prixduformat = price * 2.6;
    } else if (format == 'geant') {
        prixduformat = price * 5.2;
    } else if (format == 'collector') {
        prixduformat = price * 13;
    }
    //remplissage de l'objet parcours avec le prix du format dont on a besoin à l'étape suivante
    objet.price.formatprice = prixduformat;
    //remplissage du formulaire caché avec le nom du format et 
    document.form.format.value = objet.format;
    document.form.formatprice.value = objet.price.formatprice;
    //affichage du prix selon les choix effectués
    total.innerHTML = 'Prix : ' + prixduformat + '€';
}

function priceFinition(prixduformat, finition, objet) {
    console.log('calcul du prix de la finition');
    //initilisation de la variable prixdelafinition
    let prixdelafinition = 0;
    //calcul du prix selon le choix de la finition
    if ((finition == 'pp_black' || finition == 'paper_draw')) {
        prixdelafinition = prixduformat;
    }
    else if (finition == 'pp_white') {
        prixdelafinition = prixduformat * 1.4;
    }
    else if (finition == 'aluminium') {
        prixdelafinition = prixduformat * 2.6;
    }
    else if (finition == 'acrylic') {
        prixdelafinition = prixduformat * 3.35;
    }

    //remplissage de l'objet avec les valeurs choisies
    objet.price.finitionprice = (prixdelafinition).toFixed(2);
    document.form.finition.value = objet.finition;
    document.form.finitionprice.value = objet.price.finitionprice;

    total.innerHTML = 'Prix : ' + (prixdelafinition).toFixed(2) + '€';
}

function priceFrame(prixdelafinition, frame, objet) {
    console.log('calcul du prix du cadre');
    //initilisation de la variable prixtotal
    let prixtotal = 0;
    //calcul du prix final selon le cadre choisi
    if ((frame == 'black_aluminium') || (frame == 'white_wood') || (frame == 'mahogany') || (frame == 'brushed_aluminium') || (frame == 'none')) {
        prixtotal = prixdelafinition;
    }
    else if ((frame == 'white_satin') || (frame == 'black_satin') || (frame == 'walnut') || (frame == 'oak')) {
        prixtotal = (prixdelafinition * 1.45).toFixed(2);
    }

    //remplissage de l'objet parcours et le formulaire caché selon les valeurs choisies
    objet.price.frameprice = prixtotal;
    document.form.frame.value = objet.frame;
    document.form.frameprice.value = objet.price.frameprice;
    total.innerHTML = 'Prix : ' + prixtotal + '€';
}

function mockupFormat(orientation, format) {
    console.log('mockup format');
    //application d'un style différent selon l'orientation de l'image
    if (orientation == 'portrait') {
        //permet de ne pas ajouter plusieurs classes
        image.className = '';
        aloneimage.className = '';
        if (format == 'classique') {
            image.classList.add('porclassique');
            aloneimage.classList.add('classique');
        } else if (format == 'grand') {
            image.classList.add('porgrand');
            aloneimage.classList.add('grand');
        } else if (format == 'geant') {
            image.classList.add('porgeant');
            aloneimage.classList.add('geant');
        } else if (format == 'collector') {
            image.classList.add('porcollector');
            aloneimage.classList.add('collector');
        }
    } else if (orientation == 'paysage') {
        image.className = '';
        aloneimage.className = '';
        if (format == 'classique') {
            image.classList.add('payclassique');
            aloneimage.classList.add('classique');
        } else if (format == 'grand') {
            image.classList.add('paygrand');
            aloneimage.classList.add('grand');
        } else if (format == 'geant') {
            image.classList.add('paygeant');
            aloneimage.classList.add('geant');
        } else if (format == 'collector') {
            image.classList.add('paycollector');
            aloneimage.classList.add('collector');
        }
    }
}

function mockupFinition(finition) {
    console.log('mockup finition');
    //ajout d'un padding pour simuler le passe-partout et ne pas empêcher l'ajout d'un cadre à l'étape suivante
    if (finition == "pp_black") {
        image.style = "padding : 15px; background-color: #161616;";
        aloneimage.style = "padding : 30px; background-color: #161616;";
    } else if (finition == "pp_white") {
        image.style = "padding : 15px; background-color: #f4f4f4;";
        aloneimage.style = "padding : 30px; background-color: #f4f4f4;";
    }
}

function mockupFrame(frame, objet) {
    console.log('mockup cadre');
    if (objet.finition == "pp_black") {
        image.style = "padding: 15px; background-color: #161616; border-style: none; border-image:none";
        aloneimage.style = "padding: 25px; background-color: #161616; border-style: none; border-image:none";
        if (frame == 'black_satin') {
            image.style = "padding: 15px; background-color: #161616; border-style: ridge; border-color: #323536";
            aloneimage.style = "padding: 25px; background-color: #161616; border-style: ridge; border-color: #323536";
        } else if (frame == 'white_satin') {
            image.style = "padding: 15px; background-color: #161616; border-style: ridge; border-color: #ECEFE5";
            aloneimage.style = "padding: 25px; background-color: #161616; border-style: ridge; border-color: #ECEFE5";
        } else if (frame == 'walnut') {
            image.style = "padding: 15px; background-color: #161616; border-style: ridge; border-color: #6C3F19";
            aloneimage.style = "padding: 25px; background-color: #161616; border-style: ridge; border-color: #6C3F19";
        } else if (frame == 'oak') {
            image.style = "padding: 15px; background-color: #161616; border-style: ridge; border-color: #734432";
            aloneimage.style = "padding: 25px; background-color: #161616; border-style: ridge; border-color: #734432";
        } else if (frame == 'black_aluminium') {
            image.style = "padding: 15px; background-color: #161616; border-style: ridge; border-color: #343B3E";
            aloneimage.style = "padding: 25px; background-color: #161616; border-style: ridge; border-color: #343B3E";
        } else if (frame == 'white_wood') {
            image.style = "padding: 15px; background-color: #161616; border-style: ridge; border-color: #FFF8DC";
            aloneimage.style = "padding: 25px; background-color: #161616; border-style: ridge; border-color: #FFF8DC";
        } else if (frame == 'mahogany') {
            image.style = "padding: 15px; background-color: #161616; border-style: ridge; border-color: #8D2F00";
            aloneimage.style = "padding: 25px; background-color: #161616; border-style: ridge; border-color: #8D2F00";
        } else if (frame == 'brushed_aluminium') {
            image.style = "padding: 15px; background-color: #161616; border-style: ridge; border-color: #cbc4c1";
            aloneimage.style = "padding: 25px; background-color: #161616; border-style: ridge; border-color: #cbc4c1";
        } else {
            image.style = "padding: 15px; background-color: #161616; border-style: none; border-image:none";
            aloneimage.style = "padding: 25px; background-color: #161616; border-style: none; border-image:none";
        }
    } else if (objet.finition == "pp_white") {
        image.style = "padding: 15px; background-color: #f4f4f4; border-style: none; border-image:none";
        aloneimage.style = "padding: 25px; background-color: #f4f4f4; border-style: none; border-image:none";
        if (frame == 'black_satin') {
            image.style = "padding: 15px; background-color: #f4f4f4; border-style: ridge; border-color: #323536";
            aloneimage.style = "padding: 25px; background-color: #f4f4f4; border-style: ridge; border-color: #323536";
        } else if (frame == 'white_satin') {
            image.style = "padding: 15px; background-color: #f4f4f4; border-style: ridge; border-color: #ECEFE5";
            aloneimage.style = "padding: 25px; background-color: #f4f4f4; border-style: ridge; border-color: #ECEFE5";
        } else if (frame == 'walnut') {
            image.style = "padding: 15px; background-color: #f4f4f4; border-style: ridge; border-color: #6C3F19";
            aloneimage.style = "padding: 25px; background-color: #f4f4f4; border-style: ridge; border-color: #6C3F19";
        } else if (frame == 'oak') {
            image.style = "padding: 15px; background-color: #f4f4f4; border-style: ridge; border-color: #734432";
            aloneimage.style = "padding: 25px; background-color: #f4f4f4; border-style: ridge; border-color: #734432";
        } else if (frame == 'black_aluminium') {
            image.style = "padding: 15px; background-color: #f4f4f4; border-style: ridge; border-color: #343B3E";
            aloneimage.style = "padding: 25px; background-color: #f4f4f4; border-style: ridge; border-color: #343B3E";
        } else if (frame == 'white_wood') {
            image.style = "padding: 15px; background-color: #f4f4f4; border-style: ridge; border-color: #FFF8DC";
            aloneimage.style = "padding: 25px; background-color: #f4f4f4; border-style: ridge; border-color: #FFF8DC";
        } else if (frame == 'mahogany') {
            image.style = "padding: 15px; background-color: #f4f4f4; border-style: ridge; border-color: #8D2F00";
            aloneimage.style = "padding: 25px; background-color: #f4f4f4; border-style: ridge; border-color: #8D2F00";
        } else if (frame == 'brushed_aluminium') {
            image.style = "padding: 15px; background-color: #f4f4f4; border-style: ridge; border-color: #cbc4c1";
            aloneimage.style = "padding: 25px; background-color: #f4f4f4; border-style: ridge; border-color: #cbc4c1";
        } else {
            image.style = "padding: 15px; background-color: #f4f4f4; border-style: none; border-image:none";
            aloneimage.style = "padding: 25px; background-color: #f4f4f4; border-style: none; border-image:none";
        }
    } else {
        image.style = "border-style: none; border-image:none";
        aloneimage.style = "border-style: none; border-image:none";
        if (frame == 'black_satin') {
            image.style = "border-style: ridge; border-color: #323536";
            aloneimage.style = "border-style: ridge; border-color: #323536";
        } else if (frame == 'white_satin') {
            image.style = "border-style: ridge; border-color: #ECEFE5";
            aloneimage.style = "border-style: ridge; border-color: #ECEFE5";
        } else if (frame == 'walnut') {
            image.style = "border-style: ridge; border-color: #6C3F19";
            aloneimage.style = "border-style: ridge; border-color: #6C3F19";
        } else if (frame == 'oak') {
            image.style = "border-style: ridge; border-color: #734432";
            aloneimage.style = "border-style: ridge; border-color: #734432";
        } else if (frame == 'black_aluminium') {
            image.style = "border-style: ridge; border-color: #343B3E";
            aloneimage.style = "border-style: ridge; border-color: #343B3E";
        } else if (frame == 'white_wood') {
            image.style = "border-style: ridge; border-color: #FFF8DC";
            aloneimage.style = "border-style: ridge; border-color: #FFF8DC";
        } else if (frame == 'mahogany') {
            image.style = "border-style: ridge; border-color: #8D2F00";
            aloneimage.style = "border-style: ridge; border-color: #8D2F00";
        } else if (frame == 'brushed_aluminium') {
            image.style = "border-style: ridge; border-color: #cbc4c1";
            aloneimage.style = "border-style: ridge; border-color: #cbc4c1";
        } else {
            image.style = "border-style: none; border-image:none";
            aloneimage.style = "border-style: none; border-image:none";
        }
    }
}

function stepBack(objet) {
    step1.addEventListener('click', e => {
        console.log('stepback 1');
        objet.format = '';
        objet.finition = '';
        objet.frame = '';
        objet.price.formatprice = 0;
        objet.price.finitionprice = 0;
        objet.price.frameprice = 0;
        //si l'utilisateur revient en arrière après le choix de la finition ou du cadre, "réinitialisation" du style appliqué à l'image (seule ou présentée dans le salon)
        image.style = "border-style: none";
        aloneimage.style = "border-style: none";
        image.style = 'padding: 0; background-color: none';
        aloneimage.style = 'padding: 0; background-color: none';
        //remplacement du prix précédemment affiché
        total.innerHTML = '';
        //renvoie vers la fonction getChoice qui permet d'afficher les div de choix selon l'étape
        getChoice(objet);
    });

    step2.addEventListener('click', e => {
        console.log('stepback 2');
        objet.finition = '';
        objet.frame = '';
        objet.price.finitionprice = 0;
        objet.price.frameprice = 0;
        //si l'utilisateur revient en arrière après le choix de la finition ou du cadre, "réinitialisation" du style appliqué à l'image (seule ou présentée dans le salon)
        image.style = "border-style: none";
        aloneimage.style = "border-style: none";
        image.style = 'padding: 0; background-color: none';
        aloneimage.style = 'padding: 0; background-color: none';
        //remplacement du prix précédemment affiché
        total.innerHTML = 'Prix : ' + objet.price.formatprice + '€';
        //renvoie vers la fonction getChoice qui permet d'afficher les div de choix selon l'étape
        getChoice(objet);
    });
}
stepBack(parcours);




