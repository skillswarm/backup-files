<?php

namespace App\Http\Controllers\Admin;

use ImgUploader;
use App\Mentor;
use App\Helpers\DataArrayHelper;
use App\Traits\CommonUserFunctions;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use DataTables;
use App\Http\Requests\MentorFormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;

class MentorController extends Controller
{
    use CommonUserFunctions;

    public function __construct()
    {
        //
    }

    public function indexMentors()
    {
        return view('admin.mentor.index');
    }

    public function createMentor()
    {
          $genders = DataArrayHelper::defaultGendersArray();
          $maritalStatuses = DataArrayHelper::defaultMaritalStatusesArray();
          $nationalities = DataArrayHelper::defaultNationalitiesArray();
          $countries = DataArrayHelper::defaultCountriesArray();
          $jobExperiences = DataArrayHelper::defaultJobExperiencesArray();
          $careerLevels = DataArrayHelper::defaultCareerLevelsArray();
          $industries = DataArrayHelper::defaultIndustriesArray();
          $functionalAreas = DataArrayHelper::defaultFunctionalAreasArray();
          $upload_max_filesize = UploadedFile::getMaxFilesize() / (1048576);

          return view('admin.mentor.add')
                        ->with('genders', $genders)
                        ->with('maritalStatuses', $maritalStatuses)
                        ->with('nationalities', $nationalities)
                        ->with('countries', $countries)
                        ->with('jobExperiences', $jobExperiences)
                        ->with('careerLevels', $careerLevels)
                        ->with('industries', $industries)
                        ->with('functionalAreas', $functionalAreas)
                        ->with('upload_max_filesize', $upload_max_filesize);
    }

    public function storeMentor(MentorFormRequest $request)
    {
          $mentor = new Mentor();
          /*         * **************************************** */
          if ($request->hasFile('image')) {
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
          $mentor->is_active = $request->input('is_active');
          $mentor->verified = $request->input('verified');
          $mentor->is_seen = 1;
          $mentor->save();

          flash('Mentor has been added!')->success();
          return \Redirect::route('edit.mentor', array($mentor->id));
    }

    public function editMentor($id)
    {
          $genders = DataArrayHelper::defaultGendersArray();
          $maritalStatuses = DataArrayHelper::defaultMaritalStatusesArray();
          $nationalities = DataArrayHelper::defaultNationalitiesArray();
          $countries = DataArrayHelper::defaultCountriesArray();
          $jobExperiences = DataArrayHelper::defaultJobExperiencesArray();
          $careerLevels = DataArrayHelper::defaultCareerLevelsArray();
          $industries = DataArrayHelper::defaultIndustriesArray();
          $functionalAreas = DataArrayHelper::defaultFunctionalAreasArray();

          $upload_max_filesize = UploadedFile::getMaxFilesize() / (1048576);
          $mentor = Mentor::findOrFail($id);
          $mentor->is_seen = 1;
          $mentor->save();

          return view('admin.mentor.edit')
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

    public function updateMentor($id, MentorFormRequest $request)
    {
            $mentor = Mentor::findOrFail($id);
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
            /*         * *********************** */
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
            $mentor->is_active = $request->input('is_active');
            $mentor->verified = $request->input('verified');
            $mentor->update();

            flash('Mentor has been updated!')->success();
            return \Redirect::route('edit.mentor', array($mentor->id));
    }

    public function fetchMentorsData(Request $request)
    {
        $mentors = Mentor::select(
                        [
                            'mentors.id',
                            'mentors.first_name',
                            'mentors.middle_name',
                            'mentors.last_name',
                            'mentors.email',
                            'mentors.password',
                            'mentors.phone',
                            'mentors.country_id',
                            'mentors.state_id',
                            'mentors.city_id',
                            'mentors.is_active',
                            'mentors.verified',
                            'mentors.created_at',
                            'mentors.updated_at',
                            'mentors.is_seen'
        ]);
        return Datatables::of($mentors)
                        ->filter(function ($query) use ($request) {
                            if ($request->has('id') && !empty($request->id)) {
                                $query->where('mentors.id', 'like', "{$request->get('id')}");
                            }
                            if ($request->has('name') && !empty($request->name)) {
                                $query->where(function($q) use ($request) {
                                    $q->where('mentors.first_name', 'like', "%{$request->get('name')}%")
                                    ->orWhere('mentors.middle_name', 'like', "%{$request->get('name')}%")
                                    ->orWhere('mentors.last_name', 'like', "%{$request->get('name')}%");
                                });
                            }
                            if ($request->has('email') && !empty($request->email)) {
                                $query->where('mentors.email', 'like', "%{$request->get('email')}%");
                            }
                        })
                        ->addColumn('name', function ($mentors) {
                            return $mentors->first_name . ' ' . $mentors->middle_name . ' ' . $mentors->last_name;
                        })
                        ->addColumn('action', function ($mentors) {
                            /*                             * ************************* */
                            $active_txt = 'Make Active';
                            $active_href = 'make_active(' . $mentors->id . ');';
                            $active_icon = 'square-o';
                            if ((int) $mentors->is_active == 1) {
                                $active_txt = 'Make InActive';
                                $active_href = 'make_not_active(' . $mentors->id . ');';
                                $active_icon = 'check-square-o';
                            }
                            /*                             * ************************* */
                            /*                             * ************************* */
                            $verified_txt = 'Not Verified';
                            $verified_href = 'make_verified(' . $mentors->id . ');';
                            $verified_icon = 'square-o';
                            if ((int) $mentors->verified == 1) {
                                $verified_txt = 'Verified';
                                $verified_href = 'make_not_verified(' . $mentors->id . ');';
                                $verified_icon = 'check-square-o';
                            }
                            /*                             * ************************* */
                            return '
        <div class="btn-group">
          <button class="btn blue dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action
            <i class="fa fa-angle-down"></i>
          </button>
          <ul class="dropdown-menu">
            <li>
              <a href="' . route('edit.mentor', ['id' => $mentors->id]) . '"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
            </li>
            <li>
              <a href="javascript:void(0);" onclick="delete_mentor(' . $mentors->id . ');" class=""><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</a>
            </li>
            <li>
            <a href="javascript:void(0);" onClick="' . $active_href . '" id="onclick_active_' . $mentors->id . '"><i class="fa fa-' . $active_icon . '" aria-hidden="true"></i>' . $active_txt . '</a>
            </li>
            <li>
            <a href="javascript:void(0);" onClick="' . $verified_href . '" id="onclick_verified_' . $mentors->id . '"><i class="fa fa-' . $verified_icon . '" aria-hidden="true"></i>' . $verified_txt . '</a>
            </li>
          </ul>
        </div>';
                        })
                        ->rawColumns(['action', 'name'])
                        ->setRowId(function($mentors) {
                            return 'user_dt_row_' . $mentors->id;
                        })
                        ->make(true);
    }

    public function deleteMentor(Request $request)
    {
        $mentor_id = $request->input('id');
        try {
            $this->deleteMentorImage($mentor_id);
            $mentor_id = Mentor::findOrFail($mentor_id);
            $mentor_id->delete();
            echo 'ok';
        } catch (ModelNotFoundException $e) {
            echo 'notok';
        }
    }

    public function makeActiveMentor(Request $request)
    {
        $id = $request->input('id');
        try {
            $mentor = Mentor::findOrFail($id);
            $mentor->is_active = 1;
            $mentor->is_seen = 1;
            $mentor->save();
            echo 'ok';
        } catch (ModelNotFoundException $e) {
            echo 'notok';
        }
    }

    public function makeNotActiveMentor(Request $request)
    {
        $id = $request->input('id');
        try {
            $mentor = Mentor::findOrFail($id);
            $mentor->is_active = 0;
            $mentor->update();
            echo 'ok';
        } catch (ModelNotFoundException $e) {
            echo 'notok';
        }
    }

    public function makeVerifiedMentor(Request $request)
    {
        $id = $request->input('id');
        try {
            $mentor = Mentor::findOrFail($id);
            $mentor->verified = 1;
            $mentor->is_seen = 1;
            $mentor->update();
            echo 'ok';
        } catch (ModelNotFoundException $e) {
            echo 'notok';
        }
    }

    public function makeNotVerifiedMentor(Request $request)
    {
        $id = $request->input('id');
        try {
            $mentor = Mentor::findOrFail($id);
            $mentor->verified = 0;
            $mentor->save();
            echo 'ok';
        } catch (ModelNotFoundException $e) {
            echo 'notok';
        }
    }

}
