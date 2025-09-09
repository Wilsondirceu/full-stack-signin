document.getElementById("bt").addEventListener(
    'click', function(){
        login();
    }
);

// criar uma função assincrona de cominicação Front/Back
// para isso eu começo a minha função utilizando o ASYNC.
async function login(){// <-- criando a função.
    const fd = new FormData();// <-- criando objeto "fd" da classe FormData.
    // o comando append, adiciona ao obj fd um novo atributo.
    // a sintaxe é: objeto.append('atributo',valor);
    fd.append('login',document.getElementById('login').value);
    fd.append('senha', document.getElementById('senha').value); 

    const retorno = await fetch('back.php',//informando a URL 'back.php'
        { // abri a inicialização do FETCH -- cabeçalho 
            method: 'post', // o envio da informação sera por POST.
            body: fd // será o obj 'fd' da classe FormData
        }); // fechei a inicialização do FETCH -- cabeçalho
    const resposta = await retorno.json();
    document.getElementById("retorno_back").innerHTML =resposta.mensagem;
    console.log(resposta);
}