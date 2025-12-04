<?php

namespace App\Http\Controllers;

use App\Models\GoodPoint;
use App\Models\GoodPointType;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Helpers\PointsHelper;

class GoodPointController extends Controller
{
    public function index()
    {
        $points = GoodPoint::with(['student', 'type'])
            ->latest()
            ->paginate(10);

        return view('good_points.index', compact('points'));
    }

    public function create()
    {
        $students = Student::all();
        $types = GoodPointType::all();

        return view('good_points.create', compact('students', 'types'));
    }

    public function store(Request $request)
    {
        // validasi...

        $goodPoint = GoodPoint::create([
            'student_id' => $request->student_id,
            'good_point_type_id' => $request->good_point_type_id,
            'recorded_by' => auth()->id() ?? 1,
            'given_at' => $request->given_at,
            'notes' => $request->notes,
        ]);

        PointsHelper::updateSummary($request->student_id);

        return redirect()->route('good-points.index')->with('success', 'Poin kebaikan berhasil dicatat.');
    }

    public function destroy(GoodPoint $goodPoint)
    {
        $studentId = $goodPoint->student_id;
        $goodPoint->delete();

        PointsHelper::updateSummary($studentId);

        return back()->with('success', 'Poin kebaikan dihapus.');
    }
}
