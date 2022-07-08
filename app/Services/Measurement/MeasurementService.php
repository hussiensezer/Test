<?php

namespace App\Services\Measurement;

use App\Models\Measurement;
use App\Traits\FormatResponseTrait;

class MeasurementService
{
    use FormatResponseTrait;

    public function Measurements(): object
    {
        return Measurement::latest()->paginate(config('config.LimitPaginate'));
    }// End Measurements

    public function storeMeasurement(object $request): object
    {

        try {
            Measurement::create([
                'name' => $request->name,
                'status' => $request->status
            ]);
            return $this->returnSuccessMessage('Congratulation Measurement Created Successfully');

        } catch (\Exception $e) {
            return $this->returnError('', $e->getMessage());
        }

    }// End Store Measurement

    public function updateMeasurement(object $request, $measurement): object
    {
        try {
            $measurement->update([
                'name' => $request->name,
                'status' => $request->status
            ]);
            return $this->returnSuccessMessage('Congratulation Measurement Updated Successfully');

        } catch (\Exception $e) {
            return $this->returnError('', $e->getMessage());
        }

    }// End Updated Measurement

}
