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
        if ($this->request->isAJAX()) {
            $modelDivisi = new DivisiModel();
            $divisi = $modelDivisi->findAll();

            $data = [
                'divisi' => $divisi
            ];
 
            $json = [
                'data'   => view('data_master/divisi/add', $data),
            ];

            echo json_encode($json);
        } else {
            return 'Tidak bisa load';
        }
        
    }


    public function create()
    {
        if ($this->request->isAJAX()) {
            $validasi = [
                'nama'       => [
                    'rules'  => 'required|is_unique[divisi.nama]',
                    'errors' => [
                        'required'  => '{field} harus diisi.',
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
        } else {
            return 'Tidak bisa menambahkan';
        }
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
        if ($this->request->isAJAX()){
            $modelDivisi = new DivisiModel();
            $oldDivisi = $modelDivisi->find($id);

            // if ($oldDivisi['nama'] == $this->request->getPost('nama')) {
            //     $ruleNama = 'required';
            // } else {
            //     $ruleNama = 'required|is_unique[divsi.nama]';
            // }

            // $validasi = [
            //     'nama' => [
            //         'rules' => $rule_nama,
            //         'errors' => [
            //             'required' => '{field} produk harus diisi.',
            //             'is_unique' => 'nama produk sudah ada dalam database.'
            //         ]
            //     ],
            // ];  

            // if (!$this->validate($validasi)) {
            //     return redirect()->to('/divisi/' . $id . '/edit')->withInput();
            // }
            
            $data =[
                'nama'      => $this->request->getVar('nama'),
                'deskripsi' => $this->request->getVar('deskripsi')
            ];


        } else {
            return 'Tidak bisa load';
        }
    }


    public function delete($id = null)
    {
        $modelDivisi = new DivisiModel();

        $divisi     = $modelDivisi->find($id);

        $modelDivisi->delete($id);

        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/divisi');
    }
}
?>