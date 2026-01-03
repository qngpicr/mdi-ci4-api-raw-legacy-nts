<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Cpu extends Entity
{
    protected $attributes = [
        'id_cpu'        => null,
        'name_cpu'      => null,
        'release_cpu'   => null,
        'core_cpu'      => null,
        'thread_cpu'    => null,
        'maxghz_cpu'    => null,
        'minghz_cpu'    => null,
        'choice_cpu'    => null,
        'cpu_type_code' => null,
        'type_cpu'      => null,
        'cpu_manf_code' => null,
        'manf_cpu'      => null,
    ];

    protected $datamap = [
        'id'        => 'id_cpu',
        'name'      => 'name_cpu',
        'release'   => 'release_cpu',
        'core'      => 'core_cpu',
        'thread'    => 'thread_cpu',
        'maxghz'    => 'maxghz_cpu',
        'minghz'    => 'minghz_cpu',
        'choice'    => 'choice_cpu',
        'typeCode'  => 'cpu_type_code',
        'typeName'  => 'type_cpu',
        'manfCode'  => 'cpu_manf_code',
        'manfName'  => 'manf_cpu',
    ];

    // 타입 변환 보장
    protected $casts = [
        'id_cpu'      => 'integer',
        'release_cpu' => 'integer',
        'core_cpu'    => 'integer',
        'thread_cpu'  => 'integer',
        'maxghz_cpu'  => 'float',
        'minghz_cpu'  => 'float',
        'choice_cpu'  => 'integer',
    ];
}
