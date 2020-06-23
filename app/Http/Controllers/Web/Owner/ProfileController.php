<?php

namespace App\Http\Controllers\Web\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:owner');
    }

    public function index()
    {
        $owner = Auth::guard('owner')->user();

        return view('pages.owner.profile.index', compact('owner'));
    }

    public function update(Request $request)
    {
        $photo = $request->file('photo');
        $filename = time() . '.' . $photo->getClientOriginalExtension();
        $filepath = 'owner/' . $filename;
        Storage::disk('s3')->put($filepath, file_get_contents($photo));

        $owner = Auth::guard('owner')->user();
        $owner->telephone = $request->telephone;
        $owner->password = Hash::make($request->password);
        $owner->address = $request->address;
        $owner->photo = Storage::disk('s3')->url($filepath, $filename);
        $owner->save();

        return redirect()->route('owner.profile.index')->with('success', 'berhasil mengupdate data');
    }
   
}
