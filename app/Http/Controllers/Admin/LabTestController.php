<?php

namespace App\Http\Controllers\Admin;

use App\Models\LabTest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LabTestController extends Controller
{
    public function index()
    {
        $labTests = LabTest::latest()->paginate(10);
        return view('admin.lab-tests.index', compact('labTests'));
    }

    public function create()
    {
        return view('admin.lab-tests.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:lab_tests,name',
            'is_active' => 'boolean',
        ]);

        LabTest::create($validated);

        return redirect()->route('admin.lab-tests.index')
                       ->with('success', 'Lab Test created successfully');
    }

    public function edit(LabTest $labTest)
    {
        return view('admin.lab-tests.edit', compact('labTest'));
    }

    public function update(Request $request, LabTest $labTest)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:lab_tests,name,' . $labTest->id,
            'is_active' => 'boolean',
        ]);

        $labTest->update($validated);

        return redirect()->route('admin.lab-tests.index')
                       ->with('success', 'Lab Test updated successfully');
    }

    public function destroy(LabTest $labTest)
    {
        $labTest->delete();

        return redirect()->route('admin.lab-tests.index')
                       ->with('success', 'Lab Test deleted successfully');
    }
}
