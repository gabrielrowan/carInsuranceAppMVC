<?php

namespace CarInsurance\ViewHelpers;

class CarTypeViewHelper
{
    public static function generateCarTypeDropdown(array $carTypes): string
    {
        $result = '';
        foreach ($carTypes as $carType) {
            
            $result .= '<option value="' . $carType['id'] . '">' . $carType['type'] . '</option>';
        }
        return $result;
    }

}