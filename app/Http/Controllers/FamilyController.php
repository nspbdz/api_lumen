<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class FamilyController extends Controller
{
    public function createfamily(Request $request){
        $data=DB::table('ms_officer_family')
        ->insert([
            'Comp_ID'=> $request->Comp_ID,
            'Cust_ID'=> $request->Cust_ID,
            'Site_ID'=> $request->Site_ID,
            'Officer_ID'=> $request->Officer_ID,      
           'Family_NIK'=> $request->Family_NIK,
            'FullName' => $request->FullName,
            'BirthPlace' => $request->BirthPlace,
            'BirthDate' => $request->BirthDate,
            'Gender'=> $request->Gender,
            'Relationship'=> $request->Relationship,
            'FatherName' => $request->FatherName,
            'MotherName' => $request->MotherName,
            'Jobs'=> $request->Jobs,
            'Jobs_Institution'=> $request->Jobs_Institution,
            'Last_Formal_Education'=> $request->Last_Formal_Education,
            // 'Last_Update '=> $request->Last_Update,
          
                    ]);
                     if ($data){ 
        $view=DB::table('ms_officer_family')->orderBy('Comp_id','desc')->limit(1)->get();
             $success['status'] =true;
            $success['message'] ="Data Tersedia";
            $success['data'] = $view;
            $dump=$success;
        }else{
            $failed['status'] =false;
            $failed['message']="Data tidak ada";
            $dump=$failed;
        }
        return response()->json($dump);
    }
                  public function updatefamily(Request $request,$id){
                    $this->validate($request,[
                        // 'Cust_ID'=>'required',
                        // 'Site_ID'=>'required',
                        // 'Officer_ID'=>'required',
                        
                'Family_NIK'=>'required',
                'FullName'=>'required',
                'BirthPlace'=>'required',
                'BirthDate'=>'required',
                'Gender'=>'required',
                'Relationship'=>'required',
                'FatherName'=>'required',
                'MotherName'=>'required',
                'Jobs'=>'required',
                'Jobs_Institution'=>'required',
                'Last_Formal_Education'=>'required',
                // 'Last_Update'=>'required',
                                              
                    ]);
            
                    $Comp_ID= $request->Comp_ID;
                    $Cust_ID= $request->Cust_ID;
                    $Site_ID= $request->Site_ID;
                    $Officer_ID= $request->Officer_ID;
                    $Family_NIK=$request->Family_NIK;
                    $FullName=$request->FullName;
                    $BirthPlace=$request->BirthPlace;
                    $BirthDate=$request->BirthDate;
                    $Gender=$request->Gender;
                    $Relationship=$request->Relationship;
                    $FatherName=$request->FatherName;
                    $MotherName=$request->MotherName;
                    $Jobs=$request->Jobs;
                    $Jobs_Institution=$request->Jobs_Institution;
                    $Last_Formal_Education=$request->Last_Formal_Education;
                    // $Last_Update=$request->Last_Update;
                    
                   
                    $activity=DB::table('ms_officer_family')->where('Comp_ID',$id);
                   
                    $add= $activity->update([
                        'Family_NIK'=> $Family_NIK,
                        'FullName'=> $FullName ,
                        'BirthPlace'=> $BirthPlace ,
                        'BirthDate'=> $BirthDate ,
                        'Gender'=> $Gender ,
                        'Relationship'=> $Relationship ,
                        'FatherName'=> $FatherName ,
                        'MotherName'=> $MotherName ,
                        'Jobs'=> $Jobs ,
                        'Jobs_Institution'=> $Jobs_Institution ,
                        'Last_Formal_Education'=> $Last_Formal_Education ,
                        // 'Last_Update'=> $Last_Update ,
                           
                        ]);
                            $view=DB::table('ms_officer_family')->where('Comp_ID',$id)->get();
                        if ($add){
                            $success['status'] =true;
                                $success['message'] ="Data berhasil ditambahkan";
                                // $success['postslist'] =$data->get();

                                $dump=$success;
                            }else{
                                $failed['status'] =false;
                                $failed['message']="Data tidak berhasil ditambahkan";
                                $dump=$failed;
                                
                            }
                            return response()->json($dump);
                }
               
                public function showfamilyid($id){
                    
                        $data=DB::table('ms_officer_family')
                        ->select('ms_officer_family.Comp_ID','ms_officer_family.Cust_ID','ms_officer_family.Site_ID','ms_officer_family.officer_ID',
                        'ms_officer_family.Family_NIK','ms_officer_family.FullName','ms_officer_family.BirthPlace','ms_officer_family.BirthDate',
                        'ms_officer_family.Gender','ms_officer_family.Relationship','ms_officer_family.FatherName','ms_officer_family.MotherName',
                        'ms_officer_family.Jobs','ms_officer_family.Jobs_Institution','ms_officer_family.Last_Formal_Education',
                        'ms_officer_family.Last_Update')
                        ->where('ms_officer_family.Comp_ID',$id);
                        if ($data->limit(1)->exists()){
                        $success['status'] =true;
                        $success['message'] ="Data Tersedia";
                        $success['postslist'] =$data->get();

                        $dump=$success;
                    }else{
                        $failed['status'] =false;
                        $failed['message']="Data tidak ada";
                        $dump=$failed;
                    }
                    return response()->json($dump);
                }
                public function show($limit){
                            if(DB::table('ms_officer_family')->exists()){
                            $data=DB::table('ms_officer_family')->limit($limit)->get();
                            $success['status'] =true;
                            $success['message']="Data ditemukan";
                            $success['count']=$data->count();
                            $success['postslist'] =$data;
                            $dump=$success;
                        } 
                        else {
                            $failed['status']=false;
                            $failed['message']="Data tidak ada";
                            $dump=$failed;
                        }
                        return response()->json($dump);
                    }
                    public function deletefamily($id)
                    {
                        
                        if ($delete =    DB::table('ms_officer_family')->where('ms_officer_family.Comp_ID',$id)->delete()){
                            $success['status'] =true;
                            $success['message'] ="Data Telah Di Hapus";
    
                            $dump=$success;
                        }else{
                            $failed['status'] =false;
                            $failed['message']="Data Tidak Terhapus";
                            $dump=$failed;
                        }
                        return response()->json($dump);
                    }
                  

 }



                