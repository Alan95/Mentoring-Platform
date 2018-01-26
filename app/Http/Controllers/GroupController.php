<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Events\GroupCreated;

class GroupController extends Controller
{
    public function store()
    {
        $group = Group::create(['name' => request('name')]);

        $users = collect(request('users'));
        $users->push(auth()->user()->id);

        $group->users()->attach($users);

        broadcast(new GroupCreated($group))->toOthers();

        return $group;
    }

    public function index()
    {
        $groups = Group::all();
        return response()->json($groups);
    }
}
