let operatorCalc = [];
let operators = [];
let operador_ = "";
let result = 0;
let results = [];

// validaciones
let cantClick = 0;
let valClick = false;

document.addEventListener("DOMContentLoaded", function () {
  leerBotones();
});

function leerBotones() {
  let elemento;

  const buttons = document.querySelectorAll(".button-calc");
  buttons.forEach((button) => {
    button.addEventListener("click", function (e) {
      if (e.target.tagName == "FONT") {
        elemento = e.target.parentElement.parentElement;
      } else if (e.target.tagName == "BUTTON") {
        elemento = e.target;
      }

      let value = elemento.value;
      let operador = "";

      if (isNaN(value)) {
        operacion = elemento.value;
        operador = "";
        operaciones(operacion);
        return;
      }

      let contatenarNumeros = `${value}`;

      operatorCalc = [...operatorCalc, contatenarNumeros];

      operatorCalc.toString();

      operatorCalc.forEach((numeros) => {
        operador += `${numeros}`;
      });

      const resultOperator = document.querySelector(".operator-result");
      operador_ = operador;

      resultOperator.textContent = operador;
    });
  });
}

function operaciones(operacion) {
  //señalarle al usuario que esta haciendo una operacion

  const operator = document.querySelector(".operator-");
  const numOperator = document.querySelector(".operator-num");

  operator.style.visibility = "visible";
  operator.textContent = operacion;

  numOperator.style.visibility = "visible";
  numOperator.textContent = operador_;

  //reseteando los operadores para encontrar la segunda variable
  operatorCalc = [];

  // obtener la operacion que el usuario quiere realizar

  eventsButtonsOperator(operacion);
}

function eventsButtonsOperator(operacion) {
  if (operacion == "+") {
    console.log("quiero sumar");

    let intNum = parseInt(operador_);

    if (cantClick == 0) {
      operators = [...operators, intNum];
      cantClick++;
    } else if (cantClick == 1) {
      console.log(valClick);
      if (valClick) {
        console.log("tienes que entrar aqui");
        const numOperator = document.querySelector(".operator-num");
        numOperator.textContent = result;

        valClick = false;
        return;
      }

      operators = [...operators, intNum];
      SumSucesivas();
    }

    console.log("operators desde + ", operators);

    const button_igual = document.querySelector(".button_igual");

    // detectar si el usuario quiere sumar despues de obtener un resultado

    //click en el boton igual es por que quiere obtener la suma
    button_igual.addEventListener("click", sumarNums);
  }
  if (operacion == "X") {
    console.log(operators);

    operators = [];

    const operator = document.querySelector(".operator-");
    const numOperator = document.querySelector(".operator-num");

    operator.style.visibility = "hidden";

    numOperator.style.visibility = "hidden";

    const resultOperator = document.querySelector(".operator-result");
    resultOperator.textContent = 0;

    console.log(operators);

    cantClick = 0;
    valClick = false;
  }
}

function sumarNums() {
  // suma dos numeros
  let intNum = parseInt(operador_);
  operators = [...operators, intNum];

  console.log(operators);
  result = operators[0] + operators[1];

  const resultOperator = document.querySelector(".operator-result");
  resultOperator.textContent = result;

  const numOperator = document.querySelector(".operator-num");
  numOperator.textContent = operators[0] + "+" + operators[1];
  valClick = true;

  //sumar mas de dos numeros iguales
  if (operators.length > 2) {
    let resultTemp = 0;

    operators.forEach((operator) => {
      resultTemp += operator;
    });

    const numOperator = document.querySelector(".operator-num");
    numOperator.textContent = resultTemp + "+" + operators[2];

    const resultOperator = document.querySelector(".operator-result");
    resultOperator.textContent = resultTemp;
    result = resultTemp;
    valClick = false;
  }
}

function SumSucesivas() {
  let resultTempSus = 0;
  operators.forEach((operator) => {
    resultTempSus += operator;
    console.log(resultTempSus);
  });

  const numOperator = document.querySelector(".operator-num");
  numOperator.textContent = resultTempSus + "+";

  const resultOperator = document.querySelector(".operator-result");
  resultOperator.textContent = resultTempSus;
  result = resultTempSus;
}
