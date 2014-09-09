<?php

namespace core\database;

class serializer
{

    static public function serialize($entity, $depthSpecification = array())
    {


        $entityManager = doctrine::getEntityManager();

        $data = array();

        $className = get_class($entity);
        $metaData = $entityManager->getClassMetadata($className);

        foreach ($metaData->fieldMappings as $field => $mapping) {
            $method = "get" . ucfirst($field);
            $fieldCandidate = call_user_func(array($entity, $method));

            if ($fieldCandidate instanceof \DateTime) {
                $fieldCandidate = $fieldCandidate->format('y-m-d H:i:s');
            }

            $data[$field] = $fieldCandidate;
        }

        foreach ($metaData->associationMappings as $field => $mapping) {
            if (!isset($depthSpecification[$field]) && !in_array($field, $depthSpecification)) {
                continue;
            }

            $subDepthSpecification = isset($depthSpecification[$field]) ? $depthSpecification[$field] : null;

            // Sort of entity object
            $object = $metaData->reflFields[$field]->getValue($entity);

            $data[$field] = self::serialize($object, $subDepthSpecification);
        }

        return $data;
    }

    static public function deserialize(Array $data)
    {


        $entityManager = doctrine::getEntityManager();


        list($class, $result) = $data;

        $uow = $entityManager->getUnitOfWork();
        return $uow->createEntity($class, $result);
    }

}

?>
