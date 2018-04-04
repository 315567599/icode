In a language that supports the Elvis operator, something like this:

x = f() ?: g()
will set x equal to the result of f() if that result is a true value, and to the result of g() otherwise.

It is equivalent to this:

x = f() ? f() : g()
except that it does not evaluate the f() twice if it is true.

--------------------------
<?php

$boxContents = 'jiangchao';
$s = <<<EOT
<div class="mw-some-class">
    $boxContents
    </div>
EOT;

echo $s;
?>
------------------------
It quickly becomes impossible to remember the order of parameters, and you will inevitably end up having to hardcode all the defaults in callers just to customise a parameter at the end of the list. If you are tempted to code a function like this, consider passing an associative array of named parameters instead.

In general, using boolean parameters is discouraged in functions. In $object->getSomething( $input, true, true, false ), without looking up the documentation for MyClass::getSomething(), it is impossible to know what those parameters are meant to indicate. Much better is to either use class constants, and make a generic flag parameter:

$myResult = MyClass::getSomething( $input, MyClass::FROM_DB | MyClass::PUBLIC_ONLY );
Or to make your function accept an array of named parameters:

$myResult = MyClass::getSomething( $input, [ 'fromDB', 'publicOnly' ] );
-----------------------------
Use elseif not else if. They have subtly different meanings:

// This:
if ( $foo == 'bar' ) {
    echo 'Hello world';
} else if ( $foo == 'Bar' ) {
    echo 'Hello world';
} else if ( $baz == $foo ) {
    echo 'Hello baz';
} else {
    echo 'Eh?';
}

// Is actually equivalent to:
if ( $foo == 'bar' ) {
    echo 'Hello world';
} else {
    if ( $foo == 'Bar' ) {
        echo 'Hello world';
    } else {
        if ( $baz == $foo ) {
            echo 'Hello baz';
        } else {
            echo 'Eh?';
        }
    }
}
And the latter has poorer performance.
------------------------------------
empty()[edit]
The empty() function should only be used when you want to suppress errors. Otherwise just use ! (boolean conversion).

empty( $var ) essentially does !isset( $var ) || !$var.
Beware of boolean conversion pitfalls.
It suppresses errors about undefined properties and variables. If only intending to test for undefined, use !isset(). If only intending to test for "empty" values (e.g. false, zero, empty array, etc.), use !.
isset()[edit]
Do not use isset() to test for null. Using isset() in this situation could introduce errors by hiding misspelled variable names. Instead, use $var === null.

Boolean conversion[edit]
if ( !$var ) {
 ...
}
Study the rules for conversion to boolean. Be careful when converting strings to boolean.
Do not use it to test if a string is empty, because PHP considers '0' and similar expressions to be falsy. Use === '' instead.
-----------------------------------
When working in a pure PHP environment, remove any trailing ?> tags. These tags often cause issues with trailing white-space and "headers already sent" error messages (cf. bugzilla:17642 and http://news.php.net/php.general/280796).
----------------------------------
Be careful with double-equals comparison operators. Triple-equals (===) is generally more intuitive and should be preferred unless you have a reason to use double-equals (==).

'foo' == 0 is true (!)
'000' == '0' is true (!)
'000' === '0' is false
To check if two scalars that are supposed to be numeric are equal, use ==, e.g. 5 == "5" is true.
To check if two variables are both of type 'string' and are the same sequence of characters, use ===, e.g. "1.e6" === "1.0e6" is false.
To check if two scalars that should be treated as strings are equal as strings, use strcmp(), e.g. strcmp(13,"13") is 0.
----------------------------------
class Foo {

    /**
     * @var array $bar: Description here
     * @example array( 'foo' => Bar, 'quux' => Bar, .. )
     */
    protected $bar;

    /**
     * Description here, following by documentation of the parameters.
     *
     * Some example:
     * @code
     * ...
     * @endcode
     *
     * @since 1.24
     * @param FooContext $context context for decoding Foos
     * @param array|string $options Optionally pass extra options. Either a string
     *  or an array of strings.
     * @return Foo|null New instance of Foo or null of quuxification failed.
     */
    public function makeQuuxificatedFoo( FooContext $context = null, $options = array() ) {
        /* .. */
    }

}

/**
     * Some explanation about the variable
     *
     * @var string $msg
     */
    protected $msg;

---------------------------------------
Edit tokens are used as an additional security measure when performing changes. If the user identity were checked using cookies only, an external site could use a link like the following one to have visitors perform changes to the wiki. http://en.wikipedia.org/w/index.php?title=Image:Abcd.jpg&action=delete&oldimage=324242234 Following such a link would lead an administrator to unknowingly request deletion of an image. If the administrator is still logged in, the server would check the cookies and grant the request.

For this reason, actions that perform changes require an additional piece of data that is passed as an HTTP parameter, the edit token. An edit token is embedded into web pages from which the user can request a change; this includes the edit form (where one can change a page by pressing "Save your changes") but also the image description pages (where an administrator can request deletion of an old version of an image), contributor histories (where administrators can rollback), etc.
------------------------------------------
# ensure that the script can't be executed outside of MediaWiki
if ( !defined( 'MEDIAWIKI' ) ) {
    die( 'Not a valid entry point.' );
}
----------------------------------------------
Output (API, CSS, JavaScript, HTML, XML, etc.)[edit]
Any content that MediaWiki generates can be a vector for XSS attacks.
used the Html and Xml helper classes?
# rawElement() escapes all attribute values 
# (which, in this case, is provided by $myClass)
echo Html::rawElement( 'p', array( 'class' => $myClass  ) );
----------------------------------------------------



