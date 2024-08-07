<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Jurnal;
use App\Models\User;
use Illuminate\Http\Request;

class JurnalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $journal = Jurnal::query()
            ->join('users as u1', 'u1.id', '=', 'jurnal.coordinator_id')
            ->join('categories as c1', 'c1.id', '=', 'jurnal.categories_id')
            ->select('jurnal.*', 'u1.name as coordinator_name', 'c1.name as categories_name')
            ->get();
        // dd($journal);

        // $journal = Jurnal::all();
        $category = Category::all();
        $coordinator = User::query()->where('role', 'coordinator')->get();
        return view(
            'jurnal.index',
            compact(
                'journal',
                'category',
                'coordinator'
            )
        );
    }

    public function create()
    {
        $category = Category::query()->orderBy('updated_at', 'DESC')->get();
        return view('jurnal.create', [
            'categories' => $category
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all())

        $validated = $request->validate([
            'coordinator_id' => 'required',
            'categories_id' => 'required',
            'timing' => 'required',
            'description' => 'required',
            'target' => 'required',
            'status' => 'required',
            'comment' => ''
        ]);

        $validated['employee_id'] = 1;

        Jurnal::query()->create($validated);

        return to_route('dashboard.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jurnal $journal)
    {
        // $category = jurnal::query()->find($journal);
        $category = Category::query()->orderBy('updated_at', 'DESC')->get();
        $coordinator = User::query()->get();

        return view('jurnal.edit', [
            'jurnal' => $journal,
            'categories' => $category,
            'coordinator' => $coordinator
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jurnal $journal)
    {
        // dd($journal);
        $validated = $request->validate([
            'coordinator_id' => 'required',
            'categories_id' => 'required',
            'timing' => 'required',
            'description' => 'required',
            'target' => 'required',
            'status' => 'required',
            'comment' => 'required'
        ]);

        // dd($validated);
        $validated['employee_id'] = 1;

        $journal->update($validated);

        return to_route('journal.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurnal $journal)
    {
        // dd($journal);
        $journal->delete();

        return to_route('journal.index');
    }
}
