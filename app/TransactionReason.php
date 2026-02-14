<?php

namespace App;

enum TransactionReason: string
{

    case SHIPMENT='shipment';
    case RETURN='Return';
//    case DAMAGE='Damage';

    case SALE='sale';
    case DAMAGED='Damaged';
    case STOLEN='stolen';
    case EXPIRED='Expired';


    public function type()
    {
        return match ($this) {
            self::SHIPMENT , self::RETURN  => 'in',
            self::SALE , self::DAMAGED, self::STOLEN ,self::EXPIRED => 'out',
            default =>'other',
        };

    }


    public function label():string {
        return match ($this)  {
            self::SHIPMENT => 'New Shipment Received',
            self::RETURN   => 'Customer Return',
            self::SALE     => 'Product Sold',
            self::DAMAGED  => 'Damaged Goods',
            self::STOLEN   => 'Inventory Theft/Loss',
            self::EXPIRED  => 'Expired',

            default => 'other',
        };
    }
    public static function forType(string $type): array
    {
        $filteredReasons = [];

        // Look at every reason one by one
        foreach (self::cases() as $reason) {

            // If the reason's type (in or out) matches the one we want...
            if ($reason->type() === $type) {
                // ...add it to our new list!
                $filteredReasons[] = $reason;
            }
        }

        return $filteredReasons;
    }


}
