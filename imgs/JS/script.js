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


function validaCPF(cpfProprietario) {
    var Soma = 0
    var Resto
  
    var strCPF = String(cpfProprietario).replace(/[^\d]/g, '')
    
    if (strCPF.length !== 11)
       return false
    
    if ([
      '00000000000',
      '11111111111',
      '22222222222',
      '33333333333',
      '44444444444',
      '55555555555',
      '66666666666',
      '77777777777',
      '88888888888',
      '99999999999',
      ].indexOf(strCPF) !== -1)
      return false
  
    for (i=1; i<=9; i++)
      Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
  
    Resto = (Soma * 10) % 11
  
    if ((Resto == 10) || (Resto == 11)) 
      Resto = 0
  
    if (Resto != parseInt(strCPF.substring(9, 10)) )
      return false
  
    Soma = 0
  
    for (i = 1; i <= 10; i++)
      Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i)
  
    Resto = (Soma * 10) % 11
  
    if ((Resto == 10) || (Resto == 11)) 
      Resto = 0
  
    if (Resto != parseInt(strCPF.substring(10, 11) ) )
      return false
  
    return true
  }
  function verificarCPF() {
    var cpfInput = document.getElementById("cpfProprietario");
    var cpf = cpfInput.value;

    if (validaCPF(cpf)) {
        alert("CPF válido!");
        document.getElementById("enviar").disabled = false;
    } else {
        alert("CPF inválido!");
        document.getElementById("enviar").disabled = true;
        document.getElementById("cpfProprietario").value = '';
    }
}


function formatarCPF() {
    var cpf = document.getElementById('cpfProprietario');
    var valor = cpf.value.replace(/\D/g, '');

    if (valor.length > 0) {
        valor = valor.replace(/(\d{3})(\d)/, '$1.$2');
        valor = valor.replace(/(\d{3})(\d)/, '$1.$2');
        valor = valor.replace(/(\d{3})(\d{2})$/, '$1-$2');
    }

    cpf.value = valor;

}


function formatarTelefone(){
  var telefone = document.getElementById('telefone');
  var valorTelefone = telefone.value.replace(/\D/g, '');
  if (valorTelefone.length > 0) {
    valorTelefone = '(' + valorTelefone.substring(0, 2) + ') ' +
    valorTelefone.substring(2, 7) + '-' +
     valorTelefone.substring(7, 11);
  
  }
  return telefone.value=valorTelefone;
}


function formatarMoeda(input) {
  // Obtém o valor do input e remove tudo que não é número
  var valor = input.value.replace(/\D/g, '');

  // Formata o valor como moeda brasileira
  valor = (parseFloat(valor) / 100).toLocaleString('pt-BR', {
      style: 'currency',
      currency: 'BRL'
  });

  input.value = valor;
}

  

