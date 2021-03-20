<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ActivityController extends Controller{
    public function __construct()
    {
        $this->table_main="posts";
    }


    
    public function add(Request $request){

        try{
        $data=DB::table('posts')
        ->insert([
            'Patrol_ID'=> $request->Patrol_ID,
            'Comp_ID'=> $request->Comp_ID,
            'Cust_ID'=> $request->Cust_ID,
            'Site_ID'=> $request->Site_ID,
            'Location_ID'=> $request->Location_ID,
            'Activity_Date'=> $request->Activity_Date,
            'Activity_Time'=> $request->Activity_Time,
            'Officer_ID'=> $request->Officer_ID,
            'Notes'=> $request->Notes,
            'Act_Lat'=> $request->Act_Lat,
            'Act_Lng'=> $request->Act_Lng,
        ]);

        echo('Data Berhasil di tambahkan');

        }catch (\Throwable $th) {
            dd($th);
        }
    }

    public function view (Request $request){
        $data=DB::table('posts')->get();
        return response()->json($data);
    }

    public function delete($ID){
        $activity=DB::table('posts')->where('ID',$ID);
        // $activity =DB::table('posts')::find($Id);

        $delete = $activity->delete();

        if($delete){
            return response()->json([
                'status'=>"Berhasil Delete data",
            ]);
            
        }else{
            return response()->json([
                'status'=>"gagal Delete",
                'data'=>null
            ]);
        }

    }
    public function update(Request $request,$ID){
        $this->validate($request,[
            'Patrol_ID'=> 'required',
            'Comp_ID'=> 'required',
            'Cust_ID'=> 'required',
            'Site_ID'=> 'required',
            'Location_ID'=> 'required',
            'Activity_Date'=> 'required',
            'Activity_Time'=> 'required',
            'Officer_ID'=> 'required',
            'Notes'=> 'required',
            'Act_Lat'=> 'required',
            'Act_Lng'=> 'required',
        ]);

            $Patrol_ID = $request->Patrol_ID;
            $Comp_ID = $request->Comp_ID;
            $Cust_ID = $request->Cust_ID;
            $Site_ID =$request->Site_ID;
            $Location_ID = $request->Location_ID;
            $Activity_Date = $request->Activity_Date;
            $Activity_Time = $request->Activity_Time;
            $Officer_ID = $request->Officer_ID;
            $Notes = $request->Notes;
            $Act_Lat = $request->Act_Lat;
            $Act_Lng = $request->Act_Lng;

            $activity=DB::table('posts')->where('ID',$ID);

            $add= $activity->update([
                'Patrol_ID'=> $Patrol_ID,
                'Comp_ID'=> $Comp_ID,
                'Cust_ID'=> $Cust_ID,
                'Site_ID'=> $Site_ID,
                'Location_ID'=> $Location_ID,
                'Activity_Date'=> $Activity_Date,
                'Activity_Time'=> $Activity_Time,
                'Officer_ID'=> $Officer_ID,
                'Notes'=> $Notes,
                'Act_Lat'=> $Act_Lat,
                'Act_Lng'=> $Act_Lng,
            ]);

            if ($add){
                 return response()->json([
                    'status'=>"Berhasil Mengupdate data",
                    'data'=>"True"
                    
                ]);
                
            }else{
                return response()->json([
                    'status'=>"gagal Update",
                    'data'=>null
                ]);
            }

    }

}