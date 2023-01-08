<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::updateOrCreate(["name"=>"Admin"]);
        $role2 = Role::updateOrCreate(["name"=>"Abogado"]);
        $role3 = Role::updateOrCreate(["name"=>"Cliente"]);

        Permission::updateOrCreate(["name"=>"admin.documento"])->syncRoles([$role1,$role2]);
        Permission::updateOrCreate(["name"=>"admin.categorias"])->syncRoles([$role1]);
        Permission::updateOrCreate(["name"=>"admin.enlaces"])->syncRoles([$role1]);
        Permission::updateOrCreate(["name"=>"admin.abogados"])->syncRoles([$role1]);
        Permission::updateOrCreate(["name"=>"admin.clientes"])->syncRoles([$role1]);
        Permission::updateOrCreate(["name"=>"admin.consultas"])->syncRoles([$role1,$role2]);
        Permission::updateOrCreate(["name"=>"admin.calendario"])->syncRoles([$role1,$role2]);;
        Permission::updateOrCreate(["name"=>"admin.servicios"])->syncRoles([$role1]);
        Permission::updateOrCreate(["name"=>"admin.detalle.consulta"])->syncRoles([$role1]);
        Permission::updateOrCreate(["name"=>"front"])->syncRoles([$role1,$role2,$role3]);;
    }
}
