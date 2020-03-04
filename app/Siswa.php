<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['fnama','lnama','jkelamin','agama','alamat','avatar','user_id',];


    public function getAvatar()
    {
    	if(!$this->avatar){
    		return asset('images/default.jpg');
    	}

    	return asset('images/'.$this->avatar);
    }

    public function mapel()
    {
    	return $this->belongsToMany(Mapel::class)->withPivot(['nilai'])->withTimeStamps();
            // artinya model ini memiliki banyak data dari model yang didalam kurung
    }

    public function nilaiRataRata()
    {
        //ambil nilai-nilai
        $total = 0;
        $hitung  = 0;
        foreach($this->mapel as $mapel){
            $total += $mapel->pivot->nilai;
            $hitung++;
        }

        if($total == 0 ){
            return 0;
        }else{
            return round($total/3);  
            // round ini berguna untuk membuat angka menjadi bulat.
        }

        
    }

    public function point()
    {
        $total = 0;
        foreach($this->mapel as $mapel){
            $total += $mapel->pivot->nilai;
        }

        return $total;
    }

    public function nmlengkap()
    {
        return $this->fnama.' '.$this->lnama;
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault(['avatar' => 'default.jpg']);
        //artinya model ini berarti dimiliki hubungan oleh user
    }
    
}
