<?php

namespace AdamWojs\CustomPolicyExampleBundle\Security\CustomPolicy\Limitation;

use eZ\Publish\API\Repository\Values\User\Limitation as APILimitationValue;
use eZ\Publish\API\Repository\Values\User\UserReference as APIUserReference;
use eZ\Publish\API\Repository\Values\ValueObject as APIValueObject;
use eZ\Publish\SPI\Limitation\Type as LimitationType;
use eZ\Publish\API\Repository\Exceptions\NotImplementedException;
use eZ\Publish\Core\Base\Exceptions\InvalidArgumentException;
use eZ\Publish\Core\Base\Exceptions\InvalidArgumentType;
use eZ\Publish\API\Repository\Values\Content\Query\Criterion;

class CustomLimitationType implements LimitationType
{
    /**
     * @var string
     */
    private $identifier;

    public function __construct($identifier)
    {
        if (empty($identifier)) {
            throw new \InvalidArgumentException('Argument $identifier can not be empty');
        }

        $this->identifier = $identifier;
    }

    /**
     * @inheritdoc
     */
    public function acceptValue(APILimitationValue $limitationValue)
    {
        if (!($limitationValue instanceof CustomLimitation)) {
            throw new InvalidArgumentType('$limitationValue', 'CustomLimitation', $limitationValue);
        }
    }

    /**
     * @inheritdoc
     */
    public function validate(APILimitationValue $limitationValue)
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function buildValue(array $limitationValues)
    {
        return new CustomLimitation($this->identifier, $limitationValues);
    }

    /**
     * @inheritdoc
     */
    public function evaluate(APILimitationValue $value, APIUserReference $currentUser, APIValueObject $object, array $targets = null)
    {
        if (!$value instanceof CustomLimitation) {
            throw new InvalidArgumentException('$value', 'Must be of type: CustomLimitation');
        }

        return self::ACCESS_GRANTED;
    }

    /**
     * @inheritdoc
     */
    public function getCriterion(APILimitationValue $value, APIUserReference $currentUser)
    {
         throw new NotImplementedException(__METHOD__);
    }

    /**
     * @inheritdoc
     */
    public function valueSchema()
    {
        throw new NotImplementedException(__METHOD__);
    }
}
