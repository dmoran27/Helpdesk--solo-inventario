<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [

/***************************BOTONES GENERALES***************************************/
            [
         
            'title'      => 'actividad_access',
            'nombre'    =>'Acceso a las actividades en general',
            'created_at' => '2019-04-15 19:14:42',
            'updated_at' => '2019-04-15 19:14:42',
        ],
         [
                
                'title'      => 'inventario_access',
                'nombre'    =>'Acceso al inventario',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'user_action_access',
                'nombre'    =>'Acceso a las acciones de los tecnicos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
             [
                
                'title'      => 'configuracion_tecnico_access',
                'nombre'    =>'Acceso a configuracion de tecnicos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
             [
                
                'title'      => 'configuracion_general_access',
                'nombre'    =>'Acceso a las configuraciones generales',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
             [
                
                'title'      => 'documentos',
                'nombre'    =>'Acceso a los documentos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],

/***************************AREA***************************************/
             [
                
                'title'      => 'area_create',
                'nombre'    =>'Crear Areas',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'area_edit',
                'nombre'    =>'Editar Areas',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'area_show',
                'nombre'    =>'Ver Areas',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'area_delete',
                'nombre'    =>'Eliminar Areas',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'area_access',
                'nombre'    =>'Acceder a las Areas',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            /***************************MOVIMIENTOS DE TECNICOS***************************************/
            
            
            [
                
                'title'      => 'movimiento_delete',
                'nombre'    =>'Eliminar Movimientos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'movimiento_access',
                'nombre'    =>'Acceder a las Movimientos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
/***************************TIPO***************************************/
             [
                
                'title'      => 'tipo_create',
                'nombre'    =>'Crear Tipos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'tipo_edit',
                'nombre'    =>'Editar Tipos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'tipo_show',
                'nombre'    =>'Ver Tipos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'tipo_delete',
                'nombre'    =>'Eliminar Tipos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'tipo_access',
                'nombre'    =>'Acceder a las Tipos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
/***************************Caracteristicas***************************************/
             [
                
                'title'      => 'caracteristica_create',
                'nombre'    =>'Crear Caracteristicas',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'caracteristica_edit',
                'nombre'    =>'Editar Caracteristicas',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'caracteristica_show',
                'nombre'    =>'Ver Caracteristicas',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'caracteristica_delete',
                'nombre'    =>'Eliminar Caracteristicas',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'caracteristica_access',
                'nombre'    =>'Acceder a las Caracteristicas',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
/***************************Cliente***************************************/
             [
                
                'title'      => 'cliente_create',
                'nombre'    =>'Crear Clientes',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'cliente_edit',
                'nombre'    =>'Editar Clientes',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'cliente_show',
                'nombre'    =>'Ver Clientes',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'cliente_delete',
                'nombre'    =>'Eliminar Clientes',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'cliente_access',
                'nombre'    =>'Acceder a las Clientes',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
/***************************Dependencia***************************************/
             [
                
                'title'      => 'dependencia_create',
                'nombre'    =>'Crear Dependencias',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'dependencia_edit',
                'nombre'    =>'Editar Dependencias',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'dependencia_show',
                'nombre'    =>'Ver Dependencias',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'dependencia_delete',
                'nombre'    =>'Eliminar Dependencias',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'dependencia_access',
                'nombre'    =>'Acceder a las Dependencias',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ], /***************************Edificio***************************************/
           [
                
                'title'      => 'edificio_create',
                'nombre'    =>'Crear Edificios',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'edificio_edit',
                'nombre'    =>'Editar Edificios',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'edificio_show',
                'nombre'    =>'Ver Edificios',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'edificio_delete',
                'nombre'    =>'Eliminar Edificios',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'edificio_access',
                'nombre'    =>'Acceder a las Edificios',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],

/***************************Equipo***************************************/
             [    
                'title'      => 'equipo_create',
                'nombre'    =>'',
                'nombre'    =>'Crear Equipos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],

            [
                
                'title'      => 'equipo_edit',
                'nombre'    =>'Editar Equipos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'equipo_show',
                'nombre'    =>'Ver Equipos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'equipo_delete',
                'nombre'    =>'Eliminar Equipos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'equipo_access',
                'nombre'    =>'Acceder a las Equipos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],

/***************************PERIFERICO***************************************/
             [
                
                'title'      => 'periferico_create',
                'nombre'    =>'Crear Perifericos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'periferico_edit',
                'nombre'    =>'Editar Perifericos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'periferico_show',
                'nombre'    =>'Ver Perifericos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'periferico_delete',
                'nombre'    =>'Eliminar Perifericos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'periferico_access',
                'nombre'    =>'Acceder a las Perifericos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ], 
/***************************PERMISSION***************************************/
            [
                
                'title'      => 'permission_create',
                'nombre'    =>'Crear Permisos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'permission_edit',
                'nombre'    =>'Editar Permisos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'permission_show',
                'nombre'    =>'Ver Permisos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'permission_delete',
                'nombre'    =>'Eliminar Permisos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'permission_access',
                'nombre'    =>'Acceder a las Permisos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
/***************************SOFTWARE***************************************/
             [
                
                'title'      => 'software_create',
                'nombre'    =>'Crear Softwares',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'software_edit',
                'nombre'    =>'Editar Softwares',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'software_show',
                'nombre'    =>'Ver Softwares',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'software_delete',
                'nombre'    =>'Eliminar Softwares',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'software_access',
                'nombre'    =>'Acceder a las Softwares',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],

/***************************TICKET***************************************/
             [
                
                'title'      => 'ticket_create',
                'nombre'    =>'Crear Actividades',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'ticket_edit',
                'nombre'    =>'Editar Actividades',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'ticket_show',
                'nombre'    =>'Ver Actividades',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'ticket_delete',
                'nombre'    =>'Eliminar Actividades',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'ticket_access',
                'nombre'    =>'Acceder a las Actividades',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],

/***************************ROLE***************************************/
            [
                
                'title'      => 'role_create',
                'nombre'    =>'Crear Roles',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'role_edit',
                'nombre'    =>'Editar Roles',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'role_show',
                'nombre'    =>'Ver Roles',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'role_delete',
                'nombre'    =>'Eliminar Roles',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'role_access',
                'nombre'    =>'Acceder a las Roles',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            /***************************Yipo***************************************/
            [
                
                'title'      => 'tipo_create',
                'nombre'    =>'Crear Tipos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'tipo_edit',
                'nombre'    =>'Editar Tipos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'tipo_show',
                'nombre'    =>'Ver Tipos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'tipo_delete',
                'nombre'    =>'Eliminar Tipos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'tipo_access',
                'nombre'    =>'Acceder a las Tipos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
/***************************USER***************************************/
            [
                
                'title'      => 'user_create',
                'nombre'    =>'Crear Tecnicos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'user_edit',
                'nombre'    =>'Editar Tecnicos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'user_show',
                'nombre'    =>'Ver Tecnicos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'user_delete',
                'nombre'    =>'Eliminar Tecnicos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'user_access',
                'nombre'    =>'Acceder a las Tecnicos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
/***************************PRODUC TEST***************************************/
            [
                
                'title'      => 'product_create',
                'nombre'    =>'Crear Productos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'product_edit',
                'nombre'    =>'Editar Productos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'product_show',
                'nombre'    =>'Ver Productos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'product_delete',
                'nombre'    =>'Eliminar Productos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                
                'title'      => 'product_access',
                'nombre'    =>'Acceder a las Productos',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ]
        ];

        Permission::insert($permissions);
    }
}
