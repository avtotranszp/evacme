<?php
if (!preg_match('/^[a-z0-9-]+$/', $value)) {
    $validator->addError($key, $modx->lexicon('formit.alias_error'));
    return false;
}

if ($modx->getCount('UserCompany', ['alias' => $value, 'user_id:!=' => $modx->getUser()->id]) > 0) {
    $validator->addError($key, $modx->lexicon('formit.alias_not_unique'));
    return false;
}
return true;