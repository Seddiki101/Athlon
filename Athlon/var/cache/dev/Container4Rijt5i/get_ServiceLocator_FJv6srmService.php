<?php

namespace Container4Rijt5i;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_FJv6srmService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.fJv6srm' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.fJv6srm'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'employeRepository' => ['privates', 'App\\Repository\\EmployeRepository', 'getEmployeRepositoryService', true],
        ], [
            'employeRepository' => 'App\\Repository\\EmployeRepository',
        ]);
    }
}