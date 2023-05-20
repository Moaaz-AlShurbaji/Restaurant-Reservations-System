<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TableRequest;
use Illuminate\Http\Request;
use App\Models\Table;

class TableController extends Controller
{
    public function index()
    {
        $tables = Table::get();
        return view("admin.tables.index", compact("tables"));
    }

    public function create()
    {
        return view("admin/tables/create");
    }

    public function store(TableRequest $request)
    {
        if($request->validated())
        {
            Table::create([
                "name" => $request->name,
                "description" => $request->description,
                "guest_number" => $request->guest_number,
                "status" => $request->status,
                "location" => $request->location
            ]);
        }

        return redirect("admin/tables")->with("message","Table Added Successfuly");
    }

    public function edit($id)
    {
        $table = Table::find($id);
        return view("admin/tables/edit", compact("table"));
    }

    public function update(TableRequest $request, $id)
    {
        $table = Table::find($id);

        if($request->validated())
        {
            $table->update([
                "name" => $request->name,
                "guest_number" => $request->guest_number,
                "status" => $request->status,
                "location" => $request->location
            ]);
        }

        return redirect("admin/tables")->with("message","Table updated successfuly");
    }

    public function delete($id)
    {
        $table = Table::find($id);
        $table->delete();
        return redirect("admin/tables")->with("message","Table deleted successfuly");
    }
}
