<?php

namespace App\Repositories;

use App\Models\Policy;

class PolicyRepository
{
    public function __constuct()
    {
        //
    }
    public function create($data)
    {
        return Policy::create($data);
    }
    public function all()
    {
        return Policy::orderBy('role_type', 'asc')->get();
    }
    public function teacher_policy()
    {
        return Policy::where('role_type','teacher')->orderBy('role_type', 'asc')->get();
    }
    public function student_policy()
    {
        return Policy::where('role_type','student')->orderBy('role_type', 'asc')->get();
    }
    public function find($id)
    {
        return Policy::find($id);
    }
    public function update($id, $data)
    {
        return Policy::find($id)->update($data);
    }

}
