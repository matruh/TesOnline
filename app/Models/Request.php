<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $table = 'requests'; 

    protected $fillable = [
        'murid_id',
        'guru_id',
        'status',
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function murid()
    {
        return $this->belongsTo(Murid::class);
    }
}
