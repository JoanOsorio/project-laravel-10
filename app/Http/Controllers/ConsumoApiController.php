<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ConsumoApiController extends Controller
{

    public function showUser($userId)
    {
        $userResponse = Http::get("https://jsonplaceholder.typicode.com/users/{$userId}");
        $user = $userResponse->json();

        $postsResponse = Http::get("https://jsonplaceholder.typicode.com/posts?userId={$userId}");
        $userPosts = $postsResponse->json();

        return view('users.api', [
            'user' => $user,
            'posts' => $userPosts,
        ]);
    }

    public function showAllUsersApi(){
        $apiUrl = 'https://jsonplaceholder.typicode.com/users';
        $response = file_get_contents($apiUrl);
        $users = json_decode($response);

        return view('users.usersApi', [
            'users' => $users,
        ]);
    }

    
}
