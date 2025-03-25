<?php declare(strict_types=1);

namespace Atournayre\Tests\Unit\Common\Uri;

use Atournayre\Common\VO\Uri;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Atournayre\Common\VO\Uri
 */
class UriTest extends TestCase
{
    private const RFC3986_BASE = 'http://a/b/c/d;p?q';

    public function testParsesProvidedUri(): void
    {
        $uri = Uri::of('https://user:pass@example.com:8080/path/123?q=abc#test');

        self::assertSame('https', $uri->scheme());
        self::assertSame('user:pass@example.com:8080', $uri->authority());
        self::assertSame('user:pass', $uri->userInfo());
        self::assertSame('example.com', $uri->host());
        self::assertSame(8080, $uri->port());
        self::assertSame('/path/123', $uri->path());
        self::assertSame('q=abc', $uri->query());
        self::assertSame('test', $uri->fragment());
        self::assertSame('https://user:pass@example.com:8080/path/123?q=abc#test', (string) $uri);
    }

    public function testCanTransformAndRetrievePartsIndividually(): void
    {
        $uri = (Uri::of())
            ->withScheme('https')
            ->withHost('example.com')
            ->withPort(8080)
            ->withPath('/path/123')
            ->withQuery('q=abc')
            ->withFragment('test');

        self::assertSame('https', $uri->scheme());
        self::assertSame('example.com', $uri->host());
        self::assertSame(8080, $uri->port());
        self::assertSame('/path/123', $uri->path());
        self::assertSame('q=abc', $uri->query());
        self::assertSame('test', $uri->fragment());
        self::assertSame('https://example.com:8080/path/123?q=abc#test', (string) $uri);
    }

    public function testSupportsUrlEncodedValues(): void
    {
        $uri = (Uri::of())
            ->withScheme('https')
            ->withHost('example.com')
            ->withPort(8080)
            ->withPath('/path/123')
            ->withQuery('q=abc')
            ->withFragment('test');

        self::assertSame('https', $uri->scheme());
        self::assertSame('example.com', $uri->host());
        self::assertSame(8080, $uri->port());
        self::assertSame('/path/123', $uri->path());
        self::assertSame('q=abc', $uri->query());
        self::assertSame('test', $uri->fragment());
    }

    /**
     * @dataProvider getValidUris
     */
    public function testValidUrisStayValid(string $input): void
    {
        $uri = Uri::of($input);

        self::assertSame($input, (string) $uri);
    }

    /**
     * @return array<array<string>>
     */
    public static function getValidUris(): array
    {
        return [
            ['urn:path-rootless'],
            ['urn:path:with:colon'],
            ['urn:/path-absolute'],
            ['urn:/'],
            // only scheme with empty path
            ['urn:'],
            // only path
            ['/'],
            ['relative/'],
            ['0'],
            // same document reference
            [''],
            // network path without scheme
            ['//example.org'],
            ['//example.org/'],
            ['//example.org?q#h'],
            // only query
            ['?q'],
            ['?q=abc&foo=bar'],
            // only fragment
            ['#fragment'],
            // dot segments are not removed automatically
            ['./foo/../bar'],
        ];
    }

    /**
     * @dataProvider getInvalidUris
     */
    public function testInvalidUrisThrowException(string $invalidUri): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Unable to parse URI');

        Uri::of($invalidUri);
    }

    /**
     * @return array<array<string>>
     */
    public static function getInvalidUris(): array
    {
        return [
            // parse_url() requires the host component which makes sense for http(s)
            // but not when the scheme is not known or different. So '//' or '///' is
            // currently invalid as well but should not according to RFC 3986.
            ['http://'],
            ['urn://host:with:colon'], // host cannot contain ":"
        ];
    }

    public function testPortMustBeValid(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid port: 100000. Must be between 0 and 65535');

        (Uri::of())->withPort(100000);
    }

    public function testWithPortCannotBeNegative(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid port: -1. Must be between 0 and 65535');

        (Uri::of())->withPort(-1);
    }

    public function testParseUriPortCannotBeNegative(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Unable to parse URI');

        Uri::of('//example.com:-1');
    }

    public function testParseUriPortCanBeZero(): void
    {
        if (\version_compare(\PHP_VERSION, '7.4.12') < 0) {
            self::markTestSkipped('Skipping this on low PHP versions.');
        }

        $uri = Uri::of('//example.com:0');
        self::assertEquals(0, $uri->port());
    }

    public function testCanParseFalseyUriParts(): void
    {
        $uri = Uri::of('0://0:0@0/0?0#0');

        self::assertSame('0', $uri->scheme());
        self::assertSame('0:0@0', $uri->authority());
        self::assertSame('0:0', $uri->userInfo());
        self::assertSame('0', $uri->host());
        self::assertSame('/0', $uri->path());
        self::assertSame('0', $uri->query());
        self::assertSame('0', $uri->fragment());
        self::assertSame('0://0:0@0/0?0#0', (string) $uri);
    }

    /**
     * @return array<array<string>>
     */
    public function getResolveTestCases(): array
    {
        return [
            [self::RFC3986_BASE, 'g:h',           'g:h'],
            [self::RFC3986_BASE, 'g',             'http://a/b/c/g'],
            [self::RFC3986_BASE, './g',           'http://a/b/c/g'],
            [self::RFC3986_BASE, 'g/',            'http://a/b/c/g/'],
            [self::RFC3986_BASE, '/g',            'http://a/g'],
            [self::RFC3986_BASE, '//g',           'http://g'],
            [self::RFC3986_BASE, '?y',            'http://a/b/c/d;p?y'],
            [self::RFC3986_BASE, 'g?y',           'http://a/b/c/g?y'],
            [self::RFC3986_BASE, '#s',            'http://a/b/c/d;p?q#s'],
            [self::RFC3986_BASE, 'g#s',           'http://a/b/c/g#s'],
            [self::RFC3986_BASE, 'g?y#s',         'http://a/b/c/g?y#s'],
            [self::RFC3986_BASE, ';x',            'http://a/b/c/;x'],
            [self::RFC3986_BASE, 'g;x',           'http://a/b/c/g;x'],
            [self::RFC3986_BASE, 'g;x?y#s',       'http://a/b/c/g;x?y#s'],
            [self::RFC3986_BASE, '',              self::RFC3986_BASE],
            [self::RFC3986_BASE, '.',             'http://a/b/c/'],
            [self::RFC3986_BASE, './',            'http://a/b/c/'],
            [self::RFC3986_BASE, '..',            'http://a/b/'],
            [self::RFC3986_BASE, '../',           'http://a/b/'],
            [self::RFC3986_BASE, '../g',          'http://a/b/g'],
            [self::RFC3986_BASE, '../..',         'http://a/'],
            [self::RFC3986_BASE, '../../',        'http://a/'],
            [self::RFC3986_BASE, '../../g',       'http://a/g'],
            [self::RFC3986_BASE, '../../../g',    'http://a/g'],
            [self::RFC3986_BASE, '../../../../g', 'http://a/g'],
            [self::RFC3986_BASE, '/./g',          'http://a/g'],
            [self::RFC3986_BASE, '/../g',         'http://a/g'],
            [self::RFC3986_BASE, 'g.',            'http://a/b/c/g.'],
            [self::RFC3986_BASE, '.g',            'http://a/b/c/.g'],
            [self::RFC3986_BASE, 'g..',           'http://a/b/c/g..'],
            [self::RFC3986_BASE, '..g',           'http://a/b/c/..g'],
            [self::RFC3986_BASE, './../g',        'http://a/b/g'],
            [self::RFC3986_BASE, 'foo////g',      'http://a/b/c/foo////g'],
            [self::RFC3986_BASE, './g/.',         'http://a/b/c/g/'],
            [self::RFC3986_BASE, 'g/./h',         'http://a/b/c/g/h'],
            [self::RFC3986_BASE, 'g/../h',        'http://a/b/c/h'],
            [self::RFC3986_BASE, 'g;x=1/./y',     'http://a/b/c/g;x=1/y'],
            [self::RFC3986_BASE, 'g;x=1/../y',    'http://a/b/c/y'],
            // dot-segments in the query or fragment
            [self::RFC3986_BASE, 'g?y/./x',       'http://a/b/c/g?y/./x'],
            [self::RFC3986_BASE, 'g?y/../x',      'http://a/b/c/g?y/../x'],
            [self::RFC3986_BASE, 'g#s/./x',       'http://a/b/c/g#s/./x'],
            [self::RFC3986_BASE, 'g#s/../x',      'http://a/b/c/g#s/../x'],
            [self::RFC3986_BASE, 'g#s/../x',      'http://a/b/c/g#s/../x'],
            [self::RFC3986_BASE, '?y#s',          'http://a/b/c/d;p?y#s'],
            ['http://a/b/c/d;p?q#s', '?y',        'http://a/b/c/d;p?y'],
            ['http://u@a/b/c/d;p?q', '.',         'http://u@a/b/c/'],
            ['http://u:p@a/b/c/d;p?q', '.',       'http://u:p@a/b/c/'],
            ['http://a/b/c/d/', 'e',              'http://a/b/c/d/e'],
            ['urn:no-slash', 'e',                 'urn:e'],
            // falsey relative parts
            [self::RFC3986_BASE, '//0',           'http://0'],
            [self::RFC3986_BASE, '0',             'http://a/b/c/0'],
            [self::RFC3986_BASE, '?0',            'http://a/b/c/d;p?0'],
            [self::RFC3986_BASE, '#0',            'http://a/b/c/d;p?q#0'],
        ];
    }

    public function testSchemeIsNormalizedToLowercase(): void
    {
        $uri = Uri::of('HTTP://example.com');

        self::assertSame('http', $uri->scheme());
        self::assertSame('http://example.com', (string) $uri);

        $uri = (Uri::of('//example.com'))->withScheme('HTTP');

        self::assertSame('http', $uri->scheme());
        self::assertSame('http://example.com', (string) $uri);
    }

    public function testHostIsNormalizedToLowercase(): void
    {
        $uri = Uri::of('//eXaMpLe.CoM');

        self::assertSame('example.com', $uri->host());
        self::assertSame('//example.com', (string) $uri);

        $uri = (Uri::of())->withHost('eXaMpLe.CoM');

        self::assertSame('example.com', $uri->host());
        self::assertSame('//example.com', (string) $uri);
    }

    public function testPortIsNullIfStandardPortForScheme(): void
    {
        // HTTPS standard port
        $uri = Uri::of('https://example.com:443');
        self::assertNull($uri->port());
        self::assertSame('example.com', $uri->authority());

        $uri = (Uri::of('https://example.com'))->withPort(443);
        self::assertNull($uri->port());
        self::assertSame('example.com', $uri->authority());

        // HTTP standard port
        $uri = Uri::of('http://example.com:80');
        self::assertNull($uri->port());
        self::assertSame('example.com', $uri->authority());

        $uri = (Uri::of('http://example.com'))->withPort(80);
        self::assertNull($uri->port());
        self::assertSame('example.com', $uri->authority());
    }

    public function testPortIsReturnedIfSchemeUnknown(): void
    {
        $uri = (Uri::of('//example.com'))->withPort(80);

        self::assertSame(80, $uri->port());
        self::assertSame('example.com:80', $uri->authority());
    }

    public function testStandardPortIsNullIfSchemeChanges(): void
    {
        $uri = Uri::of('http://example.com:443');
        self::assertSame('http', $uri->scheme());
        self::assertSame(443, $uri->port());

        $uri = $uri->withScheme('https');
        self::assertNull($uri->port());
    }

    public function testPortCanBeRemoved(): void
    {
        $uri = (Uri::of('http://example.com:8080'))->withoutPort();

        self::assertNull($uri->port());
        self::assertSame('http://example.com', (string) $uri);
    }

    public function testAuthorityWithUserInfoButWithoutHost(): void
    {
        $uri = (Uri::of())
            ->withUserAndPassword('user', 'pass')
        ;

        self::assertSame('', $uri->userInfo());
        self::assertSame('', $uri->authority());
    }

    /**
     * @return array<array<string>>
     */
    public static function uriComponentsEncodingProvider(): array
    {
        $unreserved = 'a-zA-Z0-9.-_~!$&\'()*+,;=:@';

        return [
            // Percent encode spaces
            ['/pa th?q=va lue#frag ment', '/pa%20th', 'q=va%20lue', 'frag%20ment', '/pa%20th?q=va%20lue#frag%20ment'],
            // Percent encode multibyte
            ['/€?€#€', '/%E2%82%AC', '%E2%82%AC', '%E2%82%AC', '/%E2%82%AC?%E2%82%AC#%E2%82%AC'],
            // Don't encode something that's already encoded
            ['/pa%20th?q=va%20lue#frag%20ment', '/pa%20th', 'q=va%20lue', 'frag%20ment', '/pa%20th?q=va%20lue#frag%20ment'],
            // Percent encode invalid percent encodings
            ['/pa%2-th?q=va%2-lue#frag%2-ment', '/pa%252-th', 'q=va%252-lue', 'frag%252-ment', '/pa%252-th?q=va%252-lue#frag%252-ment'],
            // Don't encode path segments
            ['/pa/th//two?q=va/lue#frag/ment', '/pa/th//two', 'q=va/lue', 'frag/ment', '/pa/th//two?q=va/lue#frag/ment'],
            // Don't encode unreserved chars or sub-delimiters
            ["/$unreserved?$unreserved#$unreserved", "/$unreserved", $unreserved, $unreserved, "/$unreserved?$unreserved#$unreserved"],
            // Encoded unreserved chars are not decoded
            ['/p%61th?q=v%61lue#fr%61gment', '/p%61th', 'q=v%61lue', 'fr%61gment', '/p%61th?q=v%61lue#fr%61gment'],
        ];
    }

    /**
     * @dataProvider uriComponentsEncodingProvider
     */
    public function testUriComponentsGetEncodedProperly(
        string $input,
        string $path,
        string $query,
        string $fragment,
        string $output
    ): void
    {
        $uri = Uri::of($input);
        self::assertSame($path, $uri->path());
        self::assertSame($query, $uri->query());
        self::assertSame($fragment, $uri->fragment());
        self::assertSame($output, (string) $uri);
    }

    public function testWithPathEncodesProperly(): void
    {
        $uri = (Uri::of())->withPath('/baz?#€/b%61r');
        // Query and fragment delimiters and multibyte chars are encoded.
        self::assertSame('/baz%3F%23%E2%82%AC/b%61r', $uri->path());
        self::assertSame('/baz%3F%23%E2%82%AC/b%61r', (string) $uri);
    }

    public function testWithQueryEncodesProperly(): void
    {
        $uri = (Uri::of())->withQuery('?=#&€=/&b%61r');
        // A query starting with a "?" is valid and must not be magically removed. Otherwise it would be impossible to
        // construct such an URI. Also the "?" and "/" does not need to be encoded in the query.
        self::assertSame('?=%23&%E2%82%AC=/&b%61r', $uri->query());
        self::assertSame('??=%23&%E2%82%AC=/&b%61r', (string) $uri);
    }

    public function testWithFragmentEncodesProperly(): void
    {
        $uri = (Uri::of())->withFragment('#€?/b%61r');
        // A fragment starting with a "#" is valid and must not be magically removed. Otherwise it would be impossible to
        // construct such an URI. Also the "?" and "/" does not need to be encoded in the fragment.
        self::assertSame('%23%E2%82%AC?/b%61r', $uri->fragment());
        self::assertSame('#%23%E2%82%AC?/b%61r', (string) $uri);
    }

    public function testAllowsForRelativeUri(): void
    {
        $uri = (Uri::of())->withPath('foo');
        self::assertSame('foo', $uri->path());
        self::assertSame('foo', (string) $uri);
    }

    public function testAddsSlashForRelativeUriStringWithHost(): void
    {
        // If the path is rootless and an authority is present, the path MUST
        // be prefixed by "/".
        $uri = (Uri::of())->withPath('foo')->withHost('example.com');
        self::assertSame('/foo', $uri->path());
        // concatenating a relative path with a host doesn't work: "//example.comfoo" would be wrong
        self::assertSame('//example.com/foo', (string) $uri);
    }

    public function testRemoveExtraSlashesWihoutHost(): void
    {
        // If the path is starting with more than one "/" and no authority is
        // present, the starting slashes MUST be reduced to one.
        $uri = (Uri::of())->withPath('//foo');
        self::assertSame('/foo', $uri->path());
        // URI "//foo" would be interpreted as network reference and thus change the original path to the host
        self::assertSame('/foo', (string) $uri);
    }

    public function testDefaultReturnValuesOfGetters(): void
    {
        $uri = Uri::of();

        self::assertSame('', $uri->scheme());
        self::assertSame('', $uri->authority());
        self::assertSame('', $uri->userInfo());
        self::assertSame('', $uri->host());
        self::assertNull($uri->port());
        self::assertSame('', $uri->path());
        self::assertSame('', $uri->query());
        self::assertSame('', $uri->fragment());
    }

    public function testImmutability(): void
    {
        $uri = Uri::of();

        self::assertNotSame($uri, $uri->withScheme('https'));
        self::assertNotSame($uri, $uri->withUserInfo('user'));
        self::assertNotSame($uri, $uri->withUserAndPassword('user', 'pass'));
        self::assertNotSame($uri, $uri->withHost('example.com'));
        self::assertNotSame($uri, $uri->withPort(8080));
        self::assertNotSame($uri, $uri->withPath('/path/123'));
        self::assertNotSame($uri, $uri->withQuery('q=abc'));
        self::assertNotSame($uri, $uri->withFragment('test'));
    }

    public function testUtf8Host(): void
    {
        $uri = Uri::of('http://ουτοπία.δπθ.gr/');
        self::assertSame('ουτοπία.δπθ.gr', $uri->host());
        $new = $uri->withHost('程式设计.com');
        self::assertSame('程式设计.com', $new->host());

        $testDomain = 'παράδειγμα.δοκιμή';
        $uri = (Uri::of())->withHost($testDomain);
        self::assertSame($testDomain, $uri->host());
        self::assertSame('//' . $testDomain, (string) $uri);
    }
}
