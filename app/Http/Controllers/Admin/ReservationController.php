<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Table;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with("table")->get();
        return view("admin.reservations.index", compact("reservations"));
    }
    public function create()
    {
        $tables = Table::where("status","available")->get();
        return view("admin.reservations.create", compact("tables"));
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
        return redirect("admin/reservations")->with("message", "Reservation created successfly");
    }

    public function edit($id)
    {
        $reservation = Reservation::find($id);
        $tables = Table::where("status","available")->get();
        return view("admin.reservations.edit", compact("reservation", "tables"));
    }

    public function update(ReservationRequest $request, $id)
    {
        //check if guest numbers suitable for table capacity
        $table = Table::find($request->table_id);
        if($request->guest_number > $table->guest_number)
        {
            return redirect()->back()->with("message","Table is not suiteable with guests number");
        }

        $request_date = Carbon::parse($request->res_date);
        //dd($table->reservations);

        //$table->reservations() return the relation object and we can perform queries with this object
        $reservations = $table->reservations()->where("id", "!=", $request->id)->get();
        foreach($reservations as $res)
        {
            if($res->res_date->format("Y-m-d") == $request_date->format("Y-m-d"))
            {
                return redirect()->back()->with("message", "Sorry, This table is already reserved");
            }
        }

        $reservation = Reservation::find($id);
        $reservation->update($request->validated());
        return redirect("admin/reservations")->with("message", "Reservation updated successfly");
    }

    public function delete($id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();
        return redirect("admin/reservations")->with("message","Reservation Deleted Successfuly");
    }

}
