<?php
$result = $modx->runSnippet('Register', $scriptProperties);
foreach($modx->placeholders as $key => $ph){
    if(strpos($key, $scriptProperties['placeholderPrefix'].'error.') === 0) $placeholders[$key] = $ph;
}
if($modx->getPlaceholder($scriptProperties['placeholderPrefix'].'validation_error')) return $AjaxForm->error('Form has errors', array('error' => $placeholders));
else return $AjaxForm->success('Form is valid');