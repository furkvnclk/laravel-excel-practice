<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class UsersImport implements ToModel, WithUpserts, WithHeadingRow
{

    /**
     * @return string|array
     */
    public function uniqueBy()
    {
        return 'name';
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        dd($row);
        die();
        // return new User([
        //     'name' => $row['name'],
        //     'email' => $row['email'],
        //     'password' => Hash::make('password'),
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        // return new User([
        //     'name' => $row[7],
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
    }
}
