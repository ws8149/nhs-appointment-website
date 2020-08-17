<?php

namespace Tests\Unit;
use App\Appointment;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * @group appointmenttest
 */
class AppointmentTest extends TestCase
{
    public function testCreateAndDeleteAppointment()
    {        
        
        //create a dummy appointment      
        $appointment = new Appointment;
        $appointment->id = '8';
        $appointment->patient_id = 'KK255';        
        $appointment->appointment_date = '2019-04-28';
        $appointment->location = 'Denmark Hill';                                        
        $appointment->save();                
        
        //check if it exists
        $this->assertDatabaseHas('appointments', [
            'id' => '8',
            'patient_id' => 'KK255'
        ]);
        
        //check if editing works
        $appointment->id = '15';
        $appointment->save(); 
        $this->assertDatabaseHas('appointments', [
            'id' => '15'
        ]);        

        //delete dummy appointment
        $appointment->destroy('15');

        //check if its gone
        $this->assertDatabaseMissing('appointments', [
            'id' => '15'
        ]);
        
    }

    
}
