<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    DashboardController,
    ProfileController,
    UserController,
    CustomerController,
    ProductController,
    CategoryController,
    PosController,
    OrderController,
    DatabaseBackupController,
    RoleController
};

use App\Http\Controllers\Admin\CashierController;

use App\Http\Controllers\Customer\{
    DashboardController as CustomerDashboardController,
    MenuController as CustomerMenuController,
    CartController as CustomerCartController,
    PaymentController as CustomerPaymentController,
    OrderController as CustomerOrderController,
    CheckoutController as CustomerCheckoutController,
};
use App\Http\Controllers\Cashier\{
    DashboardController as CashierDashboardController,
    OrdersController as CashierOrdersController,
    HistoryController as CashierHistoryController,
    PaymentController as CashierPaymentController
};
use Illuminate\Contracts\Session\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//route baru//
// Layout baru untuk customer dalam membuat pesanan
// ====== CUSTOMER ======
//Todo: Route untuk bottom navigation pada customer
Route::prefix('')->name('customer.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [CustomerDashboardController::class, 'index'])
        ->name('index');

    // Cart
    Route::prefix('cart')->name('cart.')->controller(CustomerCartController::class)->group(function () {
        Route::get('/', 'index')->name('index'); // GET /cart
        Route::post('/create', 'create')->name('create'); // GET /cart/create
        Route::delete('/{cartId}/items/{itemId}', 'deleteItem')->name('items.delete'); // DELETE /cart/{cartId}/items/{itemId}
    });

    // Menu
    Route::prefix('menu')->name('menu.')->controller(CustomerMenuController::class)->group(function () {
        Route::get('/', 'index')->name('index'); // GET /menu
        Route::get('/{cartId}', 'show')->name('show'); // GET /menu/{cartId}
    });

    //Order
    Route::prefix('order')->name('order.')->controller(CustomerOrderController::class)->group(function () {
        Route::get('/', 'index')->name('index'); // GET /menu
    });
});

//buat liat session
// ! Buat liat session
Route::get('/debug/session', function () {
    return session()->all();
});

// Route untuk hapus semua session
// ! Buat apus session, gunakan hati hati
Route::get('/session/clear', function () {
    \Illuminate\Support\Facades\Session::flush(); // Hapus semua isi session

    return redirect('/')->with('success', 'Semua session berhasil dihapus!');
})->name('session.clear');


// Route::get('/menu/{jenis}', function ($jenis) {
//     return view('customer.menus.' . $jenis, ['jenis' => $jenis]);
// })->where('jenis', 'makanan|minuman|snack|paket')->name('order.menus');

Route::get('/data', [CustomerPaymentController::class, 'create'])->name('data.create');
Route::post('/bill', [CustomerPaymentController::class, 'store'])->name('data.store');
Route::post('/save-cart', [CustomerPaymentController::class, 'saveCart'])->name('save.cart');
// Route::post('/checkout', [CheckoutController::class, 'confirm'])->name('data.confirm');

// ====== CASHIER ======
Route::get(
    "/cashier/dashboard",
    [CashierDashboardController::class, "index"]
)->name("cashier.index");

// route/web.php
Route::post('/save-cart-customer', [CashierPaymentController::class, 'saveCart'])->name('save.cart.cashier');

Route::get('cashier/data', [CashierPaymentController::class, 'create'])->name('data.create.cashier');
Route::post('cashier/data', [CashierPaymentController::class, 'store'])->name('data.store.cashier');

// Route::prefix('cashier/orders')->name('cashier.orders.')->group(function () {
//     Route::get('/', [CashierOrdersController::class, 'index'])->name('index'); // Pending
//     Route::get('/processing', [CashierOrdersController::class, 'processing'])->name('processing');
//     Route::get('/completed', [CashierOrdersController::class, 'completed'])->name('completed');
//     Route::get('/cashier/orders/{order}/invoice', [CashierOrdersController::class, 'invoice'])->name('invoice');
//     Route::get('/cashier/orders/{order}/detail', [CashierOrdersController::class, 'detail'])->name('detail');
//     });


Route::prefix('cashier/orders')->name('cashier.orders.')->group(function () {
    Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
    Route::get('/processing', [CashierOrdersController::class, 'processing'])->name('processing');
    Route::get('/completed', [CashierOrdersController::class, 'completed'])->name('completed');
    Route::post('/orders/{order}/confirm', [OrdersController::class, 'confirm'])->name('orders.confirm');
    Route::delete('/orders/{order}', [OrdersController::class, 'destroy'])->name('orders.destroy');
});


Route::get(
    "/cashier/history",
    [CashierHistoryController::class, 'index']
)->name('cashier.history.index');

// DEFAULT DASHBOARD & PROFILE
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');
});

// ====== USERS ======
Route::middleware(['permission:user.menu'])->group(function () {
    Route::resource('/users', UserController::class)->except(['show']);
});

// // ====== CUSTOMERS ======
// Route::middleware(['permission:customer.menu'])->group(function () {
//     Route::resource('/customers', CustomerController::class);
// });

// ====== CASHIER ======
Route::prefix('cashier')->group(function () {
    Route::get('/', function () {
        return redirect()->route('cashier.index'); // ini akan aktif saat user buka /cashier
    });

    Route::get('/dashboard', [CashierDashboardController::class, 'index'])->name('cashier.index');
    Route::get('/orders', [CashierOrdersController::class, 'index'])->name('cashier.orders.index');
    Route::get('/history', [CashierHistoryController::class, 'index'])->name('cashier.history.index');
});


// ====== SUPPLIERS ======
// Route::middleware(['permission:supplier.menu'])->group(function () {
//     Route::resource('/suppliers', SupplierController::class);
// });

// ====== EMPLOYEES ======
// Route::middleware(['permission:employee.menu'])->group(function () {
//     Route::resource('/employees', EmployeeController::class);
// });

// ====== EMPLOYEE ATTENDENCE ======
// Route::middleware(['permission:attendence.menu'])->group(function () {
//     Route::resource('/employee/attendence', AttendenceController::class)->except(['show', 'update', 'destroy']);
// });

// ====== SALARY EMPLOYEE ======
// phpRoute::middleware(['permission:salary.menu'])->group(function () {
//     // PaySalary
//     Route::resource('/pay-salary', PaySalaryController::class)->except(['show', 'create', 'edit', 'update']);
//     Route::get('/pay-salary/history', [PaySalaryController::class, 'payHistory'])->name('pay-salary.payHistory');
//     Route::get('/pay-salary/history/{id}', [PaySalaryController::class, 'payHistoryDetail'])->name('pay-salary.payHistoryDetail');
//     Route::get('/pay-salary/{id}', [PaySalaryController::class, 'paySalary'])->name('pay-salary.paySalary');

//     // Advance Salary
//     Route::resource('/advance-salary', AdvanceSalaryController::class)->except(['show']);
// });

// ====== PRODUCTS ======
Route::middleware(['permission:product.menu'])->group(function () {
    Route::get('/products/import', [ProductController::class, 'importView'])->name('products.importView');
    Route::post('/products/import', [ProductController::class, 'importStore'])->name('products.importStore');
    Route::get('/products/export', [ProductController::class, 'exportData'])->name('products.exportData');
    Route::resource('/products', ProductController::class);
});

// ====== CATEGORY PRODUCTS ======
Route::middleware(['permission:category.menu'])->group(function () {
    Route::resource('/categories', CategoryController::class);
});

// ====== POS ======
//Route::middleware(['permission:pos.menu'])->group(function () {
//    Route::get('/pos', [PosController::class, 'index'])->name('pos.index');
//    Route::post('/pos/add', [PosController::class, 'addCart'])->name('pos.addCart');
//    Route::post('/pos/update/{rowId}', [PosController::class, 'updateCart'])->name('pos.updateCart');
//    Route::get('/pos/delete/{rowId}', [PosController::class, 'deleteCart'])->name('pos.deleteCart');
//    Route::post('/pos/invoice/create', [PosController::class, 'createInvoice'])->name('pos.createInvoice');
//    Route::post('/pos/invoice/print', [PosController::class, 'printInvoice'])->name('pos.printInvoice');

// Create Order
//    Route::post('/pos/order', [OrderController::class, 'storeOrder'])->name('pos.storeOrder');
//});


// // ====== ORDERS ======
// Route::middleware(['permission:orders.menu'])->group(function () {
//     Route::get('/orders/pending', [OrderController::class, 'pendingOrders'])->name('order.pendingOrders');
//     Route::get('/orders/complete', [OrderController::class, 'completeOrders'])->name('order.completeOrders');
//     Route::get('/orders/details/{order_id}', [OrderController::class, 'orderDetails'])->name('order.orderDetails');
//     Route::put('/orders/update/status', [OrderController::class, 'updateStatus'])->name('order.updateStatus');
//     Route::get('/orders/invoice/download/{order_id}', [OrderController::class, 'invoiceDownload'])->name('order.invoiceDownload');

//     // Pending Due
//     Route::get('/pending/due', [OrderController::class, 'pendingDue'])->name('order.pendingDue');
//     Route::get('/order/due/{id}', [OrderController::class, 'orderDueAjax'])->name('order.orderDueAjax');
//     Route::post('/update/due', [OrderController::class, 'updateDue'])->name('order.updateDue');

//     // Stock Management
//     Route::get('/stock', [OrderController::class, 'stockManage'])->name('order.stockManage');
// });

// // ====== DATABASE BACKUP ======
// Route::middleware(['permission:database.menu'])->group(function () {
//     Route::get('/database/backup', [DatabaseBackupController::class, 'index'])->name('backup.index');
//     Route::get('/database/backup/now', [DatabaseBackupController::class, 'create'])->name('backup.create');
//     Route::get('/database/backup/download/{getFileName}', [DatabaseBackupController::class, 'download'])->name('backup.download');
//     Route::get('/database/backup/delete/{getFileName}', [DatabaseBackupController::class, 'delete'])->name('backup.delete');
// });


// ====== ROLE CONTROLLER ======
Route::middleware(['permission:roles.menu'])->group(function () {
    // Permissions
    Route::get('/permission', [RoleController::class, 'permissionIndex'])->name('permission.index');
    Route::get('/permission/create', [RoleController::class, 'permissionCreate'])->name('permission.create');
    Route::post('/permission', [RoleController::class, 'permissionStore'])->name('permission.store');
    Route::get('/permission/edit/{id}', [RoleController::class, 'permissionEdit'])->name('permission.edit');
    Route::put('/permission/{id}', [RoleController::class, 'permissionUpdate'])->name('permission.update');
    Route::delete('/permission/{id}', [RoleController::class, 'permissionDestroy'])->name('permission.destroy');

    // Roles
    Route::get('/role', [RoleController::class, 'roleIndex'])->name('role.index');
    Route::get('/role/create', [RoleController::class, 'roleCreate'])->name('role.create');
    Route::post('/role', [RoleController::class, 'roleStore'])->name('role.store');
    Route::get('/role/edit/{id}', [RoleController::class, 'roleEdit'])->name('role.edit');
    Route::put('/role/{id}', [RoleController::class, 'roleUpdate'])->name('role.update');
    Route::delete('/role/{id}', [RoleController::class, 'roleDestroy'])->name('role.destroy');

    // Role Permissions
    Route::get('/role/permission', [RoleController::class, 'rolePermissionIndex'])->name('rolePermission.index');
    Route::get('/role/permission/create', [RoleController::class, 'rolePermissionCreate'])->name('rolePermission.create');
    Route::post('/role/permission', [RoleController::class, 'rolePermissionStore'])->name('rolePermission.store');
    Route::get('/role/permission/{id}', [RoleController::class, 'rolePermissionEdit'])->name('rolePermission.edit');
    Route::put('/role/permission/{id}', [RoleController::class, 'rolePermissionUpdate'])->name('rolePermission.update');
    Route::delete('/role/permission/{id}', [RoleController::class, 'rolePermissionDestroy'])->name('rolePermission.destroy');
});
