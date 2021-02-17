<?php


namespace Tests\Features;


class DeepFacesTest extends \Tests\TestCase
{
    /** @test */
    public function it_loads_some_faces_and_display_those_in_a_page()
    {
        $this->withoutExceptionHandling();

        $this->get('/deepfaces/3')
            ->assertOk()
            ->assertViewIs('deepfaces::index')
            ->assertViewHas('faces')
            ->dump();
    }
}