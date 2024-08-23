<?php

namespace App\Controllers;

use App\Models\AsetModel;

class AsetController extends BaseController
{
    protected $asetModel;

    public function __construct()
    {
        $this->asetModel = new AsetModel();
    }

    public function index()
    {
        $data['aset'] = $this->asetModel->findAll();
        return view('aset_index', $data);
    }

    public function create()
    {
        return view('aset/create');
    }

    public function store()
    {
        $validation = $this->validate([
            'nama_aset' => 'required|min_length[3]|max_length[255]',
            'tahun' => 'required|exact_length[4]'
        ]);

        if (!$validation) {
            return view('aset/create', ['validation' => $this->validator]);
        }

        $this->asetModel->save([
            'nama_aset' => $this->request->getPost('nama_aset'),
            'tahun' => $this->request->getPost('tahun'),
        ]);

        return redirect()->to('/aset');
    }

    public function edit($id)
    {
        $data['aset'] = $this->asetModel->find($id);
        return view('aset/edit', $data);
    }

    public function update($id)
    {
        $validation = $this->validate([
            'nama_aset' => 'required|min_length[3]|max_length[255]',
            'tahun' => 'required|exact_length[4]'
        ]);

        if (!$validation) {
            return view('aset/edit', [
                'validation' => $this->validator,
                'aset' => $this->asetModel->find($id)
            ]);
        }

        $this->asetModel->update($id, [
            'nama_aset' => $this->request->getPost('nama_aset'),
            'tahun' => $this->request->getPost('tahun'),
        ]);

        return redirect()->to('/aset');
    }

    public function delete($id)
    {
        $this->asetModel->delete($id);
        return redirect()->to('/aset');
    }
}
