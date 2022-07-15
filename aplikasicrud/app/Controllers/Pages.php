<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        // return view('pages/home');
        $data = [
            'title' => 'Home | CRUD'
        ];
        echo view('layout/header', $data);
        echo view('pages/home');
        echo view('layout/footer');
    }

    public function about()
    {
        // return view('pages/about');
        $data = [
            'title' => 'About | CRUD'
        ];
        echo view('layout/header', $data);
        echo view('pages/about');
        echo view('layout/footer');
    }
}
