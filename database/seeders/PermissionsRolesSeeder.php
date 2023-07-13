<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->UserPermissions();
        $this->BrandPermissions();
        $this->CategoryPermissions();
        $this->GalleryPermissions();
        $this->ProductPermissions();
        $this->PermissionPermissions();
        $this->RolePermissions();
        $this->CommentPermissions();
        $this->OrderPermissions();
        $this->TransportationPermissions();
        $this->PaymentPermissions();
        $this->FileManagerPermissions();
        $this->PaymentHistory();
        $this->DiscountPermissions();


        Permission::query()->create([
            'name'=> 'staff-user-permission',
            'label' => 'مدیریت دسترسی کاربران مدیر'
        ]);
        Permission::query()->create([
            'name'=> 'show-staff-users',
            'label' => 'مشاهده کاربران مدیر'
        ]);

        Role::query()->create([
            'name' => 'ManageUser',
            'label' => 'مدیریت کاربران'
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '1',
            'role_id' => '1'
        ]);
        DB::table('permission_role')->insert([
            'permission_id' => '2',
            'role_id' => '1'
        ]);

        DB::table('role_user')->insert([
            'user_id' => '1',
            'role_id' => '1',
        ]);
        DB::table('role_user')->insert([
            'user_id' => '2',
            'role_id' => '1',
        ]);

        DB::table('permission_user')->insert([
            'permission_id' =>'1',
            'user_id'=> '1'
        ]);
        DB::table('permission_user')->insert([
            'permission_id' =>'1',
            'user_id'=> '2'
        ]);

    }

    private function UserPermissions()
    {
        Permission::query()->create([
            'name'=> 'create-user',
            'label' => 'ایجاد کاربر'
        ]);
        Permission::query()->create([
            'name'=> 'show-users',
            'label' => 'مشاهده کاربران'
        ]);
        Permission::query()->create([
            'name'=> 'edit-user',
            'label' => 'ویرایش کاربر'
        ]);
        Permission::query()->create([
            'name'=> 'delete-user',
            'label' => 'حذف کاربر'
        ]);
    }

    private function BrandPermissions()
    {
        Permission::query()->create([
            'name'=> 'create-brand',
            'label' => 'ایجاد برند'
        ]);
        Permission::query()->create([
            'name'=> 'show-brands',
            'label' => 'مشاهده برندها'
        ]);
        Permission::query()->create([
            'name'=> 'edit-brand',
            'label' => 'ویرایش برند'
        ]);
        Permission::query()->create([
            'name'=> 'delete-brand',
            'label' => 'حذف برند'
        ]);
    }

    private function CategoryPermissions()
    {
        Permission::query()->create([
            'name'=> 'create-category',
            'label' => 'ایجاد دسته بندی'
        ]);
        Permission::query()->create([
            'name'=> 'show-categories',
            'label' => 'مشاهده دسته بندی ها'
        ]);
        Permission::query()->create([
            'name'=> 'edit-category',
            'label' => 'ویرایش دسته بندی'
        ]);
        Permission::query()->create([
            'name'=> 'delete-category',
            'label' => 'حذف دسته بندی'
        ]);
    }

    private function GalleryPermissions()
    {
        Permission::query()->create([
            'name'=> 'create-gallery',
            'label' => 'ایجاد رسانه'
        ]);
        Permission::query()->create([
            'name'=> 'show-galleries',
            'label' => 'مشاهده رسانه ها'
        ]);
        Permission::query()->create([
            'name'=> 'edit-gallery',
            'label' => 'ویرایش رسانه'
        ]);
        Permission::query()->create([
            'name'=> 'delete-gallery',
            'label' => 'حذف رسانه'
        ]);
    }

    private function ProductPermissions()
    {
        Permission::query()->create([
            'name'=> 'create-product',
            'label' => 'ایجاد محصول'
        ]);
        Permission::query()->create([
            'name'=> 'show-products',
            'label' => 'مشاهده محصولات'
        ]);
        Permission::query()->create([
            'name'=> 'edit-product',
            'label' => 'ویرایش محصول'
        ]);
        Permission::query()->create([
            'name'=> 'delete-product',
            'label' => 'حذف محصول'
        ]);
    }

    private function CommentPermissions()
    {
        Permission::query()->create([
            'name'=> 'create-comment',
            'label' => 'ایجاد نظر'
        ]);
        Permission::query()->create([
            'name'=> 'show-comments',
            'label' => 'مشاهده نظرات'
        ]);
        Permission::query()->create([
            'name'=> 'edit-comment',
            'label' => 'ویرایش نظر'
        ]);
        Permission::query()->create([
            'name'=> 'delete-comment',
            'label' => 'حذف نظر'
        ]);
    }

    private function PermissionPermissions()
    {
        Permission::query()->create([
            'name'=> 'create-permission',
            'label' => 'ایجاد دسترسی'
        ]);
        Permission::query()->create([
            'name'=> 'show-permissions',
            'label' => ' مشاهده دسترسی ها'
        ]);
        Permission::query()->create([
            'name'=> 'edit-permission',
            'label' => 'ویرایش دسترسی'
        ]);
        Permission::query()->create([
            'name'=> 'delete-permission',
            'label' => 'حذف دسترسی'
        ]);
    }

    private function RolePermissions()
    {
        Permission::query()->create([
            'name'=> 'create-role',
            'label' => 'ایجاد مقام'
        ]);
        Permission::query()->create([
            'name'=> 'show-roles',
            'label' => ' مشاهده مقام ها'
        ]);
        Permission::query()->create([
            'name'=> 'edit-role',
            'label' => 'ویرایش مقام'
        ]);
        Permission::query()->create([
            'name'=> 'delete-role',
            'label' => 'حذف مقام'
        ]);
    }
    private function OrderPermissions()
    {
        Permission::query()->create([
            'name'=> 'create-order',
            'label' => 'ایجاد سفارش'
        ]);
        Permission::query()->create([
            'name'=> 'show-orders',
            'label' => 'مشاهده سفارشات'
        ]);
        Permission::query()->create([
            'name'=> 'edit-order',
            'label' => 'ویرایش سفارش'
        ]);
        Permission::query()->create([
            'name'=> 'delete-order',
            'label' => 'حذف سفارش'
        ]);


    }
    private function TransportationPermissions()
    {
        Permission::query()->create([
            'name'=> 'create-transportation',
            'label' => 'ایجاد حمل نقل'
        ]);
        Permission::query()->create([
            'name'=> 'show-transportations',
            'label' => 'مشاهده حمل نقل ها'
        ]);
        Permission::query()->create([
            'name'=> 'edit-transportation',
            'label' => 'ویرایش حمل نقل'
        ]);
        Permission::query()->create([
            'name'=> 'delete-transportation',
            'label' => 'حذف حمل نقل'
        ]);
    }

    private function PaymentPermissions()
    {
        Permission::query()->create([
            'name'=> 'create-payment',
            'label' => 'ایجاد درگاه پرداخت'
        ]);
        Permission::query()->create([
            'name'=> 'show-payments',
            'label' => 'مشاهده درگاه پرداخت ها'
        ]);
        Permission::query()->create([
            'name'=> 'edit-payment',
            'label' => 'ویرایش درگاه پرداخت'
        ]);
        Permission::query()->create([
            'name'=> 'delete-payment',
            'label' => 'حذف درگاه پرداخت'
        ]);
    }

    private function DiscountPermissions()
    {
        Permission::query()->create([
            'name'=> 'create-discount',
            'label' => 'ایجاد تخفیف'
        ]);
        Permission::query()->create([
            'name'=> 'show-discounts',
            'label' => 'مشاهده تخفیف ها'
        ]);
        Permission::query()->create([
            'name'=> 'edit-discount',
            'label' => 'ویرایش تخفیف'
        ]);
        Permission::query()->create([
            'name'=> 'delete-discount',
            'label' => 'حذف تخفیف'
        ]);
    }

    private function PaymentHistory()
    {
        Permission::query()->create([
            'name'=> 'create-paymentHistory',
            'label' => 'ایجاد گزارش پرداخت'
        ]);
        Permission::query()->create([
            'name'=> 'show-paymentHistories',
            'label' => 'مشاهده گزارش پرداخت ها'
        ]);
        Permission::query()->create([
            'name'=> 'edit-paymentHistory',
            'label' => 'ویرایش گزارش پرداخت'
        ]);
        Permission::query()->create([
            'name'=> 'delete-paymentHistory',
            'label' => 'حذف گزارش پرداخت'
        ]);
    }


    private function FileManagerPermissions()
    {
        Permission::query()->create([
            'name'=> 'show-fileManager',
            'label' => 'نمایش مدیریت فایل'
        ]);
    }
}
