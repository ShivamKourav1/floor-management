<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Floor;
use App\Models\Flat;
use App\Models\Floor_Flat;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    function login()
    {
        return view('/login');
    }
    function logout(Request $req)
    {
        $req->session()->flush();
        return redirect('/login');
    }
    function validatelogin(Request $req)
    {
        $result=User::where(['email'=>$req->input('email'),'password'=>$req->input('password')])->first();

       if($result)
        {
            $req->session()->put('uid',$result->userid);
            return view('dashboard');
        }
    }
    function floor_add(Request $request){
        var_dump($request->input());//die();   
        $floor=new Floor;
        $floor->floor= $request->floor;    

        if($floor->save())
        {
         $floor=Floor::orderBy('floor_id', 'DESC')->first(); 
         echo '<pre>';

            for($i=1;$i<=5;$i++)
            {
                
                $flat=new Flat;
                $flat->flat=$floor->floor*100+$i;

                $flat->save();
                $flat_id=Flat::orderBy('flat_id', 'DESC')->first()->flat_id; 
                
                $ff=new Floor_Flat;
                $ff->floor_id=$floor->floor_id;
                $ff->flat_id=$flat_id;
                $ff->save();
            }
        }
    return redirect('floor_new');
    }
    function floor_view(Request $req){
        $data['floors']=DB::table('floors')->get();
        $data['flats']=DB::table('flats')->get();
        $data['ffs']=DB::table('floor__flats')->get();
        //echo "<pre>";
        //var_dump($data);
 //       die();
        return view('floor_view',$data);
    }
}
