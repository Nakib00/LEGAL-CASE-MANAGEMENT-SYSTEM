<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class AdvisorController extends Controller
{
    //open advisor profile
    public function advisordProfile()
    {
        // get login admin id
        $advisorId = auth()->guard('ladvisor')->id();

        $advisor = DB::select("SELECT * FROM legal_advisors WHERE id = ?", [$advisorId]);

        $advisor = $advisor[0];

        return view('legalAdvisor.AdvisorProfile', ['advisor' => $advisor]);
    }
    // update admin profile
    public function update(Request $request, $id)
    {
        // Validate the input fields
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'nid' => 'required|numeric',
            'current_password' => 'required',
            'new_password' => 'nullable|min:6',
        ]);

        // Fetch the current password hash for the legal advisor using raw SQL
        $advisor = DB::table('legal_advisors')->where('id', $id)->first();

        // Check if the current password matches
        if (Hash::check($request->current_password, $advisor->password)) {

            // Prepare an array of fields to update
            $updateFields = [
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'nid' => $request->nid,
            ];

            // If a new password is provided, hash it and add it to the update array
            if ($request->new_password) {
                $updateFields['password'] = Hash::make($request->new_password);
            }

            // Update the advisor details using raw SQL
            DB::table('legal_advisors')->where('id', $id)->update($updateFields);

            return redirect()->back()->with('success', 'Profile updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }
    }
}
