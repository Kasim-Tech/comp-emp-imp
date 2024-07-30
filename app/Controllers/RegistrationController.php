<?php
namespace App\Controllers;

use App\Models\CompanyModel;
use App\Models\EmployeeModel;
use CodeIgniter\Controller;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function register()
    {
        $data = $this->request->getPost();

        try {
            // Validate input
            if (empty($data['employee_name']) || empty($data['employee_email']) || empty($data['employee_password']) ||
                empty($data['company_name']) || empty($data['company_address']) || empty($data['company_phone'])) {
                throw new \Exception('All fields are required');
            }

            $employeeModel = new EmployeeModel();

            // Check if employee email already exists
            if ($employeeModel->where('email', $data['employee_email'])->first()) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Employee email already exists']);
            }

            // Save company data
            $companyModel = new CompanyModel();
            $companyData = [
                'name' => $data['company_name'],
                'address' => $data['company_address'],
                'phone' => $data['company_phone']
            ];
            $companyModel->insert($companyData);
            $companyId = $companyModel->insertID();

            // Save employee data
            $employeeData = [
                'name' => $data['employee_name'],
                'email' => $data['employee_email'],
                'password' => password_hash($data['employee_password'], PASSWORD_DEFAULT),
                'company_id' => $companyId
            ];
            $employeeModel->insert($employeeData);

            return $this->response->setJSON(['status' => 'success']);
        } catch (\Exception $e) {
            log_message('error', 'Registration failed: ' . $e->getMessage());
            return $this->response->setJSON(['status' => 'error', 'message' => 'Registration failed: ' . $e->getMessage()]);
        }
    }
}
