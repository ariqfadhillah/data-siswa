<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable;
    // relasinya user => punya byk Post hasMany
    // post => dimiliki user belongsTo 
    protected $fillable = ['title', 'content', 'thumbnail','slug','user_id'];
    protected $dates = ['created_at'];

     /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    public function user()
    {
    	return $this->belongsTo(User::class);
    	// artinya model ini dimiliki oleh class yang didlm kurung
    }

    public function thumbnail()
    {   

        // ada byk cara yang lebih clean lagi dalam penulisan perkondisian
        // if($this->thumbnail){
        //     return $this->thumbnail;
        // }else{
        //     return asset('default.png');
        // }
      
        // if(!$this->thumbnail){
        //     return asset('default.png');
        // }
        // return $this->thumbnail;

        return !$this->thumbnail ? asset('default.png') : $this->thumbnail;

    }
}
