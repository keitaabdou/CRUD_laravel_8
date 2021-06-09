<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.list', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->nom);
        $validate= $request->validate([
            'nom' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);

        $contact = new Contact;

        $contact->nom = $request->nom;
        $contact->email = $request->email;
        $contact->message = $request->message;

        $contact->save();

        return back()->with('succes', 'Message envoyer avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('contacts.edit', compact('contact'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            // dd($request->nom);
        $validate= $request->validate([
            'nom' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);

        $data = [
            'nom'=> $request->nom,
            'email' => $request->email,
            'message' => $request->message
        ];

        Contact::where('id', $id)
         ->update($data);

        return redirect('/contact/list')->with('succes', 'Contact Modifier avec succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id)->delete();
        return back()->with('succes', 'Contact supprimé');
    }
}
