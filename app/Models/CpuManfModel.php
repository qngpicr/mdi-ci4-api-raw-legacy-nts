<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\CpuManf;

class CpuManfModel extends Model
{
    protected $table      = 'cpu_manf_brand';
    protected $primaryKey = 'cpu_manf_code';
    protected $returnType = CpuManf::class; // 엔티티 반환
    protected $allowedFields = ['cpu_manf_code', 'manf_cpu'];

    /** @return CpuManf[] */
    // 전체 제조사 목록
    public function selectAllManfs(): array
    {
        return $this->findAll();
    }

    // 특정 코드로 조회
    public function selectManfByCode(string $code): ?CpuManf
    {
        return $this->find($code);
    }
}
