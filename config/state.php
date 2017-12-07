<?php

return [


'sales' => [

              'class'         => 'SalesModel',
              'graph'         => 'sales',
              'property_path' => 'status',

              'states' => 
                        [
                          'underExecution'     => ['type' => 'initial', 'properties' => ['name' => 'Em Execução']],
                          'paymentRequested'   => ['type' => 'normal',  'properties' => ['name' => 'Pagamento Solicitado']],
                          'paidout'            => ['type' => 'final',   'properties' => ['name' => 'Pago']],
                          'canceled'           => ['type' => 'final',   'properties' => ['name' => 'Cancelada']],
                        ],
              'transitions' => 
                        [
                         'requestPayment'       => ['from' => ['underExecution'],                                'to' => 'paymentRequested'],
                         'pay'                  => ['from' => ['paymentRequested'],                              'to' => 'paidout'],
                         'cancel'               => ['from' => ['underExecution'],                                'to' => 'canceled'],
                        ]

          ],


'expertise' => [

              'class'         => 'GuiaModel',
              'graph'         => 'expertise',
              'property_path' => 'defaultstatus',

              'states' => 
                        [
                          'waitingInitialExpertise' => ['type' => 'initial', 'properties' => ['name' => 'Aguardando Pericia Inicial']],
                          'underExecution'          => ['type' => 'normal',  'properties' => ['name' => 'Em Execução']],
                          'waitingFinalExpertise'   => ['type' => 'normal',   'properties' => ['name' => 'Esperando Pericia Final']],
                          'finished'                => ['type' => 'normal',   'properties' => ['name' => 'Finalizada']],
                          'paymentRequested'        => ['type' => 'normal',   'properties' => ['name' => 'Pagamento Solicitado']],
                          'paidout'                 => ['type' => 'final',   'properties' => ['name' => 'Pago']],
                          'canceled'                => ['type' => 'final',   'properties' => ['name' => 'Cancelado']],
                        ],
              'transitions' => 
                        [
                         'execute'               => ['from' => ['waitingInitialExpertise'],                       'to' => 'underExecution'],
                         'performFinalExpertise' => ['from' => ['underExecution'],                                'to' => 'waitingFinalExpertise'],
                         'finish'                => ['from' => ['waitingFinalExpertise'],                         'to' => 'finished'],
                         'requestPayment'        => ['from' => ['finished'],                                      'to' => 'paymentRequested'],
                         'pay'                   => ['from' => ['paymentRequested'],                              'to' => 'paidout'],
                         'cancel'                => ['from' => ['waitingInitialExpertise'], 'to' => 'canceled'],
                        ]

          ],

];