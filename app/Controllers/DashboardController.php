<?php
namespace App\Controllers;

use App\Models\EmployeeModel;
use CodeIgniter\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Get the logged-in user's ID from the session
        $employeeId = session()->get('employee_id');

        // Initialize the Employee model
        $employeeModel = new EmployeeModel();

        // Fetch the employee's data along with company details using a join
        $employee = $employeeModel->select('employees.*, companies.name as company_name, companies.address as company_address, companies.phone as company_phone')
            ->join('companies', 'employees.company_id = companies.id')
            ->where('employees.id', $employeeId)
            ->first();

        // Check if the employee data was found
        if (!$employee) {
            // Handle case where employee data is not found, e.g., redirect to an error page
            return redirect()->to('/error');
        }

        // Pass the employee and company data to the view
        return view('dashbord', [
            'employee' => $employee,
            'company' => [
                'name' => $employee['company_name'],
                'address' => $employee['company_address'],
                'phone' => $employee['company_phone']
            ]
        ]);
    }
}
