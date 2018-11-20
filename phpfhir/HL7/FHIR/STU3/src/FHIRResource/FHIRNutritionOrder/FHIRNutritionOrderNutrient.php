<?php namespace HL7\FHIR\STU3\FHIRResource\FHIRNutritionOrder;

/*!
 * This class was generated with the PHPFHIR library (https://github.com/dcarbone/php-fhir) using
 * class definitions from HL7 FHIR (https://www.hl7.org/fhir/)
 * 
 * Class creation date: February 10th, 2018
 */

use HL7\FHIR\STU3\FHIRElement\FHIRBackboneElement;

/**
 * A request to supply a diet, formula feeding (enteral) or oral nutritional supplement to a patient/resident.
 */
class FHIRNutritionOrderNutrient extends FHIRBackboneElement implements \JsonSerializable
{
    /**
     * The nutrient that is being modified such as carbohydrate or sodium.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRCodeableConcept
     */
    public $modifier = null;

    /**
     * The quantity of the specified nutrient to include in diet.
     * @var \HL7\FHIR\STU3\FHIRElement\FHIRQuantity
     */
    public $amount = null;

    /**
     * @var string
     */
    private $_fhirElementName = 'NutritionOrder.Nutrient';

    /**
     * The nutrient that is being modified such as carbohydrate or sodium.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRCodeableConcept
     */
    public function getModifier()
    {
        return $this->modifier;
    }

    /**
     * The nutrient that is being modified such as carbohydrate or sodium.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRCodeableConcept $modifier
     * @return $this
     */
    public function setModifier($modifier)
    {
        $this->modifier = $modifier;
        return $this;
    }

    /**
     * The quantity of the specified nutrient to include in diet.
     * @return \HL7\FHIR\STU3\FHIRElement\FHIRQuantity
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * The quantity of the specified nutrient to include in diet.
     * @param \HL7\FHIR\STU3\FHIRElement\FHIRQuantity $amount
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return string
     */
    public function get_fhirElementName()
    {
        return $this->_fhirElementName;
    }

    /**
     * @param mixed $data
     */
    public function __construct($data = [])
    {
        if (is_array($data)) {
            if (isset($data['modifier'])) {
                $this->setModifier($data['modifier']);
            }
            if (isset($data['amount'])) {
                $this->setAmount($data['amount']);
            }
        } else if (null !== $data) {
            throw new \InvalidArgumentException('$data expected to be array of values, saw "'.gettype($data).'"');
        }
        parent::__construct($data);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->get_fhirElementName();
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $json = parent::jsonSerialize();
        if (isset($this->modifier)) {
            $json['modifier'] = $this->modifier;
        }
        if (isset($this->amount)) {
            $json['amount'] = $this->amount;
        }
        return $json;
    }

    /**
     * @param boolean $returnSXE
     * @param \SimpleXMLElement $sxe
     * @return string|\SimpleXMLElement
     */
    public function xmlSerialize($returnSXE = false, $sxe = null)
    {
        if (null === $sxe) {
            $sxe = new \SimpleXMLElement('<NutritionOrderNutrient xmlns="https://hl7.org/fhir"></NutritionOrderNutrient>');
        }
        parent::xmlSerialize(true, $sxe);
        if (isset($this->modifier)) {
            $this->modifier->xmlSerialize(true, $sxe->addChild('modifier'));
        }
        if (isset($this->amount)) {
            $this->amount->xmlSerialize(true, $sxe->addChild('amount'));
        }
        if ($returnSXE) {
            return $sxe;
        }
        return $sxe->saveXML();
    }
}
