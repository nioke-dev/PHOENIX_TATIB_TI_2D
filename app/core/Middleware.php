<?php

class Middleware
{
    protected $next;

    public function setNext($next)
    {
        $this->next = $next;
    }

    public function next()
    {
        if ($this->next) {
            $this->next->handle();
        }
    }

    public function handle()
    {
        // Logika middleware akan ditulis di sini oleh kelas turunan
    }
}
