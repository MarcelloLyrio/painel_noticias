<?php
ob_implicit_flush(TRUE);
$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if($sock){
    socket_bind($sock, '127.0.0.1', 88);
    socket_listen($sock);
    $conn = FALSE;
    switch (@socket_select($r=array($sock), $w=array($sock), $e=array($sock), 30)){
        case 2:
            echo 'Conexao estabelecida!';
            break;
        case 1:
            $conn = @socket_accept($sock);
            break;
        default:
            echo 'Tempo limite excedido!';
            break;
    }

    if($conn != FALSE){
        echo 'Conexao ok!';
        $flgS1 = 1;
        do{
            socket_listen($sock);
            $buf = @socket_read(socket_accept($sock), 1024, PHP_BINARY_READ);
            echo "Pacote de dados numero".$flgS1."</br>";
            var_dump($buf);
            flush();
            ob_flush();
            $flgS1++;
            } while($flgS1 < 5);
    }
    socket_close($sock);
}else{
    echo 'Socket nao criado!';
}


