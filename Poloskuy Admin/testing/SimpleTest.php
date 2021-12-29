<?php

use PHPUnit\Framework\TestCase;

require_once "WordCount.php";

class SimpleTest extends TestCase {
    public function testCountWords() {
        $wc = new WordCount();
        $TestSentence = "My Name is joke"; // 4 kata

        $WordCount = $wc->countWords($TestSentence);

        $this->assertEquals(4, $WordCount);
    }
}

?>