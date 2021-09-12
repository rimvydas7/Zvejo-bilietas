<?php

namespace App\Http\Controllers;

use App\Models\TicketAssignedLakes;
use Illuminate\Http\Request;

class TicketAssignedLakesControler extends Controller
{
    public function store(Request $request)
    {
        TicketAssignedLakes::create([
            'lake_id' => $request['lake_id'],
            'ticket_id' => $request['ticket_id'],
        ]);
    }
}
