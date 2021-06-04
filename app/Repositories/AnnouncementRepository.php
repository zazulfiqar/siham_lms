<?php

namespace App\Repositories;

use App\Models\StudentsInstruction;
use App\Models\StudentsNotifications;
use App\Models\StudentsUpdates;
use App\Models\TeachersInstruction;
use App\Models\TeachersNotifications;
use App\Models\TeachersUpdates;

class AnnouncementRepository
{
    public function __constuct()
    {
        //
    }


    public function createStdInstruction($data)
    {
        return StudentsInstruction::create($data);
    }

    public function getStdInstruction()
    {
        return StudentsInstruction::all();
    }

    public function findStdInstruction($id)
    {
        return StudentsInstruction::find($id);
    }

    public function updateStdInstruction($id, $data)
    {
        return StudentsInstruction::find($id)->update($data);
    }

    public function deleteStdInstruction($id)
    {
        return StudentsInstruction::destroy($id);
    }


    public function createTeacherInstruction($data)
    {
        return TeachersInstruction::create($data);
    }

    public function getTeacherInstruction()
    {
        return TeachersInstruction::all();
    }

    public function findTeacherInstruction($id)
    {
        return TeachersInstruction::find($id);
    }

    public function updateTeacherInstruction($id, $data)
    {
        return TeachersInstruction::find($id)->update($data);
    }

    public function deleteTeacherInstruction($id)
    {
        return TeachersInstruction::destroy($id);
    }


    public function createStdNotification($data)
    {
        return StudentsNotifications::create($data);
    }

    public function getStdNotification()
    {
        return StudentsNotifications::all();
    }

    public function findStdNotification($id)
    {
        return StudentsNotifications::find($id);
    }

    public function updateStdNotification($id, $data)
    {
        return StudentsNotifications::find($id)->update($data);
    }

    public function deleteStdNotification($id)
    {
        return StudentsNotifications::destroy($id);
    }


    public function createTeacherNotification($data)
    {
        return TeachersNotifications::create($data);
    }

    public function getTeacherNotification()
    {
        return TeachersNotifications::all();
    }

    public function findTeacherNotification($id)
    {
        return TeachersNotifications::find($id);
    }

    public function updateTeacherNotification($id, $data)
    {
        return TeachersNotifications::find($id)->update($data);
    }

    public function deleteTeacherNotification($id)
    {
        return TeachersNotifications::destroy($id);
    }


    public function createStdUpdates($data)
    {
        return StudentsUpdates::create($data);
    }

    public function getStdUpdates()
    {
        return StudentsUpdates::all();
    }

    public function findStdUpdates($id)
    {
        return StudentsUpdates::find($id);
    }

    public function updateStdUpdates($id, $data)
    {
        return StudentsNotifications::find($id)->update($data);
    }

    public function deleteStdUpdates($id)
    {
        return StudentsUpdates::destroy($id);
    }


    public function createTeacherUpdates($data)
    {
        return TeachersUpdates::create($data);
    }

    public function getTeacherUpdates()
    {
        return TeachersUpdates::all();
    }

    public function findTeacherUpdates($id)
    {
        return TeachersUpdates::find($id);
    }

    public function updateTeacherUpdates($id, $data)
    {
        return TeachersUpdates::find($id)->update($data);
    }

    public function deleteTeacherUpdates($id)
    {
        return TeachersUpdates::destroy($id);
    }
}
