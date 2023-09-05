<?php

namespace Tests\Unit\Services;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\Services\XmlService;
use App\Repositories\Contracts\FileRepositoryInterface;
use Mockery;

class XmlServiceTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('public');
    }

    public function testMapToXmlFormat()
    {
        $items = [
            ['column1', 'column2'],
            ['data1', 'data2'],
        ];

        $xmlService = new XmlService(Mockery::mock(FileRepositoryInterface::class));
        $mappedItems = $this->invokeMethod($xmlService, 'mapToXmlFomrat', [$items]);

        $this->assertEquals([['column1' => 'data1', 'column2' => 'data2']], $mappedItems);
    }

    protected function invokeMethod(&$object, $methodName, array $parameters = [])
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }
}
