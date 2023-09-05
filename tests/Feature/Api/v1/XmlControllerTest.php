<?php

namespace Tests\Feature\Api\v1;

use App\Models\File;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class XmlControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $json = [
        'id',
        'file',
        'file_type',
        'xml_file',
        'created_at',
        'updated_at',
    ];

    /**
     * fetch all before xmls list
     *
     * @return void
     */
    public function test_get_list_of_xmls()
    {
        $response = $this->get('/api/xmls');
        File::factory()->count(10)->create();

        $response->assertStatus(200);
        $this->assertEquals(10, File::count());

        $response->assertJsonStructure([
            'data' => ['*' => $this->json],
        ]);
    }


    public function test_get_file_by_id()
    {
        $file = File::factory()->create();
        $response = $this->get('/api/xml/' . $file->id);
        $response->assertStatus(200);
        $response->assertJsonStructure(
            $this->json,
        );
    }
}
