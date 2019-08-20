<?php

namespace App\Imports;

use App\User;
//use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;

class UsersImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(), [
            '*.0' => 'required|max:80',
            '*.1' => 'max:80',
            '*.2' => 'required|max:80',
            '*.3' => 'required|unique:users,email|email|max:100',
            '*.4' => 'required|min:6|max:50',
        ])->validate();

        foreach ($rows as $row)
        {
          User::create([
            'first_name'    => $row[0],
            'middle_name'   => $row[1],
            'last_name'     => $row[2],
            'name'          => $row[0].$row[1].$row[2],
            'email'         => $row[3],
            'password' => \Hash::make('12345678'),
          ]);
        }
    }
}
