<?php 

namespace Kadry\UserBundle\Form\Types;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class EmploymentHistoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('companyName', null, array(
                'label' => 'Firma'
            ))
            ->add('dateFrom', null, array(
                'label' => 'Od'
            ))
            ->add('dateTo', null, array(
                'label' => 'Do'
            ))
            ->add('position', null, array(
                'label' => 'Posada'
            ))
        ;
    }

    public function getName()
    {
        return 'employment_history';
    }

    public function getDefaultOptions(array $options){
      return array(
          'data_class' => 'Kadry\UserBundle\Entity\EmploymentHistory'
    );
  }
}