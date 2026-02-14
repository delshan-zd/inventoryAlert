<?php

namespace App;

enum TransactionType: string
{
    case IN = 'in';
    case OUT= 'out';

    public  function label():string {
        return match ($this)  {
            self::IN => 'stock in',
            self::OUT => 'stock out',
            default => throw new \Exception('Unexpected match value'),
        };
    }
}
