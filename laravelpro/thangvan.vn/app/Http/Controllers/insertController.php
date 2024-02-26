<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Spatie\LaravelIgnition\Http\Requests\UpdateConfigRequest;

class insertController extends Controller
{
    function add()
    {
        // DB::table("posts")->insert(
        //     ['title' => "post", "content" => "content_1", "user_id" => 2]
        // );
        //  di sang ben post.php
        // Post::create(
        //     [
        //         "title"=>"xoi ruoc",
        //         "content"=>"content4",
        //         "user_id"=>3

        //     ]
        // );

        return view("post.create");
    }
    function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'content' => 'required'

            ],

            [
                'required' => ' :attribute không được để trống',

            ],
            [
                'title' => 'tiêu đề',
                'content' => 'nội dung'
            ]
        );

        $input = $request->all();

        if ($request->hasFile('file')) {


            $file = $request->file;
            //lay ten file
            $filename = $file->getClientOriginalName();
            // lay duoi file
            // echo $file->getClientOriginalExtension();

            // lay kich thuoc file
            // echo $file->getSize();

            $path = $file->move('public/uploads', $file->getClientOriginalName());
            $thumbnail = 'public/uploads/' . $filename;
            $input['thumbnail'] = $thumbnail;
        }
        $input['user_id'] = 3;


        Post::create($input);

        // return $request->input();
        // them xong chuyeen huong
        return redirect('post/show')->with("status", "them bai viet moi thanh cong");
    }

    // return view("post.reg");


    function show()
    {
        // chuyen huong kenh khac
        // return redirect()->away('http://unitoo.thangdai')



        //    $posts=DB::table("posts")->select("title","content")->get();
        //    return $posts;

        // lay ban ghi dau tien
        //    $posts=DB::table("posts")->where("id",2)->first();
        //  lay theo id
        //    $posts=DB::table("posts")->find(2);

        //    echo $posts->user_id;
        //    count dem so ban ghi
        // $number_posts=DB::table("posts")->where("user_id",2)->count();

        // echo $number_posts;
        //  tim user_id lon nho avg nhat trong mang so
        // $max =DB::table("posts")->max("user_id");

        //   lay du lieu hai bang
        // $posts=DB::table("posts")
        // ->join("users","user_id", "=", "posts.user_id")
        // ->select("users.name","posts.title")
        // ->get();
        // print_r($posts);

        //    print_r($posts);


        //where lay theo user id
        // $posts=DB::table("posts")
        // ->where('user_id',2)
        // ->get();


        //where lay theo user id
        // $posts=DB::table("posts")
        // ->where('user_id',"<",3)
        // ->orWhere("id","=",1)
        // ->get();



        // $posts = DB::table("posts")
        //     //offset(2) loai hai cai dau tien
        //     // limit(2) lay hai cai dau tien
        //     ->selectRaw("COUNT('id') as number_posts,user_id")
        //     ->groupBy('user_id')->get();


        // // orderBy("","des")xep theo thu tu tang dan,giam dan asc
        // echo "<pre>";
        // print_r($posts);
        // echo "</pre>";


        // $posts=Post::all();

        // query Builder

        // $posts=DB::table('posts')->paginate(4);

        // ORM
        $posts = Post::latest()->paginate(1);


        // hien thi tren duong an bat ki
        // $posts->withPath("demo/show");



        // theo thu tu giam dan
        // $posts=Post::orderBy('id',"desc")->paginate(2);

        // $posts=Post::where("id",">",2)->orderBy('id',"desc")->paginate(2);
        return view("post.index", compact("posts"));
    }

    function update($id)
    {
        // DB::table("posts")
        // ->where('id',$id)
        // ->update([
        //     "title"=>"windown"
        // ]);
        // Update
        $post = Post::where("id", $id)
            ->update(
                [
                    "title" => "update",
                    "content" => "content_2",
                    "user_id" => 3
                ]
            );
    }

    function delete($id)
    {
        DB::table("posts")
            ->where('id', $id)
            ->delete();

        $post = Post::where("user_id", 1)
            ->delete();
        // xoa dung cai nay 
        return Post::destroy([1, 3]);
        //  xoa tam thoi
        $post = Post::find($id);
        $post->delete();
    }


    function read()
    {
        //  lay tat ca ban ghi 
        // $post=Post::all();
        // return $post;
        //  lay ban ghi dau tien
        // $posts=DB::table("posts")->where("id",2)->get();

        // $posts=DB::table("posts")->find(1);

        // $posts=Post::orderBy("user_id","desc")->get();

        //  lay hai cai loai cai 1
        // $posts=Post::limit(2)
        // ->offset(1)
        // ->get();

        // lay cac ban gi da bi xoa
        // $posts=Post::withoutTrashed()->get();
        //  lay ban ghi vua xoa
        // $posts=Post::onlyTrashed()->get();

        // $img=Post::find(2)
        // ->FeaturedImages;
        // return $img;

        // no lay theo id
        // $user =Post::find(3)
        // ->User;
        // return $user;

        $post = User::find(3)
            ->posts;
        return $post;
    }
    //  khoi phuc cai bi xoa
    function restore($id)
    {
        $post = Post::onlyTrashed()
            ->where('id', $id)
            ->restore();
    }
    // xoa vinh vien
    function permanetlyDelete($id)
    {
        $post = Post::onlyTrashed()
            ->where('id', $id)
            ->forceDelete();
    }
}
