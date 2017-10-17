<?php

namespace AdamWojs\CustomPolicyExampleBundle\Security\CustomPolicy\Limitation;

use eZ\Publish\API\Repository\Values\User\Limitation;

class CustomLimitation extends Limitation
{
    /**
     * @var string
     */
    protected $identifier;

    /**
     * Create new Blocking Limitation with identifier injected dynamically.
     *
     * @throws \InvalidArgumentException If $identifier is empty
     *
     * @param string $identifier The identifier of the limitation
     * @param array $limitationValues
     */
    public function __construct($identifier, array $limitationValues)
    {
        if (empty($identifier)) {
            throw new \InvalidArgumentException('Argument $identifier can not be empty');
        }

        parent::__construct([
            'identifier' => $identifier,
            'limitationValues' => $limitationValues
        ]);
    }

    /**
     * @see \eZ\Publish\API\Repository\Values\User\Limitation::getIdentifier()
     *
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }
}
