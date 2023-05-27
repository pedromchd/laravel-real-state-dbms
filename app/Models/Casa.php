<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Casa extends Model
{
  use HasFactory;

  protected $table = 'casa';

  protected $fillable = ['imobiliaria', 'endereco', 'preco', 'situacao'];

  public $timestamps = false;
}
