<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quantite extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'quantite';
    protected $primaryKey = 'id_ingredient';

    protected $fillable = ['id_ingredient', 'id_recipe', 'quantite', 'code'];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class, 'id_recipe');
    }
}
