<?php
/**
 * Created by PhpStorm.
 * User: james
 * Date: 9/4/15
 * Time: 8:52 PM
 */

namespace App\Uniassist;


use App\CategoryModel;
use App\ProgramsModel;
use App\SubjectModel;
use App\SubjectRequiredModel;
use Illuminate\Http\Request;

class Student
{

    private $subjects;
    private $subjects_points;
    private $total_points;
    private $passed_subjects;
    private $combination;
    private $cat = 0;
    private $programs_draft;

    public function __construct($subjects)
    {
        $this->init($subjects);
    }

    private function init($subjects)
    {
        $this->setResults($subjects);
        $this->setPoints();
        $this->setCombination();
        $this->setPassedSubjects();
        $this->setPrograms();
        $this->checkRequiredSubjects();

    }

    private function setCombination()
    {
        $cat = CategoryModel::all();

        if ($cat != null) {

            for ($c = 0; $c < count($cat); $c++) {
                $data[$cat[$c]->category_code] = $this->getClassCount($cat[$c]->category_code, $this->subjects[$c]);
            }

            array_walk($data, array($this, 'Compare'));

            return $this->combination;
        }
        else {
            dd("error occured");
        }
    }

    private function setResults(Request $input)
    {
        $sub = array($input->subject1,$input->subject2,$input->subject3);
        $subjects = array() ;
        //get the subjects from the db
        for($i = 0 ; $i < 3 ; $i++)
        {
            $this->subjects[] = SubjectModel::where('subject_code',$sub[$i])->first()->toArray();
        }

        //$this->subjects = $subjects;

        $this->subjects_points = array(

                $input->subject1_points,
                $input->subject2_points,
                $input->subject3_points
        );
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

    private function setPassedSubjects()
    {
        $passed = null;
        for ($i = 0; $i < count($this->subjects); $i++)
        {
            if ($this->subjects_points[$i] > 0)
            {
                $passed[] = $this->subjects[$i];
            }
        }

        $this->passed_subjects = $passed == null ? 0 : $passed;
    }

    private function setPrograms()
    {
        $programs = ProgramsModel::where('program_category', $this->combination)->where('program_min_points', '<=', $this->total_points)->get();

        $this->programs_draft = $programs->toArray();
    }

    private function setPoints()
    {
        $points = 0;

        for ($i = 0; $i < 3; $i++) {
            $points += $this->subjects_points[$i];
        }

        $this->total_points = $points;
    }

    private function checkRequiredSubjects()
    {
        $rs = array();

        //if you didn't pass any subject, why bother?
        if($this->passed_subjects != 0)
        {
        //loop through all the draft programs
        for($i = 0 ; $i < count($this->programs_draft); $i++)
        {
            //Get all the required subjects
            $requiredSubjects = SubjectRequiredModel::where('program_code',$this->programs_draft[$i]['program_code'])->get()->toArray();

            //loop again
            for($s = 0; $s < count($requiredSubjects); $s++)
            {
                for($p = 0; $p < count($this->passed_subjects); $p++)
                {
                    $array[] = $this->passed_subjects[$p]['subject_code'];
                }

                if(!in_array($requiredSubjects[$s]['subject_code'],$array)) //@todo What if $this->passed_subjects is 0 and not array?
                {
                    if(!in_array($requiredSubjects[$s]['subject_code'],array("None1","None2")))
                    {
                        //flag as failed required subject failed
                        //$rs[] = $requiredSubjects[$s]['subject_code'];
                        //dd($this->passed_subjects);
                        $tmp = SubjectModel::where('subject_code',$requiredSubjects[$s]['subject_code'])->get()->toArray();

                        $rs[] = $tmp[0]['subject_name'];
                    }
                }
            }

            $this->programs_draft[$i]['subject_required'] = $rs;
            $rs = array();
        }

    }
    }

    public function getSubjects()
    {
        return $this->subjects;
    }

    public function getCombination()
    {
        return $this->combination;
    }

    public function getPrograms()
    {
        return $this->programs_draft;
    }
}