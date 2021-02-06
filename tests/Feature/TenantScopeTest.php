<?php

namespace Tests\Feature;

use Faker\Provider\File;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class TenantScopeTest extends TestCase
{
    use RefreshDatabase,WithFaker;
   public function a_model_has_a_tenant_id_on_the_mig()
   {
       $now = now();
       $filename = $now->format('Y_m_d_His').'_create_tests_table.php';
       $filePath = database_path('migrations/'.$filename);

       $this->artisan('make:model Test -m');

       $this->assertTrue(File::exists($filePath));
       $this->assertStringContainsString('$table->unsignedBigInteger(\'tenant_id\')->index();', File::get($filePath));

       File::delete($filePath);
       File::delete(app_path('Models/Test.php'));

   }
}
