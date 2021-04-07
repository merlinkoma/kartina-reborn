let choosenformat = '';
console.log('1:' + choosenformat);

function pAchat() {
    let formats = document.querySelectorAll('.format-list');
    for (let format of formats) {
        format.addEventListener('click', e => {
            for (let format2 of formats) {
                format2.style = "border : solid 1px #687079;";
            }
            format.style = "border: 2px solid #aca06c";
            choosenformat = format.dataset.format;
            console.log('2:' + choosenformat);
            
        });
    }
    return choosenformat;
}
console.log('3:' + choosenformat);
console.log(pAchat());