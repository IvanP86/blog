<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Mail\User\PasswordMail;
use App\Mail\User\PasswordMail2;
use App\Jobs\StoreUserJob;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
    	$data = $request->validated();
    	// $password = Str::random(10);
  //   	 $data['password'] = Hash::make($data['password']);
  //   	// $data['password'] = Hash::make($password);
		// User::firstOrCreate(['email' => $data['email']], $data);
		// Mail::to($data['email'])->send(new PasswordMail($password));
        StoreUserJob::dispatch($data);
    	return redirect()->route('admin.user.index');
    }
}
