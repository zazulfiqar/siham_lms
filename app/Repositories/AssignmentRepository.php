<?php

namespace App\Repositories;

use App\Models\CourseRegistration;
use App\Models\StudentAssignment;
use App\Models\TeacherAssignment;

class AssignmentRepository
{
    public function __constuct()
    {
        //
    }


//     Teacher functions


    public function all()
    {
        return TeacherAssignment::orderBy('created_at', 'asc')->get();
    }

//    public function getExam($data)
//    {
//        return TeacherAssignment::where($data)->get();
//    }

    public function find($id)
    {
        return TeacherAssignment::find($id);
    }

    public function create($data)
    {
//        dd($data);
        return TeacherAssignment::create($data);
    }

//    public function createRecord($data)
//    {
//        return TeacherAssignment::firstOrCreate($data);
//    }

    public function update($id, $data)
    {
//        dd($id);
        return TeacherAssignment::find($id)->update($data);
    }

    public function updateRecord($where, $data)
    {
        return TeacherAssignment::where($where)->update($data);
    }

    public function getRecord($data)
    {
        return TeacherAssignment::where($data)->get();
    }

    public function delete($data)
    {
        return TeacherAssignment::destroy($data);
    }

    public function getAssignmentWithCourseId($courseRegs)
    {
        return  TeacherAssignment::whereIn('course_id', [1, 2, 3])
            ->get();
    }

    public  function getStdWithCourses($std_id)
    {
        return  CourseRegistration::where('user_id',$std_id)->pluck('courses_id');

    }


// teacher functions ends here



// student function starts here

    public function allStd()
    {
        return StudentAssignment::orderBy('created_at', 'asc')->get();
    }
    public function findStd($id)
    {
        return StudentAssignment::find($id);
    }

    public function createStd($data)
    {
//        dd($data);
        return StudentAssignment::create($data);
    }
    public function updateStd($id, $data)
    {
//        dd($id);
        return StudentAssignment::find($id)->update($data);
    }

    public function updateRecordStd($where, $data)
    {
        return StudentAssignment::where($where)->update($data);
    }

    public function getStdRecord($data)
    {
        return StudentAssignment::where($data)->get();
    }

    public function deleteStd($data)
    {
        return StudentAssignment::destroy($data);
    }



// students functions ends here
}
