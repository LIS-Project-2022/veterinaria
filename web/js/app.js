//DECLARACION DE CONSTANTES
const buttonMenu = document.getElementById('btnMenu');
const container = document.getElementById('contenedor');

//DECLARACION DE VARS
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))

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

//PARA HACER FUNCIONAR LOS TOOLTIPS
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})