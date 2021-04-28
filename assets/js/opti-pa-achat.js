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
    for (i = 0; i < divchoices.length; i++) {
        let choosendiv = divchoices[i];
        choosendiv.addEventListener('click', event => {

            for (let choosendiv2 of divchoices) {
                choosendiv2.style = "border : solid 1px #687079";
            };

            if (choosendiv.dataset.type == 'format') {
                parcours.format = choosendiv.dataset[event.currentTarget.dataset['type']];
                mockupFormat(image.dataset['orientation'], parcours.format);
            }
            if (choosendiv.dataset.type == 'finition') {
                parcours.finition = choosendiv.dataset[event.currentTarget.dataset['type']];
                if (parcours.finition == "pp_white" || parcours.finition == "pp_black") {
                    mockupFinition(parcours.finition);
                }
            }
            if (choosendiv.dataset.type == 'frame') {
                parcours.frame = choosendiv.dataset[event.currentTarget.dataset['type']];
                mockupFrame(parcours.frame, parcours)
            }
            choosendiv.style = "border : solid 2px #aca06c";
            if (parcours.format !== '' && parcours.finition !== '' && parcours.frame !== '') {
                nextbutton.hidden = true;
                priceFrame(parcours.price.finitionprice, parcours.frame, parcours);
                document.querySelector('#formbutton').hidden = false;
            }
            nextbutton.disabled = false;

        });
    }

    nextbutton.addEventListener('click', event => {
        getChoice(parcours);
    });
}

steps();

function getChoice(objet) {
    nextbutton.disabled = true;
    if (objet.format !== '' && objet.finition == '') {
        nextbutton.hidden = false;
        formbutton.hidden = true;
        document.querySelector('.div-format').style = 'display : none';
        document.querySelector('.div-finition').style = 'display : block';
        document.querySelector('.div-frame').style = 'display : none';
        step2.style = 'color : black';
        step3.style = 'color : grey';
        for (let choosendiv2 of divchoices) {
            choosendiv2.style = "border : solid 1px #687079";
        };

        if (objet.format == 'classique') {
            document.querySelector('.finition-choice-1').style = 'display : none';
            document.querySelector('.finition-choice-2').style = 'display : block';
        } else {
            document.querySelector('.finition-choice-1').style = 'display : block';
            document.querySelector('.finition-choice-2').style = 'display : none';
        }

        priceFormat(price, objet.format, parcours);
    }
    else if (objet.format !== '' && objet.finition !== '' && objet.frame == '') {
        nextbutton.hidden = false;
        formbutton.hidden = true;
        document.querySelector('.div-finition').style = 'display : none';
        document.querySelector('.div-frame').style = 'display : block';
        step3.style = 'color : black';

        if (objet.finition == 'paper_draw') {
            priceFinition(parcours.price.formatprice, parcours.finition, parcours);
        } else if (objet.finition == 'aluminium' || objet.format == 'acrylic') {
            document.querySelector('.frame-choice-1').style = 'display : block';
            document.querySelector('.frame-choice-2').style = 'display : none';
            document.querySelector('.frame-choice-3').style = 'display : none';
        } else {
            document.querySelector('.frame-choice-1').style = 'display : none';
            document.querySelector('.frame-choice-2').style = 'display : block';
            document.querySelector('.frame-choice-3').style = 'display : none';
        }
        priceFinition(parcours.price.formatprice, parcours.finition, parcours);
    }
    else {
        nextbutton.hidden = false;
        formbutton.hidden = true;
        document.querySelector('.div-format').style = 'display : block';
        document.querySelector('.div-finition').style = 'display : none';
        document.querySelector('.div-frame').style = 'display : none';
        step2.style = 'color : grey';
        step3.style = 'color : grey';
        for (let choosendiv2 of divchoices) {
            choosendiv2.style = "border : solid 1px #687079";
        };
    }
    summary(parcours);
}

function priceFormat(price, format, objet) {
    let prixduformat = 0;
    if (format == 'classique') {
        prixduformat = price * 1.3;
    } else if (format == 'grand') {
        prixduformat = price * 2.6;
    } else if (format == 'geant') {
        prixduformat = price * 5.2;
    } else if (format == 'collector') {
        prixduformat = price * 13;
    }
    objet.price.formatprice = prixduformat;
    document.form.format.value = objet.format;
    document.form.formatprice.value = objet.price.formatprice;
    total.innerHTML = 'Prix après choix du format ' + format + ' : ' + + prixduformat + '€';
}

function priceFinition(prixduformat, finition, objet) {
    let prixdelafinition = 0;
    if ((finition == 'pp_black')) {
        prixdelafinition = prixduformat;
    }
    else if ((finition == 'paper_draw')) {
        prixdelafinition = prixduformat;
        objet.price.finitionprice = (prixdelafinition).toFixed(2);
        document.form.finitionprice.value = objet.price.finitionprice;
        objet.frame = 'none';
        objet.price.frameprice = objet.price.finitionprice;
        steps();
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
    objet.price.finitionprice = (prixdelafinition).toFixed(2);
    document.form.finition.value = objet.finition;
    document.form.finitionprice.value = objet.price.finitionprice;
    total.innerHTML = 'Prix après choix de la finition ' + finition + ' : ' + (prixdelafinition).toFixed(2) + '€';
}

function priceFrame(prixdelafinition, frame, objet) {
    let prixtotal = 0;
    if ((frame == 'black_aluminium') || (frame == 'white_wood') || (frame == 'mahogany') || (frame == 'brushed_aluminium')) {
        prixtotal = prixdelafinition;
    }
    else if ((frame == 'white_satin') || (frame == 'black_satin') || (frame == 'walnut') || (frame == 'oak')) {
        prixtotal = (prixdelafinition * 1.45).toFixed(2);
    }
    objet.price.frameprice = prixtotal;
    document.form.frame.value = objet.frame;
    document.form.frameprice.value = objet.price.frameprice;
    total.innerHTML = 'Prix après choix du cadre ' + frame + ' : ' + prixtotal + '€';
}

function mockupFormat(orientation, format) {
    if (orientation == 'portrait') {
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
    if (finition == "pp_black") {
        image.style = "padding : 15px; background-color: #161616;";
        aloneimage.style = "padding : 30px; background-color: #161616;";
    } else if (finition == "pp_white") {
        image.style = "padding : 15px; background-color: #f4f4f4;";
        aloneimage.style = "padding : 30px; background-color: #f4f4f4;";
    }
}

function mockupFrame(frame, objet) {
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
        objet.format = '';
        objet.finition = '';
        objet.frame = '';
        objet.price.formatprice = 0;
        objet.price.finitionprice = 0;
        objet.price.frameprice = 0;
        getChoice(objet);
    });

    step2.addEventListener('click', e => {
        objet.finition = '';
        objet.frame = '';
        objet.price.finitionprice = 0;
        objet.price.frameprice = 0;
        getChoice(objet);
    });
}
stepBack(parcours);

function summary(objet) {
    console.log(objet);
    console.log('1');
    if (objet.format !== '') {
        if (objet.format == 'classique') {
            document.querySelector('#summary').innerHTML = 'Format classique';
            document.querySelector('#summaryprice').innerHTML = `${objet.price.formatprice}`;
        }
    }
}


