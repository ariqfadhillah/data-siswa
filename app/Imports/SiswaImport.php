<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Siswa;

class SiswaImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
    	// dd($collection);
        foreach ($collection as $key => $row) {
        	if($key >= 3){
        		$tgl_lahir = ($row[5] - 25569) * 86400;
        		Siswa::create([
        			'fnama' => $row[1],
        			'lnama' => ' ',
        			'jkelamin' => $row[2],
        			'agama' => $row[3],
        			'alamat' => $row[4],
        			'tgl_lahir' => gmdate('Y-m-d', $tgl_lahir),
        		]);
        	}
        }
    }
}
