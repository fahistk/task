<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class HomeControtroller extends Controller
{
    
    public function userdetails(Request $request){
        $searchvalue = $request->query('search', '');
        $query = User::Query();
        $query->select('users.name as username','departments.name as departmentname','designations.name as designationsname');
        $query->join('departments', 'departments.id', '=', 'users.fk_department');
        $query->join('designations', 'designations.id', '=', 'users.fk_designation');

        $query->when($searchvalue ? true : false, function($qn) use ($searchvalue) {
            return $qn->where(function ($qn) use ($searchvalue) {
                $qn->where('users.name', 'like', '%' . $searchvalue . '%')
                        ->orWhere('departments.name', 'like', '%' . $searchvalue . '%')
                        ->orWhere('designations.name', 'like', '%' . $searchvalue . '%');    
            });
           
        });

        $TotalData = $query->count();
        $query->orderBy('users.created_at', 'desc');
        $result = $query->get()->toArray();
        return response()->json($result);
    }

}
