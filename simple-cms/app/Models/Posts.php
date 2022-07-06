<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    // tablo adı fields protect property olarak tanımladık

    protected $table = 'posts';
    protected $primaryKey = 'id';

    protected $fillable = ['name','content'];


    /*// kullanacağımız fields alanlarını $fielable ile array olarak belirtebiliriz
        // protected $fillable = ['title'];
    // kullanmayacağımız fields belirtebiliriz - boş olarak bırakırsak tüm fields kullanacağımız belirtir
    protected $guarded = [''];*/
}
