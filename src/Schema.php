<?php

namespace Werxe\LaravelAddress;

use Werxe\LaravelAddress\Contracts\Address;

class Schema
{
    /**
     * The address instance.
     *
     * @var \Werxe\LaravelAddress\Contracts\Address
     */
    protected $address;

    /**
     * Constructor.
     *
     * @param  \Werxe\LaravelAddress\Contracts\Address  $address
     * @return void
     */
    public function __construct(Address $address)
    {
        $this->address = $address;
    }

    public function generateProp($id, $value)
    {
        return "<span itemprop=\"{$id}\">{$value}</span>";
    }

    protected function generateNameProp()
    {
        return $this->generateProp('name', $this->address->name);
    }

    protected function generateStreetProp()
    {
        return $this->generateProp('streetAddress', $this->address->street);
    }

    protected function generateLocalityProp()
    {
        return $this->generateProp('addressLocality', $this->address->locality);
    }

    protected function generateRegionProp()
    {
        return $this->generateProp('addressRegion', $this->address->region);
    }

    protected function generatePostalCodeProp()
    {
        return $this->generateProp('postalCode', $this->address->postal_code);
    }

    protected function generateCountryProp()
    {
        return $this->generateProp('addressCountry', $this->address->country->name);
    }

    public function format()
    {
        $address = $this->address;

        $items = [
            $this->generateNameProp().'<br />',
            # $this->generateStreetProp().'<br />'
            $this->generateLocalityProp(),
            $this->generateRegionProp(),
            $this->generatePostalCodeProp().'<br />',
            $this->generateCountryProp(),
        ];

        // if ($address->post_office_box_number) {
        //     # this bit needs to be translated
        //     $items[] = 'P.O. Box ' . $this->generateProp('postOfficeBoxNumber', $address->post_office_box_number);
        // } else {
        //     $items[] = $this->generateStreetProp();
        // }

        return '<div itemscope itemtype="http://schema.org/PostalAddress">'."\n".implode("\n", $items)."\n".'</div>';
        /*

        <div itemscope itemtype="http://schema.org/PostalAddress">
            <span itemprop="name">Whitehouse</span><br>
            <span itemprop="streetAddress">1600 Pennsylvania Avenue NW</span><br>
            <span itemprop="addressLocality">Washington</span>,
            <span itemprop="addressRegion">DC</span>
            <span itemprop="postalCode">20500</span><br>
            <span itemprop="addressCountry">United States</span>
        </div>

        */
    }
}
