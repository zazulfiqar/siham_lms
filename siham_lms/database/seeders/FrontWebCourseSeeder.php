<?php

namespace Database\Seeders;

use App\Models\FrontCourse;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FrontWebCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('front_courses')->delete();

        $data = [
            ['course_id' => 1, 'content' => 'Algebra I'],
            ['course_id' => 1, 'content' => 'Algebra II'],
            ['course_id' => 1, 'content' => 'Algebra in Spanish'],
            ['course_id' => 1, 'content' => 'Applied Calculus'],
            ['course_id' => 1, 'content' => 'Basic Math'],
            ['course_id' => 1, 'content' => 'Basic Math in Spanish'],
            ['course_id' => 1, 'content' => 'Business Statistics'],
            ['course_id' => 1, 'content' => 'Calculus I, II, III, IV'],
            ['course_id' => 1, 'content' => 'Calculus BC'],
            ['course_id' => 1, 'content' => 'Calculus in Spanish'],
            ['course_id' => 1, 'content' => 'College Algebra'],
            ['course_id' => 1, 'content' => 'Differential Equations'],
            ['course_id' => 1, 'content' => 'Discrete Math'],
            ['course_id' => 1, 'content' => 'Finite Math'],
            ['course_id' => 1, 'content' => 'Geometry'],
            ['course_id' => 1, 'content' => 'Geometry in Spanish'],
            ['course_id' => 1, 'content' => 'Intermediate Statistics'],
            ['course_id' => 1, 'content' => 'Linear Algebra'],
            ['course_id' => 1, 'content' => 'Matrix Algebra'],
            ['course_id' => 1, 'content' => 'Multivariable Calculus'],
            ['course_id' => 1, 'content' => 'Pre-Algebra'],
            ['course_id' => 1, 'content' => 'Pre-Algebra in Spanish'],
            ['course_id' => 1, 'content' => 'Pre-Calculus'],
            ['course_id' => 1, 'content' => 'Quantitative Methods'],
            ['course_id' => 1, 'content' => 'Quantitative Reasoning'],
            ['course_id' => 1, 'content' => 'Statistics'],
            ['course_id' => 1, 'content' => 'Statistics in Spanish'],
            ['course_id' => 1, 'content' => 'Trigonometry'],
            ['course_id' => 1, 'content' => 'Trigonometry in Spanish'],
            ['course_id' => 1, 'content' => 'Vector Algebra'],


            ['course_id' => 2, 'content' => 'American Literature'],
            ['course_id' => 2, 'content' => 'British Literature'],
            ['course_id' => 2, 'content' => 'Composition I, II'],
            ['course_id' => 2, 'content' => 'Drama'],
            ['course_id' => 2, 'content' => 'English Language Use for ELL'],
            ['course_id' => 2, 'content' => 'Fiction'],
            ['course_id' => 2, 'content' => 'Grammar'],
            ['course_id' => 2, 'content' => 'Literature, General'],
            ['course_id' => 2, 'content' => 'Non-Fiction Literature'],
            ['course_id' => 2, 'content' => 'Poetry'],
            ['course_id' => 2, 'content' => 'Reading Comprehension'],
            ['course_id' => 2, 'content' => 'Reading - College Level'],
            ['course_id' => 2, 'content' => 'Vocabulary'],
            ['course_id' => 2, 'content' => 'World Literature'],


            ['course_id' => 3,'content' => 'Algebra I'],
            ['course_id' => 3,'content' => 'Algebra II'],
            ['course_id' => 3,'content' => 'Algebra in Spanish'],
            ['course_id' => 3,'content' => 'Applied Calculus'],
            ['course_id' => 3,'content' => 'Basic Math'],
            ['course_id' => 3,'content' => 'Basic Math in Spanish'],
            ['course_id' => 3,'content' => 'Business Statistics'],
            ['course_id' => 3,'content' => 'Calculus I, II, III, IV'],
            ['course_id' => 3,'content' => 'Calculus BC'],
            ['course_id' => 3,'content' => 'Calculus in Spanish'],
            ['course_id' => 3,'content' => 'College Algebra'],
            ['course_id' => 3,'content' => 'Differential Equations'],
            ['course_id' => 3,'content' => 'Discrete Math'],
            ['course_id' => 3,'content' => 'Finite Math'],
            ['course_id' => 3,'content' => 'Geometry'],
            ['course_id' => 3,'content' => 'Geometry in Spanish'],
            ['course_id' => 3,'content' => 'Intermediate Statistics'],
            ['course_id' => 3,'content' => 'Linear Algebra'],
            ['course_id' => 3,'content' => 'Matrix Algebra'],
            ['course_id' => 3,'content' => 'Multivariable Calculus'],
            ['course_id' => 3,'content' => 'Pre-Algebra'],
            ['course_id' => 3,'content' => 'Pre-Algebra in Spanish'],
            ['course_id' => 3,'content' => 'Pre-Calculus'],
            ['course_id' => 3,'content' => 'Quantitative Methods'],
            ['course_id' => 3,'content' => 'Quantitative Reasoning'],
            ['course_id' => 3,'content' => 'Statistics'],
            ['course_id' => 3,'content' => 'Statistics in Spanish'],
            ['course_id' => 3,'content' => 'Trigonometry'],
            ['course_id' => 3,'content' => 'Trigonometry in Spanish'],
            ['course_id' => 3,'content' => 'Vector Algebra'],


            ['course_id' => 4,'content' => 'Technology I'],
            ['course_id' => 4,'content' => 'Technology II'],
            ['course_id' => 4,'content' => 'Technology in Spanish'],
            ['course_id' => 4,'content' => 'Applied Technology'],
            ['course_id' => 4,'content' => 'Basic Math'],
            ['course_id' => 4,'content' => 'Basic Math in Spanish'],
            ['course_id' => 4,'content' => 'Business Statistics'],
            ['course_id' => 4,'content' => 'Technology I, II, III, IV'],
            ['course_id' => 4,'content' => 'Technology BC'],
            ['course_id' => 4,'content' => 'Technology in Spanish'],
            ['course_id' => 4,'content' => 'College Algebra'],
            ['course_id' => 4,'content' => 'Differential Equations'],
            ['course_id' => 4,'content' => 'Discrete Math'],
            ['course_id' => 4,'content' => 'Finite Math'],
            ['course_id' => 4,'content' => 'Geometry'],
            ['course_id' => 4,'content' => 'Geometry in Spanish'],
            ['course_id' => 4,'content' => 'Intermediate Statistics'],
            ['course_id' => 4,'content' => 'Technology'],
            ['course_id' => 4,'content' => 'Matrix Algebra'],
            ['course_id' => 4,'content' => 'Multivariable Calculus'],

            ['course_id' => 5,'content' => 'American Literature'],
            ['course_id' => 5,'content' => 'British Literature'],
            ['course_id' => 5,'content' => 'Composition I, II'],
            ['course_id' => 5,'content' => 'Drama'],
            ['course_id' => 5,'content' => 'English Language Use for ELL'],
            ['course_id' => 5,'content' => 'Fiction'],
            ['course_id' => 5,'content' => 'Grammar'],
            ['course_id' => 5,'content' => 'Literature, General'],
            ['course_id' => 5,'content' => 'Non-Fiction Literature'],
            ['course_id' => 5,'content' => 'Poetry'],
            ['course_id' => 5,'content' => 'Reading Comprehension'],
            ['course_id' => 5,'content' => 'Reading - College Level'],
            ['course_id' => 5,'content' => 'Vocabulary'],
            ['course_id' => 5,'content' => 'World Literature'],

            ['course_id' => 6,'content' => 'Business'],
            ['course_id' => 6,'content' => 'Business 2'],
            ['course_id' => 6,'content' => 'Business I, II'],
            ['course_id' => 6,'content' => 'Business'],
            ['course_id' => 6,'content' => 'Business Language Use for ELL'],
            ['course_id' => 6,'content' => 'Business Methods'],
            ['course_id' => 6,'content' => 'Business Reasoning'],
            ['course_id' => 6,'content' => 'Statistics'],
            ['course_id' => 6,'content' => 'Statistics in Spanish'],
            ['course_id' => 6,'content' => 'Trigonometry'],
            ['course_id' => 6,'content' => 'Trigonometry in Spanish'],
            ['course_id' => 6,'content' => 'Vector Algebra'],

        ];

        DB::table('front_courses')->insert($data);

    }
}


