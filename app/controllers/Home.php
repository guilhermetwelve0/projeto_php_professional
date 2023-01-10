<?php

namespace app\controllers;

class Home
{
    public function index($params): array
    {
        $search = filter_input(INPUT_GET, 's', FILTER_SANITIZE_STRING);

        read('users', 'id,firstName,lastName');

        // dd(http_build_query(['page' => 1,'s' => 'Rory Davis','age' => 32]));
        if($search){
            search(['firstName' => $search]);
        }
        //paginate(5);
        // tableJoinWithFK('users', 'id');
        // where('firstName', 'Andy Kuphal');
        //where('id','>',10);
        // whereIn('firstName', ['Ima Klein', 'Jennings McDermott', 'Aaliyah Goodwin']);
        //  if ($search) {
        //      search(['firstName' => $search, 'lastName' => $search]);
        //  }
        //  limit(10);
        $users = execute();
        //dd($users);

        // dd($users);

        //dd($users);
        return [
            'view' => 'home',
            'data' => ['title' => 'Home', 'users' => $users,'links' => render()]
        ];
    }
}
