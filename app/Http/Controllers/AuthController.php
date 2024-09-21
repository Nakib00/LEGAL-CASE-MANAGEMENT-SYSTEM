<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // open admin login page
    public function AdminLogin()
    {
        return view('admin.AdminLogin');
    }
    // Handle Admin Registration
    public function handleAdminRegister(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = Hash::make($request->input('password')); // Hash the password
        $phone = $request->input('phone');
        $nid = $request->input('nid');

        DB::insert(
            'INSERT INTO admins (name, email, password, phone, nid, created_at, updated_at) VALUES (?, ?, ?, ?, ?, NOW(), NOW())',
            [$name, $email, $password, $phone, $nid]
        );

        return redirect()->route('adminLogin')->with('success', 'Registration successful. Please login.');
    }
    // Handle Admin Login
    public function handleAdminLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $admin = DB::select('SELECT * FROM admins WHERE email = ?', [$email]);

        if ($admin && Hash::check($password, $admin[0]->password)) {
            // Admin is authenticated, check if the admin guard is being used
            if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password])) {
                // Login successful, set session or token
                session(['admin_logged_in' => true]);
                return redirect()->route('admind')->with('success','admin login successful');
            }
        }

        // Login failed, return back with error
        return back()->withErrors(['email' => 'Invalid credentials or you do not have admin access']);
    }

    // admin dashboard
    public function Admind()
    {
        return view('admin.dashboard');
    }

    // admin logout
    public function adminlogout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('adminLogin')->with('success', 'admin logout successfully.');
    }

    // open legal advisor login
    public function Ligaladvisor()
    {
        return view('legalAdvisor.LegalAdvisorLogin');
    }
    // Handle Ligaladvisor Registration
    public function LigaladvisorRegister(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = Hash::make($request->input('password')); // Hash the password
        $phone = $request->input('phone');
        $nid = $request->input('nid');

        DB::insert(
            'INSERT INTO legal_advisors (name, email, password, phone, nid, created_at, updated_at) VALUES (?, ?, ?, ?, ?, NOW(), NOW())',
            [$name, $email, $password, $phone, $nid]
        );

        return redirect()->route('lageladvisor')->with('success', 'Registration successful. Please login.');
    }

    // Handle Ligaladvisor Login
    public function LigaladvisorLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $legalAdvisor = DB::select('SELECT * FROM legal_advisors WHERE email = ?', [$email]);

        if ($legalAdvisor && Hash::check($password, $legalAdvisor[0]->password)) {
            // Legal advisor authenticated, check guard 'ladvisor'
            if (Auth::guard('ladvisor')->attempt(['email' => $email, 'password' => $password])) {
                // Login successful, set session or token
                session(['legal_advisors_logged_in' => true]);
                return redirect()->route('ladvisord')->with('success','legal advisor login successful');
            }
        }

        // Login failed, return back with error
        return back()->withErrors(['email' => 'Invalid credentials or you do not have access as a legal advisor']);
    }

    // open legal advisor dashboard
    public function ladvisord()
    {
        return view('legalAdvisor.dashboard');
    }
    // logout legal advisor
    //logout
    public function logout()
    {
        Auth::guard('ladvisor')->logout();

        return redirect()->route('lageladvisor')->with('success', 'legal advisor logout successfully.');
    } //end
}
