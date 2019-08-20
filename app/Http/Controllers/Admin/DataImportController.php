<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class DataImportController extends Controller
{
     public function index()
     {
         return view('admin.dataImport.dataImportView');
     }

     public function import()
     {
         Excel::import(new UsersImport,request()->file('file'));
         return redirect()->route('list.users')->with('message', 'Data updated!');
     }
}
