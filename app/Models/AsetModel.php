<?php

namespace App\Models;

use CodeIgniter\Model;

class AsetModel extends Model
{
    protected $table = 'aset';
    protected $primaryKey = 'id_aset';

    protected $allowedFields = ['nama_aset', 'tahun'];

    // Optional: Validation rules
    protected $validationRules = [
        'nama_aset' => 'required|min_length[3]|max_length[255]',
        'tahun' => 'required|exact_length[4]'
    ];

    protected $validationMessages = [
        'nama_aset' => [
            'required' => 'Nama aset harus diisi.',
            'min_length' => 'Nama aset harus memiliki setidaknya 3 karakter.',
            'max_length' => 'Nama aset tidak boleh lebih dari 255 karakter.'
        ],
        'tahun' => [
            'required' => 'Tahun harus diisi.',
            'exact_length' => 'Tahun harus terdiri dari 4 digit.'
        ]
    ];
}
