<?php

namespace App\Http\Controllers;

use App\Models\Violation;
use App\Models\ViolationType;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Helpers\PointsHelper;

class ViolationController extends Controller
{
    public function index()
    {
        $violations = Violation::with(['student', 'type'])
            ->latest()
            ->paginate(10);

        return view('violations.index', compact('violations'));
    }

    public function create()
    {
        $students = Student::all();
        $types = ViolationType::all();

        return view('violations.create', compact('students', 'types'));
    }

    public function store(Request $request)
    {
        // ...validasi

        $violation = Violation::create([
            'student_id' => $request->student_id,
            'violation_type_id' => $request->violation_type_id,
            'reported_by' => auth()->id() ?? 1,
            'violation_date' => $request->violation_date,
            'notes' => $request->notes,
        ]);

        PointsHelper::updateSummary($request->student_id);

        return redirect()->route('violations.index')->with('success', 'Pelanggaran berhasil dicatat.');
    }

    
    public function destroy(Violation $violation)
    {
        $studentId = $violation->student_id;
        $violation->delete();

        PointsHelper::updateSummary($studentId);

        return back()->with('success', 'Data pelanggaran dihapus.');
    }
}
