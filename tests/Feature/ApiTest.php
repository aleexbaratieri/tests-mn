<?php

namespace Tests\Feature;

use App\Models\Address;
use App\Models\City;
use App\Models\State;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->initDatabase();
    }

    public function tearDown(): void
    {
        $this->resetDatabase();
        parent::tearDown();
    }

    /**
     * test get all addresses
     * @return void
     */
    public function testGetAllAddresses()
    {
        $response = $this->get('/api/addresses');
        $response->assertStatus(200);
    }

    /**
     * test get address by id
     * @return void
     */
    public function testGetAddressById()
    {
        $address = Address::inRandomOrder()->first();
        $response = $this->get('/api/addresses/'. $address->id);
        $response->assertStatus(200);
    }

    /**
     * test get all cities
     * @return void
     */
    public function testGetAllCities()
    {
        $response = $this->get('/api/cities');
        $response->assertStatus(200);
    }

    /**
     * test get city by id
     * @return void
     */
    public function testGetCityById()
    {
        $city = City::inRandomOrder()->first();
        $response = $this->get('/api/cities/'. $city->id);
        $response->assertStatus(200);
    }

    /**
     * test get all states
     * @return void
     */
    public function testGetAllStates()
    {
        $response = $this->get('/api/states');
        $response->assertStatus(200);
    }

    /**
     * test get state by id
     * @return void
     */
    public function testGetStateById()
    {
        $state = State::inRandomOrder()->first();
        $response = $this->get('/api/states/'. $state->id);
        $response->assertStatus(200);
    }

    /**
     * test get all users
     * @return void
     */
    public function testGetAllUsers()
    {
        $response = $this->get('/api/users');
        $response->assertStatus(200);
    }

    /**
     * test get user by id
     * @return void
     */
    public function testGetUserById()
    {
        $user = User::inRandomOrder()->first();
        $response = $this->get('/api/users/'. $user->id);
        $response->assertStatus(200);
    }

    /**
     * test create user
     * @return void
     */
    public function testCreateUser()
    {
        $data = User::factory()->make()->toArray();
        $response = $this->post('/api/users/', $data);
        $response->assertStatus(201);
    }

    /**
     * test update user
     * @return void
     */
    public function testUpdateUser()
    {
        $user = User::inRandomOrder()->first();
        $response = $this->put('/api/users/' . $user->id, [
            'name' => 'Testing Update user',
            'id_address' => Address::inRandomOrder()->first()->id
        ]);
        $response->assertStatus(200);
    }

    /**
     * test delete user
     * @return void
     */
    public function testDeleteUser()
    {
        $user = User::inRandomOrder()->first();
        $response = $this->delete('/api/users/' . $user->id);
        $response->assertStatus(204);
    }

    /**
     * test total users by city
     * @return void
     */
    public function testTotalUsersByCity()
    {
        $city = City::inRandomOrder()->first();
        $response = $this->get('/api/users/statistics/counter?city=' . $city->city);
        $response->assertStatus(200);
    }

    /**
     * test total users by state
     * @return void
     */
    public function testTotalUsersByState()
    {
        $state = State::inRandomOrder()->first();
        $response = $this->get('/api/users/statistics/counter?city=' . $state->uf);
        $response->assertStatus(200);
    }
}
