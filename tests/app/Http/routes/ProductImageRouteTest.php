<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\UploadedFile;

class ProductImageRouteTest extends TestCase
{
    use WithoutMiddleware;

    public function test_it_can_upload_image()
    {
        $response = $this->call('POST', '/api/product-image', [], [], [
            'file' => new UploadedFile(resource_path('test_files/laravel-icon.jpg'), 'laravel-icon.jpg', 'image/jpeg', null, null, true)
        ]);

        $this->assertEquals(200, $response->getStatusCode());
    }
}