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
    //bisa jalan juga 

    // public function index()
    // {
    //     $posts = Post::all();

    //     return response()->json([
    //         'success' => true,
    //         'message' =>'List Semua Post',
    //         'data'    => $posts
    //     ], 200);
    // }
    
    // public function store(Request $request)
    // {
    // $validator = Validator::make($request->all(), [
    //     'title'   => 'required',
    //     'content' => 'required',
    // ]);

    // if ($validator->fails()) {

    //     return response()->json([
    //         'success' => false,
    //         'message' => 'Semua Kolom Wajib Diisi!',
    //         'data'   => $validator->errors()
    //     ],401);

    // } else {

    //     $post = Post::create([
    //         'title'     => $request->input('title'),
    //         'content'   => $request->input('content'),
    //     ]);

    //     if ($post) {
    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Post Berhasil Disimpan!',
    //             'data' => $post
    //         ], 201);
    //     } else {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Post Gagal Disimpan!',
    //         ], 400);
    //     }

    // }
    // }
        //bisa jalan juga


    // public function create(Request $request) {
        
                    
    //                       DB::table($this->table_main)
    //                                 ->insert([
                                        
    //                                       'title'     => $request->title,
    //                                     'content'       => $request->content,
    //                                     ]);
    //                                     // echo('Data Berhasil di tambahkan');
                                    
                              
    //             }
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
                // public function creates(){
                //     if(DB::table('posts')){
                //         $data=DB::table('posts')
                //         ->insert([
                //                     'title'     => $request->input('title'),
                //                     'content'   => $request->input('content'),
                //           ]
                //       );
                        
                //         $success['message'] ="Data Tersedia";
                //         $success['postslist'] =$data->post();
                //         $dump=$success;
                //     }else{
                //         $failed['message']="Data tidak ada";
                //         $dump=$failed;
                        
                //     }
                //     return response()->json($dump);
                // }
                // private function create(Request $request) {
        
                //     try {
                //         return  DB::table($this->posts)
                //                     ->insert([
                //                         'Patrol_ID'     => $request->Patrol_ID,
                //                         'Comp_ID'       => $request->Comp_ID,
                //                         'Cust_ID'       => $request->Cust_ID,
                //                         'Site_ID'       => $request->Site_ID,
                //                         'Location_ID'   => $request->Location_ID,
                //                         'Activity_Date' => $request->Activity_Date,
                //                         'Activity_Time' => $request->Activity_Time,
                //                         'Officer_ID'    => $request->Officer_ID,
                //                         'Notes'         => $request->Notes,
                //                         'Act_Lat'       => $request->Act_Lat,
                //                         'Act_Lng'       => $request->Act_Lng,
                //                         ]
                //                     );
                                    
                //                 } catch (\Throwable $th) {
                //                     dd($th);
                //                 }
                // }
                // public function show($id)
                //             {
                //         $post = Post::find($id);
            
                //         if ($post) {
                //             return response()->json([
                //                 'success'   => true,
                //                 'message'   => 'Detail Post!',
                //                 'data'      => $post
                //             ], 200);
                //         } else {
                //             return response()->json([
                //                 'success' => false,
                //                 'message' => 'Post Tidak Ditemukan!',
                //             ], 404);
                //         }
                //             }
            
                //             public function update(Request $request, $id)
                //             {
                //                 $validator = Validator::make($request->all(), [
                //                     'title'   => 'required',
                //                     'content' => 'required',
                //                 ]);
                            
                //                 if ($validator->fails()) {
                            
                //                     return response()->json([
                //                         'success' => false,
                //                         'message' => 'Semua Kolom Wajib Diisi!',
                //                         'data'   => $validator->errors()
                //                     ],401);
                            
                //                 } else {
                            
                //                     $post = Post::whereId($id)->update([
                //                         'title'     => $request->input('title'),
                //                         'content'   => $request->input('content'),
                //                     ]);
                            
                //                     if ($post) {
                //                         return response()->json([
                //                             'success' => true,
                //                             'message' => 'Post Berhasil Diupdate!',
                //                             'data' => $post
                //                         ], 201);
                //                     } else {
                //                         return response()->json([
                //                             'success' => false,
                //                             'message' => 'Post Gagal Diupdate!',
                //                         ], 400);
                //                     }
                            
                //                 }
                //             }
                            // public function alfian($id){
                            //     if(DB::table('posts')->where('posts.id',$id)->exists()){
                            //         $data=DB::table('posts')
                            //         ->select('posts.id','posts.title')
                            //         ->where('posts.id',$id)
                            //         ->limit(10);
            
                            //         $success['message'] ="Data Tersedia";
                            //         $success['postslist'] =$data->get();
                            //         $dump=$success;
                            //     }else{
                            //         $failed['message']="Data tidak ada";
                            //         $dump=$failed;
            
                            //     }
                            //     return response()->json($dump);
                            // }
            }