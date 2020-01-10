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
        $this->assertTrue(__x([0, 1]));
        $this->assertTrue(__x([0]));
        $this->assertFalse(__x('a:0:{}'));
        $this->assertTrue(__x('b:1;'));
        $this->assertFalse(__x('b:0;'));
        $this->assertFalse(__x(new stdClass()));
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
        $this->assertFalse(__nx([0, 1]));
        $this->assertFalse(__nx([0]));
        $this->assertTrue(__nx('a:0:{}'));
        $this->assertFalse(__nx('b:1;'));
        $this->assertTrue(__nx('b:0;'));
        $this->assertTrue(__nx(new stdClass()));
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
        $this->assertTrue(__true([0, 1]));
        $this->assertTrue(__true([0]));
        $this->assertFalse(__true('a:0:{}'));
        $this->assertTrue(__true('b:1;'));
        $this->assertFalse(__true('b:0;'));
        $this->assertFalse(__true(new stdClass()));
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
        $this->assertFalse(__false([0, 1]));
        $this->assertFalse(__false([0]));
        $this->assertFalse(__false('a:0:{}'));
        $this->assertFalse(__false('b:1;'));
        $this->assertTrue(__false('b:0;'));
        $this->assertFalse(__false(new stdClass()));
        $this->assertFalse(__false(@$_GET['undefined']));
    }

    function test__v()
    {
        $this->assertSame(__v('foo'), 'foo');
        $this->assertSame(__v(0), 0);
        $this->assertSame(__v(''), null);
        $this->assertSame(__v(' ', 'default'), 'default');
        $this->assertSame(__v('', [], 'baz'), 'baz');
        $this->assertSame(__v('', [], null), null);
        $this->assertSame(__v(), null);
    }

    function test__e()
    {
        $this->assertSame(__e('foo'), 'foo');
        $this->assertSame(__e(0), 0);
        $this->assertEquals(__e(''), __empty());
        $this->assertSame(__e(' ', 'default'), 'default');
        $this->assertSame(__e('', [], 'baz'), 'baz');
        $this->assertEquals(__e('', [], null), __empty());
        $this->assertEquals(__e(), __empty());
    }

    function test__loop_e()
    {
        $array = ['foo', 'bar', 'baz'];
        foreach (__e($array) as $array__key => $array__value) {
            if ($array__key === 0) {
                $this->assertSame($array__value, 'foo');
            }
            if ($array__key === 1) {
                $this->assertSame($array__value, 'bar');
            }
            if ($array__key === 2) {
                $this->assertSame($array__value, 'baz');
            }
        }
        $array = [];
        foreach (__e($array) as $array__key => $array__value) {
            $this->assertTrue(false);
        }
        foreach (__e(@$array2) as $array2__key => $array2__value) {
            $this->assertTrue(false);
        }
    }

    function test__loop_i()
    {
        $array = ['foo', 'bar', 'baz'];
        foreach (__i($array) as $array__key => $array__value) {
            if ($array__key === 0) {
                $this->assertSame($array__value, 'foo');
            }
            if ($array__key === 1) {
                $this->assertSame($array__value, 'bar');
            }
            if ($array__key === 2) {
                $this->assertSame($array__value, 'baz');
            }
        }
        $array = [];
        foreach (__i($array) as $array__key => $array__value) {
            $this->assertTrue(false);
        }
        foreach (__i(@$array2) as $array2__key => $array2__value) {
            $this->assertTrue(false);
        }
    }

    function test__stfu()
    {
        if (__x(@$var)) {
            $this->assertTrue(false);
        }
        if (__nx(@$var)) {
            $this->assertTrue(true);
        }
        if (__true(@$var)) {
            $this->assertTrue(false);
        }
        if (__false(@$var)) {
            $this->assertTrue(true);
        }
        if (@$var === 'foo') {
            $this->assertTrue(false);
        }
        if (@$_GET['number'] == 1337) {
            $this->assertTrue(false);
        }
        foreach (__e(@$array) as $array__key => $array__value) {
            $this->assertTrue(false);
        }
        $this->assertSame(__v(@$var), null);
    }

    function test__class()
    {
        $this->assertSame(
            Person::find(1)
                ->getAddress()
                ->getCountry()
                ->getName(),
            'Germany'
        );
        $this->assertEquals(
            Person::find(2)
                ->getAddress()
                ->getCountry()
                ->getName(),
            ''
        );
        $this->assertEquals(
            Person::find(3)
                ->getAddress()
                ->getCountry()
                ->getName(),
            ''
        );
        $this->assertTrue(
            __x(
                Person::find(1)
                    ->getAddress()
                    ->getCountry()
                    ->getName()
            )
        );
        $this->assertFalse(
            __x(
                Person::find(2)
                    ->getAddress()
                    ->getCountry()
                    ->getName()
            )
        );
        $this->assertSame(
            __v(
                Person::find(1)
                    ->getAddress()
                    ->getCountry()
                    ->getName(),
                'default'
            ),
            'Germany'
        );
        $this->assertSame(
            __v(
                Person::find(2)
                    ->getAddress()
                    ->getCountry()
                    ->getName(),
                'default'
            ),
            'default'
        );
    }

    function test__cookies()
    {
        // the @ is needed because we cannot set cookies in phpunit (only $_COOKIE gets filled)
        @__cookie_set('cookie_name', 'cookie_value', 7);
        $this->assertSame(__cookie_exists('cookie_name'), true);
        $this->assertSame(__cookie_get('cookie_name'), 'cookie_value');
        @__cookie_delete('cookie_name');
        $this->assertSame(__cookie_exists('cookie_name'), false);
        $this->assertSame(__cookie_get('cookie_name'), null);
        @__cookie_set('cookie_name', [1, '42'], 7);
        $this->assertSame(__cookie_exists('cookie_name'), true);
        $this->assertSame(__cookie_get('cookie_name'), [1, '42']);
        @__cookie_delete('cookie_name');
        @__cookie_set('cookie_name', 'cookie_value');
        $this->assertSame(__cookie_exists('cookie_name'), true);
        $this->assertSame(__cookie_get('cookie_name'), 'cookie_value');
    }

    function test__helpers()
    {
        $this->assertSame(__x_all('foo', 'bar', null), false);
        $this->assertSame(__x_all(['foo', 'bar', null]), false);
        $this->assertSame(__x_all('foo', 'bar', 'baz'), true);
        $this->assertSame(__x_all(['foo', 'bar', 'baz']), true);
        $this->assertSame(__nx_all('foo', 'bar', null), true);
        $this->assertSame(__nx_all('foo', 'bar', 'baz'), false);

        $this->assertSame(__x_one('foo', 'bar'), true);
        $this->assertSame(__x_one('', null), false);
        $this->assertSame(__x_one(['foo', 'bar']), true);
        $this->assertSame(__x_one(['', null]), false);
        $this->assertSame(__nx_one('foo', 'bar'), false);
        $this->assertSame(__nx_one('', null), true);

        $this->assertSame(__true_all(true, true, true), true);
        $this->assertSame(__true_all([true, true, null]), false);
        $this->assertSame(__true_all(true, '1'), true);
        $this->assertSame(__true_all([true, false]), false);
        $this->assertSame(__false_all('foo', 'bar', null), false);
        $this->assertSame(__false_all(false), true);

        $this->assertSame(__true_one(true, true, true), true);
        $this->assertSame(__true_one([true, true, null]), true);
        $this->assertSame(__true_one(true, '1'), true);
        $this->assertSame(__true_one([true, false]), true);
        $this->assertSame(__false_one('foo', 'bar', null), false);
        $this->assertSame(__false_one(false), true);

        $this->assertSame(__validate_url('https://vielhuber.de'), true);
        $this->assertSame(__validate_email('david@vielhuber.de'), true);

        $this->assertSame(__validate_date('2000-01-01'), true);
        $this->assertSame(__validate_date('01.01.2000'), true);
        $this->assertSame(__validate_date('29.02.2001'), false);
        $this->assertSame(__validate_date(new DateTime('2000-01-01')), true);
        $this->assertSame(__validate_date(946713600), true);
        $this->assertSame(__validate_date(null), false);
        $this->assertSame(__validate_date(''), false);
        $this->assertSame(__validate_date(true), false);
        $this->assertSame(__validate_date(false), false);

        $this->assertSame(__validate_date_format('d.m.Y'), true);
        $this->assertSame(__validate_date_format('Y-m-d'), true);
        $this->assertSame(__validate_date_format('foo'), false);
        $this->assertSame(__validate_date_format(null), false);
        $this->assertSame(__validate_date_format(true), false);
        $this->assertSame(__validate_date_format(false), false);
        $this->assertSame(__validate_date_format(''), false);

        $this->assertSame(__validate_date_mod('+6 months'), true);
        $this->assertSame(__validate_date_mod('+ 6 months'), true);
        $this->assertSame(__validate_date_mod('+1 week 2 days 4 hours 2 seconds'), true);
        $this->assertSame(__validate_date_mod(''), false);
        $this->assertSame(__validate_date_mod(null), false);
        $this->assertSame(__validate_date_mod(false), false);
        $this->assertSame(__validate_date_mod(true), false);

        $this->assertSame(__phone_normalize(null), '');
        $this->assertSame(__phone_normalize(''), '');
        $this->assertSame(__phone_normalize('(0)89-12 456 666'), '+49 89 12456666');
        $this->assertSame(__phone_normalize('089 12 456 666'), '+49 89 12456666');
        $this->assertSame(__phone_normalize('08541 12 456---666'), '+49 8541 12456666');
        $this->assertSame(__phone_normalize('08541 12 456/666'), '+49 8541 12456666');
        $this->assertSame(__phone_normalize('++498541 12 456/666'), '+49 8541 12456666');
        $this->assertSame(__phone_normalize('++49(00)8541 12 456/666'), '+49 8541 12456666');
        $this->assertSame(__phone_normalize('0151 / 58-75-46-91'), '+49 151 58754691');
        $this->assertSame(__phone_tokenize('(0)89-12 456 666'), [
            'country_code' => '49',
            'area_code' => '89',
            'number' => '12456666'
        ]);
        $this->assertSame(in_array('49', __phone_country_codes()), true);
        $this->assertSame(in_array('89', __phone_area_codes()), true);
        $this->assertSame(in_array('151', __phone_area_codes()), true);
        $this->assertSame(in_array('89', __phone_area_codes_landline()), true);
        $this->assertSame(in_array('151', __phone_area_codes_mobile()), true);
        $this->assertSame(__phone_is_landline('(0)89-12 456 666'), true);
        $this->assertSame(__phone_is_mobile('(0)89-12 456 666'), false);

        $this->assertSame(__date('2000-01-01'), '2000-01-01');
        $this->assertSame(__date('2000-01-01', 'd.m.Y'), '01.01.2000');
        $this->assertSame(__date('2001-02-29', 'd.m.Y'), null);
        $this->assertSame(__date('2000-01-01', '+6 months'), '2000-07-01');
        $this->assertSame(__date('2000-01-01', null, '+6 months'), '2000-07-01');
        $this->assertSame(__date('2000-01-01', 'd.m.Y', '+6 months'), '01.07.2000');
        $this->assertSame(__date('01.01.2000'), '2000-01-01');
        $this->assertSame(__date('now'), date('Y-m-d', strtotime('now')));
        $this->assertSame(__date('2019-12-02 12:00:00', 'd.m.Y H:i:s'), '02.12.2019 12:00:00');
        $this->assertSame(__date('2019-12-02T12:00:00', 'd.m.Y H:i:s'), '02.12.2019 12:00:00');
        $this->assertSame(__date(strtotime('2000-01-01'), 'd.m.Y'), '01.01.2000');
        $this->assertSame(__date(strtotime('2000-01-01'), 'd.m.Y', '+6 months'), '01.07.2000');
        $this->assertSame(__date(), date('Y-m-d', strtotime('now')));
        $this->assertSame(__date(null), null);
        $this->assertSame(__date(true), null);
        $this->assertSame(__date(false), null);
        $this->assertSame(__date(''), null);
        $this->assertSame(__date('2008-31-31'), null);
        $this->assertSame(__date('now + 6 days'), date('Y-m-d', strtotime('now + 6 days')));
        $this->assertSame(__date('rfkjh lkjerhflk kjekj'), null);
        $this->assertSame(__date(new DateTime('2000-01-01'), 'd.m.Y'), '01.01.2000');
        $this->assertSame(__date('d.m.Y'), date('d.m.Y', strtotime('now')));
        $this->assertSame(__date('d.m.Y', 'tomorrow'), date('d.m.Y', strtotime('tomorrow')));
        $this->assertSame(__date('d.m.Y', 'tomorrow', '+ 6 months'), date('d.m.Y', strtotime('tomorrow + 6 months')));
        $this->assertSame(__date('+6 months'), date('Y-m-d', strtotime('now +6 months')));

        $this->assertSame(__datetime('01.01.2000'), '2000-01-01T00:00');
        $this->assertSame(__datetime('01.01.2000 18:00'), '2000-01-01T18:00');
        $this->assertSame(__datetime(''), null);
        $this->assertSame(__datetime(null), null);
        $this->assertSame(__datetime(false), null);
        $this->assertSame(__datetime(true), null);

        $this->assertSame(__date_reset_time('2000-01-01 16:30:00'), '2000-01-01 00:00:00');
        $this->assertSame(__date_reset_time('2000-01-01'), '2000-01-01 00:00:00');
        $this->assertSame(__date_reset_time('01.01.2000'), '2000-01-01 00:00:00');
        $this->assertSame(__date_reset_time('01.01.2000 23:59:59'), '2000-01-01 00:00:00');
        $this->assertSame(__date_reset_time('01.01.2000 00:00'), '2000-01-01 00:00:00');
        $this->assertSame(__date_reset_time(''), null);
        $this->assertSame(__date_reset_time(null), null);
        $this->assertSame(__date_reset_time(false), null);
        $this->assertSame(__date_reset_time(true), null);

        $this->assertSame(__slug('This string will be sanitized!'), 'this-string-will-be-sanitized');

        $this->assertSame(__remove_zero_decimals(1337), 1337);
        $this->assertSame(__remove_zero_decimals('1337'), 1337);
        $this->assertSame(__remove_zero_decimals('1337.40'), 1337.4);
        $this->assertSame(__remove_zero_decimals('1337,40'), 1337.4);
        $this->assertSame(__remove_zero_decimals(1337.0), 1337);
        $this->assertSame(__remove_zero_decimals(1337.4), 1337.4);
        $this->assertSame(__remove_zero_decimals(1337.42), 1337.42);
        $this->assertSame(__remove_zero_decimals(1337.424), 1337.424);
        $this->assertSame(__remove_zero_decimals(null), null);
        $this->assertSame(__remove_zero_decimals(false), null);
        $this->assertSame(__remove_zero_decimals(''), null);
        $this->assertSame(__remove_zero_decimals('foo'), null);

        $this->assertSame(mb_strlen(__random_string()), 8);
        $this->assertSame(mb_strlen(__random_string(10)), 10);
        $this->assertSame(mb_strlen(__random_string(16, 'idkfa')), 16);

        $this->assertSame(__shuffle_assoc(null), null);
        $this->assertSame(__shuffle_assoc(false), null);
        $this->assertSame(__shuffle_assoc(true), null);
        $this->assertSame(__shuffle_assoc(1337), null);
        $this->assertSame(__shuffle_assoc([]), []);
        $this->assertSame(__shuffle_assoc(['foo']), ['foo']);
        $this->assertSame(__shuffle_assoc(['foo']), ['foo']);
        $this->assertSame(__shuffle_assoc(['foo' => 'bar', 'bar' => 'baz', 'baz' => 'foo'])['foo'] === 'bar', true);
        $this->assertSame(__shuffle_assoc(['foo' => 'bar', 'bar' => 'baz', 'baz' => 'foo'])['bar'] === 'baz', true);
        $this->assertSame(__shuffle_assoc(['foo' => 'bar', 'bar' => 'baz', 'baz' => 'foo'])['baz'] === 'foo', true);

        $this->assertSame(__uuid() === __uuid(), false);
        $this->assertSame(strlen(__uuid()) === 36, true);
        $this->assertSame(substr_count(__uuid(), '-') === 4, true);

        $this->assertSame(__pushId() === __pushId(), false);
        $this->assertSame(strlen(__pushId()) === 20, true);
        $this->assertSame(strlen(__pushId()) === 20, true);
        $this->assertSame(strlen(__pushId()) === 20, true);

        $this->assertSame(
            __strip('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam.', 12),
            'Lorem ipsum...'
        );
        $this->assertSame(__strip_numeric('the answer is 42.00'), 'the answer is ');
        $this->assertSame(__strip_nonnumeric('the answer is 42.00'), '42.00');
        $this->assertSame(__strip_digit('the answer is 42'), 'the answer is ');
        $this->assertSame(__strip_nondigit('the answer is 42'), '42');
        $this->assertSame(__strip_nonchars('the Änswer is 42.-+&!foo'), 'the Änswer is foo');
        $this->assertSame(__strip_whitespace('the answer is 42'), 'theansweris42');
        $this->assertSame(__strip_whitespace('the  answeris42'), 'theansweris42');
        $this->assertSame(__strip_whitespace_collapsed('the answer is 42'), 'the answer is 42');
        $this->assertSame(__strip_whitespace_collapsed('the     answer             is 42 '), 'the answer is 42');
        $this->assertSame(__split_newline('foo' . PHP_EOL . 'bar' . PHP_EOL . 'baz'), ['foo', 'bar', 'baz']);

        $this->assertSame(
            __remove_emptylines('foo' . PHP_EOL . '' . PHP_EOL . 'bar' . PHP_EOL . 'baz'),
            'foo' . PHP_EOL . 'bar' . PHP_EOL . 'baz'
        );
        $this->assertSame(__remove_newlines('foo' . PHP_EOL . 'bar<br/>' . PHP_EOL . 'baz'), 'foobarbaz');

        $this->assertSame(__atrim(null), null);
        $this->assertSame(__atrim(false), false);
        $this->assertSame(__atrim(true), true);
        $this->assertSame(__atrim([]), []);
        $this->assertSame(__atrim(['foo', 'bar', 'baz']), ['foo', 'bar', 'baz']);
        $this->assertSame(
            __atrim([
                'foo
',
                'bar',
                '
baz'
            ]),
            ['foo', 'bar', 'baz']
        );

        $this->assertSame(__string_is_json('[]'), true);
        $this->assertSame(__string_is_json('{"foo":"bar"}'), true);
        $this->assertSame(__string_is_json('["foo" => "bar"]'), false);
        $this->assertSame(__string_is_json([]), false);
        $this->assertSame(__string_is_json((object) []), false);

        $this->assertSame(__is_serialized('a:1:{s:3:"foo";s:3:"bar";}'), true);
        $this->assertSame(__is_serialized(''), false);
        $this->assertSame(__is_serialized(null), false);
        $this->assertSame(__is_serialized('idkfa'), false);
        $this->assertSame(__is_serialized('b:0;'), true);

        $this->assertSame(__is_base64_encoded('dGhpcyBpcyBjb29sIHN0dWZm'), true);
        $this->assertSame(__is_base64_encoded('#ib3498r'), false);
        $this->assertSame(__is_base64_encoded('al3Vna##2dqa#Gdm'), false);
        $this->assertSame(__is_base64_encoded((object) []), false);

        $this->assertSame(__extract('<a href="#foo">bar</a>', 'href="', '">'), '#foo');
        $this->assertSame(__extract('<a href="#foo">bar</a>', '">', '</a'), 'bar');
        $this->assertSame(__strposx('bar foo baz foobar', 'foo'), [4, 12]);
        $this->assertSame(__strposnth('bar foo baz foobar', 'foo', 2), 12);

        $array = ['foo', 'bar'];
        foreach ($array as $array__key => $array__value) {
            if (__fkey($array__key, $array)) {
                $this->assertSame($array__value, 'foo');
            }
            if (__lkey($array__key, $array)) {
                $this->assertSame($array__value, 'bar');
            }
        }
        $this->assertSame(__last(['foo', 'bar', 'baz']), 'baz');
        $this->assertSame(__first(['foo', 'bar', 'baz']), 'foo');
        $this->assertSame(__first([0 => 'foo', 1 => 'bar', 2 => 'baz']), 'foo');
        $this->assertSame(__first(['foo' => 'bar', 'bar' => 'baz']), 'bar');
        $this->assertSame(in_array(__rand(['foo', 'bar', 'baz']), ['foo', 'bar', 'baz']), true);

        $this->assertSame(__remove_first(['foo', 'bar', 'baz']), ['bar', 'baz']);
        $this->assertSame(__remove_last(['foo', 'bar', 'baz']), ['foo', 'bar']);

        $this->assertSame(__can_be_looped([1, 2]), true);
        $this->assertSame(__can_be_looped((object) [1, 2]), true);
        $this->assertSame(__can_be_looped([]), false);

        $this->assertEquals(__array_to_object(['foo']), (object) ['foo']);
        $this->assertEquals(__array_to_object(['foo', 'bar']), (object) ['foo', 'bar']);
        $this->assertEquals(__array_to_object(['foo' => 'bar']), (object) ['foo' => 'bar']);
        $this->assertEquals(
            __array_to_object(['foo', 'bar' => ['foo', 'bar']]),
            (object) ['foo', 'bar' => (object) ['foo', 'bar']]
        );
        $this->assertEquals(__object_to_array((object) ['foo']), ['foo']);
        $this->assertEquals(__object_to_array((object) ['foo', 'bar']), ['foo', 'bar']);
        $this->assertEquals(__object_to_array((object) ['foo' => 'bar']), ['foo' => 'bar']);
        $this->assertEquals(__object_to_array((object) ['foo', 'bar' => (object) ['foo', 'bar']]), [
            'foo',
            'bar' => ['foo', 'bar']
        ]);

        $this->assertEquals(__array(), []);
        $this->assertEquals(__array('foo'), ['foo']);
        $this->assertEquals(__array(['foo']), ['foo']);
        $this->assertEquals(__array(['foo', 'bar']), ['foo', 'bar']);
        $this->assertEquals(__array((object) ['foo', 'bar']), ['foo', 'bar']);
        $this->assertEquals(__array((object) ['foo', 'bar' => (object) ['foo', 'bar']]), [
            'foo',
            'bar' => ['foo', 'bar']
        ]);
        $this->assertEquals(__object(), (object) []);
        $this->assertEquals(__object('foo'), (object) ['foo']);
        $this->assertEquals(__object(['foo']), (object) ['foo']);
        $this->assertEquals(__object(['foo', 'bar']), (object) ['foo', 'bar']);
        $this->assertEquals(__object(['foo' => 'bar']), (object) ['foo' => 'bar']);
        $this->assertEquals(__object((object) ['foo', 'bar']), (object) ['foo', 'bar']);
        $this->assertEquals(
            __object(['foo', 'bar' => ['foo', 'bar']]),
            (object) ['foo', 'bar' => (object) ['foo', 'bar']]
        );

        $this->assertSame(__remove_empty([0 => ['foo', 0, '0', null, ''], null, 2 => [['', ''], [null]]]), [
            0 => ['foo', 0, '0']
        ]);
        $this->assertSame(__remove_empty([0 => ['foo', 0, '0', null, ''], null, 2 => [['', ''], [null]]], [0, '0']), [
            0 => ['foo']
        ]);

        $arr = [0 => 'foo', 1 => 'bar', 2 => 'baz'];
        __remove_by_key($arr, 1);
        $this->assertSame($arr, [0 => 'foo', 1 => 'baz']);
        $arr = ['foo' => 1, 'bar' => 2, 'baz' => 3];
        __remove_by_key($arr, 'foo');
        $this->assertSame($arr, ['bar' => 2, 'baz' => 3]);
        $arr = [42 => 1, 'foo' => 2, 'bar' => 3];
        __remove_by_key($arr, 'foo');
        $this->assertSame($arr, [42 => 1, 'bar' => 3]);
        $arr = [0 => 'foo', 'foobar' => 'bar', 2 => 'baz'];
        __remove_by_key($arr, 'foobar');
        $this->assertSame($arr, [0 => 'foo', 1 => 'baz']);
        $arr = [0 => 'foo', 1 => 'bar', 2 => 'baz'];
        __remove_by_key($arr, 3);
        $this->assertSame($arr, [0 => 'foo', 1 => 'bar', 2 => 'baz']);
        $arr = (object) [0 => 'foo', 1 => 'bar', 2 => 'baz'];
        __remove_by_key($arr, 1);
        $this->assertEquals($arr, (object) [0 => 'foo', 1 => 'baz']);
        $arr = (object) ['foo' => 1, 'bar' => 2, 'baz' => 3];
        __remove_by_key($arr, 'foo');
        $this->assertEquals($arr, (object) ['bar' => 2, 'baz' => 3]);
        $arr = (object) [42 => 1, 'foo' => 2, 'bar' => 3];
        __remove_by_key($arr, 'foo');
        $this->assertEquals($arr, (object) [42 => 1, 'bar' => 3]);

        $arr = [0 => 'foo', 1 => 'bar', 2 => 'baz'];
        __remove_by_value($arr, 'bar');
        $this->assertSame($arr, [0 => 'foo', 1 => 'baz']);
        $arr = ['foo' => 1, 'bar' => 2, 'baz' => 3];
        __remove_by_value($arr, 1);
        $this->assertSame($arr, ['bar' => 2, 'baz' => 3]);
        $arr = [42 => 1, 'foo' => 2, 'bar' => 3];
        __remove_by_value($arr, 2);
        $this->assertSame($arr, [42 => 1, 'bar' => 3]);
        $arr = [0 => 'foo', 'foobar' => 'bar', 2 => 'baz'];
        __remove_by_value($arr, 'bar');
        $this->assertSame($arr, [0 => 'foo', 1 => 'baz']);
        $arr = [0 => 'foo', 1 => 'bar', 2 => 'baz'];
        __remove_by_value($arr, 'bazzz');
        $this->assertSame($arr, [0 => 'foo', 1 => 'bar', 2 => 'baz']);
        $arr = (object) [0 => 'foo', 1 => 'bar', 2 => 'baz'];
        __remove_by_value($arr, 'bar');
        $this->assertEquals($arr, (object) [0 => 'foo', 1 => 'baz']);
        $arr = (object) ['foo' => 1, 'bar' => 2, 'baz' => 3];
        __remove_by_value($arr, 1);
        $this->assertEquals($arr, (object) ['bar' => 2, 'baz' => 3]);
        $arr = (object) [42 => 1, 'foo' => 2, 'bar' => 3];
        __remove_by_value($arr, 2);
        $this->assertEquals($arr, (object) [42 => 1, 'bar' => 3]);
        $arr = [0 => 'foo', 1 => 'foo', 2 => 'foo'];
        __remove_by_value($arr, 'foo');
        $this->assertSame($arr, []);

        $arr = [0 => 'foo', 1 => 'bar', 2 => 'baz'];
        __append_to_array_if(42 % 7 === 0, 'gnarr', $arr);
        $this->assertEquals($arr, [0 => 'foo', 1 => 'bar', 2 => 'baz', 3 => 'gnarr']);
        __append_to_array_if(42 % 7 === 1, 'gnarr', $arr);
        $this->assertEquals($arr, [0 => 'foo', 1 => 'bar', 2 => 'baz', 3 => 'gnarr']);
        $arr = [0 => 'foo', 1 => 'bar', 2 => 'baz'];
        __prepend_to_array_if(0 % 1 === 0, 'gnarr', $arr);
        $this->assertEquals($arr, [0 => 'gnarr', 1 => 'foo', 2 => 'bar', 3 => 'baz']);
        __prepend_to_array_if(0 % 1 === 1, 'gnarr', $arr);
        $this->assertEquals($arr, [0 => 'gnarr', 1 => 'foo', 2 => 'bar', 3 => 'baz']);

        $this->assertSame(
            __highlight('that is a search string', 'is'),
            'that <strong class="highlight">is</strong> a search string'
        );
        $this->assertSame(
            __highlight('that is a search isstring', 'is'),
            'that <strong class="highlight">is</strong> a search <strong class="highlight">is</strong>string'
        );
        $this->assertSame(__highlight('that is a search isstring', ''), 'that is a search isstring');
        $this->assertSame(__highlight('Maßbierkrug', 'bier'), 'Maß<strong class="highlight">bier</strong>krug');
        $this->assertSame(__highlight('', ''), '');
        $this->assertSame(__highlight(null, ''), null);
        $this->assertSame(__highlight(null, null), null);
        $this->assertSame(
            __highlight(
                'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est lorem ipsum dolor sit amet.',
                'lorem'
            ),
            '<strong class="highlight">Lorem</strong> ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est <strong class="highlight">Lorem</strong> ipsum dolor sit amet. <strong class="highlight">Lorem</strong> ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est <strong class="highlight">lorem</strong> ipsum dolor sit amet.'
        );

        $this->assertSame(
            __highlight('abc def geh ijk lmn opq rst abc def geh ijk lmn opq rst', 'ijk', true, 5),
            '... geh <strong class="highlight">ijk</strong> lmn ... geh <strong class="highlight">ijk</strong> lmn ...'
        );

        $this->assertSame(
            __highlight(
                'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est lorem ipsum dolor sit amet.',
                'elitr',
                true,
                20
            ),
            '... sadipscing <strong class="highlight">elitr</strong>, sed diam nonumy eirmod ... sadipscing <strong class="highlight">elitr</strong>, sed diam nonumy eirmod ...'
        );

        $this->assertSame(__is_integer(8372468764378627868742367883268), true);
        $this->assertSame(__flatten_keys(['foo' => ['bar' => 'baz']]), ['foo', 'bar']);
        $this->assertSame(__flatten_values(['foo' => 'bar', 'bar' => ['baz', 'foo']]), ['bar', 'baz', 'foo']);
        $this->assertSame(__expl(' ', 'foo bar baz', 1), 'bar');

        $this->assertSame(
            __inside_out_values([
                'field1' => [0 => 'foo', 1 => 'bar', 2 => 'baz', 3 => ''],
                'field2' => [0 => 'bar', 1 => 'baz', 2 => 'foo', 3 => null]
            ]),
            [
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
            ]
        );

        $this->assertEquals(
            __arrays_to_objects([
                'foo' => ['bar', 'baz'],
                'bar' => [(object) ['id' => 7, 'name' => 'foo'], (object) ['id' => 42, 'name' => 'bar']]
            ]),
            (object) [
                'foo' => (object) [0 => 'bar', 1 => 'baz'],
                'bar' => (object) [
                    7 => (object) ['id' => 7, 'name' => 'foo'],
                    42 => (object) ['id' => 42, 'name' => 'bar']
                ]
            ]
        );

        $response = __fetch('https://httpbin.org/anything');
        $this->assertSame($response->method, 'GET');
        $response = __fetch('https://httpbin.org/anything', 'curl');
        $this->assertSame($response->method, 'GET');
        $response = __fetch('https://httpbin.org/anything', 'php');
        $this->assertSame($response->method, 'GET');

        $response = __curl('https://httpbin.org/anything');
        $this->assertSame($response->result->method, 'GET');
        $this->assertSame($response->status, 200);
        $this->assertSame(!empty($response->headers), true);
        $response = __curl('https://httpbin.org/anything', ['foo' => 'bar'], 'POST');
        $this->assertSame($response->result->method, 'POST');
        $this->assertSame($response->result->data, json_encode(['foo' => 'bar']));
        $response = __curl('https://httpbin.org/anything', ['foo' => 'bar'], 'PUT');
        $this->assertSame($response->result->method, 'PUT');
        $this->assertSame($response->result->data, json_encode(['foo' => 'bar']));
        $response = __curl('https://httpbin.org/anything', null, 'DELETE');
        $this->assertSame($response->result->method, 'DELETE');
        $this->assertSame($response->result->data, '');
        $response = __curl('https://httpbin.org/anything', ['foo' => 'bar'], 'POST', [
            'Bar' => 'baz'
        ]);
        $this->assertSame($response->result->headers->Bar, 'baz');
        $response = __curl('https://vielhuber.de');
        $this->assertTrue(strpos($response->result, '<html') !== false);
        $response = __curl('https://httpbin.org/basic-auth/foo/bar');
        $this->assertSame($response->status, 401);
        $response = __curl('https://httpbin.org/basic-auth/foo/bar', null, null, null, false, true, 60, [
            'foo' => 'bar'
        ]);
        $this->assertSame($response->status, 200);

        // fill in your wp credentials to test this
        if (1 == 0) {
            $wp_url = 'https://vielhuber.de';
            $wp_username = 'username';
            $wp_password = 'password';
            __curl(
                $wp_url . '/wp-login.php',
                ['log' => $wp_username, 'pwd' => $wp_password],
                'POST',
                null,
                true,
                false
            );
            $response = __curl($wp_url . '/wp-admin/options.php', null, 'GET', null, true); // gets the html code of wp backend
            $this->assertTrue(strpos($response->result, 'show_avatars') !== false);
        }

        try {
            __exception('foo');
        } catch (Exception $e) {
            $this->assertSame('foo', $e->getMessage());
        }

        $this->assertEquals(__success(), ((object) ['success' => true, 'message' => '']));
        $this->assertEquals(__success('foo'), (object) ['success' => true, 'message' => 'foo']);
        $this->assertEquals(__error(), (object) ['success' => false, 'message' => '']);
        $this->assertEquals(__error('bar'), (object) ['success' => false, 'message' => 'bar']);

        $this->assertSame(in_array(__os(), ['windows', 'mac', 'linux', 'unknown']), true);

        $this->assertSame(__url(), 'https://github.com/vielhuber/stringhelper');
        $this->assertSame(__baseurl(), 'https://github.com');

        define('ENCRYPTION_KEY', '4736d52f85bdb63e46bf7d6d41bbd551af36e1bfb7c68164bf81e2400d291319'); // first define your encryption key (generated with hash('sha256', uniqid(mt_rand(), true)))
        $this->assertSame(__decrypt(__encrypt('foo')), 'foo');
        $this->assertSame(__decrypt(__encrypt('bar', 'known_salt')), 'bar');

        $this->assertSame(__decrypt_poor(__encrypt_poor('foo')), 'foo');
        $token = __encrypt_poor('bar');
        $this->assertSame(__decrypt_poor($token, true), 'bar');
        $this->assertSame(__decrypt_poor($token, true), null);

        $this->assertSame(count(__files_in_folder()) === 7, true);
        $this->assertSame(count(__files_in_folder('.')) === 7, true);
        $this->assertSame(count(__files_in_folder('.', false, ['.gitignore'])) === 6, true);
        $this->assertSame(in_array('.gitignore', __files_in_folder('.', false)), true);
        $this->assertSame(in_array('.gitignore', __files_in_folder('.', false, ['.gitignore'])), false);
        $this->assertSame(count(__files_in_folder('tests')) === 2, true);
        $this->assertSame(count(__files_in_folder('tests', false, ['Test.php'])) === 1, true);
        $this->assertSame(count(__files_in_folder('tests', true)) > 2, true);
        $this->assertSame(count(__files_in_folder('tests', true, ['assets'])) === 2, true);
        $this->assertSame(count(__files_in_folder('tests/', true)) > 2, true);
        $this->assertSame(count(__files_in_folder('foo')) === 0, true);

        mkdir('tests/foo');
        $this->assertSame(count(__files_in_folder('tests/foo')) === 0, true);
        touch('tests/foo/index.txt');
        $this->assertSame(count(__files_in_folder('tests/foo')) === 1, true);
        $this->assertSame(is_dir('tests/foo'), true);
        __rrmdir('tests/foo');
        $this->assertSame(!is_dir('tests/foo'), true);

        $this->assertSame(__is_external('https://github.com/vielhuber/stringhelper'), false);
        $this->assertSame(__is_external('https://github.com/vielhuber/stringhelper/'), false);
        $this->assertSame(__is_external('https://github.com/vielhuber/stringhelper/issues'), false);
        $this->assertSame(__is_external('https://github.com/vielhuber/stringhelper/test.pdf'), true);
        $this->assertSame(__is_external('tel:+4989215400142'), false);
        $this->assertSame(__is_external('mailto:david@vielhuber.de'), false);
        $this->assertSame(__is_external('https://vielhuber.de'), true);
        $this->assertSame(__is_external('https://vielhuber.de/test.pdf'), true);

        $_GET = ['page_id' => '13', 'code' => '<h1>Hello World!</h1>'];
        $_POST = ['foo' => 'bar', 42 => "\0"];
        $this->assertSame(__get('foo'), null);
        $this->assertSame(__get('page_id'), '13');
        $this->assertSame(__post('foo'), 'bar');
        clean_up_get();
        clean_up_post();
        $this->assertSame($_GET, ['page_id' => '13', 'code' => 'Hello World!']);
        $this->assertSame($_POST, ['foo' => 'bar', 42 => '']);

        $this->assertSame(__char_to_int('D'), 4);
        $this->assertSame(__char_to_int('d'), 4);
        $this->assertSame(__char_to_int('A'), 1);
        $this->assertSame(__char_to_int('Z'), 26);
        $this->assertSame(__char_to_int('AA'), 27);
        $this->assertSame(__int_to_char(4), 'D');
        $this->assertSame(__int_to_char(1), 'A');
        $this->assertSame(__int_to_char(26), 'Z');
        $this->assertSame(__int_to_char(27), 'AA');
        $this->assertSame(__inc_char('D'), 'E');
        $this->assertSame(__inc_char('Z'), 'AA');
        $this->assertSame(__inc_char('A', 2), 'C');
        $this->assertSame(__dec_char('U'), 'T');
        $this->assertSame(__dec_char('U', 2), 'S');
        $this->assertSame(__dec_char('A'), '');

        $this->assertSame(__str_replace_first('foo', 'bar', 'foofoo'), 'barfoo');
        $this->assertSame(__str_replace_last('foo', 'bar', 'foofoo'), 'foobar');
        $this->assertSame(__str_replace_first('foo', 'bar', 'bar'), 'bar');
        $this->assertSame(__str_replace_last('foo', 'bar', 'bar'), 'bar');

        copy('tests/assets/compress.jpg', 'tests/assets/input.jpg');
        $filesize1 = filesize('tests/assets/input.jpg');
        __image_compress('tests/assets/input.jpg', 10, 'tests/assets/output.jpg');
        $filesize2 = filesize('tests/assets/output.jpg');
        $this->assertSame($filesize1 > $filesize2, true);
        @unlink('tests/assets/input.jpg');
        @unlink('tests/assets/output.jpg');

        file_put_contents(
            'tests/assets/file1.txt',
            __line_endings_convert(
                'foo
bar',
                'linux'
            )
        );
        file_put_contents(
            'tests/assets/file2.txt',
            __line_endings_convert(
                'foo
bar',
                'mac'
            )
        );
        file_put_contents(
            'tests/assets/file3.txt',
            __line_endings_convert(
                'foo
bar',
                'windows'
            )
        );
        $this->assertNotSame(file_get_contents('tests/assets/file1.txt'), file_get_contents('tests/assets/file2.txt'));
        $this->assertNotSame(file_get_contents('tests/assets/file1.txt'), file_get_contents('tests/assets/file3.txt'));
        $this->assertNotSame(file_get_contents('tests/assets/file2.txt'), file_get_contents('tests/assets/file3.txt'));
        $this->assertSame(
            __line_endings_convert(file_get_contents('tests/assets/file1.txt'), 'windows'),
            __line_endings_convert(file_get_contents('tests/assets/file2.txt'), 'windows')
        );
        $this->assertSame(
            __line_endings_convert(file_get_contents('tests/assets/file1.txt'), 'mac'),
            __line_endings_convert(file_get_contents('tests/assets/file2.txt'), 'mac')
        );
        $this->assertSame(
            __line_endings_convert(file_get_contents('tests/assets/file1.txt'), 'linux'),
            __line_endings_convert(file_get_contents('tests/assets/file2.txt'), 'linux')
        );
        $this->assertSame(
            __line_endings_convert(file_get_contents('tests/assets/file1.txt'), 'windows'),
            __line_endings_convert(file_get_contents('tests/assets/file3.txt'), 'windows')
        );
        $this->assertSame(
            __line_endings_convert(file_get_contents('tests/assets/file1.txt'), 'mac'),
            __line_endings_convert(file_get_contents('tests/assets/file3.txt'), 'mac')
        );
        $this->assertSame(
            __line_endings_convert(file_get_contents('tests/assets/file1.txt'), 'linux'),
            __line_endings_convert(file_get_contents('tests/assets/file3.txt'), 'linux')
        );
        $this->assertSame(
            __line_endings_convert(file_get_contents('tests/assets/file2.txt'), 'windows'),
            __line_endings_convert(file_get_contents('tests/assets/file3.txt'), 'windows')
        );
        $this->assertSame(
            __line_endings_convert(file_get_contents('tests/assets/file2.txt'), 'mac'),
            __line_endings_convert(file_get_contents('tests/assets/file3.txt'), 'mac')
        );
        $this->assertSame(
            __line_endings_convert(file_get_contents('tests/assets/file2.txt'), 'linux'),
            __line_endings_convert(file_get_contents('tests/assets/file3.txt'), 'linux')
        );
        $this->assertSame(
            __line_endings_weak_equals(
                file_get_contents('tests/assets/file1.txt'),
                file_get_contents('tests/assets/file2.txt')
            ),
            true
        );
        $this->assertSame(
            __line_endings_weak_equals(
                file_get_contents('tests/assets/file1.txt'),
                file_get_contents('tests/assets/file3.txt')
            ),
            true
        );
        $this->assertSame(
            __line_endings_weak_equals(
                file_get_contents('tests/assets/file2.txt'),
                file_get_contents('tests/assets/file3.txt')
            ),
            true
        );
        @unlink('tests/assets/file1.txt');
        @unlink('tests/assets/file2.txt');
        @unlink('tests/assets/file3.txt');

        file_put_contents(
            'tests/assets/file.txt',
            'foo
foo
bar
foo
bar
baz
gna
gna
cool; stuff;'
        );
        __sed_replace(
            ['foo' => 'bar', 'bar' => 'baz', 'gna' => 'gnarr', 'cool; stuff;' => 'foo'],
            'tests/assets/file.txt'
        );
        $this->assertSame(
            __line_endings_weak_equals(
                trim(file_get_contents('tests/assets/file.txt')),
                'baz
baz
baz
baz
baz
baz
gnarr
gnarr
foo'
            ),
            true
        );
        @unlink('tests/assets/file.txt');

        file_put_contents('tests/assets/file.txt', 'foo');
        __sed_prepend('baz gnarr; /\yoo&', 'tests/assets/file.txt');
        __sed_append('bar fuu; yoo//', 'tests/assets/file.txt');
        $this->assertSame(
            __line_endings_weak_equals(
                trim(file_get_contents('tests/assets/file.txt')),
                'baz gnarr; /\yoo&
foo
bar fuu; yoo//'
            ),
            true
        );
        @unlink('tests/assets/file.txt');

        __array2csv([['foo', 'bar', 'baz'], ['foo', 'bar', 'baz']], 'tests/assets/file.csv');
        $this->assertSame(
            __line_endings_weak_equals(
                trim(file_get_contents('tests/assets/file.csv')),
                'foo;bar;baz
foo;bar;baz'
            ),
            true
        );
        __array2csv([['foo', 'bar', 'baz'], ['foo', 'bar', 'baz']], 'tests/assets/file.csv', ';', '"');
        $this->assertSame(
            __line_endings_weak_equals(
                trim(file_get_contents('tests/assets/file.csv')),
                'foo;bar;baz
foo;bar;baz'
            ),
            true
        );
        __array2csv([['foo bar', 'bar', 'baz'], ['foo', 'bar', 'baz']], 'tests/assets/file.csv', ',', '\'');
        $this->assertSame(
            __line_endings_weak_equals(
                trim(file_get_contents('tests/assets/file.csv')),
                '\'foo bar\',bar,baz
foo,bar,baz'
            ),
            true
        );
        __array2csv([['foo', 'bar', 'baz'], ['foo', 'bar', 'baz']], 'tests/assets/file.csv');
        $this->assertSame(__csv2array('tests/assets/file.csv'), [['foo', 'bar', 'baz'], ['foo', 'bar', 'baz']]);
        __array2csv([['foo', 'bar', 'baz'], ['foo', 'bar', 'baz']], 'tests/assets/file.csv', ';', '"');
        $this->assertSame(__csv2array('tests/assets/file.csv', ';', '"'), [
            ['foo', 'bar', 'baz'],
            ['foo', 'bar', 'baz']
        ]);
        __array2csv([['foo bar', 'bar', 'baz'], ['foo', 'bar', 'baz']], 'tests/assets/file.csv', ',', '\'');
        $this->assertSame(__csv2array('tests/assets/file.csv', ',', '\''), [
            ['foo bar', 'bar', 'baz'],
            ['foo', 'bar', 'baz']
        ]);
        @unlink('tests/assets/file.csv');

        __log_begin('foo');
        $this->assertSame($GLOBALS['performance'][0]['message'], 'foo');
        $this->assertSame(count($GLOBALS['performance']), 1);
        __log_begin('bar');
        $this->assertSame(count($GLOBALS['performance']), 2);
        __log_begin('');
        $this->assertSame(count($GLOBALS['performance']), 3);
        __log_end();
        $this->assertSame(count($GLOBALS['performance']), 2);
        __log_end();
        $this->assertSame(count($GLOBALS['performance']), 1);
        $this->assertSame(__log_end()['message'], 'foo');
        $this->assertSame(count($GLOBALS['performance']), 0);

        __log_begin('foo');
        $this->assertSame($GLOBALS['performance'][0]['message'], 'foo');
        $this->assertSame(count($GLOBALS['performance']), 1);
        __log_begin('bar');
        $this->assertSame($GLOBALS['performance'][1]['message'], 'bar');
        $this->assertSame(count($GLOBALS['performance']), 2);
        __log_end('foo');
        $this->assertSame(count($GLOBALS['performance']), 1);
        __log_end('bar');
        $this->assertSame(count($GLOBALS['performance']), 0);

        __log_begin();
        $this->assertSame($GLOBALS['performance'][0]['message'], null);
        $this->assertSame(count($GLOBALS['performance']), 1);
        __log_begin();
        $this->assertSame($GLOBALS['performance'][1]['message'], null);
        $this->assertSame(count($GLOBALS['performance']), 2);
        __log_end();
        $this->assertSame(count($GLOBALS['performance']), 1);
        __log_end();
        $this->assertSame(count($GLOBALS['performance']), 0);

        __log_begin();
        sleep(1);
        $data = __log_end(null, false);
        $this->assertSame(intval(round($data['time'])), 1);
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
        if ($id === 1 || $id === 2) {
            return new Person($id);
        } else {
            return __empty();
        }
    }
    function getAddress()
    {
        if ($this->id === 1) {
            return new Address();
        } else {
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
