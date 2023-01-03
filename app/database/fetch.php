<?php
//query builder
$query = [];

function read(string $table, string $fields = '*')
{
    global $query;
    $query['read'] = true;
    $query['execute'] = [];
    $query['sql'] = "select {$fields} from {$table}";
}
function where(string $field, string $operator, string|int $value)
{
    global $query;
    if (!isset($query['read'])) {
        throw new Exception('Antes de chamar o where chame o read');
    }
    if (func_num_args() !== 3) {
        throw new Exception('o where precisa de exatamente 3 parâmetros');
    }
    $query['where'] = true;
    $query['execute'] = array_merge($query['execute'], [$field => $value]);
    $query['sql'] = "{$query['sql']} where {$field} {$operator} :{$field}";
}
function orwhere()
{
    global $query;
    if (!isset($query['where'])) {
        throw new Exception('Precisa executar o where antes do or where');
    }
    $query['sql'] = "{$query['sql']} or ";
}
function search()
{
}
function paginate()
{
}
function limit()
{
}
function order()
{
    global $query;
    $query['execute'] = array_merge($query['execute'], ['teste' => 45]);
}
function execute()
{
    global $query;
    $connect = connect();
    // $prepare = $connect->prepare($query['sql']);
    // $prepare->execute($query['execute'] ?? []);
    dd($query);
    return $prepare->fetchAll();
}

//query completa
function all($table, $fields = '*')
{
    try {
        $connect = connect();

        $query = $connect->query("select {$fields} from {$table}");
        return $query->fetchAll();
    } catch (PDOException $e) {
        var_dump($e->getMessage());
    }
}

function findBy($table, $field, $value, $fields = '*')
{
    try {
        $connect = connect();
        $prepare = $connect->prepare("select {$fields} from {$table} where {$field} = :{$field}");
        $prepare->execute([
            $field => $value
        ]);
        return $prepare->fetch();
    } catch (PDOException $e) {
        var_dump($e->getMessage());
    }
}
