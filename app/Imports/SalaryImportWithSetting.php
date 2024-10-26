<?php

namespace App\Imports;

use App\Models\Form;
use App\Models\PayslipImport;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SalaryImportWithSetting implements ToCollection, WithHeadingRow
{
    public $year;
    public $month;
    public $payslipHeadSetting;
    public $settings;

    public function __construct( $year , $month, $payslipHeadSetting, $settings)
    {
        $this->year= $year;
        $this->month= $month;
        $this->payslipHeadSetting= $payslipHeadSetting;
        $this->settings= $settings;
    }


    public function collection (Collection $rows)
    {
        foreach ($rows as $row) {

            $row = $row->toArray();
            $row = array_values($row);

            if (!isset($row[$this->settings['nationalCodePlace']]))
            {
                continue;
            }

            $user = User::updateOrCreate([
                'national_code' => $row[$this->settings['nationalCodePlace']]
            ],[
                'name'          => $row[$this->settings['firstNamePlace']],
                'family'        => $row[$this->settings['lastNamePlace']],
                'personal_code' => $row[$this->settings['personalCodePlace']],
                'mobile'        => $row[$this->settings['mobilePlace']]
            ]);

            if (!$user)
            {
                continue;
            }

            $exclusions = [
                $this->settings['firstNamePlace'],
                $this->settings['lastNamePlace'],
                $this->settings['personalCodePlace'],
                $this->settings['mobilePlace'],
                $this->settings['nationalCodePlace']
            ];

            $colIndex = 0;
            foreach ($row as $singleRow)
            {
                if (in_array($colIndex, $exclusions))
                {
                    $colIndex++; 
                    continue;
                }

                PayslipImport::updateOrcreate([
                    'payslip_head_setting_id' => $this->payslipHeadSetting->id,
                    'user_id' => $user->id,
                    'index' => $colIndex,
                ], [
                    'value' => $singleRow,
                ]);

                $colIndex++; 

            }

        
        }
    }

}
