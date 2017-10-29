<?php

namespace Tests\FeatureSpot;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseTransactions;

class DeleteSpotTest extends TestCase
{
    use DatabaseTransactions;
    /**
    *
    *
    * @param $spot
    *
    * @dataProvider spotProvider
    *
    * @return void
    */
    public function testApplication(\App\Spot $spot)
    {
        $response = $this->actingAs(\App\User::find(1))->delete("/spots/$spot->slug");

        $response->assertStatus(302);
    }

}
