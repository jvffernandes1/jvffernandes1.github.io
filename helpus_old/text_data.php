<?php


	function gravar($texto){
    //Variável arquivo armazena o nome e extensão do arquivo.
    $arquivo = "stats.txt";
     
    //Variável $fp armazena a conexão com o arquivo e o tipo de ação.
    $fp = fopen($arquivo, "w+");
 
    //Escreve no arquivo aberto.
    fwrite($fp, $texto);
     
    //Fecha o arquivo.
    fclose($fp);
	}

	function ler(){
    //Variável arquivo armazena o nome e extensão do arquivo.
    $arquivo = "stats.txt";
     
    //Variável $fp armazena a conexão com o arquivo e o tipo de ação.
    $fp = fopen($arquivo, "r");
 
    //Lê o conteúdo do arquivo aberto.
    $conteudo = fgets($fp);
     
    //Fecha o arquivo.
    fclose($fp);
     
    //retorna o conteúdo.
    return $conteudo;
}
	
?>