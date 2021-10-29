let valDarkMode = true;

document.addEventListener("DOMContentLoaded", function () {
  menuResponsive();
  formContact();
  darkMode();
  if(document.querySelector("#fecha") ){
    validarFechaAnterior()
  }

 
  console.log("desde app")

});

function menuResponsive() {
  const buttonNav = document.querySelector(".button_nav");
  buttonNav.addEventListener("click", function () {
    const navegacion = document.querySelector(".navegacion");

    setTimeout(() => {
      navegacion.classList.toggle("nav-responsive");
    }, 900);

    if (document.querySelector(".animate__animated")) {
      navegacion.classList.add("animate__zoomOut");

      setTimeout(() => {
        navegacion.classList.remove("animate__animated");
        navegacion.classList.remove("animate__zoomOut");
      }, 1000);
    } else {
      navegacion.classList.add("animate__animated", "animate__flipInX");
    }

    navegacion.style.setProperty("--animate-duration", "2s");

    navegacion.addEventListener("animationend", () => {
      navegacion.classList.remove("animate__flipInX");
    });
  });
}

function darkMode() {
  const darkMode = document.querySelector(".button-dark");

  darkMode.addEventListener("click", function () {
    document.body.classList.toggle("darkmode");

    if (valDarkMode) {
      valDarkMode = false;
      console.log(valDarkMode);
    } else {
      valDarkMode = true;
      console.log(valDarkMode);
    }
  });
}


function formContact(){

let inputEmail = document.querySelector('.email'); 
let inputTelefono = document.querySelector('.telefono'); 
let buttonRadio = document.querySelectorAll('input[name="contacto"]'); 

buttonRadio.forEach( radio =>{

  radio.addEventListener('click', function(e){

    
    if(e.target.value == "Correo"){
  
      inputEmail.style.display = "block"
      inputTelefono.style.display= "none"; 
        }else{

          inputEmail.style.display = "none"
          inputTelefono.style.display= "block"; 

    }

  })

})

}


function validarFechaAnterior() {

  let inputFecha = document.querySelector("#fecha");

  let fechaActual = new Date();

  let year = fechaActual.getUTCFullYear();
  let mes = fechaActual.getMonth() + 1;
  let dia = fechaActual.getDate();

  console.log(`${year}-0${mes}-0${dia}`);

  //FORMATO DESEADO AAAA-MM-DD

  inputFecha.min = `${year}-0${mes}-${dia}`;
}
