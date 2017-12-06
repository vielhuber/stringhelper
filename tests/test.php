<?php
class Test extends \PHPUnit\Framework\TestCase
{
  
    function test__x()
    {
        $this->assertFalse(__x(null));
        $this->assertFalse(__x(false));
        $this->assertTrue(__x(true));
        $this->assertFalse(__x([]));
        $this->assertFalse(__x(['']));
        $this->assertTrue(__x(0));
        $this->assertTrue(__x(1));
        $this->assertTrue(__x(-1));
        $this->assertFalse(__x(''));
        $this->assertFalse(__x(' '));
        $this->assertTrue(__x('str'));
        $this->assertTrue(__x([0,1]));
        $this->assertTrue(__x([0]));
        $this->assertFalse(__x(new stdClass));
        $this->assertFalse(__x(@$a));
        $this->assertFalse(__x(@$_GET['foo']));
        $this->assertFalse(__x(@$arr['foo']['bar']['baz']));
    }

    function test__nx()
    {
        $this->assertTrue(__nx(null));
        $this->assertTrue(__nx(false));
        $this->assertFalse(__nx(true));
        $this->assertTrue(__nx([]));
        $this->assertTrue(__nx(['']));
        $this->assertFalse(__nx(0));
        $this->assertFalse(__nx(1));
        $this->assertFalse(__nx(-1));
        $this->assertTrue(__nx(''));
        $this->assertTrue(__nx(' '));
        $this->assertFalse(__nx('str'));
        $this->assertFalse(__nx([0,1]));
        $this->assertFalse(__nx([0]));
        $this->assertTrue(__nx(new stdClass));
        $this->assertTrue(__nx(@$a));
        $this->assertTrue(__nx(@$_GET['foo']));
        $this->assertTrue(__nx(@$arr['foo']['bar']['baz']));
    }

    function test__f()
    {
        $this->assertSame(__f(),null);
        $this->assertSame(__f(null),null);
        $this->assertSame(__f(null, 1),1);
        $this->assertSame(__f('', 1),1);
        $this->assertSame(__f('', [], 'str'),'str');
        $this->assertSame(__f('foo', 'bar'),'foo');
        $this->assertSame(__f(new stdClass, false, null, 0, 'str'), 0);
        $this->assertSame(__f('', @$_POST['not_set'], null, 0, 'str'), 0);
    }

    function test__swap()
    {
        $a = 1;
        $b = 2;
        __swap($a, $b);
        $this->assertSame($a, 2);
        $this->assertSame($b, 1);
    }

    function test__chain()
    {
        $class = new class
        {
            use returnEmpty;
            function find($nr)
            {
                if( $nr == 1337 ) { return new static(); }
                return @__empty();
            }
            function getFirst()
            {
                return new static();
            }
            function getSecond()
            {
                return new static();
            }
            function getThird()
            {
                return 'str';
            }
        };
        //$this->assertSame( $class::find(1338)->getFirst()->getSecond()->getThird(), null );
        $this->assertSame( $class::find(1337)->getFirst()->getSecond()->getThird(), 'str' );
    }

}