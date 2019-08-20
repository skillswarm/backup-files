<?php

namespace App\Http\Controllers\Mentor;
use Auth;
use ImgUploader;
use App\User;
use App\Timeline;
use App\Mentor;
use App\Course;
use App\MentorSkill;
use App\Recommendation;
use App\MentorMessage;
use Illuminate\Http\Request;
use App\Helpers\DataArrayHelper;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Traits\CommonUserFunctions;
use App\Http\Requests\Front\MentorFrontFormRequest;

class HomeController extends Controller
{

        use CommonUserFunctions;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $nonVerified = \DB::table('mentor_profile_skills as ms')
                ->join('profile_skills as ss', 'ms.skill_id', '=', 'ss.job_skill_id')
                ->join('users as u', 'u.id', '=', 'ss.user_id')
                ->whereIn('u.verified', [0, 1])
                ->where('ms.mentor_id', Auth::guard('mentor')->user()->id)
                ->select('u.*')->groupBy('u.id')->get()->count();
      $verified = \DB::table('mentor_profile_skills as ms')
                ->join('profile_skills as ss', 'ms.skill_id', '=', 'ss.job_skill_id')
                ->join('users as u', 'u.id', '=', 'ss.user_id')
                ->whereIn('u.verified', [2])
                ->where('ms.mentor_id', Auth::guard('mentor')->user()->id)
                ->select('u.*')
                ->select('u.*')->groupBy('u.id')->get()->count();
      $messages = MentorMessage::where('mentor_id','=',Auth::guard('mentor')->user()->id)->get()->count();

        return view('mentor.home')
                      ->with('nonVerified',$nonVerified)
                      ->with('verified',$verified)
                      ->with('messages',$messages);
    }

    public function myProfile()
    {
      $genders = DataArrayHelper::langGendersArray();
      $maritalStatuses = DataArrayHelper::langMaritalStatusesArray();
      $nationalities = DataArrayHelper::langNationalitiesArray();
      $countries = DataArrayHelper::langCountriesArray();
      $jobExperiences = DataArrayHelper::langJobExperiencesArray();
      $careerLevels = DataArrayHelper::langCareerLevelsArray();
      $industries = DataArrayHelper::langIndustriesArray();
      $functionalAreas = DataArrayHelper::langFunctionalAreasArray();
      $Skills = DataArrayHelper::langJobSkillsArray();

      $upload_max_filesize = UploadedFile::getMaxFilesize() / (1048576);
      $mentor = Mentor::findOrFail(Auth::guard('mentor')->user()->id);
      $SkillIds = $mentor->getSkillsArray();
      return view('mentor.profile')
                      ->with('Skills', $Skills)
                      ->with('SkillIds', $SkillIds)
                      ->with('genders', $genders)
                      ->with('maritalStatuses', $maritalStatuses)
                      ->with('nationalities', $nationalities)
                      ->with('countries', $countries)
                      ->with('jobExperiences', $jobExperiences)
                      ->with('careerLevels', $careerLevels)
                      ->with('industries', $industries)
                      ->with('functionalAreas', $functionalAreas)
                      ->with('mentor', $mentor)
                      ->with('upload_max_filesize', $upload_max_filesize);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(MentorFrontFormRequest $request)
    {
          $mentor = Mentor::findOrFail(Auth::guard('mentor')->user()->id);
          /*         * **************************************** */
          if ($request->hasFile('image')) {
          $is_deleted = $this->deleteMentorImage($mentor->id);
          $image = $request->file('image');
          $fileName = ImgUploader::UploadImage('mentor_images', $image, $request->input('name'), 300, 300, false);
          $mentor->image = $fileName;
          }
          /*         * ************************************** */
          $mentor->first_name = $request->input('first_name');
          $mentor->middle_name = $request->input('middle_name');
          $mentor->last_name = $request->input('last_name');

          $mentor->email = $request->input('email');
          if (!empty($request->input('password'))) {
          $mentor->password = Hash::make($request->input('password'));
          }
          $mentor->father_name = $request->input('father_name');
          $mentor->date_of_birth = $request->input('date_of_birth');
          $mentor->gender_id = $request->input('gender_id');
          $mentor->marital_status_id = $request->input('marital_status_id');
          $mentor->nationality_id = $request->input('nationality_id');
          $mentor->national_id_card_number = $request->input('national_id_card_number');
          $mentor->country_id = $request->input('country_id');
          $mentor->state_id = $request->input('state_id');
          $mentor->city_id = $request->input('city_id');
          $mentor->phone = $request->input('phone');
          $mentor->mobile_num = $request->input('mobile_num');
          $mentor->job_experience_id = $request->input('job_experience_id');
          $mentor->career_level_id = $request->input('career_level_id');
          $mentor->industry_id = $request->input('industry_id');
          $mentor->functional_area_id = $request->input('functional_area_id');
          $mentor->current_salary = $request->input('current_salary');
          $mentor->expected_salary = $request->input('expected_salary');
          $mentor->salary_currency = $request->input('salary_currency');
          $mentor->street_address = $request->input('street_address');
          $mentor->update();

          $this->storeSkills($request, $mentor->id);

          flash(__('You have updated your profile successfully'))->success();
          return \Redirect::route('mentor.my-profile');
    }

    private function storeSkills($request, $mentor_id)
    {
        if ($request->has('skills')) {
            MentorSkill::where('mentor_id', '=', $mentor_id)->delete();
            $skills = $request->input('skills');
            foreach ($skills as $skill_id) {
                $mentorSkill = new MentorSkill();
                $mentorSkill->mentor_id = $mentor_id;
                $mentorSkill->skill_id = $skill_id;
                $mentorSkill->save();
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function assignedProfiles()
    {
        $mentor = Auth::guard('mentor')->user();
        if ((bool)$mentor->is_active === false) {
             flash(__('Your account is inactive contact site admin to activate it'))->error();
             return \Redirect::route('mentor.home');
             exit;
         }
        $users = \DB::table('mentor_profile_skills as ms')
                  ->join('profile_skills as ss', 'ms.skill_id', '=', 'ss.job_skill_id')
                  ->join('users as u', 'u.id', '=', 'ss.user_id')
                  ->whereIn('u.verified', [0, 1])
                  ->where('ms.mentor_id', Auth::guard('mentor')->user()->id)
                  ->select('u.*')->groupBy('u.id')->get();

          return view('mentor.list_profiles')->with('users',$users);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verifiedProfiles()
    {
      $mentor = Auth::guard('mentor')->user();
      if ((bool)$mentor->is_active === false) {
           flash(__('Your account is inactive contact site admin to activate it'))->error();
           return \Redirect::route('mentor.home');
           exit;
       }
        $users = \DB::table('mentor_profile_skills as ms')
                  ->join('profile_skills as ss', 'ms.skill_id', '=', 'ss.job_skill_id')
                  ->join('users as u', 'u.id', '=', 'ss.user_id')
                  ->whereIn('u.verified', [2])
                  ->where('ms.mentor_id', Auth::guard('mentor')->user()->id)
                  ->select('u.*')->groupBy('u.id')->get();

        return view('mentor.list_profiles')->with('users',$users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function viewUserProfile($id)
    {
        $user = User::findOrFail($id);
        $profileCv = $user->getDefaultCv();
        $recommendation = Recommendation::where('candidate_id', '=', $id)->first();
        $courses = Course::all();
        return view('mentor.view_profile')
                          ->with('recommendation',$recommendation)
                          ->with('profileCv', $profileCv)
                          ->with('courses',$courses)
                          ->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function submitRecommendation(Request $request, $user_id)
    {
          $request->validate([
              'message' => 'required|max:500',
          ]);

        $rec_id = Recommendation::where('candidate_id', '=', $user_id)->first();
        Recommendation::where('candidate_id', '=', $user_id)->delete();
        if(!empty($rec_id)){
        MentorMessage::where('recommendation_id',$rec_id->id)->delete();
        }

        $Recommendation = new Recommendation();
        $Recommendation->mentor_id = Auth::guard('mentor')->user()->id;
        $Recommendation->candidate_id = $user_id;
        $Recommendation->message = $request->input('message');
        $Recommendation->course_id = $request->input('course_id');
        $Recommendation->save();

        return response()->json(array('success' => true, 'status' => 200), 200);
    }

    public function changeToProgress(Request $request)
    {
        $user_id = $request->input('id');
        try {
            $user = User::findOrFail($user_id);
            $user->verified = 1;
            $user->save();
                /*  Activity Log */
                $log = new Timeline();
                $log->user_id = $user->id;
                $log->activity_type = 'BACKGROUND CHECK IN PROGRESS';
                $log->comment = 'Mentor is verifying profile.';
                $log->save();
            echo 'ok';
        } catch (ModelNotFoundException $e) {
            echo 'notok';
        }
    }

    public function changeToVerified(Request $request)
    {
        $user_id = $request->input('id');
        try {
            $user = User::findOrFail($user_id);
            $user->is_active = 1;
            $user->verified = 2;
            $user->save();
                /*  Activity Log */
                $log = new Timeline();
                $log->user_id = $user->id;
                $log->activity_type = 'PROFILE VERIFIED';
                $log->comment = 'Profile is verified by Mentor.';
                $log->save();

            echo 'ok';
        } catch (ModelNotFoundException $e) {
            echo 'notok';
        }
    }

    public function myMessages()
    {
      $mentor = Auth::guard('mentor')->user();
      if ((bool)$mentor->is_active === false) {
           flash(__('Your account is inactive contact site admin to activate it'))->error();
           return \Redirect::route('mentor.home');
           exit;
       }
        $messages = MentorMessage::where('mentor_id','=',Auth::guard('mentor')->user()->id)->get();
        return view('mentor.messages')
                          ->with('messages',$messages);
    }

    public function messagesDetail($id)
    {
        $mentorMessage = MentorMessage::find($id);
        return view('mentor.message-detail')
                          ->with('mentorMessage',$mentorMessage);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
