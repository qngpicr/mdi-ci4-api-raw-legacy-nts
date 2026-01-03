<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class CoreStat extends Entity
{
    protected $attributes = [
        'core_cpu' => null,
        'count'    => null,
    ];

    // DB 컬럼 ↔ 엔티티 속성 매핑
    protected $datamap = [
        'core'  => 'core_cpu',
        'total' => 'count',
    ];

    // 타입 변환 보장
    protected $casts = [
        'core_cpu' => 'integer',
        'count'    => 'integer',
    ];
}
