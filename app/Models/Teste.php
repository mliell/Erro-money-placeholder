<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teste extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'teste';
    protected $fillable =
    [
        'id',
        'valor1',
        'valor2',
        'soma'
    ];
}
