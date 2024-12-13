<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'recipe';
    protected $primaryKey = 'id_recipe';

    protected $fillable = ['recipe_name', 'recipe_content', 'view', 'date_add', 'date_update', 'id_user', 'id_type'];

    public function quantities()
    {
        return $this->hasMany(Quantite::class, 'id_recipe');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'id_type', 'id_type');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
