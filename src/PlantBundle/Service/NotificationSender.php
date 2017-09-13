<?php

namespace PlantBundle\Service;

use AppBundle\Entity\Notification;
use AppBundle\Entity\User;
use DateTime;
use PlantBundle\Entity\Plant;

class NotificationSender
{
    /**
     * @param User $user
     * @return User
     */
    public function sendNotification(User $user)
    {
        $notification = new NotificationChecker();
        foreach ($user->getPlants() as $key => $plant)
        {
            if ($notification->checkIfNotificationShouldPop($plant))
            {
                if ($plant->getIsDaily())
                {
                    $user->addNotification(new Notification('' . $plant->getName(), 'Today You should water ' . $plant->getName() . ' ' . $plant->getRemaining() . ' times a day'));
                }
                else
                {
                    $user->addNotification(new Notification('' . $plant->getName(), 'Today You should water ' . $plant->getName()));
                }
                $user->getPlants()[$key] = $plant->setDateLastNotifaction(new DateTime('now'));
            }
        }
        return $user;
    }

    /**
     * @param Plant $plant
     * @return Plant
     */
    public function changeDateLastNotifaction(Plant $plant)
    {
        return $plant->setDateLastNotifaction(new DateTime('now'));
    }
}
