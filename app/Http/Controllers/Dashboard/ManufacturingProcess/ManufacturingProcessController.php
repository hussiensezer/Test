<?php

namespace App\Http\Controllers\Dashboard\ManufacturingProcess;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ManufacturingProcess\ManufacturingProcessStoreRequest;
use App\Http\Requests\Dashboard\ManufacturingProcess\ManufacturingProcessUpdateRequest;
use App\Models\ManufacturingProcess;
use App\Services\ManufacturingProcess\ManufacturingProcessService;
use Illuminate\Http\JsonResponse;

class ManufacturingProcessController extends Controller
{
    private ManufacturingProcessService $manufacturingProcessService;

    public function __construct(ManufacturingProcessService $manufacturingProcessService)
    {
        $this->manufacturingProcessService = $manufacturingProcessService;
    }

    public function index()
    {
        $ManufacturingProcesses = $this->manufacturingProcessService->ManufacturingProcesses();

        return view('dashboard.admin.manufacturing_process.index', compact('ManufacturingProcesses'));
    }// End Index

    public function create()
    {
        return view('dashboard.admin.manufacturing_process.create');
    }// End Create

    public function store(ManufacturingProcessStoreRequest $request) :JsonResponse
    {
        return $this->manufacturingProcessService->store($request);
    }// End Store

    public function edit(ManufacturingProcess  $manufacturingProcess)
    {
        return view('dashboard.admin.manufacturing_process.edit', compact('manufacturingProcess'));
    }// End Edit

    public function update(ManufacturingProcessUpdateRequest $request, ManufacturingProcess $manufacturingProcess) :JsonResponse
    {
        return $this->manufacturingProcessService->update($request, $manufacturingProcess);
    }// End Update


    public function manufacturing_process() : object
    {
        return $this->manufacturingProcessService->ManufacturingProcesses();
    }
}
