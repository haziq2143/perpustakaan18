<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::id())->first();
        $qr = QrCode::size(200)->format('svg')
            ->generate(
                $user->code_unique,
            );
        return view('profile.index', compact('user', 'qr'));
    }
}
