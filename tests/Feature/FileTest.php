<?php

namespace Tests\Feature;

use App\File;
use App\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FileTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testShowFileId()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user, 'api')->get('/api/files/11/');
        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUploadFile()
    {
        $this->withoutExceptionHandling();
        Storage::fake('public');
        $image = UploadedFile::fake()->image('image.png', 640, 480);
        $data = [
            'file' => $image,
            'delete_after' => '2019-11-30',
            'comment' => 'comment'
        ];
        $user = factory(User::class)->create();
        $response = $this->actingAs($user, 'api')->post('/api/files/', $data);
        $response->assertStatus(201);
    }

    public function testDeleteFile()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user, 'api')->delete('/api/files/19/');
        $response->assertStatus(204);
    }
}
