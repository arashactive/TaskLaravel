<?php

namespace Tests\Feature\Api\v1;

use App\Models\File;
use App\Models\Refund;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RefundControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $json = [
        'id',
        'file_id',
        'name',
        'iban',
        'bic',
        'amount',
        'created_at',
        'updated_at',
    ];

    /**
     * fetch all refunds log for special file
     *
     * @return void
     */
    public function test_get_list_of_xmls()
    {
        $file = File::factory()->create();
        Refund::factory([
            'file_id' => $file->id
        ])->count(20)->create();
        
        
        $response = $this->get('/api/xml/1/log');
        $response->assertStatus(200);
        $this->assertEquals(20, Refund::count());

        $response->assertJsonStructure([
            'data' => ['*' => $this->json],
        ]);
    }

}
