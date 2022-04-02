<?php

namespace CarInsurance\ViewHelpers;

class CoverTypeViewHelper
{
    public static function generateCoverTypeDropdown(array $coverTypes): string
    {
        $result = '';
        foreach ($coverTypes as $coverType) {
            $result .= '<option value="' . $coverType['id'] . '">' . $coverType['name'] . '</option>';
        }
        return $result;
    }

}
