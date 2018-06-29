/**
 * Created by Marcello Lyrio on 13/02/2018.
 */

window.onload = function() {

    var btnFechar = document.getElementById('close');
    var listaMensagem = document.getElementById('mensagens');
    var form = document.getElementById('mensagem-formulario');
    var mensagemTexto = document.getElementById('mensagem');


    // Criando uma nova WebSocket.
    var socket = new WebSocket('ws://echo.websocket.org');

    // segurando os erros que ocorrerem.
    socket.onerror = function(error) {
        console.log('erros do WebSocket: ' + error);
    };

    // Mostrando a mensagem de Conectado quando o WebSocket for aberto.
    socket.onopen= function(error) {
        console.log('conectado!');
    };

    form.onsubmit = function(e) {
        e.preventDefault();

        // Recuperando a mensagem do textarea.
        var mensagem = mensagemTexto.value;

       // var mensagem = 'testando envio de mensagem pelo socket 2';

        socket.send(mensagem);


    // Limpando o campo de mensagem.
        mensagemTexto.value = '';
        return false;
    };


    // Pegando as mensagens enviadas pelo servidor.
    socket.onmessage = function(event) {
        var mensagem = event.data;
        listaMensagem.innerHTML += '<li class="recebida"><span>Recebida pelo socket:</span>' + mensagem + '</li>';
        console.log(mensagem);
    };



    //Fechando a conexão WebSocket quando o botão for clicado.
    btnFechar.onclick = function(e) {
        e.preventDefault();

        // Fechando o WebSocket.
        socket.close();
        console.log('Disconectado!');
        return false;
    };
};