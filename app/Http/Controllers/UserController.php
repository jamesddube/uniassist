<?php

namespace App\Http\Controllers;

use App\CategoryModel;
use App\Http\Requests\CreateStudentRequest;
use App\ProgramsModel;
use App\SubjectModel;
use App\SubjectRequiredModel;
use App\Uniassist\Student;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    private $subjects;
    private $subjects_points;
    private $combination;
    private $message;
    private $cat = 0;


    public function index()
    {
        $subjects = SubjectModel::all();
        return view('student.home', compact('subjects'));
    }


    /**
     * @param CreateStudentRequest|Request $input
     * @return array
     */
    public function results(CreateStudentRequest $input)
    {

        $student = new Student($input);

        return $student->getPrograms();

    }

    private function setResults(Request $input)
    {
        if ($input->has('subject1')) {
            $this->subjects = array(

                $input->subject1,
                $input->subject2,
                $input->subject3
            );

            $this->subjects_points = array(

                $input->subject1_points,
                $input->subject2_points,
                $input->subject3_points
            );
        }
        else {
            dd('no request found');
        }

    }

    private function getPoints()
    {
        $points = null;

        for ($i = 0; $i < 3; $i++) {
            $points += $this->subjects_points[$i];
        }

        return $points;
    }

    private function calculateCombination()
    {

        $cat = CategoryModel::all();

        if ($cat != null) {

            for ($c = 0; $c < count($cat); $c++) {
                $data[$cat[$c]->category_code] = $this->getClassCount($cat[$c]->category_code, $this->subjects);
            }

            array_walk($data, array($this, 'Compare'));

            return $this->combination;
        }
        else {
            dd("error occured");
        }

    }

    private function Compare($value, $key)
    {
        if ($value > $this->cat) {
            $this->combination = $key;
        }
    }

    private function getClassCount($needle, $haystack)
    {
        $keys = array();
        foreach ($haystack as $key => $value) {
            if ($needle === $value OR (is_array($value) && $this->getClassCount(
                        $needle,
                        $value
                    ) !== FALSE)
            ) {
                $keys[] = $key;
            }
        }
        if (!empty($keys)) {
            return count($keys);
        }
        return null;
    }

    public function getProgramsByCat($category)
    {
        $programs = ProgramsModel::where('program_category', $category)->get();

        return $programs->toArray();
    }

    private function getPassedSubjects()
    {
        $passed = null;
        for ($i = 0; $i < 3; $i++)
        {
            if ($this->subjects_points[$i] > 0)
            {
                $passed[] = $this->subjects[$i];
            }
        }

        return$passed;
    }

}
