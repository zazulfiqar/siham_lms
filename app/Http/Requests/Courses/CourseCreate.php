<?php

namespace App\Http\Requests\Courses;

use App\Helpers\Qs;
use Illuminate\Foundation\Http\FormRequest;

class CourseCreate extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
//            'name' => 'required|string|min:3',
//            'my_class_id' => 'required',
//            'teacher_id' => 'required',
//            'slug' => 'nullable|string|min:3',
        ];
    }

    public function attributes()
    {
        return  [
//            'my_class_id' => 'Class',
//            'teacher_id' => 'Teacher',
//            'slug' => 'Short Name',
        ];
    }

//    protected function getValidatorInstance()
//    {
//        $input = $this->all();
//
//        $input['subject_id'] = $input['subject_id'] ? Qs::decodeHash($input['subject_id']) : NULL;
//
//        $this->getInputSource()->replace($input);
//
//        return parent::getValidatorInstance();
//    }
}
