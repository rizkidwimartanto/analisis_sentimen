<?php

namespace App\Controllers;

use App\Models\PagesModel;

class Pages extends BaseController
{
    protected $data_training;

    public function __construct()
    {
        $this->data_training = new PagesModel();
    }

    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $this->data_training->search($keyword);
        } else {
            $this->data_training;
        }

        $currentPage = $this->request->getVar('page_ronald_koeman') ? $this->request->getVar('page_ronald_koeman') : 1;

        $data = [
            "judul" => "Home",
            "data_training" => $this->data_training->paginate(3, 'ronald_koeman'),
            "pager" => $this->data_training->pager,
            "currentPage" => $currentPage
        ];

        return view('pages/home', $data);
    }

    public function data_training()
    {
        $data["judul"] = "Data Training";
        return view('pages/data_training', $data);
    }

    public function data_testing()
    {
        $data["judul"] = "Data Testing";
        return view('pages/data_testing', $data);
    }
    public function add()
    {
        $data = [
            'judul' => 'Form Tambah Training',
            'validation' => \Config\Services::validation()
        ];
        return view('form/tambah_data_training', $data);
    }
    public function adding()
    {
        if (!$this->validate([
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'no_hp' => [
                'label' => 'No Hp',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/add')->withInput()->with('validation', $validation);
        }

        $this->data_training->save([
            "nama" => $this->request->getVar('nama'),
            "alamat" => $this->request->getVar('alamat'),
            "no_hp" => $this->request->getVar('no_hp'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('pages/home');
    }

    public function delete($id)
    {
        $this->data_training->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('pages/home');
    }

    public function edit($id)
    {
        $data = [
            'judul' => 'Form Edit Training',
            'id' => $id,
            'data' => $this->data_training->where(['id' => $id])->first(),
            'validation' => \Config\Services::validation()
        ];
        return view('form/edit_data_training', $data);
    }

    public function editing($id)
    {
        if (!$this->validate([
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'no_hp' => [
                'label' => 'No Hp',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/pages/edit/' . $this->request->getVar('id'))->withInput()->with('validation', $validation);
        }

        $this->data_training->save([
            "id" => $id,
            "nama" => $this->request->getVar('nama'),
            "alamat" => $this->request->getVar('alamat'),
            "no_hp" => $this->request->getVar('no_hp'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('/');
    }
}
