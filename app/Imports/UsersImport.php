<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        if(($row[1])!=null and validateNationalCode($row[1]))
        {
            $u=User::where('national_code', $row[1])->first();
            if(isset($u))
            {
                $u->update(
                    [

                        'personal_code'=>$row[1],
                        'national_code'=>validateNationalCode($row[1]),
                        'name'=>$row[2],
                        'family'=>$row[3],
                        'mobile'=>getMobile($row[4]) ,
                    ]
                );

            }else
            {
                User::create(
                    [

                        'personal_code'=>$row[1],
                        'national_code'=>$row[1],
                        'name'=>$row[2],
                        'family'=>$row[3],
                        'mobile'=>getMobile($row[4]),
                    ]
                );

        }


        }


            //

    }
}
