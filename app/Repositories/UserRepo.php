<?php

namespace App\Repositories;

use App\Models\BloodGroup;
use App\Models\StaffRecord;
use App\Models\StudentsInstruction;
use App\Models\StudentsNotifications;
use App\Models\StudentsUpdates;
use App\Models\TeachersInstruction;
use App\Models\TeachersNotifications;
use App\Models\TeachersUpdates;
use App\Models\UserType;
use App\User;


class UserRepo {


    public function update($id, $data)
    {
        return User::find($id)->update($data);
    }

    public function delete($id)
    {
        return User::destroy($id);
    }

    public function create($data)
    {
        return User::create($data);
    }

    public function getUserByType($type)
    {
        return User::where(['user_type' => $type])->orderBy('name', 'asc')->get();
    }

    public function getAllTypes()
    {
        return UserType::all();
    }

    public function findType($id)
    {
        return UserType::find($id);
    }

    public function find($id)
    {
        return User::find($id);
    }

    public function getAll()
    {
        return User::orderBy('name', 'asc')->get();
    }

    public function getPTAUsers()
    {
        return User::where('user_type', '<>', 'student')->orderBy('name', 'asc')->get();
    }

    /********** STAFF RECORD ********/
    public function createStaffRecord($data)
    {
        return StaffRecord::create($data);
    }

    public function updateStaffRecord($where, $data)
    {
        return StaffRecord::where($where)->update($data);
    }

    /********** BLOOD GROUPS ********/
    public function getBloodGroups()
    {
        return BloodGroup::orderBy('name')->get();
    }

    public function getAllStudentNotifications()
    {
        return StudentsNotifications::where('status', 'active')->latest()->get();
    }
    public function getAllStudentInstructions()
    {
        return StudentsInstruction::where('status', 'active')->get();
    }
    public function getAllStudentUpdates()
    {
        return StudentsUpdates::where('status', 'active')->latest()->get();
    }
    public function getAllTeacherNotifications()
    {
        return TeachersNotifications::where('status', 'active')->latest()->get();
    }
    public function getAllTeacherInstructions()
    {
        return TeachersInstruction::where('status', 'active')->latest()->get();
    }
    public function getAllTeacherUpdates()
    {
        return TeachersUpdates::where('status', 'active')->latest()->get();
    }
    public function getAllInActiveStudents()
    {
        return User::where('status', 0)
            ->where('user_type','student')
            ->latest()
            ->get();
    }
    public function getAllActiveStudents()
    {
        return User::where('status', 1)
            ->where('user_type','student')
            ->latest()
            ->get();
    }
    public function setStudentActive($sr_id,$data)
    {
        return User::find($sr_id)->update($data);
    }
    public function setStudentInActive($sr_id,$data)
    {
        return User::find($sr_id)->update($data);
    }
    public function getAllInActiveTeachers()
    {
        return User::where('status', 0)
            ->where('user_type','teacher')
            ->latest()
            ->get();
    }
    public function getAllActiveTeachers()
    {
        return User::where('status', 1)
            ->where('user_type','teacher')
            ->latest()
            ->get();
    }
    public function setTeacherActive($sr_id,$data)
    {
        return User::find($sr_id)->update($data);
    }
    public function setTeacherInActive($sr_id,$data)
    {
        return User::find($sr_id)->update($data);
    }
}
