<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_name_must_be_min_6_chasrs(): void
    {
        $response = $this->post(route('contact.store'), [
            'name' => 'Carlo',
            'contact' => '123456789',
            'email' => 'admin@correo.com'
        ]);
        $response->assertSessionHasErrors(['name']);
    }

    public function test_name_is_required(): void
    {
        $response = $this->post(route('contact.store'), [
            'name' => 'j',
            'contact' => '123456789',
            'email' => 'admin@correo.com'
        ]);
        $response->assertSessionHasErrors(['name']);
    }

    public function test_contact_is_required(): void
    {
        $response = $this->post(route('contact.store'), [
            'name' => 'Fernand',
            'contact' => '',
            'email' => 'admin@correo.com'
        ]);
        $response->assertSessionHasErrors(['contact']);
    }

    public function test_contact_must_be_min_9_digits(): void
    {
        $response = $this->post(route('contact.store'), [
            'name' => 'Fernand',
            'contact' => '12345678',
            'email' => 'admin@correo.com'
        ]);
        $response->assertSessionHasErrors(['contact']);
    }

    public function test_contact_must_be_max_9_digits(): void
    {
        $response = $this->post(route('contact.store'), [
            'name' => '',
            'contact' => '1234567891',
            'email' => null
        ]);
        $response->assertSessionHasErrors(['contact']);
    }

    public function test_contact_must_be_numeric(): void
    {
        $response = $this->post(route('contact.store'), [
            'name' => 'Fernand',
            'contact' => '1A3456D89',
            'email' => 'admin@correo.com'
        ]);
        $response->assertSessionHasErrors(['contact']);
    }

    public function test_email_is_required(): void
    {
        $response = $this->post(route('contact.store'), [
            'name' => 'Fernand',
            'contact' => '1231231232',
            'email' => ''
        ]);
        $response->assertSessionHasErrors(['email']);
    }

    public function test_email_is_valid(): void
    {
        $response = $this->post(route('contact.store'), [
            'name' => 'Fernand',
            'contact' => '231231232',
            'email' => 'correo@correo'
        ]);
        $response->assertSessionHasErrors(['email']);
    }

}
