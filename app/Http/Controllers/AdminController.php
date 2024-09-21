<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //Create case
    public function CreateCase()
    {
        return view('admin.CreateCase');
    }
    // store case
    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'number' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string',
            'defendant' => 'required|string',
            'plaintiff' => 'required|string',
            'rep_defendant' => 'required|string',
            'rep_plaintiff' => 'required|string',
            'court_date' => 'required|date',
            'files.*' => 'required|file',
        ]);

        // Handle file uploads
        $files = [];
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filename = $file->store('evidence', 'public'); // Store in 'public/evidence' directory
                $files[] = $filename;
            }
        }

        // get login admin id
        $adminId = auth()->guard('admin')->id();

        DB::insert('INSERT INTO cases (number, description, status, Parties_defendant, Parties_Plaintiff, representatives_defendant, representatives_plaintiff, court_date, file,admin_id, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())', [
            $request->input('number'),
            $request->input('description'),
            $request->input('status'),
            $request->input('defendant'),
            $request->input('plaintiff'),
            $request->input('rep_defendant'),
            $request->input('rep_plaintiff'),
            $request->input('court_date'),
            json_encode($files),
            $adminId
        ]);

        return redirect()->back()->with('success', 'Case created successfully!');
    }

    // case ditails
    public function DatailsCase($id)
    {
        $case = DB::select("SELECT * FROM cases WHERE id = ?", [$id]);

        if (empty($case)) {
            abort(404); // Handle case not found
        }

        // Get the first case object
        $case = $case[0];

        // Fetch the case comments along with the advisor names
        $comments = DB::table('comments')
            ->join('legal_advisors', 'comments.advisor_id', '=', 'legal_advisors.id')
            ->select('comments.comment', 'legal_advisors.name as advisor_name', 'comments.created_at')
            ->where('comments.case_id', $id)
            ->get()
            ->map(function ($comment) {
                $comment->created_at = \Carbon\Carbon::parse($comment->created_at)->diffForHumans();
                return $comment;
            });

        // Count total comments
        $totalComments = $comments->count();

        // Decode the JSON to access files
        $case->files = json_decode($case->file, true);

        return view('admin.CaseDetails', ['case' => $case, 'totalComments' => $totalComments, 'comments' => $comments]);
    }

    // Edit case
    public function EditCase($id)
    {
        $case = DB::select("SELECT * FROM cases WHERE id =?", [$id]);

        return view('admin.EditCase', ['case' => $case]);
    }

    // update case
    public function updateCase(Request $request, $id)
    {
        // Validate request data
        $request->validate([
            'number' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string',
            'defendant' => 'required|string',
            'plaintiff' => 'required|string',
            'rep_defendant' => 'required|string',
            'rep_plaintiff' => 'required|string',
            'court_date' => 'required|date',
            'files.*' => 'file',
        ]);

        // Handle file uploads
        $files = [];
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filename = $file->store('evidence', 'public');
                $files[] = $filename;
            }
        }

        // Fetch the existing case
        $case = DB::select("SELECT * FROM cases WHERE id = ?", [$id]);

        // If new files are uploaded, update the file list
        $fileData = !empty($files) ? json_encode($files) : $case[0]->file;

        // Update the case in the database
        DB::update('UPDATE cases SET number = ?, description = ?, status = ?, Parties_defendant = ?, Parties_Plaintiff = ?, representatives_defendant = ?, representatives_plaintiff = ?, court_date = ?, file = ?, updated_at = NOW() WHERE id = ?', [
            $request->input('number'),
            $request->input('description'),
            $request->input('status'),
            $request->input('defendant'),
            $request->input('plaintiff'),
            $request->input('rep_defendant'),
            $request->input('rep_plaintiff'),
            $request->input('court_date'),
            $fileData,
            $id
        ]);

        return redirect()->back()->with('success', 'Case updated successfully!');
    }

    // delete case
    public function delete($id)
    {
        // Delete the case from the database
        DB::table('cases')->where('id', $id)->delete();

        // Redirect back to the list of cases with a success message
        return redirect()->back()->with('success', 'Case deleted successfully.');
    }

    // Open admin profile
    public function AdminProfile()
    {
        // get login admin id
        $adminId = auth()->guard('admin')->id();

        $admin = DB::select("SELECT * FROM admins WHERE id = ?", [$adminId]);

        $admin = $admin[0];

        return view('admin.AdminProfile', ['admin' => $admin]);
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

        // Fetch the current password hash for the admin
        $admin = DB::table('admins')->where('id', $id)->first();

        // Check if the current password matches
        if (Hash::check($request->current_password, $admin->password)) {

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

            // Update the admin details
            DB::table('admins')->where('id', $id)->update($updateFields);

            return redirect()->back()->with('success', 'Profile updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }
    }

    // show all case
    public function caselist(){
        return view('admin.CaseList');
    }
}
