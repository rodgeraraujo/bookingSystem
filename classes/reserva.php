<?php

class Reserva
{
    // table name definition and database connection
    public $db_conn;
    public $table_name = "reserva";

    // object properties
    private $id;
    private $nome;
    private $email;
    private $cpf;

    public function __construct($db)
    {
        $this->db_conn = $db;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome): void
    {
        $this->nome = $nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf): void
    {
        $this->cpf = $cpf;
    }

    function create()
    {
        //write query
        $sql = "INSERT INTO " . $this->table_name . " SET nome = ?, email = ?, cpf = ?";

        $prep_state = $this->db_conn->prepare($sql);

        $prep_state->bindParam(1, $this->nome);
        $prep_state->bindParam(2, $this->email);
        $prep_state->bindParam(3, $this->cpf);

        if ($prep_state->execute()) {
            return true;
        } else {
            return false;
        }

    }
}
