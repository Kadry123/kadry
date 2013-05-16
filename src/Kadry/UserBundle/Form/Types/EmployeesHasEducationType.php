<?php 

namespace Kadry\UserBundle\Form\Types;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class EmployeesHasEducationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateFrom', null, array(
                'label' => 'Od'
            ))
            ->add('dateTo', null, array(
                'label' => 'Do'
            ))
            ->add('education', 'entity', array(
                'label' => 'Szkoła',
                'class' => 'Kadry\UserBundle\Entity\Education'
            ))
        ;
    }

    public function getName()
    {
        return 'employees_has_educationType';
    }

    public function getDefaultOptions(array $options){
      return array(
          'data_class' => 'Kadry\UserBundle\Entity\EmployeesHasEducation'
    );
  }
}