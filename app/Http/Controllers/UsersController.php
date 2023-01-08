<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::query()->latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }
    
    public function get_users()
    {
        $user = User::select('*');
        return DataTables::of($user)
            ->addIndexcolumn()
            
            ->addColumn('action', function ($row) {
                $btn = '';
                $btn = $btn . '&nbsp; <a data-bs-toggle="modal" data-bs-target="#kt_modal_1" title="تأكيد البريد" style="cursor: pointer"  data-id="{{ $user->id }}" class="text-primary"><i
                class="mdi mdi-email-send font-size-18"></i></a>';
                if($row->status == 'active'){
                $btn = $btn . '&nbsp;<a data-bs-toggle="modal" data-bs-target="#kt_modal_4" title="حظر المستخدم" style="cursor: pointer"  data-id="{{ $user->id }}" class="text-danger"><i
                                                        class="mdi mdi-toggle-switch-off font-size-20"></i></a>';
                }
                if($row->status == 'inactive'){
                $btn = $btn . '&nbsp;<a data-bs-toggle="modal" data-bs-target="#kt_modal_3" title="نفعيل المستخدم" style="cursor: pointer"  data-id="{{ $user->id }}" class="text-success"><i
                                                        class="mdi mdi-toggle-switch font-size-20"></i></a>';
                }
                $btn = $btn . '&nbsp;<a href="'.  route('users.edit' , $row->id) . '" title="تعديل" class="text-success"><i
                                                    class="mdi mdi-pencil font-size-18"></i></a>';
                $btn = $btn . '&nbsp;<a data-bs-toggle="modal" data-bs-target="#kt_modal_2" title="حذف" style="cursor: pointer"  data-id="{{ $user->id }}"  class="text-danger"><i
                                                    class="mdi mdi-delete font-size-18"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'  , 'phone'])
            
            ->make(true);
    }
    public function create()
    {
        return view('admin.users.create');
    }

    public function show(User $user)
    {
        return view('admin.users.show');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:30'],
            'phone' => ['required', 'string', 'min:8', 'max:11', 'unique:users,phone'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'gender' => ['required'],
            'type' => ['required'],
            'country' => ['required'],
            'city' => ['required'],
        ]);
        
        $data = $request->only([
            'name', 'phone', 'email', 'password', 'country', 'city', 'address', 'type', 'gender', 'status'
        ]);
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        if ($user) {
            return back()->with('success', 'تم إنشاء المستخدم بنجاح');
        } else {
            return back()->with('failed', 'حدث خطأ !');
        }
    }

    public function update(Request $request, User $user)
    {

        $request->validate([
            'name' => 'required| string| min:3| max:30',
            'phone' => 'required| string| min:8| max:11|unique:users,phone,' . $user->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $data = $request->only([
            'name', 'phone', 'email', 'password', 'country', 'city', 'address', 'type', 'gender', 'status'
        ]);

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            $data = Arr::except($data, array('password'));
        }
        $user = User::query()->findOrFail($user->id)->update($data);

        if ($user) {
            return redirect()->route('users.index')->with('success', 'تم التعديل على بيانات المستخدم بنجاح');
        } else {
            return back()->with('error', 'حدث خطأ !');
        }
    }

    public function destroy(Request $request)
    {
        $user = User::query()->findOrFail($request->id)->delete();
        if ($user) {
            return redirect()->route('users.index')->with('success', 'تم حذف المستخدم بنجاح');
        } else {
            return back()->with('error', 'حدث خطأ !');
        }
    }

    public function verify_user(Request $request)
    {
        $user = User::query()->findOrFail($request->id)->markEmailAsVerified();
        if ($user) {
            return redirect()->route('users.index')->with('success', 'تم تأكيد البريد الإلكتروني بنجاح');
        } else {
            return back()->with('error', 'حدث خطأ !');
        }
    }

    public function active_user(Request $request)
    {
        $user = User::query()->findOrFail($request->id)->update(['status' => 'active']);
        if ($user) {
            return redirect()->route('users.index')->with('success', 'تم تفعيل المستخدم بنجاح');
        } else {
            return back()->with('error', 'حدث خطأ !');
        }
    }

    public function deactivate_user(Request $request)
    {
        $user = User::query()->findOrFail($request->id)->update(['status' => 'inactive']);
        if ($user) {
            return redirect()->route('users.index')->with('success', 'تم حظر المستخدم بنجاح');
        } else {
            return back()->with('error', 'حدث خطأ !');
        }
    }

    public function search_user(Request $request)
    {

        $search = $request->get('query', false);
        $users = User::query()->where(function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('phone', 'like', '%' . $search . '%')
                ->orWhere('country', 'like', '%' . $search . '%')
                ->orWhere('city', 'like', '%' . $search . '%');
        })->latest()->paginate(20);

        return view('admin.users.index', compact('users'));
    }

    public function profile()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('admin.users.profile', [
            'user' => $user,
        ]);
    }

    public function edit_profile(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255|string',
            'email' => 'required|min:3|max:255|string',
            'phone' => 'required|min:3|max:255|string',
            'whatsapp' => 'string',
            'linkedin' => 'string',

        ], [
            'required' => 'هذا الحقل مطلوب',
            'string' => 'هذا الحقل يجب ان يحتوي على نص',
            'max' => 'هذا الحقل طويل للفاية',
            'min' => 'هذا الحقل قصير للغاية',
        ]);
        User::where('id', Auth::user()->id)->update([
            'name' =>  $request->name,
            'email' =>  $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'whatsapp' => $request->whatsapp,
            'linkedin' => $request->linkedin,
        ]);
        return redirect()->back();
    }

    public function edit_password(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password'
        ], [

            'required' => 'هذا الحقل مطلوب',
            'string' => 'هذا الحقل يجب ان يحتوى على نص',
            'min' => 'هذا الحقل اقصر من 8 احرف',
            'same' => 'كلمة المرور الجديدة غير متطابقة',

        ]);


        #Match The Old Password
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", "كلمة المرور القديمة خاطئة!");
        } else {
            #Update the new Password
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->password)
            ]);

            return back()->with("status", "تم التعديل بنجاح!");
        }
    }
}
