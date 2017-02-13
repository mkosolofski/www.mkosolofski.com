<?php

namespace MKosolofskiSite\FormBundle\Response;

class FormResponse
{
    /**
     * @JMS\Type("array")
     * @JMS\Accessor(getter="getRequestParams")
     */
    private $requestParams;

    /**
     * @JMS\Type("array<string,string>")
     * @JMS\Accessor(getter="getValidationErrors")
     */
    private $validationErrors = [];

    public function __construct(array $requestParams, ConstraintViolationList $constraintViolations)
    {
        $this->requestParams = $requestParams;
        $this->setValidationErrors($constraintViolations);
    }
    
    public function getRequestParams(): array
    {
        return $this->validationErrors;
    }

    public function getValidationErrors(): array
    {
        return $this->validationErrors;
    }

    private function setValidationErrors(ConstraintViolationList $constraintViolations)
    {
        foreach ($constraintViolations as $constraintViolation) {
            $this->validationErrors[$constraintViolation->getPropertyPath()] = $constraintViolation->getMessage();
        }
    }
}
