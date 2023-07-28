<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use DB;

class ContactController extends Controller
{
    private $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function index()
    {
        $contacts = $this->contact->all();
        return view('admin.contact.index', compact('contacts'));
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();

            $contact = $this->contact->find($id);
            $contact->delete();

            DB::statement("ALTER TABLE contacts AUTO_INCREMENT = 1");

            DB::commit();

            return back()->with('success', 'Delete Successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }
}
