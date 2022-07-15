<?php

namespace App\Controllers;
use App\Models\BukuModel;

class Buku extends BaseController
{
    public function index()
    {
        $bukuModel = new BukuModel();
        $buku = $bukuModel->findAll();

        $data = [
            'title' => 'Daftar Buku | CRUD',
            'buku' => $buku
        ];

        

        return view('buku/index', $data);
    }
}