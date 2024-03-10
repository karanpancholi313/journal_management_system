<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class Jmsuser extends Model
{
    use HasFactory;
    
     
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'address',
        'roles',
        'image',
        'status',
        'created_at',
        'updated_at'
    ];

    
    public $timestamps = true;

    public function GetJmsusers($request, $limit = 20)
    {
        $results = DB::table("jmsusers")->select('jmsusers.*','roles.title as role_name');
         $results = $results->leftjoin('roles', 'roles.id', '=', 'jmsusers.roles');

      
        if ($name = $request->name) {
            $results = $results->where('jmsusers.name', 'LIKE', '%'.$name.'%');
        }
    
        if ($Email = $request->email) {
            $results = $results->where('jmsusers.email', 'LIKE', '%' . $Email . '%');
        }
    
        if ($status = $request->status) {
            $results = $results->where('jmsusers.status', $status);
        }
    
        if ($phone = $request->phone) {
            $results = $results->where('jmsusers.mobile', $phone);
        }
    
        if ($daterange = $request->daterange) {
            $dateranges = explode(' - ', $daterange);
            list($date_start, $date_end) = $dateranges;
        
            $results = $results->whereDate('jmsusers.created_at', '>=', $date_start)
                               ->whereDate('jmsusers.created_at', '<=', $date_end);
        }
      
        $results = $results->where('jmsusers.roles','==','2');
      
        $results = $results->orderBy("jmsusers.id","DESC");
        $results = $results->groupBy('jmsusers.id');
        if ($limit == '-1') {
            return $results->get();
        } else {
            return $results->paginate($limit);
        }
    }
    

    public static function GetJmsuserByID($request, $id)
    {
        $result = DB::table("jmsusers")->select('jmsusers.*','roles.title as role_name');
        $result = $result->leftjoin('roles', 'roles.id', '=', 'jmsusers.roles');
        $result = $result->where("jmsusers.id", $id);
        $result = $result->first();
        return $result;
    }

    public static function CreateJmsuser($DataInsert)
    {
        return DB::table("jmsusers")->insert($DataInsert);
    }

    public static function UpdateJmsuser($id, $DataUpdate)
    {
        return DB::table("jmsusers")->where('id', $id)->update($DataUpdate);
    }

    public static function DeleteJmsuser($id)
    {
        return DB::table("jmsusers")->where('id', $id)->delete();
    }
}
