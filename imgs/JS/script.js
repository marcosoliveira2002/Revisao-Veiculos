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

let selectProprietario = document.getElementById('proprietarioRevisao');


selectProprietario.onchange = function () {
    // console.log('...', document.getElementById('campo2').value)
    let selectVeiculo = document.getElementById('proprietarioRevisao');
    let valor = selectVeiculo.value;
    //        console.log('valor',valor);
    fetch("get-veiculos.php?proprietario_cpf=" + valor)
        .then(response => {
            return response.text();
        })
        .then(texto => {
            //console.log(texto)
            document.getElementById('veiculoPropietario').innerHTML = texto;
        });

}


function ValidaCPF() {   
    var cpf = document.getElementById('cpfProprietario').value;
    var cpfValido = /^(\d{3}\s?\d{3}\s?\d{3}\s?\d{2})$/;

    if (!cpfValido.test(cpf)) {  
        // CPF inválido
        document.getElementById("cpfProprietario").value = "CPF Inválido";
    }
}

function formatarCPF() {
    var cpf = document.getElementById('cpfProprietario');
    var valor = cpf.value.replace(/\D/g, '');

    if (valor.length > 0) {
        valor = valor.replace(/(\d{3})(\d)/, '$1-$2');
        valor = valor.replace(/(\d{3})(\d)/, '$1-$2');
        valor = valor.replace(/(\d{3})(\d{2})$/, '$1-$2');
    }

    cpf.value = valor;
}