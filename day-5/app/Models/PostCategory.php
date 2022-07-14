<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory;
    // Modelin doldurulabilir alanları belirttik
    protected $guarded = [];
    protected  $primaryKey = 'id';
    protected $table = 'post_category';

}
