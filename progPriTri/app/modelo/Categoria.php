<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 02/03/18
 * Time: 08:50
 *
 * Classe que representa a entidade categoria
 */


//http://webdevacademy.com.br/tutoriais/crud-bootstrap-php-mysql/


class Categoria
{
    private $id;
    private $nome;
    private $descricao;

    public function __construct($id = null, $nome, $descricao)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


}