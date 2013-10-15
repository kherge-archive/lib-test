<?php

namespace Phine\Test\Test;

class B extends A
{
    protected $b = 'b';

    protected function b($one, $two)
    {
        return "b$one$two";
    }
}
