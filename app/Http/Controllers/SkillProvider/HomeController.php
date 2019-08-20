<?php

namespace App\Http\Controllers\SkillProvider;
use Auth;
use ImgUploader;
use App\Course;
use App\SkillProvider;
use Illuminate\Http\Request;
use App\Helpers\DataArrayHelper;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Traits\CommonUserFunctions;
use App\Http\Requests\Front\SkillProviderFrontFormRequest;

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
        $courses = Course::where('skill_provider_id',Auth::guard('skill_provider')->user()->id)
                          ->where('is_active',1)->get();
        return view('skill_provider.home')->with('courses',$courses);
    }

    public function myProfile()
    {
        $countries = DataArrayHelper::langCountriesArray();
        $ownershipTypes = DataArrayHelper::defaultOwnershipTypesArray();
        $upload_max_filesize = UploadedFile::getMaxFilesize() / (1048576);
        $skill_provider = SkillProvider::findOrFail(Auth::guard('skill_provider')->user()->id);
        return view('skill_provider.profile')
                        ->with('countries', $countries)
                        ->with('ownershipTypes', $ownershipTypes)
                        ->with('skill_provider', $skill_provider)
                        ->with('upload_max_filesize', $upload_max_filesize);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(SkillProviderFrontFormRequest $request)
    {
          $skill_provider = SkillProvider::findOrFail(Auth::guard('skill_provider')->user()->id);
          /*         * **************************************** */
          if ($request->hasFile('logo')) {
          $is_deleted = $this->deleteSkillProviderImage($skill_provider->id);
          $logo = $request->file('logo');
          $fileName = ImgUploader::UploadImage('skill_provider_images', $logo, $request->input('name'), 300, 300, false);
          $skill_provider->logo = $fileName;
          }
          /*         * ************************************** */
          $skill_provider->name = $request->input('name');
          $skill_provider->email = $request->input('email');
          if (!empty($request->input('password'))) {
          $skill_provider->password = Hash::make($request->input('password'));
          }
          $skill_provider->ownership_type_id = $request->input('ownership_type_id');
          $skill_provider->description = $request->input('description');
          $website = $request->input('website');
          $skill_provider->website = (false === strpos($website, 'http')) ? 'http://' . $website : $website;
          $skill_provider->location = $request->input('location');
          $skill_provider->established_in = $request->input('established_in');
          $skill_provider->fax = $request->input('fax');
          $skill_provider->phone = $request->input('phone');
          $skill_provider->country_id = $request->input('country_id');
          $skill_provider->state_id = $request->input('state_id');
          $skill_provider->city_id = $request->input('city_id');

          $skill_provider->update();

          flash(__('You have updated your profile successfully'))->success();
          return \Redirect::route('skill-provider.profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
