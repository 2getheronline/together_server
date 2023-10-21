<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Kreait\Firebase\JWT\Error\IdTokenVerificationFailed;
use Kreait\Firebase\JWT\IdTokenVerifier;
use App\Group;

class SessionsController extends Controller
{
    public function store(Request $request)
    {
        if ($request->groupId) {
            $group = Group::where('id', $request->groupId)
                ->where('password', $request->groupPassword)
                ->firstOrFail();
        }

        $projectId = 'togetheronlinedev';
        $idToken = $request->token;

        $verifier = IdTokenVerifier::createWithProjectId($projectId);

        try {
            $token = $verifier->verifyIdTokenWithLeeway($idToken, 3600);
        } catch (IdTokenVerificationFailed $e) {
            return $e->getMessage();
        }

        $payload = $token->payload();

        $email = $payload['email'] ?? '';
        $user = User::where('email', $email)->first();

        if (!$user) {
            $user =  User::create([
                'name' => $payload['name'] ?? $request->name,
                // 'birthdate' => $faker->date,
                'avatar' => $payload['picture'] ?? '',
                'email' => $email,
                'phone' => $payload['phone_number'] ?? '',
                // 'city' => $faker['city,
                // 'country' => $faker['country,
                'groupId' => $group->id ?? null,
                'points' => 0
            ]);
            $user->apiKey = Str::random(60);
            $user->uid = $payload['user_id'];
            $user->save();
        }

        $user->makeVisible(['apiKey']);
        return $user;
    }
}
