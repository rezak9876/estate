<?php

namespace App\Imports;

use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Modules\Estate\Entities\Estate;
use Modules\Estate\Http\Controllers\Admin\EstateController;
use Modules\Estate\Http\Requests\EstateRequest;
use Modules\UseTypeProperty\Entities\UseTypeProperty;

class EstateImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
    }
}
