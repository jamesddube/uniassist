<?php

namespace App\Http\Controllers;

use App\CategoryModel;
use App\ProgramsModel;
use App\SubjectModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    private $subjects;
    private $subjects_points;
    private $combination;
    private $cat = 0;


    public function index()
    {
        $subjects = SubjectModel::all();
        return view('student.home', compact('subjects'));
    }


    public function results(Request $input)
    {
        $this->setResults($input);

        return $this->getProgramsByCat($this->calculateCombination());
    }

    private function setResults($input)
    {
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

        for ($c = 0; $c < count($cat); $c++)
        {
           $data[$cat[$c]->category_code] = $this->getClassCount($cat[$c]->category_code,$this->subjects);
        }

        array_walk($data,array($this,'Compare'));

        /*return $this->ras('HCS528',$this->subjects);
        echo "<pre>";
        var_dump($cat->toArray());
        var_dump($this->subjects);
        var_dump($data);
*/
        return $this->combination;

    }

    private function Compare($value,$key)
    {
        if($value > $this->cat)
        {
            $this->combination = $key;
        }
    }

    private function getClassCount($needle, $haystack) {
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
        $programs = ProgramsModel::where('program_category',$category)->get();

        return $programs;
    }

}
