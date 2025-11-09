<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // admin can assign writers
    public function index(Request $request)
    {
        $search   = trim((string) $request->get('q', ''));
        $status   = $request->get('status');
        $role     = $request->get('role');
        $other    = false;
        if ($role === 'other') {
            $other = true;
        }

        $users = User::select('id', 'ar_name', 'email', 'role', 'status')
            ->where('role', '!=', 'super-admin')
            ->when($search !== '', function ($q) use ($search) {
                $q->where(function ($w) use ($search) {
                    $w->where('ar_name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->when($role !== null && $role !== '', function ($q) use ($role, $other) {
                if ($other) {
                    $q->where('role', '!=', 'admin')
                        ->where('role', '!=', 'writer');
                } else {
                    $q->where('role', $role);
                }
            })
            ->when($status !== null && $status !== '', function ($q) use ($status) {
                $q->where('status', $status);
            })
            ->paginate(20);
        return view('auth.users.index', ['rows' => $users]);
    }

    public function create()
    {
        return view('auth.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:190'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'in:admin,writer'],
            'status' => ['required', 'boolean'],
        ]);

        $user = User::create([
            'ar_name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'status' => $request->status
        ]);
        if ($user) {
            return redirect()->route('users.index')->with('flash_message', "{$user->role} created successfully");
        }
        return redirect()->route('users.index')->with('flash_error', 'Something went wrong');
    }

    public function edit(User $user)
    {
        return view('auth.users.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:190'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
            'role' => ['required', 'in:admin,writer'],
            'status' => ['required', 'boolean'],
        ]);

        $user->update([
            'ar_name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'status' => $request->status
        ]);
        return redirect()->route('users.index')->with('flash_message', "{$user->role} updated successfully");
    }

    public function changeRole(Request $request, User $user)
    {
        $request->validate([
            'role' => ['required', 'in:admin,writer'],
        ]);
        $user->update(['role' => $request->role]);
        return redirect()->back()->with('flash_message', 'Role changed successfully');
    }

    public function toggleStatus(User $user)
    {
        $user->update(['status' => !$user->status]);
        return redirect()->back()->with('flash_message', 'Status changed successfully');
    }
}
