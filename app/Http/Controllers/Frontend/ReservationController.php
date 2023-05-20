<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationRequest;
use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\Reservation;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function create()
    {
        $tables = Table::where("status","available")->get();
        return view("reservations.create", compact("tables"));
    }

    public function store(ReservationRequest $request)
    {
        //check if guest numbers suitable for table capacity
        $table = Table::find($request->table_id);
        if($request->guest_number > $table->guest_number)
        {
            return redirect()->back()->with("message","Table is not suiteable with guests number");
        }

        $request_date = Carbon::parse($request->res_date);
        //dd($request_date);
        //dd($table->reservations);

        //check for reservation date
        foreach($table->reservations as $res)
        {
            if($res->res_date->format("Y-m-d") == $request_date->format("Y-m-d"))
            {
                return redirect()->back()->with("message", "Sorry, This table is already reserved");
            }
        }
        Reservation::create($request->validated());
        return redirect("reservations/create")->with("message", "Reservation created successfly");
    }

    }

