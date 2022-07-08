<?php

namespace App\Services\ManufacturingProcess;

use App\Models\ManufacturingProcess;
use App\Traits\FormatResponseTrait;
use Illuminate\Http\JsonResponse;

class ManufacturingProcessService
{
    use FormatResponseTrait;
    public function ManufacturingProcesses() :object
    {
        return ManufacturingProcess::latest()->paginate(config('setting.LimitPaginate'));

    }// End ManufacturingProcesses

    public function store($request) :JsonResponse
    {
        try {
            ManufacturingProcess::create([
                'name'      => $request->name,
                'status'    => $request->status,
            ]);
            return $this->returnSuccessMessage('Congratulation ManufacturingProcesses Created Successfully');

        } catch (\Exception $e) {
            return $this->returnError('', $e->getMessage());
        }
    }// End Store

    public function update($request,$manufacturingProcess) :JsonResponse
    {
        try {
            $manufacturingProcess->update([
                'name'      => $request->name,
                'status'    => $request->status,
            ]);
            return $this->returnSuccessMessage('Congratulation ManufacturingProcesses Updated Successfully');

        }catch (\Exception $e) {
            return $this->returnError('', $e->getMessage());
        }
    }// End update
}
