<?php

namespace App\Exports;

use App\Models\DriverRequest;
use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DriverRequestExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DriverRequest::all();
    }

    public function headings(): array
    {
        return [
            '#',
            'المرسل',
            'القسم الرئيسي',
            'القسم الفرعي',
            'اسم المنتج',
            'رقم المنتج',
            'الكمية',
            'الحالة',
        ];
    }

    public function map($Order): array
    {
        return [
            $Order->id,
            $Order->user->name,
            $Order->Category->category_name_ar,
            $Order->SubCategory->sub_category_name_ar,
            $Order->Product->product_name_ar,
            $Order->Product->product_number,
            $Order->number,
            $Order->status
        ];
    }
}
