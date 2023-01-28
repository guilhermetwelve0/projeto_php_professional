<?php

function execute(bool $isFetchAll = true, bool $rowCount = false)
{
    global $query;

    // dd($query);

    try {
        $connect = connect();

        if (!isset($query['sql'])) {
            throw new Exception("Precisa ter o sql para executar a query");
        }

        // dd($query);

        $prepare = $connect->prepare($query['sql']);
        $prepare->execute($query['execute'] ?? []);

        if ($rowCount) {
            $query['count'] = $prepare->rowCount();
            return $query['count'];
        }

        if ($isFetchAll) {
            return (object)[
                'count' => $query['count'] ?? $prepare->rowCount(),
                'rows' => $prepare->fetchAll()
            ];
        }

        return $prepare->fetch();
    } catch (Exception $e) {
        // $message = "Erro no arquivo {$e->getFile()} na linha {$e->getLine()} com a mensagem: {$e->getMessage()}";
        // $message.= $query['sql'];
        $error = [
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'message' => $e->getMessage(),
            'sql' => $query['sql'],
        ];

        ddd($error);
    }
}

//como resolver esse eero array:4 [▼
//   "file" => "C:\Users\guilh\Desktop\pastas_cursos\projeto_php_professional\app\database\query-builder\execute.php"
//   "line" => 19
//   "message" => "SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens"
//   "sql" => "select * from users where email = :email and , != :,"
// ]