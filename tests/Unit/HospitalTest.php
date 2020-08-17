<?php

namespace Tests\Unit;
use App\Hospital;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * @group hospitaltest
 */
class HospitalTest extends TestCase
{
    public function testCreateAndDeleteHospital()
    {        
        
        //create a dummy hospital
        $hospital = new Hospital;
        $hospital->id = 'DF215';        
        $hospital->name = 'Jackie Chan';
        $hospital->address = 'Bermondsey Road, W32 JH2';                     
        $hospital->contact_no = '02078456000';
        $hospital->email = 'Jackie@nhs.com';
        $hospital->type = 'M';
        $hospital->comments = 'greatest hospital eva';                                          
        $hospital->save();                
        
        //check if it exists
        $this->assertDatabaseHas('hospitals', [
            'id' => 'DF215',
            'name' => 'Jackie Chan'
        ]);
        
        //check if editing works
        $hospital->name = 'Jhon Doughnut';
        $hospital->save(); 
        $this->assertDatabaseHas('hospitals', [
            'name' => 'Jhon Doughnut'
        ]);        

        
        //delete dummy hospital
        $hospital->destroy('DF215');

        //check if its gone
        $this->assertDatabaseMissing('hospitals', [
            'id' => 'DF215'
        ]);
        
    }

    
}
