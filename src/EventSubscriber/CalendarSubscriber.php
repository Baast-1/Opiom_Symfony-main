<?php

namespace App\EventSubscriber;

use App\Repository\ListeEventRepository;
use CalendarBundle\CalendarEvents;
use CalendarBundle\Entity\Event;
use CalendarBundle\Event\CalendarEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class CalendarSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private ListeEventRepository $listeEventRepository,
        private UrlGeneratorInterface $router
    )
    {}

    public static function getSubscribedEvents()
    {
        return [
            CalendarEvents::SET_DATA => 'onCalendarSetData',
        ];
    }

    public function onCalendarSetData(CalendarEvent $calendar)
    {
        $start = $calendar->getStart();
        $end = $calendar->getEnd();
        $filters = $calendar->getFilters();
        

        // Modify the query to fit to your entity and needs
        // Change booking.beginAt by your start date property
        $listeEvents = $this->listeEventRepository
    ->createQueryBuilder('listeEvent')
    ->join('listeEvent.bateau', 'bateau')
    ->where('listeEvent.dateHeureDebut BETWEEN :start and :end OR listeEvent.dateHeureFin BETWEEN :start and :end')
    ->andWhere('bateau.id = :bateauId')
    ->setParameter('start', $start->format('Y-m-d H:i:s'))
    ->setParameter('end', $end->format('Y-m-d H:i:s'))
    ->setParameter('bateauId', $filters['bateau']) // Assuming 'bateau' is the key for the selected bateau
    ->getQuery()
    ->getResult();

        foreach ($listeEvents as $listeEvent) {
            // this create the events with your data (here booking data) to fill calendar
            $listeEventEvent = new Event(
                $listeEvent->getTitre(),
                $listeEvent->getDateHeureDebut(),
                $listeEvent->getDateHeureFin() // If the end date is null or not defined, a all day event is created.
            );

            /*
             * Add custom options to events
             *
             * For more information see: https://fullcalendar.io/docs/event-object
             * and: https://github.com/fullcalendar/fullcalendar/blob/master/src/core/options.ts
             */

            $listeEventEvent->setOptions([
                'backgroundColor' => '#073056',
                'borderColor' => '#073056',
            ]);
            $listeEventEvent->addOption(
                'url',
                $this->router->generate('app_liste_event_show', [
                    'id' => $listeEvent->getId(),
                ])
            );

            // finally, add the event to the CalendarEvent to fill the calendar
            $calendar->addEvent($listeEventEvent);
        }
    }
}