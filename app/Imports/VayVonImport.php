<?php

namespace App\Imports;

use App\Models\VayVon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VayVonImport implements ToCollection, WithHeadingRow
{
    private $arrVayVon = [];
    /**
    * @param Collection $rows
    */

    public function collection(Collection $rows)
    {
        //
        foreach ($rows as $row) {
            $arrVayVon[] = [
                'user_name'=> $row['ho_ten'],
                'phone'=> $row['sdt'],
                'note'=> $row['noi_dung']
            ];
        }
        VayVon::insert($arrVayVon);
    }

    public function headingRow(): int {
        return 1;
    }
}
