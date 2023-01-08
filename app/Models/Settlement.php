<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settlement extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'name', 'zone_type', 'zip_code_id', 'settlement_type_id'];

    protected $hidden = ['zip_code_id', 'settlement_type_id'];

    public function settlementType()
    {
        return $this->belongsTo(SettlementType::class)->select('name', 'id');
    }
}
