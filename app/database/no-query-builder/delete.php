<?php

function delete(string $table, array $where)
{
    if (!arrayIsAssociative($where)) {
        throw new Exception("O array te que ser associativo no delete");
    }

    $connect = connect();

    $whereField = array_keys($where);

    $sql = "delete from {$table} where";
    $sql .= " {$whereField[0]} = :{$whereField[0]}";
    $prepare = $connect->prepare($sql);
    $prepare->execute($where);
    return $prepare->rowCount();
}

//crie na view home a opção para deletar um usuário
