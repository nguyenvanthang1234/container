<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;






class adminUserController extends Controller
{
    //
    function __construct()
    {
        $this->middleware(function($request,$next){
            session(["module_active"=>"user"]);
            return $next($request);
        });
    }

    function list(Request $request)
    {

        $status = $request->input("status");
        $users = []; // Khởi tạo một biến $users trước khi sử dụng

        $list_act=[
            "delete"=>'xóa tạm thời',
        ];

        if ($status == 'trash') {
            $list_act=[
                "restore"=>'khôi phục',
                'forceDelete'=>'xóa vĩnh viễn'
            ];
    
            $users = User::onlyTrashed()->paginate(10);
        } else {
            $keyword = "";
            if ($request->input("keyword")) {
                $keyword = $request->input("keyword");
            }
            $users = User::where("name", "LIKE", "%{$keyword}%")->paginate(10);
        }

        $count_user_active = User::count();
        $count_user_trash = User::onlyTrashed()->count();

        $count = [$count_user_active, $count_user_trash];

        return view("admin.user.list", compact("users", "count","list_act"));
    }


    function add()
    {


        return view("admin.user.add");
    }


    function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'], // Sử dụng 'users' thay vì '.User::class'
            'password' => ['required', Rules\Password::defaults()]
        ], [
            'required' => ':attribute không được để trống',
            'min' => ':attribute phải có ít nhất :min ký tự',
            'max' => ':attribute không được vượt quá :max ký tự',
        ], [
            'name' => 'Tên người dùng',
            'email' => 'Email',
            'password' => 'Mật khẩu',
        ]);

        User::create([
            'name' => $request->input("name"),
            'email' => $request->input("email"),
            'password' => Hash::make($request->password),
        ]);

        return redirect('admin/user/list')->with('status', 'Đã thêm dữ liệu thành công');
    }

    function delete($id)
    {
        if (Auth::id() != $id) {
            $users = User::find($id);


            $users->delete();
            return redirect("admin/user/list")->with("status", 'Đã xóa thành viên thành công');

            // return redirect("admin/user/list")->with("status", 'Không tìm thấy thành viên');

        } else {
            return redirect("admin/user/list")->with("status", 'Bạn không thể xóa mình khỏi hệ thống');
        }
    }

    function action(Request $request)
    {
        $list_check = $request->input('list_check');

        if ($list_check) {
            foreach ($list_check as $k => $id) {
                if (Auth::id() == $id) {
                    unset($list_check[$k]);
                }
            }
            if (!empty($list_check)) {
                $act = $request->input('act');
                if ($act == 'delete') {
                    User::destroy($list_check);
                    return redirect('admin/user/list')->with("status", "ban da xoa thanh cong");
                }


                if ($act == "restore") {
                    User::withTrashed()
                        ->whereIn("id", $list_check)
                        ->restore();
                    return redirect('admin/user/list')->with("status", "ban da khoi phuc  thanh cong");
                }
                if ($act == "forceDelete") {
                    User::withTrashed()
                        ->whereIn("id", $list_check)
                        ->forceDelete();
                    return redirect('admin/user/list')->with("status", "bạn đã xoa vĩnh viện thành công");
                }
            }

            return redirect("admin/user/list")->with("status", "ban ko the thao tac tren tac vu");
        }else{
            return redirect("admin/user/list")->with("status","ban chon phan tu can thuc thi");

        }



    }


    function edit($id){
        $user=User::find($id);
        return view("admin.user.edit",compact("user"));

    }

    function update(Request $request ,$id){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', Rules\Password::defaults()]
        ], [
            'required' => ':attribute không được để trống',
            'min' => ':attribute phải có ít nhất :min ký tự',
            'max' => ':attribute không được vượt quá :max ký tự',
        ], [
            'name' => 'Tên người dùng',
            'password' => 'Mật khẩu',
        ]);

        User::where('id',$id)->update([
            'name' => $request->input("name"),
           
            'password' => Hash::make($request->password),
        ]);
        return redirect('admin/user/list')->with('status', 'Đã cập nhật thành công');


    }
}
