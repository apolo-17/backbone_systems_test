<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FederalEntity extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'key', 'name', 'code', 'zip_code_id'];

    protected $hidden = ['zip_code_id'];

    public function zipCode()
    {
        return $this->belongsTo(ZipCode::class);
    }
}
