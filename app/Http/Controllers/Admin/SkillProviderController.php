<?php

namespace App\Http\Controllers\Admin;

use ImgUploader;
use App\SkillProvider;
use App\Helpers\DataArrayHelper;
use App\Traits\CommonUserFunctions;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use DataTables;
use App\Http\Requests\SkillProviderFormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;

class SkillProviderController extends Controller
{
    use CommonUserFunctions;

    public function __construct()
    {
        //
    }

    public function indexSkillProviders()
    {
        return view('admin.skill_provider.index');
    }

    public function createSkillProvider()
    {
          $countries = DataArrayHelper::langCountriesArray();
          $ownershipTypes = DataArrayHelper::defaultOwnershipTypesArray();
          $upload_max_filesize = UploadedFile::getMaxFilesize() / (1048576);

          return view('admin.skill_provider.add')
                          ->with('ownershipTypes', $ownershipTypes)
                          ->with('countries', $countries)
                          ->with('upload_max_filesize', $upload_max_filesize);
    }

    public function storeSkillProvider(SkillProviderFormRequest $request)
    {
          $skill_provider = new SkillProvider();
          /*         * **************************************** */
          if ($request->hasFile('image')) {
              $image = $request->file('image');
              $fileName = ImgUploader::UploadImage('skill_provider_images', $image, $request->input('name'), 300, 300, false);
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
          $skill_provider->is_active = $request->input('is_active');
          $skill_provider->verified = $request->input('verified');
          $skill_provider->is_seen = 1;
          $skill_provider->save();

          flash('Skill Provider has been added!')->success();
          return \Redirect::route('edit.skill-provider', array($skill_provider->id));
    }

    public function editSkillProvider($id)
    {
          $countries = DataArrayHelper::langCountriesArray();
          $ownershipTypes = DataArrayHelper::defaultOwnershipTypesArray();
          $upload_max_filesize = UploadedFile::getMaxFilesize() / (1048576);
          $skill_provider = SkillProvider::findOrFail($id);
          $skill_provider->is_seen = 1;
          $skill_provider->save();

          return view('admin.skill_provider.edit')
                          ->with('ownershipTypes', $ownershipTypes)
                          ->with('countries', $countries)
                          ->with('skill_provider', $skill_provider)
                          ->with('upload_max_filesize', $upload_max_filesize);
    }

    public function updateSkillProvider($id, SkillProviderFormRequest $request)
    {
            $skill_provider = SkillProvider::findOrFail($id);
            /*         * **************************************** */
            if ($request->hasFile('image')) {
                $is_deleted = $this->deleteSkillProviderImage($skill_provider->id);
                $image = $request->file('image');
                $fileName = ImgUploader::UploadImage('skill_provider_images', $image, $request->input('name'), 300, 300, false);
                $skill_provider->logo = $fileName;
            }
            /*         * ************************************** */
            $skill_provider->name = $request->input('name');
            /*         * *********************** */
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
            $skill_provider->is_active = $request->input('is_active');
            $skill_provider->verified = $request->input('verified');
            $skill_provider->update();

            flash('Mentor has been updated!')->success();
            return \Redirect::route('edit.skill-provider', array($skill_provider->id));
    }

    public function fetchSkillProvidersData(Request $request)
    {
        $skill_provider = SkillProvider::select(
                        [
                            'skill_providers.id',
                            'skill_providers.name',
                            'skill_providers.email',
                            'skill_providers.password',
                            'skill_providers.ownership_type_id',
                            'skill_providers.description',
                            'skill_providers.website',
                            'skill_providers.location',
                            'skill_providers.established_in',
                            'skill_providers.fax',
                            'skill_providers.phone',
                            'skill_providers.country_id',
                            'skill_providers.state_id',
                            'skill_providers.city_id',
                            'skill_providers.is_active',
                            'skill_providers.verified',
                            'skill_providers.created_at',
                            'skill_providers.updated_at',
                            'skill_providers.is_seen'
        ]);
        return Datatables::of($skill_provider)
                        ->filter(function ($query) use ($request) {
                            if ($request->has('id') && !empty($request->id)) {
                                $query->where('skill_providers.id', 'like', "{$request->get('id')}");
                            }
                            if ($request->has('name') && !empty($request->name)) {
                                $query->where('skill_providers.name', 'like', "%{$request->get('name')}%");
                            }
                            if ($request->has('email') && !empty($request->email)) {
                                $query->where('skill_providers.email', 'like', "%{$request->get('email')}%");
                            }
                        })
                        ->addColumn('name', function ($skill_provider) {
                            return $skill_provider->name;
                        })
                        ->addColumn('action', function ($skill_provider) {
                            /*                             * ************************* */
                            $active_txt = 'Make Active';
                            $active_href = 'make_active(' . $skill_provider->id . ');';
                            $active_icon = 'square-o';
                            if ((int) $skill_provider->is_active == 1) {
                                $active_txt = 'Make InActive';
                                $active_href = 'make_not_active(' . $skill_provider->id . ');';
                                $active_icon = 'check-square-o';
                            }
                            /*                             * ************************* */
                            /*                             * ************************* */
                            $verified_txt = 'Not Verified';
                            $verified_href = 'make_verified(' . $skill_provider->id . ');';
                            $verified_icon = 'square-o';
                            if ((int) $skill_provider->verified == 1) {
                                $verified_txt = 'Verified';
                                $verified_href = 'make_not_verified(' . $skill_provider->id . ');';
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
              <a href="' . route('edit.skill-provider', ['id' => $skill_provider->id]) . '"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
            </li>
            <li>
              <a href="javascript:void(0);" onclick="delete_skill_provider(' . $skill_provider->id . ');" class=""><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</a>
            </li>
            <li>
            <a href="javascript:void(0);" onClick="' . $active_href . '" id="onclick_active_' . $skill_provider->id . '"><i class="fa fa-' . $active_icon . '" aria-hidden="true"></i>' . $active_txt . '</a>
            </li>
            <li>
            <a href="javascript:void(0);" onClick="' . $verified_href . '" id="onclick_verified_' . $skill_provider->id . '"><i class="fa fa-' . $verified_icon . '" aria-hidden="true"></i>' . $verified_txt . '</a>
            </li>
          </ul>
        </div>';
                        })
                        ->rawColumns(['action', 'name'])
                        ->setRowId(function($skill_provider) {
                            return 'user_dt_row_' . $skill_provider->id;
                        })
                        ->make(true);
    }

    public function deleteSkillProvider(Request $request)
    {
        $skill_provider_id = $request->input('id');
        try {
            $this->deleteSkillProviderImage($skill_provider_id);
            $skill_provider = SkillProvider::findOrFail($skill_provider_id);
            $skill_provider->delete();
            echo 'ok';
        } catch (ModelNotFoundException $e) {
            echo 'notok';
        }
    }

    public function makeActiveSkillProvider(Request $request)
    {
        $id = $request->input('id');
        try {
            $skill_provider = SkillProvider::findOrFail($id);
            $skill_provider->is_active = 1;
            $skill_provider->is_seen = 1;
            $skill_provider->save();
            echo 'ok';
        } catch (ModelNotFoundException $e) {
            echo 'notok';
        }
    }

    public function makeNotActiveSkillProvider(Request $request)
    {
        $id = $request->input('id');
        try {
            $skill_provider = SkillProvider::findOrFail($id);
            $skill_provider->is_active = 0;
            $skill_provider->update();
            echo 'ok';
        } catch (ModelNotFoundException $e) {
            echo 'notok';
        }
    }

    public function makeVerifiedSkillProvider(Request $request)
    {
        $id = $request->input('id');
        try {
            $skill_provider = SkillProvider::findOrFail($id);
            $skill_provider->verified = 1;
            $skill_provider->is_seen = 1;
            $skill_provider->update();
            echo 'ok';
        } catch (ModelNotFoundException $e) {
            echo 'notok';
        }
    }

    public function makeNotVerifiedSkillProvider(Request $request)
    {
        $id = $request->input('id');
        try {
            $skill_provider = SkillProvider::findOrFail($id);
            $skill_provider->verified = 0;
            $skill_provider->save();
            echo 'ok';
        } catch (ModelNotFoundException $e) {
            echo 'notok';
        }
    }

}
