<?php

namespace App\Exports;

use App\Models\Newsreport;
use Maatwebsite\Excel\Concerns\FromCollection;

class NewsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Newsreport::all();
    }
}
