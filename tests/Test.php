<?php
use vielhuber\stringhelper\__;

class Test extends \PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        if (file_exists(__DIR__ . '/../.env')) {
            $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
            $dotenv->load();
        }
    }

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
        $this->assertEquals(get_class(__empty()), '__empty_helper');
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
        @__cookie_set('special_cookie_name', 'cookie_value', 7, [
            'path' => '/',
            'domain' => '',
            'samesite' => 'None',
            'secure' => true,
            'httponly' => false
        ]);
        $this->assertSame(__cookie_get('special_cookie_name'), 'cookie_value');
    }

    function test__trim_every_line()
    {
        $this->assertSame(__trim_every_line("foo\n bar"), "foo\nbar");
        $this->assertSame(__trim_every_line("foo\nbar"), "foo\nbar");
        $this->assertSame(__trim_every_line("foo\n bar\nbaz "), "foo\nbar\nbaz");
        $this->assertSame(__trim_every_line(''), '');
        $this->assertSame(__trim_every_line(null), null);
        $this->assertSame(__trim_every_line(false), false);
        $this->assertSame(__trim_every_line(true), true);
        $this->assertSame(__trim_every_line([]), []);
    }

    function test__br2nl()
    {
        $this->assertSame(__br2nl('foo<br/>bar'), "foo\nbar");
        $this->assertSame(__br2nl('foo<br>bar'), "foo\nbar");
        $this->assertSame(__br2nl("foo\nbar"), "foo\nbar");
        $this->assertSame(__br2nl('foo bar'), 'foo bar');
        $this->assertSame(__br2nl('foobar'), 'foobar');
        $this->assertSame(__br2nl(''), '');
        $this->assertSame(__br2nl(null), null);
        $this->assertSame(__br2nl(false), false);
        $this->assertSame(__br2nl(true), true);
        $this->assertSame(__br2nl([]), []);
    }

    function test__str_to_dom()
    {
        foreach (
            [
                '<ul><li></li><li></li></ul>',
                'Dies ist ein Test',
                '<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, minimum-scale=1" />
<title>.</title>
</head>
<body>

</body>
</html>',
                '<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, minimum-scale=1" />
<title>.</title>
</head>
<body>
    <p>lsdäwekü0päeikpokpokóäölällöä</p>
</body>
</html>'
            ]
            as $html__value
        ) {
            $this->assertSame(__minify_html(__dom_to_str(__str_to_dom($html__value))), __minify_html($html__value));
        }
    }

    function test__translate()
    {
        foreach (['free', getenv('GOOGLE_TRANSLATION_API_KEY')] as $api_keys__value) {
            foreach (
                [
                    [
                        'Das ist das <span>Haus</span> vom Nikolaus',
                        'This is the <span>house</span> of Santa Claus',
                        'de',
                        'en'
                    ],
                    [
                        'Das ist das <span class="notranslate">Haus</span> vom Nikolaus',
                        'This is the <span class="notranslate">Haus</span> of Santa Claus',
                        'de',
                        'en'
                    ],
                    ['Land: <a href="#">Dies ist ein Test</a>', 'Pays: <a href="#">Ceci est un test</a>', 'de', 'fr'],
                    [
                        'Haus: <a>+49 (0) 89 21 540 01 42</a><br/> Telefax: +49 (0) 89 21 544 59 1<br/> E-Mail: <a>david@vielhuber.local.vielhuber.de</a>',
                        'House: <a>+49 (0) 89 21 540 01 42</a> <br/> Fax: +49 (0) 89 21 544 59 1 <br/> Email: <a>david@vielhuber.local.vielhuber.de</a>',
                        'de',
                        'en'
                    ],
                    [
                        'Sein oder Nichtsein; das ist hier die Frage.',
                        'To be or not to be; that is the question.',
                        'de',
                        'en'
                    ],
                    [
                        '<a>VanillaJS</a> ist seit <a>ES6</a> quasi in allen Bereichen dem Urgestein <a>jQuery</a> ebenbürtig und inzwischen weit überlegen.',
                        '<a>VanillaJS</a> has been on <a>par with</a> the veteran <a>jQuery</a> in almost all areas since <a>ES6</a> and is now far superior.',
                        'de',
                        'en'
                    ],
                    [
                        '<a p="1">VanillaJS</a> ist seit <a p="2">ES6</a> quasi in allen Bereichen dem Urgestein <a p="3">jQuery</a> ebenbürtig und inzwischen weit überlegen.',
                        '<a p="1">VanillaJS</a> has been on <a p="1">par with</a> the veteran <a p="3">jQuery</a> in almost all areas since <a p="2">ES6</a> and is now far superior.',
                        'de',
                        'en'
                    ],
                    ['<b>Haus</b><span>Hund</span>', '<b>House</b><span>Dog</span>', 'de', 'en'],
                    [
                        '<i>Hund</i><b>Haus</b><i>Hallo</i><b>Stadt</b>',
                        '<i>Dog</i><b>House</b><i>Hello</i><b>City</b>',
                        'de',
                        'en'
                    ],
                    ['<b>Hund</b><span>Haus</span>', '<b>Dog</b><span>House</span>', 'de', 'en'],
                    ['Hallo. Welt.', 'Hello. World.', 'de', 'en'],
                    ['<i>Haus.</i><b>Hund.</b>', '<i>House.</i><b>Dog.</b>', 'de', 'en'],
                    ['<b>Haus.</b><span>Hund.</span>', '<b>House.</b><span>Dog.</span>', 'de', 'en'],
                    ['<b>Haus.</b><i>Hund.</i>', '<b>House.</b><i>Dog.</i>', 'de', 'en'],
                    ['<b>Haus.</b><b>Hund.</b>', '<b>House.</b><b>Dog.</b>', 'de', 'en'],
                    ['<i>Haus.</i><i>Hund.</i>', '<i>House.</i><i>Dog.</i>', 'de', 'en'],
                    [
                        '<b p="1">Haus</b><span p="2">Hund</span>',
                        '<b p="1">House</b><span p="2">Dog</span>',
                        'de',
                        'en'
                    ],
                    [
                        '<span>Haus</span><span>Das ist ein Haus. Und noch ein Haus.</span>',
                        '<span>House</span> <span>this is a house. And another house.</span>',
                        'de',
                        'en'
                    ]
                ]
                as $examples__value
            ) {
                $this->assertSame(
                    __minify_html(
                        mb_strtolower(
                            __translate_google(
                                $examples__value[0],
                                $examples__value[2],
                                $examples__value[3],
                                $api_keys__value
                            )
                        )
                    ),
                    __minify_html(mb_strtolower($examples__value[1]))
                );
            }
        }

        foreach (['free', getenv('GOOGLE_TRANSLATION_API_KEY')] as $api_keys__value) {
            $this->assertSame(__translate_google(null, 'de', 'en', $api_keys__value), null);
            $this->assertSame(__translate_google('', 'de', 'en', $api_keys__value), '');
        }

        $this->assertSame(
            __translate_google(
                'Hund
Haus',
                'de',
                'en',
                getenv('GOOGLE_TRANSLATION_API_KEY')
            ),
            'Dog
House'
        );

        try {
            __translate_google('Das ist ein Test', 'dejhfjhfhh', 'enjhgffjhfj', 'free');
        } catch (\Throwable $t) {
            $this->assertSame(strpos($t->getMessage(), 'HTTP server (unknown)') !== false, true);
        }

        try {
            __translate_google('Sein oder Nichtsein; das ist hier die Frage.', 'de', 'en', 'WRONG_KEY!');
        } catch (\Throwable $t) {
            $this->assertSame(strpos($t->getMessage(), 'API key not valid') !== false, true);
        }

        $this->assertSame(
            __translate_microsoft(
                'Sein oder Nichtsein; das ist hier die Frage.',
                'de',
                'en',
                getenv('MICROSOFT_TRANSLATION_API_KEY')
            ),
            'Being or not being; that is the question here.'
        );

        $this->assertSame(
            __translate_microsoft(
                '<a>VanillaJS</a> ist seit <a>ES6</a> quasi in allen Bereichen dem Urgestein <a>jQuery</a> ebenbürtig und inzwischen weit überlegen.',
                'de',
                'en',
                getenv('MICROSOFT_TRANSLATION_API_KEY')
            ),
            'Since <a>ES6,</a> <a>VanillaJS</a> has been on an equal footing with the original <a>rock jQuery</a> in virtually all areas and is now far superior.'
        );

        $this->assertSame(
            __translate_microsoft(
                '<a p="1">VanillaJS</a> ist seit <a p="2">ES6</a> quasi in allen Bereichen dem Urgestein <a p="3">jQuery</a> ebenbürtig und inzwischen weit überlegen.',
                'de',
                'en',
                getenv('MICROSOFT_TRANSLATION_API_KEY')
            ),
            'Since <a p="2">ES6,</a> <a p="1">VanillaJS</a> has been on an equal footing with the original <a p="3">rock jQuery</a> in virtually all areas and is now far superior.'
        );

        try {
            __translate_microsoft('Sein oder Nichtsein; das ist hier die Frage.', 'de', 'en', 'WRONG_KEY!');
        } catch (\Throwable $t) {
            $this->assertSame(strpos($t->getMessage(), 'credentials are missing') !== false, true);
        }

        $this->assertSame(
            __translate_deepl(
                'Sein oder Nichtsein; das ist hier die Frage.',
                'de',
                'en',
                getenv('DEEPL_TRANSLATION_API_KEY')
            ),
            'To be or not to be; that is the question here.'
        );

        $this->assertSame(
            __translate_deepl(
                '<a p="1">VanillaJS</a> ist seit <a p="2">ES6</a> quasi in allen Bereichen dem Urgestein <a p="3">jQuery</a> ebenbürtig und inzwischen weit überlegen.',
                'de',
                'en',
                getenv('DEEPL_TRANSLATION_API_KEY')
            ),
            'Since <a p="2">ES6</a>,<a p="1"> VanillaJS</a> is almost equal to the primary rock <a p="3">jQuery</a> in all areas and is now far superior.'
        );

        try {
            __translate_deepl('Sein oder Nichtsein; das ist hier die Frage.', 'de', 'en', 'WRONG_KEY!');
        } catch (\Throwable $t) {
            $this->assertSame(strpos($t->getMessage(), 'WRONG_KEY') !== false, true);
        }
    }

    function test_timestamp_excel_unix()
    {
        $this->assertSame(__timestamp_excel_to_str(36526), '2000-01-01 00:00:00');
        $this->assertSame(__timestamp_excel_to_str(36526), '2000-01-01 00:00:00');
        $this->assertSame(__timestamp_excel_to_str(36526.3440972222), '2000-01-01 08:15:30');
        $this->assertSame(__timestamp_str_to_excel('2000-01-01'), 36526);
        $this->assertSame(__timestamp_str_to_excel('2000-01-01 00:00:00'), 36526);
        $this->assertSame(__timestamp_str_to_excel('2000-01-01 08:15:30'), 36526.3440972222);
    }

    function test_encode_decode_string()
    {
        $data = ['foo' => 'bar', 'bar' => 'baz'];
        $this->assertEquals(__encode_data($data), 'YToyOntzOjM6ImZvbyI7czozOiJiYXIiO3M6MzoiYmFyIjtzOjM6ImJheiI7fQ==');
        $this->assertEquals(__decode_data(__encode_data($data)), $data);
        $this->assertEquals(__decode_data(__encode_data([])), []);
        $this->assertEquals(__decode_data(__encode_data((object) $data)), (object) $data);
        $this->assertEquals(__decode_data(__encode_data(null)), null);
        $this->assertEquals(__decode_data(__encode_data(true)), true);
        $this->assertEquals(__decode_data(__encode_data(false)), false);
        $this->assertEquals(__decode_data(__encode_data(0)), 0);
        $this->assertEquals(__decode_data(__encode_data('foo')), 'foo');
        $this->assertEquals(__decode_data(__encode_data(['foo'])), ['foo']);
        $this->assertEquals(__decode_data(__encode_data(['foo', 'bar'])), ['foo', 'bar']);
        $this->assertEquals(__decode_data(__encode_data('foo', 'bar')), ['foo', 'bar']);
    }

    function test__extract_urls_from_sitemap()
    {
        $urls = __extract_urls_from_sitemap('https://vielhuber.de/sitemap_index.xml');
        $this->assertSame(count($urls) > 100, true);
        $this->assertSame(in_array('https://vielhuber.de/impressum/', $urls), true);
        $this->assertSame(in_array('https://vielhuber.de/blog/google-translation-api-hacking/', $urls), true);
        $this->assertSame(in_array('https://vielhuber.de/blog/', $urls), true);

        $this->assertSame(__extract_urls_from_sitemap('https://vielhuber.de/map.xml'), []);
        $this->assertSame(__extract_urls_from_sitemap('https://vielhuber.de/'), []);
        $this->assertSame(__extract_urls_from_sitemap(null), []);
        $this->assertSame(__extract_urls_from_sitemap(true), []);
        $this->assertSame(__extract_urls_from_sitemap(false), []);
        $this->assertSame(__extract_urls_from_sitemap('foo'), []);
    }

    function test__trim_whitespace()
    {
        $this->assertSame(
            __trim_whitespace('      string including nasty whitespace chars  '),
            'string including nasty whitespace chars'
        );
        $this->assertSame(
            __trim_whitespace(
                '

   

   string including nasty whitespace chars  

    ' .
                    html_entity_decode('&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;') .
                    '

'
            ),
            'string including nasty whitespace chars'
        );
        $this->assertSame(__trim_whitespace('𩸽 '), '𩸽');
        $this->assertSame(__trim_whitespace('Català'), 'Català');
        $this->assertSame(
            __trim_whitespace('multi
line
string



'),
            'multi
line
string'
        );
    }

    function test__extract_title_from_url()
    {
        $this->assertSame(
            __extract_title_from_url('https://vielhuber.de'),
            'David Vielhuber > Full-Stack Developer aus München'
        );
        $this->assertSame(
            __extract_title_from_url('https://vielhuber.de/'),
            'David Vielhuber > Full-Stack Developer aus München'
        );
        $this->assertSame(__extract_title_from_url(null), '');
        $this->assertSame(__extract_title_from_url(true), '');
        $this->assertSame(__extract_title_from_url(false), '');
        $this->assertSame(__extract_title_from_url('foo'), '');
    }

    function test__extract_meta_desc_from_url()
    {
        $this->assertSame(
            __extract_meta_desc_from_url('https://vielhuber.de'),
            '🌀 Vielhuber David ist ein Web-Geek mit einem Faible für schönes Design, einer Prise Perfektionismus und Augen für klare Konturen. 🌀'
        );
        $this->assertSame(
            __extract_meta_desc_from_url('https://vielhuber.de/'),
            '🌀 Vielhuber David ist ein Web-Geek mit einem Faible für schönes Design, einer Prise Perfektionismus und Augen für klare Konturen. 🌀'
        );
        $this->assertSame(__extract_meta_desc_from_url(null), '');
        $this->assertSame(__extract_meta_desc_from_url(true), '');
        $this->assertSame(__extract_meta_desc_from_url(false), '');
        $this->assertSame(__extract_meta_desc_from_url('foo'), '');
    }

    function test__array_map_deep()
    {
        $this->assertSame(
            __array_map_deep(['foo', 'bar' => ['baz', 'gnarr']], function ($a) {
                return $a . '!';
            }),
            ['foo!', 'bar' => ['baz!', 'gnarr!']]
        );
        $this->assertSame(
            __array_map_deep(['foo', 'bar' => ['baz', ['1', '2']]], function ($a) {
                return $a . '!';
            }),
            ['foo!', 'bar' => ['baz!', ['1!', '2!']]]
        );
        $this->assertSame(
            __array_map_deep(null, function ($a) {
                return $a . '!';
            }),
            '!'
        );
        $this->assertSame(
            __array_map_deep(true, function ($a) {
                return !$a;
            }),
            false
        );
        $this->assertSame(
            __array_map_deep([[[[[[[[[[[[[[[[[[[[true]]]]]]]]]]]]]]]]]]]], function ($a) {
                return !$a;
            }),
            [[[[[[[[[[[[[[[[[[[[false]]]]]]]]]]]]]]]]]]]]
        );
        $this->assertSame(
            __array_map_deep([[[[[[[[[[[[[[[[[[[[42 => 'no', 7 => 'ok']]]]]]]]]]]]]]]]]]]], function ($value, $key) {
                return $key === 42 ? $value : $value . '!';
            }),
            [[[[[[[[[[[[[[[[[[[[42 => 'no', 7 => 'ok!']]]]]]]]]]]]]]]]]]]]
        );
        $this->assertSame(
            __array_map_deep(
                ['foo' => ['bar' => 'baz'], 'bar' => ['baz' => 'gnarr'], 'gnarr' => ['foo' => 'gnaz']],
                function ($value, $key, $key_chain) {
                    return in_array('bar', $key_chain) ? $value . '!' : $value;
                }
            ),
            ['foo' => ['bar' => 'baz!'], 'bar' => ['baz' => 'gnarr!'], 'gnarr' => ['foo' => 'gnaz']]
        );
        $output = [];
        __array_map_deep([1 => [2 => [3 => [4 => [5 => 'ok1'], 6 => [7 => 'ok2']]]], 8 => 'ok3'], function (
            $value,
            $key,
            $key_chain
        ) use (&$output) {
            $output[] = $value . ': ' . implode('.', $key_chain);
        });
        $this->assertSame(implode(' - ', $output), 'ok1: 1.2.3.4.5 - ok2: 1.2.3.6.7 - ok3: 8');

        $this->assertEquals(
            __array_map_deep(['foo', 'bar' => (object) ['baz', 'gnarr']], function ($a) {
                return $a . '!';
            }),
            ['foo!', 'bar' => (object) ['baz!', 'gnarr!']]
        );
        $output = [];
        __array_map_deep(
            (object) [
                1 => (object) [2 => (object) [3 => (object) [4 => (object) [5 => 'ok1'], 6 => (object) [7 => 'ok2']]]],
                8 => 'ok3'
            ],
            function ($value, $key, $key_chain) use (&$output) {
                $output[] = $value . ': ' . implode('.', $key_chain);
            }
        );
        $this->assertSame(implode(' - ', $output), 'ok1: 1.2.3.4.5 - ok2: 1.2.3.6.7 - ok3: 8');
    }

    function test__anonymize_ip()
    {
        $this->assertSame(__anonymize_ip('207.142.131.005'), '207.142.131.XXX');
        $this->assertSame(
            __anonymize_ip('2001:0db8:0000:08d3:0000:8a2e:0070:7344'),
            '2001:0db8:0000:08d3:0000:8a2e:XXXX:XXXX'
        );
        $this->assertSame(
            __anonymize_ip('2001:0db8:0000:08d3:0000:8a2e:0070:734a'),
            '2001:0db8:0000:08d3:0000:8a2e:XXXX:XXXX'
        );
        $this->assertSame(__anonymize_ip('207.142.131.5'), '207.142.131.XXX');
        $this->assertSame(__anonymize_ip('2001:0db8::8d3::8a2e:7:7344'), '2001:0db8::8d3::8a2e:XXXX:XXXX');
        $this->assertSame(__anonymize_ip('::1'), ':XXXX:XXXX');
        $this->assertSame(__anonymize_ip('127.0.0.1'), '127.0.0.XXX');
        $this->assertSame(__anonymize_ip(''), '');
        $this->assertSame(__anonymize_ip(true), true);
        $this->assertSame(__anonymize_ip(false), false);
        $this->assertSame(__anonymize_ip(), '192.168.178.XXX');
        $this->assertSame(__anonymize_ip(null), '192.168.178.XXX');
    }

    function test__password_strength()
    {
        $this->assertSame(__password_strength('3iu'), 1);
        $this->assertSame(__password_strength('3iurehkHEDJ'), 2);
        $this->assertSame(__password_strength('3iurehkHEDJK§$R$A'), 3);
        $this->assertSame(__password_strength(null), 1);
        $this->assertSame(__password_strength(''), 1);
        $this->assertSame(__password_strength([]), 1);
    }

    function test__distance_haversine()
    {
        $this->assertSame(__distance_haversine([48.576809, 13.403207], [48.127686, 11.575371]), 143999);
        $this->assertSame(__distance_haversine(['48.576809', '13.403207'], ['48.127686', '11.575371']), 143999);
        $this->assertSame(__distance_haversine(null, [null, 0]), null);
    }

    function test__referer()
    {
        $this->assertSame(__referer(), 'https://google.de/');
    }

    function test__array_walk_recursive_all()
    {
        $arr = ['foo' => 'bar', 'bar' => ['baz' => 'gnarr', 'gnarr' => 'baz']];
        __array_walk_recursive_all($arr, function (&$value, $key, $key_chain) {
            if (is_array($value) && array_key_exists('baz', $value) && $value['baz'] === 'gnarr') {
                $value['gnarr'] = 'baz2';
            }
        });
        $this->assertSame($arr, ['foo' => 'bar', 'bar' => ['baz' => 'gnarr', 'gnarr' => 'baz2']]);
        $counter = 0;
        $arr = ['foo' => 'bar', 'bar' => ['baz' => 'gnarr', 'gnarr' => 'baz']];
        __array_walk_recursive_all($arr, function (&$value, $key, $key_chain) use (&$counter) {
            $counter++;
        });
        $this->assertSame($counter, 5);
    }

    function test__array_map_deep_all()
    {
        $this->assertSame(
            __array_map_deep_all(['foo' => 'bar', 'bar' => ['baz' => 'gnarr', 'gnarr' => 'baz']], function (
                $value,
                $key,
                $key_chain
            ) {
                if (is_array($value) && array_key_exists('baz', $value) && $value['baz'] === 'gnarr') {
                    $value['gnarr'] = 'baz2';
                }
                return $value;
            }),
            ['foo' => 'bar', 'bar' => ['baz' => 'gnarr', 'gnarr' => 'baz2']]
        );
    }

    function test__exception()
    {
        try {
            __exception('foo');
        } catch (\Throwable $t) {
            $this->assertSame(__exception_message($t), 'foo');
        }
        try {
            __exception(['foo' => 'bar']);
        } catch (\Throwable $t) {
            $this->assertSame(__exception_message($t), ['foo' => 'bar']);
        }
        try {
            throw new \Exception('bar');
        } catch (\Throwable $t) {
            $this->assertSame(__exception_message($t), 'bar');
        }
        try {
            __exception('foo');
        } catch (\ExtendedException $t) {
            $this->assertSame(__exception_message($t), 'foo');
        }
        try {
            throw new \Exception('bar');
        } catch (\ExceptionExtended $t) {
            $this->assertSame(true, false);
        } catch (\Throwable $t) {
            $this->assertSame(true, true);
        }
    }

    function test__array_multisort()
    {
        $arr = [['a' => 17, 'b' => 42], ['a' => 13, 'b' => 19]];
        usort($arr, __array_multisort([['a', 'asc'], ['b', 'asc']]));
        $this->assertSame($arr, [['a' => 13, 'b' => 19], ['a' => 17, 'b' => 42]]);
        usort(
            $arr,
            __array_multisort(function ($v) {
                return [[$v['a'], 'asc'], [$v['b'], 'asc']];
            })
        );
        $this->assertSame($arr, [['a' => 13, 'b' => 19], ['a' => 17, 'b' => 42]]);
        $arr = [['a' => true, 'b' => true, 'c' => 'Test!'], ['a' => true, 'b' => false, 'c' => 'yo']];
        usort($arr, __array_multisort([['a', 'asc'], ['b', 'asc'], ['c', 'asc']]));
        $this->assertSame($arr, [['a' => true, 'b' => false, 'c' => 'yo'], ['a' => true, 'b' => true, 'c' => 'Test!']]);
        usort($arr, __array_multisort([['a', 'desc'], ['b', 'desc'], ['c', 'asc']]));
        $this->assertSame($arr, [['a' => true, 'b' => true, 'c' => 'Test!'], ['a' => true, 'b' => false, 'c' => 'yo']]);
        usort($arr, __array_multisort([['a', 'desc'], ['b', 'asc'], ['c', 'desc']]));
        $this->assertSame($arr, [['a' => true, 'b' => false, 'c' => 'yo'], ['a' => true, 'b' => true, 'c' => 'Test!']]);
        $arr = [
            ['id' => 1, 'pos' => null, 'date' => new dateTime('2020-01-01'), 'created_at' => '2020-01-16 13:03:32'],
            ['id' => 2, 'pos' => null, 'date' => new dateTime('2020-01-01'), 'created_at' => '2020-01-16 13:03:32'],
            ['id' => 3, 'pos' => null, 'date' => new dateTime('2020-01-01'), 'created_at' => '2020-01-16 13:03:32'],
            ['id' => 4, 'pos' => null, 'date' => new dateTime('2020-01-01'), 'created_at' => '2020-01-16 13:03:32'],
            ['id' => 5, 'pos' => null, 'date' => new dateTime('2020-01-01'), 'created_at' => '2020-01-16 13:03:32'],
            ['id' => 6, 'pos' => null, 'date' => new dateTime('2020-01-01'), 'created_at' => '2020-01-16 13:03:32']
        ];
        usort($arr, __array_multisort([['pos', 'asc'], ['date', 'asc'], ['created_at', 'asc'], ['id', 'asc']]));
        $this->assertEquals($arr, [
            ['id' => 1, 'pos' => null, 'date' => new dateTime('2020-01-01'), 'created_at' => '2020-01-16 13:03:32'],
            ['id' => 2, 'pos' => null, 'date' => new dateTime('2020-01-01'), 'created_at' => '2020-01-16 13:03:32'],
            ['id' => 3, 'pos' => null, 'date' => new dateTime('2020-01-01'), 'created_at' => '2020-01-16 13:03:32'],
            ['id' => 4, 'pos' => null, 'date' => new dateTime('2020-01-01'), 'created_at' => '2020-01-16 13:03:32'],
            ['id' => 5, 'pos' => null, 'date' => new dateTime('2020-01-01'), 'created_at' => '2020-01-16 13:03:32'],
            ['id' => 6, 'pos' => null, 'date' => new dateTime('2020-01-01'), 'created_at' => '2020-01-16 13:03:32']
        ]);
        $arr = [['foo' => 'baz', 'bar' => 'baz'], ['foo' => 'baz', 'bar' => 'gnarr']];
        usort($arr, __array_multisort([['foo', 'desc'], ['bar', 'desc']]));
        $this->assertEquals($arr, [['foo' => 'baz', 'bar' => 'gnarr'], ['foo' => 'baz', 'bar' => 'baz']]);
        $arr = [['a' => __empty(), 'b' => 42], ['a' => 13, 'b' => 19]];
        usort($arr, __array_multisort([['a', 'asc'], ['b', 'asc']]));
        $this->assertEquals($arr, [['a' => __empty(), 'b' => 42], ['a' => 13, 'b' => 19]]);
        $arr = [['a' => null, 'b' => 42], ['a' => 13, 'b' => 19]];
        usort($arr, __array_multisort([['a', 'asc'], ['b', 'asc']]));
        $this->assertEquals($arr, [['a' => null, 'b' => 42], ['a' => 13, 'b' => 19]]);
        $arr = [['a' => 13, 'b' => 19], ['a' => null, 'b' => 42]];
        usort($arr, __array_multisort([['a', 'asc'], ['b', 'asc']]));
        $this->assertEquals($arr, [['a' => null, 'b' => 42], ['a' => 13, 'b' => 19]]);
        $arr = [['a' => 13, 'b' => 19], ['a' => null, 'b' => 42]];
        usort($arr, __array_multisort([['a', 'asc'], ['b', 'asc']]));
        $this->assertEquals($arr, [['a' => null, 'b' => 42], ['a' => 13, 'b' => 19]]);
        $arr = [['a' => 17, 'b' => 42], ['a' => 13, 'b' => 19]];
        usort(
            $arr,
            __array_multisort(function ($v) {
                return [[$v['a'], 'asc'], [$v['b'], 'asc']];
            })
        );
        $this->assertEquals($arr, [['a' => 13, 'b' => 19], ['a' => 17, 'b' => 42]]);
        $arr = [['a' => __empty(), 'b' => 42], ['a' => 13, 'b' => 19]];
        usort(
            $arr,
            __array_multisort(function ($v) {
                return [[$v['a'], 'asc'], [$v['b'], 'asc']];
            })
        );
        $this->assertEquals($arr, [['a' => __empty(), 'b' => 42], ['a' => 13, 'b' => 19]]);
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
        $this->assertSame(__validate_date('5956-09-24'), false);
        $this->assertSame(__validate_date('51956-09-24'), false);
        $this->assertSame(__validate_date(new DateTime('2000-01-01')), true);
        $this->assertSame(__validate_date(946713600), true);
        $this->assertSame(__validate_date(null), false);
        $this->assertSame(__validate_date(''), false);
        $this->assertSame(__validate_date(true), false);
        $this->assertSame(__validate_date(false), false);

        $this->assertSame(__validate_date_format('d.m.Y'), true);
        $this->assertSame(__validate_date_format('Y-m-d'), true);
        $this->assertSame(__validate_date_format('Y/m/d'), true);
        $this->assertSame(__validate_date_format('01.m.Y'), true);
        $this->assertSame(__validate_date_format('01.01.2000'), false);
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
        $this->assertSame(__phone_normalize('141'), '141');
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
        $this->assertSame(__phone_is_landline('141'), false);
        $this->assertSame(__phone_is_mobile('(0)89-12 456 666'), false);
        $this->assertSame(__phone_is_mobile('(0)151/58 75 46 91'), true);
        $this->assertSame(__phone_is_mobile('141'), false);

        $this->assertSame(__url_normalize('www.tld.com'), 'https://www.tld.com');
        $this->assertSame(__url_normalize('http://tld.com/'), 'http://tld.com');
        $this->assertSame(__url_normalize(''), '');
        $this->assertSame(__url_normalize(true), true);
        $this->assertSame(__url_normalize(false), false);
        $this->assertSame(__url_normalize(42), 42);
        $this->assertSame(__url_normalize('http://www.foo.com/bar/'), 'http://www.foo.com/bar');

        $this->assertSame(__minify_html('<p>foo</p>'), '<p>foo</p>');
        $this->assertSame(__minify_html(null), null);
        $this->assertSame(__minify_html(true), true);
        $this->assertSame(__minify_html(false), false);
        $this->assertSame(__minify_html('Dies ist ein Test'), 'Dies ist ein Test');
        $this->assertSame(__minify_html('  Dies ist ein Test '), 'Dies ist ein Test');
        $this->assertSame(__minify_html(''), '');
        $this->assertSame(__minify_html('<br/>'), '<br>');
        $this->assertSame(__minify_html('<br />'), '<br>');
        $this->assertSame(
            __minify_html('<!DOCTYPE html>
<title>shortest valid html5 document</title>
<p>cool stuff</p>'),
            '<!DOCTYPE html><title>shortest valid html5 document</title><p>cool stuff</p>'
        );
        $this->assertSame(
            __minify_html('<!doctype html>
<html lang="en">
<head>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />

<link href="http://example.com/style.css" rel="stylesheet" />
<link rel="icon" href="http://example.com/favicon.png" />

<title>Tiny Html Minifier</title>

</head>
<body class="body">

<div class="main-wrap">
    <main>
        <textarea>
            Some text
            with newlines
            and some spaces
        </textarea>

        <div class="test">
            <p>This text</p>
            <p>should not</p>
            <p>wrap on multiple lines</p>
        </div>
    </main>
</div>
<script>
    console.log("Script tags are not minified");
    console.log("This is inside a script tag");
</script></body>
</html>'),
            '<!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1.0"><link href="http://example.com/style.css" rel="stylesheet"><link rel="icon" href="http://example.com/favicon.png"><title>Tiny Html Minifier</title></head><body class="body"><div class="main-wrap"><main><textarea>
            Some text
            with newlines
            and some spaces
        </textarea><div class="test"><p>This text</p><p>should not</p><p>wrap on multiple lines</p></div></main></div><script>
    console.log("Script tags are not minified");
    console.log("This is inside a script tag");
</script></body></html>'
        );

        $this->assertSame(__remove_emoji('Lorem 🤷 ipsum ❤ dolor 🥺 med'), 'Lorem  ipsum  dolor  med');
        $this->assertSame(__remove_emoji('OK!🥊'), 'OK!');
        $this->assertSame(__remove_emoji(''), '');
        $this->assertSame(__remove_emoji(null), null);
        $this->assertSame(__remove_emoji(true), true);
        $this->assertSame(__remove_emoji(false), false);
        $this->assertSame(__remove_emoji(42), 42);

        $this->assertSame(__date('2000-01-01'), '2000-01-01');
        $this->assertSame(__date('2000-01-01', 'd.m.Y'), '01.01.2000');
        $this->assertSame(__date('2001-02-29', 'd.m.Y'), null);
        $this->assertSame(__date('2000-01-01', '+6 months'), '2000-07-01');
        $this->assertSame(__date('2000-01-01', null, '+6 months'), '2000-07-01');
        $this->assertSame(__date('2000-01-01', 'd.m.Y', '+6 months'), '01.07.2000');
        $this->assertSame(__date('01.01.2000'), '2000-01-01');
        $this->assertSame(__date('now'), date('Y-m-d', strtotime('now')));
        $this->assertSame(__date('2019-12-02 12:01:02', 'd.m.Y H:i:s'), '02.12.2019 12:01:02');
        $this->assertSame(__date('2019-12-02T12:01:02', 'd.m.Y H:i:s'), '02.12.2019 12:01:02');
        $this->assertSame(__date('2019-12-02T12:01:02', 'd.m.Y\TH:i:s'), '02.12.2019T12:01:02');
        $this->assertSame(__date(strtotime('2000-01-01'), 'd.m.Y'), '01.01.2000');
        $this->assertSame(__date(strtotime('2000-01-01 13:14:15'), 'd.m.Y'), '01.01.2000');
        $this->assertSame(__date(strtotime('2000-01-01 13:14:15'), 'd.m.Y H:i:s'), '01.01.2000 13:14:15');
        $this->assertSame(__date(strtotime('2000-01-01'), 'd.m.Y', '+6 months'), '01.07.2000');
        $this->assertSame(__date(strtotime('2000-01-01 13:14:15'), 'd.m.Y', '+6 months'), '01.07.2000');
        $this->assertSame(__date(strtotime('2000-01-01 13:14:15'), 'd.m.Y H:i:s', '+6 months'), '01.07.2000 13:14:15');
        $this->assertSame(__date(), date('Y-m-d', strtotime('now')));
        $this->assertSame(__date(null), null);
        $this->assertSame(__date(true), null);
        $this->assertSame(__date(false), null);
        $this->assertSame(__date(''), null);
        $this->assertSame(__date('d.m.Y', null), null);
        $this->assertSame(__date('d.m.Y', true), null);
        $this->assertSame(__date('d.m.Y', false), null);
        $this->assertSame(__date('d.m.Y', ''), null);
        $this->assertSame(__date(null, 'd.m.Y'), null);
        $this->assertSame(__date(true, 'd.m.Y'), null);
        $this->assertSame(__date(false, 'd.m.Y'), null);
        $this->assertSame(__date('', 'd.m.Y'), null);
        $this->assertSame(__date('2008-31-31'), null);
        $this->assertSame(__date('now + 6 days'), date('Y-m-d', strtotime('now + 6 days')));
        $this->assertSame(__date('rfkjh lkjerhflk kjekj'), null);
        $this->assertSame(__date(new DateTime('2000-01-01'), 'd.m.Y'), '01.01.2000');
        $this->assertSame(__date(new DateTime('2000-01-01 17:37:38'), 'd.m.Y H:i:s'), '01.01.2000 17:37:38');
        $this->assertSame(__date('d.m.Y'), date('d.m.Y', strtotime('now')));
        $this->assertSame(__date('d.m.Y', 'tomorrow'), date('d.m.Y', strtotime('tomorrow')));
        $this->assertSame(__date('d.m.Y', 'tomorrow', '+ 6 months'), date('d.m.Y', strtotime('tomorrow + 6 months')));
        $this->assertSame(__date('+6 months'), date('Y-m-d', strtotime('now +6 months')));

        $this->assertSame(__date('Y'), date('Y', strtotime('now')));
        $this->assertSame(__date('now'), date('Y-m-d', strtotime('now')));
        $this->assertSame(__date('yesterday'), date('Y-m-d', strtotime('yesterday')));
        $this->assertSame(__date('Yesterday'), date('Y-m-d', strtotime('Yesterday')));
        $this->assertSame(__date('+5 weeks'), date('Y-m-d', strtotime('+5 weeks')));
        $this->assertSame(__date('z vDHY'), date('z vDHY', strtotime('now')));

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

        $this->assertSame(__age_from_date(date(strtotime('now - 20 years - 1 month'))), 20);
        $this->assertSame(__age_from_date(date(strtotime('now - 20 years + 1 day'))), 19);
        $this->assertSame(__age_from_date(date(strtotime('now - 20 years'))), 20);
        $this->assertSame(__age_from_date(date(strtotime('now - 40 years - 1 month'))), 40);
        $this->assertSame(__age_from_date(date(strtotime('now - 40 years + 1 month'))), 39);
        $this->assertSame(__age_from_date(null), null);
        $this->assertSame(__age_from_date(false), null);
        $this->assertSame(__age_from_date('foo'), null);
        $this->assertSame(
            __age_from_date(date(strtotime('now - 20 years - 1 month')), date(strtotime('now - 10 years'))),
            10
        );
        $this->assertSame(__age_from_date(date(strtotime('now - 20 years')), date(strtotime('now - 10 years'))), 10);
        $this->assertSame(__age_from_date(date(strtotime('now - 20 years - 1 month')), null), 20);
        $this->assertSame(__age_from_date(date(strtotime('now - 20 years - 1 month')), ''), 20);
        $this->assertSame(__age_from_date(date(strtotime('now - 20 years - 1 month')), 'foo'), null);
        $this->assertSame(__age_from_date(date(strtotime('5232-01-01'))), null);
        $this->assertSame(
            __age_from_date(date('Y-m-d', strtotime('27.12.2007')), date('Y-m-d', strtotime('27.12.2007'))),
            0
        );
        $this->assertSame(
            __age_from_date(date('Y-m-d', strtotime('27.12.2007')), date('Y-m-d', strtotime('26.12.2008'))),
            0
        );
        $this->assertSame(
            __age_from_date(date('Y-m-d', strtotime('27.12.2007')), date('Y-m-d', strtotime('27.12.2008'))),
            1
        );
        $this->assertSame(
            __age_from_date(date('Y-m-d', strtotime('27.12.2007')), date('Y-m-d', strtotime('28.12.2008'))),
            1
        );

        $this->assertSame(__first_char_is_uppercase(true), false);
        $this->assertSame(__first_char_is_uppercase(false), false);
        $this->assertSame(__first_char_is_uppercase(''), false);
        $this->assertSame(__first_char_is_uppercase('foo'), false);
        $this->assertSame(__first_char_is_uppercase('Foo'), true);
        $this->assertSame(__set_first_char_uppercase(true), true);
        $this->assertSame(__set_first_char_uppercase(false), false);
        $this->assertSame(__set_first_char_uppercase(''), '');
        $this->assertSame(__set_first_char_uppercase('foo'), 'Foo');
        $this->assertSame(__set_first_char_uppercase('Foo'), 'Foo');
        $this->assertSame(__set_first_char_uppercase('übel'), 'Übel');
        $this->assertSame(__set_first_char_uppercase('Übel'), 'Übel');

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

        $a = ['a' => 17, 'b' => 42, 'c' => 'foo'];
        $b = ['a' => 19, 'b' => 20, 'c' => 'bar'];
        $c = ['a' => 17, 'b' => 42, 'c' => 'baz'];
        $arr = [$a, $b, $c];
        $this->assertSame(__array_group_by($arr, 'a'), [17 => [$a, $c], 19 => [$b]]);
        $this->assertSame(__array_group_by($arr, 'a', 'b'), [17 => [42 => [$a, $c]], 19 => [20 => [$b]]]);
        $this->assertSame(
            __array_group_by($arr, function ($v) {
                return $v['a'];
            }),
            [17 => [$a, $c], 19 => [$b]]
        );
        $this->assertSame(
            __array_group_by(
                $arr,
                function ($v) {
                    return $v['a'];
                },
                function ($v) {
                    return $v['b'];
                }
            ),
            [17 => [42 => [$a, $c]], 19 => [20 => [$b]]]
        );

        $this->assertSame(__array_unique([1, 2, 2]), [1, 2]);
        $this->assertSame(__array_unique([['foo' => 'bar'], ['bar' => 'baz'], ['foo' => 'bar']]), [
            ['foo' => 'bar'],
            ['bar' => 'baz']
        ]);
        $this->assertSame(__array_unique(null), null);
        $this->assertSame(__array_unique([]), []);
        $this->assertSame(__array_unique(''), '');
        $this->assertSame(__array_unique(0), 0);
        $this->assertSame(__array_unique(true), true);
        $this->assertSame(__array_unique(false), false);

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

        $this->assertSame(__split_whitespace('DE07123412341234123412', 4), 'DE07 1234 1234 1234 1234 12');
        $this->assertSame(__split_whitespace(' föö bäär ', 3), 'föö bää r');
        $this->assertSame(__split_whitespace(null, 3), null);
        $this->assertSame(__split_whitespace(true, 3), true);
        $this->assertSame(__split_whitespace(false, 3), false);
        $this->assertSame(__split_whitespace('', 3), '');
        $this->assertSame(__split_whitespace('foo', 0), 'foo');

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

        $this->assertSame(__string_is_html('foo'), false);
        $this->assertSame(__string_is_html('<p>foo</p>'), true);
        $this->assertSame(__string_is_html('foo bar'), false);
        $this->assertSame(__string_is_html('foo&nbsp;bar'), true);
        $this->assertSame(__string_is_html(null), false);
        $this->assertSame(__string_is_html(''), false);
        $this->assertSame(__string_is_html(false), false);
        $this->assertSame(__string_is_html(true), false);
        $this->assertSame(__string_is_html([]), false);

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
        $this->assertSame(__first_key(['foo' => 'bar', 'bar' => 'baz']), 'foo');
        $this->assertSame(__first_key(null), null);
        $this->assertSame(__first_key(true), null);
        $this->assertSame(__first_key(''), null);
        $this->assertSame(__first_key(['foo']), 0);
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
        $arr = __remove_by_key($arr, 1);
        $this->assertSame($arr, [0 => 'foo', 1 => 'baz']);
        $arr = ['foo' => 1, 'bar' => 2, 'baz' => 3];
        $arr = __remove_by_key($arr, 'foo');
        $this->assertSame($arr, ['bar' => 2, 'baz' => 3]);
        $arr = [42 => 1, 'foo' => 2, 'bar' => 3];
        $arr = __remove_by_key($arr, 'foo');
        $this->assertSame($arr, [42 => 1, 'bar' => 3]);
        $arr = [0 => 'foo', 'foobar' => 'bar', 2 => 'baz'];
        $arr = __remove_by_key($arr, 'foobar');
        $this->assertSame($arr, [0 => 'foo', 1 => 'baz']);
        $arr = [0 => 'foo', 1 => 'bar', 2 => 'baz'];
        $arr = __remove_by_key($arr, 3);
        $this->assertSame($arr, [0 => 'foo', 1 => 'bar', 2 => 'baz']);
        $arr = (object) [0 => 'foo', 1 => 'bar', 2 => 'baz'];
        $arr = __remove_by_key($arr, 1);
        $this->assertEquals($arr, (object) [0 => 'foo', 1 => 'baz']);
        $arr = (object) ['foo' => 1, 'bar' => 2, 'baz' => 3];
        $arr = __remove_by_key($arr, 'foo');
        $this->assertEquals($arr, (object) ['bar' => 2, 'baz' => 3]);
        $arr = (object) [42 => 1, 'foo' => 2, 'bar' => 3];
        $arr = __remove_by_key($arr, 'foo');
        $this->assertEquals($arr, (object) [42 => 1, 'bar' => 3]);

        $arr = [0 => 'foo', 1 => 'bar', 2 => 'baz'];
        $arr = __remove_by_value($arr, 'bar');
        $this->assertSame($arr, [0 => 'foo', 1 => 'baz']);
        $arr = ['foo' => 1, 'bar' => 2, 'baz' => 3];
        $arr = __remove_by_value($arr, 1);
        $this->assertSame($arr, ['bar' => 2, 'baz' => 3]);
        $arr = [42 => 1, 'foo' => 2, 'bar' => 3];
        $arr = __remove_by_value($arr, 2);
        $this->assertSame($arr, [42 => 1, 'bar' => 3]);
        $arr = [0 => 'foo', 'foobar' => 'bar', 2 => 'baz'];
        $arr = __remove_by_value($arr, 'bar');
        $this->assertSame($arr, [0 => 'foo', 1 => 'baz']);
        $arr = [0 => 'foo', 1 => 'bar', 2 => 'baz'];
        $arr = __remove_by_value($arr, 'bazzz');
        $this->assertSame($arr, [0 => 'foo', 1 => 'bar', 2 => 'baz']);
        $arr = (object) [0 => 'foo', 1 => 'bar', 2 => 'baz'];
        $arr = __remove_by_value($arr, 'bar');
        $this->assertEquals($arr, (object) [0 => 'foo', 1 => 'baz']);
        $arr = (object) ['foo' => 1, 'bar' => 2, 'baz' => 3];
        $arr = __remove_by_value($arr, 1);
        $this->assertEquals($arr, (object) ['bar' => 2, 'baz' => 3]);
        $arr = (object) [42 => 1, 'foo' => 2, 'bar' => 3];
        $arr = __remove_by_value($arr, 2);
        $this->assertEquals($arr, (object) [42 => 1, 'bar' => 3]);
        $arr = [0 => 'foo', 1 => 'foo', 2 => 'foo'];
        $arr = __remove_by_value($arr, 'foo');
        $arr = __remove_by_value($arr, 'foo');
        $this->assertSame($arr, []);

        $arr = [0 => 'foo', 1 => 'bar', 2 => 'baz'];
        $arr = __arr_append($arr, 'gnarr', 42 % 7 === 0);
        $this->assertEquals($arr, [0 => 'foo', 1 => 'bar', 2 => 'baz', 3 => 'gnarr']);
        $arr = __arr_append($arr, 'gnarr', 42 % 7 === 1);
        $this->assertEquals($arr, [0 => 'foo', 1 => 'bar', 2 => 'baz', 3 => 'gnarr']);
        $arr = [0 => 'foo', 1 => 'bar', 2 => 'baz'];
        $arr = __arr_prepend($arr, 'gnarr', 0 % 1 === 0);
        $this->assertEquals($arr, [0 => 'gnarr', 1 => 'foo', 2 => 'bar', 3 => 'baz']);
        $arr = __arr_prepend($arr, 'gnarr', 0 % 1 === 1);
        $this->assertEquals($arr, [0 => 'gnarr', 1 => 'foo', 2 => 'bar', 3 => 'baz']);
        $this->assertEquals(__arr_append(__arr_append(__arr_append([], 'foo'), 'bar', false), 'baz'), [
            0 => 'foo',
            1 => 'baz'
        ]);

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

        $this->assertSame(__is_integer(0), true);
        $this->assertSame(__is_integer(42), true);
        $this->assertSame(__is_integer(4.2), false);
        $this->assertSame(__is_integer(0.42), false);
        $this->assertSame(__is_integer(42.), true);
        $this->assertSame(__is_integer('42'), true);
        $this->assertSame(__is_integer('a42'), false);
        $this->assertSame(__is_integer('42a'), false);
        $this->assertSame(__is_integer(0x24), true);
        $this->assertSame(__is_integer(8372468764378627868742367883268), true);
        $this->assertSame(__is_integer('8372468764378627868742367883268'), true);
        $this->assertSame(__is_integer(' 1337'), false);
        $this->assertSame(__is_integer('1337 '), false);
        $this->assertSame(__is_integer([]), false);
        $this->assertSame(__is_integer(null), false);
        $this->assertSame(__is_integer(false), false);
        $this->assertSame(__is_integer(true), false);

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

        $response = __curl('https://httpbin.org/cookies', null, null, null, false, false, 60, null, null);
        $this->assertSame(empty((array) $response->result->cookies), true);
        $response = __curl('https://httpbin.org/cookies', null, null, null, false, false, 60, null, [
            'foo' => 'bar',
            'bar' => 'baz'
        ]);
        $this->assertEquals($response->result->cookies, (object) ['foo' => 'bar', 'bar' => 'baz']);

        // disabled due to https://github.com/postmanlabs/httpbin/issues/617
        if (1 == 0) {
            $response = __curl(
                'https://httpbin.org/absolute-redirect/1',
                null,
                null,
                null,
                false,
                false,
                60,
                null,
                null,
                true
            );
            $this->assertSame($response->status, 200);
            $response = __curl(
                'https://httpbin.org/absolute-redirect/1',
                null,
                null,
                null,
                false,
                false,
                60,
                null,
                null,
                false
            );
            $this->assertSame($response->status, 302);
            $response = __curl(
                'https://httpbin.org/absolute-redirect/1',
                null,
                null,
                null,
                false,
                false,
                60,
                null,
                null,
                true
            );
            $this->assertSame($response->url, 'http://httpbin.org/get');
        }

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

        define('ENCRYPTION_FOLDER', __DIR__ . '/');
        $token = __encrypt_poor('bar');
        $this->assertSame(__decrypt_poor($token, true), 'bar');
        $this->assertSame(__decrypt_poor($token, true), null);

        $this->assertSame(count(__files_in_folder()) >= 6, true);
        $this->assertSame(count(__files_in_folder('.')) >= 6, true);
        $this->assertSame(count(__files_in_folder('.', false, ['.gitignore'])) >= 5, true);
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
        __clean_up_get();
        __clean_up_post();
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

        $this->assertSame(
            __line_endings_weak_equals(
                __diff(
                    'foo
bar
baz',
                    'foo
barz
baz'
                ),
                '2c2
< bar
---
> barz'
            ),
            true
        );

        $this->assertSame(
            __line_endings_weak_equals(
                __diff(
                    'foo
bar
baz',
                    'foo
bar
baz'
                ),
                ''
            ),
            true
        );

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

    function test__class_usage()
    {
        $arr = [0 => 'foo', 1 => 'bar', 2 => 'baz'];
        $this->assertSame(__::arr_append($arr, 'gnarr', 42 % 7 === 0), __arr_append($arr, 'gnarr', 42 % 7 === 0));
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
