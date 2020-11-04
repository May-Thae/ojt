<?php

namespace App\Imports;

use App\Post;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Log;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        Log::info($row);
        return new Post([
            //

            'title'     => $row[0],
            'description'    => $row[1],
            'create_user_id'    => $row[2],
            'updateed_user_id'    => $row[3]
        ]);
    }
}
