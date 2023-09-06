<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PanelTest extends TestCase
{
    
    public function test_page_login()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_page_dashboard()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_page_company()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
    
    public function test_page_excel_init()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }


    public function test_page_xml_by_id()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
