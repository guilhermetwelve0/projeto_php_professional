<?php

namespace app\controllers;

class Password
{
    public function update($args)
    {
        if (!isset($args['user'])) {
            return redirect('/');
        }
        $validated = validate([
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ],checkCsrf: true);
        dd($validated);
    }
}
