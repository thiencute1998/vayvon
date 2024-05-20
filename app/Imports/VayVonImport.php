<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class VayVonImport implements ToCollection
{
    private $arrVayVon = [];
    /**
    * @param Collection $rows
    */
    
    public function collection(Collection $rows)
    {
        //
        dd($rows);

        foreach ($rows as $row) {
            $arrVayVon[] = [
                'user_name'=> $row['ho_ten'],
                'phone'=> $row['sdt'],
            ];
        }
    }

    public function insertVayVon() {
        return 1;
    }
}
