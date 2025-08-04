<?php

namespace App\Http\Controllers\ProfilePage;

use App\Models\Submember;
use App\Http\Controllers\Controller;
// use App\Http\Controllers\ProfilePage\DashboardController;
use App\Models\User;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\SubmemberService;
use App\Http\Requests\SubmemberRequest;

class DashboardController extends Controller
{
    protected $SubmemberService;

    public function __construct(SubmemberService $SubmemberService)
    {
        $this->SubmemberService = $SubmemberService;
    }

    /**
     * Display a listing of the resource.
     */


    // public function selectUserByUser()
    // {
    //     if (!Auth::check()) {
    //         return redirect()->route('login');
    //     }

    //     $user = Auth::user();

    //     if ($user->isAdmin()) {
    //         $users = User::all();
    //     } elseif ($user->isUser()) {
    //         $users = User::where('role', 'guest')->get();
    //     } else {
    //         $users = collect(); // empty collection
    //     }

    //     return view('dashboard', compact('users'));
    // }

    private function SelectUser($role)
    {
      if($role === 'admin')
        {
            return User::where('role', 'member')->get();
        } elseif ($role === 'member') {
            return User::where('role', 'sub-member')->get();
        } else {
            return User::all();
        }
    }
    public function index()
    {           
        $currentUser = Auth::user();
        $selectedadmin = $this->SelectUser($currentUser->role);
        // $selectedadmin = User::where('role', 'member')->get();
        return view('ProfileUser.view_info_user', compact('selectedadmin', 'currentUser'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function viewSubmemer()
    {
        $currentUser = Auth::user();
        $userId = $currentUser->id;
        $selectedmember = User::where('role', 'member')->get();
        $submemberlist = $this->SubmemberService->getSubmemberByUserId($userId);
        // $getSubMember = Submember::where('user_id', Auth::id())->get();
        return view('ProfileUser.tableuser', compact('submemberlist', 'currentUser', 'selectedmember'));
    }
    public function createSubmember()
    {
        $currentUser = Auth::user();
        $userId = $currentUser->role;
        return view('ProfileUser.formSubmember', compact('currentUser', 'userId'));
    }
    public function storeSubmember(SubmemberRequest $request)
    {
        $validated = $request->validated();
        $submember = $this->SubmemberService->createSubmember($validated);
        return redirect()->route('profile.submembers')->with('success', 'Submember created successfully!');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
