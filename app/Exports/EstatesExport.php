<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Modules\Estate\Entities\Estate;
use Modules\Facility\Entities\Facility;

class EstatesExport implements FromArray
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function array(): array
    {
        $estates = Estate::all();

        // adding row header
        $excel_array = [['نوع', 'نوع ملک', 'متراژ', 'سال ساخت', 'قیمت خرید', 'قیمت رهن', 'قیمت اجاره', 'عنوان', 'اسلاگ', 'توضیحات', 'عرض جغرافیایی', 'طول جغرافیایی', 'استان', 'شهر', 'منظقه', 'محله', 'آدرس', 'امکانات', 'شرایط', 'تعداد اتاق']];
        foreach ($estates as $estate) {

            $row = [
                $estate->type(),
                $estate->use_type_property->title,
                $estate->area,
                $estate->year_of_construction,
                $estate->total_price,
                $estate->mortgage_price,
                $estate->rent_price,
                $estate->title,
                $estate->slug,
                $estate->description,
                $estate->latitude,
                $estate->longitude,
                $estate->province->title,
                $estate->city->title,
                $estate->region->title,
                $estate->neighborhood->title,
                $estate->address,
                implode(',', $estate->boolfacilities->pluck('title')->toArray()),
                implode(',', $estate->terms->pluck('title')->toArray()),
            ];

            // int facilities
            $int_facilities = Facility::whereType(Facility::Integer)->pluck('id');
            foreach ($int_facilities as $facility_id) {
                if ($facility = $estate->intfacilities->where('id', $facility_id)->first())
                    array_push($row, $facility->pivot->value);
                else
                    array_push($row, null);
            }

            array_push($excel_array, $row);
        }
        return $excel_array;
    }
}
