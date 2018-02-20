<?php

namespace Oro\Bundle\MagentoBundle\Form\Handler;

use Doctrine\Common\Persistence\ObjectManager;
use Oro\Bundle\MagentoBundle\Entity\Address;
use Oro\Bundle\OrganizationBundle\Entity\Organization;
use Oro\Bundle\SecurityBundle\Authentication\TokenAccessorInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class CustomerAddressApiHandler
{
    /** @var FormInterface */
    protected $form;

    /** @var RequestStack */
    protected $requestStack;

    /** @var ObjectManager */
    protected $manager;

    /** @var Organization */
    protected $organization;

    /**
     * @param FormInterface          $form
     * @param RequestStack           $requestStack
     * @param RegistryInterface      $registry
     * @param TokenAccessorInterface $security
     */
    public function __construct(
        FormInterface $form,
        RequestStack $requestStack,
        RegistryInterface $registry,
        TokenAccessorInterface $security
    ) {
        $this->form = $form;
        $this->requestStack = $requestStack;
        $this->manager = $registry->getManager();
        $this->organization = $security->getOrganization();
    }

    /**
     * Process form
     *
     * @param Address $entity
     *
     * @return bool True on successful processing, false otherwise
     */
    public function process(Address $entity)
    {
        $this->form->setData($entity);

        $request = $this->requestStack->getCurrentRequest();
        if (in_array($request->getMethod(), ['POST', 'PUT'], true)) {
            $this->form->submit($request);

            if ($this->form->isValid()) {
                $this->onSuccess($entity);

                return true;
            }
        }

        return false;
    }

    /**
     * "Success" form handler
     *
     * @param Address $entity
     */
    protected function onSuccess(Address $entity)
    {
        if (null === $entity->getOrganization()) {
            $entity->setOrganization($this->organization);
        }

        $this->manager->persist($entity);
        $this->manager->flush();
    }
}
