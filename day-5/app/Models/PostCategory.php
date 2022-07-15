<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory;

    // Modelin doldurulabilir alanları belirttik
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $table = 'post_category';

    // one to one ilişkisi
    public function getUser()
    {
        // id referans göstereceğimiz tablo field , user_id PostCategory bulunan field
        return $this->hasOne('App\Models\User', 'id', 'user_id')
            ->select('name');
    }
}
