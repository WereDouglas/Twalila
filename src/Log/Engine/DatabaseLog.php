<?php
/**
 * Created by PhpStorm.
 * User: Douglas
 * Date: 07/02/21
 * Time: 7:07 PM
 */

namespace App\Log\Engine;

use Cake\Log\Engine\BaseLog;
use Cake\ORM\TableRegistry;

class DatabaseLog extends BaseLog
{
    public function __construct ($options = [])
    {
        parent::__construct($options);
    }

    /**
     * @param mixed $level
     * @param string $message
     * @param array $context
     */
    public function log ($level, $message, array $context = [])
    {
        if (!empty(trim($message)) && !empty(trim($level)) && strlen($level) > 3) {

            $data = ['level' => $level, 'message' => $message];
            // Write to the database.
            $logsTable = TableRegistry::getTableLocator()->get('Logs');
            $log = $logsTable->newEmptyEntity();
            $log = $logsTable->patchEntity($log, $data);

            $this->deleteEmptyLogLevels();

            if (!$logsTable->save($log)) {

                dd($log->getErrors(), 2);
            }

        }
    }

    public function deleteEmptyLogLevels ()
    {
        $logsTable = TableRegistry::getTableLocator()->get('Logs');
        $logsTable->deleteAll(['level' => '']);
    }
}
