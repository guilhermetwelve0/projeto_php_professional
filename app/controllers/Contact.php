<?php

namespace app\controllers;

use stdClass;
class Contact
{
    public function index()
    {
        return [
            'view' => 'contact',
            'data' => ['title' => 'Contact',],
        ];
    }
    public function store()
    {
        $email = new stdClass();
        $email->fromName = 'guilherme cabral';
        $email->fromEmail = 'rlacabral4@gmail.com';
        $email->ToName = 'Joao';
        $email->ToEmail = 'joao@email.com.br';
        $email->subject = 'teste de mensagem';
        $email->message = 'mensagem simples';

        $sent = send($email);
        dd($sent);
    }

}
