<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $content = 'Akun Anda Sudah Diverifikasi oleh Admin, Silahkan Login';
        $this->sendEmail($data, $content);
        return redirect()->route('admin.notification.index')->with('success', 'Berhasil Mengkonfirmasi Travel');
    }


    private function sendEmail($owner, $content)
    {
        Mail::send('send_email.email-acc',
        ['content' => $content],
        function ($message) use($owner){
            $message->from('travelme@gmail.com', 'Travelme');
            $message->to($owner->email, $owner->business_name);
            $message->subject('Akun Anda Telah DiVerifikasi');
        });
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
        $content = 'Akun Anda Tidak Diverifikasi oleh Admin';
        $this->sendEmail($data, $content);
        return redirect()->route('admin.notification.index')->with('success', 'Berhasil Tidak Mengkonfirmasi Travel');
    }
}
