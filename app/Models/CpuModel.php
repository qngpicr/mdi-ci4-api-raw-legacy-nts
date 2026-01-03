<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Cpu;
use App\Entities\CoreStat;

class CpuModel extends Model
{
    protected $table      = 'cpu';
    protected $primaryKey = 'id_cpu';
    protected $returnType = Cpu::class; // 또는 App\Entities\Cpu
    protected $allowedFields = [
        'name_cpu','release_cpu','core_cpu','thread_cpu',
        'maxghz_cpu','minghz_cpu','choice_cpu',
        'cpu_type_code','cpu_manf_code'
    ];

    // 전체 CPU 수
    public function selectTotalCpuCount(): int
    {
        return $this->db->table($this->table)->countAllResults();
    }

    /** @return Cpu[] */
    // 전체 CPU 목록
    public function selectAllCpus(): array
    {
        $sql = "SELECT m.id_cpu, m.name_cpu, m.release_cpu, m.core_cpu, m.thread_cpu,
                       m.maxghz_cpu, m.minghz_cpu, m.choice_cpu,
                       m.cpu_type_code, t.type_cpu,
                       m.cpu_manf_code, b.manf_cpu
                FROM cpu m
                LEFT JOIN cpu_type t ON m.cpu_type_code = t.cpu_type_code
                LEFT JOIN cpu_manf_brand b ON m.cpu_manf_code = b.cpu_manf_code";
        return $this->db->query($sql)->getResult(Cpu::class);
    }

    // ID로 조회
    public function selectCpuById(int $cpuId): ?Cpu
//  public function selectCpuById(int $cpuId): ?array
    {
        $sql = "SELECT m.id_cpu, m.name_cpu, m.release_cpu, m.core_cpu, m.thread_cpu,
                       m.maxghz_cpu, m.minghz_cpu, m.choice_cpu,
                       m.cpu_type_code, t.type_cpu,
                       m.cpu_manf_code, b.manf_cpu
                FROM cpu m
                LEFT JOIN cpu_type t ON m.cpu_type_code = t.cpu_type_code
                LEFT JOIN cpu_manf_brand b ON m.cpu_manf_code = b.cpu_manf_code
                WHERE m.id_cpu = ?";
        return $this->db->query($sql, [$cpuId])->getRow(Cpu::class);
//      return $this->db->query($sql, [$cpuId])->getRowArray();

    }

    // 이름으로 조회
    public function selectCpuByName(string $nameCpu): ?Cpu
    {
        $sql = "SELECT * FROM cpu WHERE name_cpu = ?";
        return $this->db->query($sql, [$nameCpu])->getRow(Cpu::class);
    }

    /** @return Cpu[] */
    // 이름 LIKE 검색
    public function selectCpuListByName(string $nameCpu): array
    {
        $sql = "SELECT c.id_cpu, c.name_cpu, c.core_cpu, c.thread_cpu,
                       c.maxghz_cpu, c.minghz_cpu, b.manf_cpu
                FROM cpu c
                LEFT JOIN cpu_manf_brand b ON c.cpu_manf_code = b.cpu_manf_code
                WHERE c.name_cpu LIKE ?
                ORDER BY c.id_cpu ASC";
        return $this->db->query($sql, ['%' . $nameCpu . '%'])->getResult(Cpu::class);
    }

    /** @return Cpu[] */
    // 인기 CPU 목록
    public function selectHotCpuList(): array
    {
        $sql = "SELECT m.id_cpu, m.name_cpu, m.choice_cpu,
                       m.cpu_manf_code, b.manf_cpu
                FROM cpu m
                LEFT JOIN cpu_manf_brand b ON m.cpu_manf_code = b.cpu_manf_code
                WHERE m.choice_cpu > 0
                ORDER BY m.choice_cpu DESC
                LIMIT 10";
        return $this->db->query($sql)->getResult(Cpu::class);
    }

    /** @return Cpu[] */
    // 제조사별 조회
    public function selectCpuListByManufacturer(string $manfCpu): array
    {
        $sql = "SELECT c.*, b.manf_cpu
                FROM cpu c
                JOIN cpu_manf_brand b ON c.cpu_manf_code = b.cpu_manf_code
                WHERE b.manf_cpu = ?";
        return $this->db->query($sql, [$manfCpu])->getResult(Cpu::class);
    }

    /** @return Cpu[] */
    // 코어 수별 조회
    public function selectCpuListByCore(int $coreCpu): array
    {
        $sql = "SELECT c.*, b.manf_cpu
                FROM cpu c
                JOIN cpu_manf_brand b ON c.cpu_manf_code = b.cpu_manf_code
                WHERE c.core_cpu = ?";
        return $this->db->query($sql, [$coreCpu])->getResult(Cpu::class);
    }

    /** @return Cpu[] */
    // 쓰레드 수별 조회
    public function selectCpuListByThread(int $threadCpu): array
    {
        $sql = "SELECT c.*, b.manf_cpu
                FROM cpu c
                JOIN cpu_manf_brand b ON c.cpu_manf_code = b.cpu_manf_code
                WHERE c.thread_cpu = ?";
        return $this->db->query($sql, [$threadCpu])->getResult(Cpu::class);
    }

    /** @return Cpu[] */
    // 출시년도별 조회
    public function selectCpuListByRelease(int $releaseCpu): array
    {
        $sql = "SELECT c.*, b.manf_cpu
                FROM cpu c
                JOIN cpu_manf_brand b ON c.cpu_manf_code = b.cpu_manf_code
                WHERE c.release_cpu = ?";
        return $this->db->query($sql, [$releaseCpu])->getResult(Cpu::class);
    }

    /** @return CoreStat[] */
    // 코어 분포 집계
    public function getCoreCpuDistribution(): array
    {
        $sql = "SELECT core_cpu, COUNT(*) AS count
                FROM cpu
                GROUP BY core_cpu
                ORDER BY core_cpu";
        return $this->db->query($sql)->getResult(CoreStat::class);
    }
}
