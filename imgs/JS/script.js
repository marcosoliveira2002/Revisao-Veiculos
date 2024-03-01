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
        .then( response => {
            return response.text();
        }) 
        .then(texto => {
           //console.log(texto)
           document.getElementById('veiculoPropietario').innerHTML = texto;
        });
        
    }


    let validaCpf = document.getElementById('cpfProprietario');
    validaCpf.onchange = function(cpf) {
        function cpf(v){
            v=v.replace(/\D/g,"")                    //Remove tudo o que não é dígito
            v=v.replace(/(\d{3})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto dígitos
            v=v.replace(/(\d{3})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto dígitos
                                                     //de novo (para o segundo bloco de números)
            v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2") //Coloca um hífen entre o terceiro e o quarto dígitos
            return v
        }
    }