<?php
namespace Multiservices\ArxisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\ParameterBag;
/**
* @ORM\Entity
* @ORM\HasLifecycleCallbacks
* @ORM\Table(name="usuarios")
*/
class Usuario implements UserInterface, \Serializable
{
    /**
    * @var integer $id
    *
    * @ORM\Column(name="id",type="integer",options={"unsigned"=true})
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="IDENTITY")
    */
    private $id;
    /**
    * @ORM\Column(type="string",length=255)
    */
    private $name;
    /**
    * @ORM\Column(type="string",length=255, nullable=true)
    */
    protected $path;
    /**
    * @ORM\Column(type="string",length=255)
    */
    protected $username;
    /**
    * @ORM\Column(name="password",type="string",length=255)
    */
    protected $password;
    /**
    * @ORM\Column(name="salt",type="string",length=255)
    */
    protected $salt;
    /**
    * @ORM\Column(name="mail",type="string",length=255)
    */
    /**
     * se utilizó user_roles para no hacer conflicto al aplicar ->toArray en getRoles()
     * @ORM\ManyToMany(targetEntity="Role")
     * @ORM\JoinTable(name="user_role",
     *     joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="role_id", referencedColumnName="id")}
     * )
     */
    protected $user_roles;
    
    
    private $mail = '';

    /**
     * @var string
     *
     * @ORM\Column(name="theme", type="string", length=255, nullable=false)
     */
    private $theme = '';

    /**
     * @var string
     *
     * @ORM\Column(name="signature", type="string", length=255, nullable=false)
     */
    private $signature = '';

    /**
     * @var string
     *
     * @ORM\Column(name="signature_format", type="string", length=255, nullable=true)
     */
    private $signatureFormat;

    /**
     * @var integer
     *
     * @ORM\Column(name="created", type="integer", nullable=false)
     */
    private $created;

    /**
     * @var integer
     *
     * @ORM\Column(name="access", type="integer", nullable=false)
     */
    private $access = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="login", type="integer", nullable=false)
     */
    private $login = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="timezone", type="string", length=32, nullable=true)
     */
    private $timezone;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=12, nullable=false)
     */
    private $language = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="picture", type="integer", nullable=false)
     */
    private $picture = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="init", type="string", length=254, nullable=true)
     */
    private $init = '';

    /**
     * @var string
     *
     * @ORM\Column(name="data", type="blob", nullable=true)
     */
    private $data;
    
   


    public function __construct()
    {
    $this->inbox= new \Doctrine\Common\Collections\ArrayCollection();
    $this->outbox= new \Doctrine\Common\Collections\ArrayCollection();
    $this->user_roles = new \Doctrine\Common\Collections\ArrayCollection();
    $this->addCreated();
    }
    /**
    * Get id
    *
    * @return integer
    */
    public function getId()
    {
    return $this->id;
    }
    /**
    * Set name
    *
    * @param string $name
    */
    public function setName($name)
    {
    $this->name = $name;
    }
    /**
    * Get name
    *
    * @return string
    */
    public function getName()
    {
    return $this->name;
    }
    /**
    * Set path
    *
    * @param string $path
    */
    public function setPath($path)
    {
    $this->path = $path;
    }
    /**
    * Get path
    *
    * @return string
    */
    public function getPath()
    {
    return $this->path;
    }
    /**
    * Set username
    *
    * @param string $username
    */
    public function setUsername($username)
    {
    $this->username = $username;
    }
    /**
    * Get username
    *
    * @return string
    */
    public function getUsername()
    {
    return $this->username;
    }
    /**
    * Set password
    * @param string $password
    */
    public function setPassword($password)
    {
    $this->password = $password;
    }
    /**
    * Get password
    * @return string
    */
    public function getPassword()
    {
    return $this->password;
    }
    /**
    * Set salt
    * 
    * @param string $salt
    */
    public function setSalt($salt)
    {
    $this->salt = $salt;
    }
    /**
    * Get salt
    * @return string
    */
    public function getSalt()
    {
    return $this->salt;
    }
    /**
    * Add user_roles
    * 
    * @param Multiservices\ArxisBundle\Entity\Role $userRoles
    */
    public function addRole(\Multiservices\ArxisBundle\Entity\Role $userRoles)
    {
    $this->user_roles[] = $userRoles;
    }
    public function setUserRoles($roles) {
    $this->user_roles = $roles;
    }
    /**
    * Get user_roles
    *
    * @return Doctrine\Common\Collections\Collection
    */
    public function getUserRoles()
    {
    return $this->user_roles;
    }
    /**
    * Get roles
    * @inheritDoc
    * @return Doctrine\Common\Collections\Collection
    */
    public function getRoles()
    {
        //return array('ROLE_USER');
        return $this->user_roles->toArray();    //IMPORTANTE: el mecanismo de seguridad de Sf2 requiere ésto como un array
    }
    
    /**
     * Add user_roles
     *
     * @param \Multiservices\ArxisBundle\Entity\Role $userRoles
     * @return User
     */
    public function addUserRole(\Multiservices\ArxisBundle\Entity\Role $userRoles)
    {
        $this->user_roles[] = $userRoles;

        return $this;
    }

    /**
     * Remove user_roles
     *
     * @param \Multiservices\ArxisBundle\Entity\Role $userRoles
     */
    public function removeUserRole(\Multiservices\ArxisBundle\Entity\Role $userRoles)
    {
        $this->user_roles->removeElement($userRoles);
    }
    
    /**
    * Compares this user to another to determine if they are the same.
    *
    * @param UserInterface $user The user
    * @return boolean True if equal, false othwerwise.
    */
    public function equals(UserInterface $user) {
    return md5($this->getUsername()) == md5($user->getUsername());
    }
    /**
    * Erases the user credentials.
    */
    public function eraseCredentials() {
    }
    /**
    * Set mail
    * 
    * @param string $mail
    */
     public function setMail($mail)
    {
        $this->mail = $mail;
      
    }

    /**
     * Get mail
     *
     * @return string 
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set theme
     *
     * @param string $theme
     */
    public function setTheme($theme)
    {
        $this->theme = $theme;
    }

    /**
     * Get theme
     *
     * @return string 
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * Set signature
     *
     * @param string $signature
     * @return Users
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;

        return $this;
    }

    /**
     * Get signature
     *
     * @return string 
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * Set signatureFormat
     *
     * @param string $signatureFormat
     * @return Users
     */
    public function setSignatureFormat($signatureFormat)
    {
        $this->signatureFormat = $signatureFormat;

        return $this;
    }

    /**
     * Get signatureFormat
     *
     * @return string 
     */
    public function getSignatureFormat()
    {
        return $this->signatureFormat;
    }

    /**
     * Set created
     *
     * @param integer $created
     * @return Users
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }
    public function addCreated()
    {
        $this->created=time();   
    }

    /**
     * Get created
     *
     * @return integer 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set access
     *
     * @param integer $access
     * @return Users
     */
    public function setAccess($access)
    {
        $this->access = $access;

        return $this;
    }

    /**
     * Get access
     *
     * @return integer 
     */
    public function getAccess()
    {
        return $this->access;
    }

    /**
     * Set login
     * @param integer $login
     * @return Users
     */
    public function setLogin(Request $request)
    {
       $login=$request->server->get('REQUEST_TIME');
       $this->login=$login;
       return $this;
    }

    /**
     * Get login
     *
     * @return integer 
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return Users
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set timezone
     *
     * @param string $timezone
     * @return Users
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;

        return $this;
    }

    /**
     * Get timezone
     *
     * @return string 
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * Set language
     *
     * @param string $language
     * @return Users
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set picture
     *
     * @param integer $picture
     * @return Users
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return integer 
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set init
     *
     * @param string $init
     * @return Users
     */
    public function setInit($init)
    {
        $this->init = $init;

        return $this;
    }

    /**
     * Get init
     *
     * @return string 
     */
    public function getInit()
    {
        return $this->init;
    }

    /**
     * Set data
     *
     * @param string $data
     * @return Users
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return string 
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Get uid
     *
     * @return integer 
     */
    public function getUid()
    {
        return $this->uid;
    }
    
    
    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/documents/images/profile';
    }
    
    /**
     * @Assert\File(maxSize="6000000")
     */
    private $file;

    private $temp;
    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
        // check if we have an old image path
        if (isset($this->path)) {
            // store the old name to delete after the update
            $this->temp = $this->path;
            $this->path = null;
        } else {
            $this->path = 'initial';
        }
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->getFile()) {
            // do whatever you want to generate a unique name
            $filename = sha1(uniqid(mt_rand(), true));
            $this->path = $filename.'.'.$this->getFile()->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->getFile()) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->getFile()->move($this->getUploadRootDir(), $this->path);

        // check if we have an old image
        if (isset($this->temp)) {
            // delete the old image
            unlink($this->getUploadRootDir().'/'.$this->temp);
            // clear the temp image path
            $this->temp = null;
        }
        $this->file = null;
    }
    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }
     /**
     *  O R M\OneToMany(targetEntity="Mensajes", mappedBy="destino")
     */
    private $inbox;
    /**
    * Add inbox
    * 
    * p a ram Multiservices\ArxisBundle\Entity\Mensajes
    */
    public function addInbox($mensaje)
    {
        $this->inbox[] = $mensaje;
    }
    /**
    * Get inbox
    *
    * @return Doctrine\Common\Collections\Collection
    */
    public function getInbox()
    {
        return $this->inbox;
    }
    /**
     * O R M\OneToMany(targetEntity="Mensajes", mappedBy="autor")
     */
    private $outbox;
    /**
    * Add outbox
    * 
    * @param Multiservices\ArxisBundle\Entity\Mensajes
    */
    public function addOutbox( $mensaje)
    {
        $this->outbox[] = $mensaje;
    }
    /**
    * Get outbox
    *
    * @return Doctrine\Common\Collections\Collection
    */
    public function getOutbox()
    {
        return $this->outbox;
    }
    /**
     * Remove inbox
     *
     * param \Multiservices\ArxisBundle\Entity\Mensajes $inbox
     */
    public function removeInbox( $inbox)
    {
        $this->inbox->removeElement($inbox);
    }

    /**
     * Remove outbox
     *
     * param \Multiservices\ArxisBundle\Entity\Mensajes $outbox
     */
    public function removeOutbox( $outbox)
    {
        $this->outbox->removeElement($outbox);
    }
    public function __toString() {
    return $this->getName();
    }
    
  
    
   /**
     * @see \Serializable::serialize()
    * @return string
     */
    public function serialize()
    {
        //return \json_encode(
          //  array($this->username, $this->password, $this->salt,
            //        $this->user_roles->toArray(), $this->id));
        return json_encode(array(
            $this->id,
            $this->username,
            $this->password,
            $this->user_roles,
            // see section on salt below
            $this->salt,
        ));
    }

    /**
     * @see \Serializable::unserialize()
     * 
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            $this->user_roles,
            // see section on salt below
            $this->salt,
        ) = json_decode($serialized);
    }
}
