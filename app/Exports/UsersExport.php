<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\User;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class UsersExport implements FromCollection, WithHeadings
{
	use Exportable;

    public function collection()
    {
        return User::select('id','name','email')->get(); 	
    }


    public function headings(): array
    {
        return [
            'id',
            'name',
            'email',
        ];
    }

}