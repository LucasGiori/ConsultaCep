function typeWrite(elemento){
    const textoArray = document.getElementById('efeitomaquina').value.split('');
    elemento.innerHTML = ' ';
    textoArray.forEach(function(letra, i){   
      
    setTimeout(function(){
        elemento.innerHTML += letra;
    }, 75 * i)

  });
}



