<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class CpuManf extends Entity
{
    protected $attributes = [
        'cpu_manf_code' => null,
        'manf_cpu'      => null,
    ];

    protected $datamap = [
        'code' => 'cpu_manf_code',
        'name' => 'manf_cpu',
    ];

    protected $casts = [
        'cpu_manf_code' => 'string',
        'manf_cpu'      => 'string',
    ];
}
