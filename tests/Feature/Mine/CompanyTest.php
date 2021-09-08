<?php

namespace Tests\Feature\Mine;

use App\Http\Livewire\CompaniesList;
use App\Http\Livewire\CreateCompany;
use App\Http\Livewire\DeleteCompany;
use App\Http\Livewire\UpdateCompany;
use App\Models\Company;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\Sanctum;

class CompanyTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Storage::fake('public');

    }

    public function test_user_can_create_new_company()
    {
        $this->withoutExceptionHandling();
        // Create fake file
        $file = UploadedFile::fake()->image('saflogo.jpg',110,110);

        // Create a user
        Sanctum::actingAs($user = User::factory(['id' => 64])->create(), ['*']);

        $response = $this->post('/companies', [
            'name' => 'Safcom',
            'email' => 'info@safcom.com',
            'logo' => $file,
            'website' => 'www.safcom.com',
        ]);

        $company = Company::first();
        $this->assertNotNull($company);
        
        $this->assertEquals($company->name, 'Safcom');
        $this->assertEquals($company->email, 'info@safcom.com');
        $this->assertEquals($company->website, 'www.safcom.com');
        $this->assertNotNull($company->logo);

        $this->assertDatabaseCount('companies',1);
        
    }


    public function test_user_can_view_all_companies()
    {
        $companies = Company::factory(2)->create();

        // Create a user
        Sanctum::actingAs($user = User::factory(['id' => 64])->create(), ['*']);

        $response = $this->get('/companies')->assertStatus(200);

    }


    public function test_user_can_update_company_details()
    {

        // Create fake file
        $file = UploadedFile::fake()->image('airlogo.jpg',110,110);

        // Create a user
        Sanctum::actingAs($user = User::factory(['id' => 64])->create(), ['*']);

        $company = Company::factory()->create();

        $response = $this->patch('/companies/'.$company->id, [
            'name' => 'Airtel',
            'email' => 'info@airtel.com',
            'logo' => $file,
            'website' => 'www.airtel.com',
        ]);

        $updatedCompany = Company::first();

        $this->assertEquals($company->id, $updatedCompany->id);
        $this->assertEquals($updatedCompany->name, 'Airtel');
        $this->assertEquals($updatedCompany->email, 'info@airtel.com');
        $this->assertNotEquals($company->website, $updatedCompany->website);
        $this->assertNotEquals($company->logo, $updatedCompany->logo);
    }


    public function test_user_can_delete_company()
    {
        $this->withoutExceptionHandling();

        // Create a user
        Sanctum::actingAs($user = User::factory(['id' => 64])->create(), ['*']);

        $company = Company::factory()->create();
        $this->assertDatabaseCount('companies',1);

        $response = $this->delete('/companies/'.$company->id);

        $deletedCompany = Company::first();

        $this->assertNull($deletedCompany);
    }
}
