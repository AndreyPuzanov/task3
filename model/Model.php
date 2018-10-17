<?php

interface Model 
{
    public function load($sql, $params = []);

    public function save($sql, $params = []);

    // public function validate();
}