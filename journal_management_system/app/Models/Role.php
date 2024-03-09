<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Role extends Model
{
    use HasFactory;

    public function GetRoles($request, $limit = 20)
	{
		$results = DB::table("roles")->select('*');
        if ($title = $request->title) {
			$results = $results->where('title', 'LIKE', '%' . $title . '%');
        }
        if ($status = $request->status) {
            $results = $results->where('status', $status);
		}        
		$results = $results->orderBy("id", "DESC");
		if ($limit == '-1') {
			return $results->get();
		} else {
			return $results->paginate($limit);
		}
	}
	
	public static function GetRoleByID($request, $id)
    {
        $result = DB::table("roles")->select('roles.*');
		$result = $result->where("roles.id", $id);
		$result = $result->first();
        return $result;		
    }

	public static function CreateRole($DataInsert)
	{
		return DB::table("roles")->insert($DataInsert);
	}

	public static function UpdateRole($id, $DataUpdate)
	{
		return DB::table("roles")->where('id', $id)->update($DataUpdate);
	}
	
	public static function DeleteRole($id)
	{
		return DB::table("roles")->where('id', $id)->delete();
	}

}
