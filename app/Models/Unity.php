<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unity extends Model
{
    use HasFactory;
    protected $table = 'unite';
    protected $primaryKey = 'code';
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = ['label'];
}