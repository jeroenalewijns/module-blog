<?php

namespace Mirasvit\Blog\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\App\ObjectManager;
use Magento\User\Model\User;

/**
 * @method string getName()
 * @method $this setName($name)
 *
 * @method string getUrlKey()
 */
class Author extends User implements IdentityInterface
{
    const CACHE_TAG = 'blog_author';

    /**
     * Get identities.
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        $url = ObjectManager::getInstance()->get('Mirasvit\Blog\Model\Url');

        return $url->getAuthorUrl($this);
    }
}
