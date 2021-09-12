<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ticket extends Model
{
    use HasFactory;
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'date',
        'days',
        'quantity',
        'price',
        'link'
    ];

    public function assignedLakes()
    {
        return $this->hasMany(TicketAssignedLakes::class, 'ticket_id', 'id');
    }
}
