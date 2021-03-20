<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    public function creategroup(Request $request){
        $data=DB::table('ms_officer_group') 
        ->insert([
            'Comp_ID'=> $request->Comp_ID,
            'Cust_ID'=> $request->Cust_ID,
            'Site_ID'=> $request->Site_ID,
            'Group_ID'=> $request->Group_ID,
           
                    ]);
                     if ($data){ 
        $view=DB::table('ms_officer_group')->orderBy('Comp_id','desc')->limit(1)->get();
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
               
                public function showgroupid($comp_id,$cust_id,$site_id){
                        $data=DB::table('ms_officer_group')
                        ->select('ms_officer_group.Comp_ID','ms_officer_group.Cust_ID','ms_officer_group.Site_ID','ms_officer_group.Group_ID',)
                        ->where(['ms_officer_group.Comp_ID'=>$comp_id
                        ,'ms_officer_group.Cust_id'=>$cust_id,'ms_officer_group.Site_ID'=>$site_id]);
                        if ($data){
                        $success['status'] =true;
                        $success['message'] ="Data Tersedia";
                        $success['count'] =$data->count();
                        $success['postslist'] =$data->get();


                        $dump=$success;
                    }else{
                        $failed['status'] =false;
                        $failed['message']="Data tidak ada";
                        $dump=$failed;
                    }
                    return response()->json($dump);
                }
                public function show($comp_id,$cust_id,$site_id,$limit){
                    if(DB::table('ms_officer_group')->exists()){
                        $data=DB::table('ms_officer_group')->limit($limit) ->where(['ms_officer_group.Comp_ID'=>$comp_id,'ms_officer_group.Cust_id'=>$cust_id,'ms_officer_group.Site_ID'=>$site_id])->get();
                        $success['status'] =true;
                        $success['message']="Data ditemukan";
                        $success['count']=$data->count();
                        $success['postslist'] =$data;
                        $dump=$success;
                }else{
                    $failed['status'] =false;
                    $failed['message']="Data tidak ada";
                    $dump=$failed;
                }
                return response()->json($dump);
            }
                public function shows($limit){
                            if(DB::table('ms_officer_group')->exists()){
                            $data=DB::table('ms_officer_group')->limit($limit)->get();
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
                  
                    
                  

 }



                