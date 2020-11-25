<?php

namespace App\Controller;

use PHPUnit\Framework\TestCase;

class APIPunkControllerTest extends TestCase
{
    // public function testIndex()
    // {
    //     // test code here...
    // }

    public function testSearchByFood()
    {
        $api_punk = new APIPunkController();
        $result1  = $api_punk->searchByFood("Spicy chicken tikka masala");  // existing word in paring foods.
        $result2  = $api_punk->searchByFood("spicy");                       // existing word in paring foods.
        $result3  = $api_punk->searchByFood("meat");                        // existing word in paring foods.
        $result4  = $api_punk->searchByFood("xxyy");                        // word does not exist in paring foods.
        $result5  = $api_punk->searchByFood();                              // no given food.

        $this->assertEquals(200, $result1->getStatusCode());
        $this->assertStringStartsWith("<b>BEERS FOUND: 1", $result1->getContent());
        $this->assertEquals(200, $result2->getStatusCode());
        $this->assertStringStartsWith("<b>BEERS FOUND: 25", $result2->getContent());
        $this->assertEquals(200, $result3->getStatusCode());
        $this->assertStringStartsWith("<b>BEERS FOUND: 2", $result2->getContent());
        $this->assertEquals("Food not found",$result4->getContent());
        $this->assertEquals("no food provided",$result5->getContent());
    }

    public function testSearchById()
    {
        $api_punk = new APIPunkController();
        $result1  = $api_punk->searchById("1");     // existing id.
        $result2  = $api_punk->searchById("3");     // existing id.
        $result3  = $api_punk->searchById("9999");  // id does not exist.
        $result4  = $api_punk->searchById("xxyy");  // invalid alphabetic id.
        $result5  = $api_punk->searchById();        // no given id.

        $this->assertEquals(200, $result1->getStatusCode());
        $this->assertStringStartsWith("<b>id: </b>1<br><b>name: </b>Buzz<br>", $result1->getContent());
        $this->assertEquals(200, $result2->getStatusCode());
        $this->assertStringStartsWith("<b>id: </b>3<br><b>name: </b>Berliner Weisse With Yuzu - B-Sides", $result2->getContent());
        $this->assertEquals("Got response 404",$result3->getContent());
        $this->assertEquals("Got response 400",$result4->getContent());
        $this->assertEquals("no id provided", $result5->getContent());
    }
}
