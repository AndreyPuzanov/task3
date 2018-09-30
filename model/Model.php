<?php

interface Model 
{
    public function load($sql, $params = []);

    public function save();

    public function validate();
}