<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Services\CpuService; // 나중에 서비스 클래스 연결할 예정

class CpuController extends Controller
{
    protected $cpuService;

    public function __construct()
    {
        // 서비스 객체 주입 (스프링의 @Autowired 느낌)
        $this->cpuService = new CpuService();
    }

    // GET /api/cpus
    public function index()
    {
        // 서비스에서 CPU 리스트 가져오기
        $cpus = $this->cpuService->getCpuList();

        // JSON 응답 반환 (스프링의 @RestController와 동일한 역할)
        return $this->response->setJSON($cpus);
    }

    // GET /api/cpus/{id}
    public function show($id)
    {
        // 서비스에서 특정 CPU 가져오기
        $cpu = $this->cpuService->getCpuById((int)$id);

        // JSON 응답 반환 또는 404 처리
        if ($cpu) {
            return $this->response->setJSON($cpu);
        }

        return $this->response->setStatusCode(404)
                              ->setJSON(['error' => 'CPU not found']);
    }

    // GET /api/cpus/name/{name}
    public function byName($name)
    {
        // 서비스에서 이름으로 CPU 가져오기
        $cpu = $this->cpuService->getCpuByName($name);

        // JSON 응답 반환 또는 404 처리
        if ($cpu) {
            return $this->response->setJSON($cpu);
        }

        return $this->response->setStatusCode(404)
                              ->setJSON(['error' => 'CPU not found']);
    }

    // GET /api/cpus/search/{name}
    public function searchByName($name)
    {
        // 서비스에서 이름 LIKE 검색 CPU 리스트 가져오기
        $cpus = $this->cpuService->getCpuListByName($name);

        // JSON 응답 반환
        return $this->response->setJSON($cpus);
    }

    // GET /api/cpus/hot
    public function hot()
    {
        // 서비스에서 인기 CPU 리스트 가져오기
        $cpus = $this->cpuService->getHotCpuList();

        // JSON 응답 반환
        return $this->response->setJSON($cpus);
    }

    // GET /api/cpus/manufacturer/{manf}
    public function byManufacturer($manf)
    {
        // 서비스에서 제조사별 CPU 리스트 가져오기
        $cpus = $this->cpuService->getCpuListByManufacturer($manf);

        // JSON 응답 반환
        return $this->response->setJSON($cpus);
    }

    // GET /api/cpus/core/{core}
    public function byCore($core)
    {
        // 서비스에서 코어 수별 CPU 리스트 가져오기
        $cpus = $this->cpuService->getCpuListByCore((int)$core);

        // JSON 응답 반환
        return $this->response->setJSON($cpus);
    }

    // GET /api/cpus/thread/{thread}
    public function byThread($thread)
    {
        // 서비스에서 쓰레드 수별 CPU 리스트 가져오기
        $cpus = $this->cpuService->getCpuListByThread((int)$thread);

        // JSON 응답 반환
        return $this->response->setJSON($cpus);
    }

    // GET /api/cpus/release/{year}
    public function byRelease($year)
    {
        // 서비스에서 출시년도별 CPU 리스트 가져오기
        $cpus = $this->cpuService->getCpuListByRelease((int)$year);

        // JSON 응답 반환
        return $this->response->setJSON($cpus);
    }

    // GET /api/cpus/distribution
    public function distribution()
    {
        // 서비스에서 코어 분포 집계 가져오기
        $stats = $this->cpuService->getCoreCpuDistribution();

        // JSON 응답 반환
        return $this->response->setJSON($stats);
    }
}
