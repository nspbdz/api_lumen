<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DB;

// use DB;

class PostsController extends Controller
{
    function __construct()
    {
        $this->table_main  = "posts";
        // $this->table_image = "tr_activity_pics"; 
    }
    
    public function create(Request $request){
        
        $data=DB::table('posts')
        ->insert([
            // 'id'=> $request->id,
            'title'=> $request->title,
            'content'=> $request->content,
            
        ]);

        $view=DB::table('posts')->orderBy('id','desc')->limit(1)->get();

        echo('Data Berhasil di tambahkan');
        return response()->json($view);
        
    }
            
               
                public function update(Request $request,$id){
                    $this->validate($request,[
                        // 'id'=> 'required',
                        'title'=> 'required',
                        'content'=> 'required',
                       
                    ]);
            
                        $id = $request->id;
                        $title = $request->title;
                        $content = $request->content;
                       
            
                        $activity=DB::table('posts')->where('id',$id);
            
                        $add= $activity->update([
                            'id'=> $id,
                            'title'=> $title,
                            'content'=> $content,
                            
                        ]);
                            $view=DB::table('posts')->where('id',$id)->get();
                        if ($add){
                             return response()->json([
                                'status'=>"Berhasil Mengupdate data",
                                'data'=>$view
                                
                            ]);
                            
                        }else{
                            return response()->json([
                                'status'=>"gagal Update",
                                'data'=>null
                            ]);
                        }
            
                }
                public function showid($id){
                    if(DB::table('posts')->where('posts.id',$id)->exists()){
                        $data=DB::table('posts')
                        ->select('posts.id','posts.title','posts.content')
                        ->where('posts.id',$id);
                        // ->limit(10);
                        
                        $success['message'] ="Data Tersedia";
                        $success['postslist'] =$data->get();
                        $dump=$success;
                    }else{
                        $failed['message']="Data tidak ada";
                        $dump=$failed;
                        
                    }
                    return response()->json($dump);
                }
                public function show(){
                    if(DB::table('posts')->exists()){
                        $data=DB::table('posts')
                        ->select('posts.id','posts.title','posts.content')
                        ->limit(10);
                        
                        $success['message'] ="Data Tersedia";
                        $success['postslist'] =$data->get();
                        $dump=$success;
                    }else{
                        $failed['message']="Data tidak ada";
                        $dump=$failed;
                        
                    }
                    return response()->json($dump);
                }
             
            }