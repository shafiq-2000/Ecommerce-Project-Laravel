<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $fillable = ['cat_id', 'name', 'description', 'status'];

    public function products()
    {
        return $this->hasMany(Product::class, 'subcat_id');
    }
}
