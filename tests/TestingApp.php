<?php

namespace Tests\Feature;

use Tests\TestCase;

class TestingApp extends TestCase
{
    /** @test */
    public function index_page_can_be_accessed()
    {
        $response = $this->get('/');

        $response->assertStatus(200); // Pastikan halaman bisa diakses
        $response->assertSee('Login'); // Tambahkan jika ingin cek konten tertentu
    }


    /** @test */
    public function login_page_can_be_accessed()
    {
        $response = $this->get('/login');

        $response->assertStatus(200); // Pastikan halaman bisa diakses
        $response->assertSee('Login'); // Tambahkan jika ingin cek konten tertentu
    }

    /** @test */
    public function cart_page_can_be_accessed()
    {
        $response = $this->get('/cart');

        $response->assertStatus(200); // Pastikan halaman bisa diakses
        $response->assertSee('Cart'); // Tambahkan jika ingin cek konten tertentu
    }

    /** @test */
    public function logout_page_can_be_accessed()
    {
        $response = $this->post('/logout');

        $response->assertStatus(302); // Pastikan halaman diarahkan (redirect)
        $response->assertRedirect('/'); // Tambahkan jika ingin cek redirect ke halaman tertentu
    }

    /** @test */
    public function add_page_can_be_accessed()
    {
        $response = $this->get('/add');

        $response->assertStatus(200); // Pastikan halaman bisa diakses
        $response->assertSee('Add Item'); // Tambahkan jika ingin cek konten tertentu
    }

    /** @test */
    public function store_page_can_be_accessed()
    {
        $response = $this->post('/store');

        $response->assertStatus(302); // Pastikan halaman diarahkan (redirect)
        $response->assertRedirect('/cart'); // Tambahkan jika ingin cek redirect ke halaman tertentu
    }
}