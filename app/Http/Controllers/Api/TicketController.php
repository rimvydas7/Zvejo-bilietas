<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Lake;
use App\Models\Ticket;
use App\Models\TicketAssignedLakes;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        return response()->json( Ticket::all()->last());
    }

    public function all()
    {
        return response()->json( Ticket::all());
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'date' => 'required',
            'days' => 'required',
            'quantity' => 'required',
        ]);

        $data = Ticket::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'date' => $request['date'],
            'days' => $request['days'],
            'quantity' => $request['quantity'],
            'price' => $request['price'] = 1 + $request['days'] + $request['quantity'],
            'link' => $request['link']
        ]);

        foreach($request['lakes'] as $lake){
            TicketAssignedLakes::create([
                'lake_id' => $lake['id'],
                'ticket_id' => $data->id ,
            ]);
        }

        return response()->json(['link' => $data->link]);
    }
}
