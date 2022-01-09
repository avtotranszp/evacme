<?php
$company = $modx->getObject('UserCompany', ['user_id' => $modx->getUser()->id]);
if (!$company) {
    $company = $modx->newObject('UserCompany');
}
$company->fromArray([
    'user_id' => $modx->getUser()->id,
    'logo' => $hook->getValue('company_logo_path'),
    'image' => $hook->getValue('company_image_path'),
    'title' => $hook->getValue('company_title'),
    'city' => $hook->getValue('company_city'),
    'address' => $hook->getValue('company_address'),
    'phone' => $hook->getValue('company_phone'),
    'site'=> $hook->getValue('company_site'),
    'description' => $hook->getValue('company_description'),
    'alias' => $hook->getValue('company_alias'),
]);

if ($company->save()) {
    return true;   
}

return false;