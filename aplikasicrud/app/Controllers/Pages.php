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
        // echo view('layout/header', $data);
        return view('pages/home', $data);
        // echo view('layout/footer');
    }

    public function about()
    {
        // return view('pages/about');
        $data = [
            'title' => 'About | CRUD'
        ];
        // echo view('layout/header');
        return view('pages/about', $data);
        // echo view('layout/footer');
    }

    public function contact()
    {
        // return view('pages/about');
        $data = [
            'title' => 'Contact | CRUD'
        ];
        // echo view('layout/header');
        return view('pages/contact', $data);
        // echo view('layout/footer');
    }
}
