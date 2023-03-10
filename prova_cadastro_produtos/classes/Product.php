<?php



class Product extends Conn
{
    public object $conn;
    public array $formData;
    public int $id;

    public function list() :array
    {
        $this->conn = $this->connectDb();
        $query_usarios = "SELECT id, descricao, quantidade, valor FROM produtos ORDER BY id DESC LIMIT 40";        
        //prepara a query e atribui para uma variavel $result_usuarios
        $result_usuarios = $this->conn->prepare($query_usarios);

        //depois da query preparada podemos executá-la 
        $result_usuarios->execute();

        //após executar podemos ler o valor com o fetchAll() e depois de ler atribuir para uma variável e ler ela com um var_dump()
        $retorno = $result_usuarios->fetchAll();
         
         return $retorno;
    
    }

    public function createProduct(): bool
    {
        $this->conn = $this->connectDb();
        $query_user = "INSERT INTO produtos (descricao, quantidade, valor) VALUES (:descricao, :quantidade, :valor)";
        $add_user = $this->conn->prepare($query_user);

        $add_user->bindParam(':descricao', $this->formData['descricao']);
        $add_user->bindParam(':quantidade', $this->formData['quantidade']);
        $add_user->bindParam(':valor', $this->formData['valor']);
        
        $add_user->execute();

        if ($add_user->rowCount()) {
            return true;
        } else {
            return false;
        }
    }
}    