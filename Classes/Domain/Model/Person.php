<?php
namespace TYPO3\T3Basic\Domain\Model;

use TYPO3\CMS\Extbase\Domain\Model\Category;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Person
 */
class Person extends AbstractEntity
{
    /**
     * gender
     *
     * @var int
     */
    protected int $gender = 0;

    /**
     * title
     *
     * @var string
     */
    protected string $title = '';

    /**
     * firstName
     *
     * @var string
     */
    protected string $firstName = '';

    /**
     * lastName
     *
     * @var string
     */
    protected string $lastName = '';

    /**
     * position
     *
     * @var string
     */
    protected string $position = '';

    /**
     * address
     *
     * @var string
     */
    protected string $address = '';

    /**
     * zip
     *
     * @var string
     */
    protected string $zip = '';

    /**
     * city
     *
     * @var string
     */
    protected string $city = '';

    /**
     * phone
     *
     * @var string
     */
    protected string $phone = '';

    /**
     * email
     *
     * @var string
     */
    protected string $email = '';

    /**
     * short biography
     *
     * @var string
     */
    protected string $shortBiography = '';

    /**
     * biography
     *
     * @var string
     */
    protected string $biography = '';

    /**
     * image
     *
     * @var FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected FileReference $image;

    /**
     * Content elements
     *
     * @var ObjectStorage<TtContent>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected ObjectStorage $contentElements;

    /**
     * categories
     *
     * @var ObjectStorage<Category>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected ObjectStorage $categories;

    /**
     * WWW
     *
     * @var string
     */
    protected string $www = '';

    /**
     * __construct
     */
    public function __construct()
    {
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     *
     * @return void
     */
    protected function initStorageObjects(): void
    {
        $this->contentElements = new ObjectStorage();
        $this->categories = new ObjectStorage();
    }

    /**
     * Returns the gender
     *
     * @return int $gender
     */
    public function getGender(): int
    {
        return $this->gender;
    }

    /**
     * Sets the gender
     *
     * @param int $gender
     * @return void
     */
    public function setGender(int $gender): void
    {
        $this->gender = $gender;
    }

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * Returns the firstName
     *
     * @return string $firstName
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * Sets the firstName
     *
     * @param string $firstName
     * @return void
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * Returns the lastName
     *
     * @return string $lastName
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * Sets the lastName
     *
     * @param string $lastName
     * @return void
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * Returns the position
     *
     * @return string $position
     */
    public function getPosition(): string
    {
        return $this->position;
    }

    /**
     * Sets the position
     *
     * @param string $position
     * @return void
     */
    public function setPosition(string $position): void
    {
        $this->position = $position;
    }

    /**
     * Returns the address
     *
     * @return string $address
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * Sets the address
     *
     * @param string $address
     * @return void
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * Returns the zip
     *
     * @return string $zip
     */
    public function getZip(): string
    {
        return $this->zip;
    }

    /**
     * Sets the zip
     *
     * @param string $zip
     * @return void
     */
    public function setZip(string $zip): void
    {
        $this->zip = $zip;
    }

    /**
     * Returns the city
     *
     * @return string $city
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * Sets the city
     *
     * @param string $city
     * @return void
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * Returns the phone
     *
     * @return string $phone
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * Sets the phone
     *
     * @param string $phone
     * @return void
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * Returns the email
     *
     * @return string $email
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Sets the email
     *
     * @param string $email
     * @return void
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * Returns the biography
     *
     * @return string $biography
     */
    public function getBiography(): string
    {
        return $this->biography;
    }

    /**
     * Sets the biography
     *
     * @param string $biography
     * @return void
     */
    public function setBiography(string $biography): void
    {
        $this->biography = $biography;
    }

    /**
     * Returns the biography
     *
     * @return string $biography
     */
    public function getShortBiography(): string
    {
        return $this->shortBiography;
    }

    /**
     * Sets the biography
     *
     * @param string $shortBiography
     * @return void
     */
    public function setShortBiography(string $shortBiography): void
    {
        $this->shortBiography = $shortBiography;
    }

    /**
     * Returns the image
     *
     * @return FileReference $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image
     *
     * @param FileReference $image
     * @return void
     */
    public function setImage(FileReference $image)
    {
        $this->image = $image;
    }

    /**
     * Adds a content element
     *
     * @param TtContent $contentElement
     * @return void
     */
    public function addContentElement(TtContent $contentElement)
    {
        $this->contentElements->attach($contentElement);
    }

    /**
     * Removes a content element
     *
     * @param TtContent $contentElementToRemove The content element to be removed
     * @return void
     */
    public function removeContentElement(TtContent $contentElementToRemove)
    {
        $this->contentElements->detach($contentElementToRemove);
    }

    /**
     * Returns the content elements
     *
     * @return ObjectStorage<TtContent>
     */
    public function getContentElements()
    {
        return $this->contentElements;
    }

    /**
     * Sets the content elements
     *
     * @param ObjectStorage<TtContent> $contentElements
     * @return void
     */
    public function setContentElements(ObjectStorage $contentElements)
    {
        $this->contentElements = $contentElements;
    }

    /**
     * Adds a Category
     *
     * @param Category $category
     * @return void
     */
    public function addCategory(Category $category)
    {
        $this->categories->attach($category);
    }

    /**
     * Removes a Category
     *
     * @param Category $category The Category to be removed
     * @return void
     */
    public function removeCategory(Category $category)
    {
        $this->categories->detach($category);
    }

    /**
     * Returns the categories
     *
     * @return ObjectStorage<Category> $categories
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Sets the categories
     *
     * @param ObjectStorage<Category> $categories
     * @return void
     */
    public function setCategories(ObjectStorage $categories)
    {
        $this->categories = $categories;
    }

    /**
     * Returns www
     *
     * @return string
     */
    public function getWww()
    {
        return $this->www;
    }

    /**
     * Sets www
     *
     * @param string $www
     */
    public function setWww($www)
    {
        $this->www = $www;
    }

    /**
     * Get id list of content elements
     *
     * @return string
     */
    public function getContentElementIdList(): string
    {
        return $this->getIdOfContentElements();
    }

    /**
     * Collect id list
     *
     * @param bool $original
     * @return string
     */
    protected function getIdOfContentElements(bool $original = true): string
    {
        $idList = [];
        $contentElements = $this->getContentElements();
        if ($contentElements) {
            foreach ($this->getContentElements() as $contentElement) {
                if ($contentElement->getColPos() >= 0) {
                    $idList[] = $original ? $contentElement->getUid() : $contentElement->_getProperty('_localizedUid');
                }
            }
        }
        return implode(',', $idList);
    }
}
