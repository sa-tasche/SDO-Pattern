<?php
/**
 * chippyash/sdo-pattern
 * Service Data Objects
 *
 * @author Ashley Kitson
 * @copyright Ashley Kitson, UK, 2015
 * @license GPL V3 or later
 */

namespace chippyash\Test\SDO\Mapper;

use chippyash\SDO\Mapper\Json as JsonMapper;

class JsonTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var JsonMapper
     */
    protected $sut;

    protected function setUp()
    {
        $this->sut = new JsonMapper();
    }

    public function testMapInAcceptsValidJson()
    {
        $test = new \StdClass();
        $test->bar = 1;
        $this->assertEquals($test, $this->sut->mapIn(json_encode($test)));
    }

    /**
     * @expectedException \chippyash\SDO\Exceptions\SDOException
     * @expectedExceptionMessage Failed to decode json. Error given was: boolean expected
     */
    public function testMapInThrowsExceptionWithValidJson()
    {
        $this->sut->mapIn('foo');
    }

    public function testMapOutReturnsJsonStringForSerializableObject()
    {
        $test = new \StdClass();
        $test->bar = 1;
        $this->assertEquals(json_encode($test), $this->sut->mapOut($test));
    }
}