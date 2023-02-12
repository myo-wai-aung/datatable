<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use Log;

class UserController extends Controller
{
    public function index(Request $request){

        if ($request->ajax()) {
            $data = User::select('*');
            
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
       
                            $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>
                            <a href="javascript:void(0)" class="edit btn btn-secondary btn-sm">Edit</a>
                            <a href="javascript:void(0)" class="edit btn btn-danger btn-sm">Del</a>';
      
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
          
        return view('user.index');
    }
}
