<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Service\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(private UserService $userService) {}

    public function index()
    {
        return view('home', [
            'users' => UserResource::collection($this->userService->index())
        ]);
    }

    public function show(int $id)
    {
        return view('show', [
            'user' => new UserResource($this->userService->show($id))
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(UserRequest $request)
    {
        $message = $this->userService->store($request->validated());

        return redirect()->route('home')->with('message', $message);
    }

    public function buscar(int $cep)
    {
        return $this->userService->buscar($cep);
    }
}
