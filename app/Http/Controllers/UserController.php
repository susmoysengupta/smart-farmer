<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::query()
            ->when(request('search'), function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            })
            ->orderByRaw('id = ' . auth()->user()->id . ' DESC')
            ->latest()
            ->paginate(10, '*', 'users', );

        return view('users.index', compact('users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->id == auth()->user()->id) {
            return redirect()->route('users.index')->with('error', 'You cannot delete yourself.');
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted.');
    }

    /**
     * @param User $user
     * @param Request $request
     */
    public function updateBalance(User $user, Request $request)
    {
        $request->validate([
            'balance' => 'required|numeric|min:10',
        ]);

        $user->update([
            'balance' => $user->balance + $request->balance,
        ]);

        return redirect()->back()->with('success', 'Balance updated.');
    }
}
