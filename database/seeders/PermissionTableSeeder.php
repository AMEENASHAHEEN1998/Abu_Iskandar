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
            'كل شى',
            'أضافة قسم رئيسي',
            'أضافة قسم فرعي',
            'منتجات',
            'تعديل منتج',
            'حذف منتج',
            'أضافة طلبيات',
            'تعديل طلبيات',
            'حذف طلبيات',
            'أضافة عروض',
            'تعديل عروض',
            'حذف عروض',
            'زبائن',
            'تعديل زبائن',
            'حذف زبائن',
            'مستخدمين',
            'تعديل مستخدمين',
            'حذف مستخدمين',
            'مقالات',
            'تعديل مقالات',
            'حذف مقالات',
            'أضافة وظائف',
            'تعديل وظائف',
            'حذف وظائف',
            'طلبات التوظيف',
            'تعديل طلبات توظيف',
            'حذف طلبات توظيف',
            'أضافة موزعين',
            'تعديل موزعين',
            'حذف موزعين',
            'أضافة الاعدادات',
            'اضافة معلومات الشركة',
            'أضافة فريق العمل' ,
            'ملاحظات',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
            
        }
    }
}
