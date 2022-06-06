<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Models\Phone;
use App\Models\Phonebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhonebookController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phonebook = Phonebook::with('email', 'phone')->get();
        return view('phonebook')->with('phonebooks', $phonebook);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'photo' => 'required',
            'address' => 'required',
            'mailing_address' => '',
        ]);

        $fileName = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('images'), $fileName);
        $data["photo"] = "/images/" . $fileName;
        if ($request->mailing_address == "") {
            $data["mailing_address"] = $data["address"];
        }

        $phonebook = Phonebook::create($data);
        $lastInsertID = $phonebook->id;
        foreach ($request->email as $value) {
            Email::firstOrCreate([
                'email' => $value,
                'phonebook_id' => $lastInsertID,
            ]);
        }

        collect($request->phone)
            ->filter()
            ->each(function ($phone) use ($phonebook) {
                Phone::firstOrCreate([
                    'phone' => $phone,
                    'phonebook_id' => $phonebook->id,
                ]);
            });
        return redirect("/")->with('status', 'Successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function show(Phonebook $phonebook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phonebook = Phonebook::findOrFail($id);
        $phonebook->delete();
        return back()->with('status', 'Successfully deleted with all the connected data');
    }
}
