<?php

namespace Tests\Unit;
use App\Patient;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * @group patienttest
 */
class PatientTest extends TestCase
{
       
    /**
     * Test if a patient can be created and deleted
     */
    public function testCreateAndDeletePatient()
    {        
                
        //create a dummy patient
        $patient = new Patient;
        $patient->id = 'AE86';        
        $patient->forename = 'John';
        $patient->surname = 'Smith';
        $patient->dob = '1980-01-01';
        $patient->sex = 'M';                     
        $patient->diagnosis = 'some diagnosis';                     
        $patient->transplant_details = 'some transplant details';                     
        $patient->email = 'js2193@gmail.com';                     
        $patient->contact_method = 'email';                             
        $patient->rating = '1';                     
        $patient->bt_results_date = '2019-01-01';                     
        $patient->bt_status = 'Pending';                     
        $patient->bloods_contact_no = '0499879747';                     
        $patient->contact_no = '0120737382';                     
        $patient->comments = 'some comments';                     
        $patient->appointment_recurrence  = '7';                                  
        $patient->save();                        

        //check if it exists
        $this->assertDatabaseHas('patients', [
            'id' => 'AE86',
            'forename' => 'John',
            'surname' => 'Smith',
            'dob' => '1980-01-01',
            'sex' => 'M',                     
            'diagnosis' => 'some diagnosis',                     
            'transplant_details' => 'some transplant details',                     
            'email' => 'js2193@gmail.com',                     
            'contact_method' => 'email',                             
            'rating' => '1',                     
            'bt_results_date' => '2019-01-01',                     
            'bt_status' => 'Pending',                     
            'bloods_contact_no' => '0499879747',                     
            'contact_no' => '0120737382',                     
            'comments' => 'some comments',                     
            'appointment_recurrence'  => '7' 
        ]);

        //check if editing works
        $patient->forename = 'Tom';
        $patient->save(); 
        $this->assertDatabaseHas('patients', [
            'forename' => 'Tom'
        ]); 

        //delete dummy patient
        $patient->destroy('AE86');

        //check if its gone
        $this->assertDatabaseMissing('patients', [
            'id' => 'AE86'
        ]);        
        
    }
    
    
}
