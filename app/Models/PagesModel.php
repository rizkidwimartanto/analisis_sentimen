<?php

namespace App\Models;

use CodeIgniter\Model;

class PagesModel extends Model
{
    protected $table = 'ronald_koeman';
    protected $allowedFields = ['nama', 'alamat', 'no_hp'];

    public function search($keyword)
    {
        $builder = $this->table('ronald_koeman');
        $builder->like('nama', $keyword);
        return $builder;
    }
}
