<?php



class Algoritmo
{
    
    public array $frase;

    public function encontrarMaiorMenorPalavra($frase)
    {
        //usando explode para separar a variavel frase em novo item do array cada vez que um espaço em branco aparecer e declarando este array novo a variável $palavras
        $palavras = explode(" ", $frase);
        //definindo a primeira palavra da frase como maior e menor
        $maior = $palavras[0];
        $menor = $palavras[0];
    

        
        foreach ($palavras as $palavra) {
            //compara a palavra atual com a maior palavra atualmente, se for maior, passa a ser a maior palavra.
            if (strlen($palavra) > strlen($maior)) {
                $maior = $palavra;
            }
            //compara a palavra atual com a menor palavra atualmente, se for menor, passa a ser a menor palavra.
            if (strlen($palavra) < strlen($menor)) {
                $menor = $palavra;
            }
        }
    
        //retorna um array com as duas palavras encontradas.
        return array("maior" => $maior, "menor" => $menor);
    }


}    