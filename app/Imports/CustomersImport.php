<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class CustomersImport implements ToModel, WithUpserts, WithHeadingRow
{
    /**
     * @return string|array
     */
    public function uniqueBy()
    {
        // return 'cari_hesap_kodu'&&'name';
    }
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        // dd($row);
        // dd(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date']));
        // die();

        return new Customer([
            //
            'customer_id' => $row['cari_hesap_kodu'],
            'product_id' => $row['kodu'],
            'amount' => $row['miktar'],
            'unit_price' => $row['birim_fiyat'],
            'cost' => $row['tutar'],
            'sales_at' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['fis_tarihi']),
        ]);
    }
}
