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
        // session();
        $data = [
            'title' => 'Form Tambah Data Buku | CRUD',
            'validation' => \Config\Services::validation()
        ];
        return view('buku/create', $data);
    }

    public function save()
    {
        //Vaidasi input
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[buku.judul]',
                'errors' => [
                    'required' => '{field} Buku harus diisi',
                    'is_unique' => '{field} Buku sudah terdaftar'
                ]
            ]
        ]))
        {
            $validation = \Config\Services::validation();
            return redirect()->to('/buku/create')->withInput()->with('validation', $validation);
        }
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

    public function delete($id)
    {
        $bukuModel = new BukuModel();
        $bukuModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('/buku');
    }

    public function edit($slug)
    {
        $bukuModel = new BukuModel();
        $data = [
            'title' => 'Form Tambah Data Buku | CRUD',
            'validation' => \Config\Services::validation(),
            'buku' => $bukuModel->getBuku($slug)
        ];
        return view('buku/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[buku.judul]',
                'errors' => [
                    'required' => '{field} Buku harus diisi',
                    'is_unique' => '{field} Buku sudah terdaftar'
                ]
            ]
        ])){
            $validation = \Config\Services::validation();
            return redirect()->to('/buku/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $bukuModel = new BukuModel();
        $bukuModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $this->request->getVar('sampul')
        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');
        return \redirect()->to('/buku');
    }

}