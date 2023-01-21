<?php

namespace app\controllers;

class UserImage
{
    public function store()
    {
        try {
            $path = upload(640,480, 'assets/img', 'crop');
            $auth = user();
            read('photos');
            where('userId', $auth->id);
            $photoUser = execute(isFetchAll: false);
            if ($photoUser) {
                $updated = update('photos', [
                    'path' => $path
                ], [
                    'userId' => $auth->id
                ]);
            } else {
                $updated = create('photos', [
                    'userId' => $auth->id,
                    'path' => $path
                ]);
            }
            dd($updated);
        } catch (\Exception $e) {
            setMessageAndRedirect('upload_error', $e->getMessage(), '/user/edit/profile');
        }
    }
}
