<?php 

namespace EntraSolutions\Helloworld;


class HelloworldResponseInjector{

    public function dohelloStuff()
    {
        return function () {
            $string = config('helloworld.string');
            $ascii = "<!-- {$string} -->\n";
            $this->content = $ascii . $this->content;
        };
    }
}