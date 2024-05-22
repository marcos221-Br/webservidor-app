<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model {
    use HasFactory;
    private int $id;
    private string $nome;
    private string $oab;
    private string $senha;

    public function __construct($oab,$senha) {
        $this->oab = $oab;
        $this->senha = $senha;
    }
    
    public function getNome(): string {
        return $this->nome;
    }

    public function setNome($nome): void {
        $this->nome = $nome;
    }

    public function getOab(): string {
        return $this->oab;
    }

    public function setOab($oab): void {
        $this->oab = $oab;
    }

    public function setSenha($senha): void {
        $this->senha = $senha;
    }

    public function getId(): int {
        return $this->id; 
    }

    public function getSenha(): String{
        return $this->senha;
    }

    public function buscarUsuario():bool {
    //     require ('../../database/Conexao.php');

    //     $select = "SELECT * FROM usuario WHERE oab = '$this->oab'";

    //     /** @var 'database/Conexao.php' $bd */
    //     $result = mysqli_query($bd, $select);

    //     if(mysqli_num_rows($result) > 0) {
    //         $row = mysqli_fetch_array($result);

    //         if($row['oab'] == $this->oab && $row['senha'] == $this->senha) {
    //             $this->id = $row['idusuario'];
    //             $this->nome = $row['nome'];
    //             $this->oab = $row['oab'];
    //             $this->senha = $row['senha'];
    //             return true;
    //         }
    //     }
        if($this->oab == '999' && $this->senha == 'admin'){
            return true;
        }
        return false;
    }

    // public function atualizarUsuario() { 
    //     require ('../../database/Conexao.php');
    //     $sql = "UPDATE usuario SET senha = '$this->senha', nome = '$this->nome' WHERE idusuario = '$this->id'";
    //     /** @var 'database/Conexao.php' $bd */
    //     mysqli_query($bd, $sql);
    // }    
}
