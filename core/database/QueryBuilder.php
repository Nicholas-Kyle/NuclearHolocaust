<?php

class QueryBuilder {

    protected $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function selectAll($table){
    
        $statement = $this->pdo->prepare("select * from {$table}");
    
        $statement->execute();
    
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function addTask($table, $task){

        $sql = "insert into todos(description, completed) values(:description, :completed)";

        $statement = $this->pdo->prepare($sql);
        
        var_dump($task);
        var_dump($statement);

        $statement->execute($task);
    }

}