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
                console.log(parcours.format);
            }
            if (choosendiv.dataset.type == 'finition') {
                parcours.finition = choosendiv.dataset[event.currentTarget.dataset['type']];
                console.log(parcours.finition);
            }
            if (choosendiv.dataset.type == 'frame') {
                parcours.frame = choosendiv.dataset[event.currentTarget.dataset['type']];
                mockupFrame(parcours.frame)
                console.log(parcours.frame);
            }

            choosendiv.style = "border : solid 2px #aca06c";
            if (parcours.format !== '' && parcours.finition !== '' && parcours.frame !== '') {
                nextbutton.hidden = true;
                priceFrame(parcours.price.finitionprice, parcours.frame, parcours);
                document.querySelector('#formbutton').hidden = false;
                console.log(parcours);
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
        document.querySelector('.div-format').style = 'display : none';
        document.querySelector('.div-finition').style = 'display : block';
        step2.style = 'color : black';
        step1.addEventListener('click', e => {
            objet.format == '';
        })

        if (objet.format == 'classique') {
            document.querySelector('.finition-choice-1').style = 'display : none';
        } else {
            document.querySelector('.finition-choice-2').style = 'display : none';
        }

        priceFormat(price, objet.format, parcours);
    }
    else if (objet.format !== '' && objet.finition !== '' && objet.frame == '') {
        document.querySelector('.div-finition').style = 'display : none';
        document.querySelector('.div-frame').style = 'display : block';
        step3.style = 'color : black';

        if (objet.finition == 'paper_draw') {
            document.querySelector('.frame-choice-1').style = 'display : none';
            document.querySelector('.frame-choice-2').style = 'display : none';
        } else if (objet.finition == 'aluminium' || objet.format == 'acrylic') {
            document.querySelector('.frame-choice-2').style = 'display : none';
            document.querySelector('.frame-choice-3').style = 'display : none';
        } else {
            document.querySelector('.frame-choice-1').style = 'display : none';
            document.querySelector('.frame-choice-3').style = 'display : none';
        }
        priceFinition(parcours.price.formatprice, parcours.finition, parcours);
    }
    else {
        document.querySelector('.div-format').style = 'display : block';
        document.querySelector('.div-finition').style = 'display : none';
        document.querySelector('.div-frame').style = 'display : none';
        step2.style = 'color : grey';
        step3.style = 'color : grey';
    }

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
    if ((finition == 'pp_black') || (finition == 'paper_draw')) {
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
    objet.price.finitionprice = (prixdelafinition).toFixed(2);
    document.form.finition.value = objet.finition;
    document.form.finitionprice.value = objet.price.finitionprice;
    total.innerHTML = 'Prix après choix de la finition ' + finition + ' : ' + (prixdelafinition).toFixed(2) + '€';
}

function priceFrame(prixdelafinition, frame, objet) {
    let prixtotal = 0;
    if ((frame == 'none') || (frame == 'black_aluminium') || (frame == 'white_wood') || (frame == 'mahogany') || (frame == 'brushed_aluminium')) {
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
        image.className='';
        if (format == 'classique') {
            image.classList.add('porclassique');
        } else if (format == 'grand') {
            image.classList.add('porgrand');
        } else if (format == 'geant') {
            image.classList.add('porgeant');
        } else if (format == 'collector') {
            image.classList.add('porcollector');
        }
    } else if (orientation == 'paysage') {
        image.className='';
        if (format == 'classique') {
            image.classList.add('payclassique');
        } else if (format == 'grand') {
            image.classList.add('paygrand');
        } else if (format == 'geant') {
            image.classList.add('paygeant');
        } else if (format == 'collector') {
            image.classList.add('paycollector');
        }
    }
}

function mockupFrame(frame){
    image.style="border-style: none; border-image:none";
 if(frame == 'black_satin'){
    image.style="border-style: solid; border-image:url(https://storage.googleapis.com/yk-cdn/images/pic-presentation/textures/BLACK_SATIN.png) 100 100 80 / 4.48152px / 0 stretch";
 }else if(frame == 'white_satin'){
    image.style="border-style: solid; border-image:url(https://storage.googleapis.com/yk-cdn/images/pic-presentation/textures/WHITE_SATIN.png) 100 100 80 / 4.48152px / 0 stretch";
 }else if(frame == 'walnut'){
    image.style="border-style: solid; border-image:url(https://storage.googleapis.com/yk-cdn/images/pic-presentation/textures/WALNUT.png) 100 100 80 / 4.48152px / 0 stretch";
 }else if(frame == 'oak'){
    image.style="border-style: solid; border-image:url(https://storage.googleapis.com/yk-cdn/images/pic-presentation/textures/OAK.png) 100 100 80 / 4.48152px / 0 stretch";
 }else if(frame == 'black_aluminium'){
    image.style="border-style: solid; border-color: rgb(11, 10, 10)";
 }else if(frame == 'white_wood'){
    image.style="border-style: solid; border-color: rgb(250, 248, 251)";
 }else if(frame == 'mahogany'){
    image.style="border-style: solid; border-color: rgb(72, 31, 26)";
 }else if(frame == 'brushed_aluminium'){
    image.style="border-style: solid; border-color: rgb(167, 167, 167)";
 }else{
    image.style="border-style: none; border-image:none";     
 }
}