<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DB;

// use DB;

class EducationController extends Controller
{ 
    function __construct()
    {
        $this->table_main  = "Domicile";
        // $this->table_image = "tr_activity_pics"; 
    }
    
    public function createEducation(Request $request){
        
        $data=DB::table('ms_officer_education')
        ->insert([
            'Education_ID'=> $request->Education_ID,
            'Comp_ID'=> $request->Comp_ID,
            'Cust_ID'=> $request->Cust_ID,
            'Site_ID'=> $request->Site_ID,
            'Officer_ID'=> $request->Officer_ID,
            'Formal_Education_Type'=> $request->Formal_Education_Type,
            'Formal_Education_Institution'=> $request->Formal_Education_Institution,
            'Graduate_Year'=> $request->Graduate_Year,
            'Certificate_Scan'=> $request->Certificate_Scan,
            'Last_Update'=> $request->Last_Update,
                    ]);

                     if ($data){ 
        $view=DB::table('ms_officer_domicile')->orderBy('Comp_id','desc')->limit(1)->get();
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
                  public function updateEducation(Request $request,$id){
                    $this->validate($request,[
                        // 'Comp_ID'=>'required',
                        // 'Cust_ID'=>'required',
                        // 'Site_ID'=>'required',
                        // 'Officer_ID'=>'required',
                        'Formal_Education_Type'=>'required' ,
                        'Formal_Education_Institution'=>'required',
                        'Graduate_Year'=>'required' ,
                        // 'Certificate_Scan'=>'required' ,
                        'Last_Update'=>'required',
                       
                    ]);
                        $Education_ID= $request->Education_ID;
                        $Comp_ID= $request->Comp_ID;
                        $Cust_ID= $request->Cust_ID;
                        $Site_ID= $request->Site_ID;
                        $Officer_ID= $request->Officer_ID;
                        $Formal_Education_Type= $request->Formal_Education_Type;
                        $Formal_Education_Institution= $request->Formal_Education_Institution;
                        $Graduate_Year= $request->Graduate_Year;
                        $Certificate_Scan= $request->Certificate_Scan;
                        $Last_Update= $request->Last_Update;
                     $activity=DB::table('ms_officer_education')->where('Education_ID',$id);
            
                        $add= $activity->update([
                        'Formal_Education_Type'=>$Formal_Education_Type ,
                        'Formal_Education_Institution'=>$Formal_Education_Institution,
                        'Graduate_Year'=>$Graduate_Year ,
                        'Certificate_Scan'=>$Certificate_Scan ,
                        'Last_Update'=>$Last_Update,
                        ]);
                            $view=DB::table('ms_officer_education')->where('Education_ID',$id)->get();
                        if ($add){
                            $success['status'] =true;
                                $success['message'] ="Data Tersedia";
                                // $success['postslist'] =$data->get();

                                $dump=$success;
                            }else{
                                $failed['status'] =false;
                                $failed['message']="Data tidak ada";
                                $dump=$failed;
                                
                            }
                            return response()->json($dump);
                                            
            
                }
            
               
    
                public function showEducationid($id){
                    // if(DB::table('ms_officer_domicile')->where('ms_officer_domicile.Comp_ID',$id)->exists()){
                      
                        $data=DB::table('ms_officer_education')
                        ->select('ms_officer_education.Education_ID','ms_officer_education.Comp_ID','ms_officer_education.Cust_ID','ms_officer_education.Site_ID','ms_officer_education.officer_ID',
                        'ms_officer_education.Formal_Education_Type','ms_officer_education.Formal_Education_Institution','ms_officer_education.Graduate_Year','ms_officer_education.Certificate_Scan',
                        'ms_officer_education.Last_Update')
                        ->where('ms_officer_education.Education_ID',$id);
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
                   
                            if(DB::table('ms_officer_education')->exists()){
                            $data=DB::table('ms_officer_education')->limit($limit)->get();
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
                            // respon json false
                            // stop / tampilkan pesan stop
                        }
                        return response()->json($dump);
                    }
                    public function deleteeducation($id)
                    {
                        
                        if ($delete =DB::table('ms_officer_education')->where('ms_officer_education.Education_ID',$id)->delete()){
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
          