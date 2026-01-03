<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class CpuType extends Entity
{
    protected $attributes = [
        'cpu_type_code' => null,
        'type_cpu'      => null,
    ];

    protected $datamap = [
        'code' => 'cpu_type_code',
        'name' => 'type_cpu',
    ];

    protected $casts = [
        'cpu_type_code' => 'string',
        'type_cpu'      => 'string',
    ];
}
