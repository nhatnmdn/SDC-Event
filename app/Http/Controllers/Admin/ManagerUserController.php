<?php

namespace App\Http\Controllers\Admin;

use App\Filters\UserFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Model\Role;
use App\Model\User;
use App\Helpers\GlobalHelper;
use Illuminate\Http\Request;

class ManagerUserController extends Controller
{
    protected $message;
    protected $user;
    protected $userFilter;

    public function __construct()
    {
        $this->message    = GlobalHelper::$message;
        $this->user       = new User();
        $this->userFilter = app(User::class);
    }

    public function index(Request $request)
    {
        $limits    = $request->get('limits', 10);
        $search    = $request->get('search', '');
        $searchKey = $request->get('searchBy', '');
        $userFilter = new UserFilter();

        $users = $this->userFilter->getUsers($userFilter, $limits, $search, $searchKey);

        return view('admin.user.index', compact("users"));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }

    public function detail(Request $request, $id)
    {
        $users = User::find($id);
        return view('admin.user.detail_user', compact('users'));
    }

    public function store(CreateUserRequest $request)
    {
        $params = $request->except('_token', 'password_confirmation');

        $status = $this->user->store($params);

        if ($status) {
            return redirect(route('admin.get.list.user'))->with('success', 'Thêm mời người dùng thành công !');
        }

        return back()->withErrors(__('Register Failed. Please check again'));

    }

    public function action(Request $request, $action, $id)
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
