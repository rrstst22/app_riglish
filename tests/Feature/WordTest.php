<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WordTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetWords()
    {
        $response = $this->get('vue/get-words');
        $response->assertStatus(200);
    }

    public function testCreateRecord()
    {
        $response = $this->get('vue/create-record');
        $response->assertStatus(200);
    }
}
