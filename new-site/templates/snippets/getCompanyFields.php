<?php
$company = $modx->getObject('UserCompany', ['user_id' => $modx->getUser()->id]);
if ($company) {
    $hook->setValues(array(
        'company_logo_path'   => $company->logo,
        'company_image_path'  => $company->image,
        'company_title'       => $company->title,
        'company_city'        => $company->city,
        'company_address'     => $company->address,
        'company_phone'       => $company->phone,
        'company_site'        => $company->site,
        'company_description' => $company->description,
        'company_alias'       => $company->alias,
    ));  
}

return true;