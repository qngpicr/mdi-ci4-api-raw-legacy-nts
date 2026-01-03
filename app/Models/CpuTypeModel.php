<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\CpuType;

class CpuTypeModel extends Model
{
    protected $table      = 'cpu_type';
    protected $primaryKey = 'cpu_type_code';
    protected $returnType = CpuType::class; // 엔티티 반환
    protected $allowedFields = ['cpu_type_code', 'type_cpu'];

    /** @return CpuType[] */
    // 전체 CPU 타입 목록
    public function selectAllTypes(): array
    {
        return $this->findAll();
    }

    // 특정 코드로 조회
    public function selectTypeByCode(string $code): ?CpuType
    {
        return $this->find($code);
    }
}
