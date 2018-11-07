<?php

interface Model 
{
    public function load(int $id);

    public function save($sql, $params = []);
    
    // public function validate();
}