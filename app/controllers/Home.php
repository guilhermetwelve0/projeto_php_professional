<?php

namespace app\controllers;

class Home
{
    public function index($params): array
    {
        read('users', 'id,firstName,lastName');
        $users = execute();
        dd($users);
        return [
            'view' => 'home',
            'data' => ['title' => 'Home', 'users' => $users]
        ];
    }
}
