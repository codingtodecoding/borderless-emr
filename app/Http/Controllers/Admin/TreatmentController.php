<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Treatment;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $treatments = Treatment::latest()->paginate(10);
        return view('admin.treatments.index', compact('treatments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.treatments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:treatments,name',
        ]);

        Treatment::create($validated);

        return redirect()
            ->route('admin.treatments.index')
            ->with('success', 'Treatment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Treatment $treatment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $treatment = Treatment::findOrFail($id);
        return view('admin.treatments.edit', compact('treatment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:treatments,name,' . $id,
        ]);

        $treatment = Treatment::findOrFail($id);
        $treatment->update([
            'name' => $request->name
        ]);

        return redirect()
            ->route('admin.treatments.index')
            ->with('success', 'Treatment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $treatment = Treatment::findOrFail($id);
            $treatment->delete();

            return redirect()
                ->route('admin.treatments.index')
                ->with('success', 'Treatment deleted successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.treatments.index')
                ->with('error', 'Something went wrong while deleting.');
        }
    }
}
