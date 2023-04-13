function choix(index_select) {
    const s1 = document.getElementById('select' + index_select);
    const s2 = document.getElementById(index_select === '1' ? 'select2' : 'select1');
    let opt1 = s1.options[s1.selectedIndex].value;
    
    for (let i = 0;i < s1.options.length; i++) {
        if (opt1 === s2.options[i].value) {
            s2.options[i].disabled = true;
        } else {
            s2.options[i].disabled = false;
        }
    }
}


document.querySelector('#attaque').addEventListener('submit', function(event){
    event.preventDefault();
    
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'gameplay.php');
    xhr.setRequestHeader('content-type','application/json');
    
    xhr.onload = () => {
        const response = xhr.responseText;
        console.log(response);
    }
    xhr.send();

});
