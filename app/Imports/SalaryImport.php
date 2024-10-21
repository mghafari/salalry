<?php

namespace App\Imports;

use App\Models\Form;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;

class SalaryImport implements ToModel
{
    public $year;
    public $month;
    public function __construct( $year , $month)
    {
        $this->year= $year;
        $this->month= $month;
    }

    /**
     * @param array $row
     *
     * @return Model|null
     *
     *
     */

    public function model(array $row)
    {
        if (!isset($row[0])) {
            return null;
        }
       $user = User::where('national_code',$row[2] )->first();


       if(isset($user))
        {
            $form=Form::where('user_id', $user->id)->where('year',$this->year )->where('month', $this->month)->first();
            if(isset( $form))
            {
                $form->update(
                    [

                'user_id' => $user->id,
                  'year' => $this->year,
                 'month' => $this->month,
                  'name'=>$row[3]??'',
                 'family'=>$row[4]??'',
                 'karkerd_adi'=>$row[5]??'',
                'karkerd_moaser'=>$row[6]??'',
                        'gheybat'=>$row[7]??'',
                        'onvan'=>$row[8]??'',




                'ezafekar'=>$row[9]??'',
                'tatilkari'=>$row[10]??'',
                'jomekari'=>$row[11]??'',
                'haghmamoriat'=>$row[12]??'',
                'haghtahol'=>$row[13]??'',
                'hagholad'=>$row[14]??'',
                'haghayabzahab'=>$row[15]??'',
                'haghsarparasti'=>$row[16]??'',
                'haghsanavat'=>$row[17]??'',
                'haghmaskan'=>$row[18]??'',
                'hoghoghpaye'=>$row[19]??'',
                'bedehkaripersonel'=>$row[20]??'',
                'jarime'=>$row[21]??'',
                'jamekolmazayanakhales'=>$row[22]??'',
                'khalesepardakhti'=>$row[23]??'',
                'jahanfolad'=>$row[24]??'',
                'maliyatmah'=>$row[25]??'',
                'bimekarmand'=>$row[26]??'',
                'bimekarfarma'=>$row[27]??'',
                'bimetakmilikarmand'=>$row[28]??'',
                'bimtakmilikarfarma'=>$row[29]??'',
                'bimeomrkarmand'=>$row[30]??'',
                'bimeomrkarfarma'=>$row[31]??'',


                    ]
                );
                return $form;

            }
       //    dump($user);
            return new Form([
                'user_id' => $user->id,
                'year' => $this->year,
                'month' => $this->month,
                'name'=>$row[3]??'',
                'family'=>$row[4]??'',
                'karkerd_adi'=>$row[5]??'',
                'karkerd_moaser'=>$row[6]??'',
                'gheybat'=>$row[7]??'',
                'onvan'=>$row[8]??'',
                'ezafekar'=>$row[9]??'',
                'tatilkari'=>$row[10]??'',
                'jomekari'=>$row[11]??'',
                'haghmamoriat'=>$row[12]??'',
                'haghtahol'=>$row[13]??'',
                'hagholad'=>$row[14]??'',
                'haghayabzahab'=>$row[15]??'',
                'haghsarparasti'=>$row[16]??'',
                'haghsanavat'=>$row[17]??'',
                'haghmaskan'=>$row[18]??'',
                'hoghoghpaye'=>$row[19]??'',
                'bedehkaripersonel'=>$row[20]??'',
                'jarime'=>$row[21]??'',
                'jamekolmazayanakhales'=>$row[22]??'',
                'khalesepardakhti'=>$row[23]??'',
                'jahanfolad'=>$row[24]??'',
                'maliyatmah'=>$row[25]??'',
                'bimekarmand'=>$row[26]??'',
                'bimekarfarma'=>$row[27]??'',
                'bimetakmilikarmand'=>$row[28]??'',
                'bimtakmilikarfarma'=>$row[29]??'',
                'bimeomrkarmand'=>$row[30]??'',
                'bimeomrkarfarma'=>$row[31]??'',
            ]);

        }

      /*  return new User([
            'name'=>explode('،' ,$row[1])[0]??'',
            'family'=>explode('،' ,$row[1])[1] ?? '',
            'national_code'=>$row[2]??'',
            'personal_code'=>$row[0]??'',
            'account_no'=>$row[2]??'',
            'ins_no'=>$row[3]??'',
            'status'=>1,
            'mobile'=>$row[2]

        ]);
      */

    }

}
