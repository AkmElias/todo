<?php

namespace Elias\Todo;

interface respondToDatabaseConnection{
    public function successResponseToDatabaseConnection();
    public function failedResponseToDatabaseConnection();
}