<?php

namespace TYPO3\T3Basic\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\T3Basic\Domain\Model\Person;
use TYPO3\T3Basic\Domain\Repository\PersonRepository;

/**
 * PersonController
 */
class PersonController extends ActionController
{

    /**
     * @var PersonRepository
     */
    protected PersonRepository $personRepository;

    public function __construct(PersonRepository $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    /**
     * action list
     *
     */
    public function listAction(): void
    {
        $persons = $this->personRepository->findAll();

        debug($persons);

        $this->view->assignMultiple([
            'persons' => $persons,
            'settings' => $this->settings
        ]);
    }

    /**
     * action show s
     *
     * @param Person $person
     */
    public function showAction(Person $person): void
    {
        $this->view->assign('person', $person);
    }

    /**
     * Action show selected
     * Displays one or more persons selected in plugin
     *
     * @throws InvalidConfigurationTypeException
     */
    public function showSelectedAction(): void
    {
        $persons = $this->personRepository->findMultipleByUid($this->settings['selectedPersons']);
        $this->view->assign('persons', $persons);
    }

    /**
     * Action filter
     * Display filter for list view
     */
    public function filterAction(): void
    {
        $this->view->assignMultiple([
            'categories' => $this->settings['categories'],
            'visible' => $this->settings['visible'],
            'settings' => $this->settings
        ]);
    }
}
