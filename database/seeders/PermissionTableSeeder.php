<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'dashborad-list',
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
           'about-list',
           'about-create',
           'about-edit',
           'about-delete',
           'category-list',
           'category-create',
           'category-edit',
           'category-delete',
           'course-list',
           'course-create',
           'course-edit',
           'course-delete',
           'instructor-list',
           'instructor-create',
           'instructor-edit',
           'instructor-delete',
           'testimonial-list',
           'testimonial-create',
           'testimonial-edit',
           'testimonial-delete',
           'whychooseus-list',
           'whychooseus-create',
           'whychooseus-edit',
           'whychooseus-delete',
           'medias-list',
           'medias-create',
           'medias-edit',
           'contact-list',
           'contact-delete',
           'diplomaoutline-list',
           'diplomaoutline-create',
           'diplomaoutline-edit',
           'diplomaoutline-delete',
           'feedback-list',
           'feedback-create',
           'feedback-edit',
           'feedback-delete',
           'applynow-list',
           'applynow-delete',
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}