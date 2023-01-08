<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZipCode extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'zip_code', 'locality'];

    protected $hidden = ['id'];

    public function federalEntity()
    {
        return $this->hasOne(FederalEntity::class)->select('key', 'name', 'code', 'zip_code_id');
    }

    public function settlements()
    {
        return $this->hasMany(Settlement::class)->select('key', 'name', 'zone_type', 'settlement_type_id', 'zip_code_id');
    }

    public function municipality()
    {
        return $this->hasOne(Municipality::class)->select('key', 'name', 'zip_code_id');
    }
}
