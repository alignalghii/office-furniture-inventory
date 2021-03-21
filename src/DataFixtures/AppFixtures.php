<?php

namespace App\DataFixtures;

use App\Entity\Model;
use App\Entity\IUser;
use App\Entity\Furniture;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $baseData = [
        'model' => [//      matter      color    description                   mtype
            'antique'   => ['wood'   , 'red',   'Hand-made hard wood'       , 'Antique'   ],
            'prototype' => ['wood'   , 'brown', 'Hand-made soft wood'       , 'Prototype' ],
            'modern'    => ['steel'  , 'metal', 'Streamlined, modern design', 'Enterprise'],
            'plain'     => ['plastic', 'pink' , 'Retro design'              , 'Plain'     ],
        ],
        'iuser' => [//       name                    email                                password    privilege  active
            'rootadmin' => ['Xien Hen Fu'         , 'root@dev.office-furniture.hu'     , 'R00t525232' , 'admin', true ],
            'admin '    => ['McOneel Ian'         , 'admin@dev.office-furniture.hu'    , 'aDmIn146'   , 'admin', false],
            'typist'    => ['Johann Müller'       , 'secretary@office-furniture.hu'    , 'HErEIaM76'  , 'plain', true ],
            'tester'    => ['Algernon Smith'      , 'tester@dev.office-furniture.hu'   , 'tester67553', 'plain', false],
            'enduser1'  => ['Maria Schellenberger', 'user46@public.office-furniture.hu', 'hst434232'  , 'plain', true ],
            'enduser2'  => ['Otto Jylje'          , 'user57@public.office-furniture.hu', 'dhf685ds'   , 'plain', false],
        ],
    ];
    private $dependentData = [
        'furniture' => [// inventory_number  modelDependence     price  quantity
            'antiqueTable' => [  356,        'antique',         345000,       3],
            'antiqueChair' => [  452,        'antique',         567000,       4],
            'modernDesk'   => [12345,        'modern' ,          12000,     128],
            'retroCloset'  => [ 4567,        'plain'  ,          34000,      98],
        ]
    ];


    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }


    public function load(ObjectManager $manager)
    {
        foreach ($this->baseData as $tableName => &$records) {
            switch ($tableName) {
                case 'model':
                    foreach ($records as $recordName => &$record) {
                        list($matter, $color, $description, $mtype) = $record;
                        $model = new Model();
                            $model->setMatter($matter);
                            $model->setColor($color);
                            $model->setDescription($description);
                            $model->setMtype($mtype);
                        $record['__ENTITY'] = $model;
                        $manager->persist($model);
                    }
                break;
                case 'iuser':
                    foreach ($records as $recordName => &$record) {
                        list($name, $email, $password, $privilege, $active) = $record;
                        $iuser = new IUser();
                            $iuser->setName($name);
                            $iuser->setEmail($email);
                            $iuser->setPassword(
                                $this->passwordEncoder->encodePassword($iuser, $password)
                            );
                            $iuser->setPrivilege($privilege);
                            $iuser->setActive($active);
                        $record['__ENTITY'] = $iuser;
                        $manager->persist($iuser);
                    }
                break;
            }
        }

        foreach ($this->dependentData['furniture'] as $recordName => $record) {
            list($inventoryNumber, $modelDependence, $price, $quantity) = $record;
            $model = $this->accessModel($modelDependence);
            $furniture = new Furniture();
                $furniture->setInventoryNumber($inventoryNumber);
                $furniture->setModel($model);
                $furniture->setPrice($price);
                $furniture->setQuantity($quantity);
            $record['__ENTITY'] = $furniture;
            $manager->persist($furniture);
        }

        $manager->flush();
    }


    private function accessModel(string $dependence): Model
    {
        return $this->baseData['model'][$dependence]['__ENTITY'];
    }
}
