<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = auth()->user()->contacts;

        return response()->json([
            'success' => true,
            'data' => $contacts
        ], 200);
    }

    public function show($id)
    {
        $contact = auth()->user()->contacts()->find($id);

        if (!$contact)
            return response()->json([
                'success' => false,
                'message' => 'Not found'
            ], 404);

        return response()->json([
            'success' => true,
            'data' => $contact
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'telephone' => 'required'
        ]);

        if ($validator->fails())
            return response()->json([
                'status' => false,
                'message' => $validator->errors()
            ], 422);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->telephone = $request->telephone;

        if (auth()->user()->contacts()->save($contact))
            return response()->json([
                'success' => true,
                'message' => 'Successfully created'
            ], 201);

        return resonse()->json([
            'success' => false,
            'message' => 'Failed: could not create'
        ], 500);
    }

    public function update(Request $request, $id)
    {
        $validator =  Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'telephone' => 'required'
        ]);

        if ($validator->fails())
            return response()->json([
                'status' => false,
                'message' => $validator->errors()
            ], 422);

        $contact = auth()->user()->contacts()->find($id);

        if (!$contact)
            return response()->json([
                'success' => false,
                'message' => 'Not found'
            ], 404);

        $updated = $contact->fill($request->all())->save();

        if ($updated)
            return response()->json([
                'success' => true,
                'message' => 'Successfully updated'
            ], 200);

        return response()->json([
            'success' => false,
            'message' => 'Failed: could not update'
        ], 500);
    }

    public function destroy($id)
    {
        $contact = auth()->user()->contacts()->find($id);

        if (!$contact)
            return response()->json([
                'success' => false,
                'message' => 'Not found'
            ], 404);

        if ($contact->delete())
            return response()->json([
                'success' => true,
                'message' => 'Successfully deleted'
            ], 202);

        return response()->json([
            'success' => false,
            'message' => 'Failed: could not delete'
        ], 500);
    }
}
