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
        $this->assertTrue(__x('0'));
        $this->assertTrue(__x('1'));
        $this->assertTrue(__x('-1'));
        $this->assertFalse(__x(''));
        $this->assertFalse(__x(' '));
        $this->assertTrue(__x('null'));
        $this->assertTrue(__x('false'));
        $this->assertTrue(__x('true'));
        $this->assertTrue(__x('str'));
        $this->assertTrue(__x([0,1]));
        $this->assertTrue(__x([0]));
        $this->assertFalse(__x(new stdClass));
        $this->assertFalse(__x(@$_GET['undefined']));
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
        $this->assertFalse(__nx('0'));
        $this->assertFalse(__nx('1'));
        $this->assertFalse(__nx('-1'));
        $this->assertTrue(__nx(''));
        $this->assertTrue(__nx(' '));
        $this->assertFalse(__nx('null'));
        $this->assertFalse(__nx('false'));
        $this->assertFalse(__nx('true'));
        $this->assertFalse(__nx('str'));
        $this->assertFalse(__nx([0,1]));
        $this->assertFalse(__nx([0]));
        $this->assertTrue(__nx(new stdClass));
        $this->assertTrue(__nx(@$_GET['undefined']));
    }

    function test__true()
    {
        $this->assertFalse(__true(null));
        $this->assertFalse(__true(false));
        $this->assertTrue(__true(true));
        $this->assertFalse(__true([]));
        $this->assertFalse(__true(['']));
        $this->assertFalse(__true(0));
        $this->assertTrue(__true(1));
        $this->assertTrue(__true(-1));
        $this->assertFalse(__true('0'));
        $this->assertTrue(__true('1'));
        $this->assertTrue(__true('-1'));
        $this->assertFalse(__true(''));
        $this->assertFalse(__true(' '));
        $this->assertFalse(__true('null'));
        $this->assertFalse(__true('false'));
        $this->assertTrue(__true('true'));
        $this->assertTrue(__true('str'));
        $this->assertTrue(__true([0,1]));
        $this->assertTrue(__true([0]));
        $this->assertFalse(__true(new stdClass));
        $this->assertFalse(__true(@$_GET['undefined']));
    }

    function test__false()
    {
        $this->assertFalse(__false(null));
        $this->assertTrue(__false(false));
        $this->assertFalse(__false(true));
        $this->assertFalse(__false([]));
        $this->assertFalse(__false(['']));
        $this->assertTrue(__false(0));
        $this->assertFalse(__false(1));
        $this->assertFalse(__false(-1));
        $this->assertTrue(__false('0'));
        $this->assertFalse(__false('1'));
        $this->assertFalse(__false('-1'));
        $this->assertFalse(__false(''));
        $this->assertFalse(__false(' '));
        $this->assertFalse(__false('null'));
        $this->assertTrue(__false('false'));
        $this->assertFalse(__false('true'));
        $this->assertFalse(__false('str'));
        $this->assertFalse(__false([0,1]));
        $this->assertFalse(__false([0]));
        $this->assertFalse(__false(new stdClass));
        $this->assertFalse(__false(@$_GET['undefined']));
    }

    function test__v()
    {
        $this->assertSame(__v('foo'),'foo');
        $this->assertSame(__v(0),0);
        $this->assertSame(__v(''),null);
        $this->assertSame(__v(' ','default'),'default');
        $this->assertSame(__v('',[],'baz'),'baz');
        $this->assertSame(__v('',[],null),null);
        $this->assertSame(__v(),null);
    }

    function test__loop()
    {
        $array = ['foo', 'bar', 'baz'];
        foreach( __i($array) as $array__key=>$array__value)
        {
            if( $array__key === 0 ) { $this->assertSame( $array__value, 'foo' ); }
            if( $array__key === 1 ) { $this->assertSame( $array__value, 'bar' ); }
            if( $array__key === 2 ) { $this->assertSame( $array__value, 'baz' ); }
        }
        $array = [];
        foreach( __i($array) as $array__key=>$array__value)
        {
            $this->assertTrue(false);
        }
        foreach( __i(@$array2) as $array2__key=>$array2__value)
        {
            $this->assertTrue(false);
        }
    }

    function test__stfu()
    {
        if( __x(@$var) ) { $this->assertTrue(false); }
        if( __nx(@$var) ) { $this->assertTrue(true); }
        if( __true(@$var) ) { $this->assertTrue(false); }
        if( __false(@$var) ) { $this->assertTrue(true); }
        if( @$var === 'foo' ) { $this->assertTrue(false); }
        if( @$_GET['number'] == 1337 ) { $this->assertTrue(false); }
        foreach( __i(@$array) as $array__key=>$array__value) { $this->assertTrue(false); }
        $this->assertSame(__v(@$var), null); 
    }

    function test__class()
    {
        $this->assertSame( Person::find(1)->getAddress()->getCountry()->getName(), 'Germany' );
        $this->assertEquals( Person::find(2)->getAddress()->getCountry()->getName(), '' );
        $this->assertEquals( Person::find(3)->getAddress()->getCountry()->getName(), '' );
        $this->assertTrue( __x(Person::find(1)->getAddress()->getCountry()->getName()) );
        $this->assertFalse( __x(Person::find(2)->getAddress()->getCountry()->getName()) );
        $this->assertSame( __v( Person::find(1)->getAddress()->getCountry()->getName(), 'default' ), 'Germany' );
        $this->assertSame( __v( Person::find(2)->getAddress()->getCountry()->getName(), 'default' ), 'default' );
    }

    function test__cookies()
    {
        // the @ is needed because we cannot set cookies in phpunit (only $_COOKIE gets filled)
        @__cookie_set('cookie_name', 'cookie_value', 7);
        $this->assertSame( __cookie_exists('cookie_name'), true );
        $this->assertSame( __cookie_get('cookie_name'), 'cookie_value' );
        @__cookie_delete('cookie_name');
        $this->assertSame( __cookie_exists('cookie_name'), false );
        $this->assertSame( __cookie_get('cookie_name'), null );
        @__cookie_set('cookie_name', [1, '42'], 7);
        $this->assertSame( __cookie_exists('cookie_name'), true );
        $this->assertSame( __cookie_get('cookie_name'), [1, '42'] );
    }

    function test__helpers()
    {
        $this->assertSame( __x_all('foo', 'bar', null), false );
        $this->assertSame( __x_all(['foo', 'bar', null]), false );
        $this->assertSame( __x_all('foo', 'bar', 'baz'), true );
        $this->assertSame( __x_all(['foo', 'bar', 'baz']), true );
        $this->assertSame( __nx_all('foo', 'bar', null), true );
        $this->assertSame( __nx_all('foo', 'bar', 'baz'), false );

        $this->assertSame( __x_one('foo', 'bar'), true );
        $this->assertSame( __x_one('', null), false );
        $this->assertSame( __x_one(['foo', 'bar']), true );
        $this->assertSame( __x_one(['', null]), false );
        $this->assertSame( __nx_one('foo', 'bar'), false );
        $this->assertSame( __nx_one('', null), true );

        $this->assertSame( __validate_url('https://vielhuber.de'), true );
        $this->assertSame( __validate_email('david@vielhuber.de'), true );
        $this->assertSame( __validate_date('29.02.2001'), false );
        $this->assertSame( __date('2000-01-01', 'd.m.Y'), '01.01.2000' );
        $this->assertSame( __date('2001-02-29', 'd.m.Y'), null );
        $this->assertSame( __datetime('01.01.2000'), '2000-01-01T00:00' );
        $this->assertSame( __datetime('01.01.2000 18:00'), '2000-01-01T18:00' );
        $this->assertSame( __slug('This string will be sanitized!'), 'this-string-will-be-sanitized' );

        $this->assertSame( mb_strlen(__random_string()), 8 );
        $this->assertSame( mb_strlen(__random_string(10)), 10 );
        $this->assertSame( mb_strlen(__random_string(16, 'idkfa')), 16 );

        $this->assertSame( __strip('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam.', 12), 'Lorem ipsum...' );
        $this->assertSame( __strip_numeric('the answer is 42.00'), 'the answer is ' );
        $this->assertSame( __strip_nonnumeric('the answer is 42.00'), '42.00' );
        $this->assertSame( __strip_digit('the answer is 42'), 'the answer is ' );
        $this->assertSame( __strip_nondigit('the answer is 42'), '42' );
        $this->assertSame( __strip_whitespace('the answer is 42'), 'theansweris42' );
        $this->assertSame( __strip_whitespace('the  answeris42'), 'theansweris42' );
        $this->assertSame( __split_newline('foo
bar
baz'), ['foo','bar','baz'] );
        $this->assertSame( __is_serialized('a:1:{s:3:"foo";s:3:"bar";}'), true );
        $this->assertSame( __is_serialized('idkfa'), false );
        $this->assertSame( __is_serialized('b:0;'), true );
        $this->assertSame( __extract('<a href="#foo">bar</a>','href="','">'), '#foo' );
        $this->assertSame( __extract('<a href="#foo">bar</a>','">','</a'), 'bar' );
        $this->assertSame( __strposx('bar foo baz foobar', 'foo'), [4,12] );
        $this->assertSame( __strposnth('bar foo baz foobar', 'foo', 2), 12 );

        $array = ['foo','bar'];
        foreach($array as $array__key=>$array__value)
        {
            if( __fkey($array__key, $array) ) { $this->assertSame( $array__value, 'foo' ); }
            if( __lkey($array__key, $array) ) { $this->assertSame( $array__value, 'bar' ); }
        }
        $this->assertSame( __last(['foo', 'bar', 'baz']), 'baz' );
        $this->assertSame( __first(['foo', 'bar', 'baz']), 'foo' );
        $this->assertSame( in_array(__rand(['foo', 'bar', 'baz']), ['foo', 'bar', 'baz']), true );

        $this->assertSame( __can_be_looped([1,2]), true );
        $this->assertSame( __can_be_looped((object)[1,2]), true );
        $this->assertSame( __can_be_looped([]), false );

        $this->assertSame( __remove_empty([0 => ['foo',null,''], null, 2 => [['',''],[null]]]), [0 => ['foo']] );
        $this->assertSame( __highlight('that is a search string', 'is'), 'that <strong class="highlight">is</strong> a search string' );
        $this->assertSame( __is_integer(8372468764378627868742367883268), true );
        $this->assertSame( __flatten_keys(['foo' => ['bar' => 'baz']]), ['foo','bar'] );
        $this->assertSame( __flatten_values(['foo' => 'bar', 'bar' => ['baz', 'foo']]), ['bar','baz','foo'] );
        $this->assertSame( __expl(' ', 'foo bar baz', 1), 'bar' );

        $this->assertSame( __inside_out_values([
            'field1' => [0 => 'foo', 1 => 'bar', 2 => 'baz', 3 => ''],
            'field2' => [0 => 'bar', 1 => 'baz', 2 => 'foo', 3 => null]
        ]), [
            0 => [
                'field1' => 'foo',
                'field2' => 'bar'
            ],
            1 => [
                'field1' => 'bar',
                'field2' => 'baz'
            ],
            2 => [
                'field1' => 'baz',
                'field2' => 'foo'
            ]
        ]);

        $response = __curl('https://httpbin.org/anything');
        $this->assertSame($response->result->method, 'GET');
        $response = __curl('https://httpbin.org/anything', ['foo' => 'bar'], 'POST');
        $this->assertSame($response->result->method, 'POST');
        $this->assertSame($response->result->data, json_encode(['foo' => 'bar']));
        $response = __curl('https://httpbin.org/anything', ['foo' => 'bar'], 'POST', ['Bar' => 'baz']);
        $this->assertSame($response->result->headers->Bar, 'baz');

        $_GET = ['page_id' => '13', 'code' => '<h1>Hello World!</h1>'];
        $_POST = ['foo' => 'bar', 42 => "\0"];
        $this->assertSame( __get('foo'), null );
        $this->assertSame( __get('page_id'), '13' );
        $this->assertSame( __post('foo'), 'bar' );
        clean_up_get();
        clean_up_post();
        $this->assertSame( $_GET, ['page_id' => '13', 'code' => 'Hello World!'] );
        $this->assertSame( $_POST, ['foo' => 'bar', 42 => ''] );
    }

}


class Person
{
    public $id;            
    function __construct($id)
    {
        $this->id = $id;
    }            
    static function find($id)
    {
        if( $id === 1 || $id === 2 )
        {
            return new Person($id);
        }
        else
        {
            return __empty();
        }
    }
    function getAddress()
    {
        if( $this->id === 1 )
        {
            return new Address();
        }
        else
        {
            return __empty();
        }
    }
}
class Address
{
    function getCountry()
    {
        return new Country();
    }
}
class Country
{
    function getName()
    {
        return 'Germany';
    }
}