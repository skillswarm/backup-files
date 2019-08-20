<?php

namespace App\Http\Controllers;
use Auth;
use App\Course;
use App\CourseSkillManager;
use App\Helpers\DataArrayHelper;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skill_provider = Auth::guard('skill_provider')->user();
        if ((bool)$skill_provider->is_active === false) {
             flash(__('Your account is inactive contact site admin to activate it'))->error();
             return \Redirect::route('skill-provider.home');
             exit;
         }
        $courses = Course::where('skill_provider_id',Auth::guard('skill_provider')->user()->id)->paginate(5);
        return view('courses.list')->with('courses',$courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $skill_provider = Auth::guard('skill_provider')->user();
          if ((bool)$skill_provider->is_active === false) {
               flash(__('Your account is inactive contact site admin to activate it'))->error();
               return \Redirect::route('skill-provider.home');
               exit;
           }
          $Skills = DataArrayHelper::langJobSkillsArray();
          $courseSkillIds = array();
          return view('courses.add')
                    ->with('Skills', $Skills)
                    ->with('courseSkillIds', $courseSkillIds);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = $request->validate([
                  'title' => 'required|max:255',
                  'description' => 'required',
                  'skills' => 'required',
                  'duration' => 'required',
                  'fees' => 'required|numeric',
                  ]);

        $course = new Course();
        $course->skill_provider_id = Auth::guard('skill_provider')->user()->id;
        $course->title = $request->title;
        $course->description = $request->description;
        $course->duration = $request->duration;
        $course->fees = $request->fees;
        $course->is_active = $request->is_active;
        $course->save();

        $this->storeCourseSkills($request, $course->id);
        // $this->storeTaskSkillsNotifications($request, $task->id);
        // event(new JobPosted($job));
        flash('Course has been added!')->success();
        return \Redirect::route('skill-provider.editSkillCourse', array($course->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Skills = DataArrayHelper::langJobSkillsArray();
        $course = Course::findOrFail($id);
        $courseSkillIds = CourseSkillManager::where('course_id', '=', $id)->get()->pluck('skill_id');
        return view('courses.add')
                  ->with('course', $course)
                  ->with('Skills', $Skills)
                  ->with('courseSkillIds', $courseSkillIds);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $courses = Course::where('skill_provider_id',Auth::guard('skill_provider')->user()->id)
                          ->where('is_active',1)->get();
        return view('courses.active_course')->with('courses',$courses);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          $course = $request->validate([
                    'title' => 'required|max:255',
                    'description' => 'required',
                    'skills' => 'required',
                    'duration' => 'required',
                    'fees' => 'required|numeric',
                    ]);

          $course =  Course::findOrFail($id);
          $course->title = $request->title;
          $course->description = $request->description;
          $course->duration = $request->duration;
          $course->fees = $request->fees;
          $course->is_active = $request->is_active;
          $course->save();

          $this->storeCourseSkills($request, $course->id);

          flash('Course has been updated!')->success();
          return \Redirect::route('skill-provider.editSkillCourse', array($course->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        try {
            $course= Course::findOrFail($id);
            CourseSkillManager::where('course_id', '=', $id)->delete();
            $course->delete();
            return 'ok';
        } catch (ModelNotFoundException $e) {
            return 'notok';
        }
    }

    private function storeCourseSkills($request, $course_id)
    {
        if ($request->has('skills')) {
            CourseSkillManager::where('course_id', '=', $course_id)->delete();
            $skills = $request->input('skills');
            foreach ($skills as $skill_id) {
                $courseSkill = new CourseSkillManager();
                $courseSkill->course_id = $course_id;
                $courseSkill->skill_id = $skill_id;
                $courseSkill->save();
            }
        }
    }

}
