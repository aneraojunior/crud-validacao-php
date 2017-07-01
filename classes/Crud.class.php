<?php
class Crud extends Conexao
{
    private $query;

    private function prepExec($prep,$exec)
    {
        $this -> query = $this -> getConn() -> prepare($prep);
        $this -> query -> execute($exec);
    }

    public function insert($table,$prep,$exec)
    {
        $this -> prepExec('INSERT INTO '.$table.' SET '. $prep, $exec);
        return $this->query;
    }

    public function select($table,$campos,$prep,$exec)
    {
        $this -> prepExec('SELECT '. $campos .' FROM '.$table.' '. $prep .'', $exec);
        return $this->query;
    }

    public function update($table,$campos,$prep,$exec)
    {
        $this -> prepExec('UPDATE '.$table.' set '.$campos.' '.$prep.'', $exec);
        return $this->query;
    }

    public function delete($table,$prep,$exec)
    {
        $this -> prepExec('DELETE FROM '.$table.' WHERE '. $prep .' ', $exec);
        return $this -> query;
    }

    public function verificaInsert($crud)
    {
        if($crud->getConn()->lastInsertId() == true)
        {
            return true;
        }

        else
        {
            return false;
        }
    }
}