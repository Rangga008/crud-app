<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Display a listing of the contacts
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    // Show the form for creating a new contact
    public function create()
    {
        return view('contacts.create');
    }

    // Store a newly created contact in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|unique:contacts,phone', [
                'field_name.unique' => 'Data tersebut sudah ada.',
            ]
        ]);

     // Jika validasi lulus, tambahkan data baru
    Contact::create($request->all());

    return redirect()->route('contacts.index')
                     ->with('success', 'Contact created successfully.'); 
                    }

   

    // Display the specified contact
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    // Show the form for editing the specified contact
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    

    // Update the specified contact in the database
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $contact->update($request->all());

        return redirect()->route('contacts.index')
                         ->with('success', 'Contact updated successfully.');
    }

    // Remove the specified contact from the database
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')
                         ->with('success', 'Contact deleted successfully.');
    }
}