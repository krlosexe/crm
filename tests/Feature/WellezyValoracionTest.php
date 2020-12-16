<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\WellezyValoration;
use Tests\TestCase;

class WellezyValoracionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_post_can_be_created()
    { 
        
        $this->withExceptionHandling();

        $response =  $this->post('/api/wellezy/cotization/create',[
            'id_cliente'=>'98798',
            'id_subcategory'=>'2',
            'fecha_create'=>'20-12-16',
        ]);


        $response->assertOk()
            ->assertCount(1,WellezyValoration::all());

        $val = WellezyValoration::first();

        $this->assertEquals($val->id_cliente,'98798');
        $this->assertEquals($val->id_subcategory,'2');
        $this->assertEquals($val->fecha_create,'20-12-16');


    }
}
