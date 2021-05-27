<?php

namespace App\Repositories;

//use App\Models\StudentRecord;
use App\Models\Dorm;
use App\Models\StudentRecord;
use App\Models\Teacher;

class TeacherRepository
{
    public function __constuct()
    {
        //
    }
    public function getTeacherData()
    {
        return Teacher::with('section')->get();
    }
    public function getRecord(array $data_id)
    {
        $result =  $this->AllTeacher($data_id);
        return $result;
    }
    public function AllTeacher($data_id)
    {
        $teachers =  Teacher::with('user')->where('id',$data_id)->get();
        return $teachers;
    }
    public function getAllDorms()
    {
        return Dorm::orderBy('name', 'asc')->get();
    }
    public function updateRecord($id, array $data)
    {
        return Teacher::find($id)->update($data);
    }
    public function getAllTeachers()
    {
        return Teacher::all();
    }

}
