<?php

namespace PhpHelpers\Tests;
use PhpHelpers\Library\XMLHelper;

/**
 * Class XMLHelperTest
 * @package PhpHelpers\Tests
 */
final class XMLHelperTest extends TestCase {
    /**
	 *
	 * @test
	 * @return void
	 */
	public function test1()
	{
        
        $note=<<<XML
<note>
<to>Tony</to>
<to>Stark</to>
<from>Jani</from>
<heading>Reminder</heading>
<body>Do not forget me this weekend!</body>
</note>
XML;

        $xml = simplexml_load_string($note);
        $array = XMLHelper::xmlToArray($xml);
        $this->assertEquals([
            'note' => [
                'to' => [
                    [
                        'value' => 'Tony',
                    ],
                    [
                        'value' => 'Stark',
                    ]
                ],
                'from' => [
                    'value' => 'Jani',
                ],
                'heading' => [
                    'value' => 'Reminder',
                ],
                'body' => [
                    'value' => 'Do not forget me this weekend!',
                ]
            ]
        ], $array);
		
	}
}