<?php

namespace App\Models;

use App\Http\Controllers\TicketAssignedLakesControler;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TicketAssignedLakes extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id',
        'lake_id'
    ];

    public function lake()
    {
        return $this->hasOne(Lake::class, 'id', 'lake_id');
    }

}
