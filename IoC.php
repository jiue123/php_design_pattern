<?php

class Title
{
    public function __construct()
    {
        echo "Title";
    }
}

class Author
{
    public function __construct()
    {
        echo "Author";
    }
}

class Book
{
    protected $title;
    protected $author;

    public function __construct()
    {
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }
}

class IoC
{
    protected static $registry = array();

    // Register
    public static function register($name, Closure $resolve)
    {
        static::$registry[$name] = $resolve;
    }

    // Resolve
    public static function resolve($name)
    {
        if (static::registered($name)) {
            $name = static::$registry[$name];

            return $name();
        }

        throw new Exception('Nothing registered with that name, fool.');
    }

    // Check resigtered or not
    public static function registered($name)
    {
        return array_key_exists($name, static::$registry);
    }
}

IoC::register('book', function () {
    $book = new Book;
    $book->setTitle(new Title);
    $book->setAuthor(new Author);

    return $book;
});

$book = IoC::resolve('book');