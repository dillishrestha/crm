<?php

namespace OroCRM\Bundle\SalesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use OroCRM\Bundle\ContactBundle\Entity\Contact;
use OroCRM\Bundle\AccountBundle\Entity\Account;

/**
 * @ORM\Entity
 * @ORM\Table(name="orocrm_sales_opportunity")
 */
class Opportunity
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer", name="id")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var OpportunityStatus
     *
     * @ORM\ManyToOne(targetEntity="OroCRM\Bundle\SalesBundle\Entity\OpportunityStatus")
     * @ORM\JoinColumn(name="status_name", referencedColumnName="name")
     **/
    protected $status;

    /**
     * @var Contact
     *
     * @ORM\ManyToOne(targetEntity="OroCRM\Bundle\ContactBundle\Entity\Contact")
     * @ORM\JoinColumn(name="contact_id", referencedColumnName="id")
     **/
    protected $contact;

    /**
     * @var Account
     *
     * @ORM\ManyToOne(targetEntity="OroCRM\Bundle\AccountBundle\Entity\Account")
     * @ORM\JoinColumn(name="account_id", referencedColumnName="id")
     **/
    protected $account;

    /**
     * @var string
     *
     * @ORM\Column(name="topic", type="string", length=255, nullable=false)
     */
    protected $topic;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="close_date", type="datetime", nullable=true)
     */
    protected $closeDate;

    /**
     * @var int
     *
     * @ORM\Column(name="probability", type="smallint", nullable=true)
     */
    protected $probability;

    /**
     * @var float
     *
     * @ORM\Column(name="budget_amount", type="float", nullable=true)
     */
    protected $budgetAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_need", type="string", length=255, nullable=false)
     */
    protected $customerNeed;

    /**
     * @var string
     *
     * @ORM\Column(name="proposed_solution", type="string", length=255, nullable=false)
     */
    protected $proposedSolution;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param Account $account
     * @return Opportunity
     */
    public function setAccount($account)
    {
        $this->account = $account;
        return $this;
    }

    /**
     * @return Account
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param float $budgetAmount
     * @return Opportunity
     */
    public function setBudgetAmount($budgetAmount)
    {
        $this->budgetAmount = $budgetAmount;
        return $this;
    }

    /**
     * @return float
     */
    public function getBudgetAmount()
    {
        return $this->budgetAmount;
    }

    /**
     * @param \DateTime $closeDate
     * @return Opportunity
     */
    public function setCloseDate($closeDate)
    {
        $this->closeDate = $closeDate;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCloseDate()
    {
        return $this->closeDate;
    }

    /**
     * @param Contact $contact
     * @return Opportunity
     */
    public function setContact($contact)
    {
        $this->contact = $contact;
        return $this;
    }

    /**
     * @return Contact
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param string $customerNeed
     * @return Opportunity
     */
    public function setCustomerNeed($customerNeed)
    {
        $this->customerNeed = $customerNeed;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerNeed()
    {
        return $this->customerNeed;
    }

    /**
     * @param int $probability
     * @return Opportunity
     */
    public function setProbability($probability)
    {
        $this->probability = $probability;
        return $this;
    }

    /**
     * @return int
     */
    public function getProbability()
    {
        return $this->probability;
    }

    /**
     * @param string $proposedSolution
     * @return Opportunity
     */
    public function setProposedSolution($proposedSolution)
    {
        $this->proposedSolution = $proposedSolution;
        return $this;
    }

    /**
     * @return string
     */
    public function getProposedSolution()
    {
        return $this->proposedSolution;
    }

    /**
     * @param OpportunityStatus $status
     * @return Opportunity
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return OpportunityStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $topic
     * @return Opportunity
     */
    public function setTopic($topic)
    {
        $this->topic = $topic;
        return $this;
    }

    /**
     * @return string
     */
    public function getTopic()
    {
        return $this->topic;
    }
}
