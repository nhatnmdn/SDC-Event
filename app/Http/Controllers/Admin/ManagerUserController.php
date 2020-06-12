<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Model\Role;
use App\Model\User;
use Auth;
use App\Helpers\GlobalHelper;
use Illuminate\Http\Request;

class ManagerUserController extends Controller
{
    protected $message;
    protected $user;

    public function __construct()
    {
        $this->message = GlobalHelper::$message;
        $this->user   = new User();
    }

    public function index(){

        $query = User::query();
        $users = $query->with('role')->orderByDesc('created_at')->paginate( 5);

        $viewData = [
            'users' => $users
        ];
        return view('admin.user.index',$viewData);
    }

    public function create(){
        $roles = Role::all();
        return view('admin.user.create',compact('roles'));
    }

    public function detail(Request $request,$id){
        $users = User::find($id);
        return view('admin.user.detail_user',compact('users'));
    }

    public function store(CreateUserRequest $request)
    {
        $params = $request->except('_token', 'password_confirmation');

        $status = $this->user->store($params);

        if ($status) {
            return redirect(route('admin.get.list.user'))->with('success','Thêm mời người dùng thành công !');
        }

        return back()->withErrors(__('Register Failed. Please check again'));

    }

    public function action(Request $request,$action,$id)
    {
        if ($action) {
            $user = User::find($id);
            switch ($action) {
                case 'delete':
                    $user->delete();
                    break;
            }
        }
        return redirect()->back();
    }

}
