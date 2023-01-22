<?php

function create(string $table, array $data)
{
    try {
        if(!arrayIsAssociative($data)){
            throw new Exception('O array tem que ser associativo');
        }
        //insert into users(firstName, lastName, email, password) values(:firstName, :lastName, :email, :password);
        $connect = connect();
        $sql = "insert into {$table}(";
        $sql .= implode(",", array_keys($data)) . ") values(";
        $sql .= ':' . implode(",:", array_keys($data)) . ")";
        $prepare = $connect->prepare($sql);
        return $prepare->execute($data);
    } catch (PDOException $e) {
        var_dump($e->getMessage());
    }
}

//nessa função preciso que seja criado um usuario contudo não estou conseguindo oque fazer
