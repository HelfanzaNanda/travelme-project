<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Owner;
use Illuminate\Http\Request;

class NotificationController extends Controller
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
        $datas = Owner::all()->where('active', '1');
        return view('pages.admin.notification.index', compact('datas'));
    }

    public function update(Request $request, $id)
    {
        $data = Owner::findOrFail($id);
        $data->update(['active' => '2']);
        return redirect()->route('notification.index')->with('create', 'Berhasil Mengkonfirmasi Travel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Owner::find($id);
        $data->update(['active' => '0']);
        return redirect()->route('notification.index')->with('create', 'Berhasil Tidak Mengkonfirmasi Travel');
    }
}
