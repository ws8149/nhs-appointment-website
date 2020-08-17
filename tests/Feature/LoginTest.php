<?php

namespace Tests\Feature;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Session;

/**
 * @group logintest
 *   Tests all login related features
 */
class LoginTest extends TestCase
{
    
    /**
     * Test if user can register
     */    
    public function testUserRegistration()
    {        
        //create a dummy user
        User::create([
            'name' => 'John',
            'email' => 'john2136@gmail.com',
            'password' => Hash::make('hahajohn123'),
        ]);            
        
        //check if it exists
        $this->assertDatabaseHas('users', [
            'email' => 'john2136@gmail.com'
        ]);                
    }

    /**
     * Login with the correct credentials      
    */
    public function test_successful_login_and_logout()
    {
        
        $response = $this->call('POST', '/login', [
            'email' => 'john2136@gmail.com',
            'password' => 'hahajohn123',
            '_token' => csrf_token()
        ]);
        
        $response->assertStatus(302);
        $response->assertRedirect('http://localhost/home');        

        $response = $this->call('POST', '/logout', [            
            '_token' => csrf_token()
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('http://localhost/login');        

    }

    /**
     * Login with the incorrect credentials
     */
    public function test_fail_login()
    {
        //Session::start();
        $response = $this->call('POST', '/login', [
            'email' => 'john2136@gmail.com',
            'password' => 'lolwrongpass',
            '_token' => csrf_token()
        ]);
        
        $response->assertStatus(302);
        $response->assertRedirect('http://localhost');                        
        
    }



    /**
     * Remove dummy user
     */
    public function test_remove_user() {
        $user = User::where('email', 'john2136@gmail.com')->first();
        $user->delete();

        //check if its gone
        $this->assertDatabaseMissing('users', [
            'email' => 'john2136@gmail.com',
        ]);
    }

    
}