<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUser;
use App\Models\Image;
use App\Models\User;
use App\Services\Counter;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $counter;

    public function __construct(Counter $counter)
    {
        $this->middleware('auth');
        $this->authorizeResource(User::class, 'user');
        $this->counter = $counter;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(User $user)
    {
        $counter = resolve(Counter::class);

        return view(
            'users.show',
            [
                'user' => $user,
                'counter' => $this->counter->increment("user-{$user->id}")
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUser $request, User $user)
    {
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars');
            if ($user->image) {
                $user->image->path = $path;
                $user->image->save();
            } else {
                $user->image()->save(
                    Image::make([
                        'path' => $path
                    ])
                );
            }
        }

        if ($request->get('name')) {
            $user->name = $request->get('name');
        }
        $user->locale = $request->get('locale');
        $user->save();

        return redirect()->back()->withStatus('Profile was updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
