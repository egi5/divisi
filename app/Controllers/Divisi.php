<?php

namespace App\Controllers;
use App\Models\DivisiModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Divisi extends ResourcePresenter
{
    public function index()
    {
        $modelDivisi = new DivisiModel();
        $divisi      = $modelDivisi->findall();

        $data = [
            'divisi' => $divisi
        ];

        return view('data_master/divisi/index', $data);
    }


    public function show($id = null)
    {
        if ($this->request->isAJAX()) {
            $modelDivisi = new DivisiModel();
            $divisi      = $modelDivisi->find($id);

            $data = [
                'divisi' => $divisi,
            ];

            $json = [
                'data'   => view('data_master/divisi/show', $data),
            ];

            echo json_encode($json);
        } else {
            return 'Tidak bisa load data';
        }
    }

    public function new()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];

        return view('data_master/divisi/add', $data);
        
    }


    public function create()
    {
        $validasi = [
            'nama'       => [
                'rules'  => 'required',
                'errors' => [
                    'required'  => '{field} nama divisi harus diisi.',
                    'is_unique' => 'nama divisi sudah ada dalam database.'
                ]
            ],
            'deskripsi'  => [
                'rules'  => 'required',
                'errors' => [
                    'required'  => '{field} divisi harus diisi.',
                ]
            ],
        ];

            if (!$this->validate($validasi)) {
                return redirect()->to('/divisi/new')->withInput();
            }

            $modelDivisi = new DivisiModel();

            $data = [
                'nama'         => $this->request->getPost('nama'),
                'deskripsi'    => $this->request->getPost('deskripsi'),
            ];
            $modelDivisi->insert($data);

            session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

            return redirect()->to('/divisi');
        
    }


    public function edit($id = null)
    {
        if ($this->request->isAJAX()) {
            $modelDivisi = new DivisiModel();
            $divisi      = $modelDivisi->find($id);

            $data = [
                'divisi' => $divisi
            ];
 
            $json = [
                'data'   => view('data_master/divisi/edit', $data),
            ];

            echo json_encode($json);
        } else {
            return 'Tidak bisa load';
        }
    }


    public function update($id = null)
    {
        if ($this->request->isAJAX()) {
            $validasi = [
                'nama'       => [
                    'rules'  => 'required',
                    'errors' => [
                        'required'  => '{field} nama divisi harus diisi.',
                        'is_unique' => 'nama divisi sudah ada dalam database.'
                    ]
                ],
                'deskripsi'  => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} divisi harus diisi.',
                    ]
                ],
            ];

            if (!$this->validate($validasi)) {
                return redirect()->to('/divisi/edit')->withInput();
            }

            $modelDivisi = new DivisiModel();
            $divisi      = $modelDivisi->find($id);

            $data = [
                'id'           => $divisi,
                'nama'         => $this->request->getPost('nama'),
                'deskripsi'    => $this->request->getPost('deskripsi'),
            ];
            $modelDivisi->save($data);

            session()->setFlashdata('pesan', 'Data berhasil Update.');

            return redirect()->to('/divisi');
        } else {
            return 'Tidak bisa di load';
        }
    }


    public function delete($id = null)
    {
        $modelDivisi = new DivisiModel();

        $modelDivisi->delete($id);

        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/divisi');
    }
}
?>