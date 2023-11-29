<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StudentRequest;
use App\Models\Student;
use App\Services\Student\StudentService;
use Illuminate\Http\Request;

class StudentController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct(
    protected StudentService $studentService,
  ) {
    // 
  }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $students = $this->studentService->getPaginate();
    return response()->json([
      'students' => $students,
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StudentRequest $request)
  {
    $this->studentService->handleStoreData($request);
    return response()->json([
      'message' => 'Successfully Added Data!'
    ]);
  }

  /**
   * Display the specified resource.
   */
  public function show(Student $student)
  {
    $student->gender = $student->genderLabel;

    return response()->json([
      'student' => $student
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(StudentRequest $request, Student $student)
  {
    $this->studentService->handleUpdateData($request, $student->id);
    return response()->json([
      'message' => 'Successfully Updated Data!'
    ]);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Student $student)
  {
    $student->delete();
    return response()->json([
      'message' => 'Successfully Deleted Data!'
    ]);
  }
}
