<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
use CodeIgniter\Controller;

class LoginController extends Controller
{

	public function index()
    {
        return view('login'); // Ensure this view exists
    }

    public function login()
    {
        $data = $this->request->getPost();
        $employeeModel = new EmployeeModel();

        $employee = $employeeModel->where('email', $data['email'])->first();
        if ($employee && password_verify($data['password'], $employee['password'])) {
            // Store user data in session
            session()->set([
                'employee_id' => $employee['id'],
                'employee_name' => $employee['name'],
                'company_id' => $employee['company_id'],
                'logged_in' => true
            ]);
            return redirect()->to('/dashboard');
        }

        return redirect()->back()->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
