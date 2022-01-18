<?php

namespace Elias\Todo\DB;

interface respondToDatabaseConnection{
    public function successResponse();
    public function failedResponse();
}