<?php

require_once MODX_CORE_PATH . 'components/ms2form/model/ms2form/ms2form.class.php';


class addObject extends ms2form
{
    /* @var modX $modx */
    public $modx;
    /* @var pdoTools $pdoTools */
    public $pdoTools;
    public $mediaSource;
    public $initialized   = array();
    public $authenticated = true;
    public $permission    = null;
    protected $types = [
        'ru' => [
            'с лебедкой',
            'со сдвижной платформой',
            'с гидроманипулятором',
            'с частичной погрузкой',
            'с полной погрузкой',
            'грузовой'
        ],
        'ua' => [
            'з лебідкою',
            'зі зсувною платформою',
            'з гідроманіпулятором',
            'з частковим завантаженням',
            'с повним завантаженням',
            'вантажний'
        ],
    ];

    /**
     * @param modX  $modx
     * @param array $config
     */
    function __construct(modX &$modx, array $config = array())
    {
        $this->modx          =& $modx;
        $config['source']    = 6;
        $this->config        = $config;
        $this->authenticated = true;
    }

    /**
     * Initializes component into different contexts.
     *
     * @param string $ctx The context to load. Defaults to web.
     *
     * @return array
     */
    public function initialize($ctx = 'web')
    {
        if (!$this->pdoTools) {
            $this->loadPdoTools();
        }
        $this->pdoTools->setConfig($this->config);

        $this->config['ctx'] = $ctx;
        $this->initializeMediaSource($this->config['ctx']);

        if (!empty($this->initialized[$ctx]) or ($ctx == 'mgr') or (MODX_API_MODE)) {
            return $this->config;
        }
        $this->initialized[$ctx] = true;
        return $this->config;
    }

    /**
     * This method returns an error
     *
     * @param string $message      A lexicon key for error message
     * @param array  $data         .Additional data, for example cart status
     * @param array  $placeholders Array with placeholders for lexicon entry
     *
     * @return array|string $response
     */
    public function error($message = '', $data = array(), $placeholders = array())
    {
        header('HTTP/1.1 400 Bad Request');
        $messageTranslation = $this->modx->lexicon($message, $placeholders);
        if ($messageTranslation) {
            $message = $messageTranslation;
        }
        $response = array(
            'success'   => false
            , 'message' => $message
            , 'data'    => $data
        );
        $this->modx->log(modX::LOG_LEVEL_ERROR, $message);
        return $this->config['json_response']
            ? $this->modx->toJSON($response)
            : $response;
    }
    
    public function sendError($message = '', $data = array(), $placeholders = array())
    {
        $response = array(
          'success' => false
        , 'message' => $this->modx->lexicon($message, $placeholders)
        , 'data' => $data
        );
        return $this->config['json_response']
          ? $this->modx->toJSON($response)
          : $response;
    }


    public function getCityList($areaId)
    {
        $pdoFetch = $this->modx->getService('pdoFetch');
        $data     = $pdoFetch->getCollection('modResource', ['parent' => $areaId, 'template' => 3]);
        return $data;
    }


    public function createOrder($data)
    {
        $modx = $this->modx;
        if ($data['month']) {
            $modx->addPackage('evacme', $modx->getOption('core_path') . 'components/evacme/' . 'model/');
            $subtotal = 0;
            $oinfo    = array();
            $eid      = $data['id'];
            $mon      = $data['month'];

            $evac = $modx->getObject('msProduct', array('id' => $eid));
            if ($evac) {

                switch($mon) {
                    case 1:
                        $subtotal = 149;
                        break;
                    case 3:
                        $subtotal = 417;
                        break;
                    case 6:
                        $subtotal = 774;
                        break;
                    default:
                        $subtotal = $mon * 149;
                        break;
                }
                $vipuntil = $evac->toArray()['vipuntil'];

                if (empty($vipuntil)) {
                    $vipuntil = time();
                } else {
                    $vipuntil = strtotime($vipuntil);
                }

                $vipuntil = $vipuntil + 2592000 * $mon;
                //create record in session
                $oinfo[] = array(
                    'eid'      => $evac->id,
                    'etitle'   => $evac->pagetitle,
                    'cost'     => $subtotal,
                    'period'   => $mon,
                    'vipuntil' => date('Y-m-d H:i:s', $vipuntil)
                );
                
            }

            

            if ($subtotal) {
                $order = $modx->newObject('Invoice');
                $order->fromArray(array(
                    'createdon' => date('Y-m-d H:i:s'),
                    'createdby' => $modx->user->id,
                    'subtotal'  => $subtotal,
                    'status'    => 0,
                    'data'      => serialize($oinfo)
                ));
                if($order->save()) {

                  $formPay = $modx->runSnippet('getFormLiqpay', ['orderId' => $order->get('id'), 'price' => $order->get('subtotal'), 'oinfo' => $oinfo]);
                  return $this->success('Ordre create success', ['id' => $order->id, 'form' => $formPay]);
                }
                
            }

        }


        return $this->error('Order create error', []);
    }
    
    public function createOrderByBalance($data)
    {
        $modx = $this->modx;
        if ($data['month']) {
            $modx->addPackage('evacme', $modx->getOption('core_path') . 'components/evacme/' . 'model/');
            $subtotal = 0;
            $oinfo    = array();
            $eid      = $data['id'];
            $mon      = $data['month'];

            $evac = $modx->getObject('msProduct', array('id' => $eid));
            if ($evac) {

                switch($mon) {
                    case 1:
                        $subtotal = 149;
                        break;
                    case 3:
                        $subtotal = 417;
                        break;
                    case 6:
                        $subtotal = 774;
                        break;
                    default:
                        $subtotal = $mon * 149;
                        break;
                }

                $profile = $modx->user->getOne('Profile');
                $extended = $profile->get('extended');
                
                if ((int) $extended['balance'] < (int) $subtotal) {
                    return $this->sendError('Insufficient funds', ['type' => 'balance']);
                }
                
                $extended['balance'] = (int) $extended['balance'] - $subtotal; 
                $profile->set('extended', $extended);
                $profile->save();
                
                $vipuntil = $evac->toArray()['vipuntil'];

                if (empty($vipuntil)) {
                    $vipuntil = time();
                } else {
                    $vipuntil = strtotime($vipuntil);
                }

                $vipuntil = $vipuntil + 2592000 * $mon;
                //create record in session
                $oinfo[] = array(
                    'eid'      => $evac->id,
                    'etitle'   => $evac->pagetitle,
                    'cost'     => $subtotal,
                    'period'   => $mon,
                    'vipuntil' => date('Y-m-d H:i:s', $vipuntil),
                    'type'     => 'advertising',
                );
                
            }

            if ($subtotal) {
                $order = $modx->newObject('Invoice');
                $order->fromArray(array(
                    'createdon' => date('Y-m-d H:i:s'),
                    'createdby' => $modx->user->id,
                    'subtotal'  => $subtotal,
                    'status'    => 1,
                    'data'      => serialize($oinfo)
                ));
                
                if($order->save()) {
					$evac->set('vipuntil', $vipuntil);
					$evac->set('is_vip', 1);
                    if (!$evac->save()) {
                        return $this->error('Error to save', ['id' => $order->id]);
                    }
                    return $this->success('Ordre create success', [
                        'id' => $order->id,
                        'type' => 'redirect',
                        'link' => $modx->makeUrl(3921)
                    ]);
                }
                
            }

        }


        return $this->error('Order create error', []);
    }
    
    public function createOrderRefill($data)
    {
        $modx = $this->modx;
        if ($data['price']) {
            $modx->addPackage('evacme', $modx->getOption('core_path') . 'components/evacme/' . 'model/');
            
            $order = $modx->newObject('Invoice');
            $order->fromArray(array(
                'createdon' => date('Y-m-d H:i:s'),
                'createdby' => $modx->user->id,
                'subtotal'  => $data['price'],
                'status'    => 0,
                'data'      => serialize(['type' => 'refill'])
            ));
            if($order->save()) {
              $formPay = $modx->runSnippet('getFormLiqpayRefill', ['orderId' => $order->get('id'), 'price' => $order->get('subtotal')]);
              return $this->success('Ordre refill create success', ['id' => $order->id, 'form' => $formPay]);
            }

        }


        return $this->error('Order create error', []);
    }


    /**
     * Create Product through processor and redirect
     *
     * @param array $data section, pagetitle, text, etc
     * @param array $properties
     *
     * @return array
     */
    public function productSave(array $data, array $properties, $update)
    {
        $modx = $this->modx;

        $data['template']     = 4;
        $data['show_in_tree'] = 1;
        $data['editedon']     = time();

        $data['area']         = $modx->getObject('modResource', $data['parent2'])->pagetitle;
        $data['city']         = $modx->getObject('modResource', $data['parent'])->pagetitle;
        $data['etype']        = $this->getTypeEvac($data['etype']);
        $data['content']      = preg_replace("#<a href=[^>]*(.*?)<\/a>#is", "\$1", $data['content']);
        $data['phone']        = preg_replace('/[^0-9\+]/','', $data['phone']);
        $data['phone_2']      = preg_replace('/[^0-9\+]/','', $data['phone_2']);
        $data['phone_3']      = preg_replace('/[^0-9\+]/','', $data['phone_3']);

        $data['class_key'] = 'msProduct';
        if ($update) {
            $response = $this->modx->runProcessor('resource/update', $data);
        } else {
            $data['createdon']    = time();
            $data['publishedon']  = time();
            $data['createdby']    = $modx->user->id;
            $data['publishedby']  = $modx->user->id;
            $response = $this->modx->runProcessor('resource/create', $data);
        }


        if (!$response->isError()) {

            $id  = $response->response['object']['id'];
            $res = $modx->getObject('modResource', $id);

            $res->createdon   = time();
            $res->editedon    = time();
            $res->publishedon = time();
            $res->createdby   = $modx->user->id;
            $res->save();
            if ($update) {
                $lang              = $modx->getObject('PolylangContent', ['content_id' => $id, 'culture_key' => 'ua']);
            } else {
                $lang              = $modx->newObject('PolylangContent');
            }
            if(!$lang) {
               $lang = $modx->newObject('PolylangContent'); 
            }
            $lang->content_id  = $id;
            $lang->culture_key = 'ua';
            $lang->content     = $data['content'];
            $lang->pagetitle   = $data['pagetitle'];
            $lang->active      = 1;
            $lang->save();

        } else {
            $message = $response->getMessage();
            if (empty($message)) {
                $message = $this->modx->lexicon('ms2form_err_form');
            }
            $tmp    = $response->getFieldErrors();
            $errors = array();
            foreach ($tmp as $v) {
                $errors[$v->field] = $v->message;
            }

            return $this->error($message, $errors);
        }

        $successData    = array(['id' => $response->response['object']['id']]);
        $successMessage = 'ms2form_published';
        $this->sendMailAdmin($response->response['object']['id'], $update);


        return $this->success($successMessage, $successData);
    }

    public function productDisable($data)
    {
        
        if(!$model = $this->modx->getObject('msProduct', $data['id'])) {
            return $this->error('Evac not found', []);
        }

            if (!$user = $this->modx->getUser('web', true)) {
            return $this->error('Not login', []);
        }

        if($model->createdby != $user->id) {
            return $this->error('Evac not found', []);
        }

        $model->hidemenu = 1;
        $model->save();

        $successData    = ['id' => $model->id];
        $successMessage = 'Evac disabled';

        return $this->success($successMessage, $successData);
    }

    public function productEnable($data)
    {
        
        if(!$model = $this->modx->getObject('msProduct', $data['id'])) {
            return $this->error('Evac not found', []);
        }
        
        if (!$user = $this->modx->getUser('web', true)) {
            return $this->error('Not login', []);
        }

        if($model->createdby != $user->id) {
            return $this->error('Evac not found', []);
        }

        $model->hidemenu = 0;
        $model->save();

        $successData    = ['id' => $model->id];
        $successMessage = 'Evac enable';

        return $this->success($successMessage, $successData);
    }

    /**
     * Upload file for msproduct
     *
     * @param $data
     *
     * @return array|string
     */
    public function fileUpload($data)
    {

        $data['rank']   = null;
        $data['source'] = 6;
        foreach ($_FILES as $key => $file) {
            $data['file'] = $file;
            $data['name'] = $file['name'];
            /* @var modProcessorResponse $response */
            $response = $this->modx->runProcessor('web/gallery/upload', $data, array('processors_path' => MODX_CORE_PATH . 'components/ms2form/processors/'));

            if ($response->isError()) {
                return $this->error($response->getMessage());
            }
        }

        return $this->success("ok", $response->response['object']['id']);
    }

    /**
     * Delete file for msproduct
     *
     * @param $data
     *
     * @return array|string
     */
    public function deleteFile($data)
    {
        /* @var modProcessorResponse $response */
        $response = $this->modx->runProcessor('web/gallery/delete', $data, array('processors_path' => MODX_CORE_PATH . 'components/ms2form/processors/'));

        if ($response->isError()) {
            return $this->error($response->getMessage());
        }


        return $this->success("ok");
    }

    /**
     * @param $uid
     * @param $subject
     * @param $body
     *
     * @return bool|string
     */
    public function sendMailAdmin($id, $new)
    {
        $model = $this->modx->getObject('modResource', $id);
        /* @var modPHPMailer $mail */
        $mail = $this->modx->getService('mail', 'mail.modPHPMailer');
        $sbj = !$new ? 'Добавлен новый эвакуатор ' . $model->pagetitle : 'Отредактирован эвакуатор ' . $model->pagetitle;
        $message = $sbj . '. <br>Просмотреть объявление - <a href="'.$this->modx->makeUrl($id, '', '', 'full').'">'.$model->pagetitle.'</a>' ;
        $message .= '<br><a href="https://evacme.com.ua/manager/?a=resource/update&id='.$id.'">В админку</a>';

        $mail->set(modMail::MAIL_BODY, $message);
        $mail->set(modMail::MAIL_FROM, 'no-reply@evacme.com.ua');
        $mail->set(modMail::MAIL_FROM_NAME, 'Evacme');
        $mail->set(modMail::MAIL_SUBJECT, $sbj);
        $mail->address('to', 'spetsekspress@gmail.com');
        $mail->setHTML(true);

        if (!$mail->send()) {
            $this->modx->log(modX::LOG_LEVEL_ERROR,'An error occurred while trying to send the email: '.$this->modx->mail->mailer->ErrorInfo);
        }
        $mail->reset();
        $this->modx->cacheManager->refresh();
        return true;

    }

    protected function getTypeEvac($index, $lang = 'ru')
    {
        return $this->types[$lang][$index];
    }


}
