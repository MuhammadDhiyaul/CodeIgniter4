<?php

namespace App\Controllers;
use App\Models\BukuModel;

class Buku extends BaseController
{
    public function index()
    {
        $bukuModel = new BukuModel();
        // $buku = $bukuModel->findAll();

        $data = [
            'title' => 'Daftar Buku | CRUD',
            'buku' => $bukuModel->getBuku()
        ];

        return view('buku/index', $data);
    }

    public function detail($slug)
    {
        // echo $slug;
        $bukuModel = new BukuModel();
        // $buku = $bukuModel->where(['slug' =>$slug])->first();
        // dd($buku);
        // $buku = $bukuModel->getBuku($slug);
        $data = [
            'title' => 'Detail Buku | CRUD',
            'buku' => $bukuModel->getBuku($slug)
        ];

        // Jika buku tidak ada di tabel
        if (empty($data['buku'])) 
        {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul buku ' .$slug. ' tidak ditemukan.');
        }
        return view('buku/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Buku | CRUD'
        ];
        return view('buku/create', $data);
    }

    public function save()
    {
        $bukuModel = new BukuModel();
        $slug = url_title($this->request->getVar('judul'), '-', true);
        $bukuModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $this->request->getVar('sampul')
        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');
        return \redirect()->to('/buku');
    }

}