<?php

namespace Tests\Feature\Mine;

use App\Http\Livewire\CreateEmployee;
use App\Http\Livewire\DeleteEmployee;
use App\Http\Livewire\EmployeesList;
use App\Http\Livewire\UpdateEmployee;
use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Livewire\Livewire;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_new_employee_for_a_company()
    {
        $this->withoutExceptionHandling();

        $company = Company::factory()->create();

        // Create a user
        Sanctum::actingAs($user = User::factory(['id' => 44])->create(), ['*']);

        $response = $this->post('/companies/'.$company->id.'/employees', [
            'first_name' => 'Omuga',
            'last_name' => 'Otieno',
            'email' => 'omuga@safcom.com',
            'phone' => 254720123456,
        ]);

        $employee = Employee::first();
        $this->assertNotNull($employee);
        
        $this->assertEquals($employee->first_name, 'Omuga');
        $this->assertEquals($employee->last_name, 'Otieno');
        $this->assertEquals($employee->email, 'omuga@safcom.com');
        $this->assertEquals($employee->phone, 254720123456);
        $this->assertEquals($employee->company_id, $company->id);

        $this->assertDatabaseCount('employees',1);
        
    }


    public function test_user_can_view_all_employees_in_a_company()
    {
        $this->withoutExceptionHandling();

        $company = Company::factory()->create();
        $employees = Employee::factory(2)->create(['company_id'=>$company->id]);

        // Create a user
        Sanctum::actingAs($user = User::factory(['id' => 44])->create(), ['*']);

        $response = $this->get('/companies/'.$company->id.'/employees');

    }


    public function test_user_can_update_employee_details()
    {
        $this->withoutExceptionHandling();

        $company = Company::factory()->create();
        $employee = Employee::factory()->create(['company_id'=>$company->id]);

        // Create a user
        Sanctum::actingAs($user = User::factory(['id' => 44])->create(), ['*']);

        $response = $this->patch('/companies/'.$company->id.'/employees/'.$employee->id, [
            'first_name' => 'Mwala',
            'last_name' => 'lane',
            'email' => 'omuga@telkom.com',
            'phone' => 254720123456,
        ]);

        $updatedEmployee = Employee::first();

        $this->assertEquals($updatedEmployee->first_name, 'Mwala');
        $this->assertEquals($updatedEmployee->last_name, 'lane');
        $this->assertEquals($updatedEmployee->email, 'omuga@telkom.com');
        $this->assertEquals($updatedEmployee->phone, 254720123456);
        $this->assertEquals($updatedEmployee->company_id, $employee->company_id);
    }


    public function test_user_can_delete_employee()
    {
        $this->withoutExceptionHandling();
        // Create a user
        Sanctum::actingAs($user = User::factory(['id' => 64])->create(), ['*']);

        $company = Company::factory()->create();
        $employee = Employee::factory()->create(['company_id'=>$company->id]);
        $this->assertDatabaseCount('employees',1);

        $response = $this->delete('/companies/'.$company->id.'/employees/'.$employee->id);

            $deletedEmployee = Employee::first();
    
            $this->assertNull($deletedEmployee);
    }
}
