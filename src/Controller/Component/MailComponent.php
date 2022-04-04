<?php
declare(strict_types=1);

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;
use Cake\ORM\Entity;

/**
 * Image component
 * @property Entity
 */
class MailComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    protected $_mailer;

    public function initialize(array $config): void
    {
        parent::initialize($config);

        TransportFactory::setConfig('wilken', [
            'className' => 'Smtp',
            'host' => 'portal.wilkenproperties.com',
            'port' => 587,
            'timeout' => 30,
            'username' => 'contact@portal.wilkenproperties.com',
            'password' => 'Contact.2021',
        ]);

        TransportFactory::setConfig('gmail', [
            'className' => 'Smtp',
            'host' => 'smtp.gmail.com',
            'port' => 465,
            'auth' => true,
            'username' => 'testingcakephpdw@gmail.com',
            'password' => 'Test@Server1',
        ]);

        $this->_mailer = new Mailer();
    }

    public function contact($options = null)
    {
        $email = $options['email'];
        $name = $options['name'];
        $this->_mailer->setTransport('wilken');
        $this->_mailer->setFrom('contact@portal.wilkenproperties.com')
            ->setEmailFormat('html')
            ->setTo('contact@wilkenproperties.com', $name)
            //->setTo('weredouglas@gmail.com', $name)
            ->addTo($email)
            ->setSubject('Contact Us')
            ->viewBuilder()
            ->setTemplate('contact')
            ->setHelpers(['Html', 'Text']);
        $this->_mailer->setViewVars(['options' => $options]);
        $this->_mailer->setAttachments([
            'logo.png' => [
                'file' => 'img/logo.png',
                'mimetype' => 'image/png',
                'contentId' => 'unique-id'
            ]
        ]);
        $this->_mailer->deliver();
    }

    /**
     * @param null $options
     */
    public function agent($options = null)
    {
        $email = $options['agent_email'];
        $name = $options['name'];
        $subject = 'Agent Inquiry from:' . $options['email_address'] . ' Contact:' . $options['phone_number'];
        $this->_mailer->setTransport('wilken');
        $this->_mailer->setFrom( $options['email_address'])
            ->setEmailFormat('html')
            ->setTo($email, $name)
            ->addTo('weredouglas@gmail.com', $name)
            ->setSubject($subject)
            ->viewBuilder()
            ->setTemplate('contact')
            ->setHelpers(['Html', 'Text']);
        $this->_mailer->setViewVars(['options' => $options]);
        $this->_mailer->setAttachments([
            'logo.png' => [
                'file' => 'img/logo.png',
                'mimetype' => 'image/png',
                'contentId' => 'unique-id'
            ]
        ]);
        $this->_mailer->deliver();
    }

    /**
     * Process and upload and create thumbnail images with with of 600px
     *
     *
     * @param null $options
     * @param null $type
     * @return void of paths to original and new image file
     */
    public function receipt($options = null)
    {
        $saleOrder = $options['saleOrder'];
        $this->_mailer->setTransport('wilken');
        $this->_mailer->setFrom('errands@yo-errandz.com')
            ->setEmailFormat('html')
            ->setTo($saleOrder->user->email, $saleOrder->user->full_namel)
            ->addTo('errands@yo-errandz.com', 'Errandz Receipt')
            ->setSubject('Receipt')
            ->viewBuilder()
            ->setTemplate('receipt')
            ->setHelpers(['Html', 'Text']);
        $this->_mailer->setViewVars(['saleOrder' => $saleOrder]);
        $this->_mailer->setAttachments([
            'logo.png' => [
                'file' => 'img/logo.png',
                'mimetype' => 'image/png',
                'contentId' => 'unique-id'
            ]
        ]);
        $this->_mailer->deliver();
    }

    public function resetPassword($options = null)
    {
        $email = $options['user']['email'];
        $name = $options['user']['first_name'] . ' ' . $options['user']['last_name'];
        $this->_mailer->setTransport('wilken');
        $this->_mailer->setFrom('contact@wilkenproperties.com')
            ->setEmailFormat('html')
            ->setTo($email, $name)
            ->setSubject('Password reset')
            ->viewBuilder()
            ->setTemplate('password')
            ->setHelpers(['Html', 'Text']);
        $this->_mailer->setViewVars(['options' => $options]);
        $this->_mailer->setAttachments([
            'logo.png' => [
                'file' => 'img/logo.png',
                'mimetype' => 'image/png',
                'contentId' => 'unique-id'
            ]
        ]);
        $this->_mailer->deliver();
    }

    public function register($options = null)
    {
        $email = $options['user']['email'];
        $name = $options['user']['first_name'] . ' ' . $options['user']['last_name'];
        $this->_mailer->setTransport('errandz');
        $this->_mailer->setFrom('errands@yo-errandz.com')
            ->setEmailFormat('html')
            ->setTo($email, $name)
            ->setSubject('New Customer')
            ->viewBuilder()
            ->setTemplate('register')
            ->setHelpers(['Html', 'Text']);
        $this->_mailer->setViewVars(['options' => $options]);
        $this->_mailer->setAttachments([
            'logo.png' => [
                'file' => 'img/logo.png',
                'mimetype' => 'image/png',
                'contentId' => 'unique-id'
            ]
        ]);
        $this->_mailer->deliver();
    }

}
