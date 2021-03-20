<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

// use DB;

class DomicileController extends Controller
{
    
    public function createDomicile(Request $request){
        
        $data=DB::table('ms_officer_domicile')
        ->insert([
             'Comp_ID'=> $request->Comp_ID,
            'Cust_ID'=> $request->Cust_ID,
            'Site_ID'=> $request->Site_ID,
            'Officer_ID'=> $request->Officer_ID,
            'NIK'=> $request->NIK,
            'NIK_Address'=> $request->NIK_Address,
            'NIK_Country'=> $request->NIK_Country,
            'NIK_State'=> $request->NIK_State,
            'NIK_City'=> $request->NIK_City,
            'NIK_Distric'=> $request->NIK_Distric,
            'NIK_Village'=> $request->NIK_Village,
            'Live_Address'=> $request->Live_Address,
            'Live_Country'=> $request->Live_Country,
            'Live_State'=> $request->Live_State,
            'Live_City'=> $request->Live_City,
            'Live_Distric'=> $request->Live_Distric,
            'Live_Village'=> $request->Live_Village,
            'Last_Update'=> $request->Last_Update,
                    ]);

                     if ($data){ 
        $view=DB::table('ms_officer_domicile')->orderBy('Comp_id','desc')->limit(1)->get();
             $success['status'] =true;
            $success['message'] ="Data Tersedia";
            $success['data'] = $view;

                //   ''=> $view

            // $success['postslist'] =$data->get();

            $dump=$success;
        }else{
            $failed['status'] =false;
            $failed['message']="Data tidak ada";
            $dump=$failed;
            
        }
        return response()->json($dump);
                       
                    
    }
                  public function updateDomicile(Request $request,$id){
                    $this->validate($request,[
                        // 'Comp_ID'=>'required',
                        // 'Cust_ID'=>'required',
                        // 'Site_ID'=>'required',
                        // 'Officer_ID'=>'required',
                        'NIK'=>'required',
                        'NIK_Address'=>'required',
                        'NIK_Country'=>'required',
                        'NIK_State'=>'required',
                        'NIK_City'=>'required',
                        'NIK_Distric'=>'required',
                        'NIK_Village'=>'required',
                        'Live_Address'=>'required',
                        'Live_Country'=>'required',
                        'Live_State'=>'required',
                        'Live_City'=>'required',
                        'Live_Distric'=>'required',
                        'Live_Village'=>'required',
                        'Last_Update'=>'required',
                       
                    ]);
            
                    $Comp_ID= $request->Comp_ID;
                    $Cust_ID= $request->Cust_ID;
                    $Site_ID= $request->Site_ID;
                    $Officer_ID= $request->Officer_ID;
                    $NIK= $request->NIK;
                    $NIK_Address= $request->NIK_Address;
                    $NIK_Country= $request->NIK_Country;
                    $NIK_State= $request->NIK_State;
                    $NIK_City= $request->NIK_City;
                    $NIK_Distric= $request->NIK_Distric;
                    $NIK_Village= $request->NIK_Village;
                    $Live_Address= $request->Live_Address;
                    $Live_Country= $request->Live_Country;
                    $Live_State= $request->Live_State;
                    $Live_City= $request->Live_City;
                    $Live_Distric= $request->Live_Distric;
                    $Live_Village= $request->Live_Village;
                    $Last_Update= $request->Last_Update;

                        // $id = $request->id;
                        // $title = $request->title;
                        // $content = $request->content;
                       
            
                        $activity=DB::table('ms_officer_domicile')->where('Comp_ID',$id);
            
                        $add= $activity->update([
                            // 'Comp_ID'=> $request->Comp_ID,
                            // 'Cust_ID'=> $Cust_ID,
                            // 'Site_ID'=> $Site_ID,
                            // 'Officer_ID'=> $Officer_ID,
                            'NIK'=> $NIK,
                            'NIK_Address'=> $NIK_Address,
                            'NIK_Country'=> $NIK_Country,
                            'NIK_State'=> $NIK_State,
                            'NIK_City'=> $NIK_City,
                            'NIK_Distric'=> $NIK_Distric,
                            'NIK_Village'=> $NIK_Village,
                            'Live_Address'=> $Live_Address,
                            'Live_Country'=> $Live_Country,
                            'Live_State'=> $Live_State,
                            'Live_City'=> $Live_City,
                            'Live_Distric'=> $Live_Distric,
                            'Live_Village'=> $Live_Village,
                            'Last_Update'=> $Last_Update,
                        ]);
                            $view=DB::table('ms_officer_domicile')->where('Comp_ID',$id)->get();
                        if ($add){
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
            
               
    
                public function showDomicileid($id){
                    // if(DB::table('ms_officer_domicile')->where('ms_officer_domicile.Comp_ID',$id)->exists()){
                        $data=DB::table('ms_officer_domicile')
                        ->select('ms_officer_domicile.Comp_ID','ms_officer_domicile.Cust_ID','ms_officer_domicile.Site_ID','ms_officer_domicile.officer_ID',
                        'ms_officer_domicile.NIK','ms_officer_domicile.NIK_Address','ms_officer_domicile.NIK_Country','ms_officer_domicile.NIK_State',
                        'ms_officer_domicile.NIK_City','ms_officer_domicile.NIK_Village','ms_officer_domicile.Live_Address','ms_officer_domicile.Live_Country',
                        'ms_officer_domicile.Live_State','ms_officer_domicile.Live_City','ms_officer_domicile.Live_Distric','ms_officer_domicile.Live_Village',
                        'ms_officer_domicile.Last_Update')
                        ->where('ms_officer_domicile.Comp_ID',$id);
                        if ($data->limit(1)->exists()){

                        // ->limit(10);
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
                    // if(DB::table('ms_officer_domicile')->exists()){
                        
                        // $data=DB::table('ms_officer_domicile')
                        // ->select('ms_officer_domicile.Comp_ID','ms_officer_domicile.Cust_ID','ms_officer_domicile.Site_ID','ms_officer_domicile.officer_ID',
                        // 'ms_officer_domicile.NIK','ms_officer_domicile.NIK_Address','ms_officer_domicile.NIK_Country','ms_officer_domicile.NIK_State',
                        // 'ms_officer_domicile.NIK_City','ms_officer_domicile.NIK_Village','ms_officer_domicile.Live_Address','ms_officer_domicile.Live_Country',
                        // 'ms_officer_domicile.Live_State','ms_officer_domicile.Live_City','ms_officer_domicile.Live_Distric','ms_officer_domicile.Live_Village',
                        // 'ms_officer_domicile.Last_Update');
                        // if ($data->limit(1)->exists()){
                            if(DB::table('ms_officer_domicile')->exists()){
                            // $data->get
                            $data=DB::table('ms_officer_domicile')->limit($limit)->get();
                            $success['status'] =true;
                            $success['message']="Data ditemukan";
                            // $success['count']=$data->count();
                            $success['count']=$data->count();
                            $success['postslist'] =$data;
                            $dump=$success;
                        } 
                        else {
                            $failed['status']=false;
                            $failed['message']="Data tidak ada";
                            $dump=$failed;
                            // respon json false
                            // stop / tampilkan pesan stop
                        }
                        return response()->json($dump);
                    }
                }



                    // select primary key
                    // ->limit(10);
                    // limit 
                    // select semua data apakah exist
                        // $var
                        
                        // $success['message'] ="Data Tersedia";
            //             $success['status'] =true;
            //             $success['postslist'] =$data->get();
            //             $dump=$success;
            //         }else{

            //             $failed['status']="FALSE";
            //             $failed['message']="Data tidak ada";
            //             $dump=$failed;
                        
            //         }
            //         return response()->json($dump);
                    
            //     }
             
            // }
             //      return response()->json([
                        //         // 'status'=>true,
                        //         // 'message'=>"Berhasil Mengupdate data",
                        //         // 'data'=>$view
                        //         $success['status'] =true,
                        //         $success['message'] ="Data Tersedia",
                        //         $success['postslist'] =$data->get()
        
                        //         $dump=$success
                        //     ]);
                            
                        // }else{
                        //     return response()->json([
                        //         'status'=>false,
                        //         'message'=>"gagal Update",
                        //         'data'=>null
                        //     ]);
                        // }

        // echo('Data Berhasil di tambahkan');
        // return response()->json($view);
        //      return response()->json([
                        //         'status'=>true,
                        //         'message'=> "data berhasil di update",
                        //         'data'=> $view
                                
                        //     ]);
                            
                        // }else{
                        //     return response()->json([
                        //         'status'=>false,
                        //         'message'=>"gagal Update",
                        //         'data'=>null
                        //     ]);
                        // }
          