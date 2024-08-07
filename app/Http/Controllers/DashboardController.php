<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\Jurnal;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $journal = Jurnal::query()
            ->join('users as u2', 'u2.id', '=', 'jurnal.coordinator_id')
            ->join('users as u3', 'u3.id', '=', 'jurnal.employee_id')
            ->join('categories as c1', 'c1.id', '=', 'jurnal.categories_id')
            ->select('jurnal.*', 'u2.name as coordinator_name', 'u3.name as employee_name', 'c1.name as category_name')
            ->orderBy('updated_at', 'desc')
            ->whereDate('jurnal.created_at', '=', Carbon::today())
            ->get();
        // $journal = Jurnal::query()
        //     ->join('users as u2', 'u2.id', '=', 'jurnal.coordinator_id')
        //     ->join('categories as u3', 'u3.id', '=', 'jurnal.categories_id')
        //     ->where('employee_id', '=', Auth::user()->id)
        //     ->whereDate('jurnal.created_at', '=', Carbon::today())
        //     ->select('jurnal.*', 'u2.name as coordinator_name', 'u3.name as categories_name')
        //     ->orderBy('updated_at', 'desc')
        //     ->get();

        // $journal = Jurnal::query()
        //     ->join('users as u2', 'u2.id', '=', 'journal.coordinator_id')
        //     ->join('categories as u3', 'u3.id', '=', 'journal.categories_id')
        //     ->where('employee_id', '=', Auth::user()->id)
        //     ->select('journal.*', 'u2.name as coordinator_name', 'u3.name as categories_name')
        // ->get();

        // dd($journal);
        // $journal = Journal::all();

        $categories = Category::all();
        $coordinator = User::query()->where('role', 'coordinator')->get();

        return view('dashboard.dashboard', compact('journal', 'categories', 'coordinator'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function edit($id)
    {
        $category = Category::query()->orderBy('updated_at', 'DESC')->get();
        $journal = Jurnal::find($id);
        $coordinator = User::query()->get();
        return view('dashboard.edit', [
            'journal' => $journal,
            'category' => $category,
            'coordinator' => $coordinator
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $journal = Jurnal::find($id);
        // dd($request)->all();
        $validated = $request->validate([
            'coordinator_id' => 'required',
            'categories_id' => 'required',
            'timing' => 'required',
            'description' => 'required',
            'target' => 'required',
            'status' => 'required',
            'comment' => 'required',
        ]);
        // dd($validated);
        $validated['employee_id'] = Auth::user()->id;
        $journal->update($validated);
        return to_route('dashboard.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // dd($id);
        $journal = Jurnal::find($id);

        $journal->delete();

        return to_route('dashboard.index');
    }
}
