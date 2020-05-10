<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $datas = Owner::all()->where('active', '2');
        return view('pages.admin.owner.index', compact('datas'));
    }

    public function destroy($id)
    {
        $data = Owner::findOrFail($id);
        $data->update(['active' => '0']);
        return redirect()->route('owner.index');
    }
}
