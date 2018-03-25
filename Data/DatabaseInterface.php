<?php


namespace App\Data;


interface DatabaseInterface
{
    public function prepare($sql): DatabaseStatementInterface;

    public function lastId();

    public function errorInfo();
}