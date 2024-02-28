//Formulario
const form = document.querySelector("#form")
const campo1 = document.querySelector("#campo1") /* genero*/
const campo2 = document.querySelector("#campo2") /* nome*/
const campo3 = document.querySelector("#campo3") /* Cfp*/
const campo4 = document.querySelector("#campo4") /* telefone*/
const campo5 = document.querySelector("#campo5") /* Observacao*/

function validarNumero(event) {
    var charCode = event.which ? event.which : event.keyCode;
    var codigoTecla = event.keyCode;


    if ((codigoTecla >= 48 && codigoTecla <= 57) || codigoTecla == 8 || codigoTecla == 45 || charCode == 44 || charCode == 46) {
        
        
        return true;
    } else {
        return false;
    }
}

    /* Cadastro de Revisao  */

    let selectProprietario = document.getElementById('campo1');
    

    selectProprietario.onchange = function () {
        let selectVeiculo = document.getElementById('campo2');
        fetch("get_veiculos.php?propietario_cpf")
        selectVeiculo.innerHTML =  ;
    }

