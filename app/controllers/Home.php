<?php

namespace app\controllers;

class Home
{
    public function index($params): array
    {
        read('users', 'id,firstName,lastName');
        where('id', 5);
        orWhere('email', '>', 'xandercar@hotmail.com', 'and');
        order('id', 'asc');
        limit(5);
        //paginate(10);
        // orWhere('firstName', '=', 'Alexandre');
        // orWhere('lastName', '=', 'Cardoso','and');
        $users = execute();
        dd($users);
        // return [
        //     'view' => 'home',
        //     'data' => ['title' => 'Home', 'users' => $users]
        // ];
    }
}
