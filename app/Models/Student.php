<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
  use HasFactory, Uuid;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'name',
    'gender',
    'date_of_birth',
    'address',
  ];

  /**
   * Get the route key for the model.
   */
  public function getRouteKeyName(): string
  {
    return 'uuid';
  }

  /**
   * Mutator gender label.
   *
   * @return Attribute
   */
  public function genderLabel(): Attribute
  {
    $genderLabel = [
      'male' => "Laki - Laki",
      'female' => "Perempuan",
    ];

    return Attribute::make(
      get: fn () => $genderLabel[$this->gender] ?? 'Tidak Diketahui',
    );
  }
}
