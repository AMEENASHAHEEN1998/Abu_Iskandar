<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Offer;
use App\Models\Product;
use App\Models\Customer;
use App\Models\RequestJob;
use Illuminate\Http\Request;
use App\Models\DriverRequest;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $product=Product::all()->count();
        $requestjob=RequestJob::where('status_value',1)->count();
        $offer=Offer::where('status_value',1)->count();
        $driverrequest=DriverRequest::where('status_value',0)->count();
        $driverrequestok=DriverRequest::where('status_value',1)->count();
        $user_count = User::count();
        $customer_count = Customer::count();

        $chartjs = app()->chartjs
        ->name('pieChartTest')
        ->type('doughnut')
        ->size(['width' => 340, 'height' => 200])
        ->labels(['طلبيات قيد الانتظار', ' طلبيات تم تسليمها'])
        ->datasets([
            [
                'backgroundColor' => ['#ec5858', '#81b214'],
                'data' => [$driverrequest, $driverrequestok]
            ]
        ])
        ->options([]);

        $chartjs_2 = app()->chartjs
        ->name('barChartTest')
        ->type('bar')
        ->size(['width' => 340, 'height' => 200])
        ->labels(['عدد المنتجات' , 'عدد الوظائف' , 'طلبيات جديدة' , 'عدد المستخدمين' , 'عدد الزبائن' ,'عدد العروض'])
        ->datasets([
            [
            "data" => [$product, $requestjob, $driverrequest, $user_count, $customer_count, $offer],
            "backgroundColor" => [
              'rgba(255, 99, 132, 0.2)',
              'rgba(255, 159, 64, 0.2)',
              'rgba(255, 205, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(153, 102, 255, 0.2)',

            ],
            "borderColor" => [
              'rgb(255, 99, 132)',
              'rgb(255, 159, 64)',
              'rgb(255, 205, 86)',
              'rgb(75, 192, 192)',
              'rgb(54, 162, 235)',
              'rgb(153, 102, 255)',
              
            ],
            "borderWidth" => 1
          ]
        ])
        ->options([]);

        //  $chartjs = app()->chartjs
        //     ->name('barChartTest')
        //     ->type('bar')
        //     ->size(['width' => 350, 'height' => 200])
        //     ->labels(['طلبيات قيد الانتظار', ' طلبيات تم تسليمها'])
        //     ->datasets([
        //         [
        //             "label" => "طلبيات قيد الانتظار",
        //             'backgroundColor' => ['#ec5858'],
        //             'data' => [$driverrequest]
        //         ],
        //         [
        //             "label" => " طلبيات تم تسليمها",
        //             'backgroundColor' => ['#81b214'],
        //             'data' => [$driverrequestok]
        //         ],



        //     ])
        //     ->options([]);

        return view('admin.pages.index',compact('product','requestjob','offer','driverrequest','chartjs' , 'chartjs_2'));
        // return view('admin.pages.index');
    }


    public function role(){
      $roles=Role::all();
      // $role = Role::create(['name' => 'writer']);
      

      // $Permissions =Permission::all();
      // $permission = Permission::create(['name' => 'add user']);  
      // $permission = Permission::create(['name' => 'add order']);  
      // $permission = Permission::create(['name' => 'add product']);  
      
      

      // $role = Role::with('permissions');
      // $user = User::find(1);
      // $user->assignRole('new');

      // Role::findByName('admin')->givePermissionTo('add product');

      // $role = Role::find(1);
      // $role->givePermissionTo('edit articles');
      // $roles->givePermissionTo('add order');

      // $role = Role::create(['name' => 'posts']);
      // $permission = Permission::create(['name' => 'creates post']);

      // $role->givePermissionTo($permission);
      // $permission->assignRole($role);


      // $role = Role::create(['name' => 'admin']);

      // $permission = Permission::create(['name' => 'أضافة قسم رئيسي']);
      // $permission = Permission::create(['name' => 'أضافة قسم فرعي']);
      // $permission = Permission::create(['name' => 'أضافة  منتج']);
      // $permission = Permission::create(['name' => 'تعديل منتج']);
      // $permission = Permission::create(['name' => 'حذف منتج']);
      // $permission = Permission::create(['name' => 'أضافة  طلبيات']);
      // $permission = Permission::create(['name' => 'تعديل طلبيات']);
      // $permission = Permission::create(['name' => 'حذف طلبيات']);

      // $permission = Permission::create(['name' => 'أضافة عروض']);
      // $permission = Permission::create(['name' => 'تعديل عروض']);
      // $permission = Permission::create(['name' => 'حذف عروض']);

      // $permission = Permission::create(['name' => 'أضافة  زبائن']);
      // $permission = Permission::create(['name' => 'تعديل زبائن']);
      // $permission = Permission::create(['name' => 'حذف زبائن']);

      // $permission = Permission::create(['name' => 'أضافة  مستخدمين']);
      // $permission = Permission::create(['name' => 'تعديل مستخدمين']);
      // $permission = Permission::create(['name' => 'حذف مستخدمين']);

      // $permission = Permission::create(['name' => 'أضافة مقالات']);
      // $permission = Permission::create(['name' => 'تعديل مقالات']);
      // $permission = Permission::create(['name' => 'حذف مقالات']);

      // $permission = Permission::create(['name' => 'أضافة وظائف']);
      // $permission = Permission::create(['name' => 'تعديل وظائف']);
      // $permission = Permission::create(['name' => 'حذف وظائف']);

      // $permission = Permission::create(['name' => 'أضافة  طلبات توظيف']);
      // $permission = Permission::create(['name' => 'تعديل طلبات توظيف']);
      // $permission = Permission::create(['name' => 'حذف طلبات توظيف']);
 
      // $permission = Permission::create(['name' => 'أضافة موزعين']);
      // $permission = Permission::create(['name' => 'تعديل موزعين']);
      // $permission = Permission::create(['name' => 'حذف موزعين']);


      // $permission = Permission::create(['name' => 'أضافة الاعدادات']);
      // $permission = Permission::create(['name' => 'اضافة معلومات الشركة']);
      // $permission = Permission::create(['name' => 'أضافة فريق العمل' ]);
      // $role->givePermissionTo(Permission::all());

      
      // $role = Role::create(['name' => 'supervisor']);

      // $role->givePermissionTo(Permission::find(25)->id);
      // $role->givePermissionTo(Permission::find(26)->id);
      // $role->givePermissionTo(Permission::find(15)->id);
      // $role->givePermissionTo(Permission::find(10)->id);

      // $role = Role::create(['name' => 'user']);


      $roles = Role::with('permissions')->get();
      return $roles;
      
  }
}
