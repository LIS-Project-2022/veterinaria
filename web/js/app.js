//DECLARACION DE CONSTANTES
const buttonMenu = document.getElementById('btnMenu');
const container = document.getElementById('contenedor')
const pacienteInput = document.getElementById('paciente');
const propietarioInput = document.getElementById('propietario');

//DECLARACION DE VARS
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));

//EVENTLISTENERS
buttonMenu.addEventListener('click', toggleBody);

if(pacienteInput !== null)
{
    $('#paciente').select2({
        theme: 'bootstrap4',
        width: 'style',
        templateSelection: setSelect
    });
}

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

function setSelect(state)
{
    getPropietario(state.id);
    return state.text;
}

async function getPropietario(id_animal)
{
    await fetch(`http://localhost/veterinaria/app/controllers/consultas/getPropietario_controller.php?id=${id_animal}`)
        .then( response => response.json())
        .then( data => {
            if(data.length > 0)
            {
                console.log(data);
                propietarioInput.value =  `${data[0].nombres} ${data[0].apellidos}` 
            }
        });
}