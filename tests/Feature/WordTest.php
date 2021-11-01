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

    public function testSaveResult()
    {
        $response = $this->post('vue/save-result', [
            'word_id' => 1,
            'record_id' => 1,
            'result' => 0
        ]);
        $response->assertStatus(200);
    }

    public function testShowResult()
    {
        $response = $this->get('vue/show-result', [
            'record_id' => 1,
        ]);
        $response->assertStatus(200);
    }

    public function testUpdateRecord()
    {
        $response = $this->post('vue/update-record', [
            'id' => 1,
            'score' =>10
        ]);
        $response->assertStatus(200);
    }
}
