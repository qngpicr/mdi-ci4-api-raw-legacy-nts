<?php

namespace App\Services;

use App\Models\CpuModel;        // DAO 역할 (CI4에서는 Model)
use App\Entities\Cpu;           // DTO 대응
use App\Entities\CoreStat;      // DTO 대응

class CpuService
{
    protected $cpuModel;

    public function __construct()
    {
        // 스프링의 @Autowired CpuDao와 동일한 역할
        $this->cpuModel = new CpuModel();
    }

    public function getTotalCpuCount(): int
    {
        return $this->cpuModel->selectTotalCpuCount();
    }

    /** @return Cpu[] */
    public function getCpuList(): array
    {
        return $this->cpuModel->selectAllCpus();
    }

    public function getCpuById(int $cpuId): ?Cpu
    {
        return $this->cpuModel->selectCpuById($cpuId);
    }

    public function getCpuByName(string $nameCpu): ?Cpu
    {
        return $this->cpuModel->selectCpuByName($nameCpu);
    }

    /** @return Cpu[] */
    public function getCpuListByName(string $nameCpu): array
    {
        return $this->cpuModel->selectCpuListByName($nameCpu);
    }

    /** @return Cpu[] */
    public function getHotCpuList(): array
    {
        return $this->cpuModel->selectHotCpuList();
    }

    /** @return Cpu[] */
    public function getCpuListByManufacturer(string $manfCpu): array
    {
        return $this->cpuModel->selectCpuListByManufacturer($manfCpu);
    }

    /** @return Cpu[] */
    public function getCpuListByCore(int $coreCpu): array
    {
        return $this->cpuModel->selectCpuListByCore($coreCpu);
    }

    /** @return Cpu[] */
    public function getCpuListByThread(int $threadCpu): array
    {
        return $this->cpuModel->selectCpuListByThread($threadCpu);
    }

    /** @return Cpu[] */
    public function getCpuListByRelease(int $releaseCpu): array
    {
        return $this->cpuModel->selectCpuListByRelease($releaseCpu);
    }

    /** @return CoreStat[] */
    public function getCoreCpuDistribution(): array
    {
        return $this->cpuModel->getCoreCpuDistribution();
    }
}
