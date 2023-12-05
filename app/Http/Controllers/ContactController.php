<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $contact;
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function store(ContactRequest $request)
    {
        try {
            $data = $request->all();
            $data['datetime'] = Carbon::now('Asia/Ho_Chi_Minh');
            unset($data['_token']);
            $this->contact->create($data);
            return redirect()->route('contact')->with('success', "Gửi liên hệ thành công!");
        } catch (\Throwable $th) {
            return redirect()->route('index');
        }
    }

    public function adminShow()
    {
        $data = $this->contact->latest()->get();
        // dd(Carbon::now('Asia/Ho_Chi_Minh'));
        return view('admin.contact.index', compact('data'));
    }
}
