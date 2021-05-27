<?php

namespace App\Repositories;

use App\Models\Lecture;
use phpDocumentor\Reflection\Utils;

class LectureRepository
{


    public function getAllLecture()
    {
        return Lecture::all();
    }

    public  function  storeLecture($data)
    {
        return Lecture::create($data);
    }

    public function updatelecture($id, $data)
    {
//        dd('asdf');
        return Lecture::find($id)->update($data);
    }

    public function destroyLecture($id)
    {
        return Lecture::destroy($id);
    }


    public function getUserByType($type)
    {
        return Lecture::where(['user_type' => $type])->orderBy('name', 'asc')->get();
    }

    public function findLectureById($id)
    {
        return Lecture::find($id);
    }

}
