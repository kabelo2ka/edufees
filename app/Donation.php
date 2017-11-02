<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\DecimalMoneyFormatter;
use Money\Money;
use Money\Parser\DecimalMoneyParser;

/**
 * @property mixed $reduction_rate
 * @property mixed $net_amount
 * @property mixed $amount_reduced
 * @property mixed $attributes
 * @property mixed $reduced_amount
 */
class Donation extends Model
{
    /**
     * Reduction Rate in percentages
     *
     * @var int
     */
    protected $reduction_rate = 10;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    /**
     * The table associated with the model.
     *
     * @var string
     */
    // protected $table = 'donations';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    // protected $primaryKey = 'id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    // public $timestamps = false;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    // protected $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['gross_amount', 'comment'];

    /**
     * The attributes that should be hidden for arrays
     *
     * @var array
     */
    // protected $hidden = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */


    /**
     * Calculate the reduced amount
     *
     * @param string $gross_amount
     * @return string
     * @throws \InvalidArgumentException
     * @throws \Money\Exception\ParserException
     */
    public function getReducedAmount($gross_amount): string
    {
        $amount = $this->parseMoney($gross_amount)->multiply($this->reduction_rate / 100)
            ->getAmount(); // eg. outputs 100099
        return $this->formatMoney($amount); // eg. outputs 1000.99
    }

    /**
     * Calculate the amount after deductions
     *
     * @param string $gross_amount
     * @return string
     * @throws \InvalidArgumentException
     * @throws \Money\Exception\ParserException
     */
    public function getNetAmount($gross_amount): string
    {
        $reduce_money = $this->parseMoney($this->getReducedAmount($gross_amount));
        $net_amount = $this->parseMoney($gross_amount)->subtract($reduce_money)->getAmount();
        return $this->formatMoney($net_amount);
    }

    /**
     * Parse Money amount string
     * Eg. '199.99' will be 19999
     *
     * @param string $amount
     * @return Money
     * @throws \Money\Exception\ParserException
     */
    protected function parseMoney($amount): Money
    {
        $currencies = new ISOCurrencies();
        $moneyParser = new DecimalMoneyParser($currencies);
        return $moneyParser->parse($amount, 'ZAR');
    }

    /**
     * @param integer $amount
     * @return string
     * @throws \InvalidArgumentException
     */
    public function formatMoney($amount): string
    {
        $money = new Money((integer)$amount, new Currency('ZAR'));
        $currencies = new ISOCurrencies();
        $moneyFormatter = new DecimalMoneyFormatter($currencies);
        return $moneyFormatter->format($money); // outputs 1.00
    }


    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    /**
     * Set Reduction Rate attribute
     */
    public function setReductionRateAttribute()
    {
        $this->attributes['reduction_rate'] = $this->reduction_rate;
    }

    /**
     * Set Amount Reduced attribute
     */
    public function setReducedAmountAttribute()
    {
        $this->attributes['reduced_amount'] = $this->formatMoney($this->getReducedAmount($this->attributes['gross_amount']));
    }

    /**
     * Set Net Amount attribute
     * @throws \InvalidArgumentException
     */
    public function setNetAmountAttribute()
    {
        $this->attributes['net_amount'] = $this->formatMoney(
            $this->getNetAmount($this->attributes['gross_amount'])
        );
    }

}
