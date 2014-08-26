PHP-Collection
==============

PHP-Collection is an easy to use library for handling sets of data with support
for filtering, sorting and reducing the data sets.

The class Collection extends [PHP's][php] [ArrayObject][php-arrayobject] and so
brings a little extra to the table.


Installation
------------

You can just clone the repository and use it as you see fit or use
[Composer][composer] and handle the dependency management very efficiently.

### Composer

Append the following line to the [require-key][composer-require-key] of your
*composer.json* file.

    "fschaechter/php-collection": "1.0.0"


Issues and bugs
---------------

You can report bugs, problems and other issues [here][issues]. Every useful
bit is very much appreciated.


Tutorial
--------

First you need a some data and create a collection.

    <?php
    $data = array(
        "Apple",
        "Apple,"
        "Pear",
        "Been",
        "Pear",
        "Strawberry",
    );
    $collection = new \Collection\Collection($data);

Append some more data.

    <?php
    $collection->append("Been");
    $collection[] = "Pear";

Now you can just iterate over the data.

    <?php
    echo sprinft(
        "We have %s items." . PHP_EOL,
        count($collection)
    );

    foreach ($collection as $item) {
        echo $item . PHP_EOL;
    }

It would be nice if the collection is sorted.

    <?php
    $comparator = new \Collection\Sorter\Comparator\String();
    $sorter = new \Collection\Sorter\Uasort($comparator);
    $collection->sort($sorter);

    foreach ($collection as $item) {
        echo $item . PHP_EOL;
    }

We don't like apples.

    <?php
    $filter = new \Collection\Filter\Unequal("Apple");
    $collection = $collection->filter($filter);

    foreach ($collection as $item) {
        echo $item . PHP_EOL;
    }

Let's distill the items.

    <?php
    $reducer = new \Collection\Reducer\Distinct();
    $collection = $collection->reduce($reducer);

    foreach ($collection as $item) {
        echo $item . PHP_EOL;
    }


### More examples

Take a look at the *examples* directory, there you will find three example of
how to play with a collection.

* Look at *example_filter.php* to see the filter system in action.
* Look at *example_reduce.php* to see how a reducer melts away unwanted data.
* Look at *example_sort.php* to see how you can sort a collection of objects.


Quality?
--------

This library is developed under the principles of [TDD][wikipedia-tdd]. You can
find all the tests within the *tests* directory. Check for yourself using
[PHPUnit][phpunit].

    $ bin/phpunit

[Apache Ant][apache-ant] is used for the complete build process. See *build.xml*,
the file is based on the one you can find in [PHPUnit's github.com repo][phpunit-github].

    $ ant

And [Travis-CI][travis-ci] makes sure its tested over and over again.


Tips and tricks
----------------

### Enhance the PATH

All commands are installed to the *bin* directory by Composer. Add this directory
to the environment path and there are easy accessible.

Here's an example for BASH, add the line to the ~/.bashrc.

    PATH="./bin:$PATH"

Now it is very simple to run the unit tests.

    $ phpunit

Instead of

    $ bin/phpunit

So much more productivity gained.


Why?
----

I come across a lot of data in form of list almost daily and i need an easy, testable
and pragmatic way to extract information of these lists.


License
-------

This library is licensed under the terms of the GNU General Public License v3.


[php]: https://php.net "PHP"
[php-arrayobject]: https://php.net/manual/en/class.arrayobject.php "PHP's manual entry for ArrayObject"
[composer]: https://getcomposer.org "Composer"
[composer-require-key]: https://getcomposer.org/doc/01-basic-usage.md#the-require-key
[issues]: https://github.com/fschaechter/php-collection/issues
[phpunit]: https://phpunit.de "PHPUnit"
[phpunit-github]: https://github.com/sebastianbergmann/phpunit
[wikipedia-tdd]: https://en.wikipedia.org/wiki/Test-driven_development "Test-driven development"
[travis-ci]: https://travis-ci.org "Travis CI"
[apache-ant]: https://ant.apache.org "Apache Ant"