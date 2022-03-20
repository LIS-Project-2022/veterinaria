//DECLARACION DE CONSTANTES
const buttonMenu = document.getElementById('btnMenu');
const container = document.getElementById('contenedor');

//EVENTLISTENERS
buttonMenu.addEventListener('click', toggleBody);

//FUNCTIONS
function toggleBody()
{
    // console.log(container.classList);
    if(container.classList.contains('active'))
    {
        container.classList.remove('active');
    }
    else
    {
        container.classList.add('active');
    }

    
    
}