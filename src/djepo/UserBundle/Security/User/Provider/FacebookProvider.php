<?php

namespace djepo\UserBundle\Security\User\Provider;

use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use \BaseFacebook;
use \FacebookApiException;
use Facebook;

class FacebookProvider implements UserProviderInterface
{
    /**
     * @var \Facebook
     */
    protected $facebook;
    protected $userManager;
    protected $validator;

    public function __construct(BaseFacebook $facebook, $userManager, $validator)
    {
        Facebook::$CURL_OPTS[CURLOPT_SSL_VERIFYPEER] = false;
        Facebook::$CURL_OPTS[CURLOPT_SSL_VERIFYHOST] = 2;
        
        $this->facebook = $facebook;        
        $this->userManager = $userManager;
        $this->validator = $validator;    
    }

    public function supportsClass($class)
    {
        return $this->userManager->supportsClass($class);
    }

    public function findUserByFbId($fbId)
    {
        return $this->userManager->findUserBy(array('facebookId' => $fbId));
    }

    public function loadUserByUsername($username)
    {           
        $user = $this->findUserByFbId($username);
        
        try {
            $fbdata = $this->facebook->api('/me');            
        } catch (FacebookApiException $e) {            
            $fbdata = null;
        }

        if (!empty($fbdata)) {            
            $user_by_mail=$this->userManager->findUserBy(array('email'=>$fbdata['email']));
            
            if(!empty($user_by_mail))   //on se connecte avec fb, mais l'email est déjà présent dans la base (cas d'une personne déjà enregistrée auparavant)
            {
                //il va falloir mettre à jour ce user
                $user=$user_by_mail;              
            } elseif (empty($user)) 
            {    //si on a pas de user trouvé correspondant déjà à un user fb dans notre base (l'id facebook=un username de notre base de données)
                //on crée un nouveau user                
                $user = $this->userManager->createUser();
                $user->setEnabled(true);
                $user->setPassword('');                
            }

            // TODO use http://developers.facebook.com/docs/api/realtime            
            $user->setFBData($fbdata);            
            
            if (count($this->validator->validate($user, 'Facebook'))) {
                // TODO: the user was found obviously, but doesnt match our expectations, do something smart                
                throw new UsernameNotFoundException('The facebook user could not be stored');
            }
            $this->userManager->updateUser($user);            
        }

        if (empty($user)) {
            throw new UsernameNotFoundException('The user is not authenticated on facebook');
        }

        return $user;
    }

    public function refreshUser(UserInterface $user)
    {        
        if (!$this->supportsClass(get_class($user)) || !$user->getFacebookId()) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
        }

        return $this->loadUserByUsername($user->getFacebookId());
    }
}
