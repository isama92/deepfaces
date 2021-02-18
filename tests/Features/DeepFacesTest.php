<?php


namespace Tests\Features;


use Tests\TestCase;

class DeepFacesTest extends TestCase
{
    /** @test */
    public function it_loads_some_faces_and_display_those_in_a_page()
    {
        $this->withoutExceptionHandling();
        $qty = 3;

        $this->get('/deepfaces/' . $qty)
            ->assertStatus(200)
            ->assertViewIs('deepfaces::index')
            ->assertViewHas('faces')->dump();
    }
}