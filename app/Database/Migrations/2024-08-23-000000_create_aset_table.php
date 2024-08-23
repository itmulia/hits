<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAsetTable extends Migration
{
  public function up()
  {
    // Menambahkan tabel 'aset'
    $this->forge->addField([
      'id_aset' => [
        'type'           => 'INT',
        'constraint'     => 11,
        'unsigned'       => true,
        'auto_increment' => true,
      ],
      'nama_aset' => [
        'type'       => 'VARCHAR',
        'constraint' => '255',
      ],
      'tahun' => [
        'type'       => 'YEAR',
      ],
    ]);
    $this->forge->addKey('id_aset', true); // Menetapkan primary key
    $this->forge->createTable('aset'); // Membuat tabel
  }

  public function down()
  {
    // Menghapus tabel 'aset'
    $this->forge->dropTable('aset');
  }
}
